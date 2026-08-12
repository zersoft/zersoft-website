<?php
/**
 * Zersoft Technology — Veritabanı Yapılandırması & Bağlantı Yöneticisi
 * cPanel MySQL / MariaDB Uyumlu | .env Tabanlı Güvenli Yapılandırma
 */

// .env dosyasını yükle
require_once __DIR__ . '/env.php';

// Oturum güvenlik ayarları (.env tabanlı)
if (session_status() === PHP_SESSION_NONE) {
    $sessionSecure  = env('SESSION_SECURE', true);
    $sessionHttp    = env('SESSION_HTTPONLY', true);
    $sessionLife    = (int)env('ADMIN_SESSION_LIFETIME', 3600);

    session_set_cookie_params([
        'lifetime' => $sessionLife,
        'path'     => '/',
        'secure'   => $sessionSecure,
        'httponly' => $sessionHttp,
        'samesite' => 'Strict',
    ]);
    session_start();
}

/**
 * Veritabanı Bağlantısı (PDO)
 * 1. Öncelik: .env → MySQL / MariaDB (cPanel üretim)
 * 2. Öncelik: MySQL bağlantısı başarısız olursa SQLite (yerel geliştirme)
 */
function getDBConnection(): PDO {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $host    = env('DB_HOST', 'localhost');
    $dbName  = env('DB_NAME', '');
    $dbUser  = env('DB_USER', '');
    $dbPass  = env('DB_PASS', '');
    $charset = env('DB_CHARSET', 'utf8mb4');

    try {
        // MySQL / MariaDB Bağlantısı
        $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        // Yerel geliştirme: SQLite Fallback
        try {
            $dbPath = __DIR__ . '/zersoft_local.sqlite';
            $isNew  = !file_exists($dbPath);

            $pdo = new PDO("sqlite:$dbPath");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            if ($isNew) {
                autoInitSQLite($pdo);
            }
            return $pdo;
        } catch (PDOException $sqliteEx) {
            $appDebug = env('APP_DEBUG', false);
            $msg = $appDebug
                ? 'Veritabanı Bağlantı Hatası: ' . $e->getMessage()
                : 'Veritabanı bağlantısı kurulamadı. Lütfen sistem yöneticinize başvurun.';
            die($msg);
        }
    }
}

/**
 * Yerel test ortamı için otomatik SQLite veritabanı ilklendirmesi
 */
function autoInitSQLite(PDO $pdo): void {
    $sqlFile = __DIR__ . '/../database.sql';
    if (!file_exists($sqlFile)) return;

    $sql = file_get_contents($sqlFile);
    // Yorum satırlarını temizle
    $sql = preg_replace('/--.*$/m', '', $sql);
    // MySQL spesifik kalıpları SQLite uyumlu hale getir
    $sql = preg_replace('/SET\s+[^;]+;/i', '', $sql);
    $sql = preg_replace('/START\s+TRANSACTION;/i', '', $sql);
    $sql = preg_replace('/COMMIT;/i', '', $sql);
    $sql = str_replace('ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci', '', $sql);
    $sql = str_replace('INT AUTO_INCREMENT PRIMARY KEY', 'INTEGER PRIMARY KEY AUTOINCREMENT', $sql);
    $sql = str_replace('DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', 'DATETIME DEFAULT CURRENT_TIMESTAMP', $sql);
    $sql = preg_replace('/ON DUPLICATE KEY UPDATE[^\n;]*/i', '', $sql);
    $sql = str_replace('REPLACE INTO', 'INSERT OR REPLACE INTO', $sql);

    try {
        $pdo->exec($sql);
    } catch (Exception $ex) {
        error_log("SQLite autoInit Error: " . $ex->getMessage());
    }
}


// Veritabanı bağlantısını başlat
$db = getDBConnection();

