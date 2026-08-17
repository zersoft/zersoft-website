<?php
/**
 * Zersoft — Sunucu Ortam Tanılama Dosyası
 * Sadece giriş yapmış yetkili adminler erişebilir.
 */
require_once __DIR__ . '/includes/functions.php';
requireLogin();

// Hataları göster
ini_set('display_errors', 0);
error_reporting(0);

echo "<style>body{font-family:monospace;background:#0d0d0d;color:#00ff88;padding:20px;}
h2{color:#00f2fe;} .ok{color:#00ff88;} .err{color:#ff4444;} .warn{color:#ffaa00;}
pre{background:#111;padding:10px;border-radius:6px;overflow:auto;}
</style>";

echo "<h2>🔍 Zersoft Sunucu Tanılama</h2>";

// 1. PHP Sürümü
$phpVersion = PHP_VERSION;
$phpOk = version_compare($phpVersion, '8.0.0', '>=');
echo "<p>" . ($phpOk ? '<span class="ok">✅</span>' : '<span class="err">❌</span>') . " PHP Sürümü: <strong>$phpVersion</strong>" . (!$phpOk ? ' <span class="err">(PHP 8.0+ gerekli!)</span>' : '') . "</p>";

// 2. .env Dosyası Varlığı
$envPath = __DIR__ . '/.env';
$envExists = file_exists($envPath);
echo "<p>" . ($envExists ? '<span class="ok">✅</span>' : '<span class="err">❌</span>') . " .env dosyası: <code>$envPath</code> — " . ($envExists ? '<span class="ok">MEVCUT</span>' : '<span class="err">BULUNAMADI! Sunucuya yüklenmemiş olabilir.</span>') . "</p>";

// 3. env.php Varlığı
$envPhpPath = __DIR__ . '/config/env.php';
$envPhpExists = file_exists($envPhpPath);
echo "<p>" . ($envPhpExists ? '<span class="ok">✅</span>' : '<span class="err">❌</span>') . " config/env.php: " . ($envPhpExists ? '<span class="ok">MEVCUT</span>' : '<span class="err">BULUNAMADI!</span>') . "</p>";

// 4. database.php Varlığı
$dbPhpPath = __DIR__ . '/config/database.php';
$dbPhpExists = file_exists($dbPhpPath);
echo "<p>" . ($dbPhpExists ? '<span class="ok">✅</span>' : '<span class="err">❌</span>') . " config/database.php: " . ($dbPhpExists ? '<span class="ok">MEVCUT</span>' : '<span class="err">BULUNAMADI!</span>') . "</p>";

// 5. .env İçeriğini Yükle ve Göster (şifreleri maskeliyoruz)
if ($envExists) {
    echo "<h2>📋 .env İçeriği (şifre maskelenmiş)</h2><pre>";
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (substr(trim($line), 0, 1) === '#') {
            echo "<span style='color:#555'>" . htmlspecialchars($line) . "</span>\n";
        } elseif (stripos($line, 'PASS') !== false || stripos($line, 'SECRET') !== false) {
            $parts = explode('=', $line, 2);
            echo htmlspecialchars($parts[0]) . "=<span class='warn'>***GIZLENDI***</span>\n";
        } else {
            echo htmlspecialchars($line) . "\n";
        }
    }
    echo "</pre>";
}

// 6. DB Bağlantı Testi
echo "<h2>🗄️ Veritabanı Bağlantı Testi</h2>";

if ($envExists && $envPhpExists) {
    try {
        require_once __DIR__ . '/config/env.php';
        
        $host    = $_ENV['DB_HOST'] ?? 'localhost';
        $dbName  = $_ENV['DB_NAME'] ?? '';
        $dbUser  = $_ENV['DB_USER'] ?? '';
        $dbPass  = $_ENV['DB_PASS'] ?? '';
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';
        
        echo "<p>Host: <strong>$host</strong> | DB: <strong>$dbName</strong> | User: <strong>$dbUser</strong></p>";
        
        $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";
        $pdo = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo "<p><span class='ok'>✅ MySQL bağlantısı BAŞARILI!</span></p>";
        
        // Tablo kontrolü
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        echo "<p>Mevcut tablolar: <strong>" . implode(', ', $tables) . "</strong></p>";
        
    } catch (PDOException $e) {
        echo "<p><span class='err'>❌ MySQL HATASI: " . htmlspecialchars($e->getMessage()) . "</span></p>";
    }
} else {
    echo "<p><span class='warn'>⚠️ .env veya config dosyaları eksik, test yapılamadı.</span></p>";
}

// 7. PDO Sürücüleri
echo "<h2>🔌 PDO Sürücüleri</h2>";
$drivers = PDO::getAvailableDrivers();
    echo "<p>" . implode(', ', array_map(function($d) use ($drivers) { return "<span class='" . (in_array($d, array('mysql','sqlite')) ? 'ok' : '') . "'>$d</span>"; }, $drivers)) . "</p>";

// 8. session_start testi
echo "<h2>🔐 Session Testi</h2>";
try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    echo "<p><span class='ok'>✅ Session başlatıldı. ID: " . session_id() . "</span></p>";
} catch (Throwable $e) {
    echo "<p><span class='err'>❌ Session Hatası: " . htmlspecialchars($e->getMessage()) . "</span></p>";
}

// 9. PHP Hata Logu
echo "<h2>📝 Son PHP Hataları (error_log)</h2>";
$logFile = ini_get('error_log');
echo "<p>error_log yolu: <code>" . ($logFile ?: 'Tanımlı değil') . "</code></p>";
if ($logFile && file_exists($logFile) && is_readable($logFile)) {
    $lines = array_slice(file($logFile), -20);
    echo "<pre style='color:#ffaa00;font-size:0.8rem'>" . htmlspecialchars(implode('', $lines)) . "</pre>";
} else {
    echo "<p><span class='warn'>⚠️ Log dosyasına erişilemiyor. cPanel > Error Logs'u kontrol edin.</span></p>";
}

echo "<hr><p style='color:#555;font-size:0.8rem'>⚠️ Bu dosyayı kullanımdan sonra sunucudan SİLİN!</p>";
?>
