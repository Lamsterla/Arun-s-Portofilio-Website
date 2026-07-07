<?php
// =============================================
// PORTFOLIO — index.php  (Home / Hero)
// =============================================
require 'layout.php';
require 'data.php';

render_head('Dev.Portfolio — Web Developer & Freelancer');
render_nav('home');
?>

<!-- ======================================================
     HERO
     ====================================================== -->
<section id="hero">
  <div class="hero-backdrop">
    <div class="hero-blob hero-blob-1"></div>
    <div class="hero-blob hero-blob-2"></div>
  </div>
  <div class="container">
    <div class="hero-inner">

      <div class="hero-content">
        <div class="hero-availability">
          <span class="avail-pulse"></span>
          Open to freelance work
        </div>

        <span class="hero-eyebrow">Hello, I'm</span>
        <h1 class="hero-name">
          <?= env('PORTFOLIO_NAME', 'Arun Sah') ?><br>
          <span class="name-accent">Here</span>
        </h1>

        <p class="hero-tagline">
          I work as a&nbsp;<span class="typed" id="typedText"></span><span class="caret"></span>
        </p>

        <p class="hero-bio">
          A developer, editor and writer based in <strong><?= env('PORTFOLIO_CITY', 'Your City, India') ?></strong> — I take projects
          from idea to execution and care about the details that make the difference.
        </p>

        <div class="hero-actions">
          <a href="work.php"    class="btn btn-primary">View my work</a>
          <a href="contact.php" class="btn btn-hire">Hire me</a>
          <a href="about.php"   class="btn btn-ghost">About me</a>
        </div>

        <div class="hero-connect">
          <h3 class="connect-title">📫 Connect With Me</h3>
          <div class="connect-links">
            <a href="<?= env('PORTFOLIO_GITHUB_URL', 'https://github.com') ?>" class="connect-btn github" target="_blank" rel="noopener noreferrer" title="GitHub">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
              </svg>
            </a>
            <a href="<?= env('PORTFOLIO_LINKEDIN_URL', 'https://linkedin.com') ?>" class="connect-btn linkedin" target="_blank" rel="noopener noreferrer" title="LinkedIn">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
            <a href="mailto:<?= env('PORTFOLIO_EMAIL', 'your@email.com') ?>" class="connect-btn gmail" title="Gmail">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 5.457v13.909c0 .904-.732 1.634-1.634 1.634h-2.23V9.431L12 14.771 3.864 9.43v11.57H1.634A1.637 1.637 0 010 19.366V5.457c0-1.124 1.25-1.787 2.179-1.155L12 11.196l9.821-6.894A1.378 1.378 0 0124 5.457z"/>
              </svg>
            </a>
            <a href="<?= env('PORTFOLIO_INSTAGRAM_URL', 'https://instagram.com') ?>" class="connect-btn instagram" target="_blank" rel="noopener noreferrer" title="Instagram">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204 0.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <div class="hero-visual reveal from-right">
        <div class="hero-photo-frame">
          <div class="photo-placeholder">
            <div class="ph-circle">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
              </svg>
            </div>
            <p>Your photo here</p>
          </div>
          <!-- Replace with: <img src="assets/photo.jpg" alt="Your Name"> -->
        </div>
        <div class="photo-corner">3+<br>Years</div>
      </div>

    </div>
  </div>
</section>

<!-- ======================================================
     MARQUEE STRIP
     ====================================================== -->
<div class="marquee-wrap">
  <div class="marquee-track">
    <?php
    $items = ['Web Development','Video Editing','PHP &amp; MySQL','Python','UI Design','Blog Writing','React','Node.js','After Effects','Figma','Premiere Pro','Software Dev'];
    // Duplicate for seamless loop
    $all = array_merge($items, $items);
    foreach ($all as $item) {
      echo '<span class="marquee-item">' . $item . ' <span>✦</span></span>';
    }
    ?>
  </div>
</div>

<!-- ======================================================
     SKILLS TEASER
     ====================================================== -->
