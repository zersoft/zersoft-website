<?php
/**
 * Zersoft Technology - Hakkımızda & Vizyon Sayfası (i18n Uyumlu)
 */
$pageTitle = __("about_hero_title");
$pageDescription = __("about_hero_desc");
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero-section" style="min-height: 40vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge"><i class="fa-solid fa-building"></i> <?php echo __('about_hero_badge'); ?></span>
    <h1 style="font-size: 3rem; margin: 20px 0;"><?php echo __('about_hero_title'); ?></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;"><?php echo __('about_hero_desc'); ?></p>
  </div>
</section>

<section style="padding: 40px 0 100px 0;">
  <div class="container">
    <div class="glass-card" style="margin-bottom: 50px; padding: 45px;">
      <h2 style="font-size: 2rem; margin-bottom: 20px;"><?php echo __('about_section_title'); ?></h2>
      <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
        <?php echo __('about_p1'); ?>
      </p>
      <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.8;">
        <?php echo __('about_p2'); ?>
      </p>
    </div>

    <!-- Vision & Mission Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
      <div class="glass-card">
        <div class="feature-icon-wrapper"><i class="fa-solid fa-eye"></i></div>
        <h3 style="font-size: 1.5rem; margin-bottom: 14px;"><?php echo __('about_vision_title'); ?></h3>
        <p style="color: var(--text-muted); line-height: 1.7;"><?php echo __('about_vision_desc'); ?></p>
      </div>

      <div class="glass-card">
        <div class="feature-icon-wrapper" style="background: rgba(127, 0, 255, 0.15); color: #e100ff; border-color: rgba(127, 0, 255, 0.3);"><i class="fa-solid fa-bullseye"></i></div>
        <h3 style="font-size: 1.5rem; margin-bottom: 14px;"><?php echo __('about_mission_title'); ?></h3>
        <p style="color: var(--text-muted); line-height: 1.7;"><?php echo __('about_mission_desc'); ?></p>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
