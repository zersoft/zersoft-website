<?php
/**
 * Zersoft Technology - Ana Sayfa (Tam i18n & Slider & Lightbox Uyumlu)
 */
$pageTitle = __("slide1_title");
require_once __DIR__ . '/includes/header.php';

$services = getServices(6);
$aiSolutions = getAISolutions(4);
$projects = getProjects(4);
?>

<!-- Hero Slider Section -->
<section style="padding: 30px 0 0 0;">
  <div class="container">
    <div class="hero-slider">
      <!-- Slide 1: AI & Kantar -->
      <div class="slide active">
        <div class="slide-content">
          <span class="slide-badge"><i class="fa-solid fa-sparkles"></i> <?php echo __('slide1_badge'); ?></span>
          <h1 class="slide-title"><?php echo __('slide1_title'); ?></h1>
          <p class="slide-desc"><?php echo __('slide1_desc'); ?></p>
          <div class="slide-actions">
            <a href="products.php" class="btn btn-primary"><i class="fa-solid fa-rocket"></i> <?php echo __('slide1_btn1'); ?></a>
            <a href="contact.php" class="btn btn-outline"><i class="fa-solid fa-headset"></i> <?php echo __('slide1_btn2'); ?></a>
          </div>
        </div>
        <div class="slide-visual">
          <a href="assets/images/kantar-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_kantar_title'); ?>">
            <img src="assets/images/kantar-preview.svg" alt="<?php echo __('prod_kantar_title'); ?>">
          </a>
        </div>
      </div>

      <!-- Slide 2: IYS -->
      <div class="slide">
        <div class="slide-content">
          <span class="slide-badge" style="color:#e100ff; border-color:rgba(225,0,255,0.3); background:rgba(225,0,255,0.1);"><i class="fa-solid fa-cubes-stacked"></i> <?php echo __('slide2_badge'); ?></span>
          <h1 class="slide-title"><?php echo __('slide2_title'); ?></h1>
          <p class="slide-desc"><?php echo __('slide2_desc'); ?></p>
          <div class="slide-actions">
            <a href="iys.php" class="btn btn-primary"><i class="fa-solid fa-box-open"></i> <?php echo __('slide2_btn1'); ?></a>
            <a href="https://iys.zersoft.net" target="_blank" class="btn btn-outline"><i class="fa-solid fa-paper-plane"></i> <?php echo __('slide2_btn2'); ?></a>
          </div>
        </div>
        <div class="slide-visual">
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_iys_title'); ?>">
            <img src="assets/images/iys-preview.svg" alt="<?php echo __('prod_iys_title'); ?>">
          </a>
        </div>
      </div>

      <!-- Slide 3: RAG AI -->
      <div class="slide">
        <div class="slide-content">
          <span class="slide-badge" style="color:#00f2fe; border-color:rgba(0,242,254,0.3); background:rgba(0,242,254,0.1);"><i class="fa-solid fa-brain"></i> <?php echo __('slide3_badge'); ?></span>
          <h1 class="slide-title"><?php echo __('slide3_title'); ?></h1>
          <p class="slide-desc"><?php echo __('slide3_desc'); ?></p>
          <div class="slide-actions">
            <a href="ai-solutions.php" class="btn btn-primary"><i class="fa-solid fa-wand-magic-sparkles"></i> <?php echo __('slide3_btn1'); ?></a>
            <a href="contact.php" class="btn btn-outline"><i class="fa-solid fa-file-code"></i> <?php echo __('slide3_btn2'); ?></a>
          </div>
        </div>
        <div class="slide-visual">
          <a href="assets/images/ai-rag-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('slide3_title'); ?>">
            <img src="assets/images/ai-rag-preview.svg" alt="<?php echo __('slide3_title'); ?>">
          </a>
        </div>
      </div>

      <!-- Pagination Dots -->
      <div class="slider-dots"></div>
    </div>
  </div>
</section>

<!-- Quick Metric Stats -->
<section style="padding: 20px 0 60px 0;">
  <div class="container">
    <div class="stats-grid">
      <div class="glass-card stat-card">
        <div class="stat-number">%99.8</div>
        <div class="stat-label"><?php echo __('stat_accuracy'); ?></div>
      </div>
      <div class="glass-card stat-card">
        <div class="stat-number">7/24</div>
        <div class="stat-label"><?php echo __('stat_support'); ?></div>
      </div>
      <div class="glass-card stat-card">
        <div class="stat-number">%75</div>
        <div class="stat-label"><?php echo __('stat_time'); ?></div>
      </div>
      <div class="glass-card stat-card">
        <div class="stat-number">%100</div>
        <div class="stat-label"><?php echo __('stat_security'); ?></div>
      </div>
    </div>
  </div>
</section>

