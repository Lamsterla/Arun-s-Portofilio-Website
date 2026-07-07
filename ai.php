<?php
// =============================================
// PORTFOLIO — ai.php (AI Twin Assistant)
// =============================================
require 'layout.php';
require 'data.php';

render_head('AI Twin — Dev.Portfolio', 'Chat with the AI version of me to learn about my skills, projects, rates, and availability.');
?>
<!-- Custom CSS for the Elite Glassy AI Page -->
<link rel="stylesheet" href="ai-style.css?v=1.2" />

<?php
render_nav('ai');
?>

<div class="ai-app-wrapper">
  <div class="ai-container-fluid">
    <div class="ai-grid">
      
      <!-- LEFT SIDEBAR: AI Profile & Status -->
      <aside class="ai-sidebar-left glass-panel">
        <div class="ai-profile-card">
          <div class="ai-avatar-wrapper">
            <div class="ai-avatar-glow"></div>
            <div class="ai-avatar">
              <!-- Animated AI brain / core icon -->
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 6C13.66 6 15 7.34 15 9C15 10.66 13.66 12 12 12C10.34 12 9 10.66 9 9C9 7.34 10.34 6 12 6ZM12 18C9.33 18 4.67 19.33 4.67 22C6.24 23.55 8.52 24.5 11 24.5C13.48 24.5 15.76 23.55 17.33 22C17.33 19.33 12.67 18 12 18Z" fill="currentColor"/>
                <path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L12 12l7.03 5.61C20.26 16.07 21 14.12 21 12c0-4.97-4.03-9-9-9zm0 5c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 8.2c2.63 0 5.37.8 6.53 1.8-1.54 1.37-3.57 2.2-5.8 2.2s-4.26-.83-5.8-2.2c1.16-1 3.9-1.8 6.53-1.8z" fill="var(--ai-accent)"/>
              </svg>
            </div>
            <span class="ai-status-dot online"></span>
          </div>
          <div class="ai-profile-info">
            <h2>Arun's AI Twin</h2>
            <p class="ai-subtitle">Portfolio Assistant v2.5</p>
            <div class="ai-badge">Elite Model</div>
          </div>
        </div>

        <div class="ai-divider"></div>

        <div class="ai-capabilities">
          <h3>What I Can Do</h3>
          <ul class="capability-list">
            <li>
              <span class="cap-icon">⚡</span>
              <div class="cap-text">
                <strong>Project Showcases</strong>
                <span>Instant demos and source code links</span>
              </div>
            </li>
            <li>
              <span class="cap-icon">💰</span>
              <div class="cap-text">
                <strong>Pricing & Services</strong>
                <span>Get quotes for web, software, and video work</span>
              </div>
            </li>
            <li>
              <span class="cap-icon">📅</span>
              <div class="cap-text">
                <strong>Check Availability</strong>
                <span>Find out when Arun is open for work</span>
              </div>
            </li>
          </ul>
        </div>

        <div class="ai-divider"></div>

        <div class="ai-model-specs">
          <div class="spec-row">
            <span>Response Latency</span>
            <strong>< 200ms</strong>
          </div>
          <div class="spec-row">
            <span>Accuracy Rate</span>
            <strong>99.4%</strong>
          </div>
          <div class="spec-row">
            <span>Context Window</span>
            <strong>Active Session</strong>
          </div>
        </div>
      </aside>

      <!-- CENTER: Main Chat Interface -->
      <main class="ai-chat-container glass-panel">
        <!-- Chat Header -->
        <div class="chat-header">
          <div class="chat-title-area">
            <div class="chat-avatar-small">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" fill="currentColor" opacity="0.15"/><path d="M12 6v12M6 12h12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <div>
              <h3>Interactive Session</h3>
              <p class="chat-status">Ready to assist you</p>
            </div>
          </div>
          <div class="chat-actions-top">
            <button class="chat-btn-action" id="clearChat" title="Clear Chat">
              <span>🧹</span> Clear
            </button>
          </div>
        </div>

        <!-- Chat Messages Area -->
        <div class="chat-messages" id="chatMessages">
          <!-- Initial AI Greeting -->
          <div class="message ai-message">
            <div class="msg-avatar">🤖</div>
            <div class="msg-bubble-wrapper">
              <div class="msg-bubble">
                <p>Hello! I am Arun's AI Twin. I can tell you about his work, background, services, and rates. How can I help you today?</p>
              </div>
              <span class="msg-time">Just now</span>
            </div>
          </div>
        </div>

        <!-- Typing Indicator (Hidden by default) -->
        <div class="typing-indicator" id="typingIndicator" style="display: none;">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>

        <!-- Suggested Prompts Row -->
        <div class="chat-suggestions-wrapper">
          <p class="suggestion-label">Suggested Questions:</p>
          <div class="chat-suggestions" id="chatSuggestions">
            <button class="suggest-btn" data-query="Are you available for freelance work?">📅 Availability</button>
            <button class="suggest-btn" data-query="What are your services and rates?">💰 Pricing & Rates</button>
            <button class="suggest-btn" data-query="Show me your web development projects.">💻 Web Projects</button>
            <button class="suggest-btn" data-query="Can you edit videos and what tools do you use?">🎥 Video Editing</button>
            <button class="suggest-btn" data-query="What is your tech stack?">🛠️ Tech Stack</button>
            <button class="suggest-btn" data-query="How can I contact or hire you?">✉️ Contact Info</button>
          </div>
        </div>

        <!-- Input Box Area -->
        <div class="chat-input-area">
          <form class="chat-form" id="chatForm">
            <input type="text" id="chatInput" placeholder="Ask anything about Arun's work, experience, or rates..." autocomplete="off" required />
            <button type="submit" class="chat-send-btn" id="sendBtn">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.01 21L23 12L2.01 3L2 10L17 12L2 14L2.01 21Z" fill="currentColor"/>
              </svg>
            </button>
          </form>
        </div>
      </main>

      <!-- RIGHT SIDEBAR: Developer Quick Bio & Contact Card -->
      <aside class="ai-sidebar-right glass-panel">
        <div class="developer-quick-card">
          <h3>The Developer</h3>
          <div class="dev-info-box">
            <div class="dev-avatar">AS</div>
            <div>
              <h4>Arun Sah</h4>
              <p>Full-Stack Developer & Editor</p>
            </div>
          </div>
          <p class="dev-mini-bio">
            Specializing in high-performance web applications, automation scripts, and high-production video editing. Currently based in India and open for global projects.
          </p>
          <a href="about.php" class="btn btn-ghost btn-sm btn-full">View Full Profile</a>
        </div>

        <div class="ai-divider"></div>

        <div class="quick-contact-box">
          <h3>Quick Actions</h3>
          <div class="action-buttons-vertical">
            <a href="contact.php" class="quick-action-btn">
              <span class="btn-icon">💼</span>
              <div class="btn-text">
                <strong>Hire Me</strong>
                <span>Start a new project</span>
              </div>
            </a>
            <a href="mailto:<?= env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com') ?>" class="quick-action-btn">
              <span class="btn-icon">📧</span>
              <div class="btn-text">
                <strong>Email Direct</strong>
                <span><?= env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com') ?></span>
              </div>
            </a>
            <a href="<?= env('PORTFOLIO_WHATSAPP_URL', 'https://wa.me/91XXXXXXXXXX') ?>" target="_blank" rel="noopener" class="quick-action-btn">
              <span class="btn-icon">💬</span>
              <div class="btn-text">
                <strong>WhatsApp Chat</strong>
                <span>Instant messaging</span>
              </div>
            </a>
          </div>
        </div>
      </aside>

    </div>
  </div>
</div>

<!-- AI Scripts -->
<script>
  window.PORTFOLIO_CONFIG = {
    email: <?= json_encode(env('PORTFOLIO_EMAIL', 'arunkumar90853@gmail.com')) ?>,
    whatsapp_url: <?= json_encode(env('PORTFOLIO_WHATSAPP_URL', 'https://wa.me/91XXXXXXXXXX')) ?>,
    linkedin_url: <?= json_encode(env('PORTFOLIO_LINKEDIN_URL', 'https://www.linkedin.com/in/arun-sah-7b7246313')) ?>,
    github_url: <?= json_encode(env('PORTFOLIO_GITHUB_URL', 'https://github.com/Lamsterla')) ?>,
    city: <?= json_encode(env('PORTFOLIO_CITY', 'India')) ?>
  };
</script>
<script src="ai-script.js"></script>

<?php
render_footer();
?>
