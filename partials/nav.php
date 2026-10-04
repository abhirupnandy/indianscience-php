
<?php

$navigation = [
    ['label' => 'Home', 'path' => ''],
    ['label' => 'Research Output', 'path' => 'reports/research-output'],
    ['label' => 'Citations', 'path' => 'reports/citations'],
    ['label' => 'Collaboration', 'path' => 'reports/collaboration'],
    ['label' => 'Gender Distribution', 'path' => 'reports/gender'],
    ['label' => 'Open Access', 'path' => 'reports/open-access'],
    [
        'label' => 'More',
        'dropdown' => [
            ['label' => 'Social Media Visibility', 'path' => 'reports/social-media'],
            ['label' => 'Research Grants', 'path' => 'reports/grants'],
            ['label' => 'SDG related Research', 'path' => 'reports/sdg-research'],
            ['label' => 'Institutional Reports', 'path' => 'institutions'],
        ],
    ],
];

$socialLinks = [
    ['label' => 'Facebook', 'url' => 'https://facebook.com/indianscienceReports', 'icon' => 'facebook'],
    ['label' => 'Twitter / X', 'url' => 'https://twitter.com/indianscienceReports', 'icon' => 'twitter'],
    ['label' => 'LinkedIn', 'url' => 'https://linkedin.com/company/indianscienceReports', 'icon' => 'linkedin'],
];

function socialIcon(string $icon): string
{
    return match ($icon) {
        'facebook' => '<svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.44 2.91h-2.34V22c4.78-.76 8.44-4.92 8.44-9.94Z"/></svg>',

        'twitter' => '<svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231ZM17.083 19.77h1.833L7.084 4.126H5.117Z"/></svg>',

        'linkedin' => '<svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M20.45 20.45h-3.56v-5.58c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.68H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45Z"/></svg>',

        default => '',
    };
}

?>

