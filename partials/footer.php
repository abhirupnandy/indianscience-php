<?php
$feedbackStatus = '';
$feedbackMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback_submit'])) {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));

    // Strip line breaks from single-line fields (prevents email header injection).
    $name = trim(preg_replace('/[\r\n]+/', ' ', $name));
    $email = trim(preg_replace('/[\r\n]+/', '', $email));

    if ($name === '' || $email === '' || $message === '') {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Please complete your name, email, and feedback message.';
    } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Please enter a valid email address.';
    } elseif (mb_strlen($name) > 100 || mb_strlen($message) > 5000) {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Your name or message is too long.';
    } else {
        $to = getenv('FEEDBACK_EMAIL') ?: 'hello@example.com';
        $from = getenv('SMTP_FROM') ?: 'noreply@example.com';
        $subject = 'Website Feedback from '.$name;

        // Build the email body from the template.
        $template = (static function (array $data): array {
            extract($data, EXTR_SKIP);

            return require ROOT_PATH.'/partials/email-contact-template.php';
        })([
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'siteName' => SITE_NAME,
            'sentAt' => date('d M Y, H:i'),
        ]);

        $htmlBody = $template['html'];
        $textBody = $template['text'];

        $sent = false;

        // 1) PHPMailer (if installed)
        if (file_exists(ROOT_PATH.'/vendor/autoload.php')) {
            require_once ROOT_PATH.'/vendor/autoload.php';

            if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
                try {
                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host = getenv('SMTP_HOST') ?: 'localhost';
                    $mail->Port = (int) (getenv('SMTP_PORT') ?: 25);
                    $mail->SMTPAuth = false;
                    $mail->setFrom($from, SITE_NAME);
                    $mail->addAddress($to);
                    $mail->addReplyTo($email, $name);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $htmlBody;
                    $mail->AltBody = $textBody;
                    $sent = $mail->send();
                } catch (Throwable $e) {
                    $sent = false;
                }
            }
        }

        // 2) Fallback: PHP mail() as multipart (text + HTML)
        if (! $sent) {
            $boundary = 'bnd_'.bin2hex(random_bytes(8));

            $headers = [
                'From: '.$from,
                'Reply-To: '.$email,
                'MIME-Version: 1.0',
                'Content-Type: multipart/alternative; boundary="'.$boundary.'"',
            ];

            $body = "--{$boundary}\r\n"
                    ."Content-Type: text/plain; charset=UTF-8\r\n\r\n"
                    .$textBody."\r\n"
                    ."--{$boundary}\r\n"
                    ."Content-Type: text/html; charset=UTF-8\r\n\r\n"
                    .$htmlBody."\r\n"
                    ."--{$boundary}--";

            $sent = mail(
                $to,
                '=?UTF-8?B?'.base64_encode($subject).'?=',
                $body,
                implode("\r\n", $headers)
            );
        }

        if ($sent) {
            $feedbackStatus = 'success';
            $feedbackMessage = 'Thank you. Your feedback has been sent successfully.';
        } else {
            $feedbackStatus = 'error';
            $feedbackMessage = 'We could not send your message right now. Please try again later.';
        }
    }
}
?>

</main>

