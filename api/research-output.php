<?php

declare(strict_types=1);

require __DIR__.'/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC COUNTRY RESEARCH PUBLICATION DATA
// ================================================================

$data = [
    [
        'rank' => 1,
        'country' => 'United States',
        'publications' => 6181247,
        'cagr' => 3.09,
        'global_share' => 16.83,
    ],
    [
        'rank' => 2,
        'country' => 'China',
        'publications' => 3828795,
        'cagr' => 9.50,
        'global_share' => 10.42,
    ],
    [
        'rank' => 3,
        'country' => 'United Kingdom',
        'publications' => 1824427,
        'cagr' => 3.80,
        'global_share' => 4.97,
    ],
    [
        'rank' => 4,
        'country' => 'Japan',
        'publications' => 1694585,
        'cagr' => 1.09,
        'global_share' => 4.61,
    ],
    [
        'rank' => 5,
        'country' => 'Germany',
        'publications' => 1551543,
        'cagr' => 3.59,
        'global_share' => 4.22,
    ],
    [
        'rank' => 6,
        'country' => 'France',
        'publications' => 1103707,
        'cagr' => 2.40,
        'global_share' => 3.00,
    ],
    [
        'rank' => 7,
        'country' => 'India',
        'publications' => 1084422,
        'cagr' => 9.46,
        'global_share' => 2.95,
    ],
    [
        'rank' => 8,
        'country' => 'Canada',
        'publications' => 970336,
        'cagr' => 3.84,
        'global_share' => 2.64,
    ],
    [
        'rank' => 9,
        'country' => 'Italy',
        'publications' => 936918,
        'cagr' => 4.59,
        'global_share' => 2.55,
    ],
    [
        'rank' => 10,
        'country' => 'Australia',
        'publications' => 840791,
        'cagr' => 6.66,
        'global_share' => 2.29,
    ],
];

// ================================================================
// RESPONSE
// ================================================================

echo json_encode(
    [
        'data' => $data,
    ],
    JSON_THROW_ON_ERROR,
);
