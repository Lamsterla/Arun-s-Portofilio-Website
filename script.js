// =============================================
// PORTFOLIO — script.js
// =============================================

'use strict';

document.addEventListener('DOMContentLoaded', () => {
  initPreloader();
  initCustomCursor();
  initThemeToggle();
  initNavbar();
  initHamburger();
  initTyping();
  initScrollProgress();
  initReveal();
  initScrollParallax();
  initProficiencyBars();
  initPortfolioTabs();
  initPortfolioSliders();
  initProjectModal();
  initScrollTop();
  initFormValidation();
  initStatCounters();
  initMagneticButtons();
});

// =============================================
// PRELOADER (Page Loading Animation)
// =============================================
function initPreloader() {
  const preloader = document.getElementById('preloader');
  if (!preloader) return;

  const startTime = Date.now();
  const minDuration = 2000; // Minimum duration in ms to show the animation (2 seconds)

  const fadeOut = () => {
    const elapsed = Date.now() - startTime;
    const remaining = Math.max(0, minDuration - elapsed);

    setTimeout(() => {
      preloader.classList.add('fade-out');
      sessionStorage.setItem('portfolio-loaded', 'true');
    }, remaining);
  };

  if (document.readyState === 'complete') {
    fadeOut();
  } else {
    window.addEventListener('load', fadeOut);
  }

  // Fallback in case load event takes too long or hangs
  setTimeout(() => {
    preloader.classList.add('fade-out');
    sessionStorage.setItem('portfolio-loaded', 'true');
  }, 4000);
}

// =============================================
// CUSTOM CURSOR
// =============================================
function initCustomCursor() {
  const dot  = document.getElementById('cursor-dot');
  const ring = document.getElementById('cursor-ring');
  if (!dot || !ring) return;

  let rx = 0, ry = 0;

  document.addEventListener('mousemove', e => {
    dot.style.left  = e.clientX + 'px';
    dot.style.top   = e.clientY + 'px';

    // Ring follows with slight lag (rAF)
    requestAnimationFrame(() => {
      rx += (e.clientX - rx) * 0.12;
      ry += (e.clientY - ry) * 0.12;
      ring.style.left = rx + 'px';
      ring.style.top  = ry + 'px';
    });
  });

  // Grow cursor on interactive elements
  const grow = () => { ring.style.width = '56px'; ring.style.height = '56px'; ring.style.opacity = '0.25'; dot.style.transform = 'translate(-50%,-50%) scale(0.5)'; };
  const shrink = () => { ring.style.width = '36px'; ring.style.height = '36px'; ring.style.opacity = '0.5'; dot.style.transform = 'translate(-50%,-50%) scale(1)'; };

  document.querySelectorAll('a, button, .skill-card, .blog-card, .project-card, .hobby-card').forEach(el => {
    el.addEventListener('mouseenter', grow);
    el.addEventListener('mouseleave', shrink);
  });
}

// =============================================
// MAGNETIC BUTTONS
// =============================================
function initMagneticButtons() {
  document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('mousemove', e => {
      const rect = btn.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width  / 2;
      const y = e.clientY - rect.top  - rect.height / 2;
      btn.style.transform = `translate(${x * 0.18}px, ${y * 0.28}px)`;
    });
    btn.addEventListener('mouseleave', () => {
      btn.style.transform = '';
    });
  });
}

// =============================================
// THEME TOGGLE
// =============================================
function initThemeToggle() {
  const btn  = document.getElementById('theme-toggle');
  const html = document.documentElement;
  if (!btn) return;

  const current = () => html.getAttribute('data-theme') || 'dark';

  const apply = (theme) => {
    html.setAttribute('data-theme', theme);
    localStorage.setItem('portfolio-theme', theme);
    btn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
  };

  apply(current());

  btn.addEventListener('click', () => {
    apply(current() === 'dark' ? 'light' : 'dark');
    btn.style.transform = 'scale(0.8) rotate(25deg)';
    setTimeout(() => { btn.style.transform = ''; }, 200);
  });
}

// =============================================
// NAVBAR
// =============================================
function initNavbar() {
  const nav = document.getElementById('navbar');
  if (!nav) return;
  const update = () => nav.classList.toggle('scrolled', window.scrollY > 50);
  window.addEventListener('scroll', update, { passive: true });
  update();
}