<nav
    x-data="{ mobileOpen:false, moreOpen:false, mobileMoreOpen:false }"
    @keydown.escape.window="
        mobileOpen=false;
        moreOpen=false;
        mobileMoreOpen=false;
    "
    class="sticky top-0 z-[100] w-full
           border-b border-slate-200
           bg-white/95 shadow-sm backdrop-blur-md
           dark:border-slate-800 dark:bg-slate-950/95">

    <!-- Tricolour accent -->
    <div class="h-1 bg-gradient-to-r from-[#FF9933] via-[#1A4D8F] to-[#138808]"></div>


    <!-- =========================================================
         TOP ROW
         Brand + Social + Theme
         ========================================================= -->

    <div class="hidden border-b border-slate-100 dark:border-slate-900 lg:block">

        <div class="mx-auto flex max-w-7xl items-center
                    justify-between px-6 py-3 xl:px-8">

            <!-- Brand -->
            <a href="<?= url('') ?>"
                class="flex items-center gap-3"
                aria-label="Indian Science Reports - Home">

                <span class="flex h-11 w-11 items-center justify-center
                             rounded-xl bg-gradient-to-br
                             from-[#FF9933] via-[#1A4D8F] to-[#138808]">

                    <span class="flex h-[calc(100%-4px)] w-[calc(100%-4px)]
                                 items-center justify-center rounded-[9px]
                                 bg-white dark:bg-slate-950">

                        <span class="text-[11px] font-extrabold text-[#1A4D8F] dark:text-white">
                            ISR
                        </span>

                    </span>
                </span>

                <span class="font-display text-2xl font-medium tracking-tight
                             text-slate-950 dark:text-white xl:text-3xl">
                    Indian
                    <span class="italic text-amber-500">Science</span>
                    Reports
                </span>

            </a>


            <!-- Social + Theme -->
            <div class="flex items-center gap-1">

                <?php foreach ($socialLinks as $social): ?>

                    <a href="<?= e($social['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="<?= e($social['label']) ?>"
                        class="flex h-9 w-9 items-center justify-center
                              rounded-full text-slate-500
                              hover:bg-amber-50 hover:text-slate-950
                              dark:text-slate-400 dark:hover:bg-slate-800
                              dark:hover:text-white">

                        <?= socialIcon($social['icon']) ?>

                    </a>

                <?php endforeach; ?>


                <!-- Divider -->
                <span class="mx-2 h-5 w-px bg-slate-200 dark:bg-slate-700"></span>


                <!-- Theme -->
                <button
                    type="button"
                    onclick="toggleTheme()"
                    aria-label="Toggle dark mode"
                    class="flex h-9 w-9 items-center justify-center
                           rounded-full text-slate-500
                           hover:bg-amber-50 hover:text-slate-950
                           dark:text-slate-400 dark:hover:bg-slate-800
                           dark:hover:text-white">

                    <svg class="h-5 w-5 dark:hidden"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round"
                            d="M21 12.79A9 9 0 1 1 11.21 3
                                 7 7 0 0 0 21 12.79Z" />
                    </svg>

                    <svg class="hidden h-5 w-5 dark:block"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="4" />
                        <path stroke-linecap="round"
                            d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41
                                 M17.66 17.66l1.41 1.41M2 12h2M20 12h2
                                 M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- =========================================================
         MAIN NAVIGATION
         ========================================================= -->

    <div class="flex h-16 items-center px-4 sm:px-6 lg:px-8">

        <!-- Mobile brand -->
        <a href="<?= url('') ?>"
            class="flex items-center gap-3 lg:hidden">

            <span class="flex h-10 w-10 items-center justify-center
                         rounded-lg bg-gradient-to-br
                         from-[#FF9933] via-[#1A4D8F] to-[#138808]">

                <span class="flex h-[calc(100%-4px)] w-[calc(100%-4px)]
                             items-center justify-center rounded-[7px]
                             bg-white dark:bg-slate-950">

                    <span class="text-[10px] font-extrabold text-[#1A4D8F] dark:text-white">
                        ISR
                    </span>

                </span>

            </span>

            <span class="font-display text-lg font-medium text-slate-950 dark:text-white">
                Indian <span class="italic text-amber-500">Science</span> Reports
            </span>

        </a>


        <!-- CENTRED DESKTOP NAV -->
        <div class="hidden flex-1 items-center justify-center lg:flex">

            <div class="flex items-center gap-1">

                <?php foreach ($navigation as $item): ?>

                    <?php if (isset($item['dropdown'])): ?>

                        <div class="relative" @click.outside="moreOpen=false">

                            <button
                                type="button"
                                @click="moreOpen=!moreOpen"
                                class="inline-flex items-center gap-1.5 rounded-lg
                                       px-3 py-2 text-[15px] font-medium
                                       text-slate-700 hover:bg-indigo-50
                                       hover:text-slate-950
                                       dark:text-slate-300
                                       dark:hover:bg-slate-800
                                       dark:hover:text-white">

                                <?= e($item['label']) ?>

                                <svg class="h-4 w-4 transition"
                                    :class="{ 'rotate-180': moreOpen }"
                                    fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m19 9-7 7-7-7" />
                                </svg>

                            </button>

                            <div
                                x-show="moreOpen"
                                x-transition
                                style="display:none"
                                class="absolute left-0 top-full z-[9999]
                                       mt-2 w-64 rounded-xl
                                       border border-slate-200 bg-white p-1.5
                                       shadow-xl dark:border-slate-700
                                       dark:bg-slate-900">

                                <?php foreach ($item['dropdown'] as $dropdown): ?>

                                    <a href="<?= url($dropdown['path']) ?>"
                                        class="block rounded-lg px-3 py-2.5
                                              text-[15px] text-slate-700
                                              hover:bg-indigo-50
                                              dark:text-slate-300
                                              dark:hover:bg-slate-800
                                              dark:hover:text-white">

                                        <?= e($dropdown['label']) ?>

                                    </a>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    <?php else: ?>

                        <a href="<?= url($item['path']) ?>"
                            class="rounded-lg px-3 py-2 text-[15px] font-medium
                                  text-slate-700 hover:bg-indigo-50
                                  hover:text-slate-950
                                  dark:text-slate-300
                                  dark:hover:bg-slate-800
                                  dark:hover:text-white">

                            <?= e($item['label']) ?>

                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        </div>


        <!-- Mobile menu -->
        <button
            type="button"
            @click="mobileOpen=true"
            aria-label="Open navigation"
            class="ml-auto flex h-10 w-10 items-center justify-center
                   rounded-lg text-slate-700 hover:bg-amber-50
                   dark:text-slate-300 dark:hover:bg-slate-800 lg:hidden">

            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </button>

    </div>


    <!-- =========================================================
         MOBILE MENU
         ========================================================= -->

    <div
        x-show="mobileOpen"
        x-transition
        @click="mobileOpen=false"
        class="fixed inset-0 z-[9998] bg-black/60 lg:hidden"
        style="display:none">
    </div>


    <aside
        x-show="mobileOpen"
        x-transition
        class="fixed inset-y-0 right-0 z-[9999]
               flex h-dvh w-full flex-col
               bg-white dark:bg-slate-950 lg:hidden"
        style="display:none">

        <!-- Mobile header -->
        <div class="flex h-16 items-center justify-between
                    border-b border-slate-200 px-4
                    dark:border-slate-800">

            <a href="<?= url('') ?>"
                @click="mobileOpen=false"
                class="font-display text-lg font-medium text-slate-950 dark:text-white">

                Indian <span class="italic text-amber-500">Science</span> Reports

            </a>

            <button
                type="button"
                @click="mobileOpen=false"
                class="flex h-10 w-10 items-center justify-center rounded-lg
                       text-slate-600 hover:bg-amber-50
                       dark:text-slate-300 dark:hover:bg-slate-800">

                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round"
                        d="M6 18 18 6M6 6l12 12" />
                </svg>

            </button>

        </div>


        <!-- Links -->
        <div class="flex-1 overflow-y-auto px-4 py-5">

            <div class="space-y-1">

                <?php foreach ($navigation as $item): ?>

                    <?php if (isset($item['dropdown'])): ?>

                        <button
                            type="button"
                            @click="mobileMoreOpen=!mobileMoreOpen"
                            class="flex w-full items-center justify-between
                                   rounded-xl px-4 py-3.5 text-left
                                   font-medium text-slate-800
                                   hover:bg-amber-50
                                   dark:text-slate-200
                                   dark:hover:bg-slate-800">

                            <?= e($item['label']) ?>

                            <svg class="h-5 w-5 transition"
                                :class="{ 'rotate-180': mobileMoreOpen }"
                                fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m19 9-7 7-7-7" />
                            </svg>

                        </button>


                        <div
                            x-show="mobileMoreOpen"
                            x-transition
                            class="ml-4 border-l-2 border-amber-400 pl-3"
                            style="display:none">

                            <?php foreach ($item['dropdown'] as $dropdown): ?>

                                <a href="<?= url($dropdown['path']) ?>"
                                    @click="mobileOpen=false"
                                    class="block rounded-lg px-4 py-3
                                          text-slate-600 hover:bg-amber-50
                                          dark:text-slate-400
                                          dark:hover:bg-slate-800">

                                    <?= e($dropdown['label']) ?>

                                </a>

                            <?php endforeach; ?>

                        </div>

                    <?php else: ?>

                        <a href="<?= url($item['path']) ?>"
                            @click="mobileOpen=false"
                            class="block rounded-xl px-4 py-3.5
                                  font-medium text-slate-800
                                  hover:bg-amber-50
                                  dark:text-slate-200
                                  dark:hover:bg-slate-800">

                            <?= e($item['label']) ?>

                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        </div>


        <!-- Mobile footer -->
        <div class="border-t border-slate-200 px-4 py-4
                    dark:border-slate-800">

            <div class="flex items-center justify-center gap-3">

                <?php foreach ($socialLinks as $social): ?>

                    <a href="<?= e($social['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="<?= e($social['label']) ?>"
                        class="flex h-10 w-10 items-center justify-center
                              rounded-full text-slate-500
                              hover:bg-amber-50
                              dark:text-slate-400
                              dark:hover:bg-slate-800">

                        <?= socialIcon($social['icon']) ?>

                    </a>

                <?php endforeach; ?>


                <span class="mx-1 h-5 w-px bg-slate-200 dark:bg-slate-700"></span>


                <button
                    type="button"
                    onclick="toggleTheme()"
                    aria-label="Toggle dark mode"
                    class="flex h-10 w-10 items-center justify-center
                           rounded-full text-slate-500
                           hover:bg-amber-50
                           dark:text-slate-400
                           dark:hover:bg-slate-800">

                    <svg class="h-5 w-5 dark:hidden"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round"
                            d="M21 12.79A9 9 0 1 1 11.21 3
                                 7 7 0 0 0 21 12.79Z" />
                    </svg>

                    <svg class="hidden h-5 w-5 dark:block"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="4" />
                        <path stroke-linecap="round"
                            d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41
                                 M17.66 17.66l1.41 1.41M2 12h2M20 12h2" />
                    </svg>

                </button>

            </div>

        </div>

    </aside>

</nav>


<script>
    function toggleTheme() {
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    }
</script>