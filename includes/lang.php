<?php
/**
 * Zersoft Technology - Çoklu Dil (i18n) Motoru & Sözlük
 * Türkçe (TR) & İngilizce (EN)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Dil seçimini algıla (URL param -> Cookie -> Session -> Default TR)
if (isset($_GET['lang']) && in_array($_GET['lang'], ['tr', 'en'])) {
    $currentLang = $_GET['lang'];
    $_SESSION['lang'] = $currentLang;
    setcookie('zersoft_lang', $currentLang, time() + (86400 * 30), '/');
} else {
    $currentLang = $_SESSION['lang'] ?? $_COOKIE['zersoft_lang'] ?? 'tr';
}

$translations = [
    'tr' => [
        // Meta & Brand
        'site_title_suffix' => 'Zersoft Teknoloji - Kantar Otomasyonu & Yapay Zeka Çözümleri',
        'nav_home' => 'Ana Sayfa',
        'nav_services' => 'Hizmetlerimiz',
        'nav_products' => 'Ürünlerimiz',
        'nav_ai' => 'Yapay Zeka',
        'nav_portfolio' => 'Projelerimiz',
        'nav_about' => 'Hakkımızda',
        'nav_contact' => 'İletişim',
        'nav_get_quote' => 'Teklif Alın',
        
        // Theme & Lang
        'theme_toggle' => 'Temayı Değiştir',
        'lang_tr' => 'Türkçe',
        'lang_en' => 'English',

        // Hero Slider
        'slide1_badge' => 'Otonom Saha Sistemleri',
        'slide1_title' => 'Yapay Zeka & Akıllı Kantar Otomasyonu',
        'slide1_desc' => 'Plaka okuma kameraları, otomatik bariyer tetikleme ve canlı ön muhasebe entegrasyonu ile sahalarınızı 7/24 kesintisiz yönetin.',
        'slide1_btn1' => 'Çözümlerimizi İnceleyin',
        'slide1_btn2' => 'Canlı Demo İste',

        'slide2_badge' => 'İmalat Sektörüne Özel ERP & CRM',
        'slide2_title' => 'IYS — İmalat & Süreç Yönetim Programı',
        'slide2_desc' => 'İmalat işletmeleri için Sipariş ➔ Planlama ➔ Tasarım ➔ Üretim ➔ Teslimat aşamalarını uçtan uca yöneten özel süreç kontrol platformu.',
        'slide2_btn1' => 'IYS İmalat Sistemini Keşfet',
        'slide2_btn2' => 'Canlı Tanıtım (iys.zersoft.net)',

        'slide3_badge' => 'Yerel Doküman Zekası',
        'slide3_title' => 'Kurumsal RAG & Özel LLM Asistanı',
        'slide3_desc' => 'KVKK uyumlu on-premise vektör veritabanı ile şirket içi mevzuat ve sözleşmelerinizi saniyeler içinde sorgulayın.',
        'slide3_btn1' => 'Yapay Zeka Çözümleri',
        'slide3_btn2' => 'Teknik Detaylar',

        // Quick Stats
        'stat_accuracy' => 'Kantar Plaka Okuma Doğruluğu',
        'stat_support' => 'Kesintisiz Saha Desteği',
        'stat_time' => 'Tartım Süreçlerinde Zaman Tasarrufu',
        'stat_security' => 'KVKK & Yerel Sunucu Güvenliği',

        // Sections
        'section_services_title' => 'Öne Çıkan Hizmetlerimiz',
        'section_services_sub' => 'Endüstriyel saha otomasyonundan özel yapay zeka ajanlarına kadar uçtan uca dijital dönüşüm.',
        'section_products_title' => 'Öne Çıkan Ürünlerimiz',
        'section_products_sub' => 'Saha operasyonlarınızı ve işletmenizi hızlandıran hazır yazılım çözümlerimiz.',
        'section_ai_title' => 'Yapay Zeka Çözümlerimiz',
        'section_ai_sub' => 'İş süreçlerinizi otonomlaştıran RAG, LLM ve bilgisayarlı görü modelleri.',

        // Buttons & General
        'btn_details' => 'Detayları İncele',
        'btn_demo' => 'Demo İste',
        'btn_preview' => 'Ekran Görüntüsünü Büyüt',
        'btn_send' => 'Mesajı Gönder',
        'read_more' => 'Devamını Oku',

        // Cookie & Legal
        'cookie_title' => 'Çerez Kullanımı ve Gizlilik Bildirimi',
        'cookie_text' => 'Size en iyi deneyimi sunmak, web sitesi trafiğini analiz etmek ve güvenliği sağlamak için çerezler kullanıyoruz.',
        'cookie_accept' => 'Kabul Et ve Kapat',
        'cookie_policy' => 'Gizlilik ve Çerez Politikası',

        // Contact & Spam
        'contact_title' => 'Bizimle İletişime Geçin',
        'contact_sub' => 'Projeleriniz, teklif talepleriniz ve teknik sorularınız için 7/24 hizmetinizdeyiz.',
        'captcha_label' => 'Güvenlik Doğrulaması (İşlem Sonucunu Yazınız)',
        'captcha_placeholder' => 'Örn: 5 + 3 = ?',
        'form_name' => 'Adınız Soyadınız',
        'form_email' => 'E-Posta Adresiniz',
        'form_phone' => 'Telefon Numaranız',
        'form_subject' => 'Konu',
        'form_message' => 'Mesajınız',
    ],

    'en' => [
        // Meta & Brand
        'site_title_suffix' => 'Zersoft Technology - Weighbridge Automation & AI Solutions',
        'nav_home' => 'Home',
        'nav_services' => 'Services',
        'nav_products' => 'Products',
        'nav_ai' => 'AI Solutions',
        'nav_portfolio' => 'Projects',
        'nav_about' => 'About Us',
        'nav_contact' => 'Contact',
        'nav_get_quote' => 'Get a Quote',
        
        // Theme & Lang
        'theme_toggle' => 'Toggle Theme',
        'lang_tr' => 'Türkçe',
        'lang_en' => 'English',

        // Hero Slider
        'slide1_badge' => 'Autonomous Field Systems',
        'slide1_title' => 'AI & Smart Weighbridge Automation',
        'slide1_desc' => 'Manage your operational sites 24/7 seamlessly with ALPR license plate cameras, automatic barriers, and live accounting integration.',
        'slide1_btn1' => 'Explore Our Solutions',
        'slide1_btn2' => 'Request Live Demo',

        'slide2_badge' => 'Enterprise Process Management',
        'slide2_title' => 'IYS — Business & Process Management Platform',
        'slide2_desc' => 'Control customer accounts, digitize delivery notes, and manage field operations from a single autonomous platform.',
        'slide2_btn1' => 'Discover IYS Platform',
        'slide2_btn2' => 'Contact Us Now',

        'slide3_badge' => 'Local Document Intelligence',
        'slide3_title' => 'Enterprise RAG & Custom LLM Assistant',
        'slide3_desc' => 'Query your internal compliance, contracts, and documents in seconds with a GDPR-compliant on-premise vector database.',
        'slide3_btn1' => 'AI Solutions',
        'slide3_btn2' => 'Technical Specs',

        // Quick Stats
        'stat_accuracy' => 'Weighbridge ALPR Accuracy',
        'stat_support' => 'Uninterrupted Field Support',
        'stat_time' => 'Time Saved in Weighing',
        'stat_security' => 'Local & Secure Server Data',

        // Sections
        'section_services_title' => 'Featured Services',
        'section_services_sub' => 'End-to-end digital transformation from industrial automation to custom AI agents.',
        'section_products_title' => 'Our Software Products',
        'section_products_sub' => 'Turnkey software solutions accelerating your field operations and business.',
        'section_ai_title' => 'Our AI Solutions',
        'section_ai_sub' => 'RAG, LLM, and Computer Vision models automating your business processes.',

        // Buttons & General
        'btn_details' => 'View Details',
        'btn_demo' => 'Request Demo',
        'btn_preview' => 'Expand Screenshot',
        'btn_send' => 'Send Message',
        'read_more' => 'Read More',

        // Cookie & Legal
        'cookie_title' => 'Cookie & Privacy Notice',
        'cookie_text' => 'We use cookies to provide you with the best experience, analyze traffic, and ensure site security.',
        'cookie_accept' => 'Accept & Close',
        'cookie_policy' => 'Privacy & Cookie Policy',

        // Contact & Spam
        'contact_title' => 'Get In Touch',
        'contact_sub' => 'Available 24/7 for your software inquiries, project quotes, and technical support.',
        'captcha_label' => 'Security Verification (Enter calculation result)',
        'captcha_placeholder' => 'e.g. 5 + 3 = ?',
        'form_name' => 'Full Name',
        'form_email' => 'Email Address',
        'form_phone' => 'Phone Number',
        'form_subject' => 'Subject',
        'form_message' => 'Your Message',
    ]
];

/**
 * Çeviri Metni Getir
 */
function __($key, $default = '') {
    global $currentLang, $translations;
    if (isset($translations[$currentLang][$key])) {
        return $translations[$currentLang][$key];
    }
    if (isset($translations['tr'][$key])) {
        return $translations['tr'][$key];
    }
    return !empty($default) ? $default : $key;
}

/**
 * Aktif Dil Kodu
 */
function getCurrentLang() {
    global $currentLang;
    return $currentLang;
}
