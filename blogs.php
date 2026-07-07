<?php
// =============================================
// PORTFOLIO — blogs.php
// =============================================
require 'layout.php';

render_head('Blog — Dev.Portfolio', 'Articles on web development, Python, video editing and freelancing.');
render_nav('blogs');

$blogs = [
    ['emoji'=>'&#127757;','bg'=>'linear-gradient(145deg,#1a2840,#243558)','cat'=>'Web Dev','date'=>'Jun 10, 2025','title'=>'Building Modern PHP Apps in 2025','excerpt'=>'A practical look at PHP architecture, PSR standards, Composer workflows and the patterns I use on every project.'],
    ['emoji'=>'&#128013;','bg'=>'linear-gradient(145deg,#1e2e28,#283e33)','cat'=>'Python','date'=>'May 28, 2025','title'=>'Automating My Workflow with Python','excerpt'=>'How I save hours each week using Python scripts for file management, reporting, and scheduled tasks.'],
    ['emoji'=>'&#127912;','bg'=>'linear-gradient(145deg,#28182a,#382038)','cat'=>'CSS','date'=>'May 14, 2025','title'=>'CSS Techniques That Changed How I Work','excerpt'=>'Container queries, custom properties and modern layout tricks that every frontend developer should know.'],
    ['emoji'=>'&#127925;','bg'=>'linear-gradient(145deg,#2a1e10,#38281a)','cat'=>'Video','date'=>'Apr 30, 2025','title'=>'Color Grading: A Developer\'s Guide','excerpt'=>'Step-by-step breakdown of how I approach color grading in Premiere Pro using LUTs and scopes.'],
    ['emoji'=>'&#128274;','bg'=>'linear-gradient(145deg,#182030,#20283e)','cat'=>'Security','date'=>'Apr 12, 2025','title'=>'Web Security Every PHP Dev Must Know','excerpt'=>'SQL injection, XSS, CSRF — real examples and how to harden your PHP applications against them.'],
    ['emoji'=>'&#128161;','bg'=>'linear-gradient(145deg,#221830,#2e2040)','cat'=>'Freelance','date'=>'Mar 25, 2025','title'=>'Getting Your First Freelance Project','excerpt'=>'What I learned landing my first freelance client — proposals, pricing, platforms, and what not to do.'],
];
?>

<section class="section" style="padding-top:110px;">
  <div class="container">
    <div class="text-center reveal">
      <span class="label">Writing</span>
      <h1 class="section-title">From the <span class="em">blog</span></h1>
      <span class="rule rule-center"></span>
      <p class="section-sub" style="margin-top:16px;">
        I write about web development, Python, video editing and freelancing — stuff I've actually done.
      </p>
    </div>

    <div class="blogs-grid" style="margin-top:48px;">
      <?php foreach ($blogs as $i => $b): ?>
      <article class="blog-card reveal d<?= min($i+1,5) ?>">
        <div class="blog-cover" style="background:<?= $b['bg'] ?>">
          <span class="blog-cover-inner"><?= $b['emoji'] ?></span>
        </div>
        <div class="blog-body">
          <div class="blog-row">
            <span class="blog-tag"><?= $b['cat'] ?></span>
            <span class="blog-date"><?= $b['date'] ?></span>
          </div>
          <h3><?= $b['title'] ?></h3>
          <p><?= $b['excerpt'] ?></p>
          <a href="#" class="blog-more">Read more &#8594;</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php render_footer(); ?>
