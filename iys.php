<?php
/**
 * Zersoft Technology - IYS (İmalat & Süreç Yönetim Programı) Ürün Detay Sayfası
 */
require_once __DIR__ . '/includes/init.php';
$pageTitle = __("iys_hero_title");
$pageDescription = __("iys_hero_desc");
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 45vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 900px; margin: 0 auto;">
    <span class="badge" style="background:rgba(225,0,255,0.1); color:#e100ff; border-color:rgba(225,0,255,0.3);"><i class="fa-solid fa-industry"></i> <?php echo __('iys_hero_badge'); ?></span>
    <h1 style="font-size: 3.2rem; margin: 20px 0;"><?php echo __('iys_hero_title'); ?></h1>
    <p style="color: var(--text-muted); font-size: 1.2rem; line-height: 1.8;">
      <?php echo __('iys_hero_desc'); ?>
    </p>
    <div style="display: flex; gap: 16px; justify-content: center; margin-top: 30px; flex-wrap: wrap;">
      <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-primary btn-lg">
        <i class="fa-solid fa-globe"></i> <?php echo __('iys_live_btn'); ?>
      </a>
      <a href="contact.php" class="btn btn-outline btn-lg">
        <i class="fa-solid fa-headset"></i> <?php echo __('nav_get_quote'); ?>
      </a>
    </div>
  </div>
</section>

<!-- 5-Stage Workflow Pipeline -->
<section style="padding: 40px 0 80px 0;">
  <div class="container">
    <div class="section-header">
      <span class="badge badge-ai"><i class="fa-solid fa-diagram-next"></i> <?php echo __('iys_pipeline_badge'); ?></span>
      <h2><?php echo __('iys_pipeline_title'); ?></h2>
      <p><?php echo __('iys_pipeline_sub'); ?></p>
    </div>

    <!-- Workflow Cards Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 50px;">
      <!-- Step 1 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #3b82f6;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #3b82f6;">STEP 1</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;"><?php echo __('iys_step1_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;"><?php echo __('iys_step1_desc'); ?></p>
      </div>

      <!-- Step 2 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #f59e0b;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #f59e0b;">STEP 2</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;"><?php echo __('iys_step2_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;"><?php echo __('iys_step2_desc'); ?></p>
      </div>

      <!-- Step 3 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #e100ff;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #e100ff;">STEP 3</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;"><?php echo __('iys_step3_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;"><?php echo __('iys_step3_desc'); ?></p>
      </div>

      <!-- Step 4 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #00f2fe;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #00f2fe;">STEP 4</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;"><?php echo __('iys_step4_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;"><?php echo __('iys_step4_desc'); ?></p>
      </div>

      <!-- Step 5 -->
      <div class="glass-card" style="padding: 24px; border-left: 4px solid #10b981;">
        <span style="font-size: 0.8rem; font-weight: 800; color: #10b981;">STEP 5</span>
        <h3 style="font-size: 1.2rem; margin: 10px 0; color: #fff;"><?php echo __('iys_step5_title'); ?></h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;"><?php echo __('iys_step5_desc'); ?></p>
      </div>
    </div>

    <!-- Screenshot Preview Panel -->
    <div class="glass-card" style="padding: 40px; margin-bottom: 60px;">
      <div class="responsive-split reverse-mobile">
        <div>
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('iys_hero_title'); ?>">
            <img src="assets/images/iys-preview.svg" alt="<?php echo __('iys_hero_title'); ?>" style="border-radius: 16px; border: 1px solid rgba(225,0,255,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
        <div>
          <span class="badge" style="background:rgba(0,242,254,0.1); color:#00f2fe; margin-bottom:12px;"><i class="fa-solid fa-desktop"></i> <?php echo __('iys_tech_badge'); ?></span>
          <h3 style="font-size: 1.8rem; margin-bottom: 16px; color:#fff;"><?php echo __('iys_tech_title'); ?></h3>
          <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.8; margin-bottom: 20px;">
            <?php echo __('iys_tech_desc'); ?>
          </p>
          <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-outline">
            <i class="fa-solid fa-globe"></i> iys.zersoft.net 🔗
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
