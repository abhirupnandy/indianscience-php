<?php
// $pdo is available globally (set up in config.php)

$majorInstitutions = $pdo->query(
        'SELECT i.*, legacy.pub_count
     FROM institutions AS i
     INNER JOIN legacy_institutes AS legacy
         ON i.grid_id COLLATE utf8mb4_unicode_ci
          = legacy.grid COLLATE utf8mb4_unicode_ci
     ORDER BY legacy.pub_count DESC, i.name ASC
     LIMIT 10',
)->fetchAll();

$counters = $pdo->query(
    'SELECT * FROM site_counters',
)->fetchAll();

$featuredPublications = $pdo->query(
    'SELECT * FROM publications
     WHERE is_featured = 1
     ORDER BY sort_order DESC, id DESC
     LIMIT 5',
)->fetchAll();

$recentPosts = $pdo->query(
    'SELECT * FROM posts
     WHERE is_published = 1
     ORDER BY published_at DESC
     LIMIT 4',
)->fetchAll();

// Pull one primary counter to headline the hero (falls back gracefully if missing)
$primaryCounter = null;
foreach ($counters as $counter) {
    if ($counter['counter_key'] === 'publications' || $counter['counter_key'] === 'attributes') {
        $primaryCounter = $counter;
        break;
    }
}
if (! $primaryCounter && $counters) {
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
                                        d="M5 12h14m-6-6 6 6-6 6"/>

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

    <section
            class="border-y border-slate-200 bg-slate-50 px-4 py-16
           dark:border-slate-800 dark:bg-slate-900/40
           sm:px-6 lg:px-8">

        <div class="container">

            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($counters as $index => $counter) { ?>

                    <div class="text-center">

                        <div
                                class="counter-value font-display text-5xl font-semibold
                               tracking-tight text-slate-950
                               sm:text-6xl lg:text-7xl
                               dark:text-white"
                                data-target="<?= e($counter['counter_value']) ?>"
                                data-suffix="<?= in_array($index, [0], true) ? '+' : '' ?>"
                        >
                            0<?= in_array($index, [0, 2], true) ? '+' : '' ?>
                        </div>

                        <div class="mx-auto mt-4 h-px w-8 bg-amber-400"></div>

                        <p
                                class="mt-4  text-lg font-semibold
                               tracking-[0.2em] text-slate-500
                               dark:text-slate-400">
                            <?= e($counter['label']) ?>
                        </p>

                    </div>

                <?php } ?>

            </div>

        </div>

    </section>


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const counters = document.querySelectorAll('.counter-value');

            const animateCounter = (element) => {

                const target = parseInt(element.dataset.target, 10);
                const duration = parseInt(element.dataset.duration, 10) || 1800;
                const suffix = element.dataset.suffix || '';

                if (isNaN(target)) {
                    element.textContent = '0' + suffix;
                    return;
                }

                const startTime = performance.now();

                const update = (currentTime) => {

                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    // Ease-out animation
                    const easedProgress = 1 - Math.pow(1 - progress, 3);

                    const currentValue = Math.floor(target * easedProgress);

                    element.textContent =
                        currentValue.toLocaleString('en-IN') + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        element.textContent =
                            target.toLocaleString('en-IN') + suffix;
                    }
                };

                requestAnimationFrame(update);
            };


            const observer = new IntersectionObserver((entries, observer) => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        animateCounter(entry.target);

                        observer.unobserve(entry.target);
                    }

                });

            }, {
                threshold: 0.5
            });


            counters.forEach(counter => observer.observe(counter));

        });
    </script>

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

                <?php foreach ($reports as $i => $report) { ?>


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

                <?php } ?>

            </div>

        </div>

    </section>


    <!-- =========================================================
     INSTITUTIONS
