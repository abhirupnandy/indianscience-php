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

                    <div id="feedback-status" class="mt-4 hidden rounded-xl border px-3 py-2 text-sm" role="status" aria-live="polite"></div>

                    <form id="feedback-form"
                          method="post"
                          action="<?= e(url('api/feedback.php')) ?>?action=submit"
                          data-api="<?= e(url('api/feedback.php')) ?>"
                          class="relative mt-4 space-y-3">
                        <div class="grid gap-3 sm:grid-cols-2">
                            <input type="text" name="name" placeholder="Your name" maxlength="100" autocomplete="name" class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white" required>
                            <input type="email" name="email" placeholder="Email address" autocomplete="email" class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white" required>
                        </div>
                        <textarea name="message" rows="4" maxlength="5000" placeholder="Share your feedback..." class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white" required></textarea>

                        <div aria-hidden="true" class="absolute -left-[10000px] top-auto h-px w-px overflow-hidden">
                            <label for="feedback-website">Leave this field empty</label>
                            <input type="text" id="feedback-website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-950">
                            <label for="captcha_answer" class="block text-sm font-semibold text-gray-900 dark:text-white">Spam protection</label>
                            <p id="feedback-captcha-question" class="mt-1 text-sm text-gray-600 dark:text-gray-400">Loading verification question…</p>
                            <input type="number" id="captcha_answer" name="captcha_answer" inputmode="numeric" step="1" required autocomplete="off" placeholder="Enter your answer" class="mt-3 w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none focus:border-[#1A4D8F] dark:border-gray-700 dark:bg-gray-950 dark:text-white">
                            <input type="hidden" name="csrf_token" id="feedback-csrf-token">
                            <input type="hidden" name="challenge_id" id="feedback-challenge-id">
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Solve the arithmetic question to submit your feedback.</p>
                        </div>

                        <button type="submit" id="feedback-submit" class="inline-flex items-center justify-center rounded-lg bg-[#1A4D8F] px-4 py-2.5 text-sm font-medium text-white transition hover:bg-[#153a73] disabled:cursor-not-allowed disabled:opacity-60">Send Feedback</button>
                    </form>

                    <script>
                    (() => {
                        const form = document.getElementById('feedback-form');
                        if (!form || form.dataset.initialised) return;
                        form.dataset.initialised = 'true';

                        const api = form.dataset.api;
                        const question = document.getElementById('feedback-captcha-question');
                        const csrf = document.getElementById('feedback-csrf-token');
                        const challenge = document.getElementById('feedback-challenge-id');
                        const answer = document.getElementById('captcha_answer');
                        const status = document.getElementById('feedback-status');
                        const submit = document.getElementById('feedback-submit');

                        const okClasses = ['border-green-200', 'bg-green-50', 'text-green-700', 'dark:border-green-900', 'dark:bg-green-950/50', 'dark:text-green-300'];
                        const badClasses = ['border-red-200', 'bg-red-50', 'text-red-700', 'dark:border-red-900', 'dark:bg-red-950/50', 'dark:text-red-300'];

                        const readJsonResponse = async (response) => {
                            const body = await response.text();
                            try {
                                return JSON.parse(body);
                            } catch (error) {
                                const preview = body.replace(/\s+/g, ' ').slice(0, 140);
                                throw new Error(
                                    `The feedback API returned HTML or invalid JSON (HTTP ${response.status}). ` +
                                    `Check that api/feedback.php exists at the public URL. Response: ${preview}`
                                );
                            }
                        };

                        const setStatus = (message, success = false) => {
                            status.textContent = message;
                            status.classList.remove('hidden', ...okClasses, ...badClasses);
                            status.classList.add(...(success ? okClasses : badClasses));
                        };

                        const loadChallenge = async () => {
                            question.textContent = 'Loading verification question…';
                            try {
                                const response = await fetch(api + '?action=challenge', {
                                    credentials: 'same-origin',
                                    headers: { 'Accept': 'application/json' },
                                    cache: 'no-store',
                                    redirect: 'follow'
                                });
                                const data = await readJsonResponse(response);
                                if (!response.ok || !data.success) throw new Error(data.message || 'Could not load verification.');
                                question.textContent = data.question;
                                csrf.value = data.csrf_token;
                                challenge.value = data.challenge_id;
                                answer.value = '';
                                submit.disabled = false;
                            } catch (error) {
                                question.textContent = 'Verification could not be loaded. Reload the page and try again.';
                                setStatus(error.message || 'Could not load verification.');
                                submit.disabled = true;
                            }
                        };

                        form.addEventListener('submit', async (event) => {
                            event.preventDefault();
                            if (!form.reportValidity()) return;
                            submit.disabled = true;
                            submit.textContent = 'Sending…';
                            try {
                                const response = await fetch(api + '?action=submit', {
                                    method: 'POST',
                                    body: new FormData(form),
                                    credentials: 'same-origin',
                                    headers: { 'Accept': 'application/json' },
                                    redirect: 'follow'
                                });
                                const data = await readJsonResponse(response);
                                if (!response.ok || !data.success) throw new Error(data.message || 'Feedback could not be sent.');
                                setStatus(data.message, true);
                                form.elements.name.value = '';
                                form.elements.email.value = '';
                                form.elements.message.value = '';
                                await loadChallenge();
                            } catch (error) {
                                setStatus(error.message || 'Feedback could not be sent. Please try again.');
                                await loadChallenge();
                            } finally {
                                submit.disabled = false;
                                submit.textContent = 'Send Feedback';
                            }
                        });

                        loadChallenge();
                    })();
                    </script>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-800 dark:bg-gray-900/60">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Visitors</h3>
                    <?php require_once ROOT_PATH . '/includes/visitor-counter.php'; ?>
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
                <p class="shrink-0 text-center text-sm text-gray-500 lg:text-right dark:text-gray-500">
                    &copy; <?= date('Y') ?>
                    <a href="https://www.viveksingh.in" target="_blank" rel="noopener" class="font-bold">
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
    /* Sticky-footer layout: footer stays at the bottom on short pages,
       but remains in normal document flow on long pages. */
    html {
        min-height: 100%;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    body > main {
        flex: 1 0 auto;
        width: 100%;
    }

    body > footer {
        flex-shrink: 0;
        width: 100%;
        margin-top: auto;
    }

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

        window.addEventListener('scroll', updateVisibility, { passive: true });

        button.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
            });
        });

        updateVisibility();
    })();
</script>
<?php require ROOT_PATH . '/partials/cookies.php'; ?>
</body>

</html>