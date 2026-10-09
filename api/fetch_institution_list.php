<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

require __DIR__.'/../config.php';
// Change this path if your database bootstrap is elsewhere.

try {
    if (! isset($pdo) || ! $pdo instanceof PDO) {
        throw new RuntimeException('Database connection is unavailable.');
    }

    $query = trim((string) ($_GET['q'] ?? ''));
    $letter = strtoupper(trim((string) ($_GET['letter'] ?? '')));
    $page = max(1, (int) ($_GET['page'] ?? 1));

    $requestedSize = (int) (
        $_GET['per_page'] ?? $_GET['limit'] ?? 20
    );

    $perPage = in_array($requestedSize, [10, 20, 50, 100], true)
        ? $requestedSize
        : 20;

    if ($letter !== '' && ! preg_match('/^[A-Z#]$/', $letter)) {
        $letter = '';
    }

    $conditions = [];
    $params = [];

    // Search across fields useful to directory and other page search bars.
    if ($query !== '') {
        $conditions[] = '(
            name LIKE :name
            OR city LIKE :city
            OR state LIKE :state
            OR institution_type LIKE :type
            OR grid_id LIKE :grid
        )';

        $term = '%'.$query.'%';

        $params[':name'] = $term;
        $params[':city'] = $term;
        $params[':state'] = $term;
        $params[':type'] = $term;
        $params[':grid'] = $term;
    }

    // Optional alphabetical filter.
    if ($letter === '#') {
        $conditions[] = "name NOT REGEXP '^[A-Za-z]'";
    } elseif ($letter !== '') {
        $conditions[] = 'name LIKE :letter';
        $params[':letter'] = $letter.'%';
    }

    $whereSql = $conditions
        ? 'WHERE '.implode(' AND ', $conditions)
        : '';

    // Total matching records.
    $countStmt = $pdo->prepare(
        "SELECT COUNT(*) FROM institutions $whereSql"
    );

    $countStmt->execute($params);
    $total = (int) $countStmt->fetchColumn();

    $totalPages = (int) ceil($total / $perPage);
    $page = $totalPages > 0 ? min($page, $totalPages) : 1;
    $offset = ($page - 1) * $perPage;

    // Return only fields needed by the directory and reusable search UI.
    $sql = "
        SELECT
            id,
            slug,
            name,
            institution_type,
            year_established,
            city,
            state,
            grid_id,
            logo_path
        FROM institutions
        $whereSql
        ORDER BY name ASC, id ASC
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $pdo->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();

    $institutions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $institutions,
        'pagination' => [
            'page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'total_pages' => $totalPages,
            'from' => $total > 0 ? $offset + 1 : 0,
            'to' => min($offset + $perPage, $total),
        ],
        'filters' => [
            'q' => $query,
            'letter' => $letter,
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);

} catch (Throwable $exception) {
    error_log('Institution list API error: '.$exception->getMessage());

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Unable to load institutions.',
    ]);
}
