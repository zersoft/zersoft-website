<?php
/**
 * Zersoft Technology - Header Template
 */
require_once __DIR__ . '/functions.php';
$settings = getSiteSettings();
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? sanitize($pageTitle) . ' | ' . sanitize($settings['site_name']) : sanitize($settings['site_name']) . ' - ' . sanitize($settings['site_tagline']); ?></title>
  <meta name="description" content="<?php echo isset($pageDescription) ? sanitize($pageDescription) : sanitize($settings['meta_description']); ?>">
  
  <!-- FontAwesome 6 Icons CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Custom Design System -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

  <!-- Navigation Bar -->
  <header class="navbar">
    <div class="container nav-container">
      <a href="index.php" class="brand-logo">
        <div class="logo-icon">
          <i class="fa-solid fa-code-branch"></i>
        </div>
        <span>ZER<span class="text-gradient">SOFT</span></span>
      </a>

      <ul class="nav-links">
        <li><a href="index.php" class="nav-link <?php echo $currentPage === 'index' ? 'active' : ''; ?>">Ana Sayfa</a></li>
        <li><a href="services.php" class="nav-link <?php echo $currentPage === 'services' ? 'active' : ''; ?>">Hizmetlerimiz</a></li>
        <li><a href="products.php" class="nav-link <?php echo $currentPage === 'products' ? 'active' : ''; ?>"><i class="fa-solid fa-box-open" style="font-size:0.85em;"></i> Ürünlerimiz</a></li>
        <li><a href="ai-solutions.php" class="nav-link <?php echo $currentPage === 'ai-solutions' ? 'active' : ''; ?>"><i class="fa-solid fa-wand-magic-sparkles text-gradient-ai"></i> Yapay Zeka</a></li>
        <li><a href="portfolio.php" class="nav-link <?php echo $currentPage === 'portfolio' ? 'active' : ''; ?>">Projelerimiz</a></li>
        <li><a href="about.php" class="nav-link <?php echo $currentPage === 'about' ? 'active' : ''; ?>">Hakkımızda</a></li>
        <li><a href="contact.php" class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">İletişim</a></li>
        <li><a href="contact.php" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Teklif Alın</a></li>
      </ul>

      <button class="mobile-toggle" aria-label="Menüyü Aç/Kapat">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>
  </header>
