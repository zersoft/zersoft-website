<?php
/**
 * Zersoft Technology - Ürünlerimiz Sayfası
 */
$pageTitle = "Hazır Yazılım Ürünlerimiz";
$pageDescription = "Zersoft tarafından geliştirilen hazır yazılım ürünleri: İş ve Süreç Yönetim Programı, Kantar Otomasyonu ve daha fazlası.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 45vh; padding: 140px 0 70px 0;">
  <div class="container text-center" style="max-width: 860px; margin: 0 auto;">
    <span class="badge badge-ai"><i class="fa-solid fa-box-open"></i> HAZIR YAZILIM ÜRÜNLERİ</span>
    <h1 style="font-size: 3rem; margin: 20px 0;">Yılların Deneyiminden <span class="text-gradient">Doğan Ürünler</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem; line-height: 1.8;">
      Sahada test edilmiş, gerçek işletme ihtiyaçlarından doğan hazır yazılım ürünlerimiz. 
      Her biri yeni nesil teknolojilerle yeniden yazılma sürecinde.
    </p>
  </div>
</section>

<!-- ================================================================ -->
<!-- ÜRÜN #1 — İYS İş & Süreç Yönetim Programı                       -->
<!-- ================================================================ -->
<section style="padding: 0 0 80px 0;">
  <div class="container">

    <!-- Ürün Başlık Kartı -->
    <div class="glass-card" style="padding: 48px; margin-bottom: 40px; position: relative; overflow: hidden;">
      <!-- Dekoratif arka plan efekti -->
      <div style="position: absolute; top: -60px; right: -60px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(0,242,254,0.08) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>

      <div style="display: grid; grid-template-columns: 1fr auto; gap: 40px; align-items: start;">
        <div>
          <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px; flex-wrap: wrap;">
            <div class="feature-icon-wrapper" style="width: 60px; height: 60px; flex-shrink: 0;">
              <i class="fa-solid fa-diagram-project" style="font-size: 1.6rem;"></i>
            </div>
            <div>
              <span class="badge" style="margin-bottom: 6px; display: inline-block;">Microsoft Access • Masaüstü Uygulama</span>
              <h2 style="font-size: 2rem; margin: 0;">İYS — İş & Süreç Yönetim Programı</h2>
            </div>
          </div>

          <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.85; margin-bottom: 24px;">
            Tüm işletme süreçlerinizi tek bir ekranda yönetmenizi sağlayan, yıllar içinde 
            gerçek saha deneyimiyle olgunlaşmış masaüstü iş yönetim yazılımı. 
            Microsoft Access Forms üzerine inşa edilmiş, sezgisel arayüzü ve güçlü raporlama 
            altyapısıyla küçük ve orta ölçekli işletmelerin vazgeçilmezi olmuştur.
          </p>

          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-primary">
              <i class="fa-solid fa-eye"></i> Canlı Tanıtımı İncele
            </a>
            <a href="contact.php" class="btn btn-outline">
              <i class="fa-solid fa-headset"></i> Demo Talep Et
            </a>
            <span class="badge badge-ai" style="display: flex; align-items: center; gap: 6px; padding: 10px 18px; font-size: 0.85rem;">
              <i class="fa-solid fa-rotate"></i> Yeniden Yazılıyor
            </span>
          </div>
        </div>

        <!-- Sağ taraf istatistik kutusu -->
        <div style="min-width: 200px; display: flex; flex-direction: column; gap: 14px;">
          <div class="glass-card" style="padding: 20px; text-align: center; border-color: rgba(0,242,254,0.2);">
            <div style="font-size: 2rem; font-weight: 800; background: linear-gradient(135deg, #00f2fe, #4facfe); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">20+</div>
            <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 4px;">Yıllık Saha Deneyimi</div>
          </div>
          <div class="glass-card" style="padding: 20px; text-align: center; border-color: rgba(161,0,255,0.2);">
            <div style="font-size: 2rem; font-weight: 800; background: linear-gradient(135deg, #a100ff, #e100ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">100+</div>
            <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 4px;">Aktif Kullanıcı</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Özellikler Grid -->
    <div style="margin-bottom: 40px;">
      <div class="section-header" style="text-align: left; margin-bottom: 32px;">
        <span class="badge"><i class="fa-solid fa-list-check"></i> TEMEL ÖZELLİKLER</span>
        <h3 style="font-size: 1.7rem; margin: 12px 0 0 0;">Ne Yapabilirsiniz?</h3>
      </div>

      <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">

        <!-- Özellik 1 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-sitemap"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">İş Süreci Takibi</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Görev atama, süreç adımları, termin takibi ve sorumlu yönetimi tek ekrandan yapın.</p>
        </div>

        <!-- Özellik 2 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-users"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">Personel & Görev Yönetimi</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Çalışanlarınıza iş atayın, öncelik belirleyin ve tamamlanma durumlarını anlık takip edin.</p>
        </div>

        <!-- Özellik 3 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-chart-bar"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">Güçlü Raporlama</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Süreç verimliliği, çalışan performansı ve zaman analizlerini detaylı raporlarla görün.</p>
        </div>

        <!-- Özellik 4 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-file-contract"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">Evrak & Doküman Takibi</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Her iş sürecine bağlı belge, sözleşme ve ek dosyaları kayıt altına alın.</p>
        </div>

        <!-- Özellik 5 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-bell"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">Hatırlatma & Bildirim</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Termin yaklaşan işler için otomatik hatırlatmalar alın, hiçbir görevi kaçırmayın.</p>
        </div>

        <!-- Özellik 6 -->
        <div class="glass-card" style="padding: 28px;">
          <div class="feature-icon-wrapper" style="width: 50px; height: 50px; margin-bottom: 16px;">
            <i class="fa-solid fa-lock"></i>
          </div>
          <h4 class="feature-title" style="font-size: 1.1rem; margin-bottom: 10px;">Kullanıcı Yetkilendirme</h4>
          <p class="feature-desc" style="font-size: 0.9rem;">Departman bazlı yetki yönetimi; her kullanıcı yalnızca kendi alanını görür.</p>
        </div>

      </div>
    </div>

    <!-- Yeniden Yazılıyor Banner -->
    <div style="background: linear-gradient(135deg, rgba(161,0,255,0.12), rgba(0,242,254,0.08)); border: 1px solid rgba(161,0,255,0.25); border-radius: 20px; padding: 40px 48px; margin-bottom: 40px;">
      <div style="display: grid; grid-template-columns: 1fr auto; gap: 30px; align-items: center;">
        <div>
          <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
            <span class="badge badge-ai"><i class="fa-solid fa-wand-magic-sparkles"></i> YENİ NESİL SÜRÜM</span>
          </div>
          <h3 style="font-size: 1.6rem; margin-bottom: 12px;">IYS, Modern Teknoloji Yığınıyla Yeniden Yazılıyor</h3>
          <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.75; margin-bottom: 0;">
            20+ yıllık saha deneyimi ve kullanıcı geri bildirimlerini temel alarak IYS'yi 
            <strong style="color: #e100ff;">web tabanlı, yapay zeka destekli</strong> modern bir platforma dönüştürüyoruz. 
            Bulut mimarisi, mobil uyumluluk ve AI odak noktalarımız olacak.
          </p>
        </div>
        <div style="display: flex; flex-direction: column; gap: 10px; min-width: 200px;">
          <div class="feature-tags" style="flex-direction: column; gap: 8px;">
            <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> React / Next.js Frontend</span>
            <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> Node.js / PHP Backend API</span>
            <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> Yapay Zeka Süreç Asistanı</span>
            <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> Bulut & Mobil Uyumlu</span>
            <span class="tag"><i class="fa-solid fa-check text-gradient-ai"></i> Gerçek Zamanlı Dashboard</span>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="glass-card" style="padding: 40px; text-align: center; background: rgba(0,242,254,0.03);">
      <span class="badge badge-ai" style="margin-bottom: 16px; display: inline-block;">
        <i class="fa-solid fa-headset"></i> ERKEN ERİŞİM
      </span>
      <h3 style="font-size: 1.8rem; margin-bottom: 12px;">Yeni Sürüme Önce Siz Ulaşın</h3>
      <p style="color: var(--text-muted); font-size: 1rem; margin-bottom: 28px; max-width: 540px; margin-left: auto; margin-right: auto; line-height: 1.75;">
        IYS'nin modern web sürümü için erken erişim listesine kaydolun veya 
        mevcut masaüstü versiyonu için demo talep edin.
      </p>
      <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
        <a href="contact.php" class="btn btn-primary">
          <i class="fa-solid fa-envelope"></i> Erken Erişim Kaydı
        </a>
        <a href="https://iys.zersoft.net" target="_blank" rel="noopener" class="btn btn-outline">
          <i class="fa-solid fa-arrow-up-right-from-square"></i> Mevcut Versiyonu Gör
        </a>
      </div>
    </div>

  </div>
