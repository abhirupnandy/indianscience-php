<?php

$pageTitle = 'Our Team';

$pageDescription =
        'Meet the people behind Indian Science Reports and the work that supports its research analytics and institutional insights.';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => 'Our Team',
        'path' => null,
    ],
];

$sections = [
    'Team leader',
    'Team members',
];

/*
|--------------------------------------------------------------------------
| Team data
|--------------------------------------------------------------------------
| Replace the placeholder values with actual team details.
|
| photo: Relative URL or root-relative path to the photograph.
|        Set to null to display initials instead.
| bio:   Optional short biography.
*/

$teamLeader = [
    'name' => 'Vivek Kumar Singh',
    'role' => 'Professor',
    'initials' => 'VKS',
    'photo' => 'https://indianscience.net/images/vivek.jpg',
    'bio' => 'I lead the Text Analytics Research Group with very bright members interested in working on different aspects of Text Analytics, Information Retrieval, Sciento-text, NLP, Scientometrics, Social Media Data Analytics.',
];

$teamMembers = [
    [
        'name' => 'Hiran H. Lathabai',
        'role' => 'Research Associate',
        'initials' => 'H.H.L',
        'photo' => 'https://indianscience.net/images/team/uploads/hiran.jpg',
        'bio' => 'My core research interest lies in Scientometrics and S&T policy. Other areas of interest/expertise are Technology management (including technological forecasting), Complex network analysis, Data mining, Systems engineering, etc.',
    ],
    [
        'name' => 'Mousumi Karmakar',
        'role' => 'Research Scholar',
        'initials' => 'MK',
        'photo' => 'https://indianscience.net/images/team/uploads/mousumi.png',
        'bio' => 'My work is focused on computational assessment of research output from various social media platforms. My research interests are mainly Altmetrics, Scientometrics, and Text Analysis.',
    ],
    [
        'name' => 'Abhirup Nandy',
        'role' => 'Research Scholar',
        'initials' => 'AN',
        'photo' => 'https://indianscience.net/images/team/uploads/abhirup.png',
        'bio' => 'I am currently working on the field of Text-based algorithms in Scientometrics. Also working with citation metrics like Bibliographic Coupling and Expertise Index',
    ],
    [
        'name' => 'Satya Swarup',
        'role' => 'Researcher',
        'initials' => 'SS',
        'photo' => 'https://indianscience.net/images/team/uploads/satya.png',
        'bio' => 'Currently, I am working on public health improvement with ML and AI tools. My interests are focused on the areas of Data Science, Computer Vision and Scientometrics.',
    ],
    [
        'name' => 'Prashasti Singh',
        'role' => 'Research Scholar',
        'initials' => 'PS',
        'photo' => 'https://indianscience.net/images/team/uploads/prashasti.png',
        'bio' => 'I am a Doctoral Research Scholar at the Deptt of CS, ISc Banaras Hindu University. I am actively involved in research covering various aspects of Scholarly databases, coverage and retrieval in scholarly databases, metadata evaluation and scientometric studies.',
    ],
    [
        'name' => 'Aakash Singh',
        'role' => 'Research Scholar',
        'initials' => 'AS',
        'photo' => 'https://indianscience.net/images/team/uploads/aakash.jpg',
        'bio' => "I am currently pursuing my Ph.D. in area of Artificial Intelligence for Social Good. I further have 3 years of working experience from India's topmost research institution DRDO. My other areas of interest are Deep learning, Natural language processing, Web development and scraping.",
    ],
];

?>

