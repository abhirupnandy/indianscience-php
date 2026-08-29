<?php

$navigation = [
    [
        'label' => 'Home',
        'path'  => '',
    ],
    [
        'label' => 'Research Output',
        'path'  => 'reports/research-output',
    ],
    [
        'label' => 'Citations',
        'path'  => 'reports/citations',
    ],
    [
        'label' => 'Collaboration',
        'path'  => 'reports/collaboration',
    ],
    [
        'label' => 'Gender Distribution',
        'path'  => 'reports/gender',
    ],
    [
        'label' => 'Open Access',
        'path'  => 'reports/open-access',
    ],
    [
        'label' => 'More',
        'dropdown' => [
            [
                'label' => 'Social Media Visibility',
                'path'  => 'reports/social-media',
            ],
            [
                'label' => 'Research Grants',
                'path'  => 'reports/grants',
            ],
            [
                'label' => 'SDG related Research',
                'path'  => 'reports/sdg-research',
            ],
            [
                'label' => 'Institutional Reports',
                'path'  => 'institutions',
            ],
        ],
    ],
];

?>

<nav
    x-data="{
        mobileOpen: false,
        moreOpen: false,
        mobileMoreOpen: false
    }"
    @keydown.escape.window="
        mobileOpen = false;
        moreOpen = false;
        mobileMoreOpen = false;
    "
    class="sticky top-0 z-[100] w-full
           border-b border-gray-200
           bg-white/95 shadow-sm backdrop-blur-md
           dark:border-gray-800
           dark:bg-gray-950/95">

    <!-- =========================================================
         BRAND ACCENT
         ========================================================= -->

    <div class="h-1 w-full bg-gradient-to-r
                from-[#FF9933] via-[#1A4D8F] to-[#138808]">
    </div>


    <!-- =========================================================
         MAIN NAVBAR
         ========================================================= -->

    <div class="flex h-16 w-full max-w-full items-center justify-between px-4 sm:px-6 lg:px-8">

        <!-- =====================================================
            LOGO
            ===================================================== -->

        <a
            href="<?= url('') ?>"
            class="group flex shrink-0 items-center gap-3"
            aria-label="Indian Science Reports - Home">

            <!-- Brand Mark -->
            <span
                class="relative flex h-11 w-11 shrink-0 items-center justify-center
                    overflow-hidden rounded-xl
                    bg-gradient-to-br from-[#FF9933] via-[#1A4D8F] to-[#138808]
                    shadow-sm">
                <span
                    class="absolute inset-[2px] flex items-center justify-center
                        rounded-[9px] bg-white dark:bg-gray-950">
                    <span
                        class="text-[11px] font-extrabold tracking-tight
                            text-[#1A4D8F] dark:text-white">
                        ISR
                    </span>
                </span>
            </span>


            <!-- Full Brand Name — Single Line -->
            <span
                class="whitespace-nowrap text-xl font-extrabold tracking-tight
                    text-gray-900 transition-colors
                    dark:text-white
                    sm:text-2xl">
                <span class="text-[#FF9933]">Indian</span>
                <span class="text-[#1A4D8F] dark:text-blue-400"> Science</span>
                <span class="text-[#138808]"> Reports</span>
            </span>

        </a>


        <!-- =====================================================
             DESKTOP NAVIGATION
             ===================================================== -->

        <div class="hidden lg:flex lg:items-center lg:gap-1">

            <?php foreach ($navigation as $item): ?>

                <?php if (isset($item['dropdown'])): ?>

                    <!-- More -->
                    <div
                        class="relative"
                        @click.outside="moreOpen = false">

                        <button
                            type="button"
                            @click="moreOpen = !moreOpen"
                            class="inline-flex items-center gap-1.5 rounded-lg
                                   px-3 py-2 text-base font-medium
                                   text-gray-700 transition
                                   hover:bg-[#FF9933]/10 hover:text-[#1A4D8F]
                                   dark:text-gray-300
                                   dark:hover:bg-gray-800
                                   dark:hover:text-white
                                   md:text-[15px]">

                            <?= e($item['label']) ?>

                            <svg
                                class="h-4 w-4 transition-transform duration-200"
                                :class="{ 'rotate-180': moreOpen }"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m19 9-7 7-7-7" />
                            </svg>

                        </button>


                        <!-- Desktop dropdown -->
                        <div
                            x-show="moreOpen"
                            x-transition
                            class="absolute right-0 top-full z-[9999] mt-2
                                   w-64 rounded-xl border border-gray-200
                                   bg-white p-1.5 shadow-xl
                                   dark:border-gray-700 dark:bg-gray-900"
                            style="display: none;">

                            <?php foreach ($item['dropdown'] as $dropdown): ?>

                                <a
                                    href="<?= url($dropdown['path']) ?>"
                                    class="block rounded-lg px-3 py-2.5 text-base
                                           text-gray-700 transition
                                           hover:bg-[#FF9933]/10
                                           hover:text-[#1A4D8F]
                                           dark:text-gray-300
                                           dark:hover:bg-gray-800
                                           dark:hover:text-white
                                           md:text-[15px]">
                                    <?= e($dropdown['label']) ?>
                                </a>

                            <?php endforeach; ?>

                        </div>

                    </div>

                <?php else: ?>

                    <a
                        href="<?= url($item['path']) ?>"
                        class="rounded-lg px-3 py-2 text-base font-medium
                               text-gray-700 transition
                               hover:bg-[#FF9933]/10
                               hover:text-[#1A4D8F]
                               dark:text-gray-300
                               dark:hover:bg-gray-800
                               dark:hover:text-white
                               md:text-[15px]">
                        <?= e($item['label']) ?>
                    </a>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>


        <!-- =====================================================
             RIGHT SIDE
             ===================================================== -->

        <div class="flex items-center gap-1">

            <!-- Theme toggle -->
            <button
                type="button"
                onclick="toggleTheme()"
                aria-label="Toggle dark mode"
                class="flex h-10 w-10 items-center justify-center
                       rounded-lg text-gray-600 transition
                       hover:bg-[#FF9933]/10 hover:text-[#1A4D8F]
                       dark:text-gray-300
                       dark:hover:bg-gray-800
                       dark:hover:text-white">

                <!-- Moon -->
                <svg
                    class="h-5 w-5 dark:hidden"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 12.79A9 9 0 1 1 11.21 3
                           7 7 0 0 0 21 12.79Z" />
                </svg>

                <!-- Sun -->
                <svg
                    class="hidden h-5 w-5 dark:block"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <circle cx="12" cy="12" r="4" />

                    <path
                        stroke-linecap="round"
                        d="M12 2v2
                           M12 20v2
                           M4.93 4.93l1.41 1.41
                           M17.66 17.66l1.41 1.41
                           M2 12h2
                           M20 12h2
                           M4.93 19.07l1.41-1.41
                           M17.66 6.34l1.41-1.41" />
                </svg>

            </button>


            <!-- Mobile hamburger -->
            <button
                type="button"
                @click="mobileOpen = true"
                aria-label="Open navigation"
                class="flex h-10 w-10 items-center justify-center
                       rounded-lg text-gray-700 transition
                       hover:bg-[#FF9933]/10
                       hover:text-[#1A4D8F]
                       dark:text-gray-300
                       dark:hover:bg-gray-800
                       lg:hidden">

                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

            </button>

        </div>

    </div>


    <!-- =========================================================
         MOBILE NAVIGATION
         ========================================================= -->

    <!-- Overlay -->
    <div
        x-show="mobileOpen"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileOpen = false"
        class="fixed inset-0 z-[9998] bg-black/60 lg:hidden"
        style="display: none;"></div>


    <!-- Full-page mobile sidebar -->
    <aside
        x-show="mobileOpen"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in duration-250"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-y-0 right-0 z-[9999] flex h-dvh w-full
               flex-col overflow-hidden bg-white
               dark:bg-gray-950 lg:hidden"
        style="display: none;"
        aria-label="Mobile navigation">

        <!-- Sidebar header -->
        <div
            class="flex h-16 shrink-0 items-center justify-between
                   border-b border-gray-200 px-4
                   dark:border-gray-800">

            <a
                href="<?= url('') ?>"
                @click="mobileOpen = false"
                class="flex items-center gap-3">

                <!-- Mobile brand mark -->
                <span
                    class="relative flex h-9 w-9 items-center justify-center
                           overflow-hidden rounded-lg
                           bg-gradient-to-br from-[#FF9933]
                           via-[#1A4D8F] to-[#138808]">
                    <span
                        class="absolute inset-[2px] flex items-center justify-center
                               rounded-[7px] bg-white dark:bg-gray-950">
                        <span
                            class="text-[10px] font-extrabold
                                   text-[#1A4D8F] dark:text-white">
                            ISR
                        </span>
                    </span>
                </span>

                <span class="flex flex-col leading-tight">
                    <span
                        class="text-base font-extrabold
                               text-gray-900 dark:text-white">
                        Indian
                        <span class="text-[#FF9933]">Science</span>
                    </span>

                    <span
                        class="text-[9px] font-semibold uppercase
                               tracking-[0.16em] text-[#138808]">
                        Reports
                    </span>
                </span>

            </a>


            <!-- Close -->
            <button
                type="button"
                @click="mobileOpen = false"
                aria-label="Close navigation"
                class="flex h-10 w-10 items-center justify-center
                       rounded-lg text-gray-600 transition
                       hover:bg-[#FF9933]/10
                       hover:text-[#1A4D8F]
                       dark:text-gray-300
                       dark:hover:bg-gray-800">

                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12" />
                </svg>

            </button>

        </div>


        <!-- =====================================================
             MOBILE LINKS
             ===================================================== -->

        <div class="flex-1 overflow-y-auto overscroll-contain px-4 py-5">

            <div class="space-y-1">

                <?php foreach ($navigation as $item): ?>

                    <?php if (isset($item['dropdown'])): ?>

                        <!-- More -->
                        <div>

                            <button
                                type="button"
                                @click="mobileMoreOpen = !mobileMoreOpen"
                                class="flex w-full items-center justify-between
                                       rounded-xl px-4 py-3.5 text-left
                                       text-base font-medium
                                       text-gray-800 transition
                                       hover:bg-[#FF9933]/10
                                       hover:text-[#1A4D8F]
                                       dark:text-gray-200
                                       dark:hover:bg-gray-800
                                       sm:text-lg">

                                <span>
                                    <?= e($item['label']) ?>
                                </span>

                                <svg
                                    class="h-5 w-5 transition-transform duration-200"
                                    :class="{ 'rotate-180': mobileMoreOpen }"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m19 9-7 7-7-7" />
                                </svg>

                            </button>


                            <!-- More children -->
                            <div
                                x-show="mobileMoreOpen"
                                x-transition
                                class="mt-1 space-y-1 border-l-2
                                       border-[#FF9933] pl-3"
                                style="display: none;">

                                <?php foreach ($item['dropdown'] as $dropdown): ?>

                                    <a
                                        href="<?= url($dropdown['path']) ?>"
                                        @click="mobileOpen = false"
                                        class="block rounded-lg px-4 py-3
                                               text-sm text-gray-600
                                               transition
                                               hover:bg-[#FF9933]/10
                                               hover:text-[#1A4D8F]
                                               dark:text-gray-400
                                               dark:hover:bg-gray-800
                                               dark:hover:text-white
                                               sm:text-base">
                                        <?= e($dropdown['label']) ?>
                                    </a>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    <?php else: ?>

                        <a
                            href="<?= url($item['path']) ?>"
                            @click="mobileOpen = false"
                            class="block rounded-xl px-4 py-3.5
                                   text-base font-medium
                                   text-gray-800 transition
                                   hover:bg-[#FF9933]/10
                                   hover:text-[#1A4D8F]
                                   dark:text-gray-200
                                   dark:hover:bg-gray-800
                                   dark:hover:text-white
                                   sm:text-lg">
                            <?= e($item['label']) ?>
                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        </div>


        <!-- Mobile footer -->
        <div
            class="shrink-0 border-t border-gray-200 px-4 py-4
                   dark:border-gray-800">

            <button
                type="button"
                onclick="toggleTheme()"
                class="flex w-full items-center justify-center gap-2
                       rounded-xl border border-gray-200 px-4 py-3
                       text-sm font-medium text-gray-700
                       transition hover:bg-[#FF9933]/10
                       hover:text-[#1A4D8F]
                       dark:border-gray-700
                       dark:text-gray-300
                       dark:hover:bg-gray-800">

                <svg
                    class="h-5 w-5 dark:hidden"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 12.79A9 9 0 1 1 11.21 3
                           7 7 0 0 0 21 12.79Z" />
                </svg>

                <svg
                    class="hidden h-5 w-5 dark:block"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <circle cx="12" cy="12" r="4" />

                    <path
                        stroke-linecap="round"
                        d="M12 2v2
                           M12 20v2
                           M4.93 4.93l1.41 1.41
                           M17.66 17.66l1.41 1.41
                           M2 12h2
                           M20 12h2" />
                </svg>

                <span>
                    Toggle theme
                </span>

            </button>

        </div>

    </aside>

</nav>


<script>
    function toggleTheme() {
        const html = document.documentElement;

        const isDark = html.classList.toggle('dark');

        localStorage.setItem(
            'theme',
            isDark ? 'dark' : 'light'
        );
    }
</script>