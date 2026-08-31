<?php
$pageTitle = 'Institutional Reports';

$query = trim((string) ($_GET['q'] ?? ''));
$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 20;
$offset = ($page - 1) * $perPage;

if ($query !== '') {
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM institutions WHERE name LIKE :q");
    $countStmt->execute([':q' => "%$query%"]);
    $total = (int) $countStmt->fetchColumn();

    $stmt = $pdo->prepare(
        "SELECT * FROM institutions WHERE name LIKE :q ORDER BY name ASC LIMIT :limit OFFSET :offset",
    );
    $stmt->bindValue(':q', "%$query%");
} else {
    $total = (int) $pdo->query("SELECT COUNT(*) FROM institutions")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM institutions ORDER BY name ASC LIMIT :limit OFFSET :offset");
}
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$institutions = $stmt->fetchAll();

$totalPages = (int) ceil($total / $perPage);
?>
<div class="container">
    <h1>Institutional Reports</h1>

    <form action="<?= url('institutions') ?>" method="get" class="institution-search-form">
        <input type="text" name="q" value="<?= e($query) ?>" placeholder="Search by institution name">
        <button type="submit">Search</button>
    </form>

    <div class="institution-grid">
        <?php foreach ($institutions as $institution): ?>
            <?php partial('institution-card', ['institution' => $institution]); ?>
        <?php endforeach; ?>
        <?php if (!$institutions): ?>
            <p>No institutions found<?= $query !== '' ? ' for "' . e($query) . '"' : '' ?>.</p>
        <?php endif; ?>
    </div>

    <?php if ($totalPages > 1): ?>
        <nav class="pagination">
            <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                <a href="<?= url('institutions') ?>?<?= http_build_query(['q' => $query, 'page' => $p]) ?>"
                   class="<?= $p === $page ? 'active' : '' ?>"><?= $p ?></a>
            <?php endfor; ?>
        </nav>
    <?php endif; ?>
</div>
