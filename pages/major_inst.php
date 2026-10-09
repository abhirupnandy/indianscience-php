<?php
$pageTitle = 'Major Indian Institutions';

$pageDescription =
    'Research output and impact of major Indian institutions during the period of 2010-2019';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '/',
    ],
    [
        'label' => 'Major Indian Institutions',
        'path' => null,
    ],
];

$sections = [
    'Comparison of indicators for Major Indian Institutions',
    'Research Output and Citations',
    'Authorship and Collaboration Patterns',
    'Open Access Availability',

];

$tags = ['Research Institutions', 'Research Impact', 'India', 'Dimensions', 'Subjects'];
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
                    id="comparison-of-indicators-for-major-indian-institutions"
                    class="scroll-mt-24">
                    <h2
                        class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Comparison of indicators for Major Indian Institutions
                    </h2>

                    <p class="mt-4">
                        This page presents a comparative analysis of selected indicators for a set of 50 institutions
                        which have the highest research output during 2010 to 2019 period. The indicators computed are
                        presented in following four groups - Research Output & Citations, Authorship & Collaboration
                        patterns, Open Access availability and Social Media coverage.
                        In research output and citations, the value of Total Papers (TP), Compounded Annual Growth
                        Rate (CAGR), Total Citations (TC), Cited Output %, h-index of the institution and the
                        institution's share % in India's total research output are presented.
                        In Authorship & Collaboration patterns, the percentage of single and multi-authored papers,
                        percentage of Female and Male authored research papers and the percentage of research papers
                        that involves Domestic or International Collaboration are shown.
                        In the Open Access availability part, the percentage of research papers from an institution
                        which are available in Open Access is presented, along with the percentage distribution of
                        different OA types (Gold, Green, Bronze & Hybrid).
                        In the section on Social Media Coverage, the percentage of research papers from an institution,
                        which gets coverage in some social media platform, are shown. The platform-wise percentage and
                        average mentions per paper are also shown for the institutions, for Twitter, Facebook and
                        Mendeley platforms.
                        All the tables, by default, are sorted in descending order of the Total Papers (TP). However,
                        a click on any column will allow sorting the table values by that column.
                    </p>


                    <section
                        id="research-output-and-citations"
                        class="mt-12 scroll-mt-24">
                        <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                            Research Output and Citations
                        </h2>

                        <!-- Table Card -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <table id='majorResearch' class='w-full min-w-[1100px] text-left text-sm'>
                                <thead class='bg-gray-50 dark:bg-slate-900'>
                                <tr>
                                    <th class='sticky left-0 z-10 min-w-[300px] bg-gray-50 px-4 py-3 font-semibold dark:bg-slate-900'>
                                        Institution
                                    </th>
                                    <th class='min-w-[110px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        TP (2010-2019)
                                    </th>
                                    <th class='min-w-[105px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        CAGRTP (%)
                                    </th>
                                    <th class='min-w-[110px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        TC (2010-2019)
                                    </th>
                                    <th class='min-w-[115px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        Cited Output (%)
                                    </th>
                                    <th class='min-w-[90px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        h-index
                                    </th>
                                    <th class='min-w-[150px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        Share in India's Total Output (%)
                                    </th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </section>

                    <section
                        id='authorship-and-collaboration-patterns'
                        class='mt-12 scroll-mt-24'>
                        <h2
                            class='text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white'>
                            Authorship and Collaboration Patterns
                        </h2>
                        <style>
                            /* DataTables wrapper and controls stay outside the table scroll area */
                            #majorResearch_wrapper,
                            #majorInstAuthor_wrapper {
                                width: 100%;
                                overflow: visible;
                            }

                            #majorResearch_wrapper .dataTables_filter,
                            #majorInstAuthor_wrapper .dataTables_filter {
                                margin-bottom: 1rem;
                                padding: 0.75rem 1rem;
                                text-align: right;
                            }

                            #majorResearch_wrapper .dataTables_filter input,
                            #majorInstAuthor_wrapper .dataTables_filter input {
                                margin-left: 0.5rem;
                                width: 245px;
                                border: 1px solid rgb(209 213 219);
                                border-radius: 0.375rem;
                                padding: 0.45rem 0.65rem;
                                font-size: 0.875rem;
                                outline: none;
                                background: white;
                            }

                            #majorResearch_wrapper .dataTables_filter input:focus,
                            #majorInstAuthor_wrapper .dataTables_filter input:focus {
                                border-color: rgb(59 130 246);
                                box-shadow: 0 0 0 2px rgb(59 130 246 / 0.10);
                            }

                            #majorResearch_wrapper .dataTables_scroll,
                            #majorInstAuthor_wrapper .dataTables_scroll {
                                width: 100%;
                            }

                            #majorResearch_wrapper .dataTables_scrollBody,
                            #majorInstAuthor_wrapper .dataTables_scrollBody {
                                border-bottom: 1px solid rgb(229 231 235);
                            }

                            #majorResearch_wrapper .dataTables_info,
                            #majorInstAuthor_wrapper .dataTables_info {
                                padding: 0.75rem 1rem;
                                font-size: 0.8125rem;
                                color: rgb(107 114 128);
                            }

                            #majorResearch_wrapper .dataTables_paginate,
                            #majorInstAuthor_wrapper .dataTables_paginate {
                                padding: 0.5rem 1rem 0.75rem;
                            }

                            #majorResearch_wrapper .dataTables_paginate .paginate_button,
                            #majorInstAuthor_wrapper .dataTables_paginate .paginate_button {
                                border: 1px solid rgb(229 231 235) !important;
                                background: white !important;
                                border-radius: 0.375rem !important;
                                margin-left: 0.25rem;
                                padding: 0.35rem 0.65rem !important;
                                font-size: 0.8125rem;
                                color: rgb(55 65 81) !important;
                            }

                            #majorResearch_wrapper .dataTables_paginate .paginate_button:hover,
                            #majorInstAuthor_wrapper .dataTables_paginate .paginate_button:hover {
                                border-color: rgb(209 213 219) !important;
                                background: rgb(249 250 251) !important;
                                color: rgb(17 24 39) !important;
                            }

                            #majorResearch_wrapper .dataTables_paginate .paginate_button.current,
                            #majorInstAuthor_wrapper .dataTables_paginate .paginate_button.current {
                                border-color: rgb(37 99 235) !important;
                                background: rgb(37 99 235) !important;
                                color: white !important;
                            }

                            #majorResearch_wrapper .dataTables_paginate .paginate_button.disabled,
                            #majorInstAuthor_wrapper .dataTables_paginate .paginate_button.disabled {
                                opacity: 0.45;
                                cursor: default !important;
                            }

                            /* Frozen first column */
                            #majorResearch_wrapper .dataTables_scrollHead table,
                            #majorResearch_wrapper .dataTables_scrollBody table,
                            #majorInstAuthor_wrapper .dataTables_scrollHead table,
                            #majorInstAuthor_wrapper .dataTables_scrollBody table {
                                border-collapse: separate !important;
                                border-spacing: 0 !important;
                            }

                            #majorResearch_wrapper .dataTables_scrollBody,
                            #majorInstAuthor_wrapper .dataTables_scrollBody {
                                position: relative;
                                overflow-x: auto !important;
                            }

                            /*#majorResearch_wrapper .dataTables_scrollHead th:first-child,*/
                            /*#majorResearch_wrapper .dataTables_scrollBody td:first-child,*/
                            /*#majorInstAuthor_wrapper .dataTables_scrollHead th:first-child,*/
                            /*#majorInstAuthor_wrapper .dataTables_scrollBody td:first-child {*/
                            /*    position: sticky !important;*/
                            /*    left: 0 !important;*/
                            /*    background-clip: padding-box;*/
                            /*}*/

                            #majorResearch_wrapper .dataTables_scrollHead th:first-child,
                            #majorInstAuthor_wrapper .dataTables_scrollHead th:first-child {
                                z-index: 40 !important;
                                background: rgb(249 250 251) !important;
                            }

                            #majorResearch_wrapper .dataTables_scrollBody td:first-child,
                            #majorInstAuthor_wrapper .dataTables_scrollBody td:first-child {
                                z-index: 20 !important;
                                background: white !important;
                                box-shadow: 1px 0 0 rgb(229 231 235);
                            }

                            /* Dark mode */
                            .dark #majorResearch_wrapper .dataTables_filter input,
                            .dark #majorInstAuthor_wrapper .dataTables_filter input {
                                border-color: rgb(51 65 85);
                                background: rgb(15 23 42);
                                color: rgb(226 232 240);
                            }

                            .dark #majorResearch_wrapper .dataTables_filter input::placeholder,
                            .dark #majorInstAuthor_wrapper .dataTables_filter input::placeholder {
                                color: rgb(148 163 184);
                            }

                            .dark #majorResearch_wrapper .dataTables_info,
                            .dark #majorInstAuthor_wrapper .dataTables_info {
                                color: rgb(148 163 184);
                            }

                            .dark #majorResearch_wrapper .dataTables_scrollBody,
                            .dark #majorInstAuthor_wrapper .dataTables_scrollBody {
                                border-color: rgb(51 65 85);
                            }

                            .dark #majorResearch_wrapper .dataTables_paginate .paginate_button,
                            .dark #majorInstAuthor_wrapper .dataTables_paginate .paginate_button {
                                border-color: rgb(51 65 85) !important;
                                background: rgb(15 23 42) !important;
                                color: rgb(203 213 225) !important;
                            }

                            .dark #majorResearch_wrapper .dataTables_paginate .paginate_button:hover,
                            .dark #majorInstAuthor_wrapper .dataTables_paginate .paginate_button:hover {
                                border-color: rgb(71 85 105) !important;
                                background: rgb(30 41 59) !important;
                                color: white !important;
                            }

                            .dark #majorResearch_wrapper .dataTables_paginate .paginate_button.current,
                            .dark #majorInstAuthor_wrapper .dataTables_paginate .paginate_button.current {
                                border-color: rgb(37 99 235) !important;
                                background: rgb(37 99 235) !important;
                                color: white !important;
                            }

                            .dark #majorResearch_wrapper .dataTables_scrollHead th:first-child,
                            .dark #majorInstAuthor_wrapper .dataTables_scrollHead th:first-child {
                                background: rgb(15 23 42) !important;
                            }

                            .dark #majorResearch_wrapper .dataTables_scrollBody td:first-child,
                            .dark #majorInstAuthor_wrapper .dataTables_scrollBody td:first-child {
                                background: rgb(2 6 23) !important;
                                box-shadow: 1px 0 0 rgb(51 65 85);
                            }

                            @media (max-width: 640px) {
                                #majorResearch_wrapper .dataTables_filter,
                                #majorInstAuthor_wrapper .dataTables_filter {
                                    text-align: left;
                                }

                                #majorResearch_wrapper .dataTables_filter input,
                                #majorInstAuthor_wrapper .dataTables_filter input {
                                    width: 100%;
                                    margin-left: 0;
                                    margin-top: 0.35rem;
                                }

                                #majorResearch_wrapper .dataTables_paginate,
                                #majorInstAuthor_wrapper .dataTables_paginate {
                                    text-align: left;
                                }
                            }
                        </style>

                        <!-- Table Card -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <table id='majorInstAuthor' class='w-full min-w-[1450px] text-left text-sm'>
                                <thead class='bg-gray-50 dark:bg-slate-900'>
                                <tr>
                                    <th rowspan='2'
                                        class='min-w-[300px] bg-gray-50 px-4 py-3 font-semibold dark:bg-slate-900'>
                                        Institution
                                    </th>

                                    <th rowspan='2'
                                        class='min-w-[105px] px-3 py-3 text-center font-semibold'>
                                        TP<br>(2010-2019)
                                    </th>

                                    <th colspan='4'
                                        class='border-l border-gray-200 px-3 py-3 text-center font-semibold dark:border-gray-700'>
                                        Authorship Distribution (%)
                                    </th>

                                    <th colspan='2'
                                        class='border-l border-gray-200 px-3 py-3 text-center font-semibold dark:border-gray-700'>
                                        Gender Distribution (%)
                                    </th>

                                    <th colspan='3'
                                        class='border-l border-gray-200 px-3 py-3 text-center font-semibold dark:border-gray-700'>
                                        Collaboration Patterns (%)
                                    </th>
                                </tr>

                                <tr>
                                    <th class='min-w-[95px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        Single Author
                                    </th>

                                    <th class='min-w-[100px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        2-5 Authors
                                    </th>

                                    <th class='min-w-[100px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        6-10 Authors
                                    </th>

                                    <th class='min-w-[100px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        10+ Authors
                                    </th>

                                    <th class='min-w-[90px] px-3 py-3 text-center font-semibold'>
                                        Male
                                    </th>

                                    <th class='min-w-[90px] px-3 py-3 text-center font-semibold'>
                                        Female
                                    </th>

                                    <th class='min-w-[145px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        Domestic<br>(Single Institution)
                                    </th>

                                    <th class='min-w-[145px] whitespace-normal px-3 py-3 text-center font-semibold'>
                                        Domestic<br>(Multi Institution)
                                    </th>

                                    <th class='min-w-[90px] px-3 py-3 text-center font-semibold'>
                                        ICP
                                    </th>
                                </tr>
                                </thead>

                                <tbody></tbody>
                            </table>
                        </div>

                    </section>

                    <section
                        id='open-access-availability'
                        class='mt-12 scroll-mt-24'>
                        <h2
                            class='text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white'>
                            Open Access Availability
                        </h2>

                        <!-- Table Card -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <table id='majorInstOA' class='w-full text-left text-sm'>
                                <thead class='bg-gray-50 dark:bg-slate-900'>
                                <tr>
                                    <th rowspan='2'
                                        class='min-w-[300px] bg-gray-50 px-4 py-3 font-semibold dark:bg-slate-900'>
                                        Institution
                                    </th>

                                    <th rowspan='2'
                                        class='min-w-[110px] px-3 py-3 text-center font-semibold'>
                                        TP<br>(2010-2019)
                                    </th>

                                    <th rowspan='2'
                                        class='min-w-[110px] px-3 py-3 text-center font-semibold'>
                                        Total OA (%)
                                    </th>

                                    <th colspan='4'
                                        class='border-l border-gray-200 px-3 py-3 text-center font-semibold dark:border-gray-700'>
                                        Open Access Subtypes (%)
                                    </th>
                                </tr>

                                <tr>
                                    <th class='min-w-[100px] px-3 py-3 text-center font-semibold'>
                                        Gold
                                    </th>

                                    <th class='min-w-[100px] px-3 py-3 text-center font-semibold'>
                                        Green
                                    </th>

                                    <th class='min-w-[100px] px-3 py-3 text-center font-semibold'>
                                        Bronze
                                    </th>

                                    <th class='min-w-[100px] px-3 py-3 text-center font-semibold'>
                                        Hybrid
                                    </th>
                                </tr>
                                </thead>

                                <tbody></tbody>
                            </table>
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
    $(document).ready(function () {
        $('#majorResearch').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            scrollX: true,

            order: [[1, 'desc']],

            ajax: {
                url: '<?= url('api/major_research.php') ?>',
                type: 'POST'
            },

            columns: [
                {
                    data: 'institution',
                    className: 'font-medium whitespace-normal sticky-column'
                },
                {
                    data: 'tp',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'cagr_tp',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'tc',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'cited_output',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'h_index',
                    className: 'text-center'
                },
                {
                    data: 'share_india',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                }
            ],

            language: {
                search: '',
                searchPlaceholder: 'Search institution...',
                info: 'Showing _START_ to _END_ of _TOTAL_ institutions',
                infoEmpty: 'No institutions available',
                zeroRecords: 'No matching institutions found'
            },

            columnDefs: [
                {
                    targets: 0,
                    width: '300px'
                },
                {
                    targets: [1, 2, 3, 4, 5, 6],
                    className: 'text-center'
                }
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#majorInstAuthor').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: false,

            searching: true,
            ordering: true,
            info: true,

            scrollX: true,

            fixedColumns: {
                left: 1
            },

            order: [[1, 'desc']],

            ajax: {
                url: '<?= url('api/major_inst_author.php') ?>',
                type: 'POST'
            },

            columns: [
                {
                    data: 'institution',
                    className: 'font-medium whitespace-normal'
                },
                {
                    data: 'tp',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'single_author',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'authors_2_5',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'authors_6_10',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'authors_10_plus',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'male',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'female',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'domestic_single',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'domestic_multi',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'icp',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                }
            ],

            language: {
                search: '',
                searchPlaceholder: 'Search institution...',
                info: 'Showing _START_ to _END_ of _TOTAL_ institutions',
                infoEmpty: 'No institutions available',
                zeroRecords: 'No matching institutions found',

                paginate: {
                    first: 'First',
                    last: 'Last',
                    next: 'Next',
                    previous: 'Previous'
                }
            },

            columnDefs: [
                {
                    targets: 0,
                    width: '300px'
                },
                {
                    targets: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                    className: 'text-center'
                }
            ]
        });

    });
