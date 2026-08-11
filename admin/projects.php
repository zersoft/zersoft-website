<?php
/**
 * Zersoft Technology - Admin Portföy Proje Yönetimi
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
        $stmt = $db->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->execute([':id' => $deleteId]);
        $success = 'Proje silindi.';
    } else {
        $error = 'Güvenlik hatası.';
    }
}

// Add / Edit Action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik hatası.';
    } else {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $title = sanitize($_POST['title'] ?? '');
        $client = sanitize($_POST['client'] ?? '');
        $category = sanitize($_POST['category'] ?? 'Yapay Zeka');
        $tech_stack = sanitize($_POST['tech_stack'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $live_url = sanitize($_POST['live_url'] ?? '#');
        $sort_order = (int)($_POST['sort_order'] ?? 0);

        if (empty($title) || empty($client) || empty($description)) {
            $error = 'Lütfen proje adı, müşteri adı ve açıklama alanlarını doldurunuz.';
        } else {
            try {
                if ($id > 0) {
                    $stmt = $db->prepare("UPDATE projects SET title = :title, client = :client, category = :category, tech_stack = :tech_stack, description = :description, live_url = :live_url, sort_order = :sort_order WHERE id = :id");
                    $stmt->execute([
                        ':title' => $title,
                        ':client' => $client,
                        ':category' => $category,
                        ':tech_stack' => $tech_stack,
                        ':description' => $description,
                        ':live_url' => $live_url,
                        ':sort_order' => $sort_order,
                        ':id' => $id
                    ]);
                    $success = 'Proje güncellendi.';
                } else {
                    $stmt = $db->prepare("INSERT INTO projects (title, client, category, tech_stack, description, live_url, sort_order) VALUES (:title, :client, :category, :tech_stack, :description, :live_url, :sort_order)");
                    $stmt->execute([
                        ':title' => $title,
                        ':client' => $client,
                        ':category' => $category,
                        ':tech_stack' => $tech_stack,
                        ':description' => $description,
                        ':live_url' => $live_url,
                        ':sort_order' => $sort_order
                    ]);
                    $success = 'Yeni proje eklendi.';
                }
            } catch (Exception $e) {
                $error = 'Hata: ' . $e->getMessage();
            }
        }
    }
}

$editItem = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $editId]);
    $editItem = $stmt->fetch();
}

$projects = getProjects();
?>

<div style="margin-bottom: 24px;">
  <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Portföy / Proje Yönetimi</h1>
  <p style="color: var(--admin-text-muted);">Müşteri başarı hikayelerini ve teknik detayları buradan düzenleyebilirsiniz.</p>
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

<!-- Form -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;"><?php echo $editItem ? 'Projeyi Düzenle' : 'Yeni Proje Ekle'; ?></div>
  
  <form action="projects.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <?php if ($editItem): ?>
      <input type="hidden" name="id" value="<?php echo $editItem['id']; ?>">
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Proje Adı *</label>
        <input type="text" name="title" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['title'] ?? ''); ?>" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Müşteri / Kurum *</label>
        <input type="text" name="client" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['client'] ?? ''); ?>" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Kategori</label>
        <input type="text" name="category" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['category'] ?? 'Yapay Zeka'); ?>">
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Kullanılan Teknolojiler (Virgülle ayırın)</label>
        <input type="text" name="tech_stack" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['tech_stack'] ?? ''); ?>" placeholder="Python, React, PHP 8, OpenAI">
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Canlı Link / URL</label>
        <input type="text" name="live_url" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['live_url'] ?? '#'); ?>">
      </div>
    </div>

    <div style="margin-bottom: 20px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Proje Açıklaması *</label>
      <textarea name="description" class="form-control" style="background: #090d16;" required><?php echo sanitize($editItem['description'] ?? ''); ?></textarea>
    </div>

    <button type="submit" class="btn-admin-primary">
      <i class="fa-solid fa-floppy-disk"></i> Kaydet
    </button>
  </form>
</div>

<!-- List -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">Mevcut Projeler</div>
  <table class="admin-table">
    <thead>
      <tr>
        <th>Proje Adı</th>
        <th>Müşteri</th>
        <th>Kategori</th>
        <th>Teknolojiler</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($projects as $proj): ?>
        <tr>
          <td><strong><?php echo sanitize($proj['title']); ?></strong></td>
          <td><?php echo sanitize($proj['client']); ?></td>
          <td><span class="status-badge badge-read"><?php echo sanitize($proj['category']); ?></span></td>
          <td style="font-size: 0.85rem; color: var(--admin-text-muted);"><?php echo sanitize($proj['tech_stack']); ?></td>
          <td>
            <a href="projects.php?edit=<?php echo $proj['id']; ?>" class="btn-admin-primary btn-sm"><i class="fa-solid fa-pen"></i> Düzenle</a>
            <a href="projects.php?action=delete&id=<?php echo $proj['id']; ?>&csrf=<?php echo generateCSRFToken(); ?>" onclick="return confirm('Silmek istiyor musunuz?');" class="btn-admin-primary btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Sil</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</main>
</body>
</html>
