<?php
/** Expects: $post (assoc array row from `posts` table) */
?>
<article class="post-card">
    <?php if (!empty($post['cover_image'])): ?>
        <a href="<?= url('blog/' . $post['slug']) ?>">
            <img src="<?= e($post['cover_image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
        </a>
    <?php endif; ?>
    <div class="post-card-body">
        <time datetime="<?= e($post['published_at']) ?>"><?= e(format_date($post['published_at'])) ?></time>
        <h3><a href="<?= url('blog/' . $post['slug']) ?>"><?= e($post['title']) ?></a></h3>
        <?php if (!empty($post['excerpt'])): ?>
            <p><?= e($post['excerpt']) ?></p>
        <?php endif; ?>
    </div>
</article>