</script>
<script>
    $(document).ready(function () {

        $('#majorInstOA').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: false,

            searching: true,
            ordering: true,
            info: true,

            scrollX: true,

            fixedColumns: {
                left: 1
            },

            order: [[1, 'desc']],

            ajax: {
                url: '<?= url('api/major_inst_oa.php') ?>',
                type: 'POST'
            },

            columns: [
                {
                    data: 'institution',
                    className: 'font-medium whitespace-normal'
                },
                {
                    data: 'tp',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toLocaleString('en-IN');
                    }
                },
                {
                    data: 'total_oa',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'gold',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'green',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'bronze',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                },
                {
                    data: 'hybrid',
                    className: 'text-center',
                    render: function (data) {
                        return Number(data).toFixed(2) + '%';
                    }
                }
            ],

            language: {
                search: '',
                searchPlaceholder: 'Search institution...',
                info: 'Showing _START_ to _END_ of _TOTAL_ institutions',
                infoEmpty: 'No institutions available',
                zeroRecords: 'No matching institutions found',

                paginate: {
                    first: 'First',
                    last: 'Last',
                    next: 'Next',
                    previous: 'Previous'
                }
            },

            columnDefs: [
                {
                    targets: 0,
                    width: '300px'
                },
                {
                    targets: [1, 2, 3, 4, 5, 6],
                    className: 'text-center'
                }
            ]
        });

    });
</script>