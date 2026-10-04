<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

$data = [
    [
        'year' => 2010,
        'funding_amount' => 308.020,
        'publications' => 321,
        'publications_per_million' => 1.042,
    ],
    [
        'year' => 2011,
        'funding_amount' => 413.338,
        'publications' => 376,
        'publications_per_million' => 0.910,
    ],
    [
        'year' => 2012,
        'funding_amount' => 336.836,
        'publications' => 462,
        'publications_per_million' => 1.372,
    ],
    [
        'year' => 2013,
        'funding_amount' => 442.888,
        'publications' => 531,
        'publications_per_million' => 1.199,
    ],
    [
        'year' => 2014,
        'funding_amount' => 365.928,
        'publications' => 393,
        'publications_per_million' => 1.074,
    ],
    [
        'year' => 2015,
        'funding_amount' => 370.297,
        'publications' => 378,
        'publications_per_million' => 1.021,
    ],
    [
        'year' => 2016,
        'funding_amount' => 505.225,
        'publications' => 398,
        'publications_per_million' => 0.788,
    ],
    [
        'year' => 2017,
        'funding_amount' => 580.211,
        'publications' => 449,
        'publications_per_million' => 0.774,
    ],
    [
        'year' => 2018,
        'funding_amount' => 573.222,
        'publications' => 368,
        'publications_per_million' => 0.642,
    ],
    [
        'year' => 2019,
        'funding_amount' => 672.976,
        'publications' => 230,
        'publications_per_million' => 0.342,
    ],
];

$draw = isset($_POST['draw']) ? (int) $_POST['draw'] : 0;

$search = trim((string) ($_POST['search']['value'] ?? ''));

$filtered = $data;

if ($search !== '') {
    $filtered = array_values(array_filter(
        $data,
        static function (array $row) use ($search): bool {
            return str_contains((string) $row['year'], $search);
        }
    ));
}

echo json_encode([
    'draw' => $draw,
    'recordsTotal' => count($data),
    'recordsFiltered' => count($filtered),
    'data' => $filtered,
], JSON_UNESCAPED_UNICODE);