<section class="section section--alt" id="skills">
  <div class="container">
    <div class="text-center reveal">
      <span class="label">What I Do</span>
      <h2 class="section-title">My <span class="em">expertise</span></h2>
      <span class="rule rule-center"></span>
      <p class="section-sub" style="margin-top:18px;">
        A range of skills built through real projects, not just tutorials.
      </p>
    </div>

    <div class="skills-layout">
      <?php foreach ($skills as $i => $s): ?>
      <div class="skill-card reveal d<?= min($i+1,5) ?>"
           style="--card-line:<?= $s['line'] ?>;--ico-bg:<?= $s['ico_bg'] ?>;--ico-border:<?= $s['ico_bd'] ?>">
        <div class="skill-head">
          <div class="skill-ico"><?= $s['icon'] ?></div>
          <h3><?= $s['title'] ?></h3>
        </div>
        <p><?= $s['desc'] ?></p>
        <div class="skill-chips">
          <?php foreach ($s['tags'] as $t): ?>
            <span class="chip"><?= $t ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ======================================================
     FEATURED PROJECTS
     ====================================================== -->
<section class="section" id="featured-projects">
  <div class="container">
    <div class="text-center reveal">
      <span class="label">My Portfolio</span>
      <h2 class="section-title">Featured <span class="em">Projects</span></h2>
      <span class="rule rule-center"></span>
      <p class="section-sub" style="margin-top:18px;">
        A handpicked selection of my best work across web development, software creation, and video editing.
      </p>
    </div>

    <div class="portfolio-grid" style="margin-top: 40px;">
      <!-- Web Project -->
      <?php 
      $p = $webProjects[0]; 
      $index = 0;
      ?>
      <div class="project-card reveal d1" data-type="web" data-index="<?= $index ?>" style="cursor: pointer;">
        <div class="proj-thumb" style="background:<?= $p['bg'] ?>">
          <span><?= $p['label'] ?></span>
          <div class="proj-thumb-overlay">
            <button class="btn btn-primary btn-sm view-details-btn">Details</button>
            <?php if (!empty($p['live'])): ?>
              <a href="<?= $p['live'] ?>" target="_blank" class="btn btn-ghost btn-sm" onclick="event.stopPropagation();">Live</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="proj-body">
          <div class="proj-cat"><?= $p['cat'] ?></div>
          <h3><?= $p['title'] ?></h3>
          <p><?= $p['desc'] ?></p>
          <div class="proj-tech">
            <?php foreach ($p['tech'] as $t): ?><span class="tech-tag"><?= $t ?></span><?php endforeach; ?>
          </div>
          <div class="proj-links">
            <button class="proj-link view-details-link" style="background:none;border:none;padding:0;cursor:pointer;font-family:inherit;">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              View details
            </button>
            <?php if (!empty($p['github'])): ?>
            <a href="<?= $p['github'] ?>" class="proj-link" target="_blank" onclick="event.stopPropagation();">
              <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
              GitHub
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Software Project -->
      <?php 
      $p = $softProjects[0]; 
      $index = 0;
      ?>
      <div class="project-card reveal d2" data-type="software" data-index="<?= $index ?>" style="cursor: pointer;">
        <div class="proj-thumb" style="background:<?= $p['bg'] ?>">
          <span><?= $p['label'] ?></span>
          <div class="proj-thumb-overlay">
            <button class="btn btn-primary btn-sm view-details-btn">Details</button>
            <?php if (!empty($p['github'])): ?>
              <a href="<?= $p['github'] ?>" target="_blank" class="btn btn-ghost btn-sm" onclick="event.stopPropagation();">Code</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="proj-body">
          <div class="proj-cat"><?= $p['cat'] ?></div>
          <h3><?= $p['title'] ?></h3>
          <p><?= $p['desc'] ?></p>
          <div class="proj-tech">
            <?php foreach ($p['tech'] as $t): ?><span class="tech-tag"><?= $t ?></span><?php endforeach; ?>
          </div>
          <div class="proj-links">
            <button class="proj-link view-details-link" style="background:none;border:none;padding:0;cursor:pointer;font-family:inherit;">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              View details
            </button>
            <?php if (!empty($p['github'])): ?>
            <a href="<?= $p['github'] ?>" class="proj-link" target="_blank" onclick="event.stopPropagation();">
              <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
              GitHub
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Video Project -->
      <?php 
      $v = $videos[0]; 
      $index = 0;
      ?>
      <div class="video-slide-card project-card reveal d3" data-type="video" data-index="<?= $index ?>" style="cursor: pointer;">
        <div class="vslide-thumb" style="background:<?= $v['bg'] ?>">
          <div class="play-ring">
            <svg viewBox="0 0 24 24"><polygon points="5,3 19,12 5,21"/></svg>
          </div>
          <span class="vslide-cat"><?= $v['cat'] ?></span>
        </div>
        <div class="vslide-body">
          <h3><?= $v['title'] ?></h3>
          <p><?= $v['desc'] ?></p>
          <div class="proj-tech">
            <?php foreach ($v['tools'] as $t): ?><span class="tool-chip"><?= $t ?></span><?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <div style="text-align: center; margin-top: 50px;" class="reveal">
      <a href="work.php" class="btn btn-primary">View All Work</a>
    </div>
  </div>
