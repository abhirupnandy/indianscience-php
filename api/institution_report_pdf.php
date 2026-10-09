<?php

declare(strict_types=1);
use Dompdf\Dompdf;
use Dompdf\Options;

require_once __DIR__.'/../config.php';

header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'Use POST to generate a report.'], JSON_THROW_ON_ERROR);
    exit;
}

$autoload = __DIR__.'/../vendor/autoload.php';
if (! is_file($autoload)) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'PDF engine is not installed. Run: composer require dompdf/dompdf'], JSON_THROW_ON_ERROR);
    exit;
}
require_once $autoload;

$raw = file_get_contents('php://input');
$request = json_decode($raw ?: '', true, 512, JSON_THROW_ON_ERROR);
$reportData = $request['data'] ?? null;

if (! is_array($reportData) || ! is_array($reportData['institution'] ?? null)) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'The institution API data is missing or invalid.'], JSON_THROW_ON_ERROR);
    exit;
}

try {
    $options = new Options;
    $options->set('isRemoteEnabled', false);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('defaultFont', 'DejaVu Sans');

    $dompdf = new Dompdf($options);
    ob_start();
    require __DIR__.'/../templates/institution-report-template.php';
    $html = (string) ob_get_clean();

    $dompdf->loadHtml($html, 'UTF-8');
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    $name = (string) ($reportData['institution']['name'] ?? 'institution');
    $filename = strtolower(trim((string) preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
    if ($filename === '') {
        $filename = 'institution';
    }

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$filename.'-research-profile.pdf"');
    header('Cache-Control: private, no-store, max-age=0');
    echo $dompdf->output();
} catch (Throwable $e) {
    error_log('Institution PDF generation failed: '.$e->getMessage());
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'PDF generation failed. Check the PHP error log.'], JSON_THROW_ON_ERROR);
}