<div class="w-full max-w-full">

    <!-- =========================================================
         PAGE HEADER
         ========================================================= -->

    <section
            class="border-b border-gray-200 bg-gray-50
               dark:border-gray-800 dark:bg-gray-900/50">

        <div
                class="mx-auto w-full max-w-7xl px-4 py-10
                   sm:px-6 sm:py-12
                   lg:px-8 lg:py-14">

            <!-- Breadcrumb -->
            <nav
                    aria-label="Breadcrumb"
                    class="mb-5">

                <ol
                        class="flex flex-wrap items-center gap-x-2 gap-y-1
                           text-sm text-gray-500
                           dark:text-gray-400">

                    <?php foreach ($breadcrumbs as $index => $breadcrumb) { ?>

                        <li class="flex items-center gap-2">

                            <?php if ($breadcrumb['path'] !== null) { ?>

                                <a
                                        href="<?= url($breadcrumb['path']) ?>"
                                        class="transition hover:text-gray-900
                                           dark:hover:text-white">

                                    <?= e($breadcrumb['label']) ?>

                                </a>

                            <?php } else { ?>

                                <span
                                        class="font-medium text-gray-900
                                           dark:text-white">

                                    <?= e($breadcrumb['label']) ?>

                                </span>

                            <?php } ?>

                            <?php if ($index < count($breadcrumbs) - 1) { ?>

                                <svg
                                        class="h-4 w-4 shrink-0 text-gray-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        aria-hidden="true">

                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m9 5 7 7-7 7"/>

                                </svg>

                            <?php } ?>

                        </li>

                    <?php } ?>

                </ol>

            </nav>

            <!-- Title -->
            <h1
                    class="text-3xl font-bold tracking-tight
                       text-gray-900 sm:text-4xl
                       dark:text-white">

                <?= e($pageTitle) ?>

            </h1>

            <!-- Description -->
            <p
                    class="mt-4 max-w-4xl text-base leading-7
                       text-gray-600 sm:text-lg sm:leading-8
                       dark:text-gray-400">

                <?= e($pageDescription) ?>

            </p>

        </div>

    </section>


    <!-- =========================================================
         MAIN CONTENT + SIDEBAR
         ========================================================= -->

    <section class="w-full">

        <div
                class="mx-auto grid w-full max-w-7xl grid-cols-1
                   gap-10 px-4 py-10
                   sm:px-6 sm:py-12
                   lg:grid-cols-[minmax(0,1fr)_280px]
                   lg:gap-14 lg:px-8 lg:py-14">


            <!-- =================================================
                 MAIN CONTENT
                 ================================================= -->

            <article
                    class="min-w-0 max-w-none text-base leading-7
                       text-gray-700 dark:text-gray-300">


                <!-- Introduction -->
                <section class="mb-10">

                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900 dark:text-white">

                        Meet the team

                    </h2>

                    <p class="mt-4 max-w-3xl">

                        Indian Science Reports brings together a team
                        working on the analysis, interpretation, and
                        presentation of Indian research output. Meet
                        the people contributing to the portal and its
                        research assessment initiatives.

                    </p>

                </section>


                <!-- =================================================
                     TEAM LEADER
                     ================================================= -->

                <section
                        id="team-leader"
                        class="scroll-mt-24">

                    <div class="mb-5">

                        <h2
                                class="text-xl font-bold tracking-tight
                                   text-gray-900 dark:text-white">

                            Team leader

                        </h2>

                        <p
                                class="mt-2 text-sm leading-6
                                   text-gray-600 dark:text-gray-400">

                            Leadership and direction.

                        </p>

                    </div>

                    <?php
                    partial('team-member-card', [
                        'member' => $teamLeader,
                        'featured' => true,
                    ]);
