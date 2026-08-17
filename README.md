# ZERSOFT Bilişim & Danışmanlık — Resmi Kurumsal Web Sitesi

Modern PHP 8 / MySQL / cPanel kurumsal web sitesi ve yönetim paneli.

## Özellikler

- **Ultra-Modern Dark/Tech Tasarım** — Glassmorphism, neon gradyanlar, micro-animations
- **Yapay Zeka Çözümleri Vitrini** — Kurumsal RAG, AI Agent, Kantar Plaka Tanıma, Kestirimci Analiz
- **PHP 8 + PDO Yönetim Paneli** — Bcrypt güvenli giriş, CSRF koruması, Prepared Statements
- **cPanel / MySQL Uyumlu** — Standart shared hosting ortamında tak-çalıştır

## Hizmetler

- Hafriyat Saha Kantar Otomasyonu
- Katı Atık Yönetim Kantar Sistemi
- Maden Ocağı Entegre Kantar Yazılımı
- Özel Ön Muhasebe & ERP Uygulamaları
- İnteraktif Web & SaaS Geliştirme
- API & Sistem Entegrasyon Danışmanlığı

## Kurulum (cPanel Hosting)

### 1. Dosyaları Yükle
Tüm dosyaları `public_html/` dizinine yükleyin.

### 2. Veritabanı Kur
- cPanel → MySQL Veritabanları → Yeni veritabanı + kullanıcı oluşturun
- cPanel → phpMyAdmin → `database.sql` dosyasını import edin

### 3. Yapılandır
`config/database.php` içindeki bilgileri güncelleyin:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'veritabani_adi');
define('DB_USER', 'kullanici_adi');
define('DB_PASS', 'sifreniz');
```

### 4. Admin Paneli
- URL: `yourdomain.com/admin/login.php`
- Giriş yaptıktan sonra Admin → Site Ayarları menüsünden şifrenizi belirleyiniz.

## Proje Yapısı

```
zersoft.net/
├── config/          # Veritabanı bağlantısı
├── includes/        # Header, footer, yardımcı fonksiyonlar
├── assets/          # CSS, JS, görseller
├── admin/           # Yönetim paneli (Login, Dashboard, CRUD)
├── api/             # AJAX API endpoint'leri
├── index.php        # Ana sayfa
├── services.php     # Hizmetlerimiz
├── ai-solutions.php # Yapay Zeka Çözümleri
├── portfolio.php    # Projelerimiz
├── about.php        # Hakkımızda
├── contact.php      # İletişim
└── database.sql     # Veritabanı şeması ve örnek veriler
```

## Teknoloji Yığını

- **Backend:** PHP 8.3, PDO (MySQL / SQLite Fallback)
- **Frontend:** Vanilla HTML + CSS (Glassmorphism / Dark Tech) + Vanilla JS
- **Fonts:** Google Fonts — Plus Jakarta Sans, Space Grotesk
- **Icons:** FontAwesome 6
- **Güvenlik:** Bcrypt, CSRF Token, XSS Koruması

## Lisans

© 2025 ZERSOFT Bilişim & Danışmanlık. Tüm hakları saklıdır.
