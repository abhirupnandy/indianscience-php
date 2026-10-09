<?php
$pageTitle = 'Data & Methodology';

$pageDescription =
        'The data used in the Indian Science Reports Portal';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => 'Data & Methodology',
        'path' => null,
    ],
];

$sections = [
    'Data & Methodology',

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
                        id="data-methodology"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Data & Methodology
                    </h2>
                        <p class='mt-4'>
                            The Indian Science Reports portal provides indicators &amp; values about research output,
                            citations, authorship,
                            international collaboration, gender distribution, open access, research grants and social
                            media visibility etc.
                            for the Indian research output during 2010-19. The portal not only present analytical
                            results about Indian
                            research but also compares the values with related values for some other major countries.
                            The portal also
                            includes institutional reports containing different analysis for 1000 Indian institutions.
                        <br />
                            The data for analysis is obtained from multiple sources and processed using standard
                            scientometric,
                            computational, network-theoretic and text-based methods. The
                            <a href='https://app.dimensions.ai/discover/publication' class='text-amber-500 font-bold'>
                                Dimensions</a>
                            scholarly database is taken as
                            primary source of research metadata and inputs from several other sources such as
                            <a href='https://www.altmetric.com/' class="text-amber-500 font-bold">
                                Altmetric.com</a>
                            and
                            <a href='https://gender-api.com/' class="text-amber-500 font-bold">
                                Gender API</a>
                            etc. are also used. The portal only provides computed indicators of Indian scientific
                            research
                            and does not in any way expose any data taken from the different sources.
                        <br />
                            In terms of methodological approach choices, we have used whole counting for research output
                            values.
                            The citations are analysed both as absolute counts as well as relative citation ratio. Cited
                            percentage
                            of research output is computed by identifying proportion of research output that got at
                            least one or
                            more citation. The collaboration patterns are identified from author affiliation field and a
                            research
                            paper is considered as an instance of international collaboration if it involves authors
                            from at least
                            two countries. A research paper is called Domestic-Single Institution if it involves authors
                            from a
                            single institution only. A research paper is denoted as Domestic- Multi Institution if it
                            involves
                            authors from at least two different institutions of the same country.
                        <br />
                            The gender of the first author of each research paper is determined by using the GenderAPI
                            service.
                            Based on the value returned by the API, a research paper is categorised as female 1st
                            authored or male
                            1st authored depending on whether the first author is a female or male, respectively.
                            Confidence
                            level of more than 70% is used, i.e. gender determination by API is taken as successful if
                            it returns
                            an accuracy of more than 70% with it.
                        <br />
                            The data for grants and open access availability are taken as obtained from the Dimensions
                            database.
                            The grants data for both domestic and international funding agencies is obtained and
                            analysed. The open
                            access availability in different forms (gold, green, bronze, hybrid) are captured and
                            analysed.
                        <br />
                            Several indicators, such as CAGR and h-type indices are computed as per their standard
                            definitions.
                            The computation of x-index and x(g) index is as per the idea proposed in
                            <a href='https://link.springer.com/article/10.1007/s11192-021-04188-3'
                               class="text-amber-500 font-bold">Lathabai, Nandy &amp; Singh (2021).</a>
                            Some external data (such as international and
                            <a href='https://www.nirfindia.org/home' class='text-amber-500 font-bold'>NIRF</a>
                            rankings) for selected Indian institutions are also
                            obtained from respective sources and presented as it is. The description for institutions is
                            obtained
                            from Wikipedia and their logo is obtained from a web scrapping of Wikipedia and the
                            institutional
                            webpages.
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