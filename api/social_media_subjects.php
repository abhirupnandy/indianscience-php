<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

// ================================================================
// STATIC SOCIAL MEDIA / ALTMETRIC DATA BY SUBJECT
// ================================================================

$socialMediaSubjects = [

    [
        'rank' => 1,
        'subject' => 'Mathematical Sciences',
        'altmetric_coverage' => 16.28,
        'twitter_coverage' => 10.56,
        'average_tweets_per_paper' => 4.75,
        'facebook_coverage' => 1.75,
        'average_facebook_mentions_per_paper' => 1.39,
        'mendeley_coverage' => 15.48,
        'average_mendeley_mentions_per_paper' => 22.59,
    ],

    [
        'rank' => 2,
        'subject' => 'Physical Sciences',
        'altmetric_coverage' => 30.73,
        'twitter_coverage' => 21.60,
        'average_tweets_per_paper' => 3.64,
        'facebook_coverage' => 3.76,
        'average_facebook_mentions_per_paper' => 1.61,
        'mendeley_coverage' => 29.85,
        'average_mendeley_mentions_per_paper' => 24.18,
    ],

    [
        'rank' => 3,
        'subject' => 'Chemical Sciences',
        'altmetric_coverage' => 25.71,
        'twitter_coverage' => 17.25,
        'average_tweets_per_paper' => 2.34,
        'facebook_coverage' => 2.03,
        'average_facebook_mentions_per_paper' => 1.46,
        'mendeley_coverage' => 25.39,
        'average_mendeley_mentions_per_paper' => 31.79,
    ],

    [
        'rank' => 4,
        'subject' => 'Earth Sciences',
        'altmetric_coverage' => 27.47,
        'twitter_coverage' => 16.43,
        'average_tweets_per_paper' => 9.00,
        'facebook_coverage' => 3.54,
        'average_facebook_mentions_per_paper' => 1.78,
        'mendeley_coverage' => 27.26,
        'average_mendeley_mentions_per_paper' => 45.80,
    ],

    [
        'rank' => 5,
        'subject' => 'Environmental Sciences',
        'altmetric_coverage' => 34.01,
        'twitter_coverage' => 23.37,
        'average_tweets_per_paper' => 9.02,
        'facebook_coverage' => 5.81,
        'average_facebook_mentions_per_paper' => 1.92,
        'mendeley_coverage' => 33.65,
        'average_mendeley_mentions_per_paper' => 75.15,
    ],

    [
        'rank' => 6,
        'subject' => 'Biological Sciences',
        'altmetric_coverage' => 40.18,
        'twitter_coverage' => 29.67,
        'average_tweets_per_paper' => 6.20,
        'facebook_coverage' => 5.68,
        'average_facebook_mentions_per_paper' => 1.89,
        'mendeley_coverage' => 39.95,
        'average_mendeley_mentions_per_paper' => 48.61,
    ],

    [
        'rank' => 7,
        'subject' => 'Agricultural and Veterinary Sciences',
        'altmetric_coverage' => 30.34,
        'twitter_coverage' => 19.03,
        'average_tweets_per_paper' => 5.38,
        'facebook_coverage' => 4.17,
        'average_facebook_mentions_per_paper' => 2.09,
        'mendeley_coverage' => 30.21,
        'average_mendeley_mentions_per_paper' => 58.33,
    ],

    [
        'rank' => 8,
        'subject' => 'Information and Computing Sciences',
        'altmetric_coverage' => 9.47,
        'twitter_coverage' => 4.02,
        'average_tweets_per_paper' => 12.05,
        'facebook_coverage' => 0.81,
        'average_facebook_mentions_per_paper' => 1.32,
        'mendeley_coverage' => 9.34,
        'average_mendeley_mentions_per_paper' => 42.00,
    ],

    [
        'rank' => 9,
        'subject' => 'Engineering',
        'altmetric_coverage' => 14.27,
        'twitter_coverage' => 7.30,
        'average_tweets_per_paper' => 2.76,
        'facebook_coverage' => 1.25,
        'average_facebook_mentions_per_paper' => 1.43,
        'mendeley_coverage' => 14.13,
        'average_mendeley_mentions_per_paper' => 46.46,
    ],

    [
        'rank' => 10,
        'subject' => 'Technology',
        'altmetric_coverage' => 11.10,
        'twitter_coverage' => 5.25,
        'average_tweets_per_paper' => 3.59,
        'facebook_coverage' => 1.09,
        'average_facebook_mentions_per_paper' => 2.51,
        'mendeley_coverage' => 10.95,
        'average_mendeley_mentions_per_paper' => 42.18,
    ],

    [
        'rank' => 11,
        'subject' => 'Medical and Health Sciences',
        'altmetric_coverage' => 31.32,
        'twitter_coverage' => 21.61,
        'average_tweets_per_paper' => 7.97,
        'facebook_coverage' => 6.29,
        'average_facebook_mentions_per_paper' => 2.19,
        'mendeley_coverage' => 30.93,
        'average_mendeley_mentions_per_paper' => 44.01,
    ],

    [
        'rank' => 12,
        'subject' => 'Built Environment and Design',
        'altmetric_coverage' => 25.25,
        'twitter_coverage' => 14.62,
        'average_tweets_per_paper' => 4.83,
        'facebook_coverage' => 3.07,
        'average_facebook_mentions_per_paper' => 1.13,
        'mendeley_coverage' => 24.85,
        'average_mendeley_mentions_per_paper' => 71.48,
    ],

    [
        'rank' => 13,
        'subject' => 'Education',
        'altmetric_coverage' => 17.81,
        'twitter_coverage' => 12.54,
        'average_tweets_per_paper' => 5.59,
        'facebook_coverage' => 3.62,
        'average_facebook_mentions_per_paper' => 1.45,
        'mendeley_coverage' => 17.54,
        'average_mendeley_mentions_per_paper' => 38.91,
    ],

    [
        'rank' => 14,
        'subject' => 'Economics',
        'altmetric_coverage' => 21.64,
        'twitter_coverage' => 13.15,
        'average_tweets_per_paper' => 6.65,
        'facebook_coverage' => 3.07,
        'average_facebook_mentions_per_paper' => 1.49,
        'mendeley_coverage' => 21.07,
        'average_mendeley_mentions_per_paper' => 48.74,
    ],

    [
        'rank' => 15,
        'subject' => 'Commerce, Management, Tourism and Services',
        'altmetric_coverage' => 19.91,
        'twitter_coverage' => 12.09,
        'average_tweets_per_paper' => 4.88,
        'facebook_coverage' => 2.77,
        'average_facebook_mentions_per_paper' => 1.61,
        'mendeley_coverage' => 19.57,
        'average_mendeley_mentions_per_paper' => 88.85,
    ],

    [
        'rank' => 16,
        'subject' => 'Studies In Human Society',
        'altmetric_coverage' => 31.19,
        'twitter_coverage' => 22.42,
        'average_tweets_per_paper' => 7.90,
        'facebook_coverage' => 5.54,
        'average_facebook_mentions_per_paper' => 1.91,
        'mendeley_coverage' => 30.28,
        'average_mendeley_mentions_per_paper' => 50.79,
    ],

    [
        'rank' => 17,
        'subject' => 'Psychology and Cognitive Sciences',
        'altmetric_coverage' => 25.54,
        'twitter_coverage' => 17.30,
        'average_tweets_per_paper' => 7.74,
        'facebook_coverage' => 6.19,
        'average_facebook_mentions_per_paper' => 1.73,
        'mendeley_coverage' => 25.17,
        'average_mendeley_mentions_per_paper' => 46.88,
    ],

    [
        'rank' => 18,
        'subject' => 'Law and Legal Studies',
        'altmetric_coverage' => 26.48,
        'twitter_coverage' => 19.57,
        'average_tweets_per_paper' => 16.97,
        'facebook_coverage' => 3.24,
        'average_facebook_mentions_per_paper' => 2.40,
        'mendeley_coverage' => 23.55,
        'average_mendeley_mentions_per_paper' => 24.48,
    ],

    [
        'rank' => 19,
        'subject' => 'Studies In Creative Arts and Writing',
        'altmetric_coverage' => 24.60,
        'twitter_coverage' => 16.56,
        'average_tweets_per_paper' => 4.83,
        'facebook_coverage' => 4.34,
        'average_facebook_mentions_per_paper' => 1.26,
        'mendeley_coverage' => 23.63,
        'average_mendeley_mentions_per_paper' => 19.29,
    ],

    [
        'rank' => 20,
        'subject' => 'Language, Communication and Culture',
        'altmetric_coverage' => 16.65,
        'twitter_coverage' => 10.88,
        'average_tweets_per_paper' => 7.74,
        'facebook_coverage' => 3.28,
        'average_facebook_mentions_per_paper' => 1.35,
        'mendeley_coverage' => 15.57,
        'average_mendeley_mentions_per_paper' => 26.98,
    ],

    [
        'rank' => 21,
        'subject' => 'History and Archaeology',
        'altmetric_coverage' => 27.18,
        'twitter_coverage' => 18.64,
        'average_tweets_per_paper' => 12.07,
        'facebook_coverage' => 7.22,
        'average_facebook_mentions_per_paper' => 3.24,
        'mendeley_coverage' => 25.04,
        'average_mendeley_mentions_per_paper' => 19.75,
    ],

    [
        'rank' => 22,
        'subject' => 'Philosophy and Religious Studies',
        'altmetric_coverage' => 28.34,
        'twitter_coverage' => 20.44,
        'average_tweets_per_paper' => 6.77,
        'facebook_coverage' => 5.25,
        'average_facebook_mentions_per_paper' => 1.23,
        'mendeley_coverage' => 26.36,
        'average_mendeley_mentions_per_paper' => 28.98,
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

$filtered = $socialMediaSubjects;

if ($search !== '') {

    $searchLower = strtolower($search);

    $filtered = array_filter(
        $socialMediaSubjects,
        function (array $row) use ($searchLower): bool {

            foreach ($row as $value) {

                if (
                    str_contains(
                        strtolower((string) $value),
                        $searchLower
                    )
                ) {
                    return true;
                }
            }

            return false;
        }
    );

    $filtered = array_values($filtered);
}

// ================================================================
// RESPONSE
// ================================================================

try {

    echo json_encode([
        'draw' => $draw,

        'recordsTotal' => count(
            $socialMediaSubjects
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