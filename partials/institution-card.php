<?php
/** Expects: $institution (assoc array row from `institutions` table) */

require_once ROOT_PATH . '/includes/institution-logo.php';

$logoUrl = institutionLogoUrl((string) $institution['name']);

if ($logoUrl === null && !empty($institution['logo_path'])) {
    $logoUrl = $institution['logo_path'];
}
?>

<!-- Logo -->
<div class="flex h-[145px] w-full shrink-0 items-center justify-center">
    <?php if ($logoUrl !== null && $logoUrl !== ''): ?>
        <img
            src="<?= e($logoUrl) ?>"
            alt="<?= e($institution['name']) ?> logo"
            width="120"
            height="120"
            loading="lazy"
            decoding="async"
            class="!block !h-[120px] !w-[120px] !max-h-none !max-w-none shrink-0 object-contain object-center"
        >
    <?php endif; ?>
</div>

<!-- Institution name -->
<div class="flex h-[76px] w-full shrink-0 items-start justify-center overflow-hidden pt-2">
    <h3 class="line-clamp-3 w-full text-center text-sm font-medium leading-6 text-slate-900 dark:text-slate-100">
        <?= e($institution['name']) ?>
    </h3>
</div>