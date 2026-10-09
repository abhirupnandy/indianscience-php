<?php
$pageTitle = 'Research Output';

$pageDescription =
    'Total research output of Indian research, within the 2010-2019 period from the top 1000 institutions.';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '/',
    ],
    [
        'label' => 'Research Output',
        'path' => null,
    ],
];

$sections = [
    'Indian Research Output during 2010 - 2019',
    'Comparison with other major countries',
    'Subject area distribution of Indian Research Output',
    'Subject Area-wise CAGR, Global Share and Rank',
];

$tags = ['Research Output', 'Research Impact', 'India', 'Dimensions', 'Subjects'];
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
                                        d="m9 5 7 7-7 7" />
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
                    id="indian-research-output-during-2010-2019"
                    class="scroll-mt-24">
                    <h2
                        class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Indian Research Output during 2010 - 2019
                    </h2>

                    <p class="mt-4">
                        Indian Research Output in the 2010 to 2019 period has grown significantly in volume. While a total of 60,250 publications were there in 2010, by 2019 this increased to 148,724. The Compounded Annual Growth Rate (CAGR) has been 9.46% which is higher than the world average CAGR( 5.62%). India's global share of research output has also increased in this period, from 2.17% in 2010 to 3.1% in 2019. The figures below present year-wise research output of India and world, and also India's global share.
                    </p>

                    <div class="mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                            <img
                                src="<?= url('assets/img/pages/res_1.jpg') ?>"
                                alt="Research output statistics"
                                class="h-full w-full object-contain"
                                loading="lazy">
                        </div>

                        <div class="flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                            <img
                                src="<?= url('assets/img/pages/res_2.jpg') ?>"
                                alt="Global share of research output"
                                class="h-full w-full object-contain"
                                loading="lazy">
                        </div>
                    </div>

                    <p class="mt-4">
                        India's global rank in research output has also been improving constantly during this period. In the year 2010, India ranked 10th globally in research output volume, which improved to 9th in 2011 and 2012, 8th in 2013, 7th in 2014, and 6th in 2015. From 2015 onwards, India continues to be ranked 6th globally in research output volume. The countries ranking above India are - United States, China, United Kingdom, Germany, Japan. The figure below shows year-wise ranked positions of India during this period.
                    </p>
                    <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                            src="<?= url('assets/img/pages/res_3.jpg') ?>"
                            alt="Research output rank"
                            class="h-auto w-full object-cover"
                            loading="lazy">
                    </div>


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
                            For a better understanding of India's research performance, the values of research output volume, CAGR, and global share of 20 major countries are compared, as shown in the Table below. It can be seen that India has a high CAGR value of 9.46%, which is lesser than only three countries - Russia (11.43%), Iran (10.56%) and China (9.50%). In terms of global share, India accounts for 2.95% of the total research output of the world during 2010-2019 period.
                        </p>
                    </section>

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
                                        Research Output Comparison
                                    </h3>
                                </div>

                            </div>


                            <!-- Responsive table -->
                            <div class="w-full overflow-x-auto">


                                <table
                                    id="researchTable"
                                    class="w-full text-left text-sm">

                                    <thead
                                        class="border-b border-gray-200 bg-gray-50
                text-xs uppercase tracking-wider
                text-gray-500
                dark:border-gray-800 dark:bg-gray-950
                dark:text-gray-400">

                                        <tr>
                                            <th class="px-4 py-3 font-semibold">
                                                Rank
                                            </th>

                                            <th class="px-4 py-3 font-semibold">
                                                Country
                                            </th>

                                            <th class="px-4 py-3 font-semibold">
                                                No. of research publications
                                            </th>

                                            <th class="px-4 py-3 font-semibold">
                                                CAGR %
                                            </th>

                                            <th class="px-4 py-3 font-semibold">
                                                Global Share %
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
                    id="subject-area-distribution-of-indian-research-output"
                    class="mt-12 scroll-mt-24">
                    <h2
                        class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject area distribution of Indian Research Output
                    </h2>

                    <p class="mt-4">
                        Indian research output is visualized in 22 major fields of research, as provided by the Dimensions database. India's research output is dominated by subjects like Medical & Health Sciences, Engineering, Chemical Sciences and Information & Computing Sciences. The subject-area distribution of Indian research output as well as the world-wide research output is shown in the figures below -

                    </p>
                </section>
                <div class="mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                            src="<?= url('assets/img/pages/res_4.jpg') ?>"
                            alt="Subject Area Distribution of Indian Research Output"
                            class="h-full w-full object-contain"
                            loading="lazy">
                    </div>

                    <div class="flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                            src="<?= url('assets/img/pages/res_5.jpg') ?>"
                            alt="Subject Area Distribution of World Research Output"
                            class="h-full w-full object-contain"
                            loading="lazy">
                    </div>
                </div>


                <section
                    id="subject-area-wise-cagr-global-share-and-rank"
                    class="mt-12 scroll-mt-24">
                    <h2
                        class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject Area-wise CAGR, Global Share and Rank
                    </h2>

                    <p class="mt-4">
                        As seen in the subject area distribution above, India's research performance varies across different subject areas. For the 2010 to 2019 period, India's global rank varies from 3rd in Chemical Sciences (and also Information & Computing Sciences, Technology) to 10th in Medical & Health Sciences, 15th in Studies in Human Society, 20th in History & Archaeology and 28th in Philosophy and Religious studies. These variations are observed in subject-area wise global shares as well. While, Indian Research Output in Technology constitutes 6.63% of global share, it is just 0.34% in Philosophy & Religious studies. The CAGR values in different subject areas also vary with Information and Computing Sciences (13.91%), Environmental Sciences (13.43%) and Engineering (12.83%) being the three fastest growing subject areas. The CAGR values for India in all the subject areas are found to be higher than the world average.

                    </p>

                </section>
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
                                    Subject Area-wise CAGR, Global Share and Rank
                                </h3>
                            </div>

                        </div>


                        <!-- Responsive table -->
                        <div class="w-full overflow-x-auto">

                            <table
                                id="research2"
                                class="w-full text-left text-sm">

                                <thead
                                    class="border-b border-gray-200 bg-gray-50
                text-xs uppercase tracking-wider
                text-gray-500
                dark:border-gray-800 dark:bg-gray-950
                dark:text-gray-400">

                                    <tr>
                                        <th class="px-4 py-3 font-semibold">
                                            Subject Area
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            Indian Research Publications
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            World Research Publications
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            India's Global Share (%)
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            India's Rank
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            India's CAGR (%)
                                        </th>

                                        <th class="px-4 py-3 font-semibold">
                                            World's CAGR (%)
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
    document.addEventListener('DOMContentLoaded', function() {

        new DataTable('#researchTable', {

            paging: false,
            searching: false,
            ordering: false,
            info: false,
            lengthChange: false,

            ajax: {
                url: '<?= url('api/research-output.php') ?>',
                type: 'POST'
            },

            columns: [{
                    data: 'rank'
                },
                {
                    data: 'country'
                },
                {
                    data: 'publications',
                    render: function(data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'cagr',
                    render: function(data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'global_share',
                    render: function(data) {
                        return Number(data).toFixed(2) + '%';
                    }
                }
            ]

        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        new DataTable('#research2', {

            paging: false,
            searching: false,
            ordering: false,
            info: false,
            lengthChange: false,

            ajax: {
                url: '<?= url('api/research2.php') ?>',
                type: 'POST'
            },

            columns: [{
                    data: 'subject_area'
                },
                {
                    data: 'india_publications',
                    render: function(data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'world_publications',
                    render: function(data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'global_share',
                    render: function(data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'india_rank'
                },
                {
                    data: 'india_cagr',
                    render: function(data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'world_cagr',
                    render: function(data) {
                        return Number(data).toFixed(2) + '%';
                    }
                }
            ]

        });

    });
</script>