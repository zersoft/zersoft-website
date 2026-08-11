<?php
/**
 * Zersoft Technology - Admin Panel Layout Header & Sidebar
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$unreadMessagesCount = getUnreadMessagesCount();
$adminPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Zersoft</title>
  <!-- FontAwesome 6 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Admin CSS -->
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

  <!-- Admin Sidebar Navigation -->
  <aside class="admin-sidebar">
    <div class="sidebar-header">
      <div class="sidebar-logo-icon">
        <i class="fa-solid fa-code-branch"></i>
      </div>
      <div class="sidebar-title">ZER<span style="color: var(--admin-accent);">SOFT</span></div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section-title">Genel</div>
      <a href="index.php" class="admin-nav-item <?php echo $adminPage === 'index' ? 'active' : ''; ?>">
        <i class="fa-solid fa-chart-pie"></i>
        <span>Dashboard</span>
      </a>

      <a href="messages.php" class="admin-nav-item <?php echo $adminPage === 'messages' ? 'active' : ''; ?>">
        <i class="fa-solid fa-envelope"></i>
        <span>Mesajlar</span>
        <?php if ($unreadMessagesCount > 0): ?>
          <span class="badge-count"><?php echo $unreadMessagesCount; ?></span>
        <?php endif; ?>
      </a>

      <div class="nav-section-title" style="margin-top: 15px;">İçerik Yönetimi</div>
      <a href="services.php" class="admin-nav-item <?php echo $adminPage === 'services' ? 'active' : ''; ?>">
        <i class="fa-solid fa-gears"></i>
        <span>Hizmetlerimiz</span>
      </a>

      <a href="ai-solutions.php" class="admin-nav-item <?php echo $adminPage === 'ai-solutions' ? 'active' : ''; ?>">
        <i class="fa-solid fa-brain"></i>
        <span>Yapay Zeka Çözümleri</span>
      </a>

      <a href="projects.php" class="admin-nav-item <?php echo $adminPage === 'projects' ? 'active' : ''; ?>">
        <i class="fa-solid fa-laptop-code"></i>
        <span>Portföy / Projeler</span>
      </a>

      <div class="nav-section-title" style="margin-top: 15px;">Sistem</div>
      <a href="settings.php" class="admin-nav-item <?php echo $adminPage === 'settings' ? 'active' : ''; ?>">
        <i class="fa-solid fa-sliders"></i>
        <span>Site Ayarları</span>
      </a>

      <a href="../index.php" target="_blank" class="admin-nav-item">
        <i class="fa-solid fa-arrow-up-right-from-square"></i>
        <span>Canlı Siteyi Gör</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <a href="logout.php" class="btn-danger" style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px; border-radius: 8px; font-weight: 600; font-size: 0.9rem;">
        <i class="fa-solid fa-right-from-bracket"></i> Çıkış Yap
      </a>
    </div>
  </aside>

  <!-- Admin Main Layout -->
  <main class="admin-main">
    <!-- Topbar -->
    <header class="admin-topbar">
      <div style="font-weight: 700; font-size: 1.1rem; color: #fff;">
        Yönetim Paneli &bull; <span style="color: var(--admin-accent); font-weight: 500; font-size: 0.95rem;"><?php echo sanitize($_SESSION['admin_user_name'] ?? 'Yönetici'); ?></span>
      </div>

      <div class="user-profile">
        <div class="avatar">
          <?php echo strtoupper(substr($_SESSION['admin_user_name'] ?? 'A', 0, 1)); ?>
        </div>
        <div>
          <div style="font-weight: 600; font-size: 0.9rem;"><?php echo sanitize($_SESSION['admin_user_name'] ?? 'Yönetici'); ?></div>
          <div style="font-size: 0.75rem; color: var(--admin-text-muted);">Sistem Yöneticisi</div>
        </div>
      </div>
    </header>

    <div class="admin-content">
