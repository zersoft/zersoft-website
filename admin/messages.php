<?php
/**
 * Zersoft Technology - Admin İletişim Mesajları Yönetimi
 */
require_once __DIR__ . '/header.php';

global $db;
$error = '';
$success = '';

// Delete Action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $deleteId = (int)$_GET['id'];
    $csrf = $_GET['csrf'] ?? '';
    if (verifyCSRFToken($csrf)) {
        $stmt = $db->prepare("DELETE FROM messages WHERE id = :id");
        $stmt->execute([':id' => $deleteId]);
        $success = 'Mesaj başarıyla silindi.';
    } else {
        $error = 'Güvenlik hatası.';
    }
}

// Mark as Read Action
if (isset($_GET['action']) && $_GET['action'] === 'mark_read' && isset($_GET['id'])) {
    $msgId = (int)$_GET['id'];
    $stmt = $db->prepare("UPDATE messages SET status = 'read' WHERE id = :id");
    $stmt->execute([':id' => $msgId]);
    $success = 'Mesaj okundu olarak işaretlendi.';
}

// Single Message Detail View
$selectedMsg = null;
if (isset($_GET['id'])) {
    $msgId = (int)$_GET['id'];
    // Automatically mark read when viewed
    $stmt = $db->prepare("UPDATE messages SET status = 'read' WHERE id = :id");
    $stmt->execute([':id' => $msgId]);

    $stmt = $db->prepare("SELECT * FROM messages WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $msgId]);
    $selectedMsg = $stmt->fetch();
}

$messages = $db->query("SELECT * FROM messages ORDER BY id DESC")->fetchAll();
?>

<div style="margin-bottom: 24px;">
  <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Gelen İletişim ve Teklif Mesajları</h1>
  <p style="color: var(--admin-text-muted);">Web sitesi iletişim formundan gelen müşteri taleplerini inceleyin.</p>
</div>

<?php if ($success): ?>
  <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fa-solid fa-circle-check"></i> <?php echo $success; ?>
  </div>
<?php endif; ?>

<?php if ($selectedMsg): ?>
  <!-- Single Message Modal View -->
  <div class="card-panel" style="border-color: var(--admin-accent);">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--admin-border); padding-bottom: 16px;">
      <div>
        <h2 style="font-size: 1.4rem; font-weight: 700; color: #fff;"><?php echo sanitize($selectedMsg['subject']); ?></h2>
        <div style="font-size: 0.85rem; color: var(--admin-text-muted); margin-top: 4px;">
          Gönderen: <strong><?php echo sanitize($selectedMsg['full_name']); ?></strong> &bull; <?php echo formatDate($selectedMsg['created_at']); ?>
        </div>
      </div>
      <a href="messages.php" class="btn-admin-primary btn-sm"><i class="fa-solid fa-xmark"></i> Kapat</a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; background: rgba(0,0,0,0.2); padding: 16px; border-radius: 8px;">
      <div><strong>E-Posta:</strong> <a href="mailto:<?php echo sanitize($selectedMsg['email']); ?>" style="color: var(--admin-accent);"><?php echo sanitize($selectedMsg['email']); ?></a></div>
      <div><strong>Telefon:</strong> <?php echo sanitize($selectedMsg['phone']); ?></div>
    </div>

    <div style="background: #090d16; padding: 20px; border-radius: 8px; border: 1px solid var(--admin-border); line-height: 1.7; font-size: 1rem; color: #f1f5f9; margin-bottom: 20px;">
      <?php echo nl2br(sanitize($selectedMsg['message'])); ?>
    </div>

    <div style="display: flex; gap: 12px;">
      <a href="mailto:<?php echo sanitize($selectedMsg['email']); ?>?subject=Re: <?php echo urlencode($selectedMsg['subject']); ?>" class="btn-admin-primary"><i class="fa-solid fa-reply"></i> E-Posta ile Yanıtla</a>
      <a href="messages.php?action=delete&id=<?php echo $selectedMsg['id']; ?>&csrf=<?php echo generateCSRFToken(); ?>" onclick="return confirm('Bu mesajı silmek istiyor musunuz?');" class="btn-admin-primary btn-danger"><i class="fa-solid fa-trash"></i> Mesajı Sil</a>
    </div>
  </div>
<?php endif; ?>

<!-- Table List -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">Tüm Gelen Mesajlar</div>
  
  <?php if (empty($messages)): ?>
    <div style="padding: 30px; text-align: center; color: var(--admin-text-muted);">Henüz mesaj bulunmuyor.</div>
  <?php else: ?>
    <table class="admin-table">
      <thead>
        <tr>
          <th>Durum</th>
          <th>Gönderen</th>
          <th>E-Posta / Telefon</th>
          <th>Konu</th>
          <th>Tarih</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($messages as $msg): ?>
          <tr style="<?php echo $msg['status'] === 'unread' ? 'background: rgba(0, 242, 254, 0.04);' : ''; ?>">
            <td>
              <?php if ($msg['status'] === 'unread'): ?>
                <span class="status-badge badge-unread"><i class="fa-solid fa-envelope"></i> Okunmadı</span>
              <?php else: ?>
                <span class="status-badge badge-read"><i class="fa-solid fa-envelope-open"></i> Okundu</span>
              <?php endif; ?>
            </td>
            <td><strong><?php echo sanitize($msg['full_name']); ?></strong></td>
            <td>
              <div><?php echo sanitize($msg['email']); ?></div>
              <div style="font-size: 0.8rem; color: var(--admin-text-muted);"><?php echo sanitize($msg['phone']); ?></div>
            </td>
            <td><?php echo sanitize($msg['subject']); ?></td>
            <td style="font-size: 0.8rem; color: var(--admin-text-muted);"><?php echo formatDate($msg['created_at']); ?></td>
            <td>
              <a href="messages.php?id=<?php echo $msg['id']; ?>" class="btn-admin-primary btn-sm"><i class="fa-solid fa-eye"></i> Detay</a>
              <a href="messages.php?action=delete&id=<?php echo $msg['id']; ?>&csrf=<?php echo generateCSRFToken(); ?>" onclick="return confirm('Silmek istiyor musunuz?');" class="btn-admin-primary btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
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
