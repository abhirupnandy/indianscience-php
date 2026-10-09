<?php
if (! isset($pdo) || ! ($pdo instanceof PDO)) {
    error_log('Visitor counter: PDO connection is unavailable.');
}
?>
<div class="relative isolate overflow-hidden bg-white text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    <!-- Subtle background accents -->
    <div
            aria-hidden="true"
            class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">

        <div class="absolute left-1/2 top-0 h-96 w-96 -translate-x-1/2 -translate-y-1/2 rounded-full bg-indigo-100/60 blur-3xl dark:bg-indigo-500/10"></div>

        <div class="absolute bottom-0 right-0 h-72 w-72 translate-x-1/3 translate-y-1/3 rounded-full bg-sky-100/50 blur-3xl dark:bg-sky-500/5"></div>

    </div>

    <div class="container">

        <main class="mx-auto max-w-2xl px-6 py-20 text-center sm:py-28 lg:py-32">

            <!-- Error indicator -->
            <div class="inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-indigo-50/80 px-3.5 py-1.5 text-xs font-semibold tracking-wide text-indigo-700 dark:border-indigo-400/20 dark:bg-indigo-400/10 dark:text-indigo-300">

                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>

                ERROR 404

            </div>

            <!-- Error illustration -->
            <div class="relative mx-auto mt-8 w-fit">

                <div
                        aria-hidden="true"
                        class="select-none text-[8rem] font-black leading-none tracking-[-0.09em] text-slate-100 sm:text-[11rem] dark:text-slate-900">
                    404
                </div>

                <div class="absolute inset-0 flex items-center justify-center">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-white/80 bg-white/90 text-indigo-600 shadow-lg shadow-indigo-950/5 ring-1 ring-slate-200/70 backdrop-blur-sm dark:border-slate-700 dark:bg-slate-900/90 dark:text-indigo-400 dark:ring-slate-700">

                        <svg
                                class="h-8 w-8"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.6"
                                aria-hidden="true">
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v3.75m0 3h.008M10.29 3.86 1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        </svg>

                    </div>

                </div>

            </div>

            <!-- Main message -->
            <h1 class="mt-7 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl dark:text-white">
                This page is missing.
            </h1>

            <p class="mx-auto mt-4 max-w-lg text-base leading-7 text-slate-600 dark:text-slate-400">
                We couldn't find the page you requested. It may have been
                moved, removed, or the URL may contain a typo.
            </p>

            <!-- Primary actions -->
            <div class="mt-9 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">

                <a
                        href="<?= url('') ?>"
                        class="group inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-indigo-600/20 transition duration-200 hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-md hover:shadow-indigo-600/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-slate-950">

                    <svg
                            class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-0.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                            aria-hidden="true">
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>

                    Return to homepage

                </a>

                <a
                        href="<?= url('institutions') ?>"
                        class="group inline-flex min-h-12 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-700 dark:hover:bg-slate-800 dark:focus-visible:ring-offset-slate-950">

                    Browse institutions

                    <svg
                            class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                            aria-hidden="true">
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 12h14m-6-6 6 6-6 6" />
                    </svg>

                </a>

            </div>

            <!-- Helpful next step -->
            <div class="mx-auto mt-12 max-w-md border-t border-slate-200/80 pt-7 dark:border-slate-800">

                <p class="text-sm font-medium text-slate-700 dark:text-slate-300">
                    Looking for research information?
                </p>

                <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                    Explore institutional profiles and discover research
                    output across India.
                </p>

                <a
                        href="<?= url('institutions') ?>"
                        class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 focus-visible:rounded-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">

                    Explore ISR

                    <svg
                            class="h-3.5 w-3.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            aria-hidden="true">
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 17 17 7M7 7h10v10" />
                    </svg>

                </a>

            </div>

            <!-- Brand signature -->
            <div class="mt-14 flex items-center justify-center gap-3">

                <span class="h-px w-8 bg-slate-200 dark:bg-slate-800"></span>

                <span class="text-xs font-semibold tracking-[0.16em] text-slate-400 dark:text-slate-500">
                    INDIAN SCIENCE REPORTS
                </span>

                <span class="h-px w-8 bg-slate-200 dark:bg-slate-800"></span>

            </div>

        </main>

    </div>

</div>
