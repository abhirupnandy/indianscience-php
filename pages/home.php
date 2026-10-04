<?php
// $pdo is available globally (set up in config.php)

$majorInstitutions = $pdo->query(
    "SELECT * FROM institutions
     WHERE is_major = 1
     ORDER BY name ASC
     LIMIT 8",
)->fetchAll();

$counters = $pdo->query(
    "SELECT * FROM site_counters",
)->fetchAll();

$featuredPublications = $pdo->query(
    "SELECT * FROM publications
     WHERE is_featured = 1
     ORDER BY sort_order ASC, published_at DESC
     LIMIT 5",
)->fetchAll();

$recentPosts = $pdo->query(
    "SELECT * FROM posts
     WHERE is_published = 1
     ORDER BY published_at DESC
     LIMIT 4",
)->fetchAll();

// Pull one primary counter to headline the hero (falls back gracefully if missing)
$primaryCounter = null;
foreach ($counters as $counter) {
    if ($counter['counter_key'] === 'publications' || $counter['counter_key'] === 'attributes') {
        $primaryCounter = $counter;
        break;
    }
}
if (!$primaryCounter && $counters) {
    $primaryCounter = $counters[0];
}

$reports = [
    [
        'title' => 'Research Output',
        'metric' => 'CAGR & subject-area share',
        'description' => "India's overall research output, growth rate, global rank and how it splits across subject areas versus other major countries.",
        'url' => url('reports/research-output'),
    ],
    [
        'title' => 'Citations',
        'metric' => 'RCR & highly cited papers',
        'description' => 'Total citations to Indian research output, Relative Citation Ratio, and which papers land in the highly-cited tier.',
        'url' => url('reports/citations'),
    ],
    [
        'title' => 'Collaboration',
        'metric' => 'Domestic vs. international',
        'description' => 'Who Indian researchers publish with — domestic and international collaboration patterns by subject area, and the citation impact of each.',
        'url' => url('reports/collaboration'),
    ],
    [
        'title' => 'Gender Distribution',
        'metric' => 'First-author share',
        'description' => 'Female- and male-first-authored papers, and how collaboration patterns and research impact differ between them.',
        'url' => url('reports/gender'),
    ],
    [
        'title' => 'Open Access',
        'metric' => 'Funded vs. unfunded',
        'description' => "How much of India's research output is open access, and its relationship to research funding.",
        'url' => url('reports/open-access'),
    ],
];
?>

