
<?php
/**
 * Partial: Flip team member card
 *
 * Expected variables:
 *   $member   array
 *   $featured bool (optional)
 */
$featured = $featured ?? false;

$name = $member['name'] ?? 'Team member';
$role = $member['role'] ?? '';
$bio = $member['bio'] ?? '';
$photo = $member['photo'] ?? null;
$initials = $member['initials'] ?? 'TM';

$cardId = 'team-card-'.bin2hex(random_bytes(6));
?>

<article
    class="group h-full"
    data-team-card>

    <button
        type="button"
        class="w-full text-left focus-visible:outline-none
               focus-visible:ring-2 focus-visible:ring-indigo-500
               focus-visible:ring-offset-4
               dark:focus-visible:ring-offset-slate-950"
        aria-label="View details for <?= e($name) ?>"
        aria-expanded="false"
        aria-controls="<?= e($cardId) ?>"
        data-team-card-toggle>

        <!-- Flip container -->
        <div
            class="relative w-full rounded-2xl
                   [perspective:1200px]">

            <div
                id="<?= e($cardId) ?>"
                class="relative w-full rounded-2xl
                       transition-transform duration-500
                       [transform-style:preserve-3d]
                       motion-reduce:transition-none"
                data-team-card-inner>

                <!-- =========================================
                     FRONT
                     ========================================= -->

                <div
                    class="flex h-full min-h-[340px] flex-col
                           overflow-hidden rounded-2xl border
                           border-gray-200 bg-white
                           shadow-sm transition-shadow duration-200
                           group-hover:shadow-lg
                           group-hover:shadow-gray-900/5
                           dark:border-gray-800 dark:bg-gray-900
                           dark:group-hover:shadow-black/20
                           [backface-visibility:hidden]">

                    <!-- Image -->
                    <div class="<?= $featured
                        ? 'pt-7'
                        : 'pt-6' ?> px-5">

                        <div
                            class="<?= $featured
                                ? 'h-32 w-32'
                                : 'h-28 w-28' ?>
                                mx-auto overflow-hidden rounded-2xl
                                bg-gray-100 ring-1 ring-gray-200
                                dark:bg-gray-800 dark:ring-gray-700">

                            <?php if ($photo) { ?>

                                <img
                                    src="<?= e($photo) ?>"
                                    alt="<?= e($name) ?>"
                                    loading="lazy"
                                    class="h-full w-full object-cover
                                           transition duration-300
                                           group-hover:scale-105"/>

                            <?php } else { ?>

                                <div
                                    class="flex h-full w-full
                                           items-center justify-center
                                           bg-gradient-to-br
                                           from-indigo-100 via-slate-100
                                           to-sky-100
                                           text-3xl font-bold
                                           tracking-tight text-indigo-700
                                           dark:from-indigo-950
                                           dark:via-slate-800
                                           dark:to-sky-950
                                           dark:text-indigo-300">

                                    <?= e($initials) ?>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                    <!-- Identity -->
                    <div
                        class="flex flex-1 flex-col items-center
                               px-5 pb-5 pt-5 text-center">

                        <?php if ($featured) { ?>

                            <span
                                class="mb-3 inline-flex items-center
                                       gap-1.5 rounded-full
                                       bg-indigo-50 px-3 py-1
                                       text-xs font-semibold
                                       tracking-wide text-indigo-700
                                       dark:bg-indigo-400/10
                                       dark:text-indigo-300">

                                <svg
                                    class="h-3.5 w-3.5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    aria-hidden="true">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m12 3 2.7 5.47 6.03.88-4.36 4.25 1.03 6.01L12 16.77l-5.4 2.84 1.03-6.01-4.36-4.25 6.03-.88L12 3Z"/>
                                </svg>

                                Team Leader

                            </span>

                        <?php } ?>

                        <h3
                            class="<?= $featured
                                ? 'text-xl sm:text-2xl'
                                : 'text-lg' ?>
                                font-bold tracking-tight
                                text-gray-900 dark:text-white">

                            <?= e($name) ?>

                        </h3>

                        <?php if ($role !== '') { ?>

                            <p
                                class="mt-1.5 text-sm font-medium
                                       text-indigo-600
                                       dark:text-indigo-400">

                                <?= e($role) ?>

                            </p>

                        <?php } ?>

                        <!-- Flip hint -->
                        <span
                            class="mt-auto flex items-center gap-2
                                   pt-6 text-xs font-medium
                                   text-gray-500 dark:text-gray-400">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 4v5h5M20 20v-5h-5M5.5 9A7 7 0 0118 6l2 3M18.5 15A7 7 0 016 18l-2-3"/>
                            </svg>

                            Click to discover

                        </span>

                    </div>

                </div>


                <!-- =========================================
                     BACK
                     ========================================= -->

                <div
                    aria-hidden="true"
                    inert
                    data-team-card-back
                    class="absolute inset-0 flex min-h-[340px]
                           flex-col overflow-y-auto rounded-2xl
                           border border-indigo-200
                           bg-gradient-to-br from-indigo-50
                           via-white to-sky-50 p-6
                           dark:border-indigo-400/20
                           dark:from-slate-900 dark:via-slate-900
                           dark:to-indigo-950/50
                           [backface-visibility:hidden]
                           [transform:rotateY(180deg)]">

                    <!-- Back header -->
                    <div class="flex items-start gap-3">

                        <div
                            class='h-10 w-10 shrink-0 overflow-hidden rounded-xl
           bg-gray-100 ring-1 ring-gray-200
           dark:bg-gray-800 dark:ring-gray-700'>

                            <?php if ($photo) { ?>

                                <img
                                    src="<?= e($photo) ?>"
                                    alt="<?= e($name) ?>"
                                    loading="lazy"
                                    class="h-full w-full object-cover"/>

                            <?php } else { ?>

                                <div
                                    class="flex h-full w-full items-center justify-center
                   bg-indigo-100 text-xs font-bold text-indigo-700
                   dark:bg-indigo-400/10 dark:text-indigo-300">
                                    <?= e($initials) ?>
                                </div>

                            <?php } ?>

                        </div>

                        <div class="min-w-0">

                            <h3
                                class="text-lg font-bold
                                       tracking-tight text-gray-900
                                       dark:text-white">

                                <?= e($name) ?>

                            </h3>

                            <?php if ($role !== '') { ?>

                                <p
                                    class="mt-1 text-sm font-medium
                                           text-indigo-600
                                           dark:text-indigo-400">

                                    <?= e($role) ?>

                                </p>

                            <?php } ?>

                        </div>

                    </div>

                    <div
                        class="my-5 border-t border-indigo-200/80
                               dark:border-gray-700">
                    </div>

                    <!-- Biography -->
                    <p
                        class="text-sm leading-7 text-gray-700
                               dark:text-gray-300">

                        <?= e($bio !== ''
                            ? $bio
                            : 'More information about this team member will be added soon.') ?>

                    </p>

                    <!-- Flip hint -->
                    <div
                        class="mt-auto flex items-center gap-2
                               pt-6 text-xs font-medium
                               text-indigo-600 dark:text-indigo-400">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.7"
                            aria-hidden="true">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 4v5h5M20 20v-5h-5M5.5 9A7 7 0 0118 6l2 3M18.5 15A7 7 0 016 18l-2-3"/>
                        </svg>

                        Click to return

                    </div>

                </div>

            </div>

        </div>

    </button>

</article>
