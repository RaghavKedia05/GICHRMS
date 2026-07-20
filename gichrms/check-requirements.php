<?php

/**
 * Portable, dependency-free setup check for a fresh GICHRMS clone.
 *
 * Run with: php check-requirements.php
 */

const MINIMUM_PHP_VERSION = '8.2.0';

$errors = [];
$warnings = [];
$root = __DIR__;

echo "GICHRMS setup check\n";
echo "PHP " . PHP_VERSION . " (" . PHP_BINARY . ")\n\n";

if (version_compare(PHP_VERSION, MINIMUM_PHP_VERSION, '<')) {
    $errors[] = 'PHP 8.2 or newer is required.';
}

$requiredExtensions = ['curl', 'fileinfo', 'intl', 'json', 'mbstring', 'mysqli'];
foreach ($requiredExtensions as $extension) {
    if (! extension_loaded($extension)) {
        $errors[] = "Missing PHP extension: {$extension}";
    }
}

foreach (['writable', 'writable/cache', 'writable/logs', 'writable/session', 'writable/uploads'] as $directory) {
    $path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $directory);
    if (! is_dir($path)) {
        $errors[] = "Missing directory: {$directory}";
    } elseif (! is_writable($path)) {
        $errors[] = "Directory is not writable: {$directory}";
    }
}

$envFile = $root . DIRECTORY_SEPARATOR . '.env';
if (! is_file($envFile)) {
    $errors[] = 'Missing .env file. Copy env to .env, then enter the local database settings.';
} else {
    $environment = [];
    foreach (file($envFile, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = array_map('trim', explode('=', $line, 2));
        $environment[$key] = trim($value, " \t\n\r\0\x0B'\"");
    }

    if ($environment === []) {
        $errors[] = 'The .env file does not contain readable settings.';
    } else {
        $database = [
            'hostname' => trim((string) ($environment['database.default.hostname'] ?? 'localhost'), " \t\n\r\0\x0B'\""),
            'username' => trim((string) ($environment['database.default.username'] ?? ''), " \t\n\r\0\x0B'\""),
            'password' => trim((string) ($environment['database.default.password'] ?? ''), " \t\n\r\0\x0B'\""),
            'database' => trim((string) ($environment['database.default.database'] ?? ''), " \t\n\r\0\x0B'\""),
            'port' => (int) trim((string) ($environment['database.default.port'] ?? '3306'), " \t\n\r\0\x0B'\""),
        ];

        if ($database['username'] === '' || $database['database'] === '') {
            $errors[] = 'Set database.default.username and database.default.database in .env.';
        } elseif (extension_loaded('mysqli')) {
            mysqli_report(MYSQLI_REPORT_OFF);
            $connection = @new mysqli(
                $database['hostname'],
                $database['username'],
                $database['password'],
                $database['database'],
                $database['port'] ?: 3306,
            );

            if ($connection->connect_errno !== 0) {
                $errors[] = 'Database connection failed. Check that MySQL is running, the database exists, and the .env credentials are correct. MySQL said: ' . $connection->connect_error;
            } else {
                echo "[OK] Connected to database '{$database['database']}'.\n";

                $grantResult = $connection->query('SHOW GRANTS FOR CURRENT_USER');
                $grants = [];
                while ($grantResult && ($row = $grantResult->fetch_row())) {
                    $grants[] = strtoupper((string) ($row[0] ?? ''));
                }
                $canCreateDatabases = array_filter($grants, static function (string $grant): bool {
                    return str_contains($grant, 'ALL PRIVILEGES ON *.*')
                        || (str_contains($grant, 'CREATE') && str_contains($grant, ' ON *.*'));
                }) !== [];

                if (!$canCreateDatabases) {
                    $errors[] = 'The MySQL user needs the global CREATE privilege so each new company can receive its own database.';
                } else {
                    echo "[OK] Database user can provision company databases.\n";
                }
                $connection->close();
            }
        }
    }
}

if (! is_file($root . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php')) {
    $errors[] = 'Composer dependencies are not installed. Run: composer install';
}

if ($warnings !== []) {
    echo "\nWarnings:\n- " . implode("\n- ", $warnings) . "\n";
}

if ($errors !== []) {
    echo "\nSetup is not ready:\n- " . implode("\n- ", $errors) . "\n";
    exit(1);
}

echo "\n[OK] This machine meets the application setup requirements.\n";
echo "Next: php spark migrate --all\n";
exit(0);
