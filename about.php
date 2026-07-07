<?php
// =============================================
// PORTFOLIO — about.php
// =============================================
require 'layout.php';
require 'data.php';

render_head('About Me — Dev.Portfolio', 'Learn about my background, skills and what drives me as a developer and creator.');
render_nav('about');
?>

<!-- ======================================================
     ABOUT
     ====================================================== -->
<section class="section section--alt" style="padding-top:110px;">
  <div class="container">
    <div class="about-inner">

      <div class="about-photo-col reveal from-left">
        <div class="about-photo-frame">
          <div class="about-photo-placeholder">
            <span style="font-size:2.5rem;opacity:0.25;">&#128247;</span>
            <p>Your photo here</p>
          </div>
          <!-- <img src="assets/about.jpg" alt="About me"> -->
        </div>
        <div class="about-exp-box">
          <div class="exp-num">3+</div>
          <div class="exp-lbl">Years of<br>Experience</div>
        </div>
      </div>

      <div class="about-content reveal from-right">
        <span class="label">Who I Am</span>
        <h1 class="section-title">Crafting things that<br>work <span class="em">and</span> look good</h1>
        <span class="rule"></span>

        <p class="about-bio" style="margin-top:22px;">
          I'm a self-driven developer and creator with a background in web and software engineering.
          I like building things that are well-structured, fast and actually useful to the people who use them.
        </p>
        <p class="about-bio">
          Outside writing code I edit video content and write technical blogs — which means I understand
          a project from multiple angles. When you hire me, you get someone who thinks about the full picture.
        </p>

        <div class="about-grid">
          <div class="about-item"><div class="ai-label">Name</div><div class="ai-val"><?= env('PORTFOLIO_NAME', 'Arun Sah') ?></div></div>
          <div class="about-item"><div class="ai-label">Location</div><div class="ai-val"><?= env('PORTFOLIO_CITY', 'India') ?></div></div>
          <div class="about-item"><div class="ai-label">Email</div><div class="ai-val"><?= env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com') ?></div></div>
          <div class="about-item"><div class="ai-label">Status</div><div class="ai-val open">Open to Work</div></div>
          <div class="about-item"><div class="ai-label">Experience</div><div class="ai-val">3+ Years</div></div>
          <div class="about-item"><div class="ai-label">Freelance</div><div class="ai-val">Yes, available</div></div>
        </div>

        <div class="about-actions">
          <a href="assets/resume.pdf" download class="btn btn-primary">Download Resume</a>
          <a href="contact.php" class="btn btn-ghost">Work with me</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ======================================================
     PROFICIENCY
     ====================================================== -->
<section class="section">
  <div class="container">
    <div class="reveal">
      <span class="label">Skills</span>
      <h2 class="section-title">Proficiency <span class="em">levels</span></h2>
      <span class="rule"></span>
    </div>

    <div class="proficiency-wrap reveal" style="margin-top:32px;">
      <div class="prof-grid">
        <?php
        $bars = [
          'PHP / MySQL'=>88,'JavaScript'=>85,'Python'=>80,'HTML & CSS'=>92,
          'Video Editing'=>78,'Blog Writing'=>85,'React / Node.js'=>70,'UI / UX Design'=>75
        ];
        foreach ($bars as $name => $pct): ?>
        <div class="prof-item">
          <div class="prof-head">
            <span><?= $name ?></span>
            <span><?= $pct ?>%</span>
          </div>
          <div class="prof-bar">
            <div class="prof-fill" data-width="<?= $pct ?>"></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     HOBBIES
     ====================================================== -->
<section class="section section--alt" id="hobbies">
  <div class="container">
    <div class="text-center reveal">
      <span class="label">Beyond Work</span>
      <h2 class="section-title">What I do <span class="em">outside</span> code</h2>
      <span class="rule rule-center"></span>
      <p class="section-sub" style="margin-top:16px;">
        Things that keep me curious, energised and a better problem-solver.
      </p>
    </div>
    <div class="hobbies-grid" style="margin-top:46px;">
      <?php foreach ($hobbies as $i => $h): ?>
      <div class="hobby-card reveal d<?= min($i+1,5) ?>">
        <span class="hobby-icon"><?= $h['icon'] ?></span>
        <h4><?= $h['title'] ?></h4>
        <p><?= $h['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php render_footer(); ?>
