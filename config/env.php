<?php
/**
 * Zersoft Technology — Hafif .env Yükleyici (Composer Gerektirmez)
 * cPanel / Shared Hosting Uyumlu
 */

function loadEnv(string $envFile): void {
    if (!file_exists($envFile)) {
        return;
    }

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        // Yorum satırları ve boş satırları atla
        if (empty($line) || str_starts_with($line, '#')) {
            continue;
        }

        // KEY=VALUE formatını ayrıştır
        if (!str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);

        $key   = trim($key);
        $value = trim($value);

        // Tırnak işaretlerini temizle
        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))
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
 */
function env(string $key, mixed $default = null): mixed {
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

    if ($value === false) {
        return $default;
    }

    // Boolean dönüşümü
    return match(strtolower((string)$value)) {
        'true', '1', 'yes', 'on'  => true,
        'false', '0', 'no', 'off' => false,
        'null', ''                 => null,
        default                    => $value,
    };
}

// .env Dosyasını Yükle
loadEnv(__DIR__ . '/../.env');
