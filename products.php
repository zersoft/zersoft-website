<?php
/**
 * Zersoft Technology - Ürünlerimiz Sayfası (Görsel SEO & Lightbox & i18n Uyumlu)
 */
$pageTitle = "Yazılım Ürünlerimiz & Kantar Otomasyonları";
$pageDescription = "Zersoft tarafından geliştirilen kantar otomasyonları, IYS İş Süreç Yönetim Programı ve katı atık saha yazılımları.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 40vh; padding: 120px 0 60px 0;">
  <div class="container text-center" style="max-width: 860px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-box-open"></i> <?php echo __('nav_products'); ?></span>
    <h1 style="font-size: 3rem; margin: 20px 0;">Saha ve İşletmeniz İçin <span class="text-gradient">Akıllı Yazılımlar</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.8;">
      Sahada rüştünü ispatlamış kantar otomasyonları, IYS İş ve Süreç Yönetim platformu ve katı atık saha çözümlerimiz.
    </p>
  </div>
</section>

<!-- ================================================================ -->
<!-- ÜRÜN #1 — Hafriyat & Saha Kantar Otomasyonu                       -->
<!-- ================================================================ -->
<section style="padding: 0 0 80px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px; margin-bottom: 40px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <span class="badge badge-ai" style="margin-bottom: 12px;"><i class="fa-solid fa-truck-ramp-box"></i> SAHA KANTAR OTOMASYONU</span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;">Hafriyat &amp; Saha Kantar Otomasyonu v4.2</h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            Plaka tanıma kameraları, otomatik bariyer sistemleri, canlı kantar indikatör okuma ve irsaliye basımı ile hafriyat sahalarınızı %100 otonom yönetin.
          </p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>
            <a href="assets/images/kantar-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="Hafriyat &amp; Saha Kantar Otomasyonu Ekran Görüntüsü"><i class="fa-solid fa-expand"></i> Ekran Görüntüsünü İncele</a>
          </div>
        </div>
        <div>
          <a href="assets/images/kantar-preview.svg" class="lightbox-trigger" data-caption="Zersoft Canlı Kantar Tartım ve Plaka Tanıma Modülü">
            <img src="assets/images/kantar-preview.svg" alt="Hafriyat ve Saha Kantar Otomasyonu Yazılımı Ekran Görüntüsü" style="border-radius: 16px; border: 1px solid var(--border-glow); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================ -->
<!-- ÜRÜN #2 — IYS İş & Süreç Yönetim Programı                       -->
<!-- ================================================================ -->
<section style="padding: 0 0 80px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px; margin-bottom: 40px; position: relative; overflow: hidden;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="IYS İş &amp; Süreç Yönetim Platformu Panel Ekran Görüntüsü">
            <img src="assets/images/iys-preview.svg" alt="IYS İş ve Süreç Yönetim Programı Ekran Görüntüsü" style="border-radius: 16px; border: 1px solid rgba(225,0,255,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>

        <div>
          <span class="badge" style="margin-bottom: 12px; background: rgba(225,0,255,0.1); color:#e100ff; border-color:rgba(225,0,255,0.3);"><i class="fa-solid fa-industry"></i> İMALAT SEKTÖRÜ ERP</span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;">IYS — İmalat &amp; Süreç Yönetim Programı</h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            İmalat sektörüne özel <strong>Sipariş &rarr; Planlama &rarr; Tasarım &rarr; Üretim &rarr; Teslimat</strong> aşamalarını detaylı yöneten, Microsoft Access altyapılı ve web dönüşüm uyumlu kurumsal ERP platformu.
          </p>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="iys.php" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> İmalat Çözümünü İncele</a>
            <a href="https://iys.zersoft.net" target="_blank" class="btn btn-outline"><i class="fa-solid fa-globe"></i> iys.zersoft.net Canlı 🔗</a>
            <a href="assets/images/iys-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="IYS İmalat Süreç Yönetim Ekran Görüntüsü"><i class="fa-solid fa-expand"></i> Görseli Büyüt</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================================================ -->
<!-- ÜRÜN #3 — Katı Atık & Maden Ocağı Kantar Sistemi                -->
<!-- ================================================================ -->
<section style="padding: 0 0 100px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <span class="badge" style="margin-bottom: 12px; background: rgba(16,185,129,0.1); color:#10b981; border-color:rgba(16,185,129,0.3);"><i class="fa-solid fa-weight-hanging"></i> BELEDİYE &amp; MADEN SANAYİ</span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;">Katı Atık &amp; Maden Ocağı Kantar Yazılımı</h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            Belediyelerin katı atık bertaraf tesisleri ve maden ocaklarının zorlu iklim koşullarına uygun, kesintisiz çalışan, e-Fatura ve ön muhasebe entegreli kantar otomasyonu.
          </p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>
            <a href="assets/images/kati-atik-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="Katı Atık &amp; Maden Ocağı Kantar Yazılımı Ekran Görüntüsü"><i class="fa-solid fa-expand"></i> Görseli İncele</a>
          </div>
        </div>
        <div>
          <a href="assets/images/kati-atik-preview.svg" class="lightbox-trigger" data-caption="Katı Atık ve Maden Ocağı Kantar Otomasyonu Görseli">
            <img src="assets/images/kati-atik-preview.svg" alt="Katı Atık ve Maden Ocağı Kantar Yazılımı Ekran Görüntüsü" style="border-radius: 16px; border: 1px solid rgba(16,185,129,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
