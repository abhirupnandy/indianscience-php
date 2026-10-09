<?php

/**
 * includes/functions.php — small reusable helpers available on every page.
 */

use JetBrains\PhpStorm\NoReturn;

/** Escape a string for safe HTML output. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/** Build a root-relative site URL, e.g. url('institution/iisc-bangalore'). */
function url(string $path = ''): string
{
    return '/'.ltrim($path, '/');
}

/** Format an integer with thousands separators, or "—" if null. */
function format_number($value): string
{
    return $value === null || $value === '' ? '—' : number_format((float) $value);
}

/** Format a percentage value, or "—" if null. */
function format_percent($value): string
{
    if ($value === null || $value === '') {
        return '—';
    }

    return rtrim(rtrim(number_format((float) $value, 2), '0'), '.').'%';
}

/** Format a date/datetime string for display, e.g. "10 Jan 2024". */
function format_date(?string $datetime): string
{
    if (! $datetime) {
        return '';
    }
    $ts = strtotime($datetime);

    return $ts ? date('d M Y', $ts) : '';
}

/** Render a partial with variables available in its own scope. */
function partial(string $name, array $vars = []): void
{
    extract($vars, EXTR_SKIP);
    require ROOT_PATH.'/partials/'.$name.'.php';
}

/** Fetch one row by a WHERE column = value lookup, or null. */
function db_find(PDO $pdo, string $table, string $column, string $value): ?array
{
    $stmt = $pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :value LIMIT 1");
    $stmt->execute([':value' => $value]);
    $row = $stmt->fetch();

    return $row ?: null;
}

/** Send a 404 status and render the 404 page, then stop. */
#[NoReturn]
function abort_404(): void
{
    global $pdo;

    http_response_code(404);
    $pageTitle = 'Page Not Found';

    ob_start();
    require ROOT_PATH.'/pages/404.php';
    $content = ob_get_clean();

    require ROOT_PATH.'/partials/header.php';
    echo $content;
    require ROOT_PATH.'/partials/footer.php';
    exit;
}
