<?php
$pageTitle = 'Social Media Visibility';

$pageDescription =
        'Social Media Visibility of the Total Research Output of India from 2010 to 2019';

$breadcrumbs = [
        [
                'label' => 'Home',
                'path' => '',
        ],
        [
                'label' => 'Social Media Visibility',
                'path' => null,
        ],
];

$sections = [
        'Social Media Visibility of Indian Research Output',
        'Coverage and Mentions in different platforms',
        'Subject area-wise variations in social media coverage',
];

$tags = ['Social Media Visibility', 'Facebook reads', 'Twitter reads', 'Mendeley reads', 'News/Blogs mentions', 'Research Impact', 'India'];
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
                        id="social-media-visibility-of-indian-research-output"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Social Media Visibility of Indian Research Output
                    </h2>

                    <p class="mt-4">
                        The altmetrics (used for Alternative Metrics) have recently emerged as a popular measure of
                        impact of research, in addition to the traditionally used measure of citations. Altmetrics
                        aims to capture the social media activity around scientific research. Some studies have
                        suggested that on an average, about 48% of Research output of the world gets some Social
                        Media attention. In this context, the social media attention level for Indian Research
                        Output during 2010-2019, has also been computed. It is observed that out of the total
                        research output in 2010, 13.7% of the research output gets some social media attention.
                        This level has continuously increased during the period, reaching to 25.2% in 2017 and
                        settling down to 23.3% in 2019. The figure below shows the year-wise altmetric coverage
                        percentage for the Indian Research output during 2010 - 2019 period.
                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/social_1.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>
                </section>


                <section
                        id="coverage-and-mentions-in-different-platforms"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Coverage and Mentions in different platforms
                    </h2>

                    <p class="mt-4">
                        The social media coverage and mentions per paper have also been analysed for certain selected
                        platforms. In case of Twitter, the coverage percentage has increased from 2.84% in 2010 to
                        19.4% in 2019, with 6.20 average tweets per paper. The figure below shows the year-wise
                        coverage percentage of the research in Twitter.
                    </p>
                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/social_2.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>
                    <p class="mt-4">
                        In case of Mendeley, the coverage percentage has increased from 13.5% in 2010 to 24.84% in
                        2017 and finally reaching 22.8% in 2019, with 41.33 average mentions per paper.
                        The figure below shows the year-wise coverage percentage of the research in Mendeley.
                    </p>
                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/social_3.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>
                    <p class='mt-4'>
                        In case of Facebook, the coverage percentage has increased from 1.19% in 2010 to 4.14%
                        in 2015, before settling down at 2.75% in 2019, with 1.94 average mentions per paper.
                        The figure below shows the year-wise coverage percentage of the research in Facebook.
                    </p>
                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/social_4.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>
                </section>

                <section
                        id="subject-area-wise-variations-in-social-media-coverage"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject area-wise variations in social media coverage
                    </h2>

                    <p class="mt-4">
                        The social media coverage of research output in different subject areas vary significantly,
                        ranging from coverage percentage of 40.18% for Biological Sciences, to 9.47% in Information
                        & Computing Sciences. The coverage variations are also seen for different platforms, with
                        varied values of coverage percentage and average mentions per paper. The table below shows the
                        overall as well as platform-wise coverage percentage and average mentions per paper.
                    </p>
                </section>

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
                                    Social Media and Altmetric Coverage by Subject Area
                                </h3>
                            </div>

                        </div>

                        <!-- Responsive table -->
                        <div class='w-full overflow-x-auto'>

                            <table
                                    id='socialMediaSubjects'
                                    class='w-full table-fixed text-left text-sm'>

                                <thead
                                        class='border-b border-gray-200 bg-gray-50
    text-xs uppercase tracking-wider
    text-gray-500
    dark:border-gray-800 dark:bg-gray-950
    dark:text-gray-400'>

                                <tr>

                                    <th class='w-20 max-w-20 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Rank
                                    </th>

                                    <th class='w-48 max-w-48 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Subject
                                    </th>

                                    <th class='w-28 max-w-28 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Altmetric Coverage
                                    </th>

                                    <th class='w-28 max-w-28 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Twitter Coverage
                                    </th>

                                    <th class='w-32 max-w-32 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Average Tweets per Paper
                                    </th>

                                    <th class='w-28 max-w-28 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Facebook Coverage
                                    </th>

                                    <th class='w-36 max-w-36 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Average Facebook Mentions per Paper
                                    </th>

                                    <th class='w-28 max-w-28 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Mendeley Coverage
                                    </th>

                                    <th class='w-36 max-w-36 whitespace-normal break-words px-3 py-3 font-semibold'>
                                        Average Mendeley Mentions per Paper
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
    document.addEventListener('DOMContentLoaded', function () {

        new DataTable('#socialMediaSubjects', {

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
                url: '<?= url('api/social_media_subjects.php') ?>',
                type: 'POST'
            },

            // ----------------------------------------------------
            // Columns
            // ----------------------------------------------------

            columns: [

                {
                    data: 'rank'
                },

                {
                    data: 'subject'
                },

                {
                    data: 'altmetric_coverage',
                    render: percentageRender
                },

                {
                    data: 'twitter_coverage',
                    render: percentageRender
                },

                {
                    data: 'average_tweets_per_paper',
                    render: decimalRender
                },

                {
                    data: 'facebook_coverage',
                    render: percentageRender
                },

                {
                    data: 'average_facebook_mentions_per_paper',
                    render: decimalRender
                },

                {
                    data: 'mendeley_coverage',
                    render: percentageRender
                },

                {
                    data: 'average_mendeley_mentions_per_paper',
                    render: decimalRender
                }

            ],

            // ----------------------------------------------------
            // Language
            // ----------------------------------------------------

            language: {

                info: 'Showing _START_ to _END_ of _TOTAL_ subject areas',

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

        // --------------------------------------------------------
        // Decimal renderer
        // --------------------------------------------------------

        function decimalRender(data, type) {

            if (
                type === 'display' ||
                type === 'filter'
            ) {
                return Number(data)
                    .toFixed(2);
            }

            return Number(data);
        }

    });
</script>