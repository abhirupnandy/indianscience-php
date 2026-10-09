<?php
/** Expects: $institution (assoc array row from `institutions` table) */

require_once ROOT_PATH . '/includes/institution-logo.php';

$logoUrl = institutionLogoUrl((string) $institution['name']);

if ($logoUrl === null && !empty($institution['logo_path'])) {
    $logoUrl = $institution['logo_path'];
}
?>

<div class="institution-card">
    <?php if ($logoUrl !== null && $logoUrl !== ''): ?>
        <img
                src="<?= e($logoUrl) ?>"
                alt="<?= e($institution['name']) ?> logo"
                loading="lazy"
                decoding="async"
        >
    <?php endif; ?>

    <h3><?= e($institution['name']) ?></h3>

    <?php if (!empty($institution['city'])): ?>
        <p class="location">
            <?= e($institution['city']) ?><?= !empty($institution['state']) ? ', ' . e($institution['state']) : '' ?>
        </p>
    <?php endif; ?>
</div>