<?php
/**
 * Zersoft Technology - Kurumsal Kimlik & Varlık Yönetim Merkezi
 */
require_once __DIR__ . '/header.php';
?>

<style>
/* Custom Brand Identity Hub Styling */
.brand-hero {
  background: radial-gradient(circle at top right, rgba(14, 165, 233, 0.15), transparent 60%),
              radial-gradient(circle at bottom left, rgba(99, 102, 241, 0.12), transparent 50%),
              #0e1626;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 16px;
  padding: 32px;
  margin-bottom: 28px;
  position: relative;
  overflow: hidden;
}

.brand-tabs {
  display: flex;
  gap: 10px;
  margin-bottom: 24px;
  border-bottom: 1px solid var(--admin-border);
  padding-bottom: 12px;
  flex-wrap: wrap;
}

.brand-tab-btn {
  background: #121a2d;
  color: var(--admin-text-muted);
  border: 1px solid var(--admin-border);
  padding: 10px 20px;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
}

.brand-tab-btn:hover {
  color: #fff;
  border-color: rgba(14, 165, 233, 0.4);
  background: #18233c;
}

.brand-tab-btn.active {
  background: linear-gradient(135deg, #0ea5e9, #0284c7);
  color: #ffffff;
  border-color: #0ea5e9;
  box-shadow: 0 4px 14px rgba(14, 165, 233, 0.35);
}

.tab-pane {
  display: none;
}

.tab-pane.active {
  display: block;
  animation: fadeInPane 0.3s ease;
}

@keyframes fadeInPane {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Asset Cards */
.asset-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 22px;
  margin-bottom: 28px;
}

.asset-card {
  background: #121a2d;
  border: 1px solid var(--admin-border);
  border-radius: 14px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: all 0.25s ease;
}

.asset-card:hover {
  transform: translateY(-3px);
  border-color: rgba(14, 165, 233, 0.4);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
}

.asset-preview {
  padding: 32px 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 180px;
  position: relative;
}

.asset-preview.bg-dark {
  background: #070c15;
}

.asset-preview.bg-light {
  background: #f8fafc;
}

.asset-preview.bg-gradient {
  background: radial-gradient(circle, #0e172a 0%, #070c15 100%);
}

.asset-preview img, .asset-preview svg {
  max-width: 100%;
  max-height: 140px;
  object-fit: contain;
  transition: transform 0.2s;
}

.asset-card:hover .asset-preview img,
.asset-card:hover .asset-preview svg {
  transform: scale(1.03);
}

.asset-info {
  padding: 20px;
  border-top: 1px solid var(--admin-border);
  background: #0f172a;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.asset-meta {
  font-size: 0.75rem;
  color: #0ea5e9;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: 4px;
}

.asset-title {
  font-size: 1.05rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 6px;
}

.asset-desc {
  font-size: 0.85rem;
  color: var(--admin-text-muted);
  line-height: 1.5;
  margin-bottom: 16px;
}

.asset-actions {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.btn-asset {
  flex: 1;
  min-width: 100px;
  padding: 8px 12px;
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  cursor: pointer;
  transition: all 0.2s;
  border: none;
}

.btn-asset-primary {
  background: #0ea5e9;
  color: #ffffff;
}
.btn-asset-primary:hover {
  background: #0284c7;
}

.btn-asset-secondary {
  background: rgba(255, 255, 255, 0.08);
  color: #e2e8f0;
  border: 1px solid rgba(255, 255, 255, 0.1);
}
.btn-asset-secondary:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #fff;
}

/* 3D Business Card Flip Stage */
.flip-scene {
  perspective: 1200px;
  width: 100%;
  max-width: 680px;
  margin: 0 auto 30px;
}

.card-3d-wrapper {
  width: 100%;
  aspect-ratio: 1050 / 600;
  position: relative;
  transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  transform-style: preserve-3d;
  cursor: pointer;
}

.card-3d-wrapper.is-flipped {
  transform: rotateY(180deg);
}

.card-3d-face {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
}

.card-3d-face img, .card-3d-face svg {
  width: 100%;
  height: 100%;
  display: block;
}

.card-3d-back {
  transform: rotateY(180deg);
}

/* Color Palettes */
.color-swatch-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 16px;
  margin-bottom: 30px;
}

.color-swatch {
  background: #0f172a;
  border: 1px solid var(--admin-border);
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.2s;
}

.color-swatch:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  border-color: rgba(255, 255, 255, 0.2);
}

.swatch-color-box {
  height: 90px;
  position: relative;
  display: flex;
  align-items: flex-end;
  justify-content: flex-end;
  padding: 10px;
}

.swatch-details {
  padding: 12px 14px;
}

.swatch-name {
  font-size: 0.85rem;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 2px;
}

.swatch-hex {
  font-size: 0.8rem;
  font-family: monospace;
  color: #38bdf8;
  font-weight: 600;
}

.swatch-rgb {
  font-size: 0.72rem;
  color: var(--admin-text-muted);
}

/* Toast Notifications */
#toastNotification {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: #0ea5e9;
  color: #fff;
  padding: 12px 24px;
  border-radius: 10px;
  font-weight: 600;
  font-size: 0.9rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
  z-index: 9999;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  pointer-events: none;
}

#toastNotification.show {
  opacity: 1;
  transform: translateY(0);
}
</style>

<!-- Main Brand Hero Header -->
<div class="brand-hero">
  <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
    <div>
      <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.8rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: #38bdf8; margin-bottom: 10px;">
        <i class="fa-solid fa-sparkles"></i> ZERSOFT BRAND KIT &bull; 2026 EDITION
      </div>
      <h1 style="font-size: 2rem; font-weight: 800; color: #fff; margin-bottom: 8px;">
        Kurumsal Kimlik &amp; Varlık Yönetimi
      </h1>
      <p style="color: var(--admin-text-muted); max-width: 650px; font-size: 0.95rem;">
        Yeni <strong>"Convergence"</strong> logo konsepti temel alınarak oluşturulan resmi logolar, sosyal medya şablonları, 300 DPI baskıya hazır kartvizitler, renk paletleri ve dijital varlıklar.
      </p>
    </div>

    <!-- Action Quick Badges -->
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
      <div style="background: rgba(14,165,233,0.12); border: 1px solid rgba(14,165,233,0.3); border-radius: 10px; padding: 10px 18px; text-align: center;">
        <div style="font-size: 1.3rem; font-weight: 800; color: #38bdf8;">14+</div>
        <div style="font-size: 0.75rem; color: var(--admin-text-muted); font-weight: 600;">Hazır Varlık</div>
      </div>
      <div style="background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.3); border-radius: 10px; padding: 10px 18px; text-align: center;">
        <div style="font-size: 1.3rem; font-weight: 800; color: #818cf8;">300 DPI</div>
        <div style="font-size: 0.75rem; color: var(--admin-text-muted); font-weight: 600;">Baskı Kalitesi</div>
      </div>
      <div style="background: rgba(34,211,238,0.12); border: 1px solid rgba(34,211,238,0.3); border-radius: 10px; padding: 10px 18px; text-align: center;">
        <div style="font-size: 1.3rem; font-weight: 800; color: #22d3ee;">Ultra HD</div>
        <div style="font-size: 0.75rem; color: var(--admin-text-muted); font-weight: 600;">Kayıpsız Canvas PNG</div>
      </div>
    </div>
  </div>
