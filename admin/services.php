<?php
/**
 * Zersoft Technology - Admin Hizmet Yönetimi
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
        $stmt = $db->prepare("DELETE FROM services WHERE id = :id");
        $stmt->execute([':id' => $deleteId]);
        $success = 'Hizmet başarıyla silindi.';
    } else {
        $error = 'Güvenlik doğrulaması hatası.';
    }
}

// Add/Edit Form Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik doğrulaması hatası.';
    } else {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $title = trim($_POST['title'] ?? '');
        $short_desc = trim($_POST['short_description'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $icon = trim($_POST['icon'] ?? 'fa-code');
        $sort_order = (int)($_POST['sort_order'] ?? 0);
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

        if (empty($title) || empty($short_desc) || empty($content)) {
            $error = 'Lütfen tüm zorunlu alanları doldurunuz.';
        } else {
            try {
                if ($id > 0) {
                    $stmt = $db->prepare("UPDATE services SET title = :title, slug = :slug, short_description = :short_description, content = :content, icon = :icon, sort_order = :sort_order WHERE id = :id");
                    $stmt->execute([
                        ':title' => $title,
                        ':slug' => $slug,
                        ':short_description' => $short_desc,
                        ':content' => $content,
                        ':icon' => $icon,
                        ':sort_order' => $sort_order,
                        ':id' => $id
                    ]);
                    $success = 'Hizmet başarıyla güncellendi.';
                } else {
                    $stmt = $db->prepare("INSERT INTO services (title, slug, short_description, content, icon, sort_order) VALUES (:title, :slug, :short_description, :content, :icon, :sort_order)");
                    $stmt->execute([
                        ':title' => $title,
                        ':slug' => $slug,
                        ':short_description' => $short_desc,
                        ':content' => $content,
                        ':icon' => $icon,
                        ':sort_order' => $sort_order
                    ]);
                    $success = 'Yeni hizmet başarıyla eklendi.';
                }
            } catch (Exception $e) {
                $error = 'Hata: ' . $e->getMessage();
            }
        }
    }
}

// Fetch item for edit if edit parameter passed
$editItem = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $stmt = $db->prepare("SELECT * FROM services WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $editId]);
    $editItem = $stmt->fetch();
}

$services = getServices();
?>

<div style="margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
  <div>
    <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Kurumsal Hizmet Yönetimi</h1>
    <p style="color: var(--admin-text-muted);">Web sitesinde listelenen hizmetleri düzenleyebilir, yeni hizmet ekleyebilirsiniz.</p>
  </div>
</div>

<?php if ($success): ?>
  <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fa-solid fa-circle-check"></i> <?php echo $success; ?>
  </div>
<?php endif; ?>

<?php if ($error): ?>
  <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px;">
    <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
  </div>
<?php endif; ?>

<!-- Add / Edit Form -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">
    <i class="fa-solid fa-pen-to-square text-gradient"></i> <?php echo $editItem ? 'Hizmeti Düzenle' : 'Yeni Hizmet Ekle'; ?>
  </div>

  <form action="services.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <?php if ($editItem): ?>
      <input type="hidden" name="id" value="<?php echo $editItem['id']; ?>">
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Hizmet Başlığı *</label>
        <input type="text" name="title" class="form-control" style="background: #090d16; color: #ffffff;" value="<?php echo sanitize($editItem['title'] ?? ''); ?>" placeholder="Örn: Yapay Zeka & Otomasyon" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">FontAwesome İkon *</label>
        <input type="text" name="icon" class="form-control" style="background: #090d16; color: #ffffff;" value="<?php echo sanitize($editItem['icon'] ?? 'fa-code'); ?>" placeholder="fa-brain" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Sıra No</label>
        <input type="number" name="sort_order" class="form-control" style="background: #090d16; color: #ffffff;" value="<?php echo sanitize($editItem['sort_order'] ?? 0); ?>">
      </div>
    </div>

    <div style="margin-bottom: 16px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Kısa Açıklama (Ana Sayfa Kartında Görünür) *</label>
      <input type="text" name="short_description" class="form-control" style="background: #090d16; color: #ffffff;" value="<?php echo sanitize($editItem['short_description'] ?? ''); ?>" placeholder="İş süreçlerinizi otonom hale getiren çözümler..." required>
    </div>

    <div style="margin-bottom: 20px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Detaylı Hizmet İçeriği *</label>
      <textarea name="content" class="form-control" style="background: #090d16; min-height: 100px;" required><?php echo sanitize($editItem['content'] ?? ''); ?></textarea>
    </div>

    <div style="display: flex; gap: 12px;">
      <button type="submit" class="btn-admin-primary">
        <i class="fa-solid fa-floppy-disk"></i> <?php echo $editItem ? 'Hizmeti Güncelle' : 'Kaydet'; ?>
      </button>
      <?php if ($editItem): ?>
        <a href="services.php" class="btn-admin-primary btn-danger"><i class="fa-solid fa-xmark"></i> İptal</a>
      <?php endif; ?>
    </div>
  </form>
</div>

<!-- List Services -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">
    <i class="fa-solid fa-list text-gradient"></i> Mevcut Hizmetler Listesi
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Sıra</th>
        <th>İkon</th>
        <th>Hizmet Başlığı</th>
        <th>Kısa Açıklama</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($services as $service): ?>
        <tr>
          <td>#<?php echo $service['sort_order']; ?></td>
          <td><i class="fa-solid <?php echo sanitize($service['icon']); ?>" style="font-size: 1.3rem; color: var(--admin-accent);"></i></td>
          <td><strong><?php echo sanitize($service['title']); ?></strong></td>
          <td style="color: var(--admin-text-muted); font-size: 0.85rem;"><?php echo sanitize($service['short_description']); ?></td>
          <td>
            <a href="services.php?edit=<?php echo $service['id']; ?>" class="btn-admin-primary btn-sm"><i class="fa-solid fa-pen"></i> Düzenle</a>
            <a href="services.php?action=delete&id=<?php echo $service['id']; ?>&csrf=<?php echo generateCSRFToken(); ?>" onclick="return confirm('Bu hizmeti silmek istediğinizden emin misiniz?');" class="btn-admin-primary btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Sil</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</main>
</body>
</html>
