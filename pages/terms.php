<?php
$pageTitle = 'Terms';

$pageDescription =
        'Terms of Use of the Indian Science Reports Portal';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => 'Terms of Use',
        'path' => null,
    ],
];

$sections = [
    'Terms of Use',

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
                        id="citations-received-by-indian-research-output-during-2010-2019"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Terms of Use
                    </h2>
                    <p class='mt-4'>
                        The Indian Science reports portal is an academic exercise with the sole purpose of providing
                        useful quantitative indicators & values of Indian scientific research. It should, therefore,
                        be used for academic purposes only and should not be seen as an attempt for research performance
                        assessment of India as a country or any Indian institution covered. The portal is designed
                        and maintained on a not-for-profit basis and is free for access by all interested researchers,
                        academicians and individuals.<br/>
                        The data for analysis is obtained from multiple sources and processed using standard
                        scientometric, computational, network-theoretic and text-based methods. The
                        <a href='https://app.dimensions.ai/discover/publication' class='text-amber-500 font-bold'>
                                Dimensions</a>
                        scholarly database is taken as primary source of research metadata and inputs from several
                        other sources such as <a href='https://www.altmetric.com/' class="text-amber-500 font-bold">
                                Altmetric.com</a>
                        and
                        <a href='https://gender-api.com/' class='text-amber-500 font-bold'>Gender API</a>
                        etc. are also used. The portal only
                        provides computed indicators of Indian scientific research and does not in any way expose
                        any data taken from the different sources.<br />
                        The portal is free to use by any interested individual, and it is clearly stated that the
                        portal does not capture any private data of the viewers, except any feedback forms that
                        they may submit optionally. The designers of the portal have obtained data from multiple
                        sources containing metadata about scientific research and computed various indicators by
                        using standard scientometric approaches and methods. The designers, therefore, cannot
                        provide any certificate of accuracy of the data so obtained, as it is something beyond
                        the scope. The indicators & values are best suited to be used only for academic reference
                        purposes and should not be used for any commercial or non-commercial research performance
                        assessment and/ or ranking & evaluation purposes.
                        <br/>
                        Please cite the following article whenever using any of the results from the portal :
                        <br/>
                        <?php include 'partials/cite_us.php'?>
                        For any further details about the data, please contact the <a href='https://app.dimensions.ai/discover/publication' class='text-amber-500 font-bold'>
                                Dimensions</a> Team and the Altmetric Team
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