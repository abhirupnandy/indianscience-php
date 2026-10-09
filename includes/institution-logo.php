<?php

/**
 * Resolve an institution's local logo URL.
 *
 * Returns null if no matching image is available.
 */
function institutionLogoUrl(string $institutionName): ?string
{
    static $directories = null;

    $root = dirname(__DIR__) . '/assets/img/institutions';

    if ($directories === null) {
        $directories = [];

        foreach (glob($root . '/*', GLOB_ONLYDIR) ?: [] as $directory) {
            $directories[basename($directory)] = $directory;
        }
    }

    // Match the institution directory by its exact name.
    if (!isset($directories[$institutionName])) {
        return null;
    }

    $directory = $directories[$institutionName];

    $files = array_values(array_filter(
        scandir($directory) ?: [],
        static function (string $file) use ($directory): bool {
            return is_file($directory . '/' . $file)
                && preg_match('/\.(jpe?g|png|webp|svg|gif)$/i', $file);
        }
    ));

    if ($files === []) {
        return null;
    }

    // Explicit choices for directories containing multiple images.
    $preferred = [
        'Barkatullah University' => 'Barkatullah_University_logo.jpg',
    ];

    if (isset($preferred[$institutionName])
        && in_array($preferred[$institutionName], $files, true)
    ) {
        $filename = $preferred[$institutionName];
    } elseif (count($files) === 1) {
        $filename = $files[0];
    } else {
        // Deterministic fallback; review ambiguous directories separately.
        sort($files, SORT_NATURAL | SORT_FLAG_CASE);
        $filename = $files[0];
    }

    return url(
        'assets/img/institutions/'
        . rawurlencode($institutionName)
        . '/'
        . rawurlencode($filename)
    );
}