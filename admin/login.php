<?php
/**
 * Zersoft Technology - Admin Panel Giriş Sayfası
 */
require_once __DIR__ . '/../includes/functions.php';

// Eğer kullanıcı zaten giriş yapmışsa direkt dashboard'a yönlendir
if (isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik doğrulaması hatası. Lütfen sayfayı yenileyip tekrar deneyin.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($password)) {
            $error = 'Lütfen kullanıcı adı ve şifrenizi giriniz.';
        } else {
            // Brute-force koruması (5 başarısız denemeden sonra 60 saniye bekleme)
            $attempts = $_SESSION['login_attempts'] ?? 0;
            $lastAttemptTime = $_SESSION['last_login_attempt'] ?? 0;
            
            if ($attempts >= 5 && (time() - $lastAttemptTime) < 60) {
                $remaining = 60 - (time() - $lastAttemptTime);
                $error = "Çok fazla başarısız giriş denemesi. Lütfen {$remaining} saniye bekleyip tekrar deneyin.";
            } else {
                if ((time() - $lastAttemptTime) >= 60) {
                    $_SESSION['login_attempts'] = 0;
                }

                try {
                    global $db;
                    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1");
                    $stmt->execute([':username' => $username, ':email' => $username]);
                    $user = $stmt->fetch();

                    if ($user && password_verify($password, $user['password'])) {
                        // Başarılı giriş: deneme sayacını sıfırla
                        unset($_SESSION['login_attempts']);
                        unset($_SESSION['last_login_attempt']);

                        // Oturum Güvenliği
                        session_regenerate_id(true);
                        $_SESSION['admin_user_id'] = $user['id'];
                        $_SESSION['admin_user_name'] = $user['full_name'];
                        $_SESSION['admin_username'] = $user['username'];

                        header("Location: index.php");
                        exit();
                    } else {
                        $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
                        $_SESSION['last_login_attempt'] = time();
                        $error = 'Hatalı kullanıcı adı veya şifre!';
                    }
                } catch (Exception $e) {
                    $error = 'Giriş işlemi sırasında bir hata oluştu. Lütfen tekrar deneyiniz.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel Girişi | Zersoft</title>
  <!-- Favicon Suite -->
  <link rel="icon" type="image/svg+xml" href="../assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-header">
        <div class="sidebar-logo-icon" style="margin: 0 auto; width: 48px; height: 48px; font-size: 1.5rem;">
          <i class="fa-solid fa-shield-halved"></i>
        </div>
        <h1>Zersoft <span style="color: var(--admin-accent);">Admin</span></h1>
        <p style="color: var(--admin-text-muted); font-size: 0.9rem; margin-top: 4px;">Yönetim Paneline Giriş Yapın</p>
      </div>

      <?php if (!empty($error)): ?>
        <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; padding: 12px; border-radius: 8px; font-size: 0.9rem; margin-bottom: 20px; text-align: center;">
          <i class="fa-solid fa-circle-exclamation"></i> <?php echo sanitize($error); ?>
        </div>
      <?php endif; ?>

      <form action="login.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

        <div style="margin-bottom: 20px;">
          <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: var(--admin-text-muted);">Kullanıcı Adı veya E-Posta</label>
          <input type="text" name="username" class="btn-admin-primary" style="width: 100%; background: #090d16; border: 1px solid var(--admin-border); color: #fff; padding: 12px 16px; border-radius: 8px;" placeholder="Kullanıcı adınız veya e-postanız" autocomplete="username" required>
        </div>

        <div style="margin-bottom: 24px;">
          <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: var(--admin-text-muted);">Şifre</label>
          <input type="password" name="password" class="btn-admin-primary" style="width: 100%; background: #090d16; border: 1px solid var(--admin-border); color: #fff; padding: 12px 16px; border-radius: 8px;" placeholder="••••••••" autocomplete="current-password" required>
        </div>

        <button type="submit" class="btn-admin-primary" style="width: 100%; justify-content: center; padding: 12px; font-size: 1rem;">
          <i class="fa-solid fa-right-to-bracket"></i> Giriş Yap
        </button>
      </form>
    </div>
  </div>
</body>
</html>
