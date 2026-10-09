<?php
/**
 * Chart and formatting helpers for the institutional research PDF (Dompdf).
 *
 * This file only DEFINES functions — it prints nothing and no longer depends
 * on variables from the template. Load it once from the template:
 *
 *     require_once __DIR__ . '/institution-report-charts.php';
 *
 * Charts are drawn as inline SVG and embedded as <img> data URIs, which Dompdf
 * renders natively (no JavaScript / canvas). Every chart is drawn at the exact
 * pixel width it is displayed at (480px half-width, 1000px full-width), so
 * fonts and strokes keep their true size instead of being scaled down.
 *
 * NOTE: text inside the SVGs is kept ASCII-only on purpose. Dompdf's SVG
 * renderer uses the PDF core fonts, which don't cover every Unicode glyph.
 */

const REPORT_PALETTE = ['#2f6fdd', '#1fa89c', '#f2a33a', '#e4572e', '#7a5af8', '#0891b2', '#db2777', '#64748b'];

/** Official UN SDG colours, keyed by goal number. */
const REPORT_SDG_COLORS = [
    1 => '#e5243b', 2 => '#dda63a', 3 => '#4c9f38', 4 => '#c5192d', 5 => '#ff3a21', 6 => '#26bde2',
    7 => '#fcc30b', 8 => '#a21942', 9 => '#fd6925', 10 => '#dd1367', 11 => '#fd9d24', 12 => '#bf8b2e',
    13 => '#3f7e44', 14 => '#0a97d9', 15 => '#56c02b', 16 => '#00689d', 17 => '#19486a',
];

/* ------------------------------------------------------------------ *
 *  Formatting helpers
 * ------------------------------------------------------------------ */

