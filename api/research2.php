<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC SUBJECT AREA RESEARCH PUBLICATION DATA
// ================================================================

$data = [
    [
        'subject_area' => '01 Mathematical Sciences',
        'india_publications' => 47936,
        'world_publications' => 1371625,
        'global_share' => 3.49,
        'india_rank' => 7,
        'india_cagr' => 10.78,
        'world_cagr' => 3.22,
    ],
    [
        'subject_area' => '02 Physical Sciences',
        'india_publications' => 67270,
        'world_publications' => 1716510,
        'global_share' => 3.92,
        'india_rank' => 9,
        'india_cagr' => 7.49,
        'world_cagr' => 3.26,
    ],
    [
        'subject_area' => '03 Chemical Sciences',
        'india_publications' => 155143,
        'world_publications' => 2457684,
        'global_share' => 6.31,
        'india_rank' => 3,
        'india_cagr' => 8.61,
        'world_cagr' => 4.56,
    ],
    [
        'subject_area' => '04 Earth Sciences',
        'india_publications' => 20959,
        'world_publications' => 668745,
        'global_share' => 3.13,
        'india_rank' => 12,
        'india_cagr' => 8.79,
        'world_cagr' => 4.97,
    ],
    [
        'subject_area' => '05 Environmental Sciences',
        'india_publications' => 14591,
        'world_publications' => 508979,
        'global_share' => 2.87,
        'india_rank' => 11,
        'india_cagr' => 13.43,
        'world_cagr' => 8.09,
    ],
    [
        'subject_area' => '06 Biological Sciences',
        'india_publications' => 89824,
        'world_publications' => 2689897,
        'global_share' => 3.34,
        'india_rank' => 10,
        'india_cagr' => 7.28,
        'world_cagr' => 3.25,
    ],
    [
        'subject_area' => '07 Agricultural and Veterinary Sciences',
        'india_publications' => 13518,
        'world_publications' => 574047,
        'global_share' => 2.35,
        'india_rank' => 12,
        'india_cagr' => 6.59,
        'world_cagr' => 3.44,
    ],
    [
        'subject_area' => '08 Information and Computing Sciences',
        'india_publications' => 117753,
        'world_publications' => 2067798,
        'global_share' => 5.69,
        'india_rank' => 3,
        'india_cagr' => 13.91,
        'world_cagr' => 5.19,
    ],
    [
        'subject_area' => '09 Engineering',
        'india_publications' => 224630,
        'world_publications' => 4726435,
        'global_share' => 4.75,
        'india_rank' => 4,
        'india_cagr' => 12.83,
        'world_cagr' => 5.98,
    ],
    [
        'subject_area' => '10 Technology',
        'india_publications' => 54999,
        'world_publications' => 829746,
        'global_share' => 6.63,
        'india_rank' => 3,
        'india_cagr' => 12.78,
        'world_cagr' => 2.76,
    ],
    [
        'subject_area' => '11 Medical and Health Sciences',
        'india_publications' => 312250,
        'world_publications' => 9742475,
        'global_share' => 3.21,
        'india_rank' => 10,
        'india_cagr' => 7.79,
        'world_cagr' => 3.86,
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
