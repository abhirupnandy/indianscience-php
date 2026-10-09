<?php
/**
 * Landscape institutional research profile (A4) for Dompdf.
 * Input:  $reportData = decoded "data" payload from api/institution_data.php
 * Layout: p1 overview · p2 output & impact · p3 authorship/collaboration/access
 *         p4 subject strengths & collaborators · p5 SDGs & visibility
 */
require_once __DIR__ . '/institution-report-charts.php';

/* ---------------------------------------------------------------- *
 *  Data preparation
 * ---------------------------------------------------------------- */
$arr = static fn($v): array => is_array($v) ? $v : [];

$institution   = $arr($reportData['institution'] ?? []);
$research      = $arr($reportData['research'] ?? []);
$indicators    = $arr($research['indicators'] ?? []);
$external      = $arr($research['external'] ?? []);
$legacy        = $arr($research['legacy_institute'] ?? []);
$pubCitation   = $arr($research['publication_citation'] ?? []);
$cited         = $arr(($research['cited_percent'][0] ?? []));
$grant         = $arr(($research['grants'][0] ?? []));
$collaborators = $arr($research['collaborators'] ?? []);

$name = trim((string) ($institution['name'] ?? '')) ?: 'Institutional Research Profile';
$grid = (string) ($reportData['grid_id'] ?? $institution['grid_id'] ?? $institution['grid'] ?? '');
$description = report_excerpt((string) ($institution['description'] ?? $external['info'] ?? ''), 460);
$location = implode(', ', array_filter(
    [$institution['city'] ?? null, $institution['state'] ?? null, $institution['country'] ?? null],
    fn($v) => trim((string) $v) !== ''
));
$logoDataUri = (string) ($reportData['logo_data_uri'] ?? '');
$hasLogo = $logoDataUri !== '' && preg_match('#^data:image/(png|jpeg|jpg|webp);base64,#', $logoDataUri);
$stop = ['of', 'the', 'and', 'for', 'in', 'at', 'a', 'an', 'on'];
$initialWords = array_values(array_filter(
    preg_split('/[\s\-]+/u', $name) ?: [],
    fn($w) => $w !== '' && !in_array(mb_strtolower($w, 'UTF-8'), $stop, true)
));
$initials = implode('', array_map(
    fn($w) => mb_strtoupper(mb_substr($w, 0, 1, 'UTF-8'), 'UTF-8'),
    array_slice($initialWords, 0, 3)
));
$hasResearch = !empty($indicators) || !empty($pubCitation);
$footerName = mb_strlen($name, 'UTF-8') > 70 ? mb_substr($name, 0, 67, 'UTF-8') . '...' : $name;

$years = range(2010, 2019);
$yearLabels = array_map('strval', $years);

/* KPIs: [label, value, suffix, note, accent colour] */
$kpis = [
    ['Research papers', $indicators['tp'] ?? ($legacy['pub_count'] ?? null), '', 'Indexed publications', '#2f6fdd'],
    ['Total citations', $indicators['tc'] ?? null, '', 'Citations received', '#1fa89c'],
    ['Citations per paper', $indicators['cpp'] ?? null, '', 'Average citation impact', '#f2a33a'],
    ['h-index', $indicators['h-index'] ?? null, '', 'Productivity and impact', '#7a5af8'],
    ['g-index', $indicators['g-index'] ?? null, '', 'Weights highly cited papers', '#e4572e'],
    ['International collaboration', $indicators['icp'] ?? null, '%', 'Papers with international partners', '#2f6fdd'],
    ['Open access', $indicators['total oa prop'] ?? null, '%', 'Papers openly available', '#1fa89c'],
    ['Female first authors', $indicators['female_total'] ?? null, '%', 'Share of first authors', '#f2a33a'],
];

$facts = array_filter([
    'Institution type' => $institution['institution_type'] ?? $external['inst_type'] ?? null,
    'Year established' => $institution['year_established'] ?? $external['est_year'] ?? null,
    'Location'         => $location,
    'GRID identifier'  => $grid,
], fn($v) => $v !== null && trim((string) $v) !== '');

