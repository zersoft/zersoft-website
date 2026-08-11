-- Zersoft Technology Database Schema
-- Zersoft Bilişim & Danışmanlık Gerçek Kurumsal Verileri Uyumlu

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

-- --------------------------------------------------------

--
-- Tablo: `users` (Admin Kullanıcıları)
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(100) NOT NULL,
  `role` VARCHAR(20) DEFAULT 'admin',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Varsayılan Kullanıcı: admin / admin123
REPLACE INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `role`) VALUES
(1, 'admin', 'admin@zersoft.net', '$2y$10$GRVGgiRboxVrGNo6YJfZB.e3xM6zXahRh2FznSpPUMiIz.DPn1EHC', 'Zersoft Yönetici', 'admin');

-- --------------------------------------------------------

--
-- Tablo: `site_settings` (Site Genel Ayarları)
--
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` INT PRIMARY KEY DEFAULT 1,
  `site_name` VARCHAR(100) NOT NULL DEFAULT 'ZERSOFT Bilişim & Danışmanlık',
  `site_tagline` VARCHAR(255) DEFAULT 'Dijital Dönüşümde Çözüm Ortağınız & Yapay Zeka Çözümleri',
  `meta_description` TEXT,
  `phone` VARCHAR(30) DEFAULT '+90 (555) 587 93 70',
  `email` VARCHAR(100) DEFAULT 'info@zersoft.net',
  `address` TEXT,
  `working_hours` VARCHAR(100) DEFAULT 'Pazartesi - Cuma: 09:00 - 18:00',
  `facebook` VARCHAR(255) DEFAULT 'https://facebook.com/zersoftnet',
  `twitter` VARCHAR(255) DEFAULT 'https://twitter.com/zersoftnet',
  `linkedin` VARCHAR(255) DEFAULT 'https://linkedin.com/company/zersoft',
  `github` VARCHAR(255) DEFAULT 'https://github.com/zersoft',
  `instagram` VARCHAR(255) DEFAULT 'https://instagram.com/zersoftnet',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

REPLACE INTO `site_settings` (`id`, `site_name`, `site_tagline`, `meta_description`, `phone`, `email`, `address`, `working_hours`) VALUES
(1, 'ZERSOFT Bilişim & Danışmanlık', 'Dijital Dönüşümde Çözüm Ortağınız & Yapay Zeka Çözümleri', 'Zersoft; Hafriyat Saha Kantar Otomasyonu, Katı Atık Kantar Otomasyonu, Maden Ocağı Kantar Yazılımı, Özel Ön Muhasebe Uygulamaları ve Yapay Zeka Çözümleri geliştiren teknoloji firmasıdır.', '+90 (555) 587 93 70', 'info@zersoft.net', 'Osmangazi / BURSA', 'Pazartesi - Cuma: 09:00 - 18:00');

-- --------------------------------------------------------

--
-- Tablo: `services` (Kurumsal Hizmetler)
--
CREATE TABLE IF NOT EXISTS `services` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `short_description` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `icon` VARCHAR(50) NOT NULL DEFAULT 'fa-code',
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `title`, `slug`, `short_description`, `content`, `icon`, `sort_order`) VALUES
(1, 'Hafriyat & Saha Kantar Otomasyonu', 'hafriyat-saha-kantar-otomasyonu', 'Hafriyat sahaları ve döküm alanları için plaka tanımalı otonom kantar yazılımı.', 'Hafriyat yönetim sistemleri, saha kantarları ve geçiş kontrol noktaları için kameralı plaka okuma entegrasyonuna sahip uçtan uca kantar otomasyonu sunuyoruz. Saha trafiğinizi ve tartım süreçlerinizi anlık raporluyoruz.', 'fa-truck-ramp-box', 1),
(2, 'Yapay Zeka & Akıllı Otomasyon', 'yapay-zeka-akilli-otomasyon', 'Saha operasyonlarınızı ve kantar verilerinizi otonom hale getiren yapay zeka çözümleri.', 'Kurumunuza özel eğitilmiş LLM modelleri, doğal dil işleme asistanları ve görüntülü plaka/araç tanıma AI algoritmaları geliştiriyoruz. Veri işleme maliyetlerinizi düşürürken operasyonel verimliliğinizi katlıyoruz.', 'fa-brain', 2),
(3, 'Katı Atık & Maden Ocağı Kantar Sistemleri', 'kati-atik-maden-ocagi-kantar-sistemleri', 'Belediyeler, katı atık yönetim sahaları ve maden ocakları için entegre kantar yazılımı.', 'Katı atık bertaraf tesisleri ve maden ocaklarının zorlu saha şartlarına uygun, kesintisiz çalışan, e-Fatura ve ön muhasebe entegreli kantar otomasyonu çözümleri sunuyoruz.', 'fa-weight-hanging', 3),
(4, 'Özel Ön Muhasebe & ERP Uygulamaları', 'ozel-on-muhasebe-erp-uygulamalari', 'İşletmenizin süreçlerine tam uyan özel ön muhasebe, stok ve cari takip sistemleri.', 'Standart paket yazılımların yetersiz kaldığı durumlarda, firmanıza özel modüler ön muhasebe, stok yönetimi, müşteri cari takibi ve raporlama yazılımları geliştiriyoruz.', 'fa-calculator', 4),
(5, 'İnteraktif Web & SaaS Geliştirme', 'interaktif-web-saas-gelistirme', 'Yüksek performanslı kurumsal web siteleri, SaaS platformları ve mobil entegrasyonlar.', 'Kurumsal kimliğinizi en iyi yansıtan interaktif web tasarımları, cloud-native web yazılımları ve saha yönetim portalları kodluyoruz.', 'fa-laptop-code', 5),
(6, 'API & Sistem Entegrasyon Danışmanlığı', 'api-sistem-entegrasyon-danismanligi', 'Logo, SAP, Nebim ve kantar sistemleri arasında güvenli mikroservis entegrasyonları.', 'Mevcut ERP, CRM ve ön muhasebe sistemleriniz ile kantar otomasyonu ve yapay zeka servisleriniz arasında kesintisiz veri senkronizasyonu sağlıyoruz.', 'fa-network-wired', 6);

-- --------------------------------------------------------

--
-- Tablo: `ai_solutions` (Yapay Zeka Çözümlerimiz)
--
CREATE TABLE IF NOT EXISTS `ai_solutions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `badge_text` VARCHAR(50) DEFAULT 'AI Powered',
  `summary` TEXT NOT NULL,
  `features_json` TEXT NOT NULL,
  `icon` VARCHAR(50) DEFAULT 'fa-microchip',
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ai_solutions` (`id`, `title`, `badge_text`, `summary`, `features_json`, `icon`, `sort_order`) VALUES
(1, 'Kantar & Saha Kamera AI Plaka Tanıma', 'Vision AI', 'Saha kantarlarında geçen araç plakalarını ve dorseleri kameralar üzerinden %99.8 doğrulukla anlık okuyan görüntü işleme modeli.', '["Gece / Gündüz Yüksek Doğruluk", "Çamurlu / Kirli Plaka Okuma Yeteneği", "Otomatik Bariyer ve Kantar Tetikleme", "Anlık Veritabanı ve Ön Muhasebe Kaydı"]', 'fa-eye', 1),
(2, 'Kurumsal RAG & Doküman Zekası', 'Enterprise AI', 'Şirketinizin tüm mevzuat, ihale, kantar ve muhasebe kayıtlarını anında yanıtlayan yerel yapay zeka asistanı.', '["Yerel Sunucuda Çalışma (On-Premise)", "KVKK ve Veri Gizliliği Garantisi", "Vektör Veritabanı Entegrasyonu", "Anlık Doküman İçi Arama ve Özetleme"]', 'fa-file-lines', 2),
(3, 'Otonom Saha & İş Akış Robotları (AI Agent)', '24/7 Smart Bot', 'Hafriyat ve lojistik sahalarında kantardan geçen araçların onay süreçlerini ve irsaliye girişlerini otonom tamamlayan AI ajanları.', '["Sipariş ve İrsaliye Otomasyonu", "Kantar Verisi Otomatik Onaylama", "WhatsApp ve SMS İrsaliye Bildirimi", "Saha Kamera ve Sensör Entegrasyonu"]', 'fa-robot', 3),
(4, 'Kestirimci Analiz & Fire/Stok Tahmini', 'Predictive ML', 'Maden, katı atık ve saha verilerini analiz ederek gelecekteki stok, döküm hacmi ve maliyet sapmalarını öngören makine öğrenimi.', '["Stok Tükenme ve Aşırı Yükleme Önleme", "Saha Kaçak / Hatalı Tartım Tespiti", "Dinamik Fiyatlandırma Algoritmaları", "İş Zekası (BI) Dashboard Entegrasyonu"]', 'fa-chart-line', 4);

-- --------------------------------------------------------

--
-- Tablo: `projects` (Portföy & Başarı Hikayeleri)
--
CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `client` VARCHAR(100) NOT NULL,
  `category` VARCHAR(50) NOT NULL DEFAULT 'Kantar & AI',
  `tech_stack` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `image_url` VARCHAR(255) DEFAULT '',
  `live_url` VARCHAR(255) DEFAULT '#',
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `projects` (`id`, `title`, `client`, `category`, `tech_stack`, `description`, `image_url`, `live_url`, `sort_order`) VALUES
(1, 'Hafriyat Saha Kantar & Plaka Tanıma Otomasyonu', 'Bursa Bölge Hafriyat Sahaları', 'Kantar & AI', 'C#, Python OpenCV, PHP, MySQL', 'Gece/gündüz kamera entegreli, otomatik kantar tartım ve hafriyat döküm takip yazılımı projesi.', 'assets/images/project1.jpg', '#', 1),
(2, 'Katı Atık Yönetim Tesisi Kantar Yazılımı', 'Büyükşehir Katı Atık Tesisleri', 'Otomasyon', 'PHP 8, C#, MySQL, Web API', 'Günde 1.000+ kamyon tartım kapasiteli, ön muhasebe ve irsaliye entegrasyonlu kantar otomasyonu.', 'assets/images/project2.jpg', '#', 2),
(3, 'Maden Ocağı Entegre Kantar & Stok Portalı', 'Maden İşletmeleri A.Ş.', 'Kantar & ERP', 'Python, PHP, React, PostgreSQL', 'Maden sahalarında sıfır hata ile çalışan otomatik kantar tartım ve anlık stok analiz portalı.', 'assets/images/project3.jpg', '#', 3),
(4, 'Kurumsal RAG Doküman & Saha Asistanı', 'Zersoft AI Lab', 'Yapay Zeka', 'LangChain, LlamaIndex, OpenAI, PHP PDO', 'Tüm saha mevzuatı, ihale ve kantar arşivini mühendisler için anında sorgulanabilir kılan yapay zeka asistanı.', 'assets/images/project4.jpg', '#', 4);

-- --------------------------------------------------------

--
-- Tablo: `messages` (İletişim Formu Mesajları)
--
CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(30) DEFAULT '',
  `subject` VARCHAR(150) NOT NULL,
  `message` TEXT NOT NULL,
  `status` VARCHAR(20) DEFAULT 'unread',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `messages` (`id`, `full_name`, `email`, `phone`, `subject`, `message`, `status`) VALUES
(1, 'Ahmet Yılmaz', 'ahmet.yilmaz@ornekholding.com', '+90 532 111 2233', 'Hafriyat Kantar Otomasyonu & AI Plaka Tanıma', 'Merhaba Zersoft ekibi, Hafriyat sahamız için kamera entegreli kantar otomasyonu ve yapay zeka destekli plaka okuma yazılımı teklifi almak istiyoruz.', 'unread');

COMMIT;
