<?php
// =============================================
// PORTFOLIO — work.php  (Projects & Video)
// =============================================
require 'layout.php';
require 'data.php';

render_head('My Work — Dev.Portfolio', 'Web projects, software tools and video editing work.');
render_nav('work');
?>

<div style="padding-top:88px;">

<!-- ======================================================
     PAGE HEADER
     ====================================================== -->
<div class="section section--alt" style="padding-bottom:0;">
  <div class="container">
    <span class="label">Portfolio</span>
    <h1 class="section-title">Projects &amp; <span class="em">creative work</span></h1>
    <span class="rule"></span>
    <p class="section-sub" style="margin-top:14px;padding-bottom:40px;">
      From full-stack websites to video edits — everything built and shipped.
    </p>

    <!-- Tab bar -->
    <div class="ptab-bar" role="tablist" style="margin-bottom:0;">
      <button class="ptab active" data-panel="web"      role="tab" aria-selected="true">&#128187; Web Projects</button>
      <button class="ptab"        data-panel="software" role="tab">&#9881; Software</button>
      <button class="ptab"        data-panel="video"    role="tab">&#9654; Video Work</button>
    </div>
  </div>
</div>

<!-- ======================================================
     WEB PANEL
     ====================================================== -->
<div class="portfolio-panel active" id="panel-web" role="tabpanel">
  <div class="container">
    <div class="portfolio-grid">
      <?php foreach ($webProjects as $index => $p): ?>
      <div class="project-card reveal" data-type="web" data-index="<?= $index ?>" style="cursor: pointer;">
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
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ======================================================
     SOFTWARE PANEL
     ====================================================== -->
<div class="portfolio-panel" id="panel-software" role="tabpanel">
  <div class="container">
    <div class="portfolio-grid">
      <?php foreach ($softProjects as $index => $p): ?>
      <div class="project-card reveal" data-type="software" data-index="<?= $index ?>" style="cursor: pointer;">
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
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ======================================================
     VIDEO PANEL
     ====================================================== -->
<div class="portfolio-panel" id="panel-video" role="tabpanel">
  <div class="container">
    <div class="portfolio-grid">
      <?php foreach ($videos as $index => $v): ?>
      <div class="video-slide-card project-card reveal" data-type="video" data-index="<?= $index ?>" style="cursor: pointer;">
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
      <?php endforeach; ?>
    </div>

    <div class="video-skills-strip" style="margin-top:40px;">
      <div class="vstrip-left">
        <p class="vstrip-label">Specialties</p>
        <div class="tool-chips">
          <?php foreach (['Premiere Pro','After Effects','DaVinci Resolve','CapCut','Audacity','Color Grading','Motion Graphics'] as $tool): ?>
          <span class="tool-chip"><?= $tool ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <a href="contact.php" class="btn btn-hire">Hire me for video work</a>
    </div>
  </div>
</div>

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

</div><!-- /padding-top wrapper -->

<?php render_footer(); ?>
