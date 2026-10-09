<?php
$pageTitle = 'About';

$pageDescription =
        'About the Indian Science Reports Portal';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => 'About',
        'path' => null,
    ],
];

$sections = [
    'About the portal',

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
                                        class="<?= $index ===
                                        count($breadcrumbs) - 1
                                                ? 'font-medium text-gray-900 dark:text-white'
                                                : '' ?>">
                                    <?= e($breadcrumb['label']) ?>
                                </span>

                            <?php } ?>


                            <?php if ($index < count($breadcrumbs) - 1) { ?>

                                <svg
                                        class="h-4 w-4 shrink-0 text-gray-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
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
                       text-gray-900
                       sm:text-4xl
                       dark:text-white">
                <?= e($pageTitle) ?>
            </h1>


            <!-- Description -->
            <p
                    class="mt-4 max-w-4xl text-base leading-7
                       text-gray-600
                       sm:text-lg sm:leading-8
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
                       text-gray-700
                       dark:text-gray-300">

                <section
                        id="about-the-portal"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        About the portal
                    </h2>

                    <p class="mt-4">
                        The Indian Science Reports portal is a repository of various quantitative indicators of Indian
                        Scientific research during the period 2010-19. While some indicator values (namely, TP, TC and
                        Cited %) are taken from the scholarly database Dimensions, most of the other indicators are
                        computed by using standard Scientometric methods. Some values (such as x and x(g) index) are
                        computed by using network-based and text-based analytical methods. Relevant comparisons with
                        other major countries are also provided.<br/>
                        The main objective of the portal is to provide a glance at indicators and values related to
                        Indian research output, both overall and from different institutions. The analysis
                        presented shows indicators about research output, citations, authorship, international
                        collaboration, gender distribution, open access, research grants and social media visibility
                        etc. for the Indian research output during 2010-19. The portal also includes institutional
                        reports on these indicators for 1000 Indian institutions, which have significant amount of
                        research output during the period.<br/>
                        The portal does not, in any way, attempts to do any kind of research performance assessment or
                        ranking of one or more Indian institutions. Therefore, it should not be viewed as research
                        performance assessment exercise, which would require a lot of more data (such as number of
                        researchers, research budget, research facilities etc.) and several normalizations (such as
                        publications per capita, output per unit of funding etc.). The portal can be best viewed as an
                        academic exercise to provide useful quantitative indicators & values of Indian scientific
                        research, both at the level of the country and at the level of individual institutions.<br/>
                        The access to the
                        <a href="https://www.dimensions.ai/" class="text-amber-500 font-bold">Dimensions</a>
                        and
                        <a href='https://www.altmetric.com/' class='text-amber-500 font-bold'>Altmetric</a>
                        data for use on this portal was provided by the
                        <a href="https://www.digital-science.com/" class='text-amber-500 font-bold'>Digital Science
                        </a> team. The Indian Science Reports team thanks them for their support.
                        Individuals/ Organisations interested in a more detailed analysis or research related data for
                        their organisation may contact them
                        <a href="https://www.digital-science.com/contact-us/talk-to-an-expert/"
                           class='text-amber-500 font-bold'>here</a>.<br/>
                        The development of this portal has been partially supported by an extra-mural research project
                        titled 'Design of a Computational Framework for discipline-wise and Thematic mapping of Research
                        Performance of Indian Higher Education Institutions' from the NSTMIS division, Department of
                        Science and Technology (DST), Government of India.
                    </p>
                </section>

            </article>


            <!-- =================================================
                 RIGHT SIDEBAR
                 ================================================= -->

            <aside
                    class="lg:sticky lg:top-24 lg:self-start">

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
                                <?php foreach (
                                    $sections as $index => $section
                                ) { ?>
                                    <li>
                                        <a
                                                href="#<?= e(
                                                    strtolower(
                                                        preg_replace(
                                                            '/[^a-z0-9]+/i',
                                                            '-',
                                                            $section,
                                                        ),
                                                    ),
                                                ) ?>"
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
                               dark:border-gray-800"></div>


                </div>

            </aside>

        </div>

    </section>

</div>