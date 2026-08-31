<?php
$pageTitle = 'Related Publications';
$publications = $pdo->query("SELECT * FROM publications ORDER BY published_at DESC")->fetchAll();
?>
<div class="container">
    <h1>Related Publications</h1>
    <ul class="publication-list">
        <?php foreach ($publications as $pub): ?>
            <li>
                <p class="authors"><?= e($pub['authors']) ?></p>
                <h3><a href="<?= e($pub['url']) ?>"><?= e($pub['title']) ?></a></h3>
                <?php if ($pub['journal']): ?><p class="journal"><?= e($pub['journal']) ?></p><?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
