<?php
/**
 * Zersoft Technology - Header Template (SEO & i18n & Dark/Light Theme Uyumlu)
 */
require_once __DIR__ . '/init.php';

$settings = getSiteSettings();
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$lang = getCurrentLang();

$fullTitle = isset($pageTitle) 
  ? sanitize($pageTitle) . ' | ' . sanitize($settings['site_name']) 
  : sanitize($settings['site_name']) . ' - ' . __($settings['site_tagline'], 'Kantar Otomasyonu & Yapay Zeka Çözümleri');

$fullDesc = isset($pageDescription) 
  ? sanitize($pageDescription) 
  : sanitize($settings['meta_description']);

$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" data-theme="dark">
<head>
  <script>
    (function() {
      try {
        const saved = localStorage.getItem('zersoft_theme') || (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
        document.documentElement.setAttribute('data-theme', saved);
      } catch(e) {}
    })();
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $fullTitle; ?></title>
  <meta name="description" content="<?php echo $fullDesc; ?>">
  <meta name="keywords" content="zersoft, kantar otomasyonu, hafriyat kantar yazılımı, katı atık kantar otomasyonu, maden ocağı kantarı, iys süreç yönetimi, yapay zeka plaka tanıma, RAG doküman zekası, ön muhasebe yazılımı bursa">
  <meta name="author" content="ZERSOFT Bilişim Teknoloji">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo $canonicalUrl; ?>">

  <!-- OpenGraph (Facebook, LinkedIn, WhatsApp) -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
  <meta property="og:title" content="<?php echo $fullTitle; ?>">
  <meta property="og:description" content="<?php echo $fullDesc; ?>">
  <meta property="og:image" content="<?php echo (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/assets/images/og-image.jpg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Zersoft Teknoloji">
  <meta property="og:locale" content="<?php echo $lang === 'tr' ? 'tr_TR' : 'en_US'; ?>">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $fullTitle; ?>">
  <meta name="twitter:description" content="<?php echo $fullDesc; ?>">
  <meta name="twitter:image" content="<?php echo (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/assets/images/og-image.jpg">

  <!-- Schema.org JSON-LD Structured Data for Google/Bing -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Zersoft Saha Kantar Otomasyonu & AI",
    "operatingSystem": "Web, Windows, Linux",
    "applicationCategory": "BusinessApplication",
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "TRY"
    },
    "author": {
      "@type": "Organization",
      "name": "Zersoft Teknoloji",
      "url": "https://zersoft.net"
    }
  }
  </script>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg">
  <link rel="shortcut icon" href="assets/images/favicon.svg">
  
  <!-- FontAwesome 6 Icons CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Custom Design System -->
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- Main JavaScript -->
  <script src="assets/js/main.js" defer></script>
</head>
<body>

  <!-- Navigation Bar -->
  <header class="navbar">
    <div class="container nav-container">
      <a href="index.php" class="brand-logo" aria-label="Zersoft Ana Sayfa">
        <img src="assets/images/logo.svg" alt="Zersoft Teknoloji" width="150" height="36" style="height:36px; width:auto;" class="logo-img logo-dark animated-logo" id="site-logo-dark">
        <img src="assets/images/logo-light.svg" alt="Zersoft Teknoloji" width="150" height="36" style="height:36px; width:auto;" class="logo-img logo-light animated-logo" id="site-logo-light">
      </a>

      <ul class="nav-links">
        <li><a href="index.php" class="nav-link <?php echo $currentPage === 'index' ? 'active' : ''; ?>"><?php echo __('nav_home'); ?></a></li>
        <li><a href="services.php" class="nav-link <?php echo $currentPage === 'services' ? 'active' : ''; ?>"><?php echo __('nav_services'); ?></a></li>
        <li><a href="products.php" class="nav-link <?php echo $currentPage === 'products' ? 'active' : ''; ?>"><i class="fa-solid fa-box-open" style="font-size:0.85em;"></i> <?php echo __('nav_products'); ?></a></li>
        <li><a href="ai-solutions.php" class="nav-link <?php echo $currentPage === 'ai-solutions' ? 'active' : ''; ?>"><i class="fa-solid fa-wand-magic-sparkles text-gradient-ai"></i> <?php echo __('nav_ai'); ?></a></li>
        <li><a href="portfolio.php" class="nav-link <?php echo $currentPage === 'portfolio' ? 'active' : ''; ?>"><?php echo __('nav_portfolio'); ?></a></li>
        <li><a href="about.php" class="nav-link <?php echo $currentPage === 'about' ? 'active' : ''; ?>"><?php echo __('nav_about'); ?></a></li>
        <li><a href="contact.php" class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>"><?php echo __('nav_contact'); ?></a></li>
      </ul>

      <div class="header-actions">
        <!-- Language Switcher -->
        <div class="lang-switch">
          <a href="?lang=tr" class="lang-btn <?php echo $lang === 'tr' ? 'active' : ''; ?>">TR</a>
          <a href="?lang=en" class="lang-btn <?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a>
        </div>

        <!-- Theme Toggle Button -->
        <button class="theme-toggle-btn" aria-label="Temayı Değiştir" title="Temayı Değiştir">
          <i class="fa-solid fa-sun"></i>
        </button>

        <a href="contact.php" class="btn btn-primary btn-quote"><i class="fa-solid fa-paper-plane"></i> <?php echo __('nav_get_quote'); ?></a>

        <button class="mobile-toggle" aria-label="Menüyü Aç/Kapat">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </header>
