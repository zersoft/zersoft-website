<?php
/**
 * Zersoft Technology — Hafif .env Yükleyici (Composer Gerektirmez)
 * cPanel / Shared Hosting Uyumlu — PHP 7.1+ Uyumlu
 */

function loadEnv($envFile) {
    if (!file_exists($envFile)) {
        return;
    }

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        // Yorum satırları ve boş satırları atla
        if (empty($line) || substr($line, 0, 1) === '#') {
            continue;
        }

        // KEY=VALUE formatını ayrıştır
        if (strpos($line, '=') === false) {
            continue;
        }

        $parts = explode('=', $line, 2);
        $key   = trim($parts[0]);
        $value = trim($parts[1]);

        // Tırnak işaretlerini temizle
        if (
            (substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
            (substr($value, 0, 1) === "'" && substr($value, -1) === "'")
        ) {
            $value = substr($value, 1, -1);
        }

        // Zaten tanımlı değilse ekle
        if (!isset($_ENV[$key]) && !isset($_SERVER[$key])) {
            $_ENV[$key]    = $value;
            $_SERVER[$key] = $value;
            putenv("$key=$value");
        }
    }
}

/**
 * Ortam değişkenini oku, yoksa varsayılan değer döndür
 * PHP 7.1+ Uyumlu
 */
function env($key, $default = null) {
    $value = isset($_ENV[$key]) ? $_ENV[$key] : (isset($_SERVER[$key]) ? $_SERVER[$key] : getenv($key));

    if ($value === false) {
        return $default;
    }

    // Boolean dönüşümü
    switch (strtolower((string)$value)) {
        case 'true':
        case '1':
        case 'yes':
        case 'on':
            return true;
        case 'false':
        case '0':
        case 'no':
        case 'off':
            return false;
        case 'null':
        case '':
            return null;
        default:
            return $value;
    }
}

// .env Dosyasını Yükle
loadEnv(__DIR__ . '/../.env');