/* --- Output & impact ------------------------------------------------ */
$pubValues   = report_year_values($pubCitation, 'pub_', $years);
$citValues   = report_year_values($pubCitation, 'cit_', $years);
$citedValues = report_year_values($cited, 'cit_', $years);
$grantValues = report_year_values($grant, 'fund_', $years);

/* --- Authorship / collaboration / access ---------------------------- */
$authRows   = $arr($research['author_types'] ?? []);
$collabRows = $arr($research['collaboration'] ?? []);
$genderRows = $arr($research['gender'] ?? []);
$oaRows     = $arr($research['open_access'] ?? []);
$altRows    = $arr($research['altmetric'] ?? []);
$sdgRows    = $arr($research['sdg_by_year'] ?? []);

$authSeries = [
    ['label' => 'Single-authored', 'color' => '#2f6fdd', 'values' => report_values_from_rows($authRows, 'auth_1')],
    ['label' => '2-5 authors',     'color' => '#1fa89c', 'values' => report_values_from_rows($authRows, 'auth_2')],
    ['label' => '6-10 authors',    'color' => '#f2a33a', 'values' => report_values_from_rows($authRows, 'auth_3')],
    ['label' => '10+ authors',     'color' => '#e4572e', 'values' => report_values_from_rows($authRows, 'auth_4')],
];
$collabSeries = [
    ['label' => 'International',                 'color' => '#2f6fdd', 'values' => report_values_from_rows($collabRows, 'inter')],
    ['label' => 'Domestic, single institution',  'color' => '#f2a33a', 'values' => report_values_from_rows($collabRows, 'dom_single')],
    ['label' => 'Domestic, multi-institution',   'color' => '#1fa89c', 'values' => report_values_from_rows($collabRows, 'dom_multi')],
];
$genderSeries = [
    ['label' => 'Female first-authored', 'color' => '#e4572e', 'values' => report_values_from_rows($genderRows, 'female')],
    ['label' => 'Male first-authored',   'color' => '#2f6fdd', 'values' => report_values_from_rows($genderRows, 'male')],
];
$oaSeries = [
    ['label' => 'Open access',   'color' => '#1fa89c', 'values' => report_values_from_rows($oaRows, 'open')],
    ['label' => 'Closed access', 'color' => '#94a3b8', 'values' => report_values_from_rows($oaRows, 'closed')],
];
$altSeries = [];
foreach (array_values($altRows) as $i => $row) {
    $vals = [];
    foreach ($years as $year) {
        $vals[] = isset($row[$year]) && is_numeric($row[$year]) ? (float) $row[$year] : null;
    }
    $altSeries[] = [
        'label'  => (string) ($row['name'] ?? 'Metric ' . ($i + 1)),
        'color'  => REPORT_PALETTE[$i % count(REPORT_PALETTE)],
        'values' => $vals,
    ];
}

/* --- Subjects & collaborators -------------------------------------- */
$subjectRows = array_values(array_filter(
    $arr($research['subject_series'] ?? []),
    fn($r) => isset($r['name']) && is_numeric($r['value'] ?? null)
));
usort($subjectRows, fn($a, $b) => (float) $b['value'] <=> (float) $a['value']);
$topSubjects = array_slice($subjectRows, 0, 10);

$collabCountries = [];
for ($i = 1; $i <= 10; $i++) {
    $country = trim((string) ($collaborators["C$i"] ?? ''));
    $count = $collaborators["P$i"] ?? null;
    if ($country !== '' && is_numeric($count)) {
        $collabCountries[] = ['label' => $country, 'value' => (float) $count];
    }
}
usort($collabCountries, fn($a, $b) => $b['value'] <=> $a['value']);

