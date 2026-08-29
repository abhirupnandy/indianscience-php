<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= e($pageTitle ?? SITE_NAME) ?>
        <?= isset($pageTitle) ? ' — ' . SITE_NAME : '' ?>
    </title>

    <meta
        name="description"
        content="<?= e($pageDescription ?? SITE_DESCRIPTION) ?>">

    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">

    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine.js -->
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind v4: class-based dark mode -->
    <style type="text/tailwindcss">
        @custom-variant dark (&:where(.dark, .dark *));
    </style>

    <!-- Prevent light-mode flash -->
    <script>
        (() => {
            const theme = localStorage.getItem('theme');

            if (
                theme === 'dark' ||
                (
                    theme === null &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                )
            ) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
</head>

<body class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

    <header class="sticky top-0 z-[120] w-full border-b border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-950">
        <?php partial('nav'); ?>
    </header>

    <main class="w-full p-4 sm:p-6 lg:p-8">