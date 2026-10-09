<?php
$pageTitle = 'SDG Related Research';

$pageDescription =
        'SDG related research output in India during the period of 2010-2019';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '/',
    ],
    [
        'label' => 'SDG Related Research',
        'path' => null,
    ],
];

$sections = [
    'Indian Research Publications on Sustainable Development Goals',
    'Subject area-wise composition of Research Output on SDGs',
];

$tags = ['SDG related research', 'Research Impact', 'India', 'Dimensions', 'Subjects'];
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
                        id="indian-research-publications-on-sustainable-development-goals"
                        class="scroll-mt-24">
                    <h2
                            class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Indian Research Publications on Sustainable Development Goals
                    </h2>

                    <p class="mt-4">
                        The Sustainable Development Goals (SDGs) or Global Goals are a collection of 17 interlinked
                        global goals designed to be a 'blueprint to achieve a better and more sustainable future for
                        all'. The SDGs were set up in 2015 by the United Nations General Assembly and are intended to be
                        achieved by the year 2030. They are included in a UN Resolution called the 2030 Agenda or what
                        is colloquially known as Agenda 2030.
                        The 17 SDGs are:
                    </p>

                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800 p-2'>
                        <img
                                src="<?= url('assets/img/pages/sdg_1.png') ?>"
                                alt='Citation statistics'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>

                    <p class="mt-4">
                        In this context, India's research output during 2010 - 2019 has been analysed to find out what
                        amount of research output is related to the Sustainable Development Goals. A publication is said
                        to be about a Sustainable Development Goal (SDG), if it is related to the concerned SDG in one
                        way or other. The Dimensions database provides an SDG related tagging of research publications
                        through its own algorithmic approaches (apparently based on Machine Learning). It is observed
                        that the three SDGs (7-Affordable & Clean Energy, 3-Good Health & Well Being and 13-Climate
                        Action) have got significant attention of Indian Research community, as measured by Indian
                        Research publications. For the SDG 7-Affordable & Clean Energy, the number of research
                        publications have increased from 1313 in 2010 to 9612 in 2019 (with a CAGR value of 22%).
                        For SDG 3-Good Health & Well-Being, research publications have increased from 1408 in 2010
                        to 5582 in 2019 with a CAGR of 14.8%. Similarly, the SDG 13-Climate Action has also seen a
                        growth 336 publications in 2010 to 2513 publications in 2019 (with a CAGR value of 22.3%).
                        There is also some research on other SDGs like 2-Zero Hunger, 4-Quality Education and
                        11-Sustainable cities and communities, though the volume in these cases are much lesser.
                        The figure below shows the year-wise research output from India, on the 17 different SDGs.
                        A tree map of the total research output on different SDGs during the period 2010-2019 is
                        also shown thereafter.
                    </p>
                    <div class="mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                        <img
                                src="<?= url('assets/img/pages/sdg_2.jpg') ?>"
                                alt="Research output rank"
                                class="h-auto w-full object-cover"
                                loading="lazy">
                    </div>
                    <div class='mt-6 w-full overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                        <img
                                src="<?= url('assets/img/pages/sdg_3.jpg') ?>"
                                alt='Research output rank'
                                class='h-auto w-full object-cover'
                                loading='lazy'>
                    </div>


                    <section
                            id="subject-area-wise-composition-of-research-output-on-sdgs"
                            class="mt-12 scroll-mt-24">
                        <h2
                                class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                            Subject area-wise composition of Research Output on SDGs
                        </h2>

                        <p class="mt-4">
                            Researchers from different areas have contributed to different SDGs. For the SDG
                            7-Affordable & Clean Energy, about 45% of the publications to subject area Engineering,
                            followed by 16% from Chemical Sciences, 12% from Technology, and 11% from Information and
                            Computing Science. For SDG 3-Good Health & Well Being, about 78% publications are in the
                            area of Medical and Health Sciences, followed by 6% in Biological Sciences and 5% in
                            Information & Computing Science. Similarly for SDG 13-Climate Actions, about 47% of the
                            publications are from Engineering, 12% from Earth Sciences and 10% from Chemical Sciences.
                            The table below shows contribution from different subject areas to the research output on
                            SDGs.
                        </p>
                    </section>

                    <section class="mt-5">


                        <!-- Table Card -->
                        <div class='overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800'>
                            <div class='overflow-x-auto'>
                                <table id='sdgTable'
                                       class='w-full min-w-[1500px] text-left text-sm'>

                                    <thead class='bg-gray-50 text-gray-700 dark:bg-gray-900 dark:text-gray-300'>
                                    <tr>
                                        <th class='sticky left-0 z-10 min-w-[260px] bg-gray-50 px-3 py-3 font-semibold dark:bg-gray-900'>
                                            Subjects
                                        </th>

                                        <?php for ($i = 1; $i <= 17; $i++) { ?>
                                            <th class='min-w-[70px] whitespace-nowrap px-3 py-3 text-center font-semibold'>
                                                SDG <?= $i ?>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                    </thead>

                                    <tbody></tbody>

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

        $('#sdgTable').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,

            order: [[0, 'asc']],

            ajax: {
                url: '<?= url('api/sdg_table.php') ?>',
                type: 'POST'
            },

            columns: [
                {
                    data: 'subject',
                    className: 'font-medium whitespace-nowrap'
                },

                <?php for ($i = 1; $i <= 17; $i++) { ?>
                {
                    data: 'sdg<?= $i ?>',
                    className: 'text-center'
                }<?= $i < 17 ? ',' : '' ?>
                <?php } ?>
            ],

            language: {
                info: 'Showing _START_ to _END_ of _TOTAL_ subject areas'
            }
        });

    });
</script>