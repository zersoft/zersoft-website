<?php
/**
 * Zersoft Technology - Admin Dashboard Overview
 */
require_once __DIR__ . '/header.php';

global $db;

// Metrics Queries
$unreadCount = getUnreadMessagesCount();
$totalMessages = 0;
$servicesCount = 0;
$aiCount = 0;
$projectsCount = 0;

try {
    $totalMessages = (int)$db->query("SELECT COUNT(*) FROM messages")->fetchColumn();
    $servicesCount = (int)$db->query("SELECT COUNT(*) FROM services")->fetchColumn();
    $aiCount = (int)$db->query("SELECT COUNT(*) FROM ai_solutions")->fetchColumn();
    $projectsCount = (int)$db->query("SELECT COUNT(*) FROM projects")->fetchColumn();

    // Recent Messages
    $recentMessages = $db->query("SELECT * FROM messages ORDER BY id DESC LIMIT 5")->fetchAll();
} catch (Exception $e) {
    $recentMessages = [];
}
?>

<div style="margin-bottom: 24px;">
  <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Hoş Geldiniz, <?php echo sanitize($_SESSION['admin_user_name'] ?? 'Yönetici'); ?>! 👋</h1>
  <p style="color: var(--admin-text-muted);">Zersoft web sitesinin genel durumunu ve içerik metriklerini buradan yönetebilirsiniz.</p>
</div>

<!-- Metrics Grid -->
<div class="metrics-grid">
  <div class="metric-card">
    <div class="metric-icon" style="background: rgba(239, 68, 68, 0.15); color: #f87171;">
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div>
      <div class="metric-val"><?php echo $totalMessages; ?></div>
      <div class="metric-title">Gelen Mesajlar (<?php echo $unreadCount; ?> Okunmadı)</div>
    </div>
  </div>

  <div class="metric-card">
    <div class="metric-icon" style="background: rgba(0, 242, 254, 0.15); color: #00f2fe;">
      <i class="fa-solid fa-gears"></i>
    </div>
    <div>
      <div class="metric-val"><?php echo $servicesCount; ?></div>
      <div class="metric-title">Kurumsal Hizmetler</div>
    </div>
  </div>

  <div class="metric-card">
    <div class="metric-icon" style="background: rgba(127, 0, 255, 0.15); color: #e100ff;">
      <i class="fa-solid fa-brain"></i>
    </div>
    <div>
      <div class="metric-val"><?php echo $aiCount; ?></div>
      <div class="metric-title">Yapay Zeka Çözümleri</div>
    </div>
  </div>

  <div class="metric-card">
    <div class="metric-icon" style="background: rgba(16, 185, 129, 0.15); color: #34d399;">
      <i class="fa-solid fa-laptop-code"></i>
    </div>
    <div>
      <div class="metric-val"><?php echo $projectsCount; ?></div>
      <div class="metric-title">Portföy Projeleri</div>
    </div>
  </div>
</div>

<!-- Recent Messages Panel -->
<div class="card-panel">
  <div class="panel-header">
    <div class="panel-title"><i class="fa-solid fa-inbox text-gradient"></i> Son İletişim & Teklif Talepleri</div>
    <a href="messages.php" class="btn-admin-primary btn-sm"><i class="fa-solid fa-eye"></i> Tümünü Gör</a>
  </div>

  <?php if (empty($recentMessages)): ?>
    <div style="padding: 30px; text-align: center; color: var(--admin-text-muted);">
      Henüz gelen bir iletişim mesajı bulunmamaktadır.
    </div>
  <?php else: ?>
    <table class="admin-table">
      <thead>
        <tr>
          <th>Ad Soyad</th>
          <th>E-Posta / Telefon</th>
          <th>Konu</th>
          <th>Tarih</th>
          <th>Durum</th>
          <th>İşlem</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recentMessages as $msg): ?>
          <tr>
            <td><strong><?php echo sanitize($msg['full_name']); ?></strong></td>
            <td>
              <div><?php echo sanitize($msg['email']); ?></div>
              <div style="font-size: 0.8rem; color: var(--admin-text-muted);"><?php echo sanitize($msg['phone']); ?></div>
            </td>
            <td><?php echo sanitize($msg['subject']); ?></td>
            <td style="font-size: 0.8rem; color: var(--admin-text-muted);"><?php echo formatDate($msg['created_at']); ?></td>
            <td>
              <?php if ($msg['status'] === 'unread'): ?>
                <span class="status-badge badge-unread"><i class="fa-solid fa-bell"></i> Okunmadı</span>
              <?php else: ?>
                <span class="status-badge badge-read"><i class="fa-solid fa-check"></i> Okundu</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="messages.php?id=<?php echo $msg['id']; ?>" class="btn-admin-primary btn-sm"><i class="fa-solid fa-envelope-open"></i> Oku</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

</main>
</body>
</html>
