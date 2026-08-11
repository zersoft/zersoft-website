<?php
/**
 * Zersoft Technology - İletişim Sayfası
 */
$pageTitle = "İletişim & Proje Teklifi Alın";
$pageDescription = "Zersoft ekibiyle iletişime geçin, yapay zeka ve özel yazılım projeleriniz için ücretsiz teklif alın.";
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero-section" style="min-height: 35vh; padding: 140px 0 40px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-headset"></i> İLETİŞİM & DESTEK</span>
    <h1 style="font-size: 3rem; margin: 20px 0;">Bizimle <span class="text-gradient-ai">İletişime Geçin</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;">Proje fikirlerinizi paylaşın, yapay zeka dönüşüm yol haritanızı birlikte belirleyelim.</p>
  </div>
</section>

<section class="contact-section" style="padding: 20px 0 100px 0;">
  <div class="container">
    <div class="contact-grid">
      <div>
        <h2 style="font-size: 2rem; margin-bottom: 20px;">Zersoft Merkez Ofis</h2>
        <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7;">Ekibimiz haftanın 5 günü sorularınızı yanıtlamaya ve projenizi değerlendirmeye hazırdır.</p>

        <div class="contact-info-list" style="margin-top: 30px;">
          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Adres</div>
              <strong><?php echo sanitize($settings['address']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Telefon</div>
              <strong><?php echo sanitize($settings['phone']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">E-Posta</div>
              <strong><?php echo sanitize($settings['email']); ?></strong>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-clock"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Çalışma Saatleri</div>
              <strong><?php echo sanitize($settings['working_hours']); ?></strong>
            </div>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div class="glass-card">
        <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Teklif & İletişim Formu</h3>
        <div id="contactAlert" class="alert-box"></div>

        <form id="contactForm">
          <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

          <div class="form-group">
            <label class="form-label">Adınız Soyadınız *</label>
            <input type="text" name="full_name" class="form-control" placeholder="Ahmet Yılmaz" required>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label">E-Posta Adresi *</label>
              <input type="email" name="email" class="form-control" placeholder="ahmet@firma.com" required>
            </div>
            <div class="form-group">
              <label class="form-label">Telefon</label>
              <input type="text" name="phone" class="form-control" placeholder="+90 5XX XXX XX XX">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Konu / Hizmet Türü *</label>
            <input type="text" name="subject" class="form-control" placeholder="Örn: Yapay Zeka RAG Projesi" required>
          </div>

          <div class="form-group">
            <label class="form-label">Mesajınız *</label>
            <textarea name="message" class="form-control" placeholder="Projeniz ve beklentileriniz hakkında bilgi veriniz..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-paper-plane"></i> Gönder</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
