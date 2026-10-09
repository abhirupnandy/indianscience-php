<?php

/*
|--------------------------------------------------------------------------
| Related Publications API
|--------------------------------------------------------------------------
| Prepares search results, pagination, and metadata for pages/publications.php.
| This file is included by the page; it is not a standalone JSON endpoint.
|--------------------------------------------------------------------------
*/

$search = trim((string) ($_GET['q'] ?? ''));

$allowedPageSizes = [5, 10, 25, 50, 100];

$perPage = filter_var(
    $_GET['per_page'] ?? 5,
    FILTER_VALIDATE_INT
);

if (
    $perPage === false ||
    ! in_array($perPage, $allowedPageSizes, true)
) {
    $perPage = 10;
}

$page = filter_var(
    $_GET['page'] ?? 1,
    FILTER_VALIDATE_INT
);

if ($page === false || $page < 1) {
    $page = 1;
}

/*
|--------------------------------------------------------------------------
| Search conditions
|--------------------------------------------------------------------------
*/

$where = '';
$params = [];

if ($search !== '') {
    $where = '
        WHERE title LIKE :title
           OR authors LIKE :authors
           OR journal LIKE :journal
    ';

    $term = '%'.$search.'%';

    $params = [
        ':title' => $term,
        ':authors' => $term,
        ':journal' => $term,
    ];
}

/*
|--------------------------------------------------------------------------
| Count matching publications
|--------------------------------------------------------------------------
*/

$countStmt = $pdo->prepare(
    "SELECT COUNT(*) FROM publications $where"
);

$countStmt->execute($params);

$totalPublications = (int) $countStmt->fetchColumn();

$totalPages = max(
    1,
    (int) ceil($totalPublications / $perPage)
);

// Prevent requests for pages beyond the last available page.
$page = min($page, $totalPages);

$offset = ($page - 1) * $perPage;

/*
|--------------------------------------------------------------------------
| Fetch the current page
|--------------------------------------------------------------------------
*/

$sql = "
    SELECT *
    FROM publications
    $where
    ORDER BY sort_order DESC, published_at DESC
    LIMIT :limit OFFSET :offset
";

$stmt = $pdo->prepare($sql);

foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value, PDO::PARAM_STR);
}

$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();

$publications = $stmt->fetchAll();

/*
|--------------------------------------------------------------------------
| Result metadata
|--------------------------------------------------------------------------
*/

$firstResult = $totalPublications > 0
    ? $offset + 1
    : 0;

$lastResult = min(
    $offset + $perPage,
    $totalPublications
);

/*
|--------------------------------------------------------------------------
| Pagination URL
|--------------------------------------------------------------------------
*/

$paginationUrl = static function (int $targetPage) use (
    $search,
    $perPage
): string {
    return '?'.http_build_query([
        'q' => $search,
        'per_page' => $perPage,
        'page' => $targetPage,
    ]);
};
