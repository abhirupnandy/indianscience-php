
<?php
$pageTitle = 'Institutional Reports';
?>

<div
        id="institution-directory"
        data-api="<?= e(url('api/fetch_institution_list.php')) ?>"
        data-detail-base="<?= e(url('institutions')) ?>"
        class="mx-auto w-full max-w-6xl px-4 py-10 sm:px-6 lg:px-8"
>
    <header class="mb-8 border-b border-gray-200 pb-6 dark:border-gray-800">
        <p class="mb-2 text-sm font-semibold uppercase tracking-widest text-indigo-600 dark:text-indigo-400">
            Research Resources
        </p>

        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
            Institutional Reports
        </h1>

        <p class="mt-3 max-w-2xl text-base leading-7 text-gray-600 dark:text-gray-400">
            Browse research institutions alphabetically and access their
            institutional profiles.
        </p>
    </header>

    <!-- Search -->
    <form id="institution-search-form" class="mb-7 flex flex-col gap-3 sm:flex-row">
        <label for="institution-search" class="sr-only">
            Search institutions
        </label>

        <input
                id="institution-search"
                name="q"
                type="search"
                autocomplete="off"
                value="<?= e($_GET['q'] ?? '') ?>"
                placeholder="Search by institution, city, state or GRID ID..."
                class="min-w-0 flex-1 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
        >

        <button
                type="submit"
                class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
        >
            Search
        </button>

        <button
                id="institution-search-clear"
                type="button"
                class="hidden rounded-xl border border-gray-300 px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800"
        >
            Clear search
        </button>
    </form>

    <!-- Alphabetical filters -->
    <section class="mb-7">
        <h2 class="mb-3 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
            Browse alphabetically
        </h2>

        <div
                id="institution-letters"
                class="flex flex-wrap gap-1.5"
                aria-label="Filter institutions alphabetically"
        >
            <?php foreach (array_merge(['All'], range('A', 'Z'), ['#']) as $letter): ?>
                <button
                        type="button"
                        data-letter="<?= $letter === 'All' ? '' : e($letter) ?>"
                        aria-pressed="<?= $letter === 'All' ? 'true' : 'false' ?>"
                        class="institution-letter inline-flex h-9 min-w-9 items-center justify-center rounded-lg border border-gray-200 px-2.5 text-sm font-semibold text-gray-600 transition hover:border-indigo-300 hover:text-indigo-700 aria-pressed:border-indigo-600 aria-pressed:bg-indigo-600 aria-pressed:text-white dark:border-gray-800 dark:text-gray-400 dark:hover:text-indigo-300 dark:aria-pressed:border-indigo-500 dark:aria-pressed:bg-indigo-500 dark:aria-pressed:text-white"
                >
                    <?= e($letter) ?>
                </button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Results summary -->
    <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p
                id="institution-results-summary"
                class="text-sm text-gray-500 dark:text-gray-400"
                aria-live="polite"
        >
            Loading institutions...
        </p>

        <label class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            Show
            <select
                    id="institution-page-size"
                    class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
            >
                <option value="10">10</option>
                <option value="20" selected>20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            per page
        </label>
    </div>

    <!-- Institution results -->
    <div
            id="institution-results"
            aria-busy="true"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-950"
    >
        <div class="px-5 py-12 text-center text-sm text-gray-500 dark:text-gray-400">
            Loading institutions...
        </div>
    </div>

    <!-- Pagination -->
    <nav
            id="institution-pagination"
            aria-label="Institution pagination"
            class="mt-6 flex flex-wrap items-center justify-between gap-4"
    ></nav>
</div>

