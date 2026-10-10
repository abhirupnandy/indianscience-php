<?php
declare(strict_types=1);

// Never print PHP errors into the JSON body; log them instead.
ini_set('display_errors', '0');
ini_set('log_errors', '1');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

register_shutdown_function(static function (): void {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], true)) {
        error_log('Feedback API fatal error: ' . $error['message'] . ' in ' . $error['file'] . ':' . $error['line']);
    }
});

if (!defined('ROOT_PATH')) {
    // Supports <project>/api/feedback.php and <project>/public/api/feedback.php.
    $rootCandidates = [dirname(__DIR__), dirname(dirname(__DIR__))];
    $resolvedRoot = dirname(__DIR__);
    foreach ($rootCandidates as $candidate) {
        if (is_file($candidate . '/partials/email-contact-template.php')
            && is_file($candidate . '/vendor/autoload.php')) {
            $resolvedRoot = $candidate;
            break;
        }
    }
    define('ROOT_PATH', $resolvedRoot);
}
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Indian Science Reports');
}

// Load Composer autoload and, if present, a .env file.
$autoload = ROOT_PATH . '/vendor/autoload.php';
if (is_file($autoload)) {
    require_once $autoload;
    if (class_exists('Dotenv\Dotenv') && is_file(ROOT_PATH . '/.env')) {
        Dotenv\Dotenv::createImmutable(ROOT_PATH)->safeLoad();
    }
}

// Fallback .env loader (works without phpdotenv).
foreach ([ROOT_PATH . '/.env', dirname(ROOT_PATH) . '/.env'] as $envFile) {
    if (!is_file($envFile) || !is_readable($envFile)) {
        continue;
    }
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || !str_contains($line, '=')) {
            continue;
        }
        [$k, $v] = explode('=', $line, 2);
        $k = trim($k);
        $v = trim($v);
        if (strlen($v) >= 2 && ($v[0] === '"' || $v[0] === "'") && substr($v, -1) === $v[0]) {
            $v = substr($v, 1, -1);
        }
        if ($k !== '' && !isset($_ENV[$k])) {
            $_ENV[$k] = $v;
        }
    }
    break;
}

function feedback_env(string $key, string $default = ''): string
{
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
    return ($value === false || $value === null || $value === '') ? $default : trim((string) $value);
}

function feedback_json(int $status, array $payload): never
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function feedback_strlen(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}

// The email template calls e(), which normally lives in the site's helpers
// (not loaded for this standalone endpoint). Provide a safe fallback.
if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

function feedback_new_challenge(): array
{
    $a = random_int(3, 15);
    $b = random_int(2, 12);
    $id = bin2hex(random_bytes(24));
    $_SESSION['feedback_challenge'] = [
        'id' => $id,
        'answer' => (string) ($a + $b),
        'created_at' => time(),
    ];
    if (empty($_SESSION['feedback_csrf']) || !is_string($_SESSION['feedback_csrf'])) {
        $_SESSION['feedback_csrf'] = bin2hex(random_bytes(32));
    }
    return [
        'success' => true,
        'question' => "Indian Science Reports verification: What is {$a} + {$b}?",
        'challenge_id' => $id,
        'csrf_token' => $_SESSION['feedback_csrf'],
    ];
}

$action = (string) ($_GET['action'] ?? 'challenge');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $action === 'challenge') {
    feedback_json(200, feedback_new_challenge());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $action !== 'submit') {
    feedback_json(405, ['success' => false, 'message' => 'Method not allowed.']);
}

// CSRF token + one-time challenge, both checked server-side.
$csrfSubmitted = (string) ($_POST['csrf_token'] ?? '');
$csrfExpected = (string) ($_SESSION['feedback_csrf'] ?? '');
$challengeSubmitted = (string) ($_POST['challenge_id'] ?? '');
$captchaAnswer = trim((string) ($_POST['captcha_answer'] ?? ''));
$challenge = $_SESSION['feedback_challenge'] ?? null;

if ($csrfExpected === '' || $csrfSubmitted === '' || !hash_equals($csrfExpected, $csrfSubmitted)) {
    feedback_json(403, ['success' => false, 'message' => 'Security token expired. Please reload the page and try again.']);
}
if (!is_array($challenge)
    || empty($challenge['id'])
    || !is_string($challenge['id'])
    || !hash_equals($challenge['id'], $challengeSubmitted)
    || (int) ($challenge['created_at'] ?? 0) < time() - 600
    || (int) ($challenge['created_at'] ?? 0) > time()
) {
    unset($_SESSION['feedback_challenge']);
    feedback_json(400, ['success' => false, 'message' => 'Verification expired. Please try the new question.']);
}

$submittedInteger = filter_var($captchaAnswer, FILTER_VALIDATE_INT);
$expectedInteger = filter_var((string) ($challenge['answer'] ?? ''), FILTER_VALIDATE_INT);
if ($submittedInteger === false || $expectedInteger === false || $submittedInteger !== $expectedInteger) {
    unset($_SESSION['feedback_challenge']);
    feedback_json(422, ['success' => false, 'message' => 'The verification answer is incorrect. Please answer the new question.']);
}

