<?php
$slug = $params['slug'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM posts WHERE slug = :slug AND is_published = 1 LIMIT 1");
$stmt->execute([':slug' => $slug]);
$post = $stmt->fetch();

if (!$post) {
    abort_404(); // exits
}

$pageTitle = $post['title'];
$pageDescription = $post['excerpt'] ?? '';
?>
<article class="container blog-post">
    <h1><?= e($post['title']) ?></h1>
    <p class="post-meta">
        <?php if ($post['author']): ?>By <?= e($post['author']) ?> &middot; <?php endif; ?>
        <time datetime="<?= e($post['published_at']) ?>"><?= e(format_date($post['published_at'])) ?></time>
    </p>

    <?php if ($post['cover_image']): ?>
        <img class="cover-image" src="<?= e($post['cover_image']) ?>" alt="<?= e($post['title']) ?>">
    <?php endif; ?>

    <div class="post-body">
        <?= $post['body'] /* stored as trusted, pre-sanitized HTML — see README */ ?>
    </div>

    <p><a href="<?= url('blog') ?>">&larr; Back to Blog</a></p>
</article>
