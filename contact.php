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
    ['<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>','Email',     env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com'),              'mailto:' . env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com')],
    ['<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>','WhatsApp',  env('PORTFOLIO_WHATSAPP', '+91 XXXXX XXXXX'),          env('PORTFOLIO_WHATSAPP_URL', 'https://wa.me/91XXXXXXXXXX')],
    ['<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>','LinkedIn',  preg_replace('#^https?://(www\.)?#', '', env('PORTFOLIO_LINKEDIN_URL', 'linkedin.com/in/arun-sah-7b7246313')), env('PORTFOLIO_LINKEDIN_URL', 'https://www.linkedin.com/in/arun-sah-7b7246313')],
    ['<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>','GitHub',    preg_replace('#^https?://(www\.)?#', '', env('PORTFOLIO_GITHUB_URL', 'github.com/Lamsterla')),     env('PORTFOLIO_GITHUB_URL', 'https://github.com/Lamsterla')],
    ['<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>','Location',  env('PORTFOLIO_CITY', 'India'),            '#'],
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
                  <option value="content">Content Writing</option>
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