// Consume the challenge so it cannot be reused.
unset($_SESSION['feedback_challenge']);

// Honeypot.
if (trim((string) ($_POST['website'] ?? '')) !== '') {
    feedback_json(422, ['success' => false, 'message' => 'We could not process this submission.']);
}

// Simple per-session cooldown (60 seconds).
$lastSent = (int) ($_SESSION['feedback_last'] ?? 0);
if ($lastSent > 0 && (time() - $lastSent) < 60) {
    feedback_json(429, ['success' => false, 'message' => 'Please wait a minute before sending another message.']);
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));
$name = trim((string) preg_replace('/[\r\n]+/', ' ', $name));
$email = trim((string) preg_replace('/[\r\n]+/', '', $email));

if ($name === '' || $email === '' || $message === '') {
    feedback_json(422, ['success' => false, 'message' => 'Please complete your name, email, and feedback message.']);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    feedback_json(422, ['success' => false, 'message' => 'Please enter a valid email address.']);
}
if (feedback_strlen($name) > 100 || feedback_strlen($message) > 5000) {
    feedback_json(422, ['success' => false, 'message' => 'Your name or message is too long.']);
}

// Release the session lock before the slow SMTP call.
session_write_close();

$to = feedback_env('FEEDBACK_EMAIL');
$from = feedback_env('SMTP_FROM');
$smtpHost = feedback_env('SMTP_HOST');
$smtpUsername = feedback_env('SMTP_USERNAME');
$smtpPassword = feedback_env('SMTP_PASSWORD');
$smtpPort = (int) feedback_env('SMTP_PORT', '587');
$smtpEncryption = strtolower(feedback_env('SMTP_ENCRYPTION', 'tls'));

// Set FEEDBACK_DEBUG=1 in .env ONLY while diagnosing; remove it afterwards.
// $debug = feedback_env('FEEDBACK_DEBUG') === '1';
$debug = true;
$obLevel = ob_get_level();

try {
    $templatePath = ROOT_PATH . '/partials/email-contact-template.php';
    if (!is_file($templatePath)) {
        throw new RuntimeException('Contact email template not found.');
    }
    $template = (static function (array $data) use ($templatePath): array {
        extract($data, EXTR_SKIP);
        return require $templatePath;
    })([
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'siteName' => SITE_NAME,
        'sentAt' => date('d M Y, H:i'),
    ]);
    $htmlBody = (string) ($template['html'] ?? '');
    $textBody = (string) ($template['text'] ?? '');

    if ($htmlBody === '' || $textBody === '') {
        throw new RuntimeException('Contact email template returned an empty body.');
    }
    if ($to === '' || $from === '' || $smtpHost === '' || $smtpUsername === '' || $smtpPassword === '') {
        throw new RuntimeException('SMTP configuration is incomplete.');
    }
    if (!filter_var($to, FILTER_VALIDATE_EMAIL) || !filter_var($from, FILTER_VALIDATE_EMAIL)
        || !in_array($smtpEncryption, ['tls', 'ssl'], true) || $smtpPort < 1 || $smtpPort > 65535) {
        throw new RuntimeException('SMTP configuration contains invalid values.');
    }
    if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        throw new RuntimeException('PHPMailer is not installed (check vendor/autoload.php).');
    }

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->Port = $smtpPort;
    $mail->SMTPSecure = $smtpEncryption === 'ssl'
        ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS
        : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet = PHPMailer\PHPMailer\PHPMailer::CHARSET_UTF8;
    $mail->setFrom($from, SITE_NAME);
    $mail->addAddress($to);
    $mail->addReplyTo($email, $name);
    $mail->Timeout = 10;
    $mail->SMTPKeepAlive = false;
    $mail->isHTML(true);
    $mail->Subject = 'Website Feedback from ' . $name;
    $mail->Body = $htmlBody;
    $mail->AltBody = $textBody;
    $mail->send();

    // Record the send time for the cooldown (reopen the session briefly).
    if (session_status() !== PHP_SESSION_ACTIVE) {
        @session_start();
    }
    $_SESSION['feedback_last'] = time();
    session_write_close();

    feedback_json(200, ['success' => true, 'message' => 'Thank you. Your feedback has been sent successfully.']);
} catch (Throwable $e) {
    // Discard any half-rendered template output so the JSON body stays clean.
    while (ob_get_level() > $obLevel) {
        ob_end_clean();
    }
    error_log('Contact form email failed: ' . $e->getMessage());
    if ($debug) {
        // 200 so hosts that replace 5xx bodies still show the JSON.
        feedback_json(200, ['success' => false, 'message' => 'DEBUG: ' . $e->getMessage()]);
    }
    feedback_json(500, ['success' => false, 'message' => 'We could not send your message right now. Please try again later.']);
}