<?php
$feedbackStatus = '';
$feedbackMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback_submit'])) {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));

    if ($name === '' || $email === '' || $message === '') {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Please complete your name, email, and feedback message.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Please enter a valid email address.';
    } else {
        $to = getenv('FEEDBACK_EMAIL') ?: 'hello@example.com';
        $subject = 'Website Feedback from ' . $name;
        $body = "Name: {$name}\n" .
            "Email: {$email}\n\n" .
            "Message:\n{$message}\n";

        $sent = false;

        if (file_exists(ROOT_PATH . '/vendor/autoload.php')) {
            require_once ROOT_PATH . '/vendor/autoload.php';

            if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->isSMTP();
                $mail->Host = getenv('SMTP_HOST') ?: 'localhost';
                $mail->Port = (int) (getenv('SMTP_PORT') ?: 25);
                $mail->SMTPAuth = false;
                $mail->setFrom(getenv('SMTP_FROM') ?: 'noreply@example.com', SITE_NAME);
                $mail->addAddress($to);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AltBody = strip_tags($body);
                $sent = $mail->send();
            }
        }

        if (!$sent) {
            $headers = [
                'From: ' . (getenv('SMTP_FROM') ?: 'noreply@example.com'),
                'Reply-To: ' . $email,
                'Content-Type: text/plain; charset=UTF-8',
            ];
            $sent = mail($to, $subject, $body, implode("\r\n", $headers));
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

                    <?php if ($feedbackMessage !== ''): ?>
                        <div class="mt-4 rounded-xl border px-3 py-2 text-sm <?= $feedbackStatus === 'success' ? 'border-green-200 bg-green-50 text-green-700 dark:border-green-900 dark:bg-green-950/50 dark:text-green-300' : 'border-red-200 bg-red-50 text-red-700 dark:border-red-900 dark:bg-red-950/50 dark:text-red-300' ?>">
                            <?= e($feedbackMessage) ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= e($_SERVER['REQUEST_URI'] ?? '/') ?>" class="mt-4 space-y-3">
                        <div class="grid gap-3 sm:grid-cols-2">
                            <input
                                type="text"
                                name="name"
                                placeholder="Your name"
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                                required>
                            <input
                                type="email"
                                name="email"
                                placeholder="Email address"
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                                required>
                        </div>

                        <textarea
                            name="message"
                            rows="4"
                            placeholder="Share your feedback..."
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none ring-0 transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white"
                            required></textarea>

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
                    <?php require_once ROOT_PATH . '/includes/visitor-counter.php'; ?>
                </div>
            </div>

            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <nav aria-label="Footer navigation" class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 lg:justify-start">
                    <a href="<?= url('about') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">About</a>
                    <a href="<?= url('team') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contributors</a>
                    <a href="<?= url('methodology') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Data &amp; Methodology</a>
                    <a href="<?= url('institutions') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Institutional Reports</a>
                    <a href="<?= url('publications') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Related Publications</a>
                    <a href="<?= url('terms') ?>" class="text-sm text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Terms of Use</a>
                </nav>

                <p class="shrink-0 text-center text-sm text-gray-500 lg:text-right dark:text-gray-500">
                    &copy; <?= date('Y') ?> Prof. Vivek Kumar Singh
                </p>
            </div>
        </div>
    </div>
</footer>

</body>

</html>