========================================================== -->

    <section class='bg-slate-50 px-4 py-16 dark:bg-slate-900/40 sm:px-6 lg:px-8 lg:py-24'>

        <div class='container mx-auto'>

            <!-- Section heading -->
            <div class='mb-10 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between lg:mb-12'>

                <div>
                    <p class='text-xs font-semibold uppercase tracking-[0.2em] text-amber-600 dark:text-amber-400'>
                        Research landscape
                    </p>

                    <h2 class='mt-3 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white sm:text-4xl'>
                        Leading research institutions
                    </h2>

                    <p class='mt-3 max-w-xl text-sm leading-6 text-slate-600 dark:text-slate-400 sm:text-base'>
                        Explore India's leading institutions by research publication output.
                    </p>
                </div>

                <a href="<?= url('institutions') ?>"
                   class="group inline-flex w-fit shrink-0 items-center gap-2 text-sm font-semibold text-slate-900 transition-colors hover:text-amber-600 dark:text-white dark:hover:text-amber-400">
                    Explore all institutions
                    <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">→</span>
                </a>

            </div>

            <!-- Institution cards -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">

                <?php foreach ($majorInstitutions as $institution) { ?>

                    <a
                            href="<?= url('institutions/' . $institution['slug']) ?>"
                            class='group relative flex min-w-0 flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white no-underline transition duration-200 hover:-translate-y-1 hover:border-amber-300 hover:shadow-lg hover:shadow-slate-900/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 focus-visible:ring-offset-2 dark:border-slate-800 dark:bg-slate-950 dark:hover:border-amber-500/50 dark:hover:shadow-black/20 dark:focus-visible:ring-offset-slate-900'
                            aria-label="View <?= htmlspecialchars($institution['name'], ENT_QUOTES, 'UTF-8') ?> institution profile"
                    >
                        <!-- Accent -->
                        <div class='h-1 w-full bg-gradient-to-r from-amber-400 via-amber-500 to-orange-400 opacity-70 transition-opacity group-hover:opacity-100'></div>

                        <div class='flex flex-1 flex-col p-5'>
                            <?php partial('institution-card', [
                                    'institution' => $institution,
                            ]); ?>

                            <?php if (isset($institution['pub_count'])) { ?>
                                <div class="mt-5 border-t border-slate-100 pt-4 dark:border-slate-800">
                                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                        Publications
                                    </p>
                                    <p class="mt-1 text-xl font-semibold tabular-nums tracking-tight text-slate-950 dark:text-white">
                                        <?= number_format((int)$institution['pub_count']) ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </a>

                <?php } ?>

                <?php if (empty($majorInstitutions)) { ?>
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-300 px-6 py-12 text-center dark:border-slate-700">
                        <p class="text-sm text-slate-600 dark:text-slate-400">
                            Institution data is currently unavailable.
                        </p>
                    </div>
                <?php } ?>

            </div>

        </div>

    </section>


    <!-- =========================================================
         INSTITUTION SEARCH
    ========================================================== -->

    <section
            class="border-y border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-950 px-4 sm:px-6 lg:px-8"
            id="homepage-institution-search-section"
            data-api="<?= e(url('api/fetch_institution_list.php')) ?>"
            data-detail-base="<?= e(url('institutions')) ?>"
    >

        <div class="container py-12">

            <div class="mx-auto max-w-2xl text-center">

                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">
                    Institution directory
                </p>

                <h2 class="mt-2 font-display text-2xl font-medium tracking-tight text-slate-950 sm:text-3xl dark:text-white">
                    Find an institution
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-400">
                    Search by institution name, city, state, institution type, or GRID ID.
                </p>

                <form
                        id="homepage-institution-search-form"
                        action="<?= e(url('institutions')) ?>"
                        method="get"
                        role="search"
                        class="mx-auto mt-6 flex max-w-xl flex-col gap-2 sm:flex-row"
                >

                    <div class="relative min-w-0 flex-1">

                        <label for="homepage-institution-search" class="sr-only">
                            Search research institutions
                        </label>

                        <input
                                id="homepage-institution-search"
                                type="search"
                                name="q"
                                autocomplete="off"
                                aria-controls="homepage-institution-suggestions"
                                aria-expanded="false"
                                placeholder="e.g. Indian Institute of Science"
                                class="h-12 w-full rounded-md border border-slate-300 bg-white px-4 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-500"
                        >

                        <div
                                id="homepage-institution-suggestions"
                                class="absolute inset-x-0 top-full z-30 mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white text-left shadow-xl dark:border-slate-700 dark:bg-slate-900"
                                role="listbox"
                        ></div>

                    </div>

                    <button
                            type="submit"
                            class="h-12 shrink-0 rounded-md bg-slate-950 px-6 text-sm font-semibold text-white transition hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500/40 dark:bg-white dark:text-slate-950 dark:hover:bg-slate-200"
                    >
                        Search
                    </button>

                </form>

                <p
                        id="homepage-institution-search-status"
                        class="mt-3 min-h-5 text-left text-xs text-slate-500 dark:text-slate-400 sm:pl-1"
                        aria-live="polite"
                ></p>

                <div class="mt-4">
                    <a
                            href="<?= e(url('institutions')) ?>"
                            class="text-sm font-semibold text-slate-700 underline decoration-amber-400 decoration-2 underline-offset-4 transition hover:text-amber-700 dark:text-slate-300 dark:hover:text-amber-400"
                    >
                        Browse the full institution directory →
                    </a>
                </div>

            </div>

        </div>

    </section>

    <script>
        (() => {
            'use strict';

            const root = document.getElementById('homepage-institution-search-section');
            if (!root) return;

            const apiUrl = root.dataset.api;
            const detailBase = root.dataset.detailBase.replace(/\/+$/, '');
            const form = document.getElementById('homepage-institution-search-form');
            const input = document.getElementById('homepage-institution-search');
            const suggestions = document.getElementById('homepage-institution-suggestions');
            const status = document.getElementById('homepage-institution-search-status');

            let debounceTimer = null;
            let controller = null;
            let requestId = 0;

            function makeElement(tag, className = '', text = '') {
                const node = document.createElement(tag);
                if (className) node.className = className;
                if (text !== undefined && text !== '') node.textContent = text;
                return node;
            }

            function closeSuggestions() {
                suggestions.replaceChildren();
                suggestions.classList.add('hidden');
                input.setAttribute('aria-expanded', 'false');
            }

            function showMessage(message) {
                suggestions.replaceChildren(
                    makeElement(
                        'div',
                        'px-4 py-3 text-sm text-slate-500 dark:text-slate-400',
                        message
                    )
                );
                suggestions.classList.remove('hidden');
                input.setAttribute('aria-expanded', 'true');
            }

            function showSuggestions(items) {
                suggestions.replaceChildren();

                if (!items.length) {
                    showMessage('No matching institutions found.');
                    return;
                }

                items.forEach(institution => {
                    const name = String(institution.name || 'Unnamed institution');
                    const slug = String(institution.slug || '');

                    if (!slug) return;

                    const link = makeElement(
                        'a',
                        'block border-b border-slate-100 px-4 py-3 last:border-b-0 transition hover:bg-amber-50 focus:bg-amber-50 focus:outline-none dark:border-slate-800 dark:hover:bg-slate-800 dark:focus:bg-slate-800'
                    );

                    link.href = `${detailBase}/${encodeURIComponent(slug)}`;
                    link.setAttribute('role', 'option');

                    link.append(
                        makeElement(
                            'span',
                            'block text-sm font-semibold text-slate-900 dark:text-white',
                            name
                        )
                    );

                    const metadata = [
                        institution.institution_type,
                        [institution.city, institution.state].filter(Boolean).join(', ')
                    ].filter(value => value && String(value).trim() !== '');

                    if (metadata.length) {
                        link.append(
                            makeElement(
                                'span',
                                'mt-1 block text-xs text-slate-500 dark:text-slate-400',
                                metadata.join(' · ')
                            )
                        );
                    }

                    suggestions.append(link);
                });

                if (!suggestions.childElementCount) {
                    showMessage('No matching institutions found.');
                    return;
                }

                const browseAll = makeElement(
                    'a',
                    'block bg-slate-50 px-4 py-3 text-sm font-semibold text-indigo-700 transition hover:bg-slate-100 dark:bg-slate-950 dark:text-indigo-300 dark:hover:bg-slate-800',
                    'View all search results →'
                );
                browseAll.href = `${detailBase}?q=${encodeURIComponent(input.value.trim())}`;
                suggestions.append(browseAll);

                suggestions.classList.remove('hidden');
                input.setAttribute('aria-expanded', 'true');
            }

            async function searchInstitutions(query) {
                if (controller) controller.abort();

                const currentRequest = ++requestId;
                controller = new AbortController();

                if (query.length < 2) {
                    closeSuggestions();
                    status.textContent = query.length
                        ? 'Enter at least 2 characters to search.'
                        : 'Start typing to see matching institutions.';
                    return;
                }

                status.textContent = 'Searching institutions...';
                showMessage('Searching...');

                const params = new URLSearchParams({
                    q: query,
                    page: '1',
                    per_page: '6'
                });

                try {
                    const response = await fetch(`${apiUrl}?${params.toString()}`, {
                        method: 'GET',
                        headers: {
                            Accept: 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin',
                        signal: controller.signal
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}`);
                    }

                    const payload = await response.json();

                    if (currentRequest !== requestId) return;

                    if (!payload.success) {
                        throw new Error(payload.message || 'Search failed');
                    }

                    const items = Array.isArray(payload.data) ? payload.data : [];
                    showSuggestions(items);

                    const total = Number(payload.pagination?.total || 0);
                    status.textContent = total
                        ? `${total.toLocaleString()} matching institution${total === 1 ? '' : 's'}. Select a result or press Search to view all.`
                        : 'No matching institutions found.';
                } catch (error) {
                    if (error.name === 'AbortError') return;
                    if (currentRequest !== requestId) return;

                    console.error('Homepage institution search:', error);
                    closeSuggestions();
                    status.textContent = 'Live search is temporarily unavailable. You can still press Search to view results.';
                }
            }

            input.addEventListener('input', () => {
                window.clearTimeout(debounceTimer);
                const query = input.value.trim();

                debounceTimer = window.setTimeout(() => {
                    searchInstitutions(query);
                }, 300);
            });

            form.addEventListener('submit', event => {
                const query = input.value.trim();

                if (!query) {
                    event.preventDefault();
                    input.focus();
                    status.textContent = 'Enter an institution name or search term.';
                    closeSuggestions();
                    return;
                }

                // The normal GET form submits to the institution directory,
                // where the same q parameter is used for the full result list.
                window.clearTimeout(debounceTimer);
            });

            document.addEventListener('click', event => {
                if (!root.contains(event.target)) {
                    closeSuggestions();
                }
            });

            input.addEventListener('keydown', event => {
                if (event.key === 'Escape') {
                    closeSuggestions();
                }
            });
        })();
    </script>


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

                <?php foreach ($featuredPublications as $i => $pub) { ?>

                    <article class="group grid grid-cols-1 gap-2 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6">

                        <span class="font-display text-sm text-slate-400 dark:text-slate-600">
                            0<?= $i + 1 ?>
                        </span>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-slate-500">
                                <?= e($pub['authors']) ?>
                            </p>

                            <h3 class='mt-2 text-base font-semibold leading-6 text-slate-950 dark:text-white'>
                                <a
                                        href="<?= e($pub['url']) ?>"
                                        class='transition group-hover:text-amber-600 dark:group-hover:text-amber-400'>
                                    <?= e($pub['title']) ?>
                                </a>
                            </h3>
                        </div>

                    </article>

                <?php } ?>

            </div>


            <a href="<?= url('publications') ?>"
               class="mt-6 inline-flex text-sm font-semibold text-slate-950 underline decoration-amber-400 decoration-2 underline-offset-4 sm:hidden dark:text-white">
                View all publications →
            </a>

        </div>

    </section>


    <!--    <!-- =========================================================-->
    <!--         BLOG-->
    <!--    ========================================================== -->-->
    <!---->
    <!--    --><?php // if ($recentPosts):?>
    <!---->
    <!--        <section class="border-t border-slate-200 bg-slate-50 dark:border-slate-800 dark:bg-slate-900/40 px-4 sm:px-6 lg:px-8">-->
    <!---->
    <!--            <div class="container py-16 lg:py-24">-->
    <!---->
    <!--                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-500">-->
    <!--                    Insights-->
    <!--                </p>-->
    <!--                <h2 class="mt-2 font-display text-3xl font-medium tracking-tight text-slate-950 dark:text-white">-->
    <!--                    From the blog-->
    <!--                </h2>-->
    <!---->
    <!--                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">-->
    <!---->
    <!--                    --><?php // foreach ($recentPosts as $post):?>
    <!---->
    <!--                        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white transition hover:border-amber-300 hover:shadow-sm dark:border-slate-800 dark:bg-slate-950">-->
    <!---->
    <!--                            --><?php // partial('post-card', [
    //                                'post' => $post,
    //                            ]);?>
    <!---->
    <!--                        </div>-->
    <!---->
    <!--                    --><?php // endforeach;?>
    <!---->
    <!--                </div>-->
    <!---->
    <!--            </div>-->
    <!---->
    <!--        </section>-->
    <!---->
    <!--    --><?php // endif;?>


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
