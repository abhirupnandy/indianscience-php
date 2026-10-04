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
        'tp' => 6181247,
        'icp' => 1959644,
        'icp_percentage' => 31.70,
    ],

    [
        'rank' => 2,
        'country' => 'China',
        'tp' => 3828795,
        'icp' => 883947,
        'icp_percentage' => 23.09,
    ],

    [
        'rank' => 3,
        'country' => 'United Kingdom',
        'tp' => 1824427,
        'icp' => 889118,
        'icp_percentage' => 48.73,
    ],

    [
        'rank' => 4,
        'country' => 'Japan',
        'tp' => 1694585,
        'icp' => 344508,
        'icp_percentage' => 20.33,
    ],

    [
        'rank' => 5,
        'country' => 'Germany',
        'tp' => 1551543,
        'icp' => 732467,
        'icp_percentage' => 47.21,
    ],

    [
        'rank' => 6,
        'country' => 'France',
        'tp' => 1103707,
        'icp' => 556554,
        'icp_percentage' => 50.43,
    ],

    [
        'rank' => 7,
        'country' => 'India',
        'tp' => 1084422,
        'icp' => 211740,
        'icp_percentage' => 19.53,
    ],

    [
        'rank' => 8,
        'country' => 'Canada',
        'tp' => 970336,
        'icp' => 460453,
        'icp_percentage' => 47.45,
    ],

    [
        'rank' => 9,
        'country' => 'Italy',
        'tp' => 936918,
        'icp' => 423813,
        'icp_percentage' => 45.23,
    ],

    [
        'rank' => 10,
        'country' => 'Australia',
        'tp' => 840791,
        'icp' => 428650,
        'icp_percentage' => 50.98,
    ],

    [
        'rank' => 11,
        'country' => 'Spain',
        'tp' => 825399,
        'icp' => 365192,
        'icp_percentage' => 44.24,
    ],

    [
        'rank' => 12,
        'country' => 'Brazil',
        'tp' => 791088,
        'icp' => 202983,
        'icp_percentage' => 25.66,
    ],

    [
        'rank' => 13,
        'country' => 'South Korea',
        'tp' => 714331,
        'icp' => 192027,
        'icp_percentage' => 26.88,
    ],

    [
        'rank' => 14,
        'country' => 'Russia',
        'tp' => 616395,
        'icp' => 160458,
        'icp_percentage' => 26.03,
    ],

    [
        'rank' => 15,
        'country' => 'Netherlands',
        'tp' => 548489,
        'icp' => 308024,
        'icp_percentage' => 56.16,
    ],

    [
        'rank' => 16,
        'country' => 'Switzerland',
        'tp' => 417766,
        'icp' => 274177,
        'icp_percentage' => 65.63,
    ],

    [
        'rank' => 17,
        'country' => 'Iran',
        'tp' => 401528,
        'icp' => 91611,
        'icp_percentage' => 22.82,
    ],

    [
        'rank' => 18,
        'country' => 'Poland',
        'tp' => 364627,
        'icp' => 116614,
        'icp_percentage' => 31.98,
    ],

    [
        'rank' => 19,
        'country' => 'Sweden',
        'tp' => 354801,
        'icp' => 215648,
        'icp_percentage' => 60.78,
    ],

    [
        'rank' => 20,
        'country' => 'Taiwan',
        'tp' => 351371,
        'icp' => 101556,
        'icp_percentage' => 28.90,
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