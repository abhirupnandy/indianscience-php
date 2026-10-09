<?php
$pageTitle = 'Open Access';

$pageDescription =
        'Open Access Distribution of the Total Research Output of India from 2010 to 2019';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => 'Open Access',
        'path' => null,
    ],
];

$sections = [
    'Open Access availability of Indian Research Output',
    'Comparison with other major countries',
    'Subject area-wise Open Access availability of Indian Research Output',
    'Open Access availability of Funded Research Output',
];

$tags = ['Open Access', 'Gold OA', 'Green OA', 'Hybrid OA', 'Bronze OA', 'Diamond OA', 'Research Impact', 'India'];
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
                        id="open-access-availability-of-indian-research-output"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Open Access availability of Indian Research Output
                    </h2>

                    <p class="mt-4">
                        The Indian research output during 2010 to 2019 has been analysed to identify what proportion of
                        research output is available in Open Access. It is observed that Open Access availability of
                        Indian Research Output has improved from 25.86 % in 2010 to 35.13 % in 2019. In overall terms,
                        33.61% of the Indian Research output during 2010-2019 period is found to be available in Open
                        Access. The figure below (on the left) shows year-wise percentage of Open Access availability
                        of the overall Indian Research Output during 2010 to 2019 period. Among the Open Access papers,
                        Gold Open Access is the most prevalent type (increasing from 43.01% in 2010 to 63.44% in 2019).
                        This is followed by Green Open Access (19.67%), Bronze(16.1%) and Hybrid (7.12%). The figure
                        below (on the right) shows year-wise Open Access subtypes of during the period 2010 to 2019.
                    </p>

                    <div class='mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2'>
                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/oa_1.jpg') ?>"
                                    alt='Open Access percentage of Research output'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>

                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/oa_2.jpg') ?>"
                                    alt='Open Access subtypes of Research output'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>
                    </div>

                    <section class="mt-5">


                        <!-- Table Card -->
                        <div
                                class="overflow-hidden rounded-2xl border
                                border-gray-200 bg-white
                                dark:border-gray-800 dark:bg-gray-900">

                            <!-- Table toolbar -->
                            <div
                                    class="flex flex-col gap-3 border-b border-gray-200
                                    p-4 sm:flex-row sm:items-center sm:justify-between
                                    dark:border-gray-800">

                                <div>
                                    <h3
                                            class="text-sm font-semibold text-gray-900
                                            dark:text-white">
                                        Research Citations in India
                                    </h3>
                                </div>

                            </div>


                            <!-- Responsive table -->
                            <div class="w-full overflow-x-auto">

                                <table
                                        id="citationsTable"
                                        class="w-full text-left text-sm">

                                    <thead
                                            class="border-b border-gray-200 bg-gray-50
                                            text-xs uppercase tracking-wider
                                            text-gray-500
                                            dark:border-gray-800 dark:bg-gray-950
                                            dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold">
                                            Year
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            Volume
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            Global Share %
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            Citation Rank
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody
                                            class="divide-y divide-gray-100
                                            dark:divide-gray-800">
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </section>
                </section>


                <section
                        id="comparison-with-other-major-countries"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Comparison with other major countries
                    </h2>

                    <p class="mt-4">
                        The Open Access levels of India are compared with 20 other major countries. It is observed that
                        India is on the Lower side of Open Access availability level, with only 33.61% papers available
                        in Open Access. In comparison, Brazil has 62.91% of the research papers in Open Access,
                        Switzerland has 55.79% papers in Open Access, United Kingdom 55.59% papers in Open Access,
                        Netherlands (54.08%), Sweden (53.32%), Poland (51.68&). Only China (26.44%), Iran (28.3%)
                        and Taiwan (31.03%) have OA proportion lesser than India. The table below shows OA percentage
                        for 20 major countries.
                    </p>

                    <section class='mt-5'>

                        <!-- Table Card -->
                        <div
                                class='overflow-hidden rounded-2xl border
        border-gray-200 bg-white
        dark:border-gray-800 dark:bg-gray-900'>

                            <!-- Table toolbar -->
                            <div
                                    class='flex flex-col gap-3 border-b border-gray-200
            p-4 sm:flex-row sm:items-center sm:justify-between
            dark:border-gray-800'>

                                <div>
                                    <h3
                                            class='text-sm font-semibold text-gray-900
                    dark:text-white'>
                                        Open Access Availability by Country
                                    </h3>
                                </div>

                            </div>

                            <!-- Responsive table -->
                            <div class='w-full overflow-x-auto'>

                                <table
                                        id='openAccessCountry'
                                        class='w-full text-left text-sm'>

                                    <thead
                                            class='border-b border-gray-200 bg-gray-50
                    text-xs uppercase tracking-wider
                    text-gray-500
                    dark:border-gray-800 dark:bg-gray-950
                    dark:text-gray-400'>

                                    <tr>

                                        <th class='px-4 py-3 font-semibold'>
                                            Country
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2010
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2011
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2012
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2013
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2014
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2015
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2016
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2017
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2018
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            2019
                                        </th>

                                    </tr>

                                    </thead>

                                    <tbody
                                            class='divide-y divide-gray-100
                    dark:divide-gray-800'>
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </section>
                </section>

                <section
                        id="subject-area-wise-open-access-availability-of-indian-research-output"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject area-wise Open Access availability of Indian Research Output
                    </h2>

                    <p class="mt-4">
                        While India has overall 33.61% papers available in Open Access for the 2010- 2019 period,
                        Open Access availability varies across different subject areas. These variations are as large
                        as 48%. Subjects like Studies in Creative Arts and Writing (10.93%), Information and Computing
                        Science (14.17%) and Technology (15.21%) have a very low proportion of papers available in OA;
                        subjects like Medical & Health Sciences (58.66%), Biological Sciences (41.54%) and Physical
                        Sciences (38.74%) have relatively higher proportion of papers available in Open Access.
                    </p>
                </section>
                <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                    <img
                            src="<?= url('assets/img/pages/oa_3.jpg') ?>"
                            alt="Citation statistics"
                            class="h-auto w-full object-cover"
                            loading="lazy">
                </div>


                <section
                        id="open-access-availability-of-funded-research-output"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Open Access availability of Funded Research Output
                    </h2>

                    <p class="mt-4">
                        As it is often a condition and/or expectation of the funding agencies that research outputs out
                        of publicly funded research projects should be openly accessible, therefore the research outputs
                        out of the funded projects is analysed to find out what proportion of the research output is
                        available in Open Access. it is observed that only about 29.06% of the funded research output
                        in India is available in OA, though the availability has increased slightly from 25.22% in 2010
                        in 30.04% in 2019. The figure below (on the left) shows the year-wise Open Access availability
                        of the funded research output. Out of the total funded research output during 2010-2019, 71% is
                        Closed Access, 12% Gold Open Access, 9% Green Open Access, 5% Bronze Open Access and 3% Hybrid
                        Open Access. The pie-chart below (on the right) shows the distribution.

                    </p>

                    <div class='mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2'>
                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/oa_4.jpg') ?>"
                                    alt='Open Access percentage of Research output'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>

                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/oa_5.jpg') ?>"
                                    alt='Open Access subtypes of Research output'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>
                    </div>

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


                    <!-- Tags -->
                    <div class="p-5">

                        <h3
                                class="text-sm font-semibold uppercase
                                   tracking-wider text-gray-900
                                   dark:text-white">
                            Tags
                        </h3>

                        <div class="mt-4 flex flex-wrap gap-2">

                            <?php foreach ($tags as $tag) { ?>

                                <span
                                        class="rounded-full border
                                           border-gray-200 bg-gray-50
                                           px-3 py-1.5 text-xs font-medium
                                           text-gray-600
                                           dark:border-gray-700
                                           dark:bg-gray-800
                                           dark:text-gray-300">
                                    <?= e($tag) ?>
                                </span>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </aside>

        </div>

    </section>
    <?php include __DIR__.'/../partials/data-source-note.php'; ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        new DataTable('#openAccessCountry', {

            // ----------------------------------------------------
            // Client-side pagination
            // ----------------------------------------------------

            paging: true,
            pageLength: 10,
            lengthChange: false,

            // ----------------------------------------------------
            // Controls
            // ----------------------------------------------------

            searching: false,
            ordering: true,
            info: true,

            // ----------------------------------------------------
            // Default sorting
            // ----------------------------------------------------

            order: [
                [0, 'asc']
            ],

            // ----------------------------------------------------
            // Ajax
            // ----------------------------------------------------

            ajax: {
                url: '<?= url('api/open_access_country.php') ?>',
                type: 'POST'
            },

            // ----------------------------------------------------
            // Columns
            // ----------------------------------------------------

            columns: [

                {
                    data: 'country'
                },

                {
                    data: '2010',
                    render: percentageRender
                },

                {
                    data: '2011',
                    render: percentageRender
                },

                {
                    data: '2012',
                    render: percentageRender
                },

                {
                    data: '2013',
                    render: percentageRender
                },

                {
                    data: '2014',
                    render: percentageRender
                },

                {
                    data: '2015',
                    render: percentageRender
                },

                {
                    data: '2016',
                    render: percentageRender
                },

                {
                    data: '2017',
                    render: percentageRender
                },

                {
                    data: '2018',
                    render: percentageRender
                },

                {
                    data: '2019',
                    render: percentageRender
                }

            ],

            // ----------------------------------------------------
            // Language
            // ----------------------------------------------------

            language: {

                info: 'Showing _START_ to _END_ of _TOTAL_ countries',

                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                },

                emptyTable: 'No data available'
            }

        });

        // --------------------------------------------------------
        // Percentage renderer
        // --------------------------------------------------------

        function percentageRender(data, type) {

            if (
                type === 'display' ||
                type === 'filter'
            ) {
                return Number(data)
                    .toFixed(2) + '%';
            }

            return Number(data);
        }

    });
</script>