</div>

<!-- Navigation Tabs -->
<div class="brand-tabs">
  <button class="brand-tab-btn active" onclick="switchBrandTab('tab-overview', this)">
    <i class="fa-solid fa-grid-2"></i> Genel Bakış &amp; Mockup Galerisi
  </button>
  <button class="brand-tab-btn" onclick="switchBrandTab('tab-logos', this)">
    <i class="fa-solid fa-shapes"></i> Logo Varyasyonları
  </button>
  <button class="brand-tab-btn" onclick="switchBrandTab('tab-social', this)">
    <i class="fa-solid fa-share-nodes"></i> Sosyal Medya Kiti (PNG)
  </button>
  <button class="brand-tab-btn" onclick="switchBrandTab('tab-businesscard', this)">
    <i class="fa-solid fa-id-card"></i> 3D Kartvizit &amp; Kırtasiye
  </button>
  <button class="brand-tab-btn" onclick="switchBrandTab('tab-guidelines', this)">
    <i class="fa-solid fa-swatchbook"></i> Renkler &amp; Tipografi Rehberi
  </button>
</div>

<!-- ========================================================================= -->
<!-- TAB 1: GENEL BAKIŞ & MOCKUP GALERİSİ                                      -->
<!-- ========================================================================= -->
<div id="tab-overview" class="tab-pane active">
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px;">
    <!-- Mockup 1: Business Cards -->
    <div class="asset-card">
      <div style="overflow: hidden; aspect-ratio: 16/9; background: #000;">
        <img src="../assets/images/brand/business-card-mockup.jpg" alt="Zersoft Lüks Kartvizit Renderı" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">3D FOTOREALİSTİK MOCKUP</span>
          <h3 class="asset-title">Lüks Mat Siyah Kartvizit Konsepti</h3>
          <p class="asset-desc">Granit zemin üzerinde kabartmalı elektrik mavisi Convergence logosu, NFC çip uyumu ve vCard karekodlu kurumsal kartvizit görünümü.</p>
        </div>
        <div class="asset-actions">
          <a href="../assets/images/brand/business-card-mockup.jpg" download="zersoft-business-card-mockup.jpg" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> Mockup JPG İndir
          </a>
          <button onclick="switchBrandTab('tab-businesscard', document.querySelectorAll('.brand-tab-btn')[3])" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-eye"></i> Kartvizit Kitine Git
          </button>
        </div>
      </div>
    </div>

    <!-- Mockup 2: Brand Stationery Showcase -->
    <div class="asset-card">
      <div style="overflow: hidden; aspect-ratio: 16/9; background: #000;">
        <img src="../assets/images/brand/brand-identity-showcase.jpg" alt="Zersoft Kurumsal Kimlik & Sosyal Medya Renderı" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">3D FOTOREALİSTİK MOCKUP</span>
          <h3 class="asset-title">Sosyal Medya &amp; Ofis Kimlik Seti</h3>
          <p class="asset-desc">Mobil Instagram gönderileri, iPad marka kılavuzu, kurumsal not defteri ve masaüstü kimlik unsurlarının bir arada sunumu.</p>
        </div>
        <div class="asset-actions">
          <a href="../assets/images/brand/brand-identity-showcase.jpg" download="zersoft-stationery-showcase.jpg" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> Mockup JPG İndir
          </a>
          <button onclick="switchBrandTab('tab-social', document.querySelectorAll('.brand-tab-btn')[2])" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-share-nodes"></i> Sosyal Medya Kitine Git
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Summary Grid -->
  <div class="card-panel">
    <div class="panel-title" style="margin-bottom: 16px;">
      <i class="fa-solid fa-circle-info text-gradient"></i> Zersoft Marka Mimarisi Özeti
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
      <div style="background: #090d16; padding: 18px; border-radius: 10px; border: 1px solid var(--admin-border);">
        <div style="color: #38bdf8; font-weight: 700; font-size: 0.85rem; margin-bottom: 4px;">MARKA KONSEPTİ</div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #fff; margin-bottom: 4px;">Convergence (Odak)</div>
        <div style="font-size: 0.8rem; color: var(--admin-text-muted);">Veri, Yapay Zeka ve Bulut akışlarının tek bir merkezde kesişmesi.</div>
      </div>

      <div style="background: #090d16; padding: 18px; border-radius: 10px; border: 1px solid var(--admin-border);">
        <div style="color: #22d3ee; font-weight: 700; font-size: 0.85rem; margin-bottom: 4px;">ANA TİPOGRAFİ</div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #fff; margin-bottom: 4px;">Plus Jakarta Sans</div>
        <div style="font-size: 0.8rem; color: var(--admin-text-muted);">Ağırlıklar: ExtraBold 800 (Wordmark), SemiBold 600 (Tagline).</div>
      </div>

      <div style="background: #090d16; padding: 18px; border-radius: 10px; border: 1px solid var(--admin-border);">
        <div style="color: #818cf8; font-weight: 700; font-size: 0.85rem; margin-bottom: 4px;">ANA RENK VURGUSU</div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #fff; margin-bottom: 4px;">Electric Cyan &amp; Sky</div>
        <div style="font-size: 0.8rem; color: var(--admin-text-muted);">Hex: <code>#22d3ee</code> &bull; <code>#0ea5e9</code> &bull; <code>#6366f1</code></div>
      </div>

      <div style="background: #090d16; padding: 18px; border-radius: 10px; border: 1px solid var(--admin-border);">
        <div style="color: #34d399; font-weight: 700; font-size: 0.85rem; margin-bottom: 4px;">SLOGAN / TAGLINE</div>
        <div style="font-weight: 700; font-size: 1.1rem; color: #fff; margin-bottom: 4px;">Yeni Nesil Teknoloji</div>
        <div style="font-size: 0.8rem; color: var(--admin-text-muted);">Wordmark ile optik <code>textLength="176"</code> genişlik uyumlu.</div>
      </div>
    </div>
  </div>
