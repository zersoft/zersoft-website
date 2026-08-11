<?php
/**
 * Zersoft Technology - Genel Yardımcı Fonksiyonlar ve Güvenlik Katmanı
 */

require_once __DIR__ . '/../config/database.php';

/**
 * XSS Temizleme Fonksiyonu
 */
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

/**
 * CSRF Token Oluşturma
 */
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * CSRF Token Doğrulama
 */
function verifyCSRFToken($token) {
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Kullanıcı Giriş Kontrolü
 */
function isLoggedIn() {
    return isset($_SESSION['admin_user_id']) && !empty($_SESSION['admin_user_id']);
}

/**
 * Admin Sayfaları İçin Giriş Zorunluluğu Koruması
 */
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

/**
 * Site Ayarlarını Getir
 */
function getSiteSettings() {
    global $db;
    $defaults = [
        'site_name'        => 'ZERSOFT Bilişim & Danışmanlık',
        'site_tagline'     => 'Dijital Dönüşümde Çözüm Ortağınız & Yapay Zeka Çözümleri',
        'meta_description' => 'Hafriyat Saha Kantar Otomasyonu, Katı Atık Kantar Otomasyonu, Maden Ocağı Kantar Programı, Yapay Zeka Destekli Özel Yazılım Geliştirme, Ön Muhasebe Uygulamaları ve Dijital Dönüşüm Hizmetleri.',
        'phone'            => '+90 (555) 587 93 70',
        'email'            => 'info@zersoft.net',
        'address'          => 'Osmangazi / BURSA',
        'working_hours'    => 'Pazartesi - Cuma: 09:00 - 18:00',
        'facebook'         => 'https://facebook.com/zersoftnet',
        'twitter'          => 'https://twitter.com/zersoftnet',
        'linkedin'         => 'https://linkedin.com/company/zersoft',
        'github'           => 'https://github.com/zersoft',
        'instagram'        => 'https://instagram.com/zersoftnet'
    ];

    try {
        $stmt = $db->query("SELECT * FROM site_settings WHERE id = 1 LIMIT 1");
        $settings = $stmt->fetch();
        if ($settings && is_array($settings)) {
            return array_merge($defaults, $settings);
        }
        return $defaults;
    } catch (Exception $e) {
        return $defaults;
    }
}

/**
 * Hizmetleri Getir
 */
function getServices($limit = null) {
    global $db;
    try {
        $sql = "SELECT * FROM services ORDER BY sort_order ASC, id ASC";
        if ($limit !== null) {
            $sql .= " LIMIT " . (int)$limit;
        }
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return [];
    }
}

/**
 * Yapay Zeka Çözümlerini Getir
 */
function getAISolutions($limit = null) {
    global $db;
    try {
        $sql = "SELECT * FROM ai_solutions ORDER BY sort_order ASC, id ASC";
        if ($limit !== null) {
            $sql .= " LIMIT " . (int)$limit;
        }
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return [];
    }
}

/**
 * Portföy Projelerini Getir
 */
function getProjects($limit = null) {
    global $db;
    try {
        $sql = "SELECT * FROM projects ORDER BY sort_order ASC, id DESC";
        if ($limit !== null) {
            $sql .= " LIMIT " . (int)$limit;
        }
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return [];
    }
}

/**
 * Okunmamış İletişim Mesaj Sayısını Getir
 */
function getUnreadMessagesCount() {
    global $db;
    try {
        $stmt = $db->query("SELECT COUNT(*) as cnt FROM messages WHERE status = 'unread'");
        $row = $stmt->fetch();
        return $row ? (int)$row['cnt'] : 0;
    } catch (Exception $e) {
        return 0;
    }
}

/**
 * Türkçe Tarih Formatlama
 */
function formatDate($dateString) {
    if (empty($dateString)) return '';
    $timestamp = strtotime($dateString);
    $months = [
        1 => 'Ocak', 2 => 'Şubat', 3 => 'Mart', 4 => 'Nisan',
        5 => 'Mayıs', 6 => 'Haziran', 7 => 'Temmuz', 8 => 'Ağustos',
        9 => 'Eylül', 10 => 'Ekim', 11 => 'Kasım', 12 => 'Aralık'
    ];
    $day = date('d', $timestamp);
    $month = $months[(int)date('m', $timestamp)];
    $year = date('Y', $timestamp);
    $time = date('H:i', $timestamp);
    return "$day $month $year - $time";
}

/**
 * JSON Yanıt Dönüşü
 */
function jsonResponse($success, $message, $extra = []) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_json_encode(array_merge([
        'success' => (bool)$success,
        'message' => $message
    ], $extra));
    exit();
}

if (!function_exists('json_json_encode')) {
    function json_json_encode($data) {
        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
