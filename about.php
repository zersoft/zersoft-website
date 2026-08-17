<?php
/**
 * Zersoft Technology - Hakkımızda & Vizyon Sayfası (i18n Uyumlu)
 */
require_once __DIR__ . '/includes/init.php';
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

    <!-- Brand Story Section: Convergence Mark -->
    <div class="glass-card" style="margin-bottom: 50px; padding: 50px 45px; position: relative; overflow: hidden;">
      <!-- Decorative background mark -->
      <div style="position:absolute; right:-20px; top:50%; transform:translateY(-50%); opacity:0.04; pointer-events:none;">
        <svg width="260" height="180" viewBox="0 0 300 64" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="bgG1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#0ea5e9"/><stop offset="100%" stop-color="#0ea5e9" stop-opacity="0"/></linearGradient>
            <linearGradient id="bgG2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#6366f1"/><stop offset="100%" stop-color="#6366f1" stop-opacity="0"/></linearGradient>
          </defs>
          <polygon points="0,5 3,11 44,33 44,31" fill="url(#bgG1)"/>
          <polygon points="0,29 0,35 44,33 44,31" fill="url(#bgG1)"/>
          <polygon points="0,53 3,59 44,33 44,31" fill="url(#bgG2)"/>
        </svg>
      </div>

      <span class="badge" style="margin-bottom: 22px; display:inline-block;">
        <i class="fa-solid fa-infinity"></i> <?php echo __('brand_story_badge'); ?>
      </span>
      <h2 style="font-size: 2rem; margin-bottom: 12px;"><?php echo __('brand_story_title'); ?></h2>
      <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 40px; max-width:620px;">
        <?php echo __('brand_story_sub'); ?>
      </p>

      <!-- Three streams → focal point layout -->
      <div style="display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 0; margin-bottom: 36px;">

        <!-- Streams (left side) -->
        <div style="display: flex; flex-direction: column; gap: 18px;">

          <div style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:4px; height:56px; background: linear-gradient(to bottom, #22d3ee, transparent); border-radius:4px; flex-shrink:0; margin-top:4px;"></div>
            <div>
              <div style="font-weight:800; font-size:0.95rem; color: #22d3ee; margin-bottom:4px;"><?php echo __('brand_story_stream1'); ?></div>
              <div style="font-size:0.9rem; color:var(--text-muted); line-height:1.5;"><?php echo __('brand_story_stream1_desc'); ?></div>
            </div>
          </div>

          <div style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:4px; height:56px; background: linear-gradient(to bottom, #0ea5e9, transparent); border-radius:4px; flex-shrink:0; margin-top:4px;"></div>
            <div>
              <div style="font-weight:800; font-size:0.95rem; color: #0ea5e9; margin-bottom:4px;"><?php echo __('brand_story_stream2'); ?></div>
              <div style="font-size:0.9rem; color:var(--text-muted); line-height:1.5;"><?php echo __('brand_story_stream2_desc'); ?></div>
            </div>
          </div>

          <div style="display:flex; align-items:flex-start; gap:14px;">
            <div style="width:4px; height:56px; background: linear-gradient(to bottom, #8b5cf6, transparent); border-radius:4px; flex-shrink:0; margin-top:4px;"></div>
            <div>
              <div style="font-weight:800; font-size:0.95rem; color: #a78bfa; margin-bottom:4px;"><?php echo __('brand_story_stream3'); ?></div>
              <div style="font-size:0.9rem; color:var(--text-muted); line-height:1.5;"><?php echo __('brand_story_stream3_desc'); ?></div>
            </div>
          </div>

        </div>

        <!-- Convergence Mark (center SVG) -->
        <div style="padding: 0 32px; flex-shrink:0;">
          <svg viewBox="0 0 60 64" width="80" height="88" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 0 18px rgba(14,165,233,0.25));">
            <defs>
              <linearGradient id="bsG1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#22d3ee" stop-opacity="0.5"/><stop offset="75%" stop-color="#22d3ee" stop-opacity="1"/><stop offset="100%" stop-color="#22d3ee" stop-opacity="0"/>
              </linearGradient>
              <linearGradient id="bsG2" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#0ea5e9" stop-opacity="0.55"/><stop offset="75%" stop-color="#0ea5e9" stop-opacity="1"/><stop offset="100%" stop-color="#0ea5e9" stop-opacity="0"/>
              </linearGradient>
              <linearGradient id="bsG3" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#6366f1" stop-opacity="0.4"/><stop offset="75%" stop-color="#6366f1" stop-opacity="1"/><stop offset="100%" stop-color="#6366f1" stop-opacity="0"/>
              </linearGradient>
            </defs>
            <polygon points="3,5  6,11  47,33 47,31" fill="url(#bsG1)"/>
            <polygon points="3,29 3,35  47,33 47,31" fill="url(#bsG2)"/>
            <polygon points="3,53 6,59  47,33 47,31" fill="url(#bsG3)"/>
            <circle cx="47" cy="32" r="5" fill="#0ea5e9"/>
            <circle cx="47" cy="32" r="2" fill="#ffffff"/>
          </svg>
        </div>

        <!-- Focal point (right side) -->
        <div style="padding-left: 10px;">
          <div style="font-weight:800; font-size:1.05rem; margin-bottom:8px; background: linear-gradient(135deg, #0ea5e9, #38bdf8); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
            <?php echo __('brand_story_point'); ?>
          </div>
          <div style="font-size:0.9rem; color:var(--text-muted); line-height:1.6; max-width:240px;">
            <?php echo __('brand_story_point_desc'); ?>
          </div>
        </div>

      </div>

      <!-- Hidden meaning note -->
      <div style="border-top: 1px solid var(--border-glow); padding-top: 24px; display:flex; align-items:flex-start; gap: 16px;">
        <div style="width:36px; height:36px; border-radius:9px; background:rgba(14,165,233,0.12); border:1px solid rgba(14,165,233,0.25); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
          <i class="fa-solid fa-eye" style="color: #0ea5e9; font-size:0.85rem;"></i>
        </div>
        <div>
          <div style="font-weight:700; font-size:0.875rem; margin-bottom:4px;">Gizli Anlam</div>
          <div style="font-size:0.875rem; color:var(--text-muted); line-height:1.6;">
            <?php echo __('brand_story_hidden'); ?>
          </div>
        </div>
      </div>

      <!-- Brand tagline -->
      <div style="margin-top:28px; padding: 18px 22px; border-radius: 12px; background: rgba(14,165,233,0.06); border: 1px solid rgba(14,165,233,0.15); font-size:1rem; font-style:italic; color:var(--text-muted); line-height:1.7;">
        <?php echo __('brand_story_tagline'); ?>
      </div>
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
