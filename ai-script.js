// =============================================
// PORTFOLIO — ai-script.js
// Interactive AI Twin Chat Logic
// =============================================

'use strict';

document.addEventListener('DOMContentLoaded', () => {
  const chatForm = document.getElementById('chatForm');
  const chatInput = document.getElementById('chatInput');
  const chatMessages = document.getElementById('chatMessages');
  const typingIndicator = document.getElementById('typingIndicator');
  const clearChatBtn = document.getElementById('clearChat');
  const suggestionButtons = document.querySelectorAll('.suggest-btn');

  // Response Database
  const responseDb = [
    {
      keywords: /(hi|hello|hey|greetings|good morning|good afternoon)/i,
      reply: "Hello! Always great to meet new people. I'm Arun's AI Twin. You can ask me about his projects, skill set, pricing, or availability. What's on your mind?"
    },
    {
      keywords: /(availab|free|busy|schedule|hire|work with)/i,
      reply: "Arun is <strong>currently available</strong> and accepting new freelance projects! He is looking for web development, software automation, and video editing work. You can submit a project brief directly via the <a href='contact.php' class='ai-accent-link'>Contact Page</a>."
    },
    {
      keywords: /(price|pricing|rate|cost|fees|charge|how much)/i,
      reply: "<h4>Services & Starting Rates:</h4><ul>" +
             "<li><strong>Web Development:</strong> Custom sites, React apps, PHP backends — From ₹5,000</li>" +
             "<li><strong>Software Development:</strong> Custom automation, Python bots, CLI tools — From ₹8,000</li>" +
             "<li><strong>Video Editing:</strong> YouTube videos, cinematic reels, promotional ads — From ₹2,000</li>" +
             "<li><strong>Blog Writing:</strong> SEO-optimized technical tutorials & articles — From ₹500/post</li>" +
             "</ul><p style='margin-top:8px;'>Have a specific project? Drop a message on the <a href='contact.php'>Contact Page</a> for a custom quote!</p>"
    },
    {
      keywords: /(web|website|front|back|fullstack|react|php|mysql)/i,
      reply: "<h4>Featured Web Projects:</h4>" +
             "<div class='msg-bubble-card'><strong>Antivirus Dashboard</strong><p>Real-time threat monitoring using PHP, Python, and MySQL.</p><a href='work.php'>View Project</a></div>" +
             "<div class='msg-bubble-card'><strong>E-Commerce Platform</strong><p>Full-stack online shop with cart, checkout, and admin panel.</p><a href='work.php'>View Project</a></div>" +
             "<div class='msg-bubble-card'><strong>Analytics Dashboard</strong><p>Interactive data visualization with Chart.js.</p><a href='work.php'>View Project</a></div>"
    },
    {
      keywords: /(software|python|bot|scrap|automation|cli)/i,
      reply: "<h4>Software & Automation Projects:</h4>" +
             "<div class='msg-bubble-card'><strong>Python Scraper & Bot</strong><p>Automated web scraping and notification system built with Selenium.</p><a href='work.php'>View Details</a></div>" +
             "<div class='msg-bubble-card'><strong>Dev Toolbox CLI</strong><p>A Command Line interface tool in Python to automate developer workflows.</p><a href='work.php'>View Details</a></div>" +
             "<div class='msg-bubble-card'><strong>REST API Backend</strong><p>Modular Node.js/Express API with JWT authentication.</p><a href='work.php'>View Details</a></div>"
    },
    {
      keywords: /(video|edit|premiere|effects|youtube|reel|short|clip)/i,
      reply: "Arun has over 3 years of experience editing high-production videos. He specializes in:<ul>" +
             "<li><strong>YouTube Channel Reels</strong> — pacing, retention, motion graphics (50k+ views)</li>" +
             "<li><strong>Brand Promo Ads</strong> — high-impact 30s product promos</li>" +
             "<li><strong>Cinematic Travel Reels</strong> — sound design, J-cuts, color grading</li>" +
             "</ul><p>Primary tools: <em>Adobe Premiere Pro, After Effects, DaVinci Resolve</em>. See samples on the <a href='work.php'>Work Page</a>.</p>"
    },
    {
      keywords: /(blog|write|article|seo|tutorial|guide)/i,
      reply: "Arun writes well-researched technical blogs and SEO tutorials. Popular articles include:<ul>" +
             "<li><strong>Building Modern PHP Apps</strong> — PHP architecture & Composer workflows</li>" +
             "<li><strong>Automating Workflows with Python</strong> — saving hours with automation</li>" +
             "<li><strong>Web Security Every Developer Must Know</strong> — SQLi, XSS, and CSRF protection</li>" +
             "</ul><p>Check out the full list on the <a href='blogs.php'>Blog Page</a>.</p>"
    },
    {
      keywords: /(stack|tech|tool|language|code|program)/i,
      reply: "<h4>Arun's Professional Tech Stack:</h4><ul>" +
             "<li><strong>Languages:</strong> PHP, JavaScript (ES6+), Python, C++, SQL, Dart</li>" +
             "<li><strong>Frameworks/Libraries:</strong> React, Node.js, Express, Laravel (basics), Flutter</li>" +
             "<li><strong>Databases:</strong> MySQL, MongoDB, SQLite</li>" +
             "<li><strong>Creative Tools:</strong> Premiere Pro, After Effects, DaVinci Resolve, Figma</li>" +
             "</ul>"
    },
    {
      keywords: /(contact|email|phone|whatsapp|linkedin|github|reach|address|location|city)/i,
      reply: "<h4>How to connect:</h4><ul>" +
             "<li>📧 <strong>Email:</strong> <a href='mailto:your@email.com'>your@email.com</a></li>" +
             "<li>💬 <strong>WhatsApp:</strong> <a href='https://wa.me/91XXXXXXXXXX' target='_blank'>Chat Now</a></li>" +
             "<li>💼 <strong>LinkedIn:</strong> <a href='https://linkedin.com' target='_blank'>Connect on LinkedIn</a></li>" +
             "<li>🐙 <strong>GitHub:</strong> <a href='https://github.com' target='_blank'>View repositories</a></li>" +
             "<li>📍 <strong>Location:</strong> Your City, India</li>" +
             "</ul>"
    },
    {
      keywords: /(experience|background|cv|resume|who are you|about)/i,
      reply: "Arun is a self-driven developer and creator with <strong>3+ years of experience</strong>. He bridges the gap between clean code and high-quality digital content, taking projects from idea to execution. You can download his full resume on the <a href='about.php'>About Page</a>."
    }
  ];

  // Default fallback response
  const fallbackResponse = "I'm not sure I understand that completely. You can ask me about Arun's <strong>tech stack</strong>, <strong>portfolio projects</strong>, <strong>freelance rates</strong>, <strong>availability</strong>, or how to <strong>contact</strong> him.";

  // Scroll chat to bottom
  function scrollToBottom() {
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  // Format current time
  function getFormattedTime() {
    const now = new Date();
    return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  }

  // Create message element
  function appendMessage(sender, text) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender}-message`;

    const avatar = sender === 'user' ? '👤' : '🤖';
    
    messageDiv.innerHTML = `
      <div class="msg-avatar">${avatar}</div>
      <div class="msg-bubble-wrapper">
        <div class="msg-bubble">${text}</div>
        <span class="msg-time">${getFormattedTime()}</span>
      </div>
    `;

    chatMessages.appendChild(messageDiv);
    scrollToBottom();
  }

  // Handle bot response logic
  function handleBotResponse(userQuery) {
    // Show typing indicator
    typingIndicator.style.display = 'flex';
    scrollToBottom();

    // Simulate natural thinking delay (500ms to 1200ms)
    const delay = Math.random() * 700 + 500;

    setTimeout(() => {
      typingIndicator.style.display = 'none';
      
      let matchedReply = null;
      for (const item of responseDb) {
        if (item.keywords.test(userQuery)) {
          matchedReply = item.reply;
          break;
        }
      }

      const replyText = matchedReply || fallbackResponse;
      appendMessage('ai', replyText);
    }, delay);
  }

  // Handle Form Submission
  chatForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const query = chatInput.value.trim();
    if (!query) return;

    // Append User Message
    appendMessage('user', query);
    chatInput.value = '';

    // Generate Bot Response
    handleBotResponse(query);
  });

  // Handle Suggested Prompts Click
  suggestionButtons.forEach(button => {
    button.addEventListener('click', () => {
      const query = button.getAttribute('data-query');
      appendMessage('user', query);
      handleBotResponse(query);
    });
  });

  // Clear Chat History
  clearChatBtn.addEventListener('click', () => {
    chatMessages.innerHTML = `
      <div class="message ai-message">
        <div class="msg-avatar">🤖</div>
        <div class="msg-bubble-wrapper">
          <div class="msg-bubble">
            <p>Chat cleared. I am ready to assist you again. Ask me anything about Arun's work, experience, or rates.</p>
          </div>
          <span class="msg-time">${getFormattedTime()}</span>
        </div>
      </div>
    `;
    scrollToBottom();
  });
});
