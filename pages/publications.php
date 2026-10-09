<?php

$pageTitle = 'Related Publications';

require ROOT_PATH.'/api/related_publications.php';

?>

<!-- Page header -->
<section
        class="border-b border-slate-200 bg-white
           dark:border-slate-800 dark:bg-slate-950">

    <div class="container px-4 py-12 sm:px-6 sm:py-16 lg:px-8">

        <div class="max-w-3xl">

            <p class="text-xs font-semibold uppercase
                      tracking-[0.2em] text-amber-500">
                Publications
            </p>

            <h1 class="mt-3 font-display text-4xl font-medium
                       tracking-tight text-slate-950
                       sm:text-5xl dark:text-white">
                Related publications
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-7
                      text-slate-600 sm:text-lg
                      dark:text-slate-400">
                Selected research and publications related to
                Indian research output, collaboration, impact,
                and scholarly communication.
            </p>

        </div>

    </div>

</section>


<!-- Publications table -->
<section
        class="bg-white px-4 py-10 dark:bg-slate-950
           sm:px-6 sm:py-14 lg:px-8">

    <div class="container">

        <!-- Search and page-size controls -->
        <form
                method="GET"
                action=""
                class="mb-6 flex flex-col gap-4
                   sm:flex-row sm:items-end sm:justify-between">

            <div class="w-full sm:max-w-md">

                <label
                        for="publication-search"
                        class="mb-2 block text-sm font-medium
                           text-slate-700 dark:text-slate-300">
                    Search publications
                </label>

                <div class="flex">

                    <input
                            type="search"
                            id="publication-search"
                            name="q"
                            value="<?= e($search) ?>"
                            placeholder="Title, author, or journal..."
                            class="min-w-0 flex-1 rounded-l-lg
                               border border-r-0 border-slate-300
                               bg-white px-4 py-2.5 text-sm
                               text-slate-900 placeholder:text-slate-400
                               focus:border-amber-500 focus:outline-none
                               focus:ring-1 focus:ring-amber-500
                               dark:border-slate-700
                               dark:bg-slate-900 dark:text-white"
                    >

                    <button
                            type="submit"
                            class="rounded-r-lg border border-slate-900
                               bg-slate-900 px-4 py-2.5 text-sm
                               font-semibold text-white
                               transition hover:bg-slate-700
                               dark:border-slate-700
                               dark:bg-slate-800
                               dark:hover:bg-slate-700">
                        Search
                    </button>

                </div>

            </div>

            <div class="flex items-center gap-3">

                <label
                        for="publication-per-page"
                        class="whitespace-nowrap text-sm
                           text-slate-600 dark:text-slate-400">
                    View per page
                </label>

                <select
                        id="publication-per-page"
                        name="per_page"
                        onchange="this.form.submit()"
                        class="rounded-lg border border-slate-300
                           bg-white px-3 py-2.5 text-sm
                           text-slate-900 focus:border-amber-500
                           focus:outline-none focus:ring-1
                           focus:ring-amber-500
                           dark:border-slate-700
                           dark:bg-slate-900 dark:text-white">

                    <?php foreach ($allowedPageSizes as $size) { ?>
                        <option
                                value="<?= $size ?>"
                                <?= $perPage === $size ? 'selected' : '' ?>>
                            <?= $size ?>
                        </option>
                    <?php } ?>

                </select>

            </div>

        </form>


        <!-- Result summary -->
        <div class="mb-4 flex flex-col gap-1
                    text-sm text-slate-500
                    dark:text-slate-400
                    sm:flex-row sm:items-center
                    sm:justify-between">

            <p>
                Showing
                <span class="font-semibold text-slate-900
                             dark:text-white">
                    <?= $firstResult ?>–<?= $lastResult ?>
                </span>
                of
                <span class="font-semibold text-slate-900
                             dark:text-white">
                    <?= number_format($totalPublications) ?>
                </span>
                <?= $search !== '' ? 'matching ' : '' ?>
                <?= $totalPublications === 1
                        ? 'publication'
                        : 'publications' ?>.
            </p>

            <?php if ($search !== '') { ?>
                <a
                        href="<?= e('?'.http_build_query([
                            'per_page' => $perPage,
                            'page' => 1,
                        ])) ?>"
                        class="font-medium text-amber-700
                           hover:underline dark:text-amber-400">
                    Clear search
                </a>
            <?php } ?>

        </div>


        <?php if ($publications) { ?>

            <div class="overflow-x-auto rounded-lg
                        border border-slate-200
                        dark:border-slate-800">

                <table class="w-full min-w-[760px]
                              border-collapse text-left text-sm">

                    <thead>
                    <tr class="bg-slate-50 dark:bg-slate-900">

                        <th
                                scope="col"
                                class="w-16 px-4 py-4 text-xs
                                       font-semibold uppercase
                                       tracking-wider text-slate-500
                                       dark:text-slate-400">
                            No.
                        </th>

                        <th
                                scope="col"
                                class="px-4 py-4 text-xs font-semibold
                                       uppercase tracking-wider
                                       text-slate-500
                                       dark:text-slate-400">
                            Publication
                        </th>

                        <th
                                scope="col"
                                class="w-56 px-4 py-4 text-xs
                                       font-semibold uppercase
                                       tracking-wider text-slate-500
                                       dark:text-slate-400">
                            Journal
                        </th>

                        <th
                                scope="col"
                                class="w-24 px-4 py-4 text-xs
                                       font-semibold uppercase
                                       tracking-wider text-slate-500
                                       dark:text-slate-400">
                            Year
                        </th>

                        <th
                                scope="col"
                                class="w-36 px-4 py-4 text-xs
                                       font-semibold uppercase
                                       tracking-wider text-slate-500
                                       dark:text-slate-400">
                            Link
                        </th>

                    </tr>
                    </thead>

                    <tbody
                            class="divide-y divide-slate-200
                               dark:divide-slate-800">

                    <?php foreach ($publications as $index => $pub) { ?>

                        <tr class="transition-colors
                                       hover:bg-amber-50/50
                                       dark:hover:bg-slate-900/70">

                            <td
                                    class="px-4 py-5 align-top
                                           font-display text-sm
                                           text-slate-400
                                           dark:text-slate-500">
                                <?= str_pad(
                                    $offset + $index + 1,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                ) ?>
                            </td>

                            <td class="px-4 py-5 align-top">

                                <?php if (! empty($pub['authors'])) { ?>
                                    <p
                                            class="mb-2 text-xs leading-5
                                                   text-slate-500
                                                   dark:text-slate-400">
                                        <?= e($pub['authors']) ?>
                                    </p>
                                <?php } ?>

                                <p
                                        class="font-semibold leading-6
                                               text-slate-950
                                               dark:text-white">
                                    <?= e($pub['title']) ?>
                                </p>

                            </td>

                            <td
                                    class="px-4 py-5 align-top
                                           leading-6 text-slate-600
                                           dark:text-slate-400">
                                <?= ! empty($pub['journal'])
                                        ? e($pub['journal'])
                                        : '—' ?>
                            </td>

                            <td
                                    class='px-4 py-5 align-top
           text-slate-600
           dark:text-slate-400'>

                                <?= ! empty($pub['published_at'])
                                        ? e((string) $pub['published_at'])
                                        : '—' ?>

                            </td>

                            <td class="px-4 py-5 align-top">

                                <?php if (! empty($pub['url'])) { ?>

                                    <a
                                            href="<?= e($pub['url']) ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-2
                                                   font-semibold text-slate-800
                                                   underline decoration-amber-400
                                                   decoration-2 underline-offset-4
                                                   hover:text-amber-700
                                                   dark:text-slate-200
                                                   dark:hover:text-amber-400">

                                        Read publication

                                        <svg
                                                class="h-4 w-4 shrink-0"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                aria-hidden="true">

                                            <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M7 17 17 7M7 7h10v10" />

                                        </svg>

                                    </a>

                                <?php } else { ?>

                                    <span
                                            class="text-slate-400
                                                   dark:text-slate-500">
                                            Unavailable
                                        </span>

                                <?php } ?>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>


            <!-- Pagination -->
            <?php if ($totalPages > 1) { ?>

                <?php
                $startPage = max(1, $page - 2);
                $endPage = min($totalPages, $page + 2);

                if ($page <= 3) {
                    $endPage = min($totalPages, 5);
                }

                if ($page > $totalPages - 3) {
                    $startPage = max(1, $totalPages - 4);
                }
                ?>

                <nav
                        class="mt-6 flex flex-col gap-4
                           sm:flex-row sm:items-center
                           sm:justify-between"
                        aria-label="Publication pagination">

                    <p class="text-sm text-slate-500
                              dark:text-slate-400">
                        Page <?= $page ?> of <?= $totalPages ?>
                    </p>

                    <div class="flex flex-wrap items-center gap-1">

                        <!-- Previous -->
                        <?php if ($page > 1) { ?>

                            <a
                                    href="<?= e($paginationUrl($page - 1)) ?>"
                                    rel="prev"
                                    class="rounded-lg border border-slate-300
                                       px-3 py-2 text-sm font-medium
                                       text-slate-700 transition
                                       hover:bg-slate-100
                                       dark:border-slate-700
                                       dark:text-slate-300
                                       dark:hover:bg-slate-800">
                                Previous
                            </a>

                        <?php } else { ?>

                            <span
                                    class="cursor-not-allowed rounded-lg
                                       border border-slate-200 px-3 py-2
                                       text-sm text-slate-400
                                       dark:border-slate-800
                                       dark:text-slate-600">
                                Previous
                            </span>

                        <?php } ?>


                        <!-- First page -->
                        <?php if ($startPage > 1) { ?>

                            <a
                                    href="<?= e($paginationUrl(1)) ?>"
                                    class="rounded-lg border border-slate-300
                                       px-3 py-2 text-sm text-slate-700
                                       hover:bg-slate-100
                                       dark:border-slate-700
                                       dark:text-slate-300
                                       dark:hover:bg-slate-800">
                                1
                            </a>

                            <?php if ($startPage > 2) { ?>
                                <span
                                        class="px-1 text-slate-400"
                                        aria-hidden="true">
                                    …
                                </span>
                            <?php } ?>

                        <?php } ?>


                        <!-- Numbered pages -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++) { ?>

                            <?php if ($i === $page) { ?>

                                <span
                                        aria-current="page"
                                        class="rounded-lg border
                                           border-slate-900 bg-slate-900
                                           px-3 py-2 text-sm font-semibold
                                           text-white
                                           dark:border-amber-500
                                           dark:bg-amber-500
                                           dark:text-slate-950">
                                    <?= $i ?>
                                </span>

                            <?php } else { ?>

                                <a
                                        href="<?= e($paginationUrl($i)) ?>"
                                        class="rounded-lg border
                                           border-slate-300 px-3 py-2
                                           text-sm text-slate-700
                                           hover:bg-slate-100
                                           dark:border-slate-700
                                           dark:text-slate-300
                                           dark:hover:bg-slate-800">
                                    <?= $i ?>
                                </a>

                            <?php } ?>

                        <?php } ?>


                        <!-- Last page -->
                        <?php if ($endPage < $totalPages) { ?>

                            <?php if ($endPage < $totalPages - 1) { ?>
                                <span
                                        class="px-1 text-slate-400"
                                        aria-hidden="true">
                                    …
                                </span>
                            <?php } ?>

                            <a
                                    href="<?= e($paginationUrl($totalPages)) ?>"
                                    class="rounded-lg border border-slate-300
                                       px-3 py-2 text-sm text-slate-700
                                       hover:bg-slate-100
                                       dark:border-slate-700
                                       dark:text-slate-300
                                       dark:hover:bg-slate-800">
                                <?= $totalPages ?>
                            </a>

                        <?php } ?>


                        <!-- Next -->
                        <?php if ($page < $totalPages) { ?>

                            <a
                                    href="<?= e($paginationUrl($page + 1)) ?>"
                                    rel="next"
                                    class="rounded-lg border border-slate-300
                                       px-3 py-2 text-sm font-medium
                                       text-slate-700 hover:bg-slate-100
                                       dark:border-slate-700
                                       dark:text-slate-300
                                       dark:hover:bg-slate-800">
                                Next
                            </a>

                        <?php } else { ?>

                            <span
                                    class="cursor-not-allowed rounded-lg
                                       border border-slate-200 px-3 py-2
                                       text-sm text-slate-400
                                       dark:border-slate-800
                                       dark:text-slate-600">
                                Next
                            </span>

                        <?php } ?>

                    </div>

                </nav>

            <?php } ?>


        <?php } else { ?>

            <!-- Empty state -->
            <div
                    class="rounded-lg border border-slate-200
                       py-16 text-center
                       dark:border-slate-800">

                <p class="text-sm font-medium text-slate-700
                          dark:text-slate-300">
                    <?= $search !== ''
                            ? 'No publications match your search.'
                            : 'No publications are currently available.' ?>
                </p>

                <?php if ($search !== '') { ?>

                    <a
                            href="<?= e('?'.http_build_query([
                                'per_page' => $perPage,
                                'page' => 1,
                            ])) ?>"
                            class="mt-3 inline-block text-sm font-semibold
                               text-amber-700 hover:underline
                               dark:text-amber-400">
                        Clear search and show all publications
                    </a>

                <?php } ?>

            </div>

        <?php } ?>

    </div>

</section>