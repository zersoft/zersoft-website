<?php
/**
 * Zersoft Technology - İletişim Formu İşleyici (Honeypot + Math CAPTCHA + Rate Limit)
 */

require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Geçersiz istek yöntemi.');
}

// 1. SPAM BOT TRAP (Honeypot Check)
if (!empty($_POST['website'])) {
    // Botlar bu gizli alanı doldurur. Botu tespit edip sessizce başarı döndürüyoruz.
    jsonResponse(true, 'Teşekkürler! Mesajınız başarıyla iletildi.');
}

// 2. CSRF Kontrolü
$csrf_token = $_POST['csrf_token'] ?? '';
if (!verifyCSRFToken($csrf_token)) {
    jsonResponse(false, 'Güvenlik doğrulaması (CSRF) başarısız oldu. Lütfen sayfayı yenileyiniz.');
}

// 3. Math CAPTCHA Kontrolü
$userCaptcha = (int)($_POST['captcha_answer'] ?? -1);
$expectedCaptcha = (int)($_SESSION['captcha_answer'] ?? -999);

if ($expectedCaptcha === -999 || $userCaptcha !== $expectedCaptcha) {
    jsonResponse(false, 'Güvenlik doğrulaması (matematik işlemi) hatalı. Lütfen işlemi kontrol edip tekrar deneyin.');
}

// 4. Rate Limiting (Aşırı İstek / SPAM Koruması - 30 saniye kuralı)
$lastTime = $_SESSION['last_contact_submit'] ?? 0;
if (time() - $lastTime < 30) {
    jsonResponse(false, 'Çok hızlı mesaj gönderiyorsunuz. Lütfen 30 saniye bekleyip tekrar deneyiniz.');
}

// Veri alma ve temizleme
$full_name = trim($_POST['full_name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

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

    // Başarılı gönderimde Rate Limit zamanını güncelle
    $_SESSION['last_contact_submit'] = time();

    jsonResponse(true, 'Teşekkürler! Mesajınız Zersoft ekibine başarıyla iletildi. En kısa sürede sizinle iletişime geçeceğiz.');
} catch (Exception $e) {
    jsonResponse(false, 'Mesajınız kaydedilirken teknik bir hata oluştu: ' . $e->getMessage());
}