<!-- Product Visual Showcase Section (Screenshots & Mockups) -->
<section style="padding: 60px 0 100px 0; background: rgba(13, 19, 34, 0.4);">
  <div class="container">
    <div class="section-header">
      <span class="badge badge-ai"><i class="fa-solid fa-desktop"></i> <?php echo __('section_products_badge'); ?></span>
      <h2><?php echo __('section_products_title'); ?></h2>
      <p><?php echo __('section_products_sub'); ?></p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
      <!-- Product 1: Kantar -->
      <div class="glass-card" style="padding: 24px; display: flex; flex-direction: column;">
        <a href="assets/images/kantar-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_kantar_title'); ?>">
          <img src="assets/images/kantar-preview.svg" alt="<?php echo __('prod_kantar_title'); ?>" style="border-radius: 12px; margin-bottom: 20px; border: 1px solid var(--border-glow);">
        </a>
        <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #fff;"><?php echo __('prod_kantar_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px; flex-grow: 1;"><?php echo __('prod_kantar_desc'); ?></p>
        <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-top:auto; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.05);">
          <a href="products.php" class="btn btn-outline btn-sm" style="white-space:nowrap; flex-shrink:0;"><?php echo __('btn_details'); ?></a>
          <a href="assets/images/kantar-preview.svg" class="lightbox-trigger text-gradient" style="font-weight:700; font-size:0.85rem; white-space:nowrap;"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?> 🔍</a>
        </div>
      </div>

      <!-- Product 2: IYS -->
      <div class="glass-card" style="padding: 24px; display: flex; flex-direction: column;">
        <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_iys_title'); ?>">
          <img src="assets/images/iys-preview.svg" alt="<?php echo __('prod_iys_title'); ?>" style="border-radius: 12px; margin-bottom: 20px; border: 1px solid rgba(225,0,255,0.3);">
        </a>
        <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #fff;"><?php echo __('prod_iys_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px; flex-grow: 1;"><?php echo __('prod_iys_desc'); ?></p>
        <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-top:auto; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.05);">
          <a href="iys.php" class="btn btn-outline btn-sm" style="white-space:nowrap; flex-shrink:0;"><?php echo __('btn_details'); ?></a>
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger text-gradient-accent" style="font-weight:700; font-size:0.85rem; white-space:nowrap;"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?> 🔍</a>
        </div>
      </div>

      <!-- Product 3: RAG AI -->
      <div class="glass-card" style="padding: 24px; display: flex; flex-direction: column;">
        <a href="assets/images/ai-rag-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('slide3_title'); ?>">
          <img src="assets/images/ai-rag-preview.svg" alt="<?php echo __('slide3_title'); ?>" style="border-radius: 12px; margin-bottom: 20px; border: 1px solid var(--border-glow);">
        </a>
        <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #fff;"><?php echo __('slide3_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px; flex-grow: 1;"><?php echo __('slide3_desc'); ?></p>
        <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-top:auto; padding-top: 15px; border-top: 1px solid rgba(255,255,255,0.05);">
          <a href="ai-solutions.php" class="btn btn-outline btn-sm" style="white-space:nowrap; flex-shrink:0;"><?php echo __('btn_details'); ?></a>
          <a href="assets/images/ai-rag-preview.svg" class="lightbox-trigger text-gradient-ai" style="font-weight:700; font-size:0.85rem; white-space:nowrap;"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?> 🔍</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- AI Solutions Showcase Section -->
<section class="ai-solutions-section">
  <div class="container">
    <div class="section-header">
      <span class="badge badge-ai"><i class="fa-solid fa-brain"></i> <?php echo __('section_ai_badge'); ?></span>
      <h2><?php echo __('section_ai_title'); ?></h2>
      <p><?php echo __('section_ai_sub'); ?></p>
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
      <span class="badge"><i class="fa-solid fa-layer-group"></i> <?php echo __('section_services_badge'); ?></span>
      <h2><?php echo __('section_services_title'); ?></h2>
      <p><?php echo __('section_services_sub'); ?></p>
    </div>

    <div class="features-grid">
      <?php foreach ($services as $service): ?>
        <div class="glass-card">
          <div class="feature-icon-wrapper">
            <i class="fa-solid <?php echo sanitize($service['icon']); ?>"></i>
          </div>
          <h3 class="feature-title"><?php echo sanitize($service['title']); ?></h3>
          <p class="feature-desc"><?php echo sanitize($service['short_description']); ?></p>
          <a href="services.php" class="feature-link"><?php echo __('btn_details'); ?> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section style="padding: 80px 0; background: linear-gradient(180deg, rgba(7, 9, 14, 0) 0%, rgba(15, 22, 36, 0.9) 100%);">
  <div class="container text-center">
    <span class="badge badge-ai" style="margin-bottom: 20px;"><i class="fa-solid fa-bolt"></i> <?php echo __('nav_get_quote'); ?></span>
    <h2 style="font-size: 2.5rem; margin-bottom: 20px;"><?php echo __('cta_title'); ?></h2>
    <p style="max-width: 600px; margin: 0 auto 30px auto; color: var(--text-muted);"><?php echo __('cta_desc'); ?></p>
    <a href="contact.php" class="btn btn-primary btn-lg"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