/* --- SDGs ------------------------------------------------------------ */
$sdgNames = [
    1 => 'No Poverty', 2 => 'Zero Hunger', 3 => 'Good Health and Well-being', 4 => 'Quality Education',
    5 => 'Gender Equality', 6 => 'Clean Water and Sanitation', 7 => 'Affordable and Clean Energy',
    8 => 'Decent Work and Economic Growth', 9 => 'Industry, Innovation and Infrastructure',
    10 => 'Reduced Inequalities', 11 => 'Sustainable Cities and Communities',
    12 => 'Responsible Consumption and Production', 13 => 'Climate Action', 14 => 'Life Below Water',
    15 => 'Life on Land', 16 => 'Peace, Justice and Strong Institutions', 17 => 'Partnerships for the Goals',
];
$sdgBars = [];
foreach ($sdgNames as $id => $sdgName) {
    $total = 0.0;
    $seen = false;
    foreach ($sdgRows as $row) {
        $v = $row["SDG$id"] ?? null;
        if (is_numeric($v)) { $total += (float) $v; $seen = true; }
    }
    if ($seen && $total > 0) {
        $sdgBars[] = ['label' => "SDG $id: $sdgName", 'value' => $total, 'color' => REPORT_SDG_COLORS[$id]];
    }
}
usort($sdgBars, fn($a, $b) => $b['value'] <=> $a['value']);

/* Pre-build chart panels used on page 5 so the layout can adapt to missing data. */
$sdgPanel = $sdgBars
    ? report_chart_panel(
        'Output by Sustainable Development Goal',
        report_hbar_chart($sdgBars, 480, 'Publications per SDG', '#2f6fdd', 210, 20, 8.5),
        'Total publications mapped to each goal, 2010-2019. A paper can map to more than one goal.'
    )
    : '';
$altPanel = report_valid_series($altSeries)
    ? report_chart_panel(
        'Altmetric visibility',
        report_line_chart($yearLabels, $altSeries, 480, 210, 'Altmetric visibility'),
        'Social and reference-manager attention as supplied by the source.',
        report_valid_series($altSeries)
    )
    : '';