</div>

<!-- ========================================================================= -->
<!-- TAB 2: LOGO VARYASYONLARI                                                 -->
<!-- ========================================================================= -->
<div id="tab-logos" class="tab-pane">
  <div class="asset-grid">

    <!-- 1. Primary Dark Mode Logo -->
    <div class="asset-card">
      <div class="asset-preview bg-dark">
        <img src="../assets/images/logo.svg" alt="Zersoft Koyu Mod Logo" id="img-logo-dark">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">ANA LOGO &bull; KOYU ZEMİN</span>
          <h3 class="asset-title">Primary Dark Logo</h3>
          <p class="asset-desc">Koyu arka planlar için optimize edilmiş ana logo (Buz beyazı ZER, Gök mavisi SOFT).</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/logo.svg', 'zersoft-logo-dark.png', 1200, 256)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG İndir (4K)
          </button>
          <a href="../assets/images/logo.svg" download="zersoft-logo-dark.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
          <button onclick="copySvgCode('../assets/images/logo.svg')" class="btn-asset btn-asset-secondary" title="SVG Kodunu Kopyala">
            <i class="fa-solid fa-copy"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- 2. Primary Light Mode Logo -->
    <div class="asset-card">
      <div class="asset-preview bg-light">
        <img src="../assets/images/logo-light.svg" alt="Zersoft Açık Mod Logo" id="img-logo-light">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">ANA LOGO &bull; AÇIK ZEMİN</span>
          <h3 class="asset-title">Primary Light Logo</h3>
          <p class="asset-desc">Açık renk zeminler, faturalar ve resmi evraklar için antrasit gri (#1e293b) tipografi.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/logo-light.svg', 'zersoft-logo-light.png', 1200, 256)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG İndir (4K)
          </button>
          <a href="../assets/images/logo-light.svg" download="zersoft-logo-light.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
          <button onclick="copySvgCode('../assets/images/logo-light.svg')" class="btn-asset btn-asset-secondary" title="SVG Kodunu Kopyala">
            <i class="fa-solid fa-copy"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- 3. Monochrome Black Logo -->
    <div class="asset-card">
      <div class="asset-preview bg-light">
        <img src="../assets/images/brand/logo-monochrome-black.svg" alt="Zersoft Siyah Logo">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">MONOKROM &bull; BASKI / KAŞE</span>
          <h3 class="asset-title">Monochrome Black</h3>
          <p class="asset-desc">Tek renk siyah baskı, resmi evrak, lazer kazıma ve kaşe kullanımları.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/logo-monochrome-black.svg', 'zersoft-logo-black.png', 1200, 256)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG İndir
          </button>
          <a href="../assets/images/brand/logo-monochrome-black.svg" download="zersoft-logo-black.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 4. Monochrome White Logo -->
    <div class="asset-card">
      <div class="asset-preview bg-dark">
        <img src="../assets/images/brand/logo-monochrome-white.svg" alt="Zersoft Beyaz Logo">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">MONOKROM &bull; KOYU ZEMİN</span>
          <h3 class="asset-title">Monochrome White</h3>
          <p class="asset-desc">Fotoğraf üzeri ve tek renk beyaz gerektiren koyu zemin tasarımları.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/logo-monochrome-white.svg', 'zersoft-logo-white.png', 1200, 256)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG İndir
          </button>
          <a href="../assets/images/brand/logo-monochrome-white.svg" download="zersoft-logo-white.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 5. Vertical Stacked Logo -->
    <div class="asset-card">
      <div class="asset-preview bg-dark">
        <img src="../assets/images/brand/logo-stacked.svg" alt="Zersoft Dikey Logo" style="max-height: 150px;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">DİKEY ORAN &bull; MERKEZİ DÜZEN</span>
          <h3 class="asset-title">Stacked Vertical Logo</h3>
          <p class="asset-desc">Kare ve dikey afişler, stantlar, mobil açılış ekranları (Splash Screen) için merkezlenmiş logo.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/logo-stacked.svg', 'zersoft-logo-stacked.png', 960, 720)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG İndir
          </button>
          <a href="../assets/images/brand/logo-stacked.svg" download="zersoft-logo-stacked.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 6. Brand Mark / App Icon -->
    <div class="asset-card">
      <div class="asset-preview bg-dark">
        <img src="../assets/images/brand/brand-mark-only.svg" alt="Zersoft Sembol" style="max-height: 100px;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">SEMBOL &bull; APP ICON &bull; FAVICON</span>
          <h3 class="asset-title">Convergence Mark Only</h3>
          <p class="asset-desc">Mobil uygulama ikonu, tarayıcı faviconu ve profil görseli için bağımsız sembol.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/brand-mark-only.svg', 'zersoft-mark-512.png', 512, 512)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-file-image"></i> PNG (512px)
          </button>
          <a href="../assets/images/brand/brand-mark-only.svg" download="zersoft-mark.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ========================================================================= -->
<!-- TAB 3: SOSYAL MEDYA KİTİ (PNG & SVG)                                      -->
<!-- ========================================================================= -->
<div id="tab-social" class="tab-pane">
  <div style="margin-bottom: 24px;">
    <p style="color: var(--admin-text-muted);">
      Sosyal medya mecraları için standart ölçülerde hazırlanmış yüksek çözünürlüklü şablonlar. Tek tıkla <strong>Ultra HD PNG</strong> olarak dışa aktarabilirsiniz.
    </p>
  </div>

  <div class="asset-grid">

    <!-- 1. Square Post 1080x1080 -->
    <div class="asset-card">
      <div class="asset-preview bg-dark" style="min-height: 240px;">
        <img src="../assets/images/brand/social-post-1080x1080.svg" alt="Instagram & LinkedIn Gönderisi" style="max-height: 220px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.5);">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">1:1 KARE &bull; 1080 × 1080 PX</span>
          <h3 class="asset-title">Instagram &amp; LinkedIn Post Şablonu</h3>
          <p class="asset-desc">Kurumsal duyurular, ürün lansmanları ve yapay zeka çözümleri tanıtımı için modern cam efektli şablon.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/social-post-1080x1080.svg', 'zersoft-post-1080x1080.png', 1080, 1080)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> 1080×1080 PNG İndir
          </button>
          <a href="../assets/images/brand/social-post-1080x1080.svg" download="zersoft-post-1080x1080.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 2. Social Avatar 1080x1080 -->
    <div class="asset-card">
      <div class="asset-preview bg-dark" style="min-height: 240px;">
        <img src="../assets/images/brand/social-avatar-1080x1080.svg" alt="Sosyal Medya Profil Avatarı" style="max-height: 200px; border-radius: 50%; box-shadow: 0 10px 25px rgba(14,165,233,0.3);">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">PROFİL AVATARI &bull; 1080 × 1080 PX</span>
          <h3 class="asset-title">Dairesel Profil / Avatar Kiti</h3>
          <p class="asset-desc">Instagram, Twitter/X, LinkedIn ve WhatsApp Business profil fotoğrafları için daire kırpımına tam uyumlu.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/social-avatar-1080x1080.svg', 'zersoft-avatar-1080x1080.png', 1080, 1080)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> Avatar PNG İndir
          </button>
          <a href="../assets/images/brand/social-avatar-1080x1080.svg" download="zersoft-avatar-1080x1080.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 3. OpenGraph / LinkedIn Share 1200x630 -->
    <div class="asset-card" style="grid-column: 1 / -1;">
      <div class="asset-preview bg-dark" style="min-height: 220px;">
        <img src="../assets/images/brand/opengraph-1200x630.svg" alt="OpenGraph Banner" style="max-height: 200px; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">OPENGRAPH &bull; 1200 × 630 PX (1.91:1)</span>
          <h3 class="asset-title">Web &amp; Sosyal Medya Paylaşım Bannerı (OpenGraph)</h3>
          <p class="asset-desc">WhatsApp, LinkedIn, Twitter ve Facebook link paylaşımlarında otomatik beliren önizleme görseli (OG Image).</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/opengraph-1200x630.svg', 'zersoft-opengraph-1200x630.png', 1200, 630)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> 1200×630 PNG İndir
          </button>
          <a href="../assets/images/brand/opengraph-1200x630.svg" download="zersoft-opengraph-1200x630.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- 4. Twitter / LinkedIn Header Cover 1500x500 -->
    <div class="asset-card" style="grid-column: 1 / -1;">
      <div class="asset-preview bg-dark" style="min-height: 180px;">
        <img src="../assets/images/brand/social-cover-1500x500.svg" alt="Sosyal Medya Kapak Bannerı" style="max-height: 160px; width: 100%; border-radius: 8px;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">HEADER BANNER &bull; 1500 × 500 PX (3:1)</span>
          <h3 class="asset-title">Twitter / X &amp; LinkedIn Şirket Kapak Görseli</h3>
          <p class="asset-desc">Geniş ekran kurumsal profil başlık bannerı, dinamik neon degradeli ve teknoloji vurgulu.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/social-cover-1500x500.svg', 'zersoft-cover-1500x500.png', 1500, 500)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> 1500×500 PNG İndir
          </button>
          <a href="../assets/images/brand/social-cover-1500x500.svg" download="zersoft-cover-1500x500.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ========================================================================= -->
<!-- TAB 4: KARTVİZİT & KIRTASİYE                                              -->
<!-- ========================================================================= -->
<div id="tab-businesscard" class="tab-pane">

  <!-- Interactive 3D Business Card Showcase -->
  <div class="card-panel" style="text-align: center; padding: 36px 20px; margin-bottom: 28px;">
    <div style="display: inline-block; font-size: 0.75rem; font-weight: 700; color: #38bdf8; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px;">
      İNTERAKTİF 3D ÖNİZLEME (FLIP CARD)
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 20px;">
      <div>
        <h2 style="font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 4px;">
          Zersoft Executive Kartvizit (300 DPI / 1050 × 600 px)
        </h2>
        <p style="color: var(--admin-text-muted); font-size: 0.9rem;">
          Kartvizite tıklayarak veya aşağıdaki butonla ön ve arka yüz arasında 3D olarak geçiş yapabilirsiniz.
        </p>
      </div>

      <!-- Theme Switcher for Cards -->
      <div style="display: flex; gap: 8px; background: rgba(0,0,0,0.3); padding: 4px; border-radius: 8px; border: 1px solid var(--admin-border);">
        <button id="cardThemeDarkBtn" onclick="setCardTheme('dark')" class="btn-asset btn-asset-primary" style="padding: 6px 14px; font-size: 0.8rem;">
          <i class="fa-solid fa-moon"></i> Koyu Lüks Mat
        </button>
        <button id="cardThemeWhiteBtn" onclick="setCardTheme('white')" class="btn-asset btn-asset-secondary" style="padding: 6px 14px; font-size: 0.8rem;">
          <i class="fa-solid fa-sun"></i> Açık Minimalist
        </button>
      </div>
    </div>

    <!-- 3D Card Stage -->
    <div class="flip-scene" onclick="toggleCard3D()">
      <div class="card-3d-wrapper" id="businessCard3D">
        <!-- Front Side -->
        <div class="card-3d-face">
          <img id="cardFrontImg" src="../assets/images/brand/business-card-front.svg" alt="Kartvizit Ön Yüz">
        </div>
        <!-- Back Side -->
        <div class="card-3d-face card-3d-back">
          <img id="cardBackImg" src="../assets/images/brand/business-card-back.svg" alt="Kartvizit Arka Yüz">
        </div>
      </div>
    </div>

    <!-- Flip Action Button & Downloads -->
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
      <button onclick="toggleCard3D()" class="btn-admin-primary" style="padding: 10px 24px; font-size: 0.9rem;">
        <i class="fa-solid fa-rotate"></i> Kartı Çevir (Ön / Arka)
      </button>
      <button onclick="downloadCurrentCard('front')" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-download"></i> Ön Yüz PNG (300 DPI)
      </button>
      <button onclick="downloadCurrentCard('back')" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-download"></i> Arka Yüz PNG (300 DPI)
      </button>
      <button onclick="downloadCurrentCardSvg('front')" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-vector-square"></i> Ön SVG
      </button>
      <button onclick="downloadCurrentCardSvg('back')" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-vector-square"></i> Arka SVG
      </button>
    </div>

    <!-- Matbaa Baskı Kılavuzu & Önerileri -->
    <div style="background: rgba(14, 165, 233, 0.08); border: 1px solid rgba(14, 165, 233, 0.25); border-radius: 10px; padding: 18px 22px; margin-top: 10px;">
      <div style="font-weight: 700; font-size: 0.95rem; color: #38bdf8; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
        <i class="fa-solid fa-print"></i> Matbaa &amp; Acil Baskı Tavsiyeleri
      </div>
      <div style="font-size: 0.85rem; color: var(--admin-text-muted); line-height: 1.7;">
        &bull; <strong>Ebat:</strong> 85 × 55 mm (veya 89 × 51 mm Amerikan Boy) &bull; <strong>Çözünürlük:</strong> 300 DPI Vektörel SVG / CMYK uyumlu PNG<br>
        &bull; <strong>Kağıt Tercihi:</strong> 350 gr veya 400 gr Kuşe (Çift Yön Mat Selefon Kaplama)<br>
        &bull; <strong>Özel Efekt Önerisi (Koyu Tema):</strong> Ön yüzdeki Convergence logosuna ve ZERSOFT yazısına <em>Bölgesel Parlak Lak (Spot UV)</em> veya <em>Gümüş/Mavi Varak Yaldız</em> kabartma uygulandığında ultra lüks kurumsal görünüm sağlar.
      </div>
    </div>
  </div>

  <!-- ========================================================================= -->
  <!-- BASKIYA HAZIR TABAKA DİZİLİMLERİ (A4 / A3 ARKALI ÖNLÜ MONTAJ)             -->
  <!-- ========================================================================= -->
  <div class="card-panel" style="margin-bottom: 28px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 16px;">
      <div>
        <div style="display: inline-block; font-size: 0.75rem; font-weight: 700; color: #38bdf8; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 4px;">
          <i class="fa-solid fa-layer-group"></i> MATBAA &amp; DİJİTAL BASKI MONTAJI
        </div>
        <h2 style="font-size: 1.5rem; font-weight: 800; color: #fff;">
          Baskıya Hazır Tabaka Dizilimleri (A4 &amp; A3)
        </h2>
        <p style="color: var(--admin-text-muted); font-size: 0.9rem;">
          Arkalı önlü çift taraflı baskı için 1:1 simetrik hizalamalı, kesim kılavuzlu (crop marks) 300 DPI montaj sayfaları.
        </p>
      </div>

      <!-- Controls: Paper, Theme, Face -->
      <div style="display: flex; flex-wrap: wrap; gap: 10px;">
        <!-- Paper Size -->
        <div style="display: flex; background: rgba(0,0,0,0.3); padding: 4px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <button id="impositionA4Btn" onclick="setImpositionPaper('A4')" class="btn-asset btn-asset-primary" style="padding: 6px 12px; font-size: 0.8rem;">
            A4 (10 Kart)
          </button>
          <button id="impositionA3Btn" onclick="setImpositionPaper('A3')" class="btn-asset btn-asset-secondary" style="padding: 6px 12px; font-size: 0.8rem;">
            A3 (21 Kart)
          </button>
        </div>

        <!-- Theme -->
        <div style="display: flex; background: rgba(0,0,0,0.3); padding: 4px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <button id="impositionDarkBtn" onclick="setImpositionTheme('dark')" class="btn-asset btn-asset-primary" style="padding: 6px 12px; font-size: 0.8rem;">
            Koyu Mat
          </button>
          <button id="impositionWhiteBtn" onclick="setImpositionTheme('white')" class="btn-asset btn-asset-secondary" style="padding: 6px 12px; font-size: 0.8rem;">
            Beyaz Minimal
          </button>
        </div>

        <!-- Face -->
        <div style="display: flex; background: rgba(0,0,0,0.3); padding: 4px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <button id="impositionFrontBtn" onclick="setImpositionFace('front')" class="btn-asset btn-asset-primary" style="padding: 6px 12px; font-size: 0.8rem;">
            Ön Yüz
          </button>
          <button id="impositionBackBtn" onclick="setImpositionFace('back')" class="btn-asset btn-asset-secondary" style="padding: 6px 12px; font-size: 0.8rem;">
            Arka Yüz (QR)
          </button>
        </div>
      </div>
    </div>

    <!-- Live Imposition Sheet Preview Stage -->
    <div style="display: flex; justify-content: center; background: #03060a; padding: 24px; border-radius: 12px; border: 1px solid var(--admin-border); margin-bottom: 20px; overflow-x: auto;">
      <div style="box-shadow: 0 20px 50px rgba(0,0,0,0.8); border-radius: 4px; overflow: hidden; background: #fff; max-width: 100%;">
        <img id="impositionPreviewImg" src="../assets/images/brand/print/print-a4-dark-front.svg" alt="Baskı Montaj Önizleme" style="max-height: 520px; width: auto; display: block;">
      </div>
    </div>

    <!-- Imposition Actions -->
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 12px;">
      <button onclick="printCurrentImposition()" class="btn-admin-primary" style="padding: 10px 24px; font-size: 0.9rem;">
        <i class="fa-solid fa-print"></i> Doğrudan Yazdır / PDF Kaydet (Print)
      </button>
      <button onclick="downloadCurrentImpositionPng()" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-download"></i> Tabaka PNG (300 DPI)
      </button>
      <button onclick="downloadCurrentImpositionSvg()" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-vector-square"></i> Tabaka Vektör SVG
      </button>
      <a id="impositionDirectLink" href="../assets/images/brand/print/print-a4-dark-front.svg" target="_blank" class="btn-asset btn-asset-secondary" style="padding: 10px 18px;">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> Yeni Sekmede Aç
      </a>
    </div>

    <!-- Duplex Printing Info Note -->
    <div style="margin-top: 18px; padding: 14px 18px; background: rgba(255,255,255,0.03); border: 1px dashed rgba(255,255,255,0.12); border-radius: 8px; font-size: 0.82rem; color: var(--admin-text-muted); line-height: 1.6;">
      <strong style="color: #fff;"><i class="fa-solid fa-circle-info text-gradient"></i> Çift Taraflı (Arkalı Önlü) Baskı İpucu:</strong>
      Yazıcınızdan veya matbaa dijital baskı makinesinden çıktı alırken çift taraflı (Duplex) ayarını <strong>"Uzun Kenardan Çevir (Flip on Long Edge)"</strong> olarak seçiniz. Sayfa kenar boşlukları matematiksel olarak 1:1 simetrik tasarlandığı için ön ve arka yüzdeki kartlar ve kesim çizgileri arkalı önlü kusursuz çakışacaktır.
    </div>
  </div>

  <!-- Letterhead & Email Signature Row -->
  <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 24px;">
    
    <!-- Letterhead (A4) -->
    <div class="asset-card">
      <div class="asset-preview bg-light" style="padding: 20px;">
        <img src="../assets/images/brand/letterhead-a4.svg" alt="A4 Antetli Kağıt" style="max-height: 280px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); border-radius: 4px;">
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">KURUMSAL EVRAK &bull; A4 (1240 × 1754 PX)</span>
          <h3 class="asset-title">Resmi Antetli Kağıt (Letterhead)</h3>
          <p class="asset-desc">Teklifler, resmi yazışmalar ve sözleşmeler için filigranlı ve kurumsal antetli şablon.</p>
        </div>
        <div class="asset-actions">
          <button onclick="downloadSvgAsPng('../assets/images/brand/letterhead-a4.svg', 'zersoft-antetli-kagit-a4.png', 1240, 1754)" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-download"></i> A4 PNG İndir
          </button>
          <a href="../assets/images/brand/letterhead-a4.svg" download="zersoft-antetli-kagit-a4.svg" class="btn-asset btn-asset-secondary">
            <i class="fa-solid fa-vector-square"></i> SVG
          </a>
        </div>
      </div>
    </div>

    <!-- HTML Email Signature -->
    <div class="asset-card">
      <div class="asset-preview bg-light" style="padding: 24px; align-items: flex-start; justify-content: flex-start;">
        <!-- Live HTML Email Signature Preview -->
        <table id="emailSignaturePreview" cellpadding="0" cellspacing="0" border="0" style="font-family: 'Segoe UI', Tahoma, Arial, sans-serif; font-size: 14px; line-height: 1.4; color: #1e293b; background: #ffffff; padding: 16px; border-radius: 8px; border-left: 4px solid #0ea5e9; box-shadow: 0 4px 15px rgba(0,0,0,0.06); width: 100%;">
          <tr>
            <td style="vertical-align: top; padding-right: 18px; width: 64px;">
              <img src="../assets/images/brand/brand-mark-only.svg" width="56" height="56" alt="Zersoft" style="display: block; border-radius: 12px;">
            </td>
            <td style="vertical-align: top;">
              <div style="font-size: 17px; font-weight: 700; color: #0f172a; letter-spacing: -0.2px;">Ramazan Tuncer</div>
              <div style="font-size: 13px; font-weight: 600; color: #0284c7; margin-bottom: 6px;">Kurucu &amp; Kıdemli Çözüm Mimarı</div>
              <div style="font-size: 12px; color: #64748b; margin-bottom: 8px;">Zersoft Teknoloji &bull; Yeni Nesil Yazılım ve Yapay Zeka</div>
              <div style="font-size: 12px; color: #334155; line-height: 1.6;">
                <strong>W:</strong> <a href="https://zersoft.net" target="_blank" style="color: #0284c7; text-decoration: none; font-weight: 600;">zersoft.net</a> &bull; 
                <strong>E:</strong> <a href="mailto:ramazan@zersoft.net" style="color: #0284c7; text-decoration: none;">ramazan@zersoft.net</a><br>
                <strong>T:</strong> +90 (555) 587 93 70 &bull; Bursa / Türkiye
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="asset-info">
        <div>
          <span class="asset-meta">DİJİTAL İMZA &bull; HTML TABLO FORMATI</span>
          <h3 class="asset-title">Kurumsal E-Posta İmzası (HTML)</h3>
          <p class="asset-desc">Gmail, Outlook ve Apple Mail ile %100 uyumlu, görsel ikonlu zengin HTML e-posta imzası.</p>
        </div>
        <div class="asset-actions">
          <button onclick="copyEmailSignatureHTML()" class="btn-asset btn-asset-primary">
            <i class="fa-solid fa-copy"></i> HTML İmzasını Kopyala
          </button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ========================================================================= -->
<!-- TAB 5: RENKLER & TİPOGRAFİ REHBERİ                                        -->
<!-- ========================================================================= -->
<div id="tab-guidelines" class="tab-pane">
  
  <!-- Color Palette Section -->
  <div class="card-panel" style="margin-bottom: 28px;">
    <div class="panel-title" style="margin-bottom: 6px;">
      <i class="fa-solid fa-palette text-gradient"></i> Resmi Kurumsal Renk Paleti
    </div>
    <p style="color: var(--admin-text-muted); font-size: 0.85rem; margin-bottom: 20px;">
      Karta tıklayarak HEX renk kodunu doğrudan panoya kopyalayabilirsiniz.
    </p>

    <div class="color-swatch-grid">
      
      <!-- Cyan -->
      <div class="color-swatch" onclick="copyToClipboard('#22d3ee', 'Electric Cyan HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #22d3ee; color: #070c15;">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Electric Cyan</div>
          <div class="swatch-hex">#22D3EE</div>
          <div class="swatch-rgb">RGB(34, 211, 238)</div>
        </div>
      </div>

      <!-- Sky Blue -->
      <div class="color-swatch" onclick="copyToClipboard('#0ea5e9', 'Sky Blue HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #0ea5e9; color: #fff;">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Sky Blue (Primary)</div>
          <div class="swatch-hex">#0EA5E9</div>
          <div class="swatch-rgb">RGB(14, 165, 233)</div>
        </div>
      </div>

      <!-- Indigo Accent -->
      <div class="color-swatch" onclick="copyToClipboard('#6366f1', 'Indigo Accent HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #6366f1; color: #fff;">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Deep Indigo</div>
          <div class="swatch-hex">#6366F1</div>
          <div class="swatch-rgb">RGB(99, 102, 241)</div>
        </div>
      </div>

      <!-- Cosmic Dark (Background) -->
      <div class="color-swatch" onclick="copyToClipboard('#070c15', 'Cosmic Black HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #070c15; color: #fff; border-bottom: 1px solid rgba(255,255,255,0.1);">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Cosmic Black (BG)</div>
          <div class="swatch-hex">#070C15</div>
          <div class="swatch-rgb">RGB(7, 12, 21)</div>
        </div>
      </div>

      <!-- Dark Surface -->
      <div class="color-swatch" onclick="copyToClipboard('#0d1626', 'Dark Surface HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #0d1626; color: #fff; border-bottom: 1px solid rgba(255,255,255,0.1);">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Dark Surface (Card)</div>
          <div class="swatch-hex">#0D1626</div>
          <div class="swatch-rgb">RGB(13, 22, 38)</div>
        </div>
      </div>

      <!-- Slate Anthracite (Light Mode ZER) -->
      <div class="color-swatch" onclick="copyToClipboard('#1e293b', 'Slate Anthracite HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #1e293b; color: #fff;">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Slate Anthracite</div>
          <div class="swatch-hex">#1E293B</div>
          <div class="swatch-rgb">RGB(30, 41, 59)</div>
        </div>
      </div>

      <!-- Frost Ice White -->
      <div class="color-swatch" onclick="copyToClipboard('#f0f9ff', 'Frost White HEX kopyalandı!')">
        <div class="swatch-color-box" style="background: #f0f9ff; color: #070c15;">
          <i class="fa-solid fa-copy"></i>
        </div>
        <div class="swatch-details">
          <div class="swatch-name">Frost Ice White</div>
          <div class="swatch-hex">#F0F9FF</div>
          <div class="swatch-rgb">RGB(240, 249, 255)</div>
        </div>
      </div>

    </div>
  </div>

  <!-- Typography & Layout Specs -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    
    <!-- Typography Rules -->
    <div class="card-panel">
      <div class="panel-title" style="margin-bottom: 16px;">
        <i class="fa-solid fa-font text-gradient"></i> Tipografi Mimarisi (Typography)
      </div>

      <div style="margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--admin-border);">
        <div style="font-size: 0.75rem; color: #38bdf8; font-weight: 700; margin-bottom: 4px;">KURUMSAL ANA YAZI TİPİ</div>
        <div style="font-size: 1.4rem; font-weight: 800; color: #fff;">Plus Jakarta Sans</div>
        <div style="font-size: 0.8rem; color: var(--admin-text-muted);">Google Fonts &bull; Modern geometrik hümanist grotesk</div>
      </div>

      <div style="display: flex; flex-direction: column; gap: 12px; font-size: 0.85rem;">
        <div>
          <strong style="color: #fff;">1. Logo Wordmark:</strong> ExtraBold 800 &bull; Letter-Spacing: 2px &bull; SVG textLength="176"
        </div>
        <div>
          <strong style="color: #fff;">2. Logo Slogan:</strong> SemiBold 600 &bull; Letter-Spacing: 0.8px &bull; SVG textLength="176"
        </div>
        <div>
          <strong style="color: #fff;">3. Başlıklar (H1, H2):</strong> Bold 700 / ExtraBold 800 &bull; -0.5px tracking
        </div>
        <div>
          <strong style="color: #fff;">4. Gövde Metinleri:</strong> Regular 400 / Medium 500 &bull; Satır yüksekliği: 1.6
        </div>
      </div>
    </div>

    <!-- Clearance & Usage Rules -->
    <div class="card-panel">
      <div class="panel-title" style="margin-bottom: 16px;">
        <i class="fa-solid fa-shield-halved text-gradient"></i> Koruma Alanı &amp; Boyutlandırma
      </div>

      <div style="display: flex; flex-direction: column; gap: 14px; font-size: 0.85rem;">
        <div style="background: #090d16; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <strong style="color: #22d3ee; display: block; margin-bottom: 4px;">Güvenli Boşluk (Clear Space)</strong>
          <span style="color: var(--admin-text-muted);">Logo etrafında en az "O" harfi genişliği (veya logo yüksekliğinin %50'si kadar) serbest alan bırakılmalıdır. Başka metin veya grafik bu sınıra giremez.</span>
        </div>

        <div style="background: #090d16; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <strong style="color: #38bdf8; display: block; margin-bottom: 4px;">Minimum Boyut (Min Size)</strong>
          <span style="color: var(--admin-text-muted);">Dijital ekranlarda yatay logo için minimum genişlik <strong>120px</strong>, baskı için minimum <strong>30mm</strong>'dir. Daha küçük alanlarda yalnız "Convergence Mark" sembolü kullanılmalıdır.</span>
        </div>

        <div style="background: #090d16; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--admin-border);">
          <strong style="color: #f87171; display: block; margin-bottom: 4px;">Yasak Kullanımlar</strong>
          <span style="color: var(--admin-text-muted);">Logonun en/boy oranını bozmayın, renk gradyanlarını rastgele değiştirmeyin ve düşük kontrastlı karmaşık fotoğraflar üzerine doğrudan yerleştirmeyin.</span>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Toast notification element -->
<div id="toastNotification">
  <i class="fa-solid fa-check"></i> Panoya Kopyalandı!
</div>

<!-- Hidden Canvas for high resolution client rasterization -->
<canvas id="exportCanvas" style="display: none;"></canvas>

<script>
// Tab Switcher
function switchBrandTab(tabId, btn) {
  document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.brand-tab-btn').forEach(el => el.classList.remove('active'));
  
  const target = document.getElementById(tabId);
  if (target) {
    target.classList.add('active');
  }
  if (btn) {
    btn.classList.add('active');
  }
}

// 3D Flip Card Toggle
function toggleCard3D() {
  const card = document.getElementById('businessCard3D');
  if (card) {
    card.classList.toggle('is-flipped');
  }
}

// Current Card Theme State ('dark' | 'white')
let currentCardTheme = 'dark';

function setCardTheme(theme) {
  currentCardTheme = theme;
  const frontImg = document.getElementById('cardFrontImg');
  const backImg = document.getElementById('cardBackImg');
  const darkBtn = document.getElementById('cardThemeDarkBtn');
  const whiteBtn = document.getElementById('cardThemeWhiteBtn');

  if (theme === 'white') {
    if (frontImg) frontImg.src = '../assets/images/brand/business-card-white-front.svg';
    if (backImg) backImg.src = '../assets/images/brand/business-card-white-back.svg';
    if (whiteBtn) { whiteBtn.className = 'btn-asset btn-asset-primary'; }
    if (darkBtn) { darkBtn.className = 'btn-asset btn-asset-secondary'; }
  } else {
    if (frontImg) frontImg.src = '../assets/images/brand/business-card-front.svg';
    if (backImg) backImg.src = '../assets/images/brand/business-card-back.svg';
    if (darkBtn) { darkBtn.className = 'btn-asset btn-asset-primary'; }
    if (whiteBtn) { whiteBtn.className = 'btn-asset btn-asset-secondary'; }
  }
  showToast(theme === 'white' ? 'Açık Minimalist Kartvizit Seçildi' : 'Koyu Lüks Mat Kartvizit Seçildi');
}

function downloadCurrentCard(face) {
  const isWhite = (currentCardTheme === 'white');
  const svgUrl = isWhite
    ? `../assets/images/brand/business-card-white-${face}.svg`
    : `../assets/images/brand/business-card-${face}.svg`;
  const filename = `zersoft-kartvizit-${currentCardTheme}-${face}-300dpi.png`;
  downloadSvgAsPng(svgUrl, filename, 1050, 600);
}

function downloadCurrentCardSvg(face) {
  const isWhite = (currentCardTheme === 'white');
  const svgUrl = isWhite
    ? `../assets/images/brand/business-card-white-${face}.svg`
    : `../assets/images/brand/business-card-${face}.svg`;
  const filename = `zersoft-kartvizit-${currentCardTheme}-${face}.svg`;
  
  const a = document.createElement('a');
  a.href = svgUrl;
  a.download = filename;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  showToast(`${face === 'front' ? 'Ön' : 'Arka'} SVG İndirildi!`);
}

// ==========================================
// Imposition Sheet Management (A4 & A3)
// ==========================================
let impositionState = {
  paper: 'A4',   // 'A4' | 'A3'
  theme: 'dark', // 'dark' | 'white'
  face: 'front'  // 'front' | 'back'
};

function getImpositionFilename() {
  const p = impositionState.paper.toLowerCase();
  const t = impositionState.theme;
  const f = impositionState.face;
  return `print-${p}-${t}-${f}.svg`;
}

function updateImpositionView() {
  const filename = getImpositionFilename();
  const path = `../assets/images/brand/print/${filename}`;
  const img = document.getElementById('impositionPreviewImg');
  const directLink = document.getElementById('impositionDirectLink');
  
  if (img) img.src = path;
  if (directLink) directLink.href = path;

  // Update button active classes
  // Paper buttons
  document.getElementById('impositionA4Btn').className = (impositionState.paper === 'A4') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
  document.getElementById('impositionA3Btn').className = (impositionState.paper === 'A3') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
  
  // Theme buttons
  document.getElementById('impositionDarkBtn').className = (impositionState.theme === 'dark') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
  document.getElementById('impositionWhiteBtn').className = (impositionState.theme === 'white') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
  
  // Face buttons
  document.getElementById('impositionFrontBtn').className = (impositionState.face === 'front') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
  document.getElementById('impositionBackBtn').className = (impositionState.face === 'back') ? 'btn-asset btn-asset-primary' : 'btn-asset btn-asset-secondary';
}

function setImpositionPaper(paper) {
  impositionState.paper = paper;
  updateImpositionView();
  showToast(`${paper} Tabaka Seçildi (${paper === 'A4' ? '10 Kart' : '21 Kart'})`);
}

function setImpositionTheme(theme) {
  impositionState.theme = theme;
  updateImpositionView();
  showToast(theme === 'dark' ? 'Koyu Lüks Mat Tabaka Seçildi' : 'Beyaz Minimalist Tabaka Seçildi');
}

function setImpositionFace(face) {
  impositionState.face = face;
  updateImpositionView();
  showToast(face === 'front' ? 'Ön Yüz Tabakası Seçildi' : 'Arka Yüz (QR) Tabakası Seçildi');
}

function downloadCurrentImpositionPng() {
  const filename = getImpositionFilename();
  const path = `../assets/images/brand/print/${filename}`;
  const outName = `zersoft-tabaka-${impositionState.paper}-${impositionState.theme}-${impositionState.face}-300dpi.png`;
  
  // A4 @ 300 DPI: 2480 x 3508 | A3 @ 300 DPI: 3508 x 4960
  const w = (impositionState.paper === 'A4') ? 2480 : 3508;
  const h = (impositionState.paper === 'A4') ? 3508 : 4960;
  
  downloadSvgAsPng(path, outName, w, h);
}

function downloadCurrentImpositionSvg() {
  const filename = getImpositionFilename();
  const path = `../assets/images/brand/print/${filename}`;
  
  const a = document.createElement('a');
  a.href = path;
  a.download = filename;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  showToast('Tabaka SVG İndirildi!');
}

function printCurrentImposition() {
  const filename = getImpositionFilename();
  const path = `../assets/images/brand/print/${filename}`;
  const paper = impositionState.paper;

  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <!DOCTYPE html>
    <html>
    <head>
      <title>Zersoft Kartvizit ${paper} Baskı Montajı</title>
      <style>
        @page {
          size: ${paper};
          margin: 0;
        }
        body {
          margin: 0;
          padding: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          background: #ffffff;
        }
        img {
          width: 100vw;
          height: 100vh;
          object-fit: contain;
          display: block;
        }
        @media print {
          body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
      </style>
    </head>
    <body>
      <img src="${path}" onload="window.print();">
    </body>
    </html>
  `);
  printWindow.document.close();
}

// Toast notification helper
function showToast(message) {
  const toast = document.getElementById('toastNotification');
  toast.innerHTML = `<i class="fa-solid fa-check"></i> ${message}`;
  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 2400);
}

// Copy Text / HEX
function copyToClipboard(text, message) {
  navigator.clipboard.writeText(text).then(() => {
    showToast(message || 'Kopyalandı!');
  }).catch(err => {
    console.error('Copy failed', err);
  });
}

// Copy SVG raw code
async function copySvgCode(svgPath) {
  try {
    const res = await fetch(svgPath);
    const text = await res.text();
    await navigator.clipboard.writeText(text);
    showToast('SVG Kodu Panoya Kopyalandı!');
  } catch (err) {
    console.error(err);
    showToast('Kopyalama başarısız oldu.');
  }
}

// Copy HTML email signature
function copyEmailSignatureHTML() {
  const signature = document.getElementById('emailSignaturePreview');
  if (!signature) return;
  let html = signature.outerHTML;
  // Convert relative image path to absolute URL for external email clients
  html = html.replace(/\.\.\/assets\/images\//g, 'https://zersoft.net/assets/images/');
  navigator.clipboard.writeText(html).then(() => {
    showToast('HTML E-Posta İmzası Panoya Kopyalandı!');
  });
}

// High-fidelity SVG to PNG canvas exporter (Zero blur / full target resolution)
async function downloadSvgAsPng(svgUrl, filename, targetWidth, targetHeight) {
  showToast('PNG hazırlanıyor...');
  try {
    const res = await fetch(svgUrl);
    let svgText = await res.text();

    const blob = new Blob([svgText], { type: 'image/svg+xml;charset=utf-8' });
    const URL = window.URL || window.webkitURL || window;
    const blobURL = URL.createObjectURL(blob);

    const image = new Image();
    image.onload = function() {
      const canvas = document.getElementById('exportCanvas');
      canvas.width = targetWidth || image.width || 1200;
      canvas.height = targetHeight || image.height || 630;
      
      const ctx = canvas.getContext('2d');
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
      
      URL.revokeObjectURL(blobURL);

      // Trigger download
      const pngUrl = canvas.toDataURL('image/png');
      const downloadLink = document.createElement('a');
      downloadLink.href = pngUrl;
      downloadLink.download = filename || 'zersoft-asset.png';
      document.body.appendChild(downloadLink);
      downloadLink.click();
      document.body.removeChild(downloadLink);
      showToast('PNG Başarıyla İndirildi!');
    };
    image.src = blobURL;
  } catch (err) {
    console.error('PNG export error', err);
    showToast('PNG oluşturulurken bir hata oluştu.');
  }
}
</script>

</main>
</body>
</html>
