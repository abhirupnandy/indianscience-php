<?php

$pageTitle = 'Institution Profile';
$slug = trim((string) ($params['slug'] ?? ''));
$apiUrl = url('api/institution_data.php');

if ($slug === '') {
    http_response_code(404);
}
?>

<div
        id="institution-page"
        class="mx-auto w-full max-w-7xl space-y-8 px-4 py-8 sm:px-6 lg:px-8"
        data-api="<?= e($apiUrl) ?>"
        data-slug="<?= e($slug) ?>"
>
    <div id="institution-loading" class="rounded-2xl border border-gray-200 bg-white p-8 text-center dark:border-gray-800 dark:bg-gray-900" role="status">
        <div class="mx-auto mb-4 h-8 w-8 animate-spin rounded-full border-4 border-gray-200 border-t-blue-600"></div>
        <p class="text-sm text-gray-600 dark:text-gray-300">Loading institution research data…</p>
    </div>

    <div id="institution-error" class="hidden rounded-2xl border border-red-200 bg-red-50 p-6 dark:border-red-900 dark:bg-red-950" role="alert">
        <h2 class="text-lg font-semibold text-red-800 dark:text-red-200">Unable to load institution</h2>
        <p id="institution-error-message" class="mt-2 text-sm text-red-700 dark:text-red-300"></p>
        <button id="institution-retry" type="button" class="mt-4 rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800">Try again</button>
    </div>

    <main id="institution-content" class="hidden space-y-10">
        <nav aria-label="Breadcrumb" class="text-sm text-gray-500 dark:text-gray-400">
            <a href="<?= e(url('institutions')) ?>" class="hover:text-blue-600">Institutions</a>
            <span class="mx-2">/</span>
            <span id="institution-breadcrumb">Institution profile</span>
        </nav>

        <section class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <div class="h-2 bg-gradient-to-r from-blue-700 to-indigo-500"></div>
            <div class="p-6 sm:p-8">
                <div class="mb-5 flex justify-end no-report"><button id="download-institution-report" type="button" class="inline-flex items-center gap-2 rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 disabled:cursor-wait disabled:opacity-60">Download full report (PDF)</button></div>
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                    <div class="relative flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                        <div id="institution-initials" class="flex h-full w-full items-center justify-center text-2xl font-bold text-blue-700 dark:text-blue-300" aria-hidden="true">—</div>
                        <img
                                id='institution-logo'
                                data-logo-url=''
                                class='hidden h-full w-full object-contain bg-white p-2'
                                alt='Institution logo'
                                loading='lazy'
                        >
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-semibold uppercase tracking-widest text-blue-700 dark:text-blue-300">Institutional Research Profile</p>
                        <h1 id="institution-name" class="mt-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">Institution</h1>
                        <p id="institution-location" class="mt-3 text-sm text-gray-600 dark:text-gray-300"></p>
                        <div id="institution-identifiers" class="mt-4 flex flex-wrap gap-2"></div>
                        <p id="institution-description" class="mt-5 max-w-4xl text-sm leading-7 text-gray-600 dark:text-gray-300"></p>
                        <a id="institution-wiki" class="mt-3 hidden inline-block text-sm font-medium text-blue-700 underline dark:text-blue-300" target="_blank" rel="noopener noreferrer">More institution information</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="key">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Key Indicators (2010–2019)</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Historical indicators from the original ISR research dataset.</p>
            </div>
            <div id="institution-stat-cards" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"></div>
            <p id="institution-no-stats" class="hidden rounded-xl border border-dashed border-gray-300 p-6 text-sm text-gray-600 dark:border-gray-700 dark:text-gray-300">No research indicators were found for this institution.</p>
        </section>

        <nav class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
            <h2 class="font-semibold text-gray-900 dark:text-white">On this page</h2>
            <div class="mt-3 flex flex-wrap gap-x-5 gap-y-2 text-sm">
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#research">Research output and citations</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#collab">Authorship and collaboration</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#grants">Research grants</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#gender">Gender distribution</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#open">Open access</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#social">Social media visibility</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#sdg">SDG research</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#thematic">Research portfolio</a>
                <a class="text-blue-700 hover:underline dark:text-blue-300" href="#external">External data</a>
            </div>
        </nav>

        <section id="research" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Research Output and Citations</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Annual publications and citations, subject-area distribution, and cited versus uncited publications.</p>
            </div>
            <div class="grid grid-cols-1 gap-6">
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Year-wise research output and citations</h3>
                    <div class="relative h-80"><canvas id="chart-publications-citations"></canvas></div>
                    <p id="empty-publications-citations" class="hidden mt-3 text-sm text-gray-500">No publication/citation series available.</p>
                </article>
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Subject-area distribution of research output</h3>
                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">Radar view of publication volume across subject areas.</p>
                    <div class="relative mx-auto h-[34rem] w-full max-w-5xl sm:h-[42rem]"><canvas id="chart-subjects"></canvas></div>
                    <p id="empty-subjects" class="hidden mt-3 text-sm text-gray-500">No subject-wise research data available.</p>
                </article>
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Year-wise cited versus uncited publications</h3>
                    <div class="relative h-80 sm:h-96"><canvas id="chart-cited-percent"></canvas></div>
                    <p id="empty-cited-percent" class="hidden mt-3 text-sm text-gray-500">No cited-percentage data available.</p>
                </article>
            </div>
        </section>

        <section id="collab" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Authorship and Collaboration</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Annual authorship categories, collaboration types and major collaborators.</p>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Authorship type of research output</h3>
                    <div class="relative h-80"><canvas id="chart-authorship"></canvas></div>
                    <p id="empty-authorship" class="hidden mt-3 text-sm text-gray-500">No authorship data available.</p>
                </article>
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Collaboration type of research output</h3>
                    <div class="relative h-80"><canvas id="chart-collaboration"></canvas></div>
                    <p id="empty-collaboration" class="hidden mt-3 text-sm text-gray-500">No collaboration data available.</p>
                </article>
            </div>
            <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Major collaborating countries / institutions</h3>
                <div class="relative h-[28rem] sm:h-[34rem]"><canvas id="chart-collaborators"></canvas></div>
                <p id="empty-collaborators" class="hidden mt-3 text-sm text-gray-500">No collaborator data available.</p>
            </article>
        </section>

        <section id="grants" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Research Grants (Domestic)</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Funding amount per year as recorded in the legacy dataset.</p>
            </div>
            <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="relative h-80"><canvas id="chart-grants"></canvas></div>
                <p id="empty-grants" class="hidden mt-3 text-sm text-gray-500">No annual grant data available.</p>
            </article>
        </section>

        <section id="gender" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Gender Distribution</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Male and female first-author publication indicators by year.</p>
            </div>
            <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="relative h-80"><canvas id="chart-gender"></canvas></div>
                <p id="empty-gender" class="hidden mt-3 text-sm text-gray-500">No annual gender data available.</p>
            </article>
        </section>

        <section id="open" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Open Access Availability</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Open versus closed access and the distribution of open-access types.</p>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Open versus closed access</h3>
                    <div class="relative h-80"><canvas id="chart-open-access"></canvas></div>
                    <p id="empty-open-access" class="hidden mt-3 text-sm text-gray-500">No open-access data available.</p>
                </article>
                <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Open-access types</h3>
                    <div class="relative h-80"><canvas id="chart-open-access-types"></canvas></div>
                    <p id="empty-open-access-types" class="hidden mt-3 text-sm text-gray-500">No open-access type data available.</p>
                </article>
            </div>
        </section>

        <section id="social" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Social Media Visibility</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Altmetric coverage by source and year, 2010–2019.</p>
            </div>
            <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="relative h-96"><canvas id="chart-altmetric"></canvas></div>
                <p id="empty-altmetric" class="hidden mt-3 text-sm text-gray-500">No Altmetric coverage data available.</p>
            </article>
        </section>

        <section id="sdg" class="space-y-5">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Research Output Related to SDGs</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Annual research output across the 17 United Nations Sustainable Development Goals.</p>
            </div>
            <article class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="relative h-[34rem]"><canvas id="chart-sdgs"></canvas></div>
                <p id="empty-sdgs" class="hidden mt-3 text-sm text-gray-500">No annual SDG data available.</p>
            </article>
        </section>

        <section id="thematic" class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Research Portfolio</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">The x-index and x(g)-index are shown when supplied by the original research dataset.</p>
            <div id="research-portfolio-indicators" class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2"></div>
        </section>

        <section id="external" class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">External Data (Year – 2021)</h2>
            <dl id="institution-details" class="mt-5 grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2"></dl>
        </section>

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-treemap@2.3.0/dist/chartjs-chart-treemap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas-pro@1.5.11/dist/html2canvas-pro.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.2/dist/jspdf.umd.min.js"></script>
<script>
    (() => {
        'use strict';

        const root = document.getElementById('institution-page');
        if (!root) return;

        const $ = id => document.getElementById(id);
        const charts = {};
        let currentInstitutionData = null;
        const palette = [
            '#2563eb', '#dc2626', '#16a34a', '#9333ea', '#ea580c',
            '#0891b2', '#ca8a04', '#db2777', '#4f46e5', '#0d9488',
            '#7c2d12', '#64748b', '#65a30d', '#c026d3', '#0369a1',
            '#a16207', '#475569'
        ];
        const nf = new Intl.NumberFormat('en-IN', { maximumFractionDigits: 2 });

        function number(value) {
            if (value === null || value === undefined || value === '') return null;
            const result = Number(value);
            return Number.isFinite(result) ? result : null;
        }

        function fmt(value) {
            const n = number(value);
            return n === null ? (value === null || value === undefined || value === '' ? 'Not available' : String(value)) : nf.format(n);
        }

        function humanize(value) {
            return String(value).replace(/_/g, ' ').replace(/%/g, ' (%)').replace(/\b\w/g, c => c.toUpperCase());
        }

        function el(tag, className, text) {
            const node = document.createElement(tag);
            if (className) node.className = className;
            if (text !== undefined && text !== null) node.textContent = String(text);
            return node;
        }

        function addPill(label, value) {
            if (value === null || value === undefined || value === '') return;
            $('institution-identifiers').appendChild(el(
                'span',
                'inline-flex rounded-full border border-gray-200 bg-gray-50 px-3 py-1 text-xs font-medium text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200',
                `${label}: ${value}`
            ));
        }

        function addCard(label, value, suffix = '') {
            if (value === null || value === undefined || value === '') return;
            const card = el('article', 'rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900');
            card.appendChild(el('p', 'text-sm text-gray-500 dark:text-gray-400', label));
            card.appendChild(el('p', 'mt-3 break-words text-2xl font-bold text-gray-900 dark:text-white', `${fmt(value)}${suffix}`));
            $('institution-stat-cards').appendChild(card);
        }

        function addDetail(container, label, value) {
            if (value === null || value === undefined || value === '' || typeof value === 'object') return;
            const wrapper = el('div', 'min-w-0');
            wrapper.appendChild(el('dt', 'text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400', humanize(label)));
            wrapper.appendChild(el('dd', 'mt-1 break-words text-sm text-gray-900 dark:text-gray-100', fmt(value)));
            container.appendChild(wrapper);
        }

        function empty(id, isEmpty) {
            const node = $(id);
            if (node) node.classList.toggle('hidden', !isEmpty);
        }

        function destroy(id) {
            if (charts[id]) {
                charts[id].destroy();
                delete charts[id];
            }
        }

        function makeChart(id, type, labels, datasets, extra = {}) {
            if (typeof Chart === 'undefined' || !$(id)) return;
            destroy(id);
            charts[id] = new Chart($(id), {
                type,
                data: { labels, datasets },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: { enabled: true }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { beginAtZero: true }
                    },
                    ...extra
                }
            });
        }

        function rowsToDatasets(rows, keys, labels) {
            return keys.map((key, i) => ({
                label: labels[i],
                data: rows.map(row => number(row[key])),
                borderColor: palette[i % palette.length],
                backgroundColor: palette[i % palette.length] + '25',
                borderWidth: 2,
                tension: 0.25,
                fill: false
            }));
        }

        function yearArray(row, prefix) {
            return Array.from({ length: 10 }, (_, i) => number(row?.[`${prefix}_${2010 + i}`]));
        }

        async function loadInstitutionLogo(name) {
            const image = $('institution-logo');
            const initials = $('institution-initials');

            if (!image || !initials || !name) return;

            // Start with the initials' placeholder.
            image.classList.add('hidden');
            initials.classList.remove('hidden');
            image.removeAttribute('src');

            // Use the local logo URL provided by the PHP page.
            const logoUrl = image.dataset.logoUrl;

            if (!logoUrl) return;

            image.onload = () => {
                image.classList.remove('hidden');
                initials.classList.add('hidden');
            };

            image.onerror = () => {
                image.classList.add('hidden');
                initials.classList.remove('hidden');
            };

            image.alt = `${name} logo`;
            image.src = logoUrl;
        }

        async function downloadReport() {
            const button = $('download-institution-report');
            if (!currentInstitutionData) {
                window.alert('Institution research data has not loaded yet.');
                return;
            }

            button.disabled = true;
            const oldText = button.textContent;
            button.textContent = 'Preparing PDF…';

            try {
                const endpoint = new URL('api/institution_report_pdf.php', window.location.origin);
                const response = await fetch(endpoint.toString(), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/pdf, application/json'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ data: currentInstitutionData })
                });

                if (!response.ok) {
                    let message = `PDF generation failed (${response.status}).`;
                    try {
                        const result = await response.json();
                        if (result.message) message = result.message;
                    } catch (_) {}
                    throw new Error(message);
                }

                const blob = await response.blob();
                if (!blob.size || blob.type !== 'application/pdf') {
                    throw new Error('The server did not return a valid PDF. Check the PHP error log.');
                }

                const objectUrl = URL.createObjectURL(blob);
                const link = document.createElement('a');
                const name = ($('institution-name')?.textContent || 'institution').trim()
                    .toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '') || 'institution';
                link.href = objectUrl;
                link.download = `${name}-research-profile.pdf`;
                document.body.appendChild(link);
                link.click();
                link.remove();
                URL.revokeObjectURL(objectUrl);
            } catch (error) {
                console.error('Could not generate institution report:', error);
                window.alert(error?.message || 'The PDF report could not be generated.');
            } finally {
                button.disabled = false;
                button.textContent = oldText;
            }
        }

        function render(data) {
            const institution = data.institution || {};
            const research = data.research || {};
            const indicators = research.indicators || {};
            const external = research.external || {};
            const years = Array.from({ length: 10 }, (_, i) => String(2010 + i));

            const name = institution.name || 'Unnamed institution';
            $('institution-name').textContent = name;

            const logo = $('institution-logo');
            if (logo) {
                logo.dataset.logoUrl = institution.logo_url || '';
            }

            loadInstitutionLogo(name);
            $('institution-breadcrumb').textContent = name;
            document.title = `${name} | Indian Science Reports`;

            $('institution-initials').textContent = name.trim().split(/\s+/).filter(Boolean).slice(0, 2).map(w => w[0]).join('').toUpperCase() || '—';
            const location = [institution.city, institution.state, institution.country].filter(Boolean).join(', ');
            $('institution-location').textContent = location;
            $('institution-location').classList.toggle('hidden', !location);

            addPill('GRID', data.grid_id || institution.grid_id || institution.grid);
            addPill('Institution type', institution.institution_type || external.inst_type);
            addPill('Established', institution.year_established || external.est_year);
            addPill('Publications', research.legacy_institute?.pub_count ?? indicators.tp);

            const description = institution.description || external.info || '';
            $('institution-description').textContent = description;
            $('institution-description').classList.toggle('hidden', !description);
            if (external.wiki_link && /^https?:\/\//i.test(external.wiki_link)) {
                $('institution-wiki').href = external.wiki_link;
                $('institution-wiki').classList.remove('hidden');
            }

            [
                ['Total Research Papers', indicators.tp],
                ['Total Citations', indicators.tc],
                ['Citations per paper', indicators.cpp],
                ['h-index', indicators['h-index']],
                ['g-index', indicators['g-index']],
                ['x-index', indicators['x index']],
                ['x(g)-index', indicators['x(g) index']],
                ['ICP proportion', indicators.icp, '%'],
                ['Male first authors', indicators['male-total'], '%'],
                ['Female first authors', indicators.female_total, '%'],
                ['Open Access availability', indicators['total oa prop'], '%'],
                ['Twitter coverage', indicators['twitter_coverage%'], '%'],
                ['Facebook coverage', indicators['fb_coverage%'], '%'],
                ['Mendeley coverage', indicators['mendeley_coverage%'], '%']
            ].forEach(([label, value, suffix = '']) => addCard(label, value, suffix));

            empty('institution-no-stats', $('institution-stat-cards').children.length === 0);

            const details = $('institution-details');
            Object.entries(external).forEach(([key, value]) => {
                if (!['grid', 'info', 'wiki_link', 'is_major'].includes(key)) {
                    addDetail(details, key, value);
                }
            });
            Object.entries(institution).forEach(([key, value]) => {
                if (![
                    'id',
                    'name',
                    'slug',
                    'grid_id',
                    'created_at',
                    'updated_at',
                    'description',
                    'source_note',
                    'is_major'
                ].includes(key.toLowerCase())) {
                    addDetail(details, key, value);
                }
            });

            const portfolio = $('research-portfolio-indicators');
            [['x-index', indicators['x index']], ['x(g)-index', indicators['x(g) index']]].forEach(([label, value]) => {
                if (value === null || value === undefined || value === '') return;
                const card = el('div', 'rounded-xl bg-gray-50 p-4 dark:bg-gray-800');
                card.appendChild(el('p', 'text-sm text-gray-500 dark:text-gray-400', label));
                card.appendChild(el('p', 'mt-1 text-2xl font-bold text-gray-900 dark:text-white', fmt(value)));
                portfolio.appendChild(card);
            });

            // 1. Publications and citations, two Y axes as in the legacy page.
            const pc = research.publication_citation || {};
            if (Object.keys(pc).length) {
                makeChart('chart-publications-citations', 'line', years, [
                    { label: 'No. of Publications', data: yearArray(pc, 'pub'), borderColor: '#dc2626', backgroundColor: '#dc262633', borderWidth: 3, tension: 0.2, yAxisID: 'y' },
                    { label: 'No. of Citations', data: yearArray(pc, 'cit'), borderColor: '#1d4ed8', backgroundColor: '#1d4ed833', borderWidth: 3, tension: 0.2, yAxisID: 'y1' }
                ], {
                    plugins: { legend: { position: 'top' }, title: { display: true, text: `Year-wise research output (CAGR = ${fmt(pc.cagr_pub)}%)` } },
                    scales: {
                        x: { title: { display: true, text: 'Year' } },
                        y: { beginAtZero: true, title: { display: true, text: 'Publications' } },
                        y1: { beginAtZero: true, position: 'right', grid: { drawOnChartArea: false }, title: { display: true, text: 'Citations' } }
                    }
                });
            } else empty('empty-publications-citations', true);

            // 2. Subject-wise output as a radar chart.
            const subjects = research.subject_series || [];
            if (subjects.length) {
                makeChart('chart-subjects', 'radar', subjects.map(r => r.name), [{
                    label: 'No. of publications',
                    data: subjects.map(r => number(r.value)),
                    borderColor: '#2563eb',
                    backgroundColor: '#60a5fa55',
                    borderWidth: 2,
                    pointBackgroundColor: '#1d4ed8'
                }], {
                    plugins: { legend: { position: 'top' } },
                    scales: { r: { beginAtZero: true, ticks: { precision: 0, backdropColor: 'transparent' }, pointLabels: { font: { size: 12 } } } }
                });
            } else empty('empty-subjects', true);

            // 3. Cited vs uncited percentages.
            const citedRow = (research.cited_percent || [])[0];
            if (citedRow) {
                const cited = yearArray(citedRow, 'cit');
                makeChart('chart-cited-percent', 'line', years, [
                    { label: 'Cited publications', data: cited, borderColor: '#2563eb', backgroundColor: '#60a5fa66', fill: true, borderWidth: 2, tension: 0.2, stack: 'percent' },
                    { label: 'Uncited publications', data: cited.map(v => v === null ? null : 100 - v), borderColor: '#dc2626', backgroundColor: '#fca5a566', fill: true, borderWidth: 2, tension: 0.2, stack: 'percent' }
                ], {
                    scales: { x: { stacked: true, title: { display: true, text: 'Year' } }, y: { stacked: true, min: 0, max: 100, title: { display: true, text: 'Percentage' } } }
                });
            } else empty('empty-cited-percent', true);

            // 4. Authorship types.
            const auth = research.author_types || [];
            if (auth.length) {
                makeChart('chart-authorship', 'line', auth.map(r => String(r.year)), rowsToDatasets(
                    auth,
                    ['auth_1', 'auth_2', 'auth_3', 'auth_4'],
                    ['1-authored publications', '2–5 authored publications', '6–10 authored publications', '10+ authored publications']
                ), {
                    scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Publications' } } }
                });
            } else empty('empty-authorship', true);

            // 5. Collaboration types.
            const collab = research.collaboration || [];
            if (collab.length) {
                makeChart('chart-collaboration', 'line', collab.map(r => String(r.year)), rowsToDatasets(
                    collab,
                    ['inter', 'dom_single', 'dom_multi'],
                    ['International collaboration', 'Domestic single-institution', 'Domestic multi-institution']
                ), {
                    scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Publications' } } }
                });
            } else empty('empty-collaboration', true);

            // 6. Major collaborators as a treemap using the Chart.js treemap plugin.
            const collaboratorRow = research.collaborators || {};
            const collabItems = [];
            for (let i = 1; i <= 10; i++) {
                const label = collaboratorRow[`C${i}`];
                const value = number(collaboratorRow[`P${i}`]);
                if (label !== null && label !== undefined && String(label).trim() !== '' && value !== null && value > 0) {
                    collabItems.push({ label: String(label), value });
                }
            }
            if (collabItems.length && typeof Chart !== 'undefined' && Chart.registry.getController('treemap')) {
                destroy('chart-collaborators');
                charts['chart-collaborators'] = new Chart($('chart-collaborators'), {
                    type: 'treemap',
                    data: { datasets: [{
                            label: 'Collaborations',
                            tree: collabItems,
                            key: 'value',
                            groups: ['label'],
                            spacing: 2,
                            borderWidth: 2,
                            borderColor: '#ffffff',
                            backgroundColor: context => palette[(context.dataIndex || 0) % palette.length],
                            labels: { display: true, color: '#ffffff', formatter: (context) => [context.raw?._data?.label || '', fmt(context.raw?.v)] },
                            captions: { display: true, color: '#ffffff', font: { size: 12, weight: 'bold' } }
                        }] },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: { callbacks: { title: items => items[0]?.raw?._data?.label || 'Collaborator', label: item => `Count: ${fmt(item.raw?.v)}` } }
                        }
                    }
                });
            } else empty('empty-collaborators', true);

            // 7. Research grants (fund_2010 ... fund_2019).
            const grantRow = (research.grants || [])[0];
            if (grantRow) {
                makeChart('chart-grants', 'line', years, [{
                    label: 'Amount in million USD',
                    data: yearArray(grantRow, 'fund'),
                    borderColor: '#dc2626',
                    backgroundColor: '#fca5a566',
                    fill: true,
                    borderWidth: 3,
                    tension: 0.2
                }], {
                    plugins: { legend: { position: 'top' }, title: { display: true, text: 'Year-wise research grants' } },
                    scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Amount in million USD' } } }
                });
            } else empty('empty-grants', true);

            // 8. Annual gender distribution.
            const gender = research.gender || [];
            if (gender.length) {
                makeChart('chart-gender', 'line', gender.map(r => String(r.year)), [
                    { label: 'Female first-authored publications', data: gender.map(r => number(r.female)), borderColor: '#dc2626', backgroundColor: '#fde04788', fill: true, borderWidth: 2, tension: 0.25 },
                    { label: 'Male first-authored publications', data: gender.map(r => number(r.male)), borderColor: '#2563eb', backgroundColor: '#60a5fa88', fill: true, borderWidth: 2, tension: 0.25 }
                ], { scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Percentage' } } } });
            } else empty('empty-gender', true);

            // 9. Open/closed access.
            const oa = research.open_access || [];
            if (oa.length) {
                makeChart('chart-open-access', 'line', oa.map(r => String(r.year)), [
                    { label: 'Open access', data: oa.map(r => number(r.open)), borderColor: '#2563eb', backgroundColor: '#60a5fa66', fill: true, borderWidth: 2, tension: 0.2 },
                    { label: 'Closed access', data: oa.map(r => number(r.closed)), borderColor: '#dc2626', backgroundColor: '#fca5a566', fill: true, borderWidth: 2, tension: 0.2 }
                ], { scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, max: 100, title: { display: true, text: 'Percentage' } } } });

                makeChart('chart-open-access-types', 'line', oa.map(r => String(r.year)), rowsToDatasets(
                    oa, ['gold', 'hybrid', 'green', 'bronze'],
                    ['Gold OA', 'Hybrid OA', 'Green OA', 'Bronze OA']
                ), { scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, max: 100, title: { display: true, text: 'Percentage' } } } });
            } else {
                empty('empty-open-access', true);
                empty('empty-open-access-types', true);
            }

            // 10. Altmetric coverage: the table has one row per metric and columns 2010–2019.
            const altmetric = research.altmetric || [];
            if (altmetric.length) {
                const datasets = altmetric.map((row, i) => ({
                    label: row.name || `Metric ${i + 1}`,
                    data: years.map(year => number(row[year])),
                    borderColor: palette[i % palette.length],
                    backgroundColor: palette[i % palette.length] + '25',
                    borderWidth: 2,
                    tension: 0.2,
                    fill: false
                })).filter(ds => ds.data.some(v => v !== null));
                if (datasets.length) {
                    makeChart('chart-altmetric', 'line', years, datasets, {
                        scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Coverage / value in source data' } } }
                    });
                } else empty('empty-altmetric', true);
            } else empty('empty-altmetric', true);

            // 11. SDG series, 17 metrics across years.
            const sdgRows = research.sdg_by_year || [];
            const sdgNames = [
                'No Poverty', 'Zero Hunger', 'Good Health and Well-Being',
                'Quality Education', 'Gender Equality', 'Clean Water and Sanitation',
                'Affordable and Clean Energy', 'Decent Work and Economic Growth',
                'Industry, Innovation and Infrastructure', 'Reduced Inequalities',
                'Sustainable Cities and Communities', 'Responsible Consumption and Production',
                'Climate Action', 'Life Below Water', 'Life on Land',
                'Peace, Justice and Strong Institutions', 'Partnerships for the Goals'
            ];
            if (sdgRows.length) {
                const sdgDatasets = Array.from({ length: 17 }, (_, i) => ({
                    label: `SDG ${i + 1}: ${sdgNames[i]}`,
                    data: sdgRows.map(row => number(row[`SDG${i + 1}`])),
                    borderColor: palette[i % palette.length],
                    backgroundColor: palette[i % palette.length] + '20',
                    borderWidth: 2,
                    pointRadius: 1,
                    tension: 0.15,
                    fill: false
                }));
                makeChart('chart-sdgs', 'line', sdgRows.map(row => String(row.year)), sdgDatasets, {
                    plugins: { legend: { position: 'bottom' } },
                    scales: { x: { title: { display: true, text: 'Year' } }, y: { beginAtZero: true, title: { display: true, text: 'Number of publications' } } }
                });
            } else empty('empty-sdgs', true);

        }

        function showError(message) {
            $('institution-loading').classList.add('hidden');
            $('institution-content').classList.add('hidden');
            $('institution-error').classList.remove('hidden');
            $('institution-error-message').textContent = message;
        }

        async function loadInstitution() {
            $('institution-loading').classList.remove('hidden');
            $('institution-error').classList.add('hidden');
            $('institution-content').classList.add('hidden');

            if (!root.dataset.slug) {
                showError('The institution slug is missing from the page route.');
                return;
            }

            try {
                const endpoint = new URL(root.dataset.api, window.location.origin);
                endpoint.searchParams.set('slug', root.dataset.slug);
                const response = await fetch(endpoint.toString(), {
                    method: 'GET',
                    headers: { Accept: 'application/json' },
                    credentials: 'same-origin'
                });

                let result;
                try {
                    result = await response.json();
                } catch {
                    throw new Error('The API returned a non-JSON response. Check the PHP error log.');
                }

                if (!response.ok || !result.success) {
                    throw new Error(result.message || `Request failed (${response.status}).`);
                }
                if (!result.data || !result.data.institution) {
                    throw new Error('The API response does not contain an institution.');
                }

                currentInstitutionData = result.data;
                render(result.data);
                $('institution-loading').classList.add('hidden');
                $('institution-content').classList.remove('hidden');
            } catch (error) {
                showError(error.message || 'An unexpected error occurred.');
            }
        }

        $('institution-retry').addEventListener('click', loadInstitution);
        $('download-institution-report')?.addEventListener('click', downloadReport);
        loadInstitution();
    })();
</script>
