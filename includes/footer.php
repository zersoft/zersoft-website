<?php
/**
 * Zersoft Technology - Footer Template
 */
$settings = getSiteSettings();
?>
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.php" class="brand-logo">
            <div class="logo-icon">
              <i class="fa-solid fa-code-branch"></i>
            </div>
            <span>ZER<span class="text-gradient">SOFT</span></span>
          </a>
          <p><?php echo sanitize($settings['site_tagline']); ?></p>
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
          <h4 class="footer-heading">Hızlı Bağlantılar</h4>
          <ul class="footer-links">
            <li><a href="index.php">Ana Sayfa</a></li>
            <li><a href="about.php">Hakkımızda & Vizyon</a></li>
            <li><a href="services.php">Kurumsal Hizmetler</a></li>
            <li><a href="ai-solutions.php">Yapay Zeka Çözümleri</a></li>
            <li><a href="portfolio.php">Projelerimiz</a></li>
            <li><a href="contact.php">İletişim & Teklif</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading">Hizmetlerimiz</h4>
          <ul class="footer-links">
            <li><a href="services.php">Yapay Zeka & Otomasyon</a></li>
            <li><a href="services.php">Özel Kurumsal SaaS</a></li>
            <li><a href="services.php">Mobil Uygulamalar</a></li>
            <li><a href="services.php">Bulut & DevOps</a></li>
            <li><a href="services.php">API Entegrasyonları</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading">İletişim Bilgileri</h4>
          <ul class="footer-links" style="line-height: 1.8;">
            <li><i class="fa-solid fa-location-dot text-gradient"></i> <?php echo sanitize($settings['address']); ?></li>
            <li><i class="fa-solid fa-phone text-gradient"></i> <?php echo sanitize($settings['phone']); ?></li>
            <li><i class="fa-solid fa-envelope text-gradient"></i> <?php echo sanitize($settings['email']); ?></li>
            <li><i class="fa-solid fa-clock text-gradient"></i> <?php echo sanitize($settings['working_hours']); ?></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php echo sanitize($settings['site_name']); ?>. Tüm hakları saklıdır. | Designed & Built for Modern Enterprise</p>
      </div>
    </div>
  </footer>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
