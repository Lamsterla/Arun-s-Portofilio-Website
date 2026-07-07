<?php
// =============================================
// PORTFOLIO — contact.php  (Hire Me + Contact)
// =============================================
require 'layout.php';
require 'data.php';

// Form handling
$formMessage = '';
$formSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type'])) {
    if ($_POST['form_type'] === 'hire') {
        $name    = htmlspecialchars(trim($_POST['name']    ?? ''));
        $email   = htmlspecialchars(trim($_POST['email']   ?? ''));
        $service = htmlspecialchars(trim($_POST['service'] ?? ''));
        $message = htmlspecialchars(trim($_POST['message'] ?? ''));
        if ($name && $email && $service && $message) {
            $formSuccess = true;
            $formMessage = "Thank you, $name. I'll respond within 24 hours.";
        } else {
            $formMessage = "Please fill in all required fields.";
        }
    } elseif ($_POST['form_type'] === 'contact') {
        $cname  = htmlspecialchars(trim($_POST['cname'] ?? ''));
        $cemail = htmlspecialchars(trim($_POST['cemail'] ?? ''));
        $cmsg   = htmlspecialchars(trim($_POST['cmsg']  ?? ''));
        if ($cname && $cemail && $cmsg) {
            $formSuccess = true;
            $formMessage = "Message received, $cname. Talk soon.";
        } else {
            $formMessage = "Please fill in all fields.";
        }
    }
}

render_head('Contact — Dev.Portfolio', 'Get in touch to start a project or just say hello.');
render_nav('contact');

$contacts = [
    ['&#128140;','Email',     env('PORTFOLIO_EMAIL', 'your@email.com'),              'mailto:' . env('PORTFOLIO_EMAIL', 'your@email.com')],
    ['&#128241;','WhatsApp',  env('PORTFOLIO_WHATSAPP', '+91 XXXXX XXXXX'),          env('PORTFOLIO_WHATSAPP_URL', 'https://wa.me/91XXXXXXXXXX')],
    ['&#128188;','LinkedIn',  preg_replace('#^https?://(www\.)?#', '', env('PORTFOLIO_LINKEDIN_URL', 'linkedin.com')), env('PORTFOLIO_LINKEDIN_URL', 'https://linkedin.com')],
    ['&#128025;','GitHub',    preg_replace('#^https?://(www\.)?#', '', env('PORTFOLIO_GITHUB_URL', 'github.com')),     env('PORTFOLIO_GITHUB_URL', 'https://github.com')],
    ['&#128205;','Location',  env('PORTFOLIO_CITY', 'Your City, India'),            '#'],
];
?>

<!-- ======================================================
     HIRE ME
     ====================================================== -->
