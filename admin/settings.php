<?php
/**
 * Zersoft Technology - Admin Site Ayarları ve Şifre Değiştirme
 */
require_once __DIR__ . '/header.php';

global $db;
$error = '';
$success = '';

// Update General Settings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_settings'])) {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik hatası.';
    } else {
        $site_name = sanitize($_POST['site_name'] ?? '');
        $site_tagline = sanitize($_POST['site_tagline'] ?? '');
        $meta_description = sanitize($_POST['meta_description'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $address = sanitize($_POST['address'] ?? '');
        $working_hours = sanitize($_POST['working_hours'] ?? '');
        $facebook = sanitize($_POST['facebook'] ?? '');
        $twitter = sanitize($_POST['twitter'] ?? '');
        $linkedin = sanitize($_POST['linkedin'] ?? '');
        $github = sanitize($_POST['github'] ?? '');

        try {
            $stmt = $db->prepare("UPDATE site_settings SET site_name = :site_name, site_tagline = :site_tagline, meta_description = :meta_description, phone = :phone, email = :email, address = :address, working_hours = :working_hours, facebook = :facebook, twitter = :twitter, linkedin = :linkedin, github = :github WHERE id = 1");
            $stmt->execute([
                ':site_name' => $site_name,
                ':site_tagline' => $site_tagline,
                ':meta_description' => $meta_description,
                ':phone' => $phone,
                ':email' => $email,
                ':address' => $address,
                ':working_hours' => $working_hours,
                ':facebook' => $facebook,
                ':twitter' => $twitter,
                ':linkedin' => $linkedin,
                ':github' => $github
            ]);
            $success = 'Site ayarları başarıyla güncellendi.';
        } catch (Exception $e) {
            $error = 'Hata: ' . $e->getMessage();
        }
    }
}

// Update Admin Password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_password'])) {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik hatası.';
    } else {
        $old_pass = $_POST['old_password'] ?? '';
        $new_pass = $_POST['new_password'] ?? '';
        $confirm_pass = $_POST['confirm_password'] ?? '';

        if (empty($old_pass) || empty($new_pass)) {
            $error = 'Lütfen mevcut ve yeni şifrenizi giriniz.';
        } elseif ($new_pass !== $confirm_pass) {
            $error = 'Yeni şifreler birbiriyle eşleşmiyor.';
        } elseif (strlen($new_pass) < 6) {
            $error = 'Yeni şifreniz en az 6 karakter olmalıdır.';
        } else {
            $userId = $_SESSION['admin_user_id'];
            $stmt = $db->prepare("SELECT password FROM users WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $userId]);
            $user = $stmt->fetch();

            if ($user && password_verify($old_pass, $user['password'])) {
                $new_hash = password_hash($new_pass, PASSWORD_BCRYPT);
                $stmtUpdate = $db->prepare("UPDATE users SET password = :pass WHERE id = :id");
                $stmtUpdate->execute([':pass' => $new_hash, ':id' => $userId]);
                $success = 'Admin şifreniz başarıyla değiştirildi.';
            } else {
                $error = 'Mevcut şifreniz hatalı!';
            }
        }
    }
}

$settings = getSiteSettings();
?>

<div style="margin-bottom: 24px;">
  <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Site Ayarları ve Profil Koruması</h1>
  <p style="color: var(--admin-text-muted);">Kurumsal bilgileri, sosyal medya linklerini ve admin şifrenizi yönetin.</p>
</div>

<?php if ($success): ?>
  <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fa-solid fa-circle-check"></i> <?php echo $success; ?>
  </div>
<?php endif; ?>

<?php if ($error): ?>
  <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
  </div>
<?php endif; ?>

<!-- General Settings Panel -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;"><i class="fa-solid fa-sliders text-gradient"></i> Genel Kurumsal Ayarlar</div>
  
  <form action="settings.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <input type="hidden" name="update_settings" value="1">

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Firma / Site Adı</label>
        <input type="text" name="site_name" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['site_name']); ?>" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Slogan / Tagline</label>
        <input type="text" name="site_tagline" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['site_tagline']); ?>" required>
      </div>
    </div>

    <div style="margin-bottom: 16px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Meta Description (SEO)</label>
      <textarea name="meta_description" class="form-control" style="background: #090d16; min-height: 70px;"><?php echo sanitize($settings['meta_description']); ?></textarea>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Telefon</label>
        <input type="text" name="phone" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['phone']); ?>">
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">E-Posta</label>
        <input type="email" name="email" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['email']); ?>">
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Çalışma Saatleri</label>
        <input type="text" name="working_hours" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['working_hours']); ?>">
      </div>
    </div>

    <div style="margin-bottom: 20px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Adres</label>
      <input type="text" name="address" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['address']); ?>">
    </div>

    <h4 style="font-size: 1rem; color: #fff; margin-bottom: 12px;">Sosyal Medya Linkleri</h4>
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 16px; margin-bottom: 24px;">
      <div>
        <label style="font-size: 0.8rem; color: var(--admin-text-muted);">LinkedIn</label>
        <input type="text" name="linkedin" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['linkedin']); ?>">
      </div>
      <div>
        <label style="font-size: 0.8rem; color: var(--admin-text-muted);">GitHub</label>
        <input type="text" name="github" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['github']); ?>">
      </div>
      <div>
        <label style="font-size: 0.8rem; color: var(--admin-text-muted);">Twitter / X</label>
        <input type="text" name="twitter" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['twitter']); ?>">
      </div>
      <div>
        <label style="font-size: 0.8rem; color: var(--admin-text-muted);">Facebook</label>
        <input type="text" name="facebook" class="form-control" style="background: #090d16;" value="<?php echo sanitize($settings['facebook']); ?>">
      </div>
    </div>

    <button type="submit" class="btn-admin-primary">
      <i class="fa-solid fa-floppy-disk"></i> Ayarları Kaydet
    </button>
  </form>
</div>

<!-- Password Change Panel -->
<div class="card-panel" style="max-width: 500px;">
  <div class="panel-title" style="margin-bottom: 20px;"><i class="fa-solid fa-key text-gradient"></i> Admin Şifresi Değiştir</div>

  <form action="settings.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <input type="hidden" name="update_password" value="1">

    <div style="margin-bottom: 16px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Mevcut Şifreniz</label>
      <input type="password" name="old_password" class="form-control" style="background: #090d16;" required>
    </div>

    <div style="margin-bottom: 16px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Yeni Şifre</label>
      <input type="password" name="new_password" class="form-control" style="background: #090d16;" required>
    </div>

    <div style="margin-bottom: 20px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Yeni Şifre (Tekrar)</label>
      <input type="password" name="confirm_password" class="form-control" style="background: #090d16;" required>
    </div>

    <button type="submit" class="btn-admin-primary">
      <i class="fa-solid fa-shield-halved"></i> Şifreyi Güncelle
    </button>
  </form>
</div>

</main>
</body>
</html>