// =============================================
// HAMBURGER
// =============================================
function initHamburger() {
  const btn   = document.getElementById('hamburger');
  const links = document.getElementById('navLinks');
  if (!btn || !links) return;

  btn.addEventListener('click', () => {
    btn.classList.toggle('open');
    links.classList.toggle('open');
  });

  links.querySelectorAll('a').forEach(a =>
    a.addEventListener('click', () => {
      btn.classList.remove('open');
      links.classList.remove('open');
    })
  );
}

// =============================================
// TYPING EFFECT (home page only)
// =============================================
function initTyping() {
  const el = document.getElementById('typedText');
  if (!el) return;

  const words = ['web developer', 'software engineer', 'video editor', 'blog writer', 'freelancer'];
  let wi = 0, ci = 0, deleting = false;

  function tick() {
    const word = words[wi];
    el.textContent = deleting ? word.slice(0, --ci) : word.slice(0, ++ci);

    let delay = deleting ? 55 : 100;
    if (!deleting && ci === word.length)  { delay = 1800; deleting = true; }
    if (deleting  && ci === 0)            { deleting = false; wi = (wi + 1) % words.length; delay = 360; }

    setTimeout(tick, delay);
  }

  setTimeout(tick, 800);
}

// =============================================
// SCROLL PROGRESS BAR
// =============================================
function initScrollProgress() {
  let bar = document.getElementById('scroll-progress');
  if (!bar) {
    bar = document.createElement('div');
    bar.id = 'scroll-progress';
    document.body.prepend(bar);
  }

  const updateProgress = () => {
    const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
    if (totalHeight <= 0) {
      bar.style.width = '0%';
      return;
    }
    const progress = Math.min(100, Math.max(0, (window.scrollY / totalHeight) * 100));
    bar.style.width = progress.toFixed(2) + '%';
  };

  window.addEventListener('scroll', updateProgress, { passive: true });
  window.addEventListener('resize', updateProgress, { passive: true });
  updateProgress();
}

// =============================================
// REVEAL ON SCROLL & AUTO STAGGER
// =============================================
function initReveal() {
  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;

  // Auto stagger grid/list items with elegant wave delay if no explicit d1-d8 class is present
  const containers = document.querySelectorAll('.skill-grid, .portfolio-grid, .services-list, .hobbies-grid, .testimonials-grid, .blog-grid, .about-stats-grid');
  containers.forEach(container => {
    const children = container.querySelectorAll('.reveal');
    children.forEach((child, idx) => {
      if (!Array.from(child.classList).some(c => /^d[1-8]$/.test(c))) {
        child.style.transitionDelay = `${(idx * 0.09).toFixed(2)}s`;
      }
    });
  });

  const io = new IntersectionObserver(
    entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          io.unobserve(e.target);
        }
      });
    },
    { threshold: 0.08, rootMargin: '0px 0px -50px 0px' }
  );

  els.forEach(el => io.observe(el));
}

// =============================================
// PARALLAX & SCROLL DYNAMICS (Smooth LERP Physics Engine)
// =============================================
function initScrollParallax() {
  const parallaxTargets = document.querySelectorAll('.hero-blob-1, .hero-blob-2, .hero-availability, .avail-banner, .about-photo-frame');
  if (!parallaxTargets.length) return;

  let currentY = window.scrollY;
  let targetY = window.scrollY;
  let running = false;

  const updateParallax = () => {
    currentY += (targetY - currentY) * 0.08; // LERP smoothing factor
    
    if (Math.abs(targetY - currentY) > 0.05) {
      if (currentY < 1800) {
        parallaxTargets.forEach((el, i) => {
          const speed = (i % 2 === 0 ? 0.04 : -0.03);
          const rotate = (i % 2 === 0 ? 0.005 : -0.005);
          el.style.transform = `translate3d(0, ${(currentY * speed).toFixed(2)}px, 0) rotate(${(currentY * rotate).toFixed(2)}deg)`;
        });
      }
      requestAnimationFrame(updateParallax);
    } else {
      running = false;
    }
  };

  const onScroll = () => {
    targetY = window.scrollY;
    if (!running) {
      running = true;
      requestAnimationFrame(updateParallax);
    }
  };

  if (window.innerWidth > 768) {
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }
}

// =============================================
// PROFICIENCY BARS
// =============================================
function initProficiencyBars() {
  const fills = document.querySelectorAll('.prof-fill');
  if (!fills.length) return;

  const io = new IntersectionObserver(
    entries => entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.width = (e.target.dataset.width || '0') + '%';
        io.unobserve(e.target);
      }
    }),
    { threshold: 0.2 }
  );

  fills.forEach(f => io.observe(f));
}

