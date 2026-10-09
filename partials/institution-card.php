<?php
/** Expects: $institution (assoc array row from `institutions` table) */
?>
<a class="institution-card" href="<?= url('institution/'.$institution['slug']) ?>">
    <?php if (! empty($institution['logo_path'])) { ?>
        <img src="<?= e($institution['logo_path']) ?>" alt="<?= e($institution['name']) ?>" loading="lazy">
    <?php } ?>
    <h3><?= e($institution['name']) ?></h3>
    <?php if (! empty($institution['city'])) { ?>
        <p class="location"><?= e($institution['city']) ?><?= ! empty($institution['state']) ? ', '.e($institution['state']) : '' ?></p>
    <?php } ?>
</a>
