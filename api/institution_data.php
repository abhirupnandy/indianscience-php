<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function sendJson(int $status, array $payload): never
{
    http_response_code($status);
    echo json_encode(
        $payload,
        JSON_THROW_ON_ERROR
        | JSON_UNESCAPED_UNICODE
        | JSON_UNESCAPED_SLASHES
        | JSON_INVALID_UTF8_SUBSTITUTE
    );
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
    header('Allow: GET');
    sendJson(405, [
        'success' => false,
        'message' => 'Only GET requests are supported.',
    ]);
}

require_once __DIR__.'/../config.php';
require_once __DIR__ . '/../includes/institution-logo.php';

$slug = trim((string) ($_GET['slug'] ?? ''));

if ($slug === '' || strlen($slug) > 255) {
    sendJson(400, [
        'success' => false,
        'message' => 'A valid institution slug is required.',
    ]);
}

try {
    /*
     * Main application database: indianscience.
     */
    $institutionStmt = $pdo->prepare(
        'SELECT *
         FROM institutions
         WHERE slug = :slug
         LIMIT 1'
    );
    $institutionStmt->execute(['slug' => $slug]);
    $institution = $institutionStmt->fetch();

    if (! $institution) {
        sendJson(404, [
            'success' => false,
            'message' => 'Institution not found.',
        ]);
    }
    $institution['logo_url'] = institutionLogoUrl(
        (string) ($institution['name'] ?? '')
    );

    $grid = trim((string) (
        $institution['grid_id'] ?? $institution['grid'] ?? ''
    ));

    if ($grid === '') {
        sendJson(200, [
            'success' => true,
            'data' => [
                'institution' => $institution,
                'grid_id' => null,
                'research' => null,
                'message' => 'This institution has no GRID identifier.',
            ],
        ]);
    }

    /*
     * Legacy research database: db.
     * Reuse the host and credentials from .env, but select db.
     */
    $researchPdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            getenv('DB_HOST') ?: '127.0.0.1',
            'db'
        ),
        getenv('DB_USER') ?: 'root',
        getenv('DB_PASS') ?: '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    $fetchOne = static function (
        string $table,
        PDO $connection,
        string $grid
    ): array {
        $allowedTables = [
            'institutes',
            'key_indicators',
            'year_wise_pub_cit',
            'external',
            'sub_wise_research_output',
            'top_10_collaborators',
        ];

        if (! in_array($table, $allowedTables, true)) {
            return [];
        }

        $stmt = $connection->prepare(
            "SELECT * FROM `$table` WHERE grid = :grid LIMIT 1"
        );
        $stmt->execute(['grid' => $grid]);

        return $stmt->fetch() ?: [];
    };

    $fetchAll = static function (
        string $table,
        PDO $connection,
        string $grid,
        string $orderBy = ''
    ): array {
        $allowedTables = [
            'year_wise_gender',
            'year_wise_altmetric_coverage',
            'year_wise_auth_type',
            'year_wise_collab_type',
            'year_wise_cited_percent',
            'year_wise_grants',
            'year_wise_oa_prop',
            'year_wise_sdg',
            'year_wise_sdg_table',
        ];

        if (! in_array($table, $allowedTables, true)) {
            return [];
        }

        // Order clauses are fixed in this file, never supplied by the user.
        $allowedOrders = [
            '',
            'year ASC',
            'name ASC',
            'SDG ASC',
        ];

        if (! in_array($orderBy, $allowedOrders, true)) {
            $orderBy = '';
        }

        $sql = "SELECT * FROM `$table` WHERE grid = :grid";

        if ($orderBy !== '') {
            $sql .= " ORDER BY $orderBy";
        }

        $stmt = $connection->prepare($sql);
        $stmt->execute(['grid' => $grid]);

        return $stmt->fetchAll();
    };

    $indicators = $fetchOne('key_indicators', $researchPdo, $grid);
    $publicationCitation = $fetchOne(
        'year_wise_pub_cit',
        $researchPdo,
        $grid
    );
    $legacyInstitute = $fetchOne('institutes', $researchPdo, $grid);
    $external = $fetchOne('external', $researchPdo, $grid);
    $subjects = $fetchOne(
        'sub_wise_research_output',
        $researchPdo,
        $grid
    );
    $collaborators = $fetchOne(
        'top_10_collaborators',
        $researchPdo,
        $grid
    );

    $gender = $fetchAll(
        'year_wise_gender',
        $researchPdo,
        $grid,
        'year ASC'
    );
    $altmetric = $fetchAll(
        'year_wise_altmetric_coverage',
        $researchPdo,
        $grid,
        'name ASC'
    );
    $authorTypes = $fetchAll(
        'year_wise_auth_type',
        $researchPdo,
        $grid,
        'year ASC'
    );
    $collaboration = $fetchAll(
        'year_wise_collab_type',
        $researchPdo,
        $grid,
        'year ASC'
    );
    $citedPercent = $fetchAll(
        'year_wise_cited_percent',
        $researchPdo,
        $grid
    );
    $grants = $fetchAll(
        'year_wise_grants',
        $researchPdo,
        $grid
    );
    $openAccess = $fetchAll(
        'year_wise_oa_prop',
        $researchPdo,
        $grid,
        'year ASC'
    );
    $sdgByYear = $fetchAll(
        'year_wise_sdg',
        $researchPdo,
        $grid,
        'year ASC'
    );
    $sdgSummary = $fetchAll(
        'year_wise_sdg_table',
        $researchPdo,
        $grid,
        'SDG ASC'
    );

    /*
     * Build annual publication/citation series from the wide-format row.
     * The legacy table covers 2010–2019.
     */
    $publicationSeries = [];
    $citationSeries = [];

    if ($publicationCitation) {
        for ($year = 2010; $year <= 2019; $year++) {
            $publicationSeries[] = [
                'year' => $year,
                'value' => (float) (
                    $publicationCitation["pub_$year"] ?? 0
                ),
            ];

            $citationSeries[] = [
                'year' => $year,
                'value' => (float) (
                    $publicationCitation["cit_$year"] ?? 0
                ),
            ];
        }
    }

    /*
     * Convert subject columns sub1–sub22 to a chart-friendly array.
     * Subject names follow the ISR subject classification.
     */
    $subjectNames = [
        1 => 'Mathematical Science',
        2 => 'Physical Sciences',
        3 => 'Chemical Sciences',
        4 => 'Earth Sciences',
        5 => 'Environmental Sciences',
        6 => 'Biological Sciences',
        7 => 'Agricultural and Veterinary Sciences',
        8 => 'Information and Computing Sciences',
        9 => 'Engineering',
        10 => 'Technology',
        11 => 'Medical and Health Sciences',
        12 => 'Built Environment and Design',
        13 => 'Education',
        14 => 'Economics',
        15 => 'Commerce, Management, Tourism and Services',
        16 => 'Studies in Human Society',
        17 => 'Psychology and Cognitive Sciences',
        18 => 'Law and Legal Studies',
        19 => 'Studies in Creative Arts and Writing',
        20 => 'Language, Communication and Culture',
        21 => 'History and Archaeology',
        22 => 'Philosophy and Religious Studies',
    ];

    $subjectSeries = [];

    if ($subjects) {
        foreach ($subjectNames as $number => $name) {
            $value = $subjects["sub$number"] ?? null;

            if ($value !== null && is_numeric($value) && (float) $value > 0) {
                $subjectSeries[] = [
                    'code' => sprintf('%02d', $number),
                    'name' => $name,
                    'value' => (float) $value,
                ];
            }
        }
    }

    /*
     * Return the original rows as well as chart-friendly series.
     * This preserves source fields for future frontend improvements.
     */
    sendJson(200, [
        'success' => true,
        'data' => [
            'institution' => $institution,
            'grid_id' => $grid,
            'research' => [
                'has_data' => ! empty($indicators),
                'indicators' => $indicators,
                'legacy_institute' => $legacyInstitute,
                'external' => $external,
                'publication_citation' => $publicationCitation,
                'publication_series' => $publicationSeries,
                'citation_series' => $citationSeries,
                'gender' => $gender,
                'altmetric' => $altmetric,
                'author_types' => $authorTypes,
                'collaboration' => $collaboration,
                'cited_percent' => $citedPercent,
                'grants' => $grants,
                'open_access' => $openAccess,
                'sdg_by_year' => $sdgByYear,
                'sdg_summary' => $sdgSummary,
                'subjects' => $subjects,
                'subject_series' => $subjectSeries,
                'collaborators' => $collaborators,
            ],
        ],
    ]);
} catch (Throwable $exception) {
    error_log(
        'Institution API error: '.$exception->getMessage()
    );

    sendJson(500, [
        'success' => false,
        'message' => 'Unable to retrieve institution data.',
    ]);
}