?>

                </section>


                <!-- =================================================
                     TEAM MEMBERS
                     ================================================= -->

                <section
                        id="team-members"
                        class="mt-12 scroll-mt-24">

                    <div
                            class="mb-5 flex flex-wrap items-end
                               justify-between gap-3">

                        <div>

                            <h2
                                    class="text-xl font-bold tracking-tight
                                       text-gray-900 dark:text-white">

                                Team members

                            </h2>

                            <p
                                    class="mt-2 text-sm leading-6
                                       text-gray-600 dark:text-gray-400">

                                The people behind the work.

                            </p>

                        </div>

                        <span
                                class="inline-flex items-center rounded-full
                                   border border-gray-200 bg-white
                                   px-3 py-1 text-xs font-medium
                                   text-gray-600
                                   dark:border-gray-800 dark:bg-gray-900
                                   dark:text-gray-400">

                            <?= count($teamMembers) ?> members

                        </span>

                    </div>


                    <!-- Member cards -->
                    <div
                            class="grid grid-cols-1 gap-5
                               sm:grid-cols-2
                               xl:grid-cols-3">

                        <?php foreach ($teamMembers as $member) { ?>

                            <?php
        partial('team-member-card', [
            'member' => $member,
            'featured' => false,
        ]);
                            ?>

                        <?php } ?>

                    </div>

                </section>


            </article>


            <!-- =================================================
                 RIGHT SIDEBAR
                 ================================================= -->

            <aside class="lg:sticky lg:top-24 lg:self-start">

                <div
                        class="overflow-hidden rounded-2xl border
                           border-gray-200 bg-white
                           dark:border-gray-800 dark:bg-gray-900">


                    <!-- On this page -->
                    <div class="p-5">

                        <h3
                                class="text-sm font-semibold uppercase
                                   tracking-wider text-gray-900
                                   dark:text-white">

                            On this page

                        </h3>

                        <nav class="mt-4">

                            <ul class="space-y-1">

                                <?php foreach ($sections as $section) { ?>

                                    <?php
                                    $sectionId = strtolower(
                                        preg_replace(
                                            '/[^a-z0-9]+/i',
                                            '-',
                                            $section,
                                        ),
                                    );
                                    ?>

                                    <li>

                                        <a
                                                href="#<?= e($sectionId) ?>"
                                                class="block rounded-lg px-3 py-2
                                                   text-sm leading-5
                                                   text-gray-600 transition
                                                   hover:bg-gray-100
                                                   hover:text-gray-900
                                                   dark:text-gray-400
                                                   dark:hover:bg-gray-800
                                                   dark:hover:text-white">

                                            <?= e($section) ?>

                                        </a>

                                    </li>

                                <?php } ?>

                            </ul>

                        </nav>

                    </div>


                    <!-- Divider -->
                    <div
                            class="border-t border-gray-200
                               dark:border-gray-800">
                    </div>


                    <!-- Team information -->
                    <div class="p-5">

                        <h3
                                class="text-sm font-semibold uppercase
                                   tracking-wider text-gray-900
                                   dark:text-white">

                            Our team

                        </h3>

                        <p
                                class="mt-3 text-sm leading-6
                                   text-gray-600 dark:text-gray-400">

                            A team of <?= count($teamMembers) + 1 ?>
                            contributors working towards the analysis
                            and reporting of Indian scientific research.

                        </p>

                    </div>

                </div>

            </aside>


        </div>

    </section>

</div>

<script>
    (() => {
        if (window.teamCardFlipInitialised) return;
        window.teamCardFlipInitialised = true;

        document.addEventListener('click', (event) => {
            const button = event.target.closest(
                '[data-team-card-toggle]'
            );

            if (!button) return;

            const card = button.closest('[data-team-card]');
            const inner = card?.querySelector(
                '[data-team-card-inner]'
            );
            const back = card?.querySelector(
                '[data-team-card-back]'
            );

            if (!inner || !back) return;

            const isFlipped =
                button.getAttribute('aria-expanded') === 'true';

            const nextState = !isFlipped;

            inner.style.transform = nextState
                ? 'rotateY(180deg)'
                : 'rotateY(0deg)';

            button.setAttribute(
                'aria-expanded',
                String(nextState)
            );

            button.setAttribute(
                'aria-label',
                `${nextState ? 'Hide details for' : 'View details for'} ${
                    button.getAttribute('aria-label')
                        ?.replace(/^(View details for|Hide details for)\s+/, '')
                }`
            );

            back.setAttribute(
                'aria-hidden',
                String(!nextState)
            );

            if (nextState) {
                back.removeAttribute('inert');
            } else {
                back.setAttribute('inert', '');
            }
        });
    })();
</script>