// =============================================
// PORTFOLIO TABS (work.html)
// =============================================
function initPortfolioTabs() {
  const tabs   = document.querySelectorAll('.ptab');
  const panels = document.querySelectorAll('.portfolio-panel');
  if (!tabs.length || !panels.length) return;

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');

      const targetId = 'panel-' + tab.dataset.panel;
      panels.forEach(panel => {
        panel.classList.toggle('active', panel.id === targetId);
      });

      // Re-trigger resize so slider recalculates
      window.dispatchEvent(new Event('resize'));
    });
  });
}

// =============================================
// PORTFOLIO SLIDERS (drag + arrows + dots)
// =============================================
function initPortfolioSliders() {
  const panels = document.querySelectorAll('.portfolio-panel');
  panels.forEach(panel => setupSlider(panel));
}

function setupSlider(panel) {
  const track = panel.querySelector('.slide-track');
  const dotsEl = panel.querySelector('.slide-dots');
  const prevBtn = panel.querySelector('.slide-prev');
  const nextBtn = panel.querySelector('.slide-next');
  if (!track) return;

  const cards = track.querySelectorAll('.slide-card');
  if (!cards.length) return;

  // Build dots
  if (dotsEl) {
    dotsEl.innerHTML = '';
    cards.forEach((_, idx) => {
      const dot = document.createElement('div');
      dot.className = 'slide-dot' + (idx === 0 ? ' active' : '');
      dot.setAttribute('role', 'button');
      dot.setAttribute('aria-label', `Slide ${idx + 1}`);
      dot.addEventListener('click', () => {
        const pl = parseFloat(getComputedStyle(track).paddingLeft) || 0;
        track.scrollTo({ left: cards[idx].offsetLeft - pl, behavior: 'smooth' });
      });
      dotsEl.appendChild(dot);
    });
  }

  // Sync dots on scroll
  let raf;
  track.addEventListener('scroll', () => {
    cancelAnimationFrame(raf);
    raf = requestAnimationFrame(() => {
      if (!dotsEl) return;
      const pl = parseFloat(getComputedStyle(track).paddingLeft) || 0;
      let minDiff = Infinity, activeIdx = 0;
      cards.forEach((card, idx) => {
        const diff = Math.abs(card.offsetLeft - pl - track.scrollLeft);
        if (diff < minDiff) { minDiff = diff; activeIdx = idx; }
      });
      dotsEl.querySelectorAll('.slide-dot').forEach((d, i) =>
        d.classList.toggle('active', i === activeIdx)
      );
    });
  }, { passive: true });

  // Arrow buttons
  if (prevBtn && nextBtn) {
    const scrollAmt = () => {
      const gap = parseFloat(getComputedStyle(track).gap) || 22;
      return (cards[0]?.offsetWidth || 360) + gap;
    };
    prevBtn.addEventListener('click', () => track.scrollBy({ left: -scrollAmt(), behavior: 'smooth' }));
    nextBtn.addEventListener('click', () => track.scrollBy({ left:  scrollAmt(), behavior: 'smooth' }));
  }

  // Drag to scroll
  let isDown = false, startX, scrollLeft, wasDragged = false;

  track.addEventListener('mousedown', e => {
    isDown = true; wasDragged = false;
    track.style.cursor = 'grabbing';
    startX = e.pageX - track.offsetLeft;
    scrollLeft = track.scrollLeft;
  });

  track.addEventListener('mouseleave', () => { if (!isDown) return; isDown = false; track.style.cursor = ''; });
  track.addEventListener('mouseup',    () => { if (!isDown) return; isDown = false; track.style.cursor = ''; });

  track.addEventListener('mousemove', e => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - track.offsetLeft;
    if (Math.abs(x - startX) > 6) wasDragged = true;
    track.scrollLeft = scrollLeft - (x - startX) * 1.5;
  });

  track.addEventListener('click', e => {
    if (wasDragged) { e.preventDefault(); e.stopPropagation(); }
  }, true);

  // Video card click
  cards.forEach(card => {
    if (card.classList.contains('video-slide-card')) {
      card.addEventListener('click', () => {
        if (!wasDragged) {
          const title = card.querySelector('h3')?.textContent || 'Video';
          showToast(`Opening "${title}" — add your video link here.`);
        }
      });
    }
  });
}

