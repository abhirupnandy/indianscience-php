<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC GENDER CITATION DATA
// ================================================================

$genderCitation = [

    [
        'year' => 2010,
        'female_cited_percentage' => 12.88,
        'male_cited_percentage' => 16.34,
        'female_citations_per_paper' => 18.79,
        'male_citations_per_paper' => 18.90,
    ],

    [
        'year' => 2011,
        'female_cited_percentage' => 15.25,
        'male_cited_percentage' => 16.12,
        'female_citations_per_paper' => 17.48,
        'male_citations_per_paper' => 17.31,
    ],

    [
        'year' => 2012,
        'female_cited_percentage' => 17.76,
        'male_cited_percentage' => 16.66,
        'female_citations_per_paper' => 15.04,
        'male_citations_per_paper' => 15.20,
    ],

    [
        'year' => 2013,
        'female_cited_percentage' => 18.22,
        'male_cited_percentage' => 17.20,
        'female_citations_per_paper' => 13.94,
        'male_citations_per_paper' => 14.23,
    ],

    [
        'year' => 2014,
        'female_cited_percentage' => 19.01,
        'male_cited_percentage' => 18.09,
        'female_citations_per_paper' => 12.47,
        'male_citations_per_paper' => 13.11,
    ],

    [
        'year' => 2015,
        'female_cited_percentage' => 19.90,
        'male_cited_percentage' => 19.02,
        'female_citations_per_paper' => 11.16,
        'male_citations_per_paper' => 11.53,
    ],

    [
        'year' => 2016,
        'female_cited_percentage' => 19.14,
        'male_cited_percentage' => 19.11,
        'female_citations_per_paper' => 9.82,
        'male_citations_per_paper' => 10.02,
    ],

    [
        'year' => 2017,
        'female_cited_percentage' => 20.09,
        'male_cited_percentage' => 20.52,
        'female_citations_per_paper' => 8.49,
        'male_citations_per_paper' => 8.65,
    ],

    [
        'year' => 2018,
        'female_cited_percentage' => 23.66,
        'male_cited_percentage' => 24.04,
        'female_citations_per_paper' => 6.81,
        'male_citations_per_paper' => 6.93,
    ],

    [
        'year' => 2019,
        'female_cited_percentage' => 30.63,
        'male_cited_percentage' => 30.73,
        'female_citations_per_paper' => 4.60,
        'male_citations_per_paper' => 4.71,
    ],

    [
        'year' => 'Overall',
        'female_cited_percentage' => 79.25,
        'male_cited_percentage' => 79.28,
        'female_citations_per_paper' => 10.66,
        'male_citations_per_paper' => 10.90,
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

$filtered = $genderCitation;

if ($search !== '') {

    $searchLower = strtolower($search);

    $filtered = array_filter(
        $genderCitation,
        function (array $row) use ($searchLower): bool {

            return
                str_contains(
                    strtolower((string) $row['year']),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower((string) $row['female_cited_percentage']),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower((string) $row['male_cited_percentage']),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower((string) $row['female_citations_per_paper']),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower((string) $row['male_citations_per_paper']),
                    $searchLower
                );
        }
    );

    $filtered = array_values($filtered);
}

// ================================================================
// NOTE:
// No PHP pagination.
// DataTables handles pagination in the browser.
// ================================================================

// ================================================================
// RESPONSE
// ================================================================

try {

    echo json_encode([
        'draw' => $draw,

        'recordsTotal' => count(
            $genderCitation
        ),

        'recordsFiltered' => count(
            $filtered
        ),

        'data' => array_values(
            $filtered
        ),

    ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);

} catch (JsonException $e) {

    http_response_code(500);

    echo json_encode([
        'error' => 'Unable to encode response.',
    ]);
}