</section>

<!-- Diğer Ürünler Yakında -->
<section style="padding: 0 0 100px 0;">
  <div class="container">
    <div class="section-header" style="margin-bottom: 40px;">
      <span class="badge"><i class="fa-solid fa-clock"></i> YAKINDA</span>
      <h2 style="font-size: 2rem; margin: 14px 0 10px 0;">Geliştirme Sürecindeki <span class="text-gradient">Diğer Ürünler</span></h2>
      <p style="color: var(--text-muted);">Yeni nesil yazılım ürünlerimiz yakında burada olacak.</p>
    </div>

    <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">

      <div class="glass-card" style="padding: 32px; opacity: 0.65; border-style: dashed;">
        <div class="feature-icon-wrapper" style="margin-bottom: 16px;">
          <i class="fa-solid fa-truck-ramp-box"></i>
        </div>
        <span class="badge" style="margin-bottom: 10px; display: inline-block;">Geliştiriliyor</span>
        <h3 class="feature-title">Kantar Otomasyon Yazılımı</h3>
        <p class="feature-desc">Hafriyat, maden ve katı atık sahaları için AI destekli akıllı kantar yönetimi.</p>
      </div>

      <div class="glass-card" style="padding: 32px; opacity: 0.65; border-style: dashed;">
        <div class="feature-icon-wrapper" style="margin-bottom: 16px; background: rgba(161,0,255,0.15); color: #e100ff; border-color: rgba(161,0,255,0.3);">
          <i class="fa-solid fa-calculator"></i>
        </div>
        <span class="badge badge-ai" style="margin-bottom: 10px; display: inline-block;">Geliştiriliyor</span>
        <h3 class="feature-title">Akıllı Ön Muhasebe</h3>
        <p class="feature-desc">Cari, stok ve fatura yönetimini yapay zeka ile güçlendiren SaaS muhasebe platformu.</p>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