// =============================================
// PROJECT DETAIL MODAL (work.html)
// =============================================
function initProjectModal() {
  const modal = document.getElementById('projectModal');
  const backdrop = document.getElementById('modalBackdrop');
  const closeBtn = document.getElementById('modalClose');
  const flashcard = document.getElementById('flashcard');
  if (!modal || !backdrop || !closeBtn || !flashcard) return;

  const dataEl = document.getElementById('projects-data');
  if (!dataEl) return;

  let projectsData;
  try {
    projectsData = JSON.parse(dataEl.textContent);
  } catch (err) {
    console.error("Failed to parse projects data:", err);
    return;
  }

  const cards = document.querySelectorAll('.project-card[data-type]');

  const openModal = (project) => {
    // Reset flip state when opening
    flashcard.classList.remove('flipped');

    const bannerFront = document.getElementById('modalBannerFront');
    const emojiFront = document.getElementById('modalEmojiFront');
    const catFront = document.getElementById('modalCatFront');
    const titleFront = document.getElementById('modalTitleFront');
    const descFront = document.getElementById('modalDescFront');
    const techFront = document.getElementById('modalTechFront');

    const bannerBack = document.getElementById('modalBannerBack');
    const emojiBack = document.getElementById('modalEmojiBack');
    const titleBack = document.getElementById('modalTitleBack');
    const readmeBack = document.getElementById('modalReadmeBack');
    const actionsBack = document.getElementById('modalActionsBack');

    // Populate Front Face
    if (bannerFront) {
      if (project.image) {
        bannerFront.style.background = `url('${project.image}') center top / cover no-repeat`;
        if (emojiFront) emojiFront.style.display = 'none';
      } else {
        bannerFront.style.background = project.bg || 'var(--surface2)';
        if (emojiFront) {
          emojiFront.style.display = '';
          emojiFront.innerHTML = project.label || '&#128187;';
        }
      }
    }
    if (catFront) catFront.textContent = project.cat || '';
    if (titleFront) titleFront.textContent = project.title || '';
    if (descFront) descFront.textContent = project.desc || '';

    if (techFront) {
      techFront.innerHTML = '';
      const tags = project.tech || project.tools || [];
      tags.forEach(t => {
        const span = document.createElement('span');
        span.className = 'tech-tag';
        span.textContent = t;
        techFront.appendChild(span);
      });
    }

    // Populate Back Face
    if (bannerBack) {
      if (project.image) {
        bannerBack.style.background = `url('${project.image}') center top / cover no-repeat`;
        if (emojiBack) emojiBack.style.display = 'none';
      } else {
        bannerBack.style.background = project.bg || 'var(--surface2)';
        if (emojiBack) {
          emojiBack.style.display = '';
          emojiBack.innerHTML = project.label || '&#128187;';
        }
      }
    }
    if (titleBack) titleBack.textContent = project.title || '';
    if (readmeBack) readmeBack.innerHTML = project.readme || `<p>${project.desc}</p>`;

    if (actionsBack) {
      actionsBack.innerHTML = '';
      if (project.live) {
        const a = document.createElement('a');
        a.href = project.live;
        a.className = 'btn btn-primary';
        a.target = '_blank';
        a.rel = 'noopener noreferrer';
        a.textContent = 'Live Demo';
        actionsBack.appendChild(a);
      }
      if (project.github) {
        const a = document.createElement('a');
        a.href = project.github;
        a.className = 'btn btn-ghost';
        a.target = '_blank';
        a.rel = 'noopener noreferrer';
        a.textContent = 'GitHub';
        actionsBack.appendChild(a);
      }
    }

    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeModal = () => {
    modal.classList.remove('active');
    document.body.style.overflow = '';
    // reset flip state after modal closes completely
    setTimeout(() => {
      flashcard.classList.remove('flipped');
    }, 300);
  };

  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      // Prevent opening modal if clicked on action button/link directly on the card
      if (e.target.closest('a') || e.target.closest('button.btn')) {
        return;
      }
      const type = card.dataset.type;
      const index = parseInt(card.dataset.index);
      if (projectsData[type] && projectsData[type][index]) {
        openModal(projectsData[type][index]);
      }
    });
  });

  // Card Flip interaction
  flashcard.addEventListener('click', (e) => {
    // Only flip if we didn't click a link, button, or code block inside the back face
    if (e.target.closest('a') || e.target.closest('button') || e.target.closest('code') || e.target.closest('pre')) {
      return;
    }
    flashcard.classList.toggle('flipped');
  });

  closeBtn.addEventListener('click', closeModal);
  backdrop.addEventListener('click', closeModal);
  
  // Close with Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });
}

