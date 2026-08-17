/**
 * ZERSOFT TECHNOLOGY — Main Interactive Script
 * Theme Toggle, i18n Language Switcher, Hero Slider, Lightbox, Cookie Banner
 */

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  initMobileNav();
  initHeroSlider();
  initLightbox();
  initCookieConsent();
});

/* ==========================================
   1. Theme Toggle (Dark / Light Mode)
   ========================================== */
function initTheme() {
  const savedTheme = localStorage.getItem('zersoft_theme') || 
    (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');

  setTheme(savedTheme);

  const themeToggles = document.querySelectorAll('.theme-toggle-btn');
  themeToggles.forEach(btn => {
    btn.addEventListener('click', () => {
      const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      setTheme(newTheme);
    });
  });
}

function setTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme);
  localStorage.setItem('zersoft_theme', theme);

  // Update logo images for current theme
  const logos = document.querySelectorAll('img[src*="logo.svg"], img[src*="logo-light.svg"], .animated-logo');
  logos.forEach(logo => {
    if (theme === 'light') {
      logo.src = 'assets/images/logo-light.svg';
    } else {
      logo.src = 'assets/images/logo.svg';
    }
  });

  const themeIcons = document.querySelectorAll('.theme-toggle-btn i');
  themeIcons.forEach(icon => {
    if (theme === 'light') {
      icon.className = 'fa-solid fa-moon';
      icon.setAttribute('title', 'Koyu Temaya Geç');
    } else {
      icon.className = 'fa-solid fa-sun';
      icon.setAttribute('title', 'Açık Temaya Geç');
    }
  });
}

/* ==========================================
   2. Mobile Navigation Toggle
   ========================================== */
function initMobileNav() {
  const toggleBtn = document.querySelector('.mobile-toggle');
  const navLinks = document.querySelector('.nav-links');

  if (toggleBtn && navLinks) {
    toggleBtn.addEventListener('click', () => {
      navLinks.classList.toggle('active');
      const icon = toggleBtn.querySelector('i');
      if (icon) {
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-xmark');
      }
    });
  }
}

/* ==========================================
   3. Hero Interactive Slider (Carousel)
   ========================================== */
function initHeroSlider() {
  const slider = document.querySelector('.hero-slider');
  if (!slider) return;

  const slides = slider.querySelectorAll('.slide');
  const dotsContainer = slider.querySelector('.slider-dots');
  if (slides.length <= 1) return;

  let currentSlide = 0;
  let slideInterval;

  // Build pagination dots
  slides.forEach((_, idx) => {
    const dot = document.createElement('button');
    dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
    dot.setAttribute('aria-label', `Slide ${idx + 1}`);
    dot.addEventListener('click', () => goToSlide(idx));
    if (dotsContainer) dotsContainer.appendChild(dot);
  });

  function goToSlide(n) {
    slides[currentSlide].classList.remove('active');
    const dots = slider.querySelectorAll('.slider-dot');
    if (dots[currentSlide]) dots[currentSlide].classList.remove('active');

    currentSlide = (n + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) dots[currentSlide].classList.add('active');
  }

  function startAutoplay() {
    slideInterval = setInterval(() => {
      goToSlide(currentSlide + 1);
    }, 6000);
  }

  function stopAutoplay() {
    clearInterval(slideInterval);
  }

  slider.addEventListener('mouseenter', stopAutoplay);
  slider.addEventListener('mouseleave', startAutoplay);

  startAutoplay();
}

/* ==========================================
   4. Image Lightbox (Full Screen Modal Preview)
   ========================================== */
function initLightbox() {
  const lightboxTargets = document.querySelectorAll('.lightbox-trigger');
  if (lightboxTargets.length === 0) return;

  // Create Modal element dynamically
  const modal = document.createElement('div');
  modal.className = 'lightbox-modal';
  modal.innerHTML = `
    <div class="lightbox-overlay"></div>
    <div class="lightbox-content">
      <button class="lightbox-close" aria-label="Kapat">&times;</button>
      <img src="" alt="Önizleme" class="lightbox-img">
      <div class="lightbox-caption"></div>
    </div>
  `;
  document.body.appendChild(modal);

  const imgEl = modal.querySelector('.lightbox-img');
  const captionEl = modal.querySelector('.lightbox-caption');
  const closeBtn = modal.querySelector('.lightbox-close');
  const overlay = modal.querySelector('.lightbox-overlay');

  lightboxTargets.forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const src = trigger.getAttribute('data-img') || trigger.getAttribute('href') || trigger.querySelector('img')?.src;
      const caption = trigger.getAttribute('data-caption') || trigger.getAttribute('title') || '';

      if (src) {
        imgEl.src = src;
        captionEl.textContent = caption;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  closeBtn.addEventListener('click', closeModal);
  overlay.addEventListener('click', closeModal);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
  });
}

/* ==========================================
   5. Cookie Consent Banner (KVKK & GDPR)
   ========================================== */
function initCookieConsent() {
  if (localStorage.getItem('zersoft_cookie_consent')) return;

  const banner = document.createElement('div');
  banner.className = 'cookie-banner';
  banner.innerHTML = `
    <div class="cookie-container">
      <div class="cookie-text">
        <i class="fa-solid fa-cookie-bite text-gradient"></i>
        <span><strong>Çerez Kullanımı &amp; Gizlilik Bildirimi:</strong> Deneyiminizi iyileştirmek, site trafiğini analiz etmek ve güvenliği sağlamak için çerezler kullanıyoruz. Detaylar için <a href="privacy-policy.php" target="_blank" style="text-decoration:underline;">Gizlilik Politikamızı</a> inceleyebilirsiniz.</span>
      </div>
      <button class="btn btn-primary btn-sm cookie-accept-btn">Kabul Et ve Kapat</button>
    </div>
  `;

  document.body.appendChild(banner);

  setTimeout(() => {
    banner.classList.add('show');
  }, 1000);

  const acceptBtn = banner.querySelector('.cookie-accept-btn');
  acceptBtn.addEventListener('click', () => {
    localStorage.setItem('zersoft_cookie_consent', 'accepted');
    banner.classList.remove('show');
    setTimeout(() => banner.remove(), 400);
  });
}
