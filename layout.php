<?php
// =============================================
// PORTFOLIO — layout.php  (shared header/footer)
// Usage: include 'layout.php';  — set $page before including
// =============================================

function loadEnv(string $path): void {
    if (!file_exists($path)) {
        return;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $val = trim($parts[1]);
            $val = trim($val, '"\'');
            $_ENV[$key] = $val;
            putenv("$key=$val");
        }
    }
}

loadEnv(__DIR__ . '/.env');

function env(string $key, $default = '') {
    $val = getenv($key);
    if ($val === false) {
        $val = $_ENV[$key] ?? $_SERVER[$key] ?? $default;
    }
    return $val;
}

function render_head(string $title, string $desc = 'Portfolio of a web developer, video editor and blog writer.'): void {
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?= htmlspecialchars($desc) ?>" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="style.css?v=1.2" />
  <script>
    (function(){
      var t = localStorage.getItem('portfolio-theme') || 'dark';
      document.documentElement.setAttribute('data-theme', t);
    })();
  </script>
</head>
<body>
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>
<?php
}

function render_nav(string $active = 'home'): void {
?>
<nav id="navbar">
  <div class="container">
    <div class="nav-inner">
      <a href="index.php" class="nav-logo">Dev<span class="dot">.</span>Portfolio</a>

      <ul class="nav-links" id="navLinks">
        <li><a href="index.php"        class="nav-link <?= $active==='home'   ?'active':'' ?>">Home</a></li>
        <li><a href="about.php"        class="nav-link <?= $active==='about'  ?'active':'' ?>">About</a></li>
        <li><a href="work.php"         class="nav-link <?= $active==='work'   ?'active':'' ?>">Work</a></li>
        <li><a href="blogs.php"        class="nav-link <?= $active==='blogs'  ?'active':'' ?>">Blog</a></li>
        <li><a href="contact.php"      class="nav-link <?= $active==='contact'?'active':'' ?>">Contact</a></li>
      </ul>

      <div class="nav-cta">
        <a href="contact.php" class="btn btn-hire btn-sm">Hire Me</a>
        <button id="theme-toggle" aria-label="Toggle theme">
          <span class="icon-sun">&#9728;</span>
          <span class="icon-moon">&#9790;</span>
        </button>
        <button class="hamburger" id="hamburger" aria-label="Open menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>
</nav>
<?php
}

function render_footer(): void {
?>
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="nav-logo">Dev<span class="dot">.</span>Portfolio</div>
        <p>Building thoughtful digital experiences with clean code and real attention to detail. Open to freelance projects.</p>
        <div class="footer-socials">
          <a class="social-link" href="<?= env('PORTFOLIO_GITHUB_URL', 'https://github.com/Lamsterla') ?>" target="_blank" rel="noopener noreferrer" title="GitHub">&#128025;</a>
          <a class="social-link" href="<?= env('PORTFOLIO_LINKEDIN_URL', 'https://www.linkedin.com/in/arun-sah-7b7246313') ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn">&#128188;</a>
          <a class="social-link" href="#" title="Twitter">&#128038;</a>
          <a class="social-link" href="#" title="YouTube">&#128250;</a>
          <a class="social-link" href="<?= env('PORTFOLIO_INSTAGRAM_URL', 'https://www.instagram.com/sah_arun_kumar') ?>" target="_blank" rel="noopener noreferrer" title="Instagram">&#128247;</a>
        </div>
      </div>

      <div class="footer-col">
        <h5>Pages</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="work.php">Work</a></li>
          <li><a href="blogs.php">Blog</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h5>Services</h5>
        <ul>
          <li><a href="contact.php">Web Development</a></li>
          <li><a href="contact.php">Software Dev</a></li>
          <li><a href="contact.php">Video Editing</a></li>
          <li><a href="contact.php">Blog Writing</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h5>Contact</h5>
        <ul>
          <li><a href="mailto:<?= env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com') ?>"><?= env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com') ?></a></li>
          <li><a href="<?= env('PORTFOLIO_WHATSAPP_URL', 'https://wa.me/91XXXXXXXXXX') ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
          <li><a href="<?= env('PORTFOLIO_LINKEDIN_URL', 'https://www.linkedin.com/in/arun-sah-7b7246313') ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
          <li><a href="#"><?= env('PORTFOLIO_CITY', 'India') ?></a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <strong>Dev.Portfolio</strong> — All rights reserved.</p>
      <p>PHP &middot; CSS &middot; JavaScript</p>
    </div>
  </div>
</footer>

<button id="scroll-top" aria-label="Back to top">&#8593;</button>
<script src="script.js"></script>
</body>
</html>
<?php
}
