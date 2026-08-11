<?php
/**
 * Zersoft Technology - Yapay Zeka Çözümlerimiz Sayfası
 */
$pageTitle = "Yapay Zeka Destekli Özel Yazılım Çözümleri (AI Solutions)";
$pageDescription = "Zersoft; kurumsal RAG, LLM entegrasyonu, otonom AI agentlar ve kestirimci yapay zeka sistemleri geliştirir.";
require_once __DIR__ . '/includes/header.php';

$aiSolutions = getAISolutions();
?>

<!-- AI Hero Showcase Banner -->
<section class="hero-section" style="min-height: 45vh; padding: 150px 0 60px 0; background: radial-gradient(circle at 50% 30%, rgba(127, 0, 255, 0.12) 0%, transparent 60%);">
  <div class="container text-center" style="max-width: 850px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-sparkles"></i> İLERİ TEKNOLOJİ VİZYONU</span>
    <h1 style="font-size: 3.2rem; margin: 20px 0;">Yapay Zeka Destekli <br><span class="text-gradient-ai">Özel Yazılım Çözümleri</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.7;">Zersoft; işletmenize özel eğitilmiş yapay zeka modelleri, doğal dil işleme asistanları ve otonom iş akışı robotları ile kurumunuzu geleceğe taşır.</p>
  </div>
</section>

<!-- AI Architecture Highlights -->
<section style="padding: 40px 0 100px 0;">
  <div class="container">
    <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 36px;">
      <?php foreach ($aiSolutions as $ai): ?>
        <?php $features = json_decode($ai['features_json'] ?? '[]', true); ?>
        <div class="glass-card ai-solution-card" style="padding: 36px;">
          <div class="feature-icon-wrapper" style="background: rgba(127, 0, 255, 0.15); color: #e100ff; border-color: rgba(127, 0, 255, 0.3); width: 64px; height: 64px; font-size: 1.6rem;">
            <i class="fa-solid <?php echo sanitize($ai['icon']); ?>"></i>
          </div>
          <span class="badge badge-ai" style="margin-bottom: 14px;"><?php echo sanitize($ai['badge_text']); ?></span>
          <h2 style="font-size: 1.6rem; font-weight: 700; margin-bottom: 14px;"><?php echo sanitize($ai['title']); ?></h2>
          <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 24px;"><?php echo sanitize($ai['summary']); ?></p>

          <h4 style="font-size: 0.9rem; color: #fff; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.05em;">Öne Çıkan AI Yetenekleri:</h4>
          <?php if (!empty($features)): ?>
            <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 24px;">
              <?php foreach ($features as $feat): ?>
                <div style="display: flex; align-items: center; gap: 10px; font-size: 0.95rem; color: #e2e8f0;">
                  <i class="fa-solid fa-circle-check text-gradient-ai" style="font-size: 1rem;"></i>
                  <span><?php echo sanitize($feat); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <a href="contact.php" class="btn btn-ai" style="width: 100%;"><i class="fa-solid fa-brain"></i> Danışmanlık ve Randevu Alın</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- AI Security & On-Premise Banner -->
<section style="padding: 80px 0; background: rgba(15, 22, 36, 0.5); border-y: 1px solid var(--border-glow);">
  <div class="container">
    <div class="glass-card" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
      <div>
        <span class="badge badge-ai"><i class="fa-solid fa-shield-halved"></i> KVKK & GİZLİLİK UYUMLU</span>
        <h2 style="font-size: 2.2rem; margin: 16px 0;">Verileriniz Asla Dışarı Çıkmaz</h2>
        <p style="color: var(--text-muted); line-height: 1.7; font-size: 1.05rem;">Geliştirdiğimiz kurumsal yapay zeka modelleri ve RAG mimarileri doğrudan şirketinizin kendi sunucularında (On-Premise) veya özel bulut alanınızda çalışır. Veri mahremiyeti ve ticari sırlarınız %100 güvence altındadır.</p>
      </div>
      <div style="text-align: center;">
        <i class="fa-solid fa-server text-gradient-ai" style="font-size: 6rem; opacity: 0.8;"></i>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
