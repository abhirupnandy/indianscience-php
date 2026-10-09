<?php
$pageTitle = 'Blog';

$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 10;
$offset = ($page - 1) * $perPage;

$total = (int) $pdo->query('SELECT COUNT(*) FROM posts WHERE is_published = 1')->fetchColumn();

$stmt = $pdo->prepare(
    'SELECT * FROM posts WHERE is_published = 1 ORDER BY published_at DESC LIMIT :limit OFFSET :offset',
);
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll();

$totalPages = (int) ceil($total / $perPage);
?>
<div class="container">
    <h1>Blog</h1>
    <div class="post-grid">
        <?php foreach ($posts as $post) { ?>
            <?php partial('post-card', ['post' => $post]); ?>
        <?php } ?>
        <?php if (! $posts) { ?>
            <p>No posts published yet.</p>
        <?php } ?>
    </div>

    <?php if ($totalPages > 1) { ?>
        <nav class="pagination">
            <?php for ($p = 1; $p <= $totalPages; $p++) { ?>
                <a href="<?= url('blog') ?>?page=<?= $p ?>" class="<?= $p === $page ? 'active' : '' ?>"><?= $p ?></a>
            <?php } ?>
        </nav>
    <?php } ?>
</div>