</section>

<!-- ======================================================
     QUICK HIRE CTA
     ====================================================== -->
<section class="section section--alt">
  <div class="container">
    <div style="text-align:center;max-width:580px;margin:0 auto;" class="reveal">
      <span class="label">Freelance</span>
      <h2 class="section-title">Got a project <span class="em">in mind?</span></h2>
      <span class="rule rule-center"></span>
      <p class="section-sub" style="margin:20px auto 30px;">
        I'm currently available for freelance work. Let's build something together.
      </p>
      <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
        <a href="contact.php" class="btn btn-hire">Hire me</a>
        <a href="work.php"    class="btn btn-ghost">See my work</a>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     PROJECT DETAIL MODAL (FLASHCARD VERSION)
     ====================================================== -->
<div class="project-modal" id="projectModal" role="dialog" aria-modal="true">
  <div class="modal-backdrop" id="modalBackdrop"></div>
  <div class="flashcard-container">
    <button class="modal-close" id="modalClose" aria-label="Close modal">&times;</button>
    <div class="flashcard" id="flashcard">
      
      <!-- FRONT FACE -->
      <div class="flashcard-face flashcard-front">
        <div class="modal-header-banner" id="modalBannerFront">
          <span id="modalEmojiFront"></span>
        </div>
        <div class="modal-body">
          <span class="modal-cat" id="modalCatFront"></span>
          <h2 class="modal-title" id="modalTitleFront"></h2>
          <div class="modal-divider" style="margin: 12px 0 16px;"></div>
          <p class="flashcard-desc" id="modalDescFront"></p>
          <div class="modal-tech" id="modalTechFront"></div>
          
          <div class="flip-hint">
            <span>Click card to flip for details ↺</span>
          </div>
        </div>
      </div>
      
      <!-- BACK FACE -->
      <div class="flashcard-face flashcard-back">
        <div class="modal-header-banner" id="modalBannerBack">
          <span id="modalEmojiBack"></span>
        </div>
        <div class="modal-body">
          <h2 class="modal-title" id="modalTitleBack"></h2>
          <div class="modal-divider" style="margin: 12px 0 16px;"></div>
          <div class="modal-readme" id="modalReadmeBack"></div>
          <div class="modal-actions" id="modalActionsBack"></div>
          
          <div class="flip-hint back-hint">
            <span>Click card to flip front ↺</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ======================================================
     PROJECTS DATA SOURCE
     ====================================================== -->
<script id="projects-data" type="application/json">
<?= json_encode([
    'web' => $webProjects,
    'software' => $softProjects,
    'video' => $videos
], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>
</script>

<?php render_footer(); ?>
