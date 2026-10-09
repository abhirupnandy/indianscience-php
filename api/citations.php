<?php

declare(strict_types=1);

require __DIR__.'/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC CITATION DATA
// ================================================================

$citations = [
    [
        'year' => 2010,
        'volume' => 1149114,
        'global_share' => 2.43,
        'rank' => 14,
    ],
    [
        'year' => 2011,
        'volume' => 1213800,
        'global_share' => 2.60,
        'rank' => 14,
    ],
    [
        'year' => 2012,
        'volume' => 1291442,
        'global_share' => 2.89,
        'rank' => 14,
    ],
    [
        'year' => 2013,
        'volume' => 1328138,
        'global_share' => 3.05,
        'rank' => 12,
    ],
    [
        'year' => 2014,
        'volume' => 1411830,
        'global_share' => 3.44,
        'rank' => 12,
    ],
    [
        'year' => 2015,
        'volume' => 1332899,
        'global_share' => 3.52,
        'rank' => 12,
    ],
    [
        'year' => 2016,
        'volume' => 1286448,
        'global_share' => 3.83,
        'rank' => 12,
    ],
    [
        'year' => 2017,
        'volume' => 1162771,
        'global_share' => 4.04,
        'rank' => 11,
    ],
    [
        'year' => 2018,
        'volume' => 958622,
        'global_share' => 4.26,
        'rank' => 9,
    ],
    [
        'year' => 2019,
        'volume' => 670416,
        'global_share' => 4.48,
        'rank' => 9,
    ],
];

// ================================================================
// DATATABLES PARAMETERS
// ================================================================

$draw = (int) ($_POST['draw'] ?? 0);

$start = max(
    0,
    (int) ($_POST['start'] ?? 0),
);

$length = (int) ($_POST['length'] ?? 10);

if ($length < 1) {
    $length = 10;
}

// ================================================================
// SEARCH
// ================================================================

$search = trim(
    (string) ($_POST['search']['value'] ?? ''),
);

$filtered = $citations;

if ($search !== '') {

    $searchLower = strtolower($search);

    $filtered = array_filter(
        $citations,
        function (array $row) use ($searchLower): bool {

            return
                str_contains(
                    strtolower((string) $row['year']),
                    $searchLower,
                )
                ||
                str_contains(
                    strtolower((string) $row['volume']),
                    $searchLower,
                )
                ||
                str_contains(
                    strtolower((string) $row['global_share']),
                    $searchLower,
                )
                ||
                str_contains(
                    strtolower((string) $row['rank']),
                    $searchLower,
                );
        },
    );

    // Re-index array after filtering
    $filtered = array_values($filtered);
}

// ================================================================
// SORTING
// ================================================================

$orderColumn = (int) (
    $_POST['order'][0]['column'] ?? 0
);

$orderDirection = strtolower(
    (string) (
        $_POST['order'][0]['dir'] ?? 'asc'
    ),
);

$orderDirection = in_array(
    $orderDirection,
    ['asc', 'desc'],
    true,
)
    ? $orderDirection
    : 'asc';

$columns = [
    0 => 'year',
    1 => 'volume',
    2 => 'global_share',
    3 => 'rank',
];

$orderBy = $columns[$orderColumn] ?? 'year';

usort(
    $filtered,
    function (array $a, array $b) use ($orderBy, $orderDirection): int {

        $comparison = $a[$orderBy] <=> $b[$orderBy];

        return $orderDirection === 'desc'
            ? -$comparison
            : $comparison;
    },
);

// ================================================================
// PAGINATION
// ================================================================

$recordsTotal = count($citations);

$recordsFiltered = count($filtered);

$data = array_slice(
    $filtered,
    $start,
    $length,
);

// ================================================================
// RESPONSE
// ================================================================

echo json_encode([
    'draw' => $draw,
    'recordsTotal' => $recordsTotal,
    'recordsFiltered' => $recordsFiltered,
    'data' => $data,
]);
