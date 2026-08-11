<?php
/**
 * Zersoft Technology - Veritabanı Yapılandırması ve Bağlantı Yöneticisi
 * cPanel MySQL / MariaDB Uyumlu (Otomatik Esnek Bağlantı)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// MySQL Veritabanı Ayarları (cPanel için burayı güncelleyin)
define('DB_HOST', 'localhost');
define('DB_NAME', 'zersoft_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

function getDBConnection() {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        // 1. Öncelik: MySQL / MariaDB Bağlantısı Denemesi
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // 2. Öncelik: Eğer MySQL henüz kurulmadıysa yerel test için SQLite Fallback
        try {
            $dbPath = __DIR__ . '/zersoft_local.sqlite';
            $isNew = !file_exists($dbPath);
            
            $pdo = new PDO("sqlite:" . $dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            if ($isNew) {
                // SQLite için şema kurulumunu yap
                autoInitSQLite($pdo);
            }
            return $pdo;
        } catch (PDOException $sqliteEx) {
            die("Veritabanı Bağlantı Hatası: " . $e->getMessage());
        }
    }
}

/**
 * Yerel test ortamı için otomatik SQLite veritabanı ilklendirmesi
 */
function autoInitSQLite($pdo) {
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

// Bağlantıyı başlat
$db = getDBConnection();
