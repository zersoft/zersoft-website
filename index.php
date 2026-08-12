<?php
/**
 * Zersoft Technology - Ana Sayfa
 */
$pageTitle = "Geleceğin Yapay Zeka & Özel Yazılım Çözümleri";
require_once __DIR__ . '/includes/header.php';

$services = getServices(6);
$aiSolutions = getAISolutions(4);
$projects = getProjects(4);
?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-grid">
      <div class="hero-content">
        <span class="badge badge-ai"><i class="fa-solid fa-sparkles"></i> YENİ VİZYON &bull; YAPAY ZEKA DESTEKLİ YAZILIMLAR</span>
        <h1>Geleceğin Yazılım Teknolojilerini <span class="text-gradient">İşletmenize Taşıyoruz</span></h1>
        <p>Zersoft; kurumsal şirketler için otonom yapay zeka ajanları, özel RAG & LLM entegrasyonları, yüksek ölçeklenebilir bulut ve mobil sistemler geliştiren ileri teknoloji firmasıdır.</p>
        <div class="hero-actions">
          <a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-rocket"></i> Projenizi Başlatın</a>
          <a href="ai-solutions.php" class="btn btn-outline"><i class="fa-solid fa-microchip"></i> AI Çözümlerimiz</a>
        </div>
      </div>

      <!-- Live Interactive AI Widget Demo -->
      <div class="hero-visual">
        <div class="ai-hero-widget">
          <div class="ai-widget-header">
            <div style="display: flex; align-items: center; gap: 10px;">
              <div class="ai-status-dot"></div>
              <strong style="font-size: 0.95rem; color: #fff;">Zersoft Enterprise AI Engine</strong>
            </div>
            <span class="badge" style="font-size: 0.7rem;">Active System</span>
          </div>
          <div class="ai-chat-body" id="aiChatBody" style="min-height: 200px; max-height: 240px; overflow-y: auto;">
            <!-- Dynamic chat bubbles injected via main.js -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- AI Solutions Showcase Section -->
<section class="ai-solutions-section">
  <div class="container">
    <div class="section-header">
      <span class="badge badge-ai"><i class="fa-solid fa-brain"></i> YAPAY ZEKA ÇÖZÜMLERİMİZ</span>
      <h2>İş Süreçleriniz İçin <span class="text-gradient-ai">Özel AI Mimarileri</span></h2>
      <p>Verilerinizi sadece saklamayın; onları 7/24 çalışan akıllı sistemlere ve otonom kararlara dönüştürün.</p>
    </div>

    <div class="features-grid">
      <?php foreach ($aiSolutions as $ai): ?>
        <?php $features = json_decode($ai['features_json'] ?? '[]', true); ?>
        <div class="glass-card ai-solution-card">
          <div class="feature-icon-wrapper" style="background: rgba(127, 0, 255, 0.15); color: #e100ff; border-color: rgba(127, 0, 255, 0.3);">
            <i class="fa-solid <?php echo sanitize($ai['icon']); ?>"></i>
          </div>
          <span class="badge badge-ai" style="margin-bottom: 12px;"><?php echo sanitize($ai['badge_text']); ?></span>
          <h3 class="feature-title"><?php echo sanitize($ai['title']); ?></h3>
          <p class="feature-desc"><?php echo sanitize($ai['summary']); ?></p>
          
          <?php if (!empty($features)): ?>
            <div class="feature-tags">
              <?php foreach ($features as $feat): ?>
                <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> <?php echo sanitize($feat); ?></span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



<!-- Services Section -->
<section style="padding: 100px 0;">
  <div class="container">
    <div class="section-header">
      <span class="badge"><i class="fa-solid fa-layer-group"></i> KURUMSAL HİZMETLERİMİZ</span>
      <h2>Uçtan Uca <span class="text-gradient">Dijital Mühendislik</span></h2>
      <p>Fikir aşamasından canlıya geçişe kadar modern, ölçeklenebilir ve güvenli yazılım mimarileri.</p>
    </div>

    <div class="features-grid">
      <?php foreach ($services as $service): ?>
        <div class="glass-card">
          <div class="feature-icon-wrapper">
            <i class="fa-solid <?php echo sanitize($service['icon']); ?>"></i>
          </div>
          <h3 class="feature-title"><?php echo sanitize($service['title']); ?></h3>
          <p class="feature-desc"><?php echo sanitize($service['short_description']); ?></p>
          <a href="services.php" class="feature-link">İncele <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section">
  <div class="container">
    <div class="section-header">
      <span class="badge"><i class="fa-solid fa-code"></i> PORTFÖYÜMÜZ</span>
      <h2>Öne Çıkan <span class="text-gradient">Başarı Hikayelerimiz</span></h2>
      <p>Gerçekleştirdiğimiz projelerle müşterilerimizin dijital dönüşümüne güç katıyoruz.</p>
    </div>

    <div class="features-grid">
      <?php foreach ($projects as $project): ?>
        <div class="project-card">
          <div class="project-img" style="background-color: #111827; display: flex; align-items: center; justify-content: center;">
            <i class="fa-solid fa-laptop-code" style="font-size: 3rem; color: rgba(0, 242, 254, 0.4);"></i>
            <div class="project-overlay"></div>
          </div>
          <div class="project-info">
            <div class="project-cat"><?php echo sanitize($project['category']); ?> &bull; <?php echo sanitize($project['client']); ?></div>
            <h3 class="project-title"><?php echo sanitize($project['title']); ?></h3>
            <p class="project-desc"><?php echo sanitize($project['description']); ?></p>
            <div class="feature-tags">
              <?php foreach (explode(',', $project['tech_stack']) as $tech): ?>
                <span class="tag"><?php echo sanitize(trim($tech)); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section class="contact-section">
  <div class="container">
    <div class="contact-grid">
      <div>
        <span class="badge badge-ai"><i class="fa-solid fa-comments"></i> BİZE ULAŞIN</span>
        <h2 style="font-size: 2.5rem; margin: 16px 0;">Projenizi Birlikte <span class="text-gradient-ai">Hayırlı Kılalım</span></h2>
        <p style="color: var(--text-muted); font-size: 1.05rem;">Fikirlerinizi dinlemek, yapay zeka çözümlerimizi şirketinize özel sunmak ve hızlı bir teklif hazırlamak için hazırız.</p>
        
        <div class="contact-info-list">
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
            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div style="font-size: 0.85rem; color: var(--text-muted);">Adres</div>
              <strong><?php echo sanitize($settings['address']); ?></strong>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="glass-card">
        <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Hızlı Teklif Formu</h3>
        <div id="contactAlert" class="alert-box"></div>

        <form id="contactForm">
          <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

          <div class="form-group">
            <label class="form-label">Adınız Soyadınız *</label>
            <input type="text" name="full_name" class="form-control" placeholder="Örn: Ahmet Yılmaz" required>
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
            <label class="form-label">Konu / Proje Türü *</label>
            <input type="text" name="subject" class="form-control" placeholder="Örn: Yapay Zeka Botu Entegrasyonu" required>
          </div>

          <div class="form-group">
            <label class="form-label">Mesajınız / Proje Detayları *</label>
            <textarea name="message" class="form-control" placeholder="İhtiyaçlarınızı ve hedeflerinizi kısaca açıklayınız..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fa-solid fa-paper-plane"></i> Mesajı Gönder</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
