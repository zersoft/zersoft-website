<?php
/**
 * Zersoft Technology - Footer Template (KVKK & SEO & Tam i18n Uyumlu)
 */
$settings = getSiteSettings();
?>
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.php" class="brand-logo">
            <img src="assets/images/logo.svg" alt="Zersoft Teknoloji" width="160" height="40" style="height:40px; width:auto;">
          </a>
          <p><?php echo __('site_tagline'); ?></p>
          <div class="social-links">
            <?php if (!empty($settings['facebook'])): ?>
              <a href="<?php echo sanitize($settings['facebook']); ?>" target="_blank" class="social-icon" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if (!empty($settings['twitter'])): ?>
              <a href="<?php echo sanitize($settings['twitter']); ?>" target="_blank" class="social-icon" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <?php endif; ?>
            <?php if (!empty($settings['linkedin'])): ?>
              <a href="<?php echo sanitize($settings['linkedin']); ?>" target="_blank" class="social-icon" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            <?php endif; ?>
            <?php if (!empty($settings['github'])): ?>
              <a href="<?php echo sanitize($settings['github']); ?>" target="_blank" class="social-icon" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
            <?php endif; ?>
          </div>
        </div>

        <div>
          <h4 class="footer-heading"><?php echo __('footer_quick_links'); ?></h4>
          <ul class="footer-links">
            <li><a href="index.php"><?php echo __('nav_home'); ?></a></li>
            <li><a href="about.php"><?php echo __('nav_about'); ?></a></li>
            <li><a href="services.php"><?php echo __('nav_services'); ?></a></li>
            <li><a href="products.php"><?php echo __('nav_products'); ?></a></li>
            <li><a href="ai-solutions.php"><?php echo __('nav_ai'); ?></a></li>
            <li><a href="portfolio.php"><?php echo __('nav_portfolio'); ?></a></li>
            <li><a href="contact.php"><?php echo __('nav_contact'); ?></a></li>
            <li><a href="privacy-policy.php" style="color: #00f2fe; font-weight: 700;">🔒 <?php echo __('cookie_policy'); ?></a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading"><?php echo __('footer_solutions'); ?></h4>
          <ul class="footer-links">
            <li><a href="products.php"><?php echo __('prod_kantar_title'); ?></a></li>
            <li><a href="iys.php"><?php echo __('prod_iys_title'); ?></a></li>
            <li><a href="products.php"><?php echo __('prod_kati_title'); ?></a></li>
            <li><a href="ai-solutions.php"><?php echo __('slide3_title'); ?></a></li>
            <li><a href="services.php"><?php echo __('section_services_title'); ?></a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading"><?php echo __('footer_contact'); ?></h4>
          <ul class="footer-links">
            <li><i class="fa-solid fa-phone text-gradient"></i> <?php echo sanitize($settings['phone']); ?></li>
            <li><i class="fa-solid fa-envelope text-gradient"></i> <?php echo sanitize($settings['email']); ?></li>
            <li><i class="fa-solid fa-location-dot text-gradient"></i> <?php echo sanitize($settings['address']); ?></li>
            <li><i class="fa-solid fa-clock text-gradient"></i> <?php echo sanitize($settings['working_hours']); ?></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> ZERSOFT Technology. <?php echo __('footer_rights'); ?></p>
        <p style="font-size:0.85rem; color:var(--text-dim);"><?php echo __('footer_compliance'); ?></p>
      </div>
    </div>
  </footer>

</body>
</html>