// =============================================
// SCROLL TO TOP
// =============================================
function initScrollTop() {
  const btn = document.getElementById('scroll-top');
  if (!btn) return;

  window.addEventListener('scroll', () =>
    btn.classList.toggle('show', window.scrollY > 500),
    { passive: true }
  );

  btn.addEventListener('click', () =>
    window.scrollTo({ top: 0, behavior: 'smooth' })
  );
}

// =============================================
// STAT COUNTERS
// =============================================
function initStatCounters() {
  document.querySelectorAll('.stat-val').forEach(el => {
    const target = parseInt(el.textContent.replace(/\D/g, ''));
    if (!target) return;

    const sup = el.querySelector('sup')?.outerHTML || '';
    let current = 0;

    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        io.unobserve(el);
        const step = Math.ceil(target / 36);
        const id = setInterval(() => {
          current = Math.min(current + step, target);
          el.innerHTML = current + sup;
          if (current >= target) clearInterval(id);
        }, 36);
      });
    }, { threshold: 0.6 });

    io.observe(el);
  });
}

// =============================================
// FORM VALIDATION
// =============================================
function initFormValidation() {
  ['hireForm', 'contactForm'].forEach(id => {
    const form = document.getElementById(id);
    if (!form) return;

    form.querySelectorAll('input[required], textarea[required], select[required]').forEach(field => {
      field.addEventListener('blur',  () => validateField(field));
      field.addEventListener('input', () => clearFieldErr(field));
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      let isValid = true;
      form.querySelectorAll('input[required], textarea[required], select[required]').forEach(field => {
        if (!field.value.trim() || (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value.trim()))) {
          validateField(field);
          isValid = false;
        }
      });

      if (isValid) {
        const nameField = form.querySelector('input[name="name"], input[name="cname"]');
        const senderName = nameField ? nameField.value.trim() : 'Friend';
        const msg = id === 'hireForm' 
          ? `Thank you, ${senderName}. Your brief has been received. I'll respond within 24 hours.`
          : `Message received, ${senderName}. I'll get back to you soon!`;

        // Check if notice already exists, else insert
        let notice = form.parentNode.querySelector('.form-notice');
        if (!notice) {
          notice = document.createElement('div');
          notice.className = 'form-notice';
          form.parentNode.insertBefore(notice, form);
        }
        notice.innerHTML = '&#10003; ' + msg;
        notice.style.display = 'block';

        showToast(msg);
        form.reset();
      }
    });
  });
}

function validateField(f) {
  clearFieldErr(f);
  const v = f.value.trim();
  if (!v) return showFieldErr(f, 'This field is required.');
  if (f.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v))
    return showFieldErr(f, 'Enter a valid email address.');
}

function showFieldErr(f, msg) {
  f.style.borderColor = 'var(--coral)';
  const span = document.createElement('span');
  span.className = '_ferr';
  span.style.cssText = 'display:block;font-size:0.73rem;color:var(--coral);margin-top:4px;';
  span.textContent = msg;
  f.parentNode.appendChild(span);
}

function clearFieldErr(f) {
  f.style.borderColor = '';
  f.parentNode.querySelector('._ferr')?.remove();
}

// =============================================
// TOAST
// =============================================
function showToast(msg) {
  document.getElementById('_toast')?.remove();

  const t = document.createElement('div');
  t.id = '_toast';
  Object.assign(t.style, {
    position: 'fixed',
    bottom: '80px',
    right: '26px',
    background: 'var(--surface2)',
    color: 'var(--text)',
    border: '1px solid var(--border2)',
    borderRadius: '10px',
    padding: '12px 16px',
    fontSize: '0.84rem',
    fontFamily: 'var(--font-body)',
    boxShadow: 'var(--shadow-md)',
    zIndex: '9999',
    maxWidth: '290px',
    opacity: '0',
    transform: 'translateY(8px)',
    transition: 'all 0.25s ease',
  });
  t.textContent = msg;
  document.body.appendChild(t);

  requestAnimationFrame(() => requestAnimationFrame(() => {
    t.style.opacity = '1';
    t.style.transform = 'translateY(0)';
  }));

  setTimeout(() => {
    t.style.opacity = '0';
    t.style.transform = 'translateY(8px)';
    setTimeout(() => t.remove(), 280);
  }, 3200);
}
