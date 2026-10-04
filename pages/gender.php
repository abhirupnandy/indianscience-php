<?php

$pageTitle = 'Gender Distribution';

$pageDescription =
        'How was Indian research output distributed by gender based on first authorship?';

$breadcrumbs = [
        [
                'label' => 'Home',
                'path' => '',
        ],
        [
                'label' => 'Gender Distribution',
                'path' => null,
        ],
];

$sections = [
        'Gender Distribution of Indian Research Output',
        'Subject area-wise Gender Distribution',
        'International Collaboration Patterns in Female- and Male-First-Authored Papers',
        'Citation Impact of Female- and Male-First-Authored Papers',
];

$tags = [
        'Gender Distribution',
        'Research Output',
        'Research Impact',
        'India',
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
                        id="gender-distribution-of-indian-research-output"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Gender Distribution of Indian Research output
                    </h2>

                    <p class="mt-4">
                        The Indian Research output during 2010 to 2019 was analysed to identify the gender distribution
                        patterns. More precisely, the gender of the first author (leading author) for all the papers,
                        has been determined using the Gender-API service. It is observed that only 29.3% of Indian
                        papers are Female 1st authored, as compared to 70.7% Male 1st authored papers. The distribution
                        of Female and Male 1st have remained almost the same during 2010 to 2019 period. The figure
                        below shows the year-wise gender distribution of Indian Research output.
                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/gender_1.png') ?>"
                                alt='Gender Distribution of Indian Research output'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>


                </section>


                <section
                        id="subject-area-wise-gender-distribution"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject area-wise Gender Distribution
                    </h2>

                    <p class="mt-4">
                        The gender distribution of Indian papers are also analysed with respect to different subject
                        areas. While the majority of the 22 subject areas have almost similar percentage of Female 1st
                        authored papers, subject areas like History & Archaeology, Built Environment & Design and Law
                        & Legal studies have a slightly higher percentage of Female 1st authored papers. In general,
                        only about one-fourth of the research papers in the majority of the subject areas have Female
                        1st author. The table below presents percentage of Female and Male 1st authored papers in
                        different subject areas.
                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/collab_2.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>

                    <p class="mt-4">
                        The amount of internationally collaborated papers from India are, however, lesser as compared to
                        the 20 major countries. For example, United Kingdom has 48.73% of its research output that
                        involves international collaboration. Similarly, France has 50.43%, Australia has 50.98%, and
                        Switzerland has 65.63% of its research output, during 2010 to 2019, involving international
                        collaboration. The table below shows international collaboration patterns of the 20 major
                        countries considered.
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
                                        Subject Area-wise Gender Distribution
                                    </h3>
                                </div>

                            </div>

                            <!-- Responsive table -->
                            <div class='w-full overflow-x-auto'>

                                <table
                                        id='icptop20'
                                        class='w-full text-left text-sm'>

                                    <thead
                                            class='border-b border-gray-200 bg-gray-50
                    text-xs uppercase tracking-wider
                    text-gray-500
                    dark:border-gray-800 dark:bg-gray-950
                    dark:text-gray-400'>

                                    <tr>
                                        <th class='px-4 py-3 font-semibold'>
                                            Rank
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            Subject Area
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            Male 1st Authored Papers (%)
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            Female 1st Authored Papers (%)
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
                        id="international-collaboration-patterns-in-female-and-male-first-authored-papers"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        International Collaboration patterns in Female and Male 1st authored papers
                    </h2>

                    <p class="mt-4">
                        It was analysed whether there exist differences in the propensity for International
                        Collaboration in Female and Male 1st authored papers. For this purpose, the proportion
                        of papers that involve international collaboration in both the sets (Female 1st authored
                        and Male 1st authored papers) were identified through the 'Country' information in the
                        Author-affiliation field. It is observed that both Female and Male 1st authored papers
                        have almost similar proportion of papers involving International Collaboration, with the
                        International Collaboration Proportion in Female 1st authored publications increasing
                        from 9.47% in 2010 to 23.08% in 2019 and International Collaboration Proportion in Male
                        1st authored publications increasing from 11.67% in 2010 to 23.34% in 2019. The figures
                        below show the international collaboration patterns in Female and Male 1st authored papers.
                    </p>
                </section>
                <div class='mt-6 grid w-full grid-cols-1 gap-4 lg:grid-cols-2'>
                    <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/gender_2.jpg') ?>"
                                alt='Research output statistics'
                                class='h-full w-full object-contain'
                                loading='lazy'>
                    </div>

                    <div class='flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/gender_3.jpg') ?>"
                                alt='Global share of research output'
                                class='h-full w-full object-contain'
                                loading='lazy'>
                    </div>
                </div>


                <section
                        id="citation-impact-of-female-and-male-first-authored-papers"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Citation Impact of Female and Male 1st authored papers
                    </h2>

                    <p class="mt-4">
                        The citation impact of Female and male 1st authored papers are analysed by computing the cited
                        percentage (proportion of papers that attracted at least one citation) and Average Citations
                        Per Paper for both the sets. It is observed that, in general, Female and Male 1st authored
                        papers have similar cited percentage values during 2010 to 2019 period. Further, the Average
                        Citations per Paper values of Female and Male 1st authored papers are also similar, with
                        very minor variations. The table below shows the year-wise values of cited percentage and
                        citations per paper for both Female and Male 1st authored papers.

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
                                        Citation Impact of Female- and Male-First-Authored Papers
                                    </h3>
                                </div>

                            </div>

                            <!-- Responsive table -->
                            <div class='w-full overflow-x-auto'>

                                <table
                                        id='genderCitation'
                                        class='w-full text-left text-sm'>

                                    <thead
                                            class='border-b border-gray-200 bg-gray-50
                    text-xs uppercase tracking-wider
                    text-gray-500
                    dark:border-gray-800 dark:bg-gray-950
                    dark:text-gray-400'>

                                    <tr>

                                        <th
                                                class='px-4 py-3 font-semibold'>
                                            Year
                                        </th>

                                        <th
                                                class='px-4 py-3 font-semibold'>
                                            Female 1st Authored Papers
                                        </th>

                                        <th
                                                class='px-4 py-3 font-semibold'>
                                            Male 1st Authored Papers
                                        </th>

                                        <th
                                                class='px-4 py-3 font-semibold'>
                                            Female Citations per Paper
                                        </th>

                                        <th
                                                class='px-4 py-3 font-semibold'>
                                            Male Citations per Paper
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

        new DataTable('#icptop20', {

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
                url: '<?= url('api/gender_output.php') ?>',
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
                    data: 'male_percentage',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2) + '%';
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'female_percentage',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2) + '%';
                        }

                        return Number(data);
                    }
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

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        new DataTable('#genderCitation', {

            // ----------------------------------------------------
            // Single-page table
            // ----------------------------------------------------

            paging: false,
            pageLength: 11,
            lengthChange: false,

            // ----------------------------------------------------
            // Controls
            // ----------------------------------------------------

            searching: false,
            ordering: true,
            info: false,

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
                url: '<?= url('api/gender_citation.php') ?>',
                type: 'POST'
            },

            // ----------------------------------------------------
            // Columns
            // ----------------------------------------------------

            columns: [

                {
                    data: 'year'
                },

                {
                    data: 'female_cited_percentage',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2) + '%';
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'male_cited_percentage',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2) + '%';
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'female_citations_per_paper',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2);
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'male_citations_per_paper',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toFixed(2);
                        }

                        return Number(data);
                    }
                }

            ],

            // ----------------------------------------------------
            // Language
            // ----------------------------------------------------

            language: {
                emptyTable: 'No data available'
            }

        });

    });
</script>