<section class="section section--alt" id="hire" style="padding-top:110px;">
  <div class="container">
    <div class="hire-inner">

      <div class="reveal from-left">
        <span class="label">Freelance</span>
        <h1 class="section-title">Let's build<br>something <span class="em">together</span></h1>
        <span class="rule"></span>
        <p style="color:var(--muted);font-size:0.95rem;line-height:1.84;margin:20px 0 24px;">
          I'm available for freelance work — websites, software tools, video editing or blog content.
          Straightforward to work with, deadline-focused and clear communicator.
        </p>

        <div class="avail-banner">
          <span class="avail-pulse"></span>
          <p><strong>Currently available</strong> — taking on new projects for July 2025.</p>
        </div>

        <div class="services-list">
          <?php foreach ($services as $s): ?>
          <div class="service-row">
            <div class="svc-ico"><?= $s[0] ?></div>
            <div class="svc-info">
              <h4><?= $s[1] ?></h4>
              <p><?= $s[2] ?></p>
            </div>
            <span class="svc-price"><?= $s[3] ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="reveal from-right">
        <div class="hire-form-box">
          <h3>Send a project brief</h3>
          <p class="form-sub">Fill in the details and I'll get back to you within 24 hours.</p>

          <?php if ($formSuccess && ($_POST['form_type'] ?? '') === 'hire'): ?>
            <div class="form-notice">&#10003; <?= htmlspecialchars($formMessage) ?></div>
          <?php elseif (!$formSuccess && $formMessage && ($_POST['form_type'] ?? '') === 'hire'): ?>
            <div class="form-error-msg">&#9888; <?= htmlspecialchars($formMessage) ?></div>
          <?php endif; ?>

          <form method="POST" action="#hire" id="hireForm">
            <input type="hidden" name="form_type" value="hire">
            <div class="form-row">
              <div class="form-group">
                <label for="hire-name">Full name *</label>
                <input id="hire-name" type="text" name="name" placeholder="John Doe" required>
              </div>
              <div class="form-group">
                <label for="hire-email">Email *</label>
                <input id="hire-email" type="email" name="email" placeholder="john@example.com" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="hire-service">Service needed *</label>
                <select id="hire-service" name="service" required>
                  <option value="">Select a service</option>
                  <option value="web">Web Development</option>
                  <option value="software">Software Development</option>
                  <option value="video">Video Editing</option>
                  <option value="blog">Blog Writing</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="hire-budget">Budget</label>
                <select id="hire-budget" name="budget">
                  <option value="">Select range</option>
                  <option value="under5k">Under &#8377;5,000</option>
                  <option value="5k-15k">&#8377;5,000 – &#8377;15,000</option>
                  <option value="15k-50k">&#8377;15,000 – &#8377;50,000</option>
                  <option value="50k+">&#8377;50,000+</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="hire-message">Project details *</label>
              <textarea id="hire-message" name="message" placeholder="Describe the project, goals, timeline..." required></textarea>
            </div>
            <button type="submit" class="btn btn-hire submit-full">Send brief</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ======================================================
     CONTACT / GET IN TOUCH
     ====================================================== -->
<section class="section" id="contact">
  <div class="container">
    <div class="contact-inner">

      <div class="reveal from-left">
        <span class="label">Get In Touch</span>
        <h2 class="section-title">Drop me a <span class="em">message</span></h2>
        <span class="rule"></span>
        <p style="color:var(--muted);font-size:0.95rem;line-height:1.84;margin:20px 0 0;">
          For questions, project ideas or just a hello — I'm reachable across all the usual channels.
          I reply within a day, usually faster.
        </p>
        <div class="contact-links">
          <?php foreach ($contacts as $c): ?>
          <a href="<?= $c[3] ?>" target="_blank" rel="noopener" class="contact-item">
            <span class="ci-icon"><?= $c[0] ?></span>
            <div class="ci-txt">
              <strong><?= $c[1] ?></strong>
              <span><?= $c[2] ?></span>
            </div>
            <span class="ci-arrow">&#8594;</span>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="reveal from-right">
        <div class="contact-form-box">
          <h3>Send a message</h3>
          <p class="form-sub">I'll get back to you as soon as I can.</p>

          <?php if ($formSuccess && ($_POST['form_type'] ?? '') === 'contact'): ?>
            <div class="form-notice">&#10003; <?= htmlspecialchars($formMessage) ?></div>
          <?php elseif (!$formSuccess && $formMessage && ($_POST['form_type'] ?? '') === 'contact'): ?>
            <div class="form-error-msg">&#9888; <?= htmlspecialchars($formMessage) ?></div>
          <?php endif; ?>

          <form method="POST" action="#contact" id="contactForm">
            <input type="hidden" name="form_type" value="contact">
            <div class="form-row">
              <div class="form-group">
                <label for="c-name">Your name</label>
                <input id="c-name" type="text" name="cname" placeholder="John Doe" required>
              </div>
              <div class="form-group">
                <label for="c-email">Email</label>
                <input id="c-email" type="email" name="cemail" placeholder="john@example.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="c-msg">Message</label>
              <textarea id="c-msg" name="cmsg" placeholder="What's on your mind..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary submit-full">Send message</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<?php render_footer(); ?>
