<?php
$slug = $params['slug'] ?? '';

$institution = db_find($pdo, 'institutions', 'slug', $slug);
if (!$institution) {
    abort_404(); // exits
}

$statsStmt = $pdo->prepare(
    "SELECT * FROM institution_stats WHERE institution_id = :id ORDER BY id DESC LIMIT 1"
);
$statsStmt->execute([':id' => $institution['id']]);
$s = $statsStmt->fetch() ?: null;

$pageTitle = $institution['name'] . ' — Institutional Report';
?>
<div class="container institution-detail">
    <h1><?= e($institution['name']) ?></h1>

    <dl class="institution-meta">
        <?php if (!empty($institution['institution_type'])): ?>
            <dt>Institution type</dt><dd><?= e($institution['institution_type']) ?></dd>
        <?php endif; ?>
        <?php if (!empty($institution['year_established'])): ?>
            <dt>Year of Establishment</dt><dd><?= e((string) $institution['year_established']) ?></dd>
        <?php endif; ?>
    </dl>

    <?php if (!empty($institution['description'])): ?>
        <p class="description"><?= e($institution['description']) ?></p>
    <?php endif; ?>
    <?php if (!empty($institution['source_note'])): ?>
        <p class="source-note"><?= e($institution['source_note']) ?></p>
    <?php endif; ?>

    <?php if ($s): ?>
    <section class="key-indicators">
        <h2>Key Indicators (<?= e($s['period_label']) ?>)</h2>
        <div class="indicator-grid">
            <?php partial('stat-block', ['label' => 'Total Research Papers', 'value' => format_number($s['total_papers'])]); ?>
            <?php partial('stat-block', ['label' => 'Total Citations', 'value' => format_number($s['total_citations'])]); ?>
            <?php partial('stat-block', ['label' => 'Citations per paper', 'value' => $s['citations_per_paper']]); ?>
            <?php partial('stat-block', ['label' => 'h-index', 'value' => format_number($s['h_index'])]); ?>
            <?php partial('stat-block', ['label' => 'g-index', 'value' => format_number($s['g_index'])]); ?>
            <?php partial('stat-block', ['label' => 'ICP proportion', 'value' => format_percent($s['icp_proportion'])]); ?>
            <?php partial('stat-block', ['label' => 'Open Access availability', 'value' => format_percent($s['open_access_pct'])]); ?>
        </div>

        <div class="gender-split">
            <h3>Male / Female 1st author</h3>
            <ul>
                <li>Male: <?= format_percent($s['male_first_author_pct']) ?></li>
                <li>Female: <?= format_percent($s['female_first_author_pct']) ?></li>
            </ul>
        </div>

        <div class="altmetric-attention">
            <h3>Altmetric Attention</h3>
            <ul>
                <li>Twitter Coverage: <?= format_percent($s['twitter_coverage_pct']) ?></li>
                <li>Facebook Coverage: <?= format_percent($s['facebook_coverage_pct']) ?></li>
                <li>Mendeley Coverage: <?= format_percent($s['mendeley_coverage_pct']) ?></li>
            </ul>
        </div>
    </section>

    <section class="research-portfolio">
        <h2>Research Portfolio</h2>
        <p>x-index: <?= format_number($s['x_index']) ?> &nbsp; x(g)-index: <?= format_number($s['xg_index']) ?></p>
    </section>

    <section class="external-rankings">
        <h2>External Data (Year - <?= e((string) $s['external_data_year']) ?>)</h2>
        <ul>
            <li>ARWU rank: <?= e($s['arwu_rank'] ?? 'NA') ?></li>
            <li>THE rank: <?= e($s['the_rank'] ?? 'NA') ?></li>
            <li>QS rank: <?= e($s['qs_rank'] ?? 'NA') ?></li>
            <li>Leiden rank: <?= e($s['leiden_rank'] ?? 'NA') ?></li>
            <li>NIRF rank (Overall): <?= e($s['nirf_rank'] ?? 'NA') ?></li>
        </ul>
    </section>
    <?php else: ?>
        <p>No detailed indicators are available for this institution yet.</p>
    <?php endif; ?>

    <p class="disclaimer">
        Note: The above analysis/outputs are generated using data obtained from Dimensions and Altmetric.
    </p>
</div>
