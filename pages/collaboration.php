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
                        id="india-s-major-collaborating-partner-countries"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        India's major collaborating partner countries
                    </h2>

                    <p class="mt-4">
                        India's major collaborating partner countries during 2010 to 2019 includes - United States of
                        America (33.09%), United Kingdom (12.42%), Germany (9.19%), China (8.87%), South Korea (7.72%)
                        and Australia (7.06%). The figure below shows a list of top 25 collaborating partner countries
                        along with the number of collaborated papers during 2010 to 2019.
                    </p>
                </section>
                <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                    <img
                            src="<?= url('assets/img/pages/collab_3.jpg') ?>"
                            alt="Citation statistics"
                            class="h-auto w-full object-cover"
                            loading="lazy">
                </div>


                <section
                        id="subject-area-wise-distribution-of-domestic-and-internationally-collaborated-papers"
                        class="mt-12 scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Subject area-wise distribution of domestic and Internationally Collaborated papers
                    </h2>

                    <p class="mt-4">
                        The international collaboration patterns in Indian research output vary across different subject
                        areas. It ranges from a low of 15.88% in Language, Communication and Culture to 32.55% in Earth
                        Sciences. Subject areas with relatively higher international collaboration percentage are
                        Physical Sciences (31.67%), Economics (29.44%), Built-Environment and Design (28.72%),
                        Environmental Sciences (28.69%). The domestic multi-institution collaborated output varies
                        across different subject areas. For example, Earth Sciences has 24.87% research output as
                        multi-institution collaboration, whereas History and Archeology has only 6.68% of its
                        research output involving domestic multi-institutional collaboration. The figure below
                        presents the subject area-wise distribution of domestic and internationally collaborated
                        research output of India.

                    </p>

                    <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                                src="<?= url('assets/img/pages/collab_4.jpg') ?>"
                                alt="Citation statistics"
                                class="h-auto w-full object-cover"
                                loading="lazy">
                        <div class='p-4 text-gray-500 text-sm'>
                            <p class='font-semibold mb-2'>Subject Codes</p>

                            <ul class='grid grid-cols-2 gap-x-8 gap-y-1 list-disc list-inside'>
                                <li><strong>01</strong> - Mathematical Science</li>
                                <li><strong>02</strong> - Physical Sciences</li>
                                <li><strong>03</strong> - Chemical Sciences</li>
                                <li><strong>04</strong> - Earth Sciences</li>
                                <li><strong>05</strong> - Environmental Sciences</li>
                                <li><strong>06</strong> - Biological Sciences</li>
                                <li><strong>07</strong> - Agricultural and Veterinary Sciences</li>
                                <li><strong>08</strong> - Information and Computing Sciences</li>
                                <li><strong>09</strong> - Engineering</li>
                                <li><strong>10</strong> - Technology</li>
                                <li><strong>11</strong> - Medical and Health Sciences</li>
                                <li><strong>12</strong> - Built Environment and Design</li>
                                <li><strong>13</strong> - Education</li>
                                <li><strong>14</strong> - Economics</li>
                                <li><strong>15</strong> - Commerce, Management, Tourism and Services</li>
                                <li><strong>16</strong> - Studies in Human Society</li>
                                <li><strong>17</strong> - Psychology and Cognitive Sciences</li>
                                <li><strong>18</strong> - Law and Legal Studies</li>
                                <li><strong>19</strong> - Studies in Creative Arts and Writing</li>
                                <li><strong>20</strong> - Language, Communication and Culture</li>
                                <li><strong>21</strong> - History and Archaeology</li>
                                <li><strong>22</strong> - Philosophy and Religious Studies</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section
                        id='citation-impact-of-internationally-collaborated-papers'
                        class='mt-12 scroll-mt-24'>
                    <h2
                            class='text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white'>
                        Citation impact of Internationally Collaborated Papers
                    </h2>

                    <p class='mt-4'>
                        The International Collaboration seems to have an advantage in terms of citation impact as
                        compared to domestic papers. For example, the average citations per paper (ACPP) for domestic
                        papers is 7.95, whereas the average citation per paper for Internationally Collaborated papers
                        is 18.65. Similarly, the cited percentage of domestic papers is 76.75% whereas for
                        internationally collaborated papers, it is 89%. Further, International Collaboration with
                        different countries shows different impact, as shown in the figure below. For example,
                        collaboration with Switzerland leads to a cited percentage of more than 93%, with an ACPP of 35.
                        On the other hand, collaboration with Japan has a cited percentage of 88%, with an ACPP value
                        of 24.5.

                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/collab_5.jpg') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
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