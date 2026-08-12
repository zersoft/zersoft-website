<?php
/**
 * Zersoft Technology - IYS (İmalat & Süreç Yönetim Programı) Ürün Detay Sayfası
 * Canlı Tanıtım: https://iys.zersoft.net/
 */
$pageTitle = "IYS — İmalat & Süreç Yönetim Programı";
$pageDescription = "İmalat sektörüne özel Sipariş, Planlama, Tasarım, Üretim ve Teslimat süreçlerini yöneten Microsoft Access altyapılı ve web dönüşüm uyumlu IYS platformu.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 45vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 900px; margin: 0 auto;">
    <span class="badge" style="background:rgba(225,0,255,0.1); color:#e100ff; border-color:rgba(225,0,255,0.3);"><i class="fa-solid fa-industry"></i> İMALAT SEKTÖRÜNE ÖZEL ERP</span>
    <h1 style="font-size: 3.2rem; margin: 20px 0;">IYS — İmalat &amp; Süreç Yönetim Programı</h1>
    <p style="color: var(--text-muted); font-size: 1.2rem; line-height: 1.8;">
      Müşteri siparişinden teslimata kadar tüm imalat aşamalarını (<strong>Sipariş &rarr; Planlama &rarr; Tasarım &rarr; Üretim &rarr; Teslimat</strong>) tek bir ekrandan yönetin.
    </p>
    <div style="display: flex; gap: 16px; justify-content: center; margin-top: 30px; flex-wrap: wrap;">
      <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-primary btn-lg">
        <i class="fa-solid fa-globe"></i> iys.zersoft.net Canlı Tanıtımı İncele 🔗
      </a>
      <a href="contact.php" class="btn btn-outline btn-lg">
        <i class="fa-solid fa-headset"></i> Özel Demo &amp; Teklif Alın
      </a>
    </div>
  </div>
</section>

<!-- 5-Stage Workflow Pipeline -->
<section style="padding: 40px 0 80px 0;">
  <div class="container">
    <div class="section-header">
      <span class="badge badge-ai"><i class="fa-solid fa-diagram-next"></i> DİJİTAL İMALAT ZİNCİRİ</span>
      <h2>İmalat Sanayi İçin <span class="text-gradient-accent">5 Adımlı Süreç Yönetimi</span></h2>
      <p>Kantar otomasyonlarından tamamen bağımsız, imalat atölyeleri ve fabrikalar için geliştirilmiş modüler altyapı.</p>
    </div>

    <!-- Workflow Cards Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 50px;">
      <!-- Step 1 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #3b82f6;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #3b82f6;">ADIM 1</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;">1. Sipariş Yönetimi</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Müşteri talepleri, teknik şartnameler, revizyon takibi ve teklif onay mekanizması.</p>
      </div>

      <!-- Step 2 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #f59e0b;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #f59e0b;">ADIM 2</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;">2. Üretim Planlama</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Hammadde ve stok ihtiyacı, makine kapasite tahsisi ve uçtan uca termin çizelgeleme.</p>
      </div>

      <!-- Step 3 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #e100ff;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #e100ff;">ADIM 3</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;">3. Tasarım &amp; Ar-Ge</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">3D CAD/CAM çizim dosyaları, ürün reçetesi (BOM) hazırlama ve teknik numune onayı.</p>
      </div>

      <!-- Step 4 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #00f2fe;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #00f2fe;">ADIM 4</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;">4. Atölye &amp; Üretim</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Barkodlu iş emirleri, istasyon süresi, kalite kontrol ve fire oranları takibi.</p>
      </div>

      <!-- Step 5 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #10b981;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #10b981;">ADIM 5</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;">5. Sevkiyat &amp; Teslimat</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Paketleme listeleri, e-İrsaliye basımı, müşteri teslimat onayı ve resmi faturalandırma.</p>
      </div>
    </div>

    <!-- Screenshot Preview Panel -->
    <div class="glass-card" style="padding: 40px; margin-bottom: 60px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="IYS — İmalat &amp; Süreç Yönetim Programı Canlı Ekran Görseli">
            <img src="assets/images/iys-preview.svg" alt="IYS İmalat Programı Ekran Görüntüsü" style="border-radius: 16px; border: 1px solid rgba(225,0,255,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
        <div>
          <span class="badge" style="background:rgba(0,242,254,0.1); color:#00f2fe; margin-bottom:12px;"><i class="fa-solid fa-desktop"></i> MASAÜSTÜ &amp; WEB DÖNÜŞÜMÜ</span>
          <h3 style="font-size: 1.8rem; margin-bottom: 16px; color:#fff;">Microsoft Access Altyapısı &amp; İleri Web Mimarisi</h3>
          <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.8; margin-bottom: 20px;">
            Yıllardır Microsoft Access Formları üzerinde milyonlarca siparişi başarıyla yöneten IYS, müşteri istekleri ve sektör deneyimiyle olgunlaşmış sezgisel bir arayüze sahiptir. Halen yeni nesil web ve bulut (Cloud) mimarisine dönüştürülme süreci devam etmektedir.
          </p>
          <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-outline">
            <i class="fa-solid fa-globe"></i> iys.zersoft.net Adresinden İnceleyin 🔗
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
