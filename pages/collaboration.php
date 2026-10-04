<?php
$pageTitle = 'Collaborations';

$pageDescription =
        'All international collaborations by the top 1000 Indian Research Institutions during the time 2010-19.';

$breadcrumbs = [
        [
                'label' => 'Home',
                'path' => '',
        ],
        [
                'label' => 'Collaborations',
                'path' => null,
        ],
];

$sections = [
        'Collaboration patterns in Indian Research Output',
        'International Collaboration Patterns',
        "India's major collaborating partner countries",
        "Subject area-wise distribution of domestic and Internationally Collaborated papers",
        "Citation impact of Internationally Collaborated Papers",
];

$tags = ['International Collaborations', 'Research Output', 'Research Impact', 'India'];
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
                        id="collaboration-patterns-in-indian-research-output"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Collaboration patterns in Indian Research Output
                    </h2>

                    <p class="mt-4">
                        India's research output during 2010 to 2019 includes research output involving domestic as well
                        as international collaboration. While about 60% of the research output has authors from a single
                        institution, about 15% research output involves domestic collaboration (collaboration between
                        institutions within India). Approximately 20% of the research output involved collaboration at
                        international level. The figure below shows the different types of research output from India
                        for the period 2010 to 2019.
                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/collab_1.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>


                </section>


                <section
                        id="international-collaboration-patterns"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        International Collaboration Patterns
                    </h2>

                    <p class="mt-4">
                        India's international collaboration networks seem to have improved during 2010 to 2019. In 2010,
                        a total of 18.92% of India's research output involved international collaboration which has grown
                        to 22.98% of the total research output in 2019. Since 2016, the growth in international
                        collaboration is more steep. The figure below shows the percentage share of internationally
                        collaborated papers in India's research output.
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
                                        International Collaboration by Country
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
                                            Country
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            TP (2010–2019)
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            ICP (2010–2019)
                                        </th>

                                        <th class='px-4 py-3 font-semibold'>
                                            ICP (%)
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
                        id="relative-citation-ratio-rcr-of-india-in-different-subject-areas"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Relative Citation Ratio (RCR) of India in different subject areas
                    </h2>

                    <p class="mt-4">
                        The Relative Citation Ratio (RCR) indicates relative citation performance of a publication when
                        comparing it's citation rate to that of other publications in it's area of research. A value of
                        more than 1 shows a citation rate above average. India's research output during 2010 to 2019,
                        when divided into 22 major subject areas is as shown below. It can be observed that subject
                        areas - Environmental Science, Agriculture & Veterinary Sciences, Engineering, Earth Sciences
                        and Biological Sciences etc. have citation rate higher than the world average, whereas subject
                        areas - Law & Legal Studies, Philosophy & Religious Studies, Education, Built Environment &
                        Design and Psychology & Cognitive Sciences etc. has a citation rate lower than the world
                        average.

                    </p>
                </section>
                <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                    <img
                            src="<?= url('assets/img/pages/cit_2.jpg') ?>"
                            alt="Citation statistics"
                            class="h-auto w-full object-cover"
                            loading="lazy">
                </div>


                <section
                        id="india-s-contribution-to-highly-cited-papers"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        India's contribution to highly cited papers
                    </h2>

                    <p class="mt-4">
                        Highly cited papers of a country are often measured by the number of publications that it
                        contributes in the top 1% or top 10% most cited papers of the world. In case of India, it is
                        observed that India's contribution to top 1% highly cited papers has grown from 1.85% in 2010 to
                        4.3% in 2019. Similarly, India's contribution in top 10% highly cited papers of the world has
                        grown from 2.28% in 2010 to 4.52% in 2019. The figure below shows the year-wise percentage
                        contribution of India to the top 1% and top 10% highly cited papers of the world.

                    </p>

                    <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                                src="<?= url('assets/img/pages/cit_3.jpg') ?>"
                                alt="Citation statistics"
                                class="h-auto w-full object-cover"
                                loading="lazy">
                    </div>

                    <p class="mt-4">
                        When compared with contribution to top 1% highly cited papers of other major countries, it is
                        observed that China has gained significantly with an increase from 7.78% share in 2010 to 33.2%
                        share in 2019. United States on the other hand shows a decline from 50.1% share in 2010 to
                        36.96% share in 2019. Other countries to gain are Japan, India, Italy, Australia, Spain, etc.
                        The countries to lose in their share of top 1% highly cited papers are Germany, France, Canada,
                        etc. The figure below shows the share of top 1% highly cited papers of the major countries
                        during 2010 and 2019.
                    </p>

                    <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                                src="<?= url('assets/img/pages/cit_4.jpg') ?>"
                                alt="Citation statistics"
                                class="h-auto w-full object-cover"
                                loading="lazy">
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
                url: '<?= url('api/icptop20.php') ?>',
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
                    data: 'country'
                },

                {
                    data: 'tp',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toLocaleString('en-IN');
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'icp',
                    render: function (data, type) {

                        if (
                            type === 'display' ||
                            type === 'filter'
                        ) {
                            return Number(data)
                                .toLocaleString('en-IN');
                        }

                        return Number(data);
                    }
                },

                {
                    data: 'icp_percentage',
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
                info: 'Showing _START_ to _END_ of _TOTAL_ countries',

                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                },

                emptyTable: 'No data available'
            }

        });

    });
</script>