<script>
    (() => {
        const root = document.getElementById('institution-directory');
        if (!root) return;

        const apiUrl = root.dataset.api;
        const detailBase = root.dataset.detailBase.replace(/\/+$/, '');

        const form = document.getElementById('institution-search-form');
        const searchInput = document.getElementById('institution-search');
        const clearButton = document.getElementById('institution-search-clear');
        const pageSizeSelect = document.getElementById('institution-page-size');
        const letters = document.getElementById('institution-letters');
        const results = document.getElementById('institution-results');
        const summary = document.getElementById('institution-results-summary');
        const pagination = document.getElementById('institution-pagination');

        const params = new URLSearchParams(window.location.search);

        const state = {
            q: params.get('q') || '',
            letter: params.get('letter') || '',
            page: Math.max(1, Number(params.get('page') || 1)),
            perPage: [10, 20, 50, 100].includes(
                Number(params.get('per_page'))
            ) ? Number(params.get('per_page')) : 20
        };

        let controller = null;
        let searchDebounce = null;

        function el(tag, className, text = '') {
            const node = document.createElement(tag);
            node.className = className;
            node.textContent = text;
            return node;
        }

        function updateAlphabet() {
            letters.querySelectorAll('[data-letter]').forEach(button => {
                button.setAttribute(
                    'aria-pressed',
                    String(button.dataset.letter === state.letter)
                );
            });
        }

        function renderList(items) {
            results.replaceChildren();

            if (!items.length) {
                const empty = el('div', 'px-5 py-16 text-center');

                empty.append(
                    el(
                        'h2',
                        'text-lg font-semibold text-gray-900 dark:text-white',
                        'No institutions found'
                    ),
                    el(
                        'p',
                        'mt-2 text-sm text-gray-500 dark:text-gray-400',
                        'Try a different search term or alphabetical filter.'
                    )
                );

                results.append(empty);
                return;
            }

            const list = el(
                'ul',
                'divide-y divide-gray-100 dark:divide-gray-800'
            );

            items.forEach(institution => {
                const item = el('li', 'group');

                const row = el(
                    'div',
                    'flex flex-col gap-4 px-4 py-4 transition hover:bg-gray-50 sm:flex-row sm:items-center sm:justify-between sm:px-5 dark:hover:bg-gray-900'
                );

                const identity = el('div', 'flex min-w-0 items-center gap-4');

                const initial = Array.from(
                    (institution.name || '?').trim()
                )[0] || '?';

                const badge = el(
                    'span',
                    'flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-sm font-bold text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-300',
                    initial.toUpperCase()
                );

                const text = el('div', 'min-w-0');

                text.append(
                    el(
                        'h2',
                        'text-sm font-semibold leading-6 text-gray-900 dark:text-white',
                        institution.name || 'Unnamed institution'
                    )
                );

                const metadata = [
                    institution.institution_type,
                    [
                        institution.city,
                        institution.state
                    ].filter(Boolean).join(', ')
                ].filter(Boolean);

                if (metadata.length) {
                    text.append(
                        el(
                            'p',
                            'mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400',
                            metadata.join(' · ')
                        )
                    );
                }

                identity.append(badge, text);

                const action = document.createElement('a');

                action.className =
                    'inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-indigo-200 px-4 py-2.5 text-sm font-semibold text-indigo-700 transition hover:border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-indigo-500/20 dark:border-indigo-900 dark:text-indigo-300 dark:hover:border-indigo-500 dark:hover:bg-indigo-500 dark:hover:text-white';

                // Open the individual institution page directly using its slug.
                if (institution.slug) {
                    action.href = detailBase + '/' +
                        encodeURIComponent(institution.slug);
                } else {
                    action.href = '#';
                    action.setAttribute('aria-disabled', 'true');
                    action.classList.add('opacity-50');
                }

                action.append(
                    document.createTextNode('See institution details'),
                    el('span', '', '→')
                );

                action.lastChild.setAttribute('aria-hidden', 'true');

                row.append(identity, action);
                item.append(row);
                list.append(item);
            });

            results.append(list);
        }

        function renderPagination(meta) {
            pagination.replaceChildren();

            if (!meta || !meta.total_pages || meta.total_pages <= 1) {
                return;
            }

            const info = el(
                'p',
                'text-sm text-gray-500 dark:text-gray-400',
                `Page ${meta.page} of ${meta.total_pages}`
            );

            const controls = el('div', 'flex flex-wrap items-center gap-1.5');

            function addButton(label, targetPage, disabled = false, active = false) {
                const button = el(
                    'button',
                    'inline-flex h-10 min-w-10 items-center justify-center rounded-lg border px-3 text-sm font-semibold transition disabled:cursor-not-allowed disabled:opacity-40 ' +
                    (active
                        ? 'border-indigo-600 bg-indigo-600 text-white'
                        : 'border-gray-300 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800'),
                    label
                );

                button.type = 'button';
                button.disabled = disabled;

                if (active) {
                    button.setAttribute('aria-current', 'page');
                }

                button.addEventListener('click', () => {
                    state.page = targetPage;
                    loadInstitutions();
                });

                controls.append(button);
            }

            addButton('Previous', meta.page - 1, meta.page <= 1);

            const first = Math.max(1, meta.page - 2);
            const last = Math.min(meta.total_pages, meta.page + 2);

            if (first > 1) {
                addButton('1', 1);

                if (first > 2) {
                    controls.append(el('span', 'px-1 text-gray-400', '…'));
                }
            }

            for (let p = first; p <= last; p++) {
                addButton(String(p), p, false, p === meta.page);
            }

            if (last < meta.total_pages) {
                if (last < meta.total_pages - 1) {
                    controls.append(el('span', 'px-1 text-gray-400', '…'));
                }

                addButton(String(meta.total_pages), meta.total_pages);
            }

            addButton('Next', meta.page + 1, meta.page >= meta.total_pages);

            pagination.append(info, controls);
        }

        function updateAddressBar() {
            const url = new URL(window.location.href);

            ['q', 'letter', 'page', 'per_page'].forEach(key => {
                url.searchParams.delete(key);
            });

            if (state.q) url.searchParams.set('q', state.q);
            if (state.letter) url.searchParams.set('letter', state.letter);
            if (state.page > 1) url.searchParams.set('page', state.page);

            if (state.perPage !== 20) {
                url.searchParams.set('per_page', state.perPage);
            }

            window.history.replaceState({}, '', url);
        }

        async function loadInstitutions() {
            if (controller) {
                controller.abort();
            }

            const requestController = new AbortController();
            controller = requestController;

            results.setAttribute('aria-busy', 'true');

            results.replaceChildren(
                el(
                    'div',
                    'px-5 py-12 text-center text-sm text-gray-500 dark:text-gray-400',
                    'Loading institutions...'
                )
            );

            const requestParams = new URLSearchParams({
                q: state.q,
                letter: state.letter,
                page: String(state.page),
                per_page: String(state.perPage)
            });

            try {
                const response = await fetch(
                    `${apiUrl}?${requestParams.toString()}`,
                    {
                        headers: {
                            Accept: 'application/json'
                        },
                        signal: requestController.signal
                    }
                );

                if (!response.ok) {
                    throw new Error('Institution request failed.');
                }

                const payload = await response.json();

                if (!payload.success) {
                    throw new Error(
                        payload.message || 'Unable to load institutions.'
                    );
                }

                // Ignore results if a newer request has replaced this one.
                if (controller !== requestController) return;

                renderList(payload.data || []);

                const meta = payload.pagination || {
                    total: 0,
                    total_pages: 0,
                    from: 0,
                    to: 0,
                    page: state.page
                };

                summary.textContent = meta.total
                    ? `Showing ${meta.from}–${meta.to} of ${meta.total} institutions`
                    : 'No institutions found';

                clearButton.classList.toggle('hidden', state.q === '');

                updateAlphabet();
                renderPagination(meta);
                updateAddressBar();

            } catch (error) {
                if (
                    error.name === 'AbortError' ||
                    controller !== requestController
                ) {
                    return;
                }

                results.replaceChildren(
                    el(
                        'div',
                        'px-5 py-12 text-center text-sm text-red-600 dark:text-red-400',
                        'Unable to load institutions. Please try again.'
                    )
                );

                summary.textContent = 'Unable to load results';
                pagination.replaceChildren();

            } finally {
                if (controller === requestController) {
                    results.setAttribute('aria-busy', 'false');
                }
            }
        }

        // Manual form submission remains available.
        form.addEventListener('submit', event => {
            event.preventDefault();

            clearTimeout(searchDebounce);

            state.q = searchInput.value.trim();
            state.letter = '';
            state.page = 1;

            loadInstitutions();
        });

        // Reactive AJAX search after 3 characters.
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim();

            clearTimeout(searchDebounce);

            if (query.length < 3) {
                // Restore the unfiltered directory if a previous query was active.
                if (state.q !== '' || state.letter !== '') {
                    state.q = '';
                    state.letter = '';
                    state.page = 1;
                    loadInstitutions();
                }

                return;
            }

            searchDebounce = setTimeout(() => {
                if (state.q === query && state.letter === '') {
                    return;
                }

                state.q = query;
                state.letter = '';
                state.page = 1;

                loadInstitutions();
            }, 300);
        });

        clearButton.addEventListener('click', () => {
            clearTimeout(searchDebounce);

            searchInput.value = '';
            state.q = '';
            state.letter = '';
            state.page = 1;

            loadInstitutions();
            searchInput.focus();
        });

        letters.addEventListener('click', event => {
            const button = event.target.closest('[data-letter]');
            if (!button) return;

            clearTimeout(searchDebounce);

            state.letter = button.dataset.letter;
            state.q = '';
            state.page = 1;

            searchInput.value = '';

            loadInstitutions();
        });

        pageSizeSelect.addEventListener('change', () => {
            state.perPage = Number(pageSizeSelect.value);
            state.page = 1;

            loadInstitutions();
        });

        // Initialise controls from the current URL.
        searchInput.value = state.q;
        pageSizeSelect.value = String(state.perPage);

        updateAlphabet();
        loadInstitutions();
    })();
</script>
