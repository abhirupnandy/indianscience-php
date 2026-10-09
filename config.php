<?php

/**
 * config.php
 * Loads .env, opens the single shared $pdo connection, defines site
 * constants, and pulls in helper functions. Included once by index.php.
 */

declare(strict_types=1);

/** Minimal .env loader — no external dependency needed. */
function load_env(string $path): void
{
    if (! file_exists($path)) {
        return;
    }
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
            continue;
        }
        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value, " \t\n\r\0\x0B\"'");
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

load_env(__DIR__.'/.env');

define('APP_ENV', getenv('APP_ENV') ?: 'production');
error_reporting(E_ALL);
ini_set('display_errors', APP_ENV === 'production' ? '0' : '1');

const SITE_NAME = 'Indian Science Reports';
const SITE_DESCRIPTION = 'An online portal to showcase the research growth of India and various Indian institutions.';
define('SITE_URL', rtrim(getenv('SITE_URL') ?: '', '/'));

const ROOT_PATH = __DIR__;

// --- Database ------------------------------------------------------------
try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            getenv('DB_HOST') ?: '127.0.0.1',
            getenv('DB_NAME') ?: 'indianscience',
        ),
        getenv('DB_USER') ?: 'root',
        getenv('DB_PASS') ?: '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ],
    );
} catch (PDOException $e) {
    // Never leak credentials/DSN details to visitors.
    http_response_code(500);
    if (APP_ENV !== 'production') {
        exit('Database connection failed: '.$e->getMessage());
    }
    exit('Sorry, something went wrong. Please try again later.');
}

require_once ROOT_PATH.'/includes/functions.php';