/** HTML-escape anything (arrays/objects are JSON-encoded first). */
function report_e($value): string
{
    if (is_array($value) || is_object($value)) {
        $value = json_encode($value);
    }
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Float -> short, locale-proof string for SVG attributes. */
function report_f(float $n): string
{
    return rtrim(rtrim(number_format($n, 2, '.', ''), '0'), '.');
}

function report_trim_dec(float $v, int $decimals = 1): string
{
    $s = number_format($v, $decimals, '.', '');
    return str_contains($s, '.') ? rtrim(rtrim($s, '0'), '.') : $s;
}

/** 1,250 -> "1,250"; 12,500 -> "12.5K"; 3,400,000 -> "3.4M". */
function report_compact(float $v): string
{
    $a = abs($v);
    if ($a >= 1e9) return report_trim_dec($v / 1e9) . 'B';
    if ($a >= 1e6) return report_trim_dec($v / 1e6) . 'M';
    if ($a >= 1e4) return report_trim_dec($v / 1e3) . 'K';
    if ($a >= 1e3) return number_format($v, 0);
    return report_trim_dec($v);
}

/** KPI number: thousands separators, 0 decimals for whole numbers, else 2. */
function report_kpi_value($value, string $suffix = ''): string
{
    if ($value === null || $value === '' || !is_numeric($value)) {
        return '—';
    }
    $n = (float)$value;
    $decimals = abs($n - round($n)) < 0.005 ? 0 : 2;
    return number_format($n, $decimals, '.', ',') . $suffix;
}

/** Shorten long prose at a sentence/word boundary. */
function report_excerpt(string $text, int $max = 620): string
{
    $text = trim((string)preg_replace('/\s+/u', ' ', strip_tags($text)));
    if (mb_strlen($text, 'UTF-8') <= $max) {
        return $text;
    }
    $cut = mb_substr($text, 0, $max, 'UTF-8');
    $lastStop = max(
        (int)mb_strrpos($cut, '. ', 0, 'UTF-8'),
        (int)mb_strrpos($cut, '! ', 0, 'UTF-8'),
        (int)mb_strrpos($cut, '? ', 0, 'UTF-8')
    );
    if ($lastStop > $max * 0.55) {
        return mb_substr($cut, 0, $lastStop + 1, 'UTF-8');
    }
    $lastSpace = (int)mb_strrpos($cut, ' ', 0, 'UTF-8');
    return rtrim(mb_substr($cut, 0, $lastSpace ?: $max, 'UTF-8'), ' ,;:-') . '…';
}

/** Truncate a label to roughly fit $px pixels at $fontSize (ASCII ellipsis for SVG). */
function report_fit(string $text, float $px, float $fontSize): string
{
    $text = trim($text);
    $max = max(4, (int)floor($px / ($fontSize * 0.6)));
    if (mb_strlen($text, 'UTF-8') <= $max) {
        return $text;
    }
    return rtrim(mb_substr($text, 0, $max - 3, 'UTF-8')) . '...';
}

/* ------------------------------------------------------------------ *
 *  Data helpers
 * ------------------------------------------------------------------ */

function report_has_values(array $values): bool
{
    foreach ($values as $v) {
        if ($v !== null && $v !== '' && is_numeric($v)) return true;
    }
    return false;
}

/** ['pub_2010' => 12, ...] -> [12, ...] in $years order (null when missing). */
function report_year_values(array $row, string $prefix, array $years): array
{
    $out = [];
    foreach ($years as $year) {
        $v = $row[$prefix . $year] ?? null;
        $out[] = is_numeric($v) ? (float)$v : null;
    }
    return $out;
}

function report_values_from_rows(array $rows, string $key): array
{
    return array_map(
        fn($r) => is_array($r) && isset($r[$key]) && is_numeric($r[$key]) ? (float)$r[$key] : null,
        array_values($rows)
    );
}

function report_labels_from_rows(array $rows, string $key = 'year'): array
{
    return array_map(fn($r) => (string)(is_array($r) ? ($r[$key] ?? '') : ''), array_values($rows));
}

/** Drops empty series and guarantees every remaining series has a colour. */
function report_valid_series(array $series): array
{
    $out = [];
    $i = 0;
    foreach ($series as $s) {
        $vals = array_values($s['values'] ?? []);
        if (!report_has_values($vals)) continue;
        $s['values'] = $vals;
        $s['color'] = $s['color'] ?? REPORT_PALETTE[$i % count(REPORT_PALETTE)];
        $out[] = $s;
        $i++;
    }
    return $out;
}

/** True when each year's series add up to ~100 (i.e. they are shares of a whole). */
function report_is_composition(array $series, float $tolerance = 3.0): bool
{
    $series = report_valid_series($series);
    if (!$series) return false;
    $n = max(array_map(fn($s) => count($s['values']), $series));
    $checked = 0;
    for ($i = 0; $i < $n; $i++) {
        $sum = 0.0;
        $any = false;
        foreach ($series as $s) {
            $v = $s['values'][$i] ?? null;
            if (is_numeric($v)) {
                $sum += (float)$v;
                $any = true;
            }
        }
        if ($any) {
            $checked++;
            if (abs($sum - 100) > $tolerance) return false;
        }
    }
    return $checked > 0;
}

/* ------------------------------------------------------------------ *
 *  SVG plumbing
 * ------------------------------------------------------------------ */

function report_svg_open(int $w, int $h): string
{
    return '<svg xmlns="http://www.w3.org/2000/svg" width="' . $w . '" height="' . $h . '" viewBox="0 0 ' . $w . ' ' . $h
        . '" font-family="Helvetica, Arial, sans-serif">';
}

function report_svg_image(string $svg, int $w, int $h, string $alt): string
{
    return '<img class="chart-image" width="' . $w . '" height="' . $h . '" alt="' . report_e($alt)
        . '" src="data:image/svg+xml;base64,' . base64_encode($svg) . '">';
}

function report_chart_empty(string $message = 'Data for this chart is not available in the source dataset.'): string
{
    return '<div class="chart-empty">' . report_e($message) . '</div>';
}

/** "Nice" axis bounds: returns [min, max, step]. */
function report_nice_scale(float $min, float $max, int $ticks = 4): array
{
    if ($max <= $min) $max = $min + 1;
    $rough = ($max - $min) / $ticks;
    $pow = 10 ** floor(log10($rough));
    $frac = $rough / $pow;
    $nice = $frac <= 1 ? 1 : ($frac <= 2 ? 2 : ($frac <= 2.5 ? 2.5 : ($frac <= 5 ? 5 : 10)));
    $step = $nice * $pow;
    return [floor($min / $step) * $step, ceil($max / $step) * $step, $step];
}

function report_scale(array $values, bool $percent = false): array
{
    $nums = array_map('floatval', array_values(array_filter($values, 'is_numeric')));
    if (!$nums) return [0.0, 1.0, 0.25];
    if ($percent && max($nums) <= 100) return [0.0, 100.0, 25.0];
    return report_nice_scale(min(0.0, min($nums)), max($nums), 4);
}

/** Horizontal gridlines + y-axis labels. */
function report_svg_grid(float $min, float $max, float $step, int $left, int $top, int $plotW, int $plotH, bool $percent): string
{
    $range = $max - $min;
    $count = max(1, (int)round($range / $step));
    $svg = '';
    for ($i = 0; $i <= $count; $i++) {
        $v = $min + $step * $i;
        $y = $top + $plotH - (($v - $min) / $range) * $plotH;
        $svg .= '<line x1="' . $left . '" y1="' . report_f($y) . '" x2="' . ($left + $plotW) . '" y2="' . report_f($y)
            . '" stroke="' . ($i === 0 ? '#b6c2d1' : '#e6ebf2') . '" stroke-width="1"/>';
        $svg .= '<text x="' . ($left - 6) . '" y="' . report_f($y + 3) . '" text-anchor="end" font-size="9" fill="#64748b">'
            . report_e(report_compact($v)) . ($percent ? '%' : '') . '</text>';
    }
    return $svg;
}

/* ------------------------------------------------------------------ *
 *  Charts
 * ------------------------------------------------------------------ */

/** Single-series column chart with value labels. */
function report_column_chart(
    array $labels, array $values, string $color,
    int   $w = 480, int $h = 200, string $alt = 'Column chart', bool $percent = false
): string
{
    if (!$labels || !report_has_values($values)) return report_chart_empty();

    [$min, $max, $step] = report_scale($values, $percent);
    $range = $max - $min;
    $left = 46;
    $right = 8;
    $top = 20;
    $bottom = 24;
    $plotW = $w - $left - $right;
    $plotH = $h - $top - $bottom;
    $n = count($labels);
    $slot = $plotW / $n;
    $barW = min(36.0, $slot * 0.6);
    $yf = fn(float $v): float => $top + $plotH - (($v - $min) / $range) * $plotH;
    $y0 = $yf(max($min, 0.0));

    $svg = report_svg_open($w, $h) . report_svg_grid($min, $max, $step, $left, $top, $plotW, $plotH, $percent);

    foreach (array_values($labels) as $i => $label) {
        $cx = $left + $slot * ($i + 0.5);
        $v = $values[$i] ?? null;
        if (is_numeric($v)) {
            $v = (float)$v;
            $yv = $yf($v);
            $by = min($yv, $y0);
            $bh = max(1.0, abs($y0 - $yv));
            $svg .= '<rect x="' . report_f($cx - $barW / 2) . '" y="' . report_f($by) . '" width="' . report_f($barW)
                . '" height="' . report_f($bh) . '" rx="2" fill="' . $color . '"/>';
            if ($n <= 12) {
                $svg .= '<text x="' . report_f($cx) . '" y="' . report_f($by - 4) . '" text-anchor="middle" font-size="8" fill="#334155">'
                    . report_e(report_compact($v)) . ($percent ? '%' : '') . '</text>';
            }
        }
        if ($n <= 12 || $i % 2 === 0) {
            $svg .= '<text x="' . report_f($cx) . '" y="' . ($h - 8) . '" text-anchor="middle" font-size="9" fill="#64748b">'
                . report_e((string)$label) . '</text>';
        }
    }

    return report_svg_image($svg . '</svg>', $w, $h, $alt);
}

/** Multi-series line chart. Single-series charts get value labels (and optional area fill). */
function report_line_chart(
    array $labels, array $series,
    int   $w = 480, int $h = 200, string $alt = 'Line chart', bool $percent = false, bool $area = false
): string
{
    $series = report_valid_series($series);
    if (!$labels || !$series) return report_chart_empty();

    $all = [];
    foreach ($series as $s) {
        foreach ($s['values'] as $v) if (is_numeric($v)) $all[] = (float)$v;
    }
    [$min, $max, $step] = report_scale($all, $percent);
    $range = $max - $min;
    $left = 46;
    $right = 14;
    $top = 20;
    $bottom = 24;
    $plotW = $w - $left - $right;
    $plotH = $h - $top - $bottom;
    $n = count($labels);
    $slot = $plotW / $n;
    $xf = fn(int $i): float => $left + $slot * ($i + 0.5);
    $yf = fn(float $v): float => $top + $plotH - (($v - $min) / $range) * $plotH;
    $yBase = $yf(max($min, 0.0));
    $single = count($series) === 1;

    $svg = report_svg_open($w, $h) . report_svg_grid($min, $max, $step, $left, $top, $plotW, $plotH, $percent);

    foreach (array_values($labels) as $i => $label) {
        if ($n <= 12 || $i % 2 === 0) {
            $svg .= '<text x="' . report_f($xf($i)) . '" y="' . ($h - 8) . '" text-anchor="middle" font-size="9" fill="#64748b">'
                . report_e((string)$label) . '</text>';
        }
    }

    foreach ($series as $s) {
        $color = $s['color'];
        $segments = [];
        $current = [];
        foreach ($labels as $i => $_) {
            $v = $s['values'][$i] ?? null;
            if (!is_numeric($v)) {
                if ($current) $segments[] = $current;
                $current = [];
                continue;
            }
            $current[] = [$xf($i), $yf((float)$v), (float)$v];
        }
        if ($current) $segments[] = $current;

        foreach ($segments as $seg) {
            if ($area && $single && count($seg) > 1) {
                $pts = array_map(fn($p) => report_f($p[0]) . ',' . report_f($p[1]), $seg);
                $pts[] = report_f(end($seg)[0]) . ',' . report_f($yBase);
                $pts[] = report_f($seg[0][0]) . ',' . report_f($yBase);
                $svg .= '<polygon points="' . implode(' ', $pts) . '" fill="' . $color . '" fill-opacity="0.12" stroke="none"/>';
            }
            if (count($seg) > 1) {
                $svg .= '<polyline fill="none" stroke="' . $color . '" stroke-width="2.4" stroke-linejoin="round" stroke-linecap="round" points="'
                    . implode(' ', array_map(fn($p) => report_f($p[0]) . ',' . report_f($p[1]), $seg)) . '"/>';
            }
            foreach ($seg as $p) {
                $svg .= '<circle cx="' . report_f($p[0]) . '" cy="' . report_f($p[1]) . '" r="3" fill="#ffffff" stroke="' . $color . '" stroke-width="1.8"/>';
                if ($single && $n <= 12) {
                    $svg .= '<text x="' . report_f($p[0]) . '" y="' . report_f($p[1] - 8) . '" text-anchor="middle" font-size="8" fill="#334155">'
                        . report_e(report_compact($p[2])) . ($percent ? '%' : '') . '</text>';
                }
            }
        }
    }

    return report_svg_image($svg . '</svg>', $w, $h, $alt);
}

/** Stacked columns. $percent = true pins the axis to 0-100 and labels segments with %. */
function report_stacked_chart(
    array $labels, array $series,
    int   $w = 480, int $h = 200, string $alt = 'Stacked chart', bool $percent = false
): string
{
    $series = report_valid_series($series);
    if (!$labels || !$series) return report_chart_empty();

    $n = count($labels);
    $totals = [];
    for ($i = 0; $i < $n; $i++) {
        $sum = 0.0;
        foreach ($series as $s) {
            $v = $s['values'][$i] ?? null;
            if (is_numeric($v) && $v > 0) $sum += (float)$v;
        }
        $totals[] = $sum;
    }
    [$min, $max, $step] = report_scale($totals, $percent);
    $range = $max - $min;
    $left = 46;
    $right = 8;
    $top = 20;
    $bottom = 24;
    $plotW = $w - $left - $right;
    $plotH = $h - $top - $bottom;
    $slot = $plotW / $n;
    $barW = min(40.0, $slot * 0.62);
    $yf = fn(float $v): float => $top + $plotH - (min($v, $max) - $min) / $range * $plotH;

    $svg = report_svg_open($w, $h) . report_svg_grid($min, $max, $step, $left, $top, $plotW, $plotH, $percent);

    foreach (array_values($labels) as $i => $label) {
        $cx = $left + $slot * ($i + 0.5);
        $acc = 0.0;
        foreach ($series as $s) {
            $v = $s['values'][$i] ?? null;
            if (!is_numeric($v) || $v <= 0) continue;
            $v = (float)$v;
            $yTop = $yf($acc + $v);
            $yBot = $yf($acc);
            $segH = max(0.5, $yBot - $yTop);
            $svg .= '<rect x="' . report_f($cx - $barW / 2) . '" y="' . report_f($yTop) . '" width="' . report_f($barW)
                . '" height="' . report_f($segH) . '" fill="' . $s['color'] . '" stroke="#ffffff" stroke-width="0.6"/>';
            if ($segH >= 13 && $barW >= 22 && $n <= 12) {
                $svg .= '<text x="' . report_f($cx) . '" y="' . report_f($yTop + $segH / 2 + 3) . '" text-anchor="middle" font-size="8" fill="#ffffff">'
                    . report_e($percent ? (string)round($v) . '%' : report_compact($v)) . '</text>';
            }
            $acc += $v;
        }
        if (!$percent && $totals[$i] > 0 && $n <= 12) {
            $svg .= '<text x="' . report_f($cx) . '" y="' . report_f($yf($totals[$i]) - 4) . '" text-anchor="middle" font-size="8" fill="#334155">'
                . report_e(report_compact($totals[$i])) . '</text>';
        }
        if ($n <= 12 || $i % 2 === 0) {
            $svg .= '<text x="' . report_f($cx) . '" y="' . ($h - 8) . '" text-anchor="middle" font-size="9" fill="#64748b">'
                . report_e((string)$label) . '</text>';
        }
    }

    return report_svg_image($svg . '</svg>', $w, $h, $alt);
}

/** Shares of a whole -> stacked 100% columns; otherwise falls back to percent lines. */
function report_composition_chart(array $labels, array $series, int $w, int $h, string $alt): string
{
    $series = report_valid_series($series);
    return report_is_composition($series)
        ? report_stacked_chart($labels, $series, $w, $h, $alt, true)
        : report_line_chart($labels, $series, $w, $h, $alt, true);
}

/**
 * Ranked horizontal bars. $rows = [['label' => ..., 'value' => ..., 'color' => optional], ...]
 */
function report_hbar_chart(
    array $rows, int $w = 480, string $alt = 'Bar chart', string $color = '#2f6fdd',
    int   $labelW = 190, int $rowH = 22, float $fontSize = 9.0
): string
{
    $rows = array_values(array_filter($rows, fn($r) => isset($r['value']) && is_numeric($r['value'])));
    if (!$rows) return report_chart_empty();

    $h = count($rows) * $rowH + 6;
    $max = max(array_map(fn($r) => (float)$r['value'], $rows));
    if ($max <= 0) $max = 1;
    $valueW = 52;
    $barMax = $w - $labelW - $valueW;
    $barH = 12;

    $svg = report_svg_open($w, $h);
    foreach ($rows as $i => $row) {
        $mid = 3 + $i * $rowH + $rowH / 2;
        $value = (float)$row['value'];
        $barW = max(2.0, $barMax * $value / $max);
        $fill = $row['color'] ?? $color;
        $svg .= '<text x="0" y="' . report_f($mid + 3) . '" font-size="' . report_f($fontSize) . '" fill="#334155">'
            . report_e(report_fit((string)$row['label'], $labelW - 10, $fontSize)) . '</text>';
        $svg .= '<rect x="' . $labelW . '" y="' . report_f($mid - $barH / 2) . '" width="' . $barMax . '" height="' . $barH . '" rx="3" fill="#eef2f7"/>';
        $svg .= '<rect x="' . $labelW . '" y="' . report_f($mid - $barH / 2) . '" width="' . report_f($barW) . '" height="' . $barH . '" rx="3" fill="' . $fill . '"/>';
        $svg .= '<text x="' . report_f($labelW + $barW + 5) . '" y="' . report_f($mid + 3) . '" font-size="' . report_f($fontSize) . '" fill="#10264a">'
            . report_e(report_compact($value)) . '</text>';
    }

    return report_svg_image($svg . '</svg>', $w, $h, $alt);
}

/** Radar chart for 3+ categories. */
function report_radar_chart(array $labels, array $values, int $w = 480, int $h = 290, string $alt = 'Radar chart'): string
{
    $pairs = [];
    foreach (array_values($labels) as $i => $label) {
        $v = $values[$i] ?? null;
        if (is_numeric($v)) $pairs[] = ['label' => (string)$label, 'value' => (float)$v];
    }
    $pairs = array_slice($pairs, 0, 10);
    if (count($pairs) < 3) return report_chart_empty('At least three subject areas are needed for a radar chart.');

    $n = count($pairs);
    $max = max(array_column($pairs, 'value'));
    if ($max <= 0) $max = 1;
    $cx = $w / 2;
    $cy = $h / 2 + 2;
    $r = min(96.0, $h / 2 - 34);
    $point = fn(int $i, float $radius): array => [
        $cx + cos(-M_PI / 2 + 2 * M_PI * $i / $n) * $radius,
        $cy + sin(-M_PI / 2 + 2 * M_PI * $i / $n) * $radius,
    ];

    $svg = report_svg_open($w, $h);
    for ($ring = 4; $ring >= 1; $ring--) {
        $pts = [];
        for ($i = 0; $i < $n; $i++) {
            [$x, $y] = $point($i, $r * $ring / 4);
            $pts[] = report_f($x) . ',' . report_f($y);
        }
        $svg .= '<polygon points="' . implode(' ', $pts) . '" fill="' . ($ring % 2 === 0 ? '#f6f9fc' : '#ffffff') . '" stroke="#dbe4ef" stroke-width="1"/>';
    }
    for ($i = 0; $i < $n; $i++) {
        [$x, $y] = $point($i, $r);
        $svg .= '<line x1="' . report_f($cx) . '" y1="' . report_f($cy) . '" x2="' . report_f($x) . '" y2="' . report_f($y) . '" stroke="#dbe4ef" stroke-width="1"/>';
    }

    $dataPts = [];
    foreach ($pairs as $i => $pair) {
        [$x, $y] = $point($i, $r * $pair['value'] / $max);
        $dataPts[] = [$x, $y];
    }
    $svg .= '<polygon points="' . implode(' ', array_map(fn($p) => report_f($p[0]) . ',' . report_f($p[1]), $dataPts))
        . '" fill="#2f6fdd" fill-opacity="0.22" stroke="#2f6fdd" stroke-width="2"/>';
    foreach ($dataPts as $p) {
        $svg .= '<circle cx="' . report_f($p[0]) . '" cy="' . report_f($p[1]) . '" r="3" fill="#2f6fdd"/>';
    }

    foreach ($pairs as $i => $pair) {
        $angle = -M_PI / 2 + 2 * M_PI * $i / $n;
        [$lx, $ly] = $point($i, $r + 12);
        $anchor = cos($angle) > 0.25 ? 'start' : (cos($angle) < -0.25 ? 'end' : 'middle');
        $svg .= '<text x="' . report_f($lx) . '" y="' . report_f($ly + 3) . '" text-anchor="' . $anchor . '" font-size="9" fill="#334155">'
            . report_e(report_fit($pair['label'], 130, 9.0)) . '</text>';
    }

    return report_svg_image($svg . '</svg>', $w, $h, $alt);
}

/* ------------------------------------------------------------------ *
 *  HTML building blocks
 * ------------------------------------------------------------------ */

/** Colour swatch legend, rendered as HTML so it wraps cleanly. */
function report_legend(array $items): string
{
    $html = '';
    foreach ($items as $item) {
        $color = preg_match('/^#[0-9a-f]{3,8}$/i', (string)($item['color'] ?? '')) ? $item['color'] : '#64748b';
        $html .= '<span class="lg"><span class="sw" style="background:' . $color . '"></span>' . report_e($item['label'] ?? '') . '</span> ';
    }
    return $html === '' ? '' : '<div class="legend">' . $html . '</div>';
}

function report_chart_panel(string $title, string $chart, string $note = '', array $legend = []): string
{
    return '<div class="chart-panel"><h3>' . report_e($title) . '</h3>'
        . report_legend($legend) . $chart
        . ($note !== '' ? '<div class="chart-note">' . report_e($note) . '</div>' : '')
        . '</div>';
}

function report_section(string $title, string $subtitle = '', string $class = ''): string
{
    return '<div class="section' . ($class !== '' ? ' ' . report_e($class) : '') . '"><div class="section-title">' . report_e($title) . '</div>'
        . ($subtitle !== '' ? '<div class="section-sub">' . report_e($subtitle) . '</div>' : '')
        . '</div>';
}