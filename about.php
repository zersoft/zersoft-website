<?php
/**
 * Zersoft Technology - Hakkımızda & Vizyon Sayfası
 */
$pageTitle = "Hakkımızda & Şirket Vizyonumuz";
$pageDescription = "Zersoft Teknoloji hakkında detaylı bilgi, şirket değerlerimiz ve gelecek nesil yazılım vizyonumuz.";
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero-section" style="min-height: 40vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge"><i class="fa-solid fa-building"></i> KURUMSAL BİLGİ</span>
    <h1 style="font-size: 3rem; margin: 20px 0;">Biz Kimiz & <span class="text-gradient">Gelecek Vizyonumuz</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;">Yapay zeka ve ileri yazılım mühendisliği disipliniyle kurumsal dijitalleşmeye yön veriyoruz.</p>
  </div>
</section>

<section style="padding: 40px 0 100px 0;">
  <div class="container">
    <div class="glass-card" style="margin-bottom: 50px; padding: 45px;">
      <h2 style="font-size: 2rem; margin-bottom: 20px;">Teknoloji ve Yapay Zeka Odaklı Yaklaşımımız</h2>
      <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
        Zersoft Teknoloji, geleneksel yazılım çözümlerinin ötesine geçerek şirketlerin operasyonel süreçlerini otonomlaştıran, verilerini yapay zeka ile işlenebilir kararlara dönüştüren bağımsız bir teknoloji şirketidir.
      </p>
      <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
        Geliştirdiğimiz çözümlerde yüksek performans, mikroservis mimarisi, siber güvenlik standartları ve tam KVKK uyumluluğu temel prensiplerimizdir. Müşterilerimizle bir tedarikçi ilişkisinden ziyade, uçtan uca uzun vadeli bir teknoloji ortaklığı yürütüyoruz.
      </p>
    </div>

    <!-- Vision & Mission Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
      <div class="glass-card">
        <div class="feature-icon-wrapper"><i class="fa-solid fa-eye"></i></div>
        <h3 style="font-size: 1.5rem; margin-bottom: 14px;">Vizyonumuz</h3>
        <p style="color: var(--text-muted); line-height: 1.7;">Küresel ölçekte kurumsal şirketlerin yapay zeka entegrasyonunu en güvenli, hızlı ve yüksek verimli şekilde gerçekleştiren öncü yazılım ve teknoloji şirketi olmak.</p>
      </div>

      <div class="glass-card">
        <div class="feature-icon-wrapper" style="background: rgba(127, 0, 255, 0.15); color: #e100ff; border-color: rgba(127, 0, 255, 0.3);"><i class="fa-solid fa-bullseye"></i></div>
        <h3 style="font-size: 1.5rem; margin-bottom: 14px;">Misyonumuz</h3>
        <p style="color: var(--text-muted); line-height: 1.7;">Müşterilerimizin karmaşık iş süreçlerini sezgisel, otonom ve akıllı yazılım mimarilerine dönüştürerek rekabet avantajı ve sürdürülebilir büyüme sağlamak.</p>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