$aboutPanel = '<div class="callout"><strong>About this profile</strong><br>'
    . 'This profile summarises the indicators available in the Indian Science Reports dataset. '
    . 'Historical series cover 2010-2019 where supplied by the source. Values should be read in the context of '
    . 'their source definitions and coverage.<br><span class="small muted">Generated ' . date('j F Y') . '.</span></div>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= report_e($name) ?> — Institutional Research Profile</title>
    <style>
        @page { size: A4 landscape; margin: 10mm 12mm 15mm 12mm; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #1e293b; font-family: "DejaVu Sans", sans-serif; font-size: 8.5pt; line-height: 1.45; }
        .muted { color: #64748b; }
        .small { font-size: 7.5pt; }
        .break { page-break-before: always; }

        /* Running footer (page numbers via CSS counters — no PHP execution needed in Dompdf) */
        .page-footer { position: fixed; left: 0; right: 0; bottom: -13mm; height: 8mm; border-top: 1px solid #d9e2ec; padding-top: 4px; color: #64748b; font-size: 7pt; }
        .page-footer table { width: 100%; border-collapse: collapse; }
        .page-footer td { padding: 0; vertical-align: top; }
        .page-footer td.r { text-align: right; }
        .pagenum:after { content: "Page " counter(page); }

        /* Cover */
        .cover { background: #10264a; color: #fff; padding: 15px 24px 13px; border-bottom: 5px solid #1fa89c; border-radius: 6px; }
        .cover-grid { width: 100%; border-collapse: collapse; }
        .cover-grid td { vertical-align: middle; padding: 0; }
        .brand { color: #8fe0d8; font-size: 7.5pt; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .cover h1 { margin: 6px 0 4px; font-size: 22pt; line-height: 1.15; color: #fff; }
        .subtitle { color: #c9d7ec; font-size: 9.5pt; }
        .logo-box { width: 70px; height: 70px; background: #fff; border-radius: 8px; padding: 5px; text-align: center; }
        .logo-box img { width: 60px; height: 60px; }
        table.initials { width: 70px; height: 70px; border-collapse: collapse; background: #fff; border-radius: 8px; }
        table.initials td { text-align: center; vertical-align: middle; color: #10264a; font-size: 17pt; font-weight: bold; padding: 0; }
        .pills { margin-top: 10px; }
        .pill { display: inline-block; padding: 3px 9px; margin: 0 5px 2px 0; background: #1d3a66; color: #e6eefb; border: 1px solid #3b5a8a; border-radius: 10px; font-size: 7.5pt; }
        .period-label { color: #8fe0d8; font-size: 7pt; letter-spacing: 1.5px; text-transform: uppercase; text-align: right; }
        .period-value { color: #fff; font-size: 17pt; font-weight: bold; text-align: right; }

        /* Section headings */
        .section { margin: 11px 0 7px; border-left: 5px solid #1fa89c; padding: 1px 0 1px 10px; }
        .section-title { color: #10264a; font-size: 13.5pt; font-weight: bold; line-height: 1.2; }
        .section-sub { color: #64748b; font-size: 8pt; margin-top: 1px; }
        .section-first { margin-top: 0; }

        /* KPI cards */
        .kpi-grid { width: 100%; table-layout: fixed; border-collapse: collapse; }
        .kpi-grid td { width: 25%; padding: 0 8px 7px 0; vertical-align: top; }
        .kpi-grid td.last { padding-right: 0; }
        .card { background: #f6f9fc; border: 1px solid #e1e8f0; border-top: 4px solid #2f6fdd; padding: 6px 11px 5px; }
        .kpi-label { color: #475569; font-size: 7pt; font-weight: bold; text-transform: uppercase; letter-spacing: .5px; }
        .kpi-value { color: #10264a; font-size: 18pt; font-weight: bold; line-height: 1.15; margin-top: 2px; }
        .kpi-note { color: #7b8aa0; font-size: 7pt; }

        /* Layout grids */
        .grid { width: 100%; table-layout: fixed; border-collapse: collapse; }
        .grid td { width: 50%; vertical-align: top; padding: 0 7px 12px 0; }
        .grid td.r { padding: 0 0 12px 7px; }
        .grid td.wide { width: 100%; padding: 0 0 12px 0; }

        /* Panels */
        .panel { border: 1px solid #e1e8f0; border-radius: 5px; padding: 10px 14px; }
        .panel h3 { margin: 0 0 6px; color: #10264a; font-size: 10pt; }
        .panel p { margin: 0; color: #334155; line-height: 1.55; }
        table.data { width: 100%; border-collapse: collapse; font-size: 8pt; }
        table.data td { border-bottom: 1px solid #edf1f6; padding: 3px 4px; }
        table.data tr.last td { border-bottom: none; }
        table.data td.k { color: #64748b; width: 42%; }
        table.data td.v { color: #10264a; font-weight: bold; }
        .callout { background: #eaf7f5; border-left: 4px solid #1fa89c; padding: 10px 13px; color: #234a50; line-height: 1.5; }

        /* Charts */
        .chart-panel { border: 1px solid #e1e8f0; border-radius: 5px; padding: 8px 10px 7px; background: #fff; margin-bottom: 0; }
        .chart-panel h3 { margin: 0 0 2px; color: #10264a; font-size: 9.5pt; }
        .legend { margin: 1px 0 3px; font-size: 7.5pt; color: #475569; }
        .lg { display: inline-block; margin-right: 10px; }
        .sw { display: inline-block; width: 8px; height: 8px; margin-right: 4px; border-radius: 2px; }
        .chart-image { display: block; max-width: 100%; margin: 0 auto; }
        .chart-note { color: #7b8aa0; font-size: 7pt; margin-top: 3px; }
        .chart-empty { padding: 18px 8px; color: #64748b; background: #f8fafc; text-align: center; font-size: 8pt; border: 1px dashed #d5deea; }

        @media screen { body { max-width: 1100px; margin: 20px auto; } }
    </style>
</head>
<body>

<div class="page-footer">
    <table><tr>
            <td>INDIAN SCIENCE REPORTS &nbsp;·&nbsp; Institutional Research Profile &nbsp;·&nbsp; <?= report_e($footerName) ?></td>
            <td class="r"><span class="pagenum"></span></td>
        </tr></table>
</div>

<!-- ============================== PAGE 1 ============================== -->
<div class="cover">
    <table class="cover-grid"><tr>
            <td style="width:86px">
                <?php if ($hasLogo): ?>
                    <div class="logo-box"><img src="<?= report_e($logoDataUri) ?>" alt=""></div>
                <?php else: ?>
                    <table class="initials"><tr><td><?= report_e($initials) ?></td></tr></table>
                <?php endif; ?>
            </td>
            <td>
                <div class="brand">Indian Science Reports · Institutional Research Profile</div>
                <h1><?= report_e($name) ?></h1>
                <div class="subtitle"><?= report_e($location ?: 'Institutional research snapshot') ?><?= $grid !== '' ? ' &nbsp;|&nbsp; GRID: ' . report_e($grid) : '' ?></div>
                <div class="pills">
                    <?php foreach ([
                                       'Institution type' => $institution['institution_type'] ?? $external['inst_type'] ?? null,
                                       'Established'      => $institution['year_established'] ?? $external['est_year'] ?? null,
                                   ] as $label => $value): if ($value !== null && trim((string) $value) !== ''): ?>
                        <span class="pill"><?= report_e($label) ?>: <?= report_e($value) ?></span>
                    <?php endif; endforeach; ?>
                </div>
            </td>
            <td style="width:150px">
                <div class="period-label">Research period</div>
                <div class="period-value">2010–2019</div>
            </td>
        </tr></table>
</div>

<div class="section"><div class="section-title">Research at a glance</div></div>

<table class="kpi-grid"><tr>
        <?php foreach ($kpis as $i => $kpi): ?>
        <td class="<?= $i % 4 === 3 ? 'last' : '' ?>">
            <div class="card" style="border-top-color: <?= report_e($kpi[4]) ?>">
                <div class="kpi-label"><?= report_e($kpi[0]) ?></div>
                <div class="kpi-value"><?= report_e(report_kpi_value($kpi[1], $kpi[2])) ?></div>
                <div class="kpi-note"><?= report_e($kpi[3]) ?></div>
            </div>
        </td>
        <?php if ($i % 4 === 3 && $i < count($kpis) - 1): ?></tr><tr><?php endif; ?>
        <?php endforeach; ?>
    </tr></table>

<div class="section"><div class="section-title">Institution profile</div></div>
<table class="grid"><tr>
        <td>
            <div class="panel">
                <h3>About</h3>
                <?php if ($description !== ''): ?>
                    <p><?= nl2br(report_e($description)) ?></p>
                <?php else: ?>
                    <p class="muted">No institutional description is available in the source data.</p>
                <?php endif; ?>
            </div>
        </td>
        <td class="r">
            <div class="panel">
                <h3>Key facts</h3>
                <?php if ($facts): $lastKey = array_key_last($facts); ?>
                    <table class="data">
                        <?php foreach ($facts as $label => $value): ?>
                            <tr class="<?= $label === $lastKey ? 'last' : '' ?>"><td class="k"><?= report_e($label) ?></td><td class="v"><?= report_e($value) ?></td></tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p class="muted">No institutional details are available.</p>
                <?php endif; ?>
            </div>
        </td>
    </tr></table>

<?php if (!$hasResearch): ?>
    <div class="callout">Detailed research indicators are not available for this institution in the current dataset,
        so the trend, collaboration and SDG sections have been omitted.</div>
<?php else: ?>

    <!-- ============================== PAGE 2 ============================== -->
    <?= report_section('Research output and impact', 'Annual publications, citations, citation reach and funding, 2010–2019', 'section-first break') ?>
    <table class="grid"><tr>
            <td><?= report_chart_panel('Annual research output',
                    report_column_chart($yearLabels, $pubValues, '#2f6fdd', 480, 200, 'Annual publications'),
                    'Number of publications per year.') ?></td>
            <td class="r"><?= report_chart_panel('Annual citations',
                    report_column_chart($yearLabels, $citValues, '#1fa89c', 480, 200, 'Annual citations'),
                    'Citations attributed to each year.') ?></td>
        </tr><tr>
            <td><?= report_chart_panel('Cited publications',
                    report_line_chart($yearLabels, [['label' => 'Cited publications (%)', 'color' => '#7a5af8', 'values' => $citedValues]], 480, 200, 'Cited publications over time', true, true),
                    'Percentage of publications that have been cited, as recorded in the source dataset.') ?></td>
            <td class="r"><?= report_chart_panel('Research funding',
                    report_column_chart($yearLabels, $grantValues, '#f2a33a', 480, 200, 'Research funding'),
                    'Funding amount in million USD, as recorded in the legacy dataset.') ?></td>
        </tr></table>

    <!-- ============================== PAGE 3 ============================== -->
    <?= report_section('Authorship, collaboration and access', 'How the institution\'s research is produced, shared and attributed', 'section-first break') ?>
    <?php
    $authLabels   = report_labels_from_rows($authRows);
    $collabLabels = report_labels_from_rows($collabRows);
    $genderLabels = report_labels_from_rows($genderRows);
    $oaLabels     = report_labels_from_rows($oaRows);
    ?>
    <table class="grid"><tr>
            <td><?= report_chart_panel('Authorship patterns',
                    report_stacked_chart($authLabels, $authSeries, 480, 200, 'Authorship patterns'),
                    'Publications by number of authors; totals shown above each bar.', report_valid_series($authSeries)) ?></td>
            <td class="r"><?= report_chart_panel('Collaboration patterns',
                    report_stacked_chart($collabLabels, $collabSeries, 480, 200, 'Collaboration patterns'),
                    'International and domestic collaboration types.', report_valid_series($collabSeries)) ?></td>
        </tr><tr>
            <td><?= report_chart_panel('Gender of first authors',
                    report_composition_chart($genderLabels, $genderSeries, 480, 200, 'Gender of first authors'),
                    'Share of female and male first-authored publications.', report_valid_series($genderSeries)) ?></td>
            <td class="r"><?= report_chart_panel('Open versus closed access',
                    report_composition_chart($oaLabels, $oaSeries, 480, 200, 'Open versus closed access'),
                    'Open-access and closed-access proportions.', report_valid_series($oaSeries)) ?></td>
        </tr></table>

    <?php if ($topSubjects || $collabCountries): ?>
        <!-- ============================== PAGE 4 ============================== -->
        <?= report_section('Research strengths and collaboration leaders', 'Where the institution publishes most, and who it works with', 'section-first break') ?>
        <table class="grid"><tr>
                <td><?= report_chart_panel('Leading subject areas',
                        report_hbar_chart(array_map(fn($r) => ['label' => (string) $r['name'], 'value' => (float) $r['value']], $topSubjects), 480, 'Leading subject areas', '#2f6fdd', 195, 22, 8.5),
                        'Top ten subject areas ranked by recorded publication volume.') ?></td>
                <td class="r"><?= report_chart_panel('Subject-area profile',
                        report_radar_chart(
                            array_map(fn($r) => (string) $r['name'], array_slice($topSubjects, 0, 8)),
                            array_map(fn($r) => (float) $r['value'], array_slice($topSubjects, 0, 8)),
                            480, 240, 'Subject-area radar chart'),
                        'The eight leading subject areas; the outer ring marks the highest publication count.') ?></td>
            </tr><tr>
                <td class="wide" colspan="2"><?= report_chart_panel('Top collaborating countries',
                        report_hbar_chart($collabCountries, 1000, 'Top collaborating countries', '#1fa89c', 190, 18, 9.0),
                        'Collaborators ranked by recorded number of joint publications.') ?></td>
            </tr></table>
    <?php endif; ?>

    <?php if ($sdgPanel !== '' || $altPanel !== ''): ?>
        <!-- ============================== PAGE 5 ============================== -->
        <?= report_section('Societal visibility and the Sustainable Development Goals', 'Contribution to the UN SDGs and online attention to the research', 'section-first break') ?>
        <table class="grid"><tr>
                <td><?= $sdgPanel !== '' ? $sdgPanel : $altPanel ?></td>
                <td class="r"><?= $sdgPanel !== '' ? $altPanel . ($altPanel !== '' ? '<div style="height:10px"></div>' : '') . $aboutPanel : $aboutPanel ?></td>
            </tr></table>
    <?php endif; ?>

<?php endif; /* $hasResearch */ ?>

</body>
</html>