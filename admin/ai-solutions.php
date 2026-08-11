<?php
/**
 * Zersoft Technology - Admin Yapay Zeka Çözümleri Yönetimi
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
        $stmt = $db->prepare("DELETE FROM ai_solutions WHERE id = :id");
        $stmt->execute([':id' => $deleteId]);
        $success = 'Yapay Zeka Çözümü silindi.';
    } else {
        $error = 'Güvenlik hatası.';
    }
}

// Save Action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!verifyCSRFToken($csrf)) {
        $error = 'Güvenlik doğrulaması hatası.';
    } else {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $title = sanitize($_POST['title'] ?? '');
        $badge_text = sanitize($_POST['badge_text'] ?? 'AI Powered');
        $summary = sanitize($_POST['summary'] ?? '');
        $icon = sanitize($_POST['icon'] ?? 'fa-robot');
        $sort_order = (int)($_POST['sort_order'] ?? 0);
        
        $features_raw = $_POST['features'] ?? '';
        $features_array = array_values(array_filter(array_map('trim', explode("\n", $features_raw))));
        $features_json = json_json_encode($features_array);

        if (empty($title) || empty($summary)) {
            $error = 'Lütfen çözüm başlığını ve özetini doldurunuz.';
        } else {
            try {
                if ($id > 0) {
                    $stmt = $db->prepare("UPDATE ai_solutions SET title = :title, badge_text = :badge_text, summary = :summary, features_json = :features_json, icon = :icon, sort_order = :sort_order WHERE id = :id");
                    $stmt->execute([
                        ':title' => $title,
                        ':badge_text' => $badge_text,
                        ':summary' => $summary,
                        ':features_json' => $features_json,
                        ':icon' => $icon,
                        ':sort_order' => $sort_order,
                        ':id' => $id
                    ]);
                    $success = 'Yapay Zeka Çözümü güncellendi.';
                } else {
                    $stmt = $db->prepare("INSERT INTO ai_solutions (title, badge_text, summary, features_json, icon, sort_order) VALUES (:title, :badge_text, :summary, :features_json, :icon, :sort_order)");
                    $stmt->execute([
                        ':title' => $title,
                        ':badge_text' => $badge_text,
                        ':summary' => $summary,
                        ':features_json' => $features_json,
                        ':icon' => $icon,
                        ':sort_order' => $sort_order
                    ]);
                    $success = 'Yeni Yapay Zeka Çözümü eklendi.';
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
    $stmt = $db->prepare("SELECT * FROM ai_solutions WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $editId]);
    $editItem = $stmt->fetch();
}

$aiSolutions = getAISolutions();
?>

<div style="margin-bottom: 24px;">
  <h1 style="font-size: 1.8rem; font-weight: 800; color: #fff;">Yapay Zeka Çözümleri Yönetimi</h1>
  <p style="color: var(--admin-text-muted);">Firmanızın sunduğu RAG, LLM ve Otonom AI Agent ürün/hizmetlerini yönetin.</p>
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

<!-- Add/Edit Form -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">
    <i class="fa-solid fa-brain text-gradient"></i> <?php echo $editItem ? 'AI Çözümünü Düzenle' : 'Yeni AI Çözümü Ekle'; ?>
  </div>

  <form action="ai-solutions.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <?php if ($editItem): ?>
      <input type="hidden" name="id" value="<?php echo $editItem['id']; ?>">
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Çözüm Başlığı *</label>
        <input type="text" name="title" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['title'] ?? ''); ?>" placeholder="Örn: Kurumsal RAG & Doküman Zekası" required>
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Rozet Metni</label>
        <input type="text" name="badge_text" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['badge_text'] ?? 'Enterprise AI'); ?>" placeholder="Enterprise AI">
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">İkon (FA)</label>
        <input type="text" name="icon" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['icon'] ?? 'fa-robot'); ?>" placeholder="fa-robot">
      </div>

      <div>
        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Sıra</label>
        <input type="number" name="sort_order" class="form-control" style="background: #090d16;" value="<?php echo sanitize($editItem['sort_order'] ?? 0); ?>">
      </div>
    </div>

    <div style="margin-bottom: 16px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Çözüm Özeti *</label>
      <textarea name="summary" class="form-control" style="background: #090d16;" required><?php echo sanitize($editItem['summary'] ?? ''); ?></textarea>
    </div>

    <div style="margin-bottom: 20px;">
      <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px;">Öne Çıkan Özellikler (Her satıra bir özellik yazınız)</label>
      <?php 
        $featuresStr = '';
        if ($editItem && !empty($editItem['features_json'])) {
          $arr = json_decode($editItem['features_json'], true);
          if (is_array($arr)) {
            $featuresStr = implode("\n", $arr);
          }
        }
      ?>
      <textarea name="features" class="form-control" style="background: #090d16; min-height: 80px;" placeholder="On-Premise Çalışma&#10;KVKK Uyumluluğu&#10;Vektör DB Entegrasyonu"><?php echo sanitize($featuresStr); ?></textarea>
    </div>

    <button type="submit" class="btn-admin-primary">
      <i class="fa-solid fa-floppy-disk"></i> <?php echo $editItem ? 'Güncelle' : 'Kaydet'; ?>
    </button>
  </form>
</div>

<!-- List -->
<div class="card-panel">
  <div class="panel-title" style="margin-bottom: 20px;">Mevcut AI Çözümleri</div>
  <table class="admin-table">
    <thead>
      <tr>
        <th>Rozet</th>
        <th>Çözüm Başlığı</th>
        <th>Özet</th>
        <th>İşlem</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($aiSolutions as $ai): ?>
        <tr>
          <td><span class="status-badge badge-read"><?php echo sanitize($ai['badge_text']); ?></span></td>
          <td><strong><?php echo sanitize($ai['title']); ?></strong></td>
          <td style="color: var(--admin-text-muted); font-size: 0.85rem;"><?php echo sanitize($ai['summary']); ?></td>
          <td>
            <a href="ai-solutions.php?edit=<?php echo $ai['id']; ?>" class="btn-admin-primary btn-sm"><i class="fa-solid fa-pen"></i> Düzenle</a>
            <a href="ai-solutions.php?action=delete&id=<?php echo $ai['id']; ?>&csrf=<?php echo generateCSRFToken(); ?>" onclick="return confirm('Silmek istiyor musunuz?');" class="btn-admin-primary btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Sil</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</main>
</body>
</html>
