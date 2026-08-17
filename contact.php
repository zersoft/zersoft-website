<?php
/**
 * Zersoft Technology - İletişim Sayfası (Honeypot + Math CAPTCHA + Tam i18n)
 */
require_once __DIR__ . '/includes/init.php';
$pageTitle = __("contact_title");
$pageDescription = __("contact_sub");
require_once __DIR__ . '/includes/header.php';

// Math CAPTCHA Oluştur
$num1 = rand(2, 9);
$num2 = rand(1, 9);
$_SESSION['captcha_answer'] = $num1 + $num2;
?>

<section class="hero-section" style="min-height: 35vh; padding: 140px 0 40px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-headset"></i> <?php echo __('nav_contact'); ?></span>
    <h1 style="font-size: 3rem; margin: 20px 0;"><?php echo __('contact_title'); ?></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;"><?php echo __('contact_sub'); ?></p>
  </div>
</section>

<section class="contact-section" style="padding: 20px 0 100px 0;">
  <div class="container">
    <div class="contact-grid">
      <div>
        <h2 style="font-size: 2rem; margin-bottom: 20px;"><?php echo __('office_title'); ?></h2>
        <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7;"><?php echo __('office_sub'); ?></p>

        <div class="contact-info-list" style="margin-top: 30px;">
          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);"><?php echo __('label_address'); ?></div>
              <strong><?php echo sanitize($settings['address']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);"><?php echo __('label_phone'); ?></div>
              <strong><?php echo sanitize($settings['phone']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);"><?php echo __('label_email'); ?></div>
              <strong><?php echo sanitize($settings['email']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-clock"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);"><?php echo __('label_hours'); ?></div>
              <strong><?php echo sanitize($settings['working_hours']); ?></strong>
            </div>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div class="glass-card">
        <h3 style="font-size: 1.5rem; margin-bottom: 20px;"><?php echo __('nav_get_quote'); ?></h3>
        <div id="contactAlert" class="alert-box"></div>

        <form id="contactForm">
          <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
          
          <!-- Honeypot SPAM Trap (Invisible) -->
          <input type="text" name="website" style="display:none !important;" tabindex="-1" autocomplete="off">

          <div class="form-group">
            <label class="form-label"><?php echo __('form_name'); ?> *</label>
            <input type="text" name="full_name" class="form-control" placeholder="Ahmet Yılmaz" required>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label"><?php echo __('form_email'); ?> *</label>
              <input type="email" name="email" class="form-control" placeholder="ahmet@firma.com" required>
            </div>
            <div class="form-group">
              <label class="form-label"><?php echo __('form_phone'); ?></label>
              <input type="text" name="phone" class="form-control" placeholder="+90 5XX XXX XX XX">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label"><?php echo __('form_subject'); ?> *</label>
            <input type="text" name="subject" class="form-control" placeholder="Örn: Yapay Zeka RAG Projesi" required>
          </div>

          <div class="form-group">
            <label class="form-label"><?php echo __('form_message'); ?> *</label>
            <textarea name="message" class="form-control" placeholder="Projeniz ve beklentileriniz hakkında bilgi veriniz..." required></textarea>
          </div>

          <!-- Math CAPTCHA Field -->
          <div class="form-group" style="background: rgba(0, 242, 254, 0.05); padding: 14px; border-radius: 8px; border: 1px solid var(--border-glow);">
            <label class="form-label" style="color: #00f2fe; font-weight: 700;">
              🛡️ SPAM Verification: <?php echo $num1; ?> + <?php echo $num2; ?> = ? *
            </label>
            <input type="number" name="captcha_answer" class="form-control" placeholder="..." required style="margin-top: 6px;">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-paper-plane"></i> <?php echo __('btn_send'); ?></button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- AJAX Form Handler -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  const alertBox = document.getElementById('contactAlert');

  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const btn = form.querySelector('button[type="submit"]');
      const originalText = btn.innerHTML;
      btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Loading...';
      btn.disabled = true;

      const formData = new FormData(form);

      fetch('api/contact.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        btn.innerHTML = originalText;
        btn.disabled = false;
        alertBox.style.display = 'block';

        if (data.success) {
          alertBox.className = 'alert-box alert-success';
          alertBox.innerHTML = '<i class="fa-solid fa-circle-check"></i> ' + data.message;
          form.reset();
        } else {
          alertBox.className = 'alert-box alert-error';
          alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> ' + data.message;
        }
      })
      .catch(err => {
        btn.innerHTML = originalText;
        btn.disabled = false;
        alertBox.style.display = 'block';
        alertBox.className = 'alert-box alert-error';
        alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Connection error.';
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
