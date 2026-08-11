<?php
/**
 * Zersoft Technology - Hizmetlerimiz Sayfası
 */
$pageTitle = "Kurumsal Hizmetlerimiz & Yazılım Mühendisliği";
$pageDescription = "Zersoft kurumsal web yazılımları, özel SaaS, mobil uygulamalar, yapay zeka entegrasyonları ve bulut mimarileri sunar.";
require_once __DIR__ . '/includes/header.php';

$services = getServices();
?>

<section class="hero-section" style="min-height: 40vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge"><i class="fa-solid fa-gears"></i> UÇTAN UCA HİZMETLER</span>
    <h1 style="font-size: 3rem; margin: 20px 0;">Kurumsal <span class="text-gradient">Yazılım Hizmetlerimiz</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;">Şirketinizin dijital altyapısını en yüksek performans, siber güvenlik ve yapay zeka standartlarında yeniden inşa ediyoruz.</p>
  </div>
</section>

<section style="padding: 60px 0 100px 0;">
  <div class="container">
    <div style="display: flex; flex-direction: column; gap: 40px;">
      <?php foreach ($services as $index => $service): ?>
        <div class="glass-card" style="display: grid; grid-template-columns: 80px 1fr; gap: 24px; align-items: flex-start;">
          <div class="feature-icon-wrapper" style="width: 70px; height: 70px; font-size: 1.8rem; margin: 0;">
            <i class="fa-solid <?php echo sanitize($service['icon']); ?>"></i>
          </div>
          <div>
            <div style="font-size: 0.85rem; color: #00f2fe; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Hizmet 0<?php echo $index + 1; ?></div>
            <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 12px;"><?php echo sanitize($service['title']); ?></h2>
            <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; margin-bottom: 20px;"><?php echo nl2br(sanitize($service['content'])); ?></p>
            <a href="contact.php" class="btn btn-outline btn-sm"><i class="fa-solid fa-comments"></i> Bu Hizmet İçin Teklif Alın</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