<div class="bg-white text-slate-950 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100 font-sans">

    <!-- =========================================================
         HERO
    ========================================================== -->

    <section
        class="border-b border-slate-200
           dark:border-slate-800">

        <div class="container px-4 py-10 sm:px-6 sm:py-14 lg:px-8 lg:py-16">

            <div
                class="grid items-center gap-10
                   lg:grid-cols-[0.8fr_1.2fr]
                   lg:gap-14">

                <!-- =================================================
                 INTRO
            ================================================== -->

                <div class="max-w-xl">

                    <p
                        class="mb-4 text-xs font-semibold uppercase
                           tracking-[0.2em] text-amber-500">

                        Indian Science Reports

                    </p>


                    <h1
                        class="font-display text-4xl font-medium
                           leading-[1.05] tracking-tight
                           text-slate-950
                           sm:text-5xl
                           lg:text-[3.4rem]
                           dark:text-white">

                        How India
                        <span class="text-amber-500">publishes</span>,
                        <span class='text-indigo-500'>cites,</span> and
                        <span class='text-emerald-500'>collaborates</span>.

                    </h1>


                    <p
                        class="mt-5 max-w-lg text-base leading-7
                           text-slate-600
                           sm:text-lg
                           dark:text-slate-400">

                        <?= e(SITE_DESCRIPTION) ?>

                    </p>


                    <!-- Actions -->

                    <div class="mt-7 flex flex-wrap items-center gap-5">

                        <a
                            href="<?= url('reports/research-output') ?>"
                            class="inline-flex items-center gap-2
                               rounded-md bg-slate-950
                               px-5 py-3 text-sm font-semibold
                               text-white transition
                               hover:bg-slate-800
                               dark:bg-white
                               dark:text-slate-950
                               dark:hover:bg-slate-200">

                            Explore Research Output

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h14m-6-6 6 6-6 6" />

                            </svg>

                        </a>


                        <a
                            href="<?= url('institutions') ?>"
                            class="text-sm font-semibold
                               text-slate-950
                               underline decoration-amber-400
                               decoration-2 underline-offset-4
                               transition hover:decoration-4
                               dark:text-white">

                            Browse institutions

                        </a>

                    </div>

                </div>


                <!-- =================================================
                 FEATURED CAROUSEL
            ================================================== -->

                <div class="min-w-0">

                    <?php partial('carousel'); ?>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================================
         REPORTS
    ========================================================== -->

    <section class="bg-white dark:bg-slate-950 px-4 sm:px-6 lg:px-8">

        <div class="container py-16 lg:py-24">

            <div class="mb-10 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">
                        Reports
                    </p>
                    <h2 class="mt-2 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white">
                        Five ways to read the data
                    </h2>
                </div>

            </div>

            <div class="divide-y divide-slate-200 border-y border-slate-200 dark:divide-slate-800 dark:border-slate-800">

                <?php foreach ($reports as $i => $report): ?>


                    <a href="<?= e($report['url']) ?>"
                        class="group grid grid-cols-1 gap-3 py-7 transition sm:grid-cols-[3rem_1fr_1fr] sm:items-center sm:gap-6">

                        <span class="font-display text-sm text-slate-400 dark:text-slate-600">
                            0<?= $i + 1 ?>
                        </span>

                        <div>
                            <h3 class="text-lg font-semibold text-slate-950 transition group-hover:text-amber-600 dark:text-white dark:group-hover:text-amber-400">
                                <?= e($report['title']) ?>
                            </h3>
                            <p class="mt-1 text-xs font-medium uppercase tracking-wide text-slate-400 dark:text-slate-500">
                                <?= e($report['metric']) ?>
                            </p>
                        </div>

                        <p class="text-sm leading-6 text-slate-600 dark:text-slate-400">
                            <?= e($report['description']) ?>
                        </p>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- =========================================================
         INSTITUTIONS
    ========================================================== -->

    <section class="bg-slate-50 dark:bg-slate-900/40 px-4 sm:px-6 lg:px-8">

        <div class="container py-16 lg:py-24">

            <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">
                        Institutions
                    </p>
                    <h2 class="mt-2 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white">
                        Major research institutions
                    </h2>
                </div>


                <a href="<?= url('institutions') ?>"
                    class="text-sm font-semibold text-slate-950 underline decoration-amber-400 decoration-2 underline-offset-4 dark:text-white">
                    View all →
                </a>

            </div>

            <div class="grid gap-px overflow-hidden rounded-2xl border border-slate-200 bg-slate-200 sm:grid-cols-2 lg:grid-cols-4 dark:border-slate-800 dark:bg-slate-800">

                <?php foreach ($majorInstitutions as $institution): ?>

                    <div class="group bg-white p-5 transition hover:bg-amber-50/50 dark:bg-slate-950 dark:hover:bg-slate-900">

                        <?php partial('institution-card', [
                            'institution' => $institution,
                        ]); ?>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- =========================================================
         INSTITUTION SEARCH
    ========================================================== -->

    <section class="border-y border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950 px-4 sm:px-6 lg:px-8">

        <div class="container py-12">

            <div class="mx-auto max-w-2xl text-center">

                <h2 class="font-display text-2xl font-medium tracking-tight text-slate-950 sm:text-3xl dark:text-white">
                    Find an institution
                </h2>

                <form
                    action="<?= url('institutions') ?>"
                    method="get"
                    class="mx-auto mt-6 flex max-w-xl flex-col gap-2 sm:flex-row">

                    <input
                        type="search"
                        name="q"
                        placeholder="e.g. Indian Institute of Science"
                        class="h-12 flex-1 rounded-md border border-slate-300 bg-white px-4 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-500">

                    <button
                        type="submit"
                        class="h-12 rounded-md bg-slate-950 px-6 text-sm font-semibold text-white transition hover:bg-slate-900 dark:bg-white dark:text-slate-950 dark:hover:bg-slate-200">
                        Search
                    </button>

                </form>

            </div>

        </div>

    </section>


    <!-- =========================================================
         PUBLICATIONS
    ========================================================== -->

    <section class="bg-white dark:bg-slate-950 px-4 sm:px-6 lg:px-8">

        <div class="container py-16 lg:py-24">

            <div class="mb-8 flex items-end justify-between gap-4">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">
                        Publications
                    </p>
                    <h2 class="mt-2 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white">
                        Featured research
                    </h2>
                </div>


                <a href="<?= url('publications') ?>"
                    class="hidden text-sm font-semibold text-slate-950 underline decoration-amber-400 decoration-2 underline-offset-4 sm:inline-flex dark:text-white">
                    View all →
                </a>

            </div>

            <div class="divide-y divide-slate-200 dark:divide-slate-800">

                <?php foreach ($featuredPublications as $i => $pub): ?>

                    <article class="group grid grid-cols-1 gap-2 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6">

                        <span class="font-display text-sm text-slate-400 dark:text-slate-600">
                            0<?= $i + 1 ?>
                        </span>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-slate-500">
                                <?= e($pub['authors']) ?>
                            </p>

                            <h3 class="mt-2 text-base font-semibold leading-6 text-slate-950 dark:text-white">

                                href="<?= e($pub['url']) ?>"
                                class="transition group-hover:text-amber-600 dark:group-hover:text-amber-400">
                                <?= e($pub['title']) ?>
                                </a>
                            </h3>
                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <a href="<?= url('publications') ?>"
                class="mt-6 inline-flex text-sm font-semibold text-slate-950 underline decoration-amber-400 decoration-2 underline-offset-4 sm:hidden dark:text-white">
                View all publications →
            </a>

        </div>

    </section>


    <!-- =========================================================
         BLOG
    ========================================================== -->

    <?php if ($recentPosts): ?>

        <section class="border-t border-slate-200 bg-slate-50 dark:border-slate-800 dark:bg-slate-900/40 px-4 sm:px-6 lg:px-8">

            <div class="container py-16 lg:py-24">

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">
                    Insights
                </p>
                <h2 class="mt-2 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white">
                    From the blog
                </h2>

                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    <?php foreach ($recentPosts as $post): ?>

                        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white transition hover:border-amber-300 hover:shadow-sm dark:border-slate-800 dark:bg-slate-950">

                            <?php partial('post-card', [
                                'post' => $post,
                            ]); ?>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <!-- =========================================================
         FINAL CTA
    ========================================================== -->

    <section class="border-t border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950 px-4 sm:px-6 lg:px-8">

        <div class="container py-16 lg:py-24">

            <div class="rounded-2xl bg-slate-950 px-6 py-14 text-center sm:px-12 dark:bg-slate-900">

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-400">
                    Get started
                </p>

                <h2 class="mt-3 font-display text-2xl font-medium tracking-tight text-white sm:text-3xl">
                    Compare institutions on 12 research metrics
                </h2>

                <div class="mt-7 flex flex-wrap justify-center gap-4">


                    <a href="<?= url('institutions') ?>"
                        class="rounded-md bg-amber-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-300">
                        Browse institutions
                    </a>


                    <a href="<?= url('reports/research-output') ?>"
                        class="rounded-md border border-slate-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                        Explore reports
                    </a>

                </div>

            </div>

        </div>

    </section>

</div>