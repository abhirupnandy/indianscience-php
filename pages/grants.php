<?php
$pageTitle = 'Research Grants';

$pageDescription =
        'Analysis of the funded Research Output of India from 2010 to 2019';

$breadcrumbs = [
        [
                'label' => 'Home',
                'path' => '',
        ],
        [
                'label' => 'Research Grants',
                'path' => null,
        ],
];

$sections = [
        'Research Grants Volume',
        'Major Funding Agencies',
        'Publications supported by grants',
];

$tags = ['Funded Research', 'Research Impact', 'India'];
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

                    <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>

                        <li class="flex items-center gap-2">

                            <?php if ($breadcrumb['path'] !== null): ?>

                                <a
                                        href="<?= url($breadcrumb['path']) ?>"
                                        class="transition hover:text-gray-900
                                           dark:hover:text-white">
                                    <?= e($breadcrumb['label']) ?>
                                </a>

                            <?php else: ?>

                                <span
                                        class="<?= $index ===
                                        count($breadcrumbs) - 1
                                                ? 'font-medium text-gray-900 dark:text-white'
                                                : '' ?>">
                                    <?= e($breadcrumb['label']) ?>
                                </span>

                            <?php endif; ?>


                            <?php if ($index < count($breadcrumbs) - 1): ?>

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

                            <?php endif; ?>

                        </li>

                    <?php endforeach; ?>

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
                        id="research-grants-volume"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Research Grants Volume
                    </h2>

                    <p class="mt-4">
                        The volume of research funding to Indian Institutions, during the period 2010 - 2019, has
                        increased significantly. While the total grant volume was 308.02 Million USD in 2010,
                        it increased to more than double by 2019 (672.97 Million USD in 2019). The figure below
                        (on the left) shows year-wise amount of research funding in Million USD. Out of the total
                        grants for research during 2010-2019, 38.71% are from domestic funding agencies and 61.29% are
                        from international funding agencies. The domestic grants are increased marginally during this
                        period. The figure below (on the right) shows distribution of domestic and international
                        grants during 2010 - 2019.
                    </p>

                    <div class='mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2'>
                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/grant_1.jpg') ?>"
                                    alt='Research output statistics'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>

                        <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <img
                                    src="<?= url('assets/img/pages/grant_2.jpg') ?>"
                                    alt='Global share of research output'
                                    class='h-full w-full object-contain'
                                    loading='lazy'>
                        </div>
                    </div>
                </section>


                <section
                        id="major-funding-agencies"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Major Funding Agencies
                    </h2>

                    <p class="mt-4">
                        The Indian Research, during 2010 - 2019 period, has been funded by both domestic and
                        international agencies. The major domestic funders are Department of Biotechnology
                        (1,280.5 Million USD), Science and Engineering Research Board (320.6 Million USD),
                        Wellcome Trust-DBT India Alliance (127.7 Million), Department of Science and Technology
                        (25 Million USD) and Ministry of Earth Sciences (14.9 Million USD). The major International
                        funders include Bill and Melinda Gates Foundation (669 Million USD), European Commission
                        (568 Million USD), Engineering and Physical Sciences Research Council (410 Million USD),
                        Medical Research Council (241 Million USD) etc. The figure below (on the left) shows a tree
                        maps of major Domestic Funding Agencies and the figure below (on the right) shows a tree
                        maps of major International Funding Agencies.
                    </p>
                    <div class='mt-6 grid w-full grid-cols-1 gap-6 lg:grid-cols-2'>

                        <!-- Domestic Funding Agencies -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 bg-white
                dark:border-gray-800 dark:bg-slate-950'>

                            <div class='flex aspect-[16/10] items-center justify-center overflow-hidden
                    bg-gray-50 dark:bg-slate-900'>
                                <img
                                        src="<?= url('assets/img/pages/grant_3.jpg') ?>"
                                        alt='Domestic Funding Agencies'
                                        class='h-full w-full object-contain'
                                        loading='lazy'>
                            </div>

                            <div class='border-t border-gray-100 px-4 py-2.5
                    dark:border-gray-800'>

                                <p class='text-[11px] leading-5 text-gray-500 dark:text-gray-400'>
                                    <strong class='text-gray-700 dark:text-gray-300'>
                                        Domestic Funding Agency Acronyms:
                                    </strong>
                                    DBT - Department of Biotechnology &nbsp;|&nbsp;
                                    SERB - Science and Engineering Research Board &nbsp;|&nbsp;
                                    WT/DBT - Wellcome Trust/DBT India Alliance &nbsp;|&nbsp;
                                    DST - Department of Science and Technology &nbsp;|&nbsp;
                                    MoES - Ministry of Earth Sciences
                                </p>

                            </div>
                        </div>


                        <!-- International Funding Agencies -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 bg-white
                dark:border-gray-800 dark:bg-slate-950'>

                            <div class='flex aspect-[16/10] items-center justify-center overflow-hidden
                    bg-gray-50 dark:bg-slate-900'>
                                <img
                                        src="<?= url('assets/img/pages/grant_4.jpg') ?>"
                                        alt='International Funding Agencies'
                                        class='h-full w-full object-contain'
                                        loading='lazy'>
                            </div>

                            <div class='border-t border-gray-100 px-4 py-2.5
                    dark:border-gray-800'>

                                <p class='text-[11px] leading-5 text-gray-500 dark:text-gray-400'>
                                    <strong class='text-gray-700 dark:text-gray-300'>
                                        International Funding Agency Acronyms:
                                    </strong>
                                    BMGF - Bill &amp; Melinda Gates Foundation &nbsp;|&nbsp;
                                    EC - European Commission &nbsp;|&nbsp;
                                    EPSRC - Engineering and Physical Sciences Research Council &nbsp;|&nbsp;
                                    MRC - Medical Research Council &nbsp;|&nbsp;
                                    ESRC - Economic and Social Research Council &nbsp;|&nbsp;
                                    BBSRC - Biotechnology and Biological Sciences Research Council &nbsp;|&nbsp;
                                    NERC - Natural Environment Research Council &nbsp;|&nbsp;
                                    STFC - Science and Technology Facilities Council &nbsp;|&nbsp;
                                    CDCP - Centers for Disease Control and Prevention &nbsp;|&nbsp;
                                    EDCCTP - European &amp; Developing Countries Clinical Trials Partnership &nbsp;|&nbsp;
                                    SNSF - Swiss National Science Foundation &nbsp;|&nbsp;
                                    MHLW - Ministry of Health Labour and Welfare &nbsp;|&nbsp;
                                    FF - Ford Foundation &nbsp;|&nbsp;
                                    HF - Hewlett Foundation &nbsp;|&nbsp;
                                    WT - Wellcome Trust
                                </p>

                            </div>
                        </div>

                    </div>
                </section>

                <section
                        id="publications-supported-by-grants"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Publications supported by grants
                    </h2>

                    <p class="mt-4">
                        The publication output supported by research grants for India, are computed from the data.
                        The table below shows year-wise funding volume, supported publications and publications per
                        Million USD. It can be observed that the publications per Million USD value is close to 1 in
                        the initial period, which decreases further to 0.6 publications per Million USD in 2018.
                    </p>
                </section>

                <div class='overflow-hidden rounded-xl border border-gray-200
            dark:border-gray-800'>

                    <div class='overflow-x-auto'>
                        <table id='grantsTable'
                               class='w-full text-left text-sm'>

                            <thead class='bg-gray-50 text-gray-700 dark:bg-gray-900 dark:text-gray-300'>
                            <tr>
                                <th class='px-3 py-3 font-semibold'>Year</th>
                                <th class='px-3 py-3 font-semibold'>
                                    Funding Amount<br>(million $)
                                </th>
                                <th class='px-3 py-3 font-semibold'>
                                    Resulting<br>Publications
                                </th>
                                <th class='px-3 py-3 font-semibold'>
                                    Publications<br>per Million $
                                </th>
                            </tr>
                            </thead>

                            <tbody></tbody>

                        </table>
                    </div>

                </div>
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
                                ): ?>
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

                                <?php endforeach; ?>

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

                            <?php foreach ($tags as $tag): ?>

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

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

            </aside>

        </div>

    </section>
    <?php include __DIR__ . '/../partials/data-source-note.php'; ?>

</div>

<script>
    $(document).ready(function () {

        function decimalRender(data, type) {
            if (type === 'display' || type === 'filter') {
                return Number(data).toFixed(3);
            }

            return Number(data);
        }

        $('#grantsTable').DataTable({
            paging: false,
            pageLength: 10,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: false,

            order: [[0, 'asc']],

            ajax: {
                url: '<?= url('api/grants_table.php') ?>',
                type: 'POST'
            },

            columns: [
                {
                    data: 'year'
                },
                {
                    data: 'funding_amount',
                    render: decimalRender
                },
                {
                    data: 'publications'
                },
                {
                    data: 'publications_per_million',
                    render: decimalRender
                }
            ],

            language: {
                info: 'Showing _START_ to _END_ of _TOTAL_ years'
            }
        });

    });
</script>