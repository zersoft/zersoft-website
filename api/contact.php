<?php
/**
 * Zersoft Technology - İletişim Formu AJAX İşleyici (PDO Secure Insert)
 */

require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Geçersiz istek yöntemi.');
}

// CSRF Kontrolü
$csrf_token = $_POST['csrf_token'] ?? '';
if (!verifyCSRFToken($csrf_token)) {
    jsonResponse(false, 'Güvenlik doğrulaması (CSRF) başarısız oldu. Lütfen sayfayı yenileyiniz.');
}

// Veri alma ve temizleme
$full_name = sanitize($_POST['full_name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone = sanitize($_POST['phone'] ?? '');
$subject = sanitize($_POST['subject'] ?? '');
$message = sanitize($_POST['message'] ?? '');

// Doğrulama
if (empty($full_name)) {
    jsonResponse(false, 'Lütfen adınızı ve soyadınızı giriniz.');
}

if (!$email) {
    jsonResponse(false, 'Geçerli bir e-posta adresi giriniz.');
}

if (empty($subject)) {
    jsonResponse(false, 'Lütfen mesaj konusunu belirtiniz.');
}

if (empty($message) || strlen($message) < 10) {
    jsonResponse(false, 'Lütfen en az 10 karakterden oluşan detaylı bir mesaj yazınız.');
}

try {
    global $db;
    $stmt = $db->prepare("INSERT INTO messages (full_name, email, phone, subject, message, status) VALUES (:full_name, :email, :phone, :subject, :message, 'unread')");
    $stmt->execute([
        ':full_name' => $full_name,
        ':email'     => $email,
        ':phone'     => $phone,
        ':subject'   => $subject,
        ':message'   => $message
    ]);

    jsonResponse(true, 'Teşekkürler! Mesajınız Zersoft ekibine başarıyla iletildi. En kısa sürede sizinle iletişime geçeceğiz.');
} catch (Exception $e) {
    jsonResponse(false, 'Mesajınız kaydedilirken teknik bir hata oluştu: ' . $e->getMessage());
}
