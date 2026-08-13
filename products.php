<?php
/**
 * Zersoft Technology - Ürünlerimiz Sayfası (Tam i18n Uyumlu)
 */
$pageTitle = __("products_hero_title");
$pageDescription = __("products_hero_desc");
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 40vh; padding: 120px 0 60px 0;">
  <div class="container text-center" style="max-width: 860px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-box-open"></i> <?php echo __('products_hero_badge'); ?></span>
    <h1 style="font-size: 3rem; margin: 20px 0;"><?php echo __('products_hero_title'); ?></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.8;">
      <?php echo __('products_hero_desc'); ?>
    </p>
  </div>
</section>

<!-- ÜRÜN #1 — Hafriyat & Saha Kantar Otomasyonu -->
<section style="padding: 0 0 80px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px; margin-bottom: 40px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <span class="badge badge-ai" style="margin-bottom: 12px;"><i class="fa-solid fa-truck-ramp-box"></i> <?php echo __('prod_kantar_badge'); ?></span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;"><?php echo __('prod_kantar_title'); ?></h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            <?php echo __('prod_kantar_desc'); ?>
          </p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>
            <a href="assets/images/kantar-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="<?php echo __('prod_kantar_title'); ?>"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?></a>
          </div>
        </div>
        <div>
          <a href="assets/images/kantar-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_kantar_title'); ?>">
            <img src="assets/images/kantar-preview.svg" alt="<?php echo __('prod_kantar_title'); ?>" style="border-radius: 16px; border: 1px solid var(--border-glow); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ÜRÜN #2 — IYS İş & Süreç Yönetim Programı -->
<section style="padding: 0 0 80px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px; margin-bottom: 40px; position: relative; overflow: hidden;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <a href="assets/images/iys-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_iys_title'); ?>">
            <img src="assets/images/iys-preview.svg" alt="<?php echo __('prod_iys_title'); ?>" style="border-radius: 16px; border: 1px solid rgba(225,0,255,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>

        <div>
          <span class="badge" style="margin-bottom: 12px; background: rgba(225,0,255,0.1); color:#e100ff; border-color:rgba(225,0,255,0.3);"><i class="fa-solid fa-industry"></i> <?php echo __('prod_iys_badge'); ?></span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;"><?php echo __('prod_iys_title'); ?></h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            <?php echo __('prod_iys_desc'); ?>
          </p>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="iys.php" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> <?php echo __('prod_iys_btn_explore'); ?></a>
            <a href="https://iys.zersoft.net" target="_blank" class="btn btn-outline"><i class="fa-solid fa-globe"></i> iys.zersoft.net 🔗</a>
            <a href="assets/images/iys-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="<?php echo __('prod_iys_title'); ?>"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ÜRÜN #3 — Katı Atık & Maden Ocağı Kantar Sistemi -->
<section style="padding: 0 0 100px 0;">
  <div class="container">
    <div class="glass-card" style="padding: 48px;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <span class="badge" style="margin-bottom: 12px; background: rgba(16,185,129,0.1); color:#10b981; border-color:rgba(16,185,129,0.3);"><i class="fa-solid fa-weight-hanging"></i> <?php echo __('prod_kati_badge'); ?></span>
          <h2 style="font-size: 2.2rem; margin-bottom: 16px;"><?php echo __('prod_kati_title'); ?></h2>
          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            <?php echo __('prod_kati_desc'); ?>
          </p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>
            <a href="assets/images/kati-atik-preview.svg" class="lightbox-trigger btn btn-outline" data-caption="<?php echo __('prod_kati_title'); ?>"><i class="fa-solid fa-expand"></i> <?php echo __('btn_preview'); ?></a>
          </div>
        </div>
        <div>
          <a href="assets/images/kati-atik-preview.svg" class="lightbox-trigger" data-caption="<?php echo __('prod_kati_title'); ?>">
            <img src="assets/images/kati-atik-preview.svg" alt="<?php echo __('prod_kati_title'); ?>" style="border-radius: 16px; border: 1px solid rgba(16,185,129,0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
