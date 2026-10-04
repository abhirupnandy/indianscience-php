<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC INTERNATIONAL COLLABORATION DATA
// ================================================================

$icptop20 = [

    [
        'rank' => 1,
        'country' => 'United States',
        'tp' => 12500,
        'icp' => 3200,
        'icp_percentage' => 25.60,
    ],

    [
        'rank' => 2,
        'country' => 'China',
        'tp' => 11200,
        'icp' => 2100,
        'icp_percentage' => 18.75,
    ],

    [
        'rank' => 3,
        'country' => 'United Kingdom',
        'tp' => 9800,
        'icp' => 2400,
        'icp_percentage' => 24.49,
    ],

    [
        'rank' => 4,
        'country' => 'Germany',
        'tp' => 8500,
        'icp' => 2100,
        'icp_percentage' => 24.71,
    ],

    [
        'rank' => 5,
        'country' => 'India',
        'tp' => 8200,
        'icp' => 1500,
        'icp_percentage' => 18.29,
    ],

    [
        'rank' => 6,
        'country' => 'Japan',
        'tp' => 7600,
        'icp' => 1300,
        'icp_percentage' => 17.11,
    ],

    [
        'rank' => 7,
        'country' => 'France',
        'tp' => 7200,
        'icp' => 1900,
        'icp_percentage' => 26.39,
    ],

    [
        'rank' => 8,
        'country' => 'Canada',
        'tp' => 6800,
        'icp' => 1800,
        'icp_percentage' => 26.47,
    ],

    [
        'rank' => 9,
        'country' => 'Australia',
        'tp' => 6400,
        'icp' => 1700,
        'icp_percentage' => 26.56,
    ],

    [
        'rank' => 10,
        'country' => 'Italy',
        'tp' => 6100,
        'icp' => 1400,
        'icp_percentage' => 22.95,
    ],

    [
        'rank' => 11,
        'country' => 'Spain',
        'tp' => 5800,
        'icp' => 1500,
        'icp_percentage' => 25.86,
    ],

    [
        'rank' => 12,
        'country' => 'Netherlands',
        'tp' => 5400,
        'icp' => 1600,
        'icp_percentage' => 29.63,
    ],

    [
        'rank' => 13,
        'country' => 'South Korea',
        'tp' => 5100,
        'icp' => 900,
        'icp_percentage' => 17.65,
    ],

    [
        'rank' => 14,
        'country' => 'Brazil',
        'tp' => 4800,
        'icp' => 850,
        'icp_percentage' => 17.71,
    ],

    [
        'rank' => 15,
        'country' => 'Switzerland',
        'tp' => 4500,
        'icp' => 1500,
        'icp_percentage' => 33.33,
    ],

    [
        'rank' => 16,
        'country' => 'Sweden',
        'tp' => 4200,
        'icp' => 1300,
        'icp_percentage' => 30.95,
    ],

    [
        'rank' => 17,
        'country' => 'Russia',
        'tp' => 4000,
        'icp' => 600,
        'icp_percentage' => 15.00,
    ],

    [
        'rank' => 18,
        'country' => 'Singapore',
        'tp' => 3800,
        'icp' => 1200,
        'icp_percentage' => 31.58,
    ],

    [
        'rank' => 19,
        'country' => 'Belgium',
        'tp' => 3500,
        'icp' => 1100,
        'icp_percentage' => 31.43,
    ],

    [
        'rank' => 20,
        'country' => 'Denmark',
        'tp' => 3300,
        'icp' => 1000,
        'icp_percentage' => 30.30,
    ],

];

// ================================================================
// DATATABLES DRAW
// ================================================================

$draw = (int) (
    $_POST['draw'] ?? 0
);

// ================================================================
// SEARCH
// ================================================================

$search = trim(
    (string) (
        $_POST['search']['value'] ?? ''
    )
);

$filtered = $icptop20;

if ($search !== '') {

    $searchLower = strtolower($search);

    $filtered = array_filter(
        $icptop20,
        function (array $row) use ($searchLower): bool {

            return
                str_contains(
                    strtolower(
                        (string) $row['rank']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['country']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['tp']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['icp']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['icp_percentage']
                    ),
                    $searchLower
                );
        }
    );

    $filtered = array_values($filtered);
}

// ================================================================
// NOTE:
//
// No PHP pagination.
// No array_slice().
//
// DataTables is handling pagination in the browser.
// ================================================================

// ================================================================
// RESPONSE
// ================================================================

try {
    echo json_encode([
        'draw' => $draw,

        'recordsTotal' => count(
            $icptop20
        ),

        'recordsFiltered' => count(
            $filtered
        ),

        'data' => array_values(
            $filtered
        ),
    ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (JsonException $e) {

}