<footer class="w-full border-t border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-950">
    <div class="w-full max-w-full px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl space-y-8">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_0.8fr] lg:items-start">
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-gray-900/60">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Send Feedback</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        We value your suggestions, questions, and comments about the portal.
                    </p>

                    <?php if ($feedbackMessage !== '') { ?>
                        <div class="mt-4 rounded-xl border px-3 py-2 text-sm <?= $feedbackStatus === 'success' ? 'border-green-200 bg-green-50 text-green-700 dark:border-green-900 dark:bg-green-950/50 dark:text-green-300' : 'border-red-200 bg-red-50 text-red-700 dark:border-red-900 dark:bg-red-950/50 dark:text-red-300' ?>">
                            <?= e($feedbackMessage) ?>
                        </div>
                    <?php } ?>

                    <form method="post" action="<?= e($_SERVER['REQUEST_URI'] ?? '/') ?>" class="mt-4 space-y-3">
                        <div class="grid gap-3 sm:grid-cols-2">
                            <input
                                    type="text"
                                    name="name"
                                    value="<?= $feedbackStatus === 'error' ? e($_POST['name'] ?? '') : '' ?>"
                                    placeholder="Your name"
                                    maxlength="100"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                                    required>
                            <input
                                    type="email"
                                    name="email"
                                    value="<?= $feedbackStatus === 'error' ? e($_POST['email'] ?? '') : '' ?>"
                                    placeholder="Email address"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                                    required>
                        </div>

                        <textarea
                                name="message"
                                rows="4"
                                maxlength="5000"
                                placeholder="Share your feedback..."
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                                required><?= $feedbackStatus === 'error' ? e($_POST['message'] ?? '') : '' ?></textarea>

                        <button
                                type="submit"
                                name="feedback_submit"
                                value="1"
                                class="inline-flex items-center justify-center rounded-lg bg-[#1A4D8F] px-4 py-2.5 text-sm font-medium text-white transition hover:bg-[#153a73] dark:bg-[#1A4D8F] dark:hover:bg-[#153a73]">
                            Send Feedback
                        </button>
                    </form>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-gray-900/60">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Visitors</h3>
                    <?php require_once ROOT_PATH.'/includes/visitor-counter.php'; ?>
                </div>
            </div>

            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <nav aria-label="Footer navigation" class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 lg:justify-start">
                    <a href="<?= url('about') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">About</a>
                    <a href="<?= url('team') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contributors</a>
                    <a href="<?= url('methodology') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Data &amp; Methodology</a>
                    <a href="<?= url('institutions') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Institutional Reports</a>
                    <a href="<?= url('publications') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Related Publications</a>
                    <a href="<?= url('terms') ?>" class="text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Terms of Use</a>
                </nav>
                <p class='shrink-0 text-center text text-gray-500 lg:text-right dark:text-gray-500'>
                    &copy; <?= date('Y') ?>
                    <a href='https://www.viveksingh.in' target='_blank' class="font-bold">
                        Prof. Vivek Kumar Singh
                    </a>
                </p>

            </div>
        </div>
    </div>
</footer>
<!-- Back to top -->
<button
        id="back-to-top"
        type="button"
        aria-label="Back to top"
        title="Back to top"
        aria-hidden="true"
        tabindex="-1"
        class="group fixed bottom-6 right-6 z-[110]
           flex h-11 w-11 items-center justify-center
           rounded-xl border border-slate-300
           bg-slate-100 text-slate-700
           opacity-0 translate-y-3
           pointer-events-none
           shadow-md shadow-slate-900/10
           transition-[opacity,transform,background-color,border-color,box-shadow]
           duration-300 ease-out
           hover:border-slate-400 hover:bg-white
           hover:text-slate-950 hover:shadow-lg
           hover:shadow-slate-900/20
           focus-visible:outline-none
           focus-visible:ring-2 focus-visible:ring-slate-500
           focus-visible:ring-offset-2
           dark:border-slate-700 dark:bg-slate-800
           dark:text-slate-200 dark:shadow-black/20
           dark:hover:border-slate-500
           dark:hover:bg-slate-700 dark:hover:text-white
           dark:hover:shadow-black/40
           dark:focus-visible:ring-slate-400
           dark:focus-visible:ring-offset-slate-950">

    <svg
            class="h-5 w-5 transition-transform duration-300
               ease-out group-hover:-translate-y-0.5
               motion-reduce:transition-none"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            aria-hidden="true">

        <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M5 11l7-7 7 7M12 4v16"/>

    </svg>

</button>

<style>
    @keyframes back-to-top-bounce {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-3px);
        }
    }

    #back-to-top:hover {
        animation: back-to-top-bounce 0.45s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
        #back-to-top:hover {
            animation: none;
        }
    }
</style>

<script>
    (() => {
        const button = document.getElementById('back-to-top');

        if (!button || button.dataset.initialised) return;

        button.dataset.initialised = 'true';

        const updateVisibility = () => {
            const visible = window.scrollY > 0;

            button.classList.toggle('translate-y-3', !visible);
            button.classList.toggle('translate-y-0', visible);
            button.classList.toggle('opacity-0', !visible);
            button.classList.toggle('opacity-100', visible);
            button.classList.toggle('pointer-events-none', !visible);

            button.setAttribute('aria-hidden', String(!visible));
            button.tabIndex = visible ? 0 : -1;
        };

        window.addEventListener('scroll', updateVisibility, {
            passive: true
        });

        button.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: window.matchMedia(
                    '(prefers-reduced-motion: reduce)'
                ).matches ? 'auto' : 'smooth'
            });
        });

        updateVisibility();
    })();
</script>

</body>

</html>