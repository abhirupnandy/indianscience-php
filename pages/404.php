<div class="bg-white text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    <div class="container">

        <div class="mx-auto max-w-2xl px-6 py-20 text-center sm:py-28">

            <!-- Error Code -->

            <div class="text-8xl font-bold tracking-tight text-slate-200 sm:text-9xl dark:text-slate-800">
                404
            </div>


            <!-- Icon -->

            <div class="mx-auto -mt-8 flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 ring-8 ring-white dark:bg-indigo-500/10 dark:text-indigo-400 dark:ring-slate-950">

                <svg
                    class="h-7 w-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.7"
                    aria-hidden="true">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </div>


            <!-- Heading -->

            <h1 class="mt-8 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl dark:text-white">
                Page not found
            </h1>


            <!-- Description -->

            <p class="mx-auto mt-4 max-w-lg text-base leading-7 text-slate-600 dark:text-slate-400">
                The page you're looking for doesn't exist, may have been moved,
                or the URL may be incorrect.
            </p>


            <!-- Actions -->

            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

                <a
                    href="<?= url('') ?>"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:hover:bg-indigo-500 dark:focus:ring-offset-slate-950">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m3 12 7-7m0 0v4h7a4 4 0 014 4v1m-11-9v4" />
                    </svg>

                    Back to homepage

                </a>


                <a
                    href="<?= url('institutions') ?>"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-600 dark:hover:bg-slate-800">
                    Browse institutions

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14m-6-6l6 6-6 6" />
                    </svg>

                </a>

            </div>


            <!-- Supporting text -->

            <div class="mt-12 border-t border-slate-200 pt-6 dark:border-slate-800">

                <p class="text-xs text-slate-500 dark:text-slate-500">
                    Indian Science Reports
                </p>

            </div>

        </div>

    </div>

</div