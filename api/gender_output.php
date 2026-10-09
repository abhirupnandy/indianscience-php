<?php

declare(strict_types=1);

require __DIR__.'/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC GENDER DISTRIBUTION DATA
// ================================================================

$genderDistribution = [

    [
        'rank' => 1,
        'subject' => 'Mathematical Sciences',
        'male_percentage' => 74.63,
        'female_percentage' => 25.37,
    ],

    [
        'rank' => 2,
        'subject' => 'Physical Sciences',
        'male_percentage' => 75.20,
        'female_percentage' => 24.80,
    ],

    [
        'rank' => 3,
        'subject' => 'Chemical Sciences',
        'male_percentage' => 74.67,
        'female_percentage' => 25.33,
    ],

    [
        'rank' => 4,
        'subject' => 'Earth Sciences',
        'male_percentage' => 74.84,
        'female_percentage' => 25.16,
    ],

    [
        'rank' => 5,
        'subject' => 'Environmental Sciences',
        'male_percentage' => 73.84,
        'female_percentage' => 26.16,
    ],

    [
        'rank' => 6,
        'subject' => 'Biological Sciences',
        'male_percentage' => 74.01,
        'female_percentage' => 25.99,
    ],

    [
        'rank' => 7,
        'subject' => 'Agricultural and Veterinary Sciences',
        'male_percentage' => 74.75,
        'female_percentage' => 25.25,
    ],

    [
        'rank' => 8,
        'subject' => 'Information and Computing Sciences',
        'male_percentage' => 74.28,
        'female_percentage' => 25.72,
    ],

    [
        'rank' => 9,
        'subject' => 'Engineering',
        'male_percentage' => 74.55,
        'female_percentage' => 25.45,
    ],

    [
        'rank' => 10,
        'subject' => 'Technology',
        'male_percentage' => 74.67,
        'female_percentage' => 25.33,
    ],

    [
        'rank' => 11,
        'subject' => 'Medical and Health Sciences',
        'male_percentage' => 74.27,
        'female_percentage' => 25.73,
    ],

    [
        'rank' => 12,
        'subject' => 'Built Environment and Design',
        'male_percentage' => 72.14,
        'female_percentage' => 27.86,
    ],

    [
        'rank' => 13,
        'subject' => 'Education',
        'male_percentage' => 73.66,
        'female_percentage' => 26.34,
    ],

    [
        'rank' => 14,
        'subject' => 'Economics',
        'male_percentage' => 74.51,
        'female_percentage' => 25.49,
    ],

    [
        'rank' => 15,
        'subject' => 'Commerce, Management, Tourism and Services',
        'male_percentage' => 74.64,
        'female_percentage' => 25.36,
    ],

    [
        'rank' => 16,
        'subject' => 'Studies In Human Society',
        'male_percentage' => 74.84,
        'female_percentage' => 25.16,
    ],

    [
        'rank' => 17,
        'subject' => 'Psychology and Cognitive Sciences',
        'male_percentage' => 74.98,
        'female_percentage' => 25.02,
    ],

    [
        'rank' => 18,
        'subject' => 'Law and Legal Studies',
        'male_percentage' => 72.13,
        'female_percentage' => 27.87,
    ],

    [
        'rank' => 19,
        'subject' => 'Studies In Creative Arts and Writing',
        'male_percentage' => 74.07,
        'female_percentage' => 25.93,
    ],

    [
        'rank' => 20,
        'subject' => 'Language, Communication and Culture',
        'male_percentage' => 74.17,
        'female_percentage' => 25.83,
    ],

    [
        'rank' => 21,
        'subject' => 'History and Archaeology',
        'male_percentage' => 71.88,
        'female_percentage' => 28.12,
    ],

    [
        'rank' => 22,
        'subject' => 'Philosophy and Religious Studies',
        'male_percentage' => 73.28,
        'female_percentage' => 26.72,
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

$filtered = $genderDistribution;

if ($search !== '') {

    $searchLower = strtolower($search);

    $filtered = array_filter(
        $genderDistribution,
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
                        (string) $row['subject']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['male_percentage']
                    ),
                    $searchLower
                )
                ||
                str_contains(
                    strtolower(
                        (string) $row['female_percentage']
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
            $genderDistribution
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
