<?php
/**
 * Zersoft Technology - Çoklu Dil (i18n) Motoru & Kapsamlı Sözlük
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
        'site_name' => 'ZERSOFT Bilişim & Danışmanlık',
        'site_title_suffix' => 'Zersoft Teknoloji - Kantar Otomasyonu & Yapay Zeka Çözümleri',
        'site_tagline' => 'Yeni Nesil Teknoloji',
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

        // Hero Slider (index.php)
        'slide1_badge' => 'Otonom Saha Sistemleri',
        'slide1_title' => 'Yapay Zeka & Akıllı Kantar Otomasyonu',
        'slide1_desc' => 'Otomatik indikatör haberleşmesi, bariyer kontrolü ve anlık ön muhasebe entegrasyonu ile sahalarınızı 7/24 kesintisiz yönetin.',
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
        'stat_uptime' => 'Sistem Çalışma Süresi & Kararlılık',
        'stat_support' => 'Kesintisiz Saha Desteği',
        'stat_time' => 'Tartım Süreçlerinde Zaman Tasarrufu',
        'stat_security' => 'KVKK & Yerel Sunucu Güvenliği',

        // Index Sections
        'section_services_badge' => 'KURUMSAL HİZMETLERİMİZ',
        'section_services_title' => 'Öne Çıkan Hizmetlerimiz',
        'section_services_sub' => 'Endüstriyel saha otomasyonundan özel yapay zeka ajanlarına kadar uçtan uca dijital dönüşüm.',
        'section_products_badge' => 'YAZILIM ÜRÜNLERİMİZ',
        'section_products_title' => 'Saha ve İşletmeniz İçin Akıllı Yazılımlar',
        'section_products_sub' => 'Saha operasyonlarınızı ve işletmenizi hızlandıran hazır yazılım çözümlerimizin ekran görüntüleri.',
        'section_ai_badge' => 'YAPAY ZEKA ÇÖZÜMLERİMİZ',
        'section_ai_title' => 'İş Süreçleriniz İçin Özel AI Mimarileri',
        'section_ai_sub' => 'Verilerinizi sadece saklamayın; onları 7/24 çalışan akıllı sistemlere ve otonom kararlara dönüştürün.',

        // Products Page (products.php & iys.php)
        'products_hero_badge' => 'HAZIR YAZILIM ÜRÜNLERİ',
        'products_hero_title' => 'Saha ve İşletmeniz İçin Akıllı Yazılımlar',
        'products_hero_desc' => 'Sahada rüştünü ispatlamış kantar otomasyonları, IYS İş ve Süreç Yönetim platformu ve katı atık saha çözümlerimiz.',

        'prod_kantar_badge' => 'SAHA KANTAR OTOMASYONU',
        'prod_kantar_title' => 'Hafriyat & Saha Kantar Otomasyonu v4.2',
        'prod_kantar_desc' => 'Otomatik indikatör tartımı, bariyer sistemleri, anlık kantar okuma, tartım fişi ve e-İrsaliye basımı ile hafriyat sahalarınızı %100 otonom yönetin.',

        'prod_iys_badge' => 'İMALAT SEKTÖRÜ ERP',
        'prod_iys_title' => 'IYS — İmalat & Süreç Yönetim Programı',
        'prod_iys_desc' => 'İmalat sektörüne özel Sipariş ➔ Planlama ➔ Tasarım ➔ Üretim ➔ Teslimat aşamalarını detaylı yöneten, Microsoft Access altyapılı ve web dönüşüm uyumlu kurumsal ERP platformu.',
        'prod_iys_btn_explore' => 'İmalat Çözümünü İncele',

        'prod_kati_badge' => 'BELEDİYE & MADEN SANAYİ',
        'prod_kati_title' => 'Katı Atık & Maden Ocağı Kantar Yazılımı',
        'prod_kati_desc' => 'Belediyelerin katı atık bertaraf tesisleri ve maden ocaklarının zorlu iklim koşullarına uygun, kesintisiz çalışan, e-Fatura ve ön muhasebe entegreli kantar otomasyonu.',

        // IYS Page (iys.php)
        'iys_hero_badge' => 'İMALAT SEKTÖRÜNE ÖZEL ERP',
        'iys_hero_title' => 'IYS — İmalat & Süreç Yönetim Programı',
        'iys_hero_desc' => 'Müşteri siparişinden teslimata kadar tüm imalat aşamalarını (Sipariş ➔ Planlama ➔ Tasarım ➔ Üretim ➔ Teslimat) tek bir ekrandan yönetin.',
        'iys_live_btn' => 'iys.zersoft.net Canlı Tanıtımı İncele 🔗',
        'iys_pipeline_badge' => 'DİJİTAL İMALAT ZİNCİRİ',
        'iys_pipeline_title' => 'İmalat Sanayi İçin 5 Adımlı Süreç Yönetimi',
        'iys_pipeline_sub' => 'Kantar otomasyonlarından tamamen bağımsız, imalat atölyeleri ve fabrikalar için geliştirilmiş modüler altyapı.',

        'iys_step1_title' => '1. Sipariş Yönetimi',
        'iys_step1_desc' => 'Müşteri talepleri, teknik şartnameler, revizyon takibi ve teklif onay mekanizması.',
        'iys_step2_title' => '2. Üretim Planlama',
        'iys_step2_desc' => 'Hammadde ve stok ihtiyacı, makine kapasite tahsisi ve uçtan uca termin çizelgeleme.',
        'iys_step3_title' => '3. Tasarım & Ar-Ge',
        'iys_step3_desc' => '3D CAD/CAM çizim dosyaları, ürün reçetesi (BOM) hazırlama ve teknik numune onayı.',
        'iys_step4_title' => '4. Atölye & Üretim',
        'iys_step4_desc' => 'Barkodlu iş emirleri, istasyon süresi, kalite kontrol ve fire oranları takibi.',
        'iys_step5_title' => '5. Sevkiyat & Teslimat',
        'iys_step5_desc' => 'Paketleme listeleri, e-İrsaliye basımı, müşteri teslimat onayı ve resmi faturalandırma.',

        'iys_tech_badge' => 'MASAÜSTÜ & WEB DÖNÜŞÜMÜ',
        'iys_tech_title' => 'Microsoft Access Altyapısı & İleri Web Mimarisi',
        'iys_tech_desc' => 'Yıllardır Microsoft Access Formları üzerinde milyonlarca siparişi başarıyla yöneten IYS, müşteri istekleri ve sektör deneyimiyle olgunlaşmış sezgisel bir arayüze sahiptir. Halen yeni nesil web ve bulut (Cloud) mimarisine dönüştürülme süreci devam etmektedir.',

        // Services Page (services.php)
        'services_hero_badge' => 'UÇTAN UCA HİZMETLER',
        'services_hero_title' => 'Kurumsal Yazılım Hizmetlerimiz',
        'services_hero_desc' => 'Şirketinizin dijital altyapısını en yüksek performans, siber güvenlik ve yapay zeka standartlarında yeniden inşa ediyoruz.',
        'services_get_quote' => 'Bu Hizmet İçin Teklif Alın',

        // AI Solutions Page (ai-solutions.php)
        'ai_hero_badge' => 'İLERİ TEKNOLOJİ VİZYONU',
        'ai_hero_title' => 'Yapay Zeka Destekli Özel Yazılım Çözümleri',
        'ai_hero_desc' => 'Zersoft; işletmenize özel eğitilmiş yapay zeka modelleri, doğal dil işleme asistanları ve otonom iş akışı robotları ile kurumunuzu geleceğe taşır.',
        'ai_capabilities_title' => 'Öne Çıkan AI Yetenekleri:',
        'ai_consulting_btn' => 'Danışmanlık ve Randevu Alın',
        'ai_sec_badge' => 'KVKK & GİZLİLİK UYUMLU',
        'ai_sec_title' => 'Verileriniz Asla Dışarı Çıkmaz',
        'ai_sec_desc' => 'Geliştirdiğimiz kurumsal yapay zeka modelleri ve RAG mimarileri doğrudan şirketinizin kendi sunucularında (On-Premise) veya özel bulut alanınızda çalışır. Veri mahremiyeti ve ticari sırlarınız %100 güvence altındadır.',

        // Portfolio Page (portfolio.php)
        'portfolio_hero_badge' => 'BAŞARI HİKAYELERİ',
        'portfolio_hero_title' => 'Tamamlanan Projelerimiz',
        'portfolio_hero_desc' => 'Farklı sektörlerdeki kurumsal müşterilerimiz için hayata geçirdiğimiz teknoloji projeleri.',

        // About Page (about.php)
        'about_hero_badge' => 'KURUMSAL BİLGİ',
        'about_hero_title' => 'Biz Kimiz & Gelecek Vizyonumuz',
        'about_hero_desc' => 'Yapay zeka ve ileri yazılım mühendisliği disipliniyle kurumsal dijitalleşmeye yön veriyoruz.',
        'about_section_title' => 'Teknoloji ve Yapay Zeka Odaklı Yaklaşımımız',

        // Brand Story (Convergence Mark)
        'brand_story_badge'   => 'MARKA HİKÂYESİ',
        'brand_story_title'   => 'Kargaşadan Kesmişiz Bir Karar',
        'brand_story_sub'     => 'ZERSOFT logosu, yaptığımız işin özünü tek bir geometride anlatır.',
        'brand_story_stream1' => 'Saha Verisi',
        'brand_story_stream1_desc' => 'Kantar indikatör sinyalleri, tartım ölçümleri ve saha operasyon verileri.',
        'brand_story_stream2' => 'Süreç Zekası',
        'brand_story_stream2_desc' => 'ERP, sipariş ve imalat süreçlerinin anlık durumu.',
        'brand_story_stream3' => 'Yapay Zeka',
        'brand_story_stream3_desc' => 'RAG doküman zekası ve özel AI modellerinin çıktısı.',
        'brand_story_point'   => 'Tek, Keskin Karar',
        'brand_story_point_desc' => 'Tüm akışlar ZERSOFT\'ta birleşir ve tek bir güvenilir, otonom karara dönüşür.',
        'brand_story_hidden'  => 'Logoda gizli bir anlam var: sağdan bakınca oluşan <strong>&gt;</strong> (büyüktür) işareti — daima bir adım ileride.',
        'brand_story_tagline' => '"Yeni Nesil Teknoloji" — her verinin bir anlama, her kararın bir değere dönüştüğü yer.',
        'about_p1' => 'Zersoft Teknoloji, geleneksel yazılım çözümlerinin ötesine geçerek şirketlerin operasyonel süreçlerini otonomlaştıran, verilerini yapay zeka ile işlenebilir kararlara dönüştüren bağımsız bir teknoloji şirketidir.',
        'about_p2' => 'Geliştirdiğimiz çözümlerde yüksek performans, mikroservis mimarisi, siber güvenlik standartları ve tam KVKK uyumluluğu temel prensiplerimizdir. Müşterilerimizle bir tedarikçi ilişkisinden ziyade, uçtan uca uzun vadeli bir teknoloji ortaklığı yürütüyoruz.',
        'about_vision_title' => 'Vizyonumuz',
        'about_vision_desc' => 'Küresel ölçekte kurumsal şirketlerin yapay zeka entegrasyonunu en güvenli, hızlı ve yüksek verimli şekilde gerçekleştiren öncü yazılım ve teknoloji şirketi olmak.',
        'about_mission_title' => 'Misyonumuz',
        'about_mission_desc' => 'Müşterilerimizin karmaşık iş süreçlerini sezgisel, otonom ve akıllı yazılım mimarilerine dönüştürerek rekabet avantajı ve sürdürülebilir büyüme sağlamak.',

        // Buttons & General
        'btn_details' => 'Detayları İncele',
        'btn_demo' => 'Demo İste',
        'btn_preview' => 'Ekran Görüntüsünü Büyüt',
        'btn_send' => 'Mesajı Gönder',
        'read_more' => 'Devamını Oku',
        'cta_title' => 'Saha ve Yazılım Projenizi Birlikte Başlatalım',
        'cta_desc' => 'Hafriyat kantarlarınız, maden ocaklarınız veya kurumunuza özel yazılım ihtiyaçlarınız için anında fiyat teklifi ve demo isteyin.',

        // Cookie & Legal
        'cookie_title' => 'Çerez Kullanımı ve Gizlilik Bildirimi',
        'cookie_text' => 'Size en iyi deneyimi sunmak, web sitesi trafiğini analiz etmek ve güvenliği sağlamak için çerezler kullanıyoruz.',
        'cookie_accept' => 'Kabul Et ve Kapat',
        'cookie_policy' => 'Gizlilik ve Çerez Politikası',

        // Contact & Spam (contact.php)
        'contact_title' => 'Bizimle İletişime Geçin',
        'contact_sub' => 'Projeleriniz, teklif talepleriniz ve teknik sorularınız için 7/24 hizmetinizdeyiz.',
        'office_title' => 'Zersoft Merkez Ofis',
        'office_sub' => 'Ekibimiz haftanın 5 günü sorularınızı yanıtlamaya ve projenizi değerlendirmeye hazırdır.',
        'label_address' => 'Adres',
        'label_phone' => 'Telefon',
        'label_email' => 'E-Posta',
        'label_hours' => 'Çalışma Saatleri',
        'captcha_title' => '🛡️ SPAM Koruması: Matematik İşlemi *',
        'form_name' => 'Adınız Soyadınız',
        'form_email' => 'E-Posta Adresiniz',
        'form_phone' => 'Telefon Numaranız',
        'form_subject' => 'Konu / Hizmet Türü',
        'form_message' => 'Mesajınız',

        // Footer
        'footer_quick_links' => 'Hızlı Bağlantılar',
        'footer_solutions' => 'Yazılım Çözümlerimiz',
        'footer_contact' => 'İletişim Bilgileri',
        'footer_rights' => 'Tüm Hakları Saklıdır.',
        'footer_compliance' => 'KVKK & GDPR Uyumlu Kurumsal Saha Otomasyonları'
    ],

    'en' => [
        // Meta & Brand
        'site_name' => 'ZERSOFT Information Technology & Consulting',
        'site_title_suffix' => 'Zersoft Technology - Weighbridge Automation & AI Solutions',
        'site_tagline' => 'Next-Gen Technology',
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

        // Hero Slider (index.php)
        'slide1_badge' => 'Autonomous Field Systems',
        'slide1_title' => 'AI & Smart Weighbridge Automation',
        'slide1_desc' => 'Manage your operational sites 24/7 seamlessly with automatic indicator reading, barrier triggers, and live accounting integration.',
        'slide1_btn1' => 'Explore Our Solutions',
        'slide1_btn2' => 'Request Live Demo',

        'slide2_badge' => 'Manufacturing ERP & Process Control',
        'slide2_title' => 'IYS — Manufacturing & Process Management',
        'slide2_desc' => 'Enterprise ERP platform managing Order ➔ Planning ➔ Design ➔ Production ➔ Delivery workflows end-to-end for manufacturing plants.',
        'slide2_btn1' => 'Discover IYS Manufacturing System',
        'slide2_btn2' => 'Live Demo (iys.zersoft.net)',

        'slide3_badge' => 'Local Document Intelligence',
        'slide3_title' => 'Enterprise RAG & Custom LLM Assistant',
        'slide3_desc' => 'Query your internal compliance, contracts, and documents in seconds with a GDPR-compliant on-premise vector database.',
        'slide3_btn1' => 'AI Solutions',
        'slide3_btn2' => 'Technical Specs',

        // Quick Stats
        'stat_uptime' => 'System Uptime & Stability',
        'stat_support' => 'Uninterrupted Field Support',
        'stat_time' => 'Time Saved in Weighing',
        'stat_security' => 'GDPR & Secure On-Premise Data',

        // Index Sections
        'section_services_badge' => 'OUR ENTERPRISE SERVICES',
        'section_services_title' => 'Featured Services',
        'section_services_sub' => 'End-to-end digital transformation from industrial automation to custom AI agents.',
        'section_products_badge' => 'OUR SOFTWARE PRODUCTS',
        'section_products_title' => 'Smart Software Solutions for Field & Operations',
        'section_products_sub' => 'Interactive UI screenshots of our turnkey software solutions accelerating your business.',
        'section_ai_badge' => 'OUR AI SOLUTIONS',
        'section_ai_title' => 'Custom AI Architectures for Your Business Processes',
        'section_ai_sub' => 'Don\'t just store your data; transform it into 24/7 intelligent systems and autonomous decisions.',

        // Products Page (products.php & iys.php)
        'products_hero_badge' => 'TURNKEY SOFTWARE PRODUCTS',
        'products_hero_title' => 'Smart Software for Field & Operations',
        'products_hero_desc' => 'Field-tested weighbridge automations, IYS Manufacturing Process Management platform, and solid waste site solutions.',

        'prod_kantar_badge' => 'FIELD WEIGHBRIDGE AUTOMATION',
        'prod_kantar_title' => 'Excavation & Field Weighbridge Automation v4.2',
        'prod_kantar_desc' => '100% autonomous site management with indicator integration, automatic barriers, live weighing, and e-Waybill printing.',

        'prod_iys_badge' => 'MANUFACTURING ERP',
        'prod_iys_title' => 'IYS — Manufacturing & Process Management Platform',
        'prod_iys_desc' => 'Enterprise ERP platform managing Order ➔ Planning ➔ Design ➔ Production ➔ Delivery processes in detail with Microsoft Access & web migration support.',
        'prod_iys_btn_explore' => 'Explore Manufacturing Solution',

        'prod_kati_badge' => 'MUNICIPALITY & MINING INDUSTRY',
        'prod_kati_title' => 'Solid Waste & Mine Quarry Weighbridge Software',
        'prod_kati_desc' => 'Uninterrupted weighbridge automation with e-Waybill & accounting integration designed for severe climate conditions in waste sites and mines.',

        // IYS Page (iys.php)
        'iys_hero_badge' => 'MANUFACTURING INDUSTRY ERP',
        'iys_hero_title' => 'IYS — Manufacturing & Process Management',
        'iys_hero_desc' => 'Manage all manufacturing steps from order to shipment (Order ➔ Planning ➔ Design ➔ Production ➔ Delivery) from a single screen.',
        'iys_live_btn' => 'Explore iys.zersoft.net Live Demo 🔗',
        'iys_pipeline_badge' => 'DIGITAL MANUFACTURING CHAIN',
        'iys_pipeline_title' => '5-Step Process Control for Manufacturing Industry',
        'iys_pipeline_sub' => 'Modular ERP infrastructure engineered specifically for manufacturing workshops and industrial factories.',

        'iys_step1_title' => '1. Order Management',
        'iys_step1_desc' => 'Customer requests, technical specifications, revision tracking, and quote approval workflow.',
        'iys_step2_title' => '2. Production Planning',
        'iys_step2_desc' => 'Raw material & inventory requirements, machine capacity allocation, and end-to-end deadline scheduling.',
        'iys_step3_title' => '3. Design & R&D',
        'iys_step3_desc' => '3D CAD/CAM model files, Bill of Materials (BOM) generation, and technical sample approval.',
        'iys_step4_title' => '4. Workshop & Production',
        'iys_step4_desc' => 'Barcoded work orders, station labor time, quality assurance, and scrap rate tracking.',
        'iys_step5_title' => '5. Shipment & Delivery',
        'iys_step5_desc' => 'Packing lists, e-Waybill generation, customer delivery sign-off, and formal invoicing.',

        'iys_tech_badge' => 'DESKTOP & WEB TRANSFORMATION',
        'iys_tech_title' => 'Microsoft Access Infrastructure & Next-Gen Web Architecture',
        'iys_tech_desc' => 'IYS has managed millions of manufacturing orders on Microsoft Access Forms for years with an intuitive user interface. Next-generation web and cloud migration is currently underway.',

        // Services Page (services.php)
        'services_hero_badge' => 'END-TO-END SERVICES',
        'services_hero_title' => 'Enterprise Software Services',
        'services_hero_desc' => 'Rebuilding your digital infrastructure with peak performance, cybersecurity standards, and artificial intelligence.',
        'services_get_quote' => 'Get a Quote for This Service',

        // AI Solutions Page (ai-solutions.php)
        'ai_hero_badge' => 'ADVANCED TECH VISION',
        'ai_hero_title' => 'AI-Powered Custom Software Solutions',
        'ai_hero_desc' => 'Zersoft elevates your organization into the future with custom-trained AI models, natural language processing assistants, and autonomous workflow bots.',
        'ai_capabilities_title' => 'Key AI Capabilities:',
        'ai_consulting_btn' => 'Schedule a Consultation',
        'ai_sec_badge' => 'GDPR & PRIVACY COMPLIANT',
        'ai_sec_title' => 'Your Data Never Leaves Your Server',
        'ai_sec_desc' => 'Our enterprise AI models and RAG architectures run directly on your company\'s own servers (On-Premise) or private cloud. Data privacy and commercial secrets are 100% protected.',

        // Portfolio Page (portfolio.php)
        'portfolio_hero_badge' => 'SUCCESS STORIES',
        'portfolio_hero_title' => 'Our Completed Projects',
        'portfolio_hero_desc' => 'Technology projects delivered for our corporate clients across diverse industries.',

        // About Page (about.php)
        'about_hero_badge' => 'CORPORATE PROFILE',
        'about_hero_title' => 'Who We Are & Our Future Vision',
        'about_hero_desc' => 'Leading corporate digitization with artificial intelligence and advanced software engineering discipline.',
        'about_section_title' => 'Our AI & Engineering Approach',

        // Brand Story (Convergence Mark)
        'brand_story_badge'   => 'BRAND STORY',
        'brand_story_title'   => 'From Complexity — One Clear Decision',
        'brand_story_sub'     => 'The ZERSOFT logo tells the story of what we do in a single geometric form.',
        'brand_story_stream1' => 'Field Data',
        'brand_story_stream1_desc' => 'Weighbridge indicator signals, weight measurements, and field operation data.',
        'brand_story_stream2' => 'Process Intelligence',
        'brand_story_stream2_desc' => 'Real-time status of ERP, order management, and manufacturing workflows.',
        'brand_story_stream3' => 'Artificial Intelligence',
        'brand_story_stream3_desc' => 'RAG document intelligence and custom AI model outputs.',
        'brand_story_point'   => 'One Precise Decision',
        'brand_story_point_desc' => 'All streams converge at ZERSOFT and transform into a single reliable, autonomous decision.',
        'brand_story_hidden'  => 'There is a hidden meaning in the logo: viewed from the right, the mark forms a <strong>&gt;</strong> — always one step ahead.',
        'brand_story_tagline' => '"Next-Gen Technology" — where every data point becomes insight, every decision becomes value.',
        'about_p1' => 'Zersoft Technology is an independent technology company that goes beyond traditional software to automate corporate operations and convert raw data into actionable AI decisions.',
        'about_p2' => 'High performance, microservice architecture, cybersecurity standards, and full compliance are our core principles. We partner with clients for long-term technology transformation.',
        'about_vision_title' => 'Our Vision',
        'about_vision_desc' => 'To be the global technology leader executing enterprise AI integrations in the safest, fastest, and most efficient manner.',
        'about_mission_title' => 'Our Mission',
        'about_mission_desc' => 'To transform complex business workflows into intuitive, autonomous, and intelligent software architectures providing sustainable growth.',

        // Buttons & General
        'btn_details' => 'View Details',
        'btn_demo' => 'Request Demo',
        'btn_preview' => 'Expand Screenshot',
        'btn_send' => 'Send Message',
        'read_more' => 'Read More',
        'cta_title' => 'Let\'s Launch Your Software & Field Project Together',
        'cta_desc' => 'Request an immediate quote or live demo for weighbridge automation, manufacturing ERP, or custom AI software.',

        // Cookie & Legal
        'cookie_title' => 'Cookie & Privacy Notice',
        'cookie_text' => 'We use cookies to provide you with the best experience, analyze traffic, and ensure site security.',
        'cookie_accept' => 'Accept & Close',
        'cookie_policy' => 'Privacy & Cookie Policy',

        // Contact & Spam (contact.php)
        'contact_title' => 'Get In Touch',
        'contact_sub' => 'Available 24/7 for your software inquiries, project quotes, and technical support.',
        'office_title' => 'Zersoft Head Office',
        'office_sub' => 'Our engineering team is ready 5 days a week to answer your inquiries and evaluate your projects.',
        'label_address' => 'Address',
        'label_phone' => 'Phone',
        'label_email' => 'Email',
        'label_hours' => 'Working Hours',
        'captcha_title' => '🛡️ SPAM Protection: Math Verification *',
        'form_name' => 'Full Name',
        'form_email' => 'Email Address',
        'form_phone' => 'Phone Number',
        'form_subject' => 'Subject / Service Type',
        'form_message' => 'Your Message',

        // Footer
        'footer_quick_links' => 'Quick Links',
        'footer_solutions' => 'Software Solutions',
        'footer_contact' => 'Contact Details',
        'footer_rights' => 'All Rights Reserved.',
        'footer_compliance' => 'GDPR & KVKK Compliant Enterprise Field Automations'
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
