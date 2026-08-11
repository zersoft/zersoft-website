/**
 * ZERSOFT TECHNOLOGY - FRONTEND INTERACTIVE LOGIC
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initAIChatSimulator();
  initContactForm();
  initStatsCounter();
  initMobileNav();
});

/* Navbar Scroll Listener */
function initNavbar() {
  const navbar = document.querySelector('.navbar');
  if (!navbar) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

/* Hero Section AI Interactive Chat Simulator */
function initAIChatSimulator() {
  const chatBody = document.getElementById('aiChatBody');
  if (!chatBody) return;

  const demoMessages = [
    { sender: 'user', text: "Merhaba Zersoft AI, şirket dokümanlarımızı nasıl akıllı hale getirebiliriz?" },
    { sender: 'bot', text: "Zersoft Enterprise RAG mimarisi ile 100.000+ PDF ve sözleşmenizi güvenli vektör veritabanımıza aktarıyor, milisaniyeler içinde KVKK uyumlu akıllı asistana dönüştürüyoruz." },
    { sender: 'user', text: "Harika! Mobil uygulama entegrasyonu da mümkün mü?" },
    { sender: 'bot', text: "Evet! iOS, Android ve Web platformlarınız için uçtan uca özel AI agent servisleri kuruyoruz." }
  ];

  let index = 0;

  function renderNextMessage() {
    if (index >= demoMessages.length) return;

    const msg = demoMessages[index];
    const bubble = document.createElement('div');
    bubble.className = `chat-bubble ${msg.sender}`;
    bubble.innerHTML = msg.text;

    // Shake animation
    bubble.style.opacity = '0';
    bubble.style.transform = 'translateY(10px)';
    chatBody.appendChild(bubble);

    setTimeout(() => {
      bubble.style.transition = 'all 0.4s ease';
      bubble.style.opacity = '1';
      bubble.style.transform = 'translateY(0)';
      chatBody.scrollTop = chatBody.scrollHeight;
    }, 100);

    index++;
    if (index < demoMessages.length) {
      setTimeout(renderNextMessage, 2800);
    }
  }

  // Start after 1 second
  setTimeout(renderNextMessage, 1000);
}

/* AJAX Contact Form */
function initContactForm() {
  const form = document.getElementById('contactForm');
  const alertBox = document.getElementById('contactAlert');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = form.querySelector('button[type="submit"]');
    const originalBtnText = btn.innerHTML;

    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Gönderiliyor...';

    const formData = new FormData(form);

    try {
      const response = await fetch('api/contact.php', {
        method: 'POST',
        body: formData
      });

      const res = await response.json();

      if (res.success) {
        alertBox.className = 'alert-box alert-success';
        alertBox.style.display = 'block';
        alertBox.innerHTML = `<i class="fa-solid fa-circle-check"></i> ${res.message}`;
        form.reset();
      } else {
        alertBox.className = 'alert-box alert-error';
        alertBox.style.display = 'block';
        alertBox.innerHTML = `<i class="fa-solid fa-circle-xmark"></i> ${res.message}`;
      }
    } catch (error) {
      alertBox.className = 'alert-box alert-error';
      alertBox.style.display = 'block';
      alertBox.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Bir bağlantı hatası oluştu. Lütfen tekrar deneyiniz.';
    } finally {
      btn.disabled = false;
      btn.innerHTML = originalBtnText;
    }
  });
}

/* Counter Animation */
function initStatsCounter() {
  const statElements = document.querySelectorAll('.stat-number');
  if (statElements.length === 0) return;

  let animated = false;

  window.addEventListener('scroll', () => {
    const section = document.querySelector('.stats-section');
    if (!section || animated) return;

    const rect = section.getBoundingClientRect();
    if (rect.top <= window.innerHeight - 100) {
      animated = true;
      statElements.forEach(el => {
        const target = parseInt(el.getAttribute('data-target') || '0', 10);
        let count = 0;
        const speed = target / 50;

        const updateCount = () => {
          count += speed;
          if (count < target) {
            el.innerText = Math.ceil(count) + '+';
            setTimeout(updateCount, 30);
          } else {
            el.innerText = target + '+';
          }
        };
        updateCount();
      });
    }
  });
}

/* Mobile Nav Toggle */
function initMobileNav() {
  const toggle = document.querySelector('.mobile-toggle');
  const links = document.querySelector('.nav-links');
  if (!toggle || !links) return;

  toggle.addEventListener('click', () => {
    links.classList.toggle('active');
    const icon = toggle.querySelector('i');
    if (links.classList.contains('active')) {
      icon.className = 'fa-solid fa-xmark';
    } else {
      icon.className = 'fa-solid fa-bars';
    }
  });
}
