<?php
/**
 * Zersoft Technology - Projelerimiz & Portföy Sayfası (i18n Uyumlu)
 */
$pageTitle = __("portfolio_hero_title");
$pageDescription = __("portfolio_hero_desc");
require_once __DIR__ . '/includes/header.php';

$projects = getProjects();
?>

<section class="hero-section" style="min-height: 40vh; padding: 140px 0 60px 0;">
  <div class="container text-center" style="max-width: 800px; margin: 0 auto;">
    <span class="badge"><i class="fa-solid fa-trophy"></i> <?php echo __('portfolio_hero_badge'); ?></span>
    <h1 style="font-size: 3rem; margin: 20px 0;"><?php echo __('portfolio_hero_title'); ?></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;"><?php echo __('portfolio_hero_desc'); ?></p>
  </div>
</section>

<section style="padding: 40px 0 100px 0;">
  <div class="container">
    <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
      <?php foreach ($projects as $project): ?>
        <div class="project-card">
          <div class="project-img" style="background-color: #111827; display: flex; align-items: center; justify-content: center; height: 200px;">
            <i class="fa-solid fa-code-merge" style="font-size: 3.5rem; color: rgba(0, 242, 254, 0.3);"></i>
            <div class="project-overlay"></div>
          </div>
          <div class="project-info">
            <div class="project-cat"><?php echo sanitize($project['category']); ?> &bull; <?php echo sanitize($project['client']); ?></div>
            <h2 class="project-title" style="font-size: 1.35rem;"><?php echo sanitize($project['title']); ?></h2>
            <p class="project-desc"><?php echo sanitize($project['description']); ?></p>
            <div class="feature-tags">
              <?php foreach (explode(',', $project['tech_stack']) as $tech): ?>
                <span class="tag"><i class="fa-solid fa-cube text-gradient"></i> <?php echo sanitize(trim($tech)); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
