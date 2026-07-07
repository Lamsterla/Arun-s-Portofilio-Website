<?php
// =============================================
// PORTFOLIO — data.php  (shared data)
// =============================================

$skills = [
    [
        'icon'   => '</>',
        'title'  => 'Web Development',
        'desc'   => 'Building responsive, performant websites and web apps — from pixel-perfect front-ends to robust PHP back-ends.',
        'tags'   => ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'React'],
        'line'   => 'var(--sky)',
        'ico_bg' => 'rgba(75,159,214,0.1)',
        'ico_bd' => 'rgba(75,159,214,0.2)',
    ],
    [
        'icon'   => '{ }',
        'title'  => 'Software Development',
        'desc'   => 'Writing clean, efficient code for desktop tools, CLI utilities, bots and automation — solving real problems.',
        'tags'   => ['Python', 'C++', 'Node.js', 'APIs', 'Git', 'Linux'],
        'line'   => 'var(--amber)',
        'ico_bg' => 'rgba(244,169,53,0.1)',
        'ico_bd' => 'rgba(244,169,53,0.2)',
    ],
    [
        'icon'   => '&#9654;',
        'title'  => 'Video Editing',
        'desc'   => 'Crafting cinematic cuts, branded YouTube content, short-form reels and polished promo videos.',
        'tags'   => ['Premiere Pro', 'After Effects', 'DaVinci', 'CapCut', 'Color Grading'],
        'line'   => 'var(--coral)',
        'ico_bg' => 'rgba(232,87,59,0.1)',
        'ico_bd' => 'rgba(232,87,59,0.2)',
    ],
    [
        'icon'   => '&#9998;',
        'title'  => 'Blog Writing',
        'desc'   => 'Clear, well-researched technical blogs, tutorials and SEO articles that help developers.',
        'tags'   => ['Technical Writing', 'SEO', 'Tutorials', 'Reviews', 'Dev Guides'],
        'line'   => 'var(--amber)',
        'ico_bg' => 'rgba(244,169,53,0.08)',
        'ico_bd' => 'rgba(244,169,53,0.18)',
    ],
    [
        'icon'   => '&#9670;',
        'title'  => 'UI / UX Design',
        'desc'   => 'Designing clean, purposeful interfaces. I care about how it looks and how it feels to use.',
        'tags'   => ['Figma', 'Wireframes', 'Prototypes', 'Design Systems'],
        'line'   => 'var(--sky)',
        'ico_bg' => 'rgba(75,159,214,0.08)',
        'ico_bd' => 'rgba(75,159,214,0.18)',
    ],
    [
        'icon'   => '&#128451;',
        'title'  => 'Database & Backend',
        'desc'   => 'Designing schemas, writing optimised queries and building APIs that are fast, secure and maintainable.',
        'tags'   => ['MySQL', 'MongoDB', 'REST APIs', 'PHP', 'Laravel basics'],
        'line'   => 'var(--sage)',
        'ico_bg' => 'rgba(90,138,111,0.1)',
        'ico_bd' => 'rgba(90,138,111,0.2)',
    ],
];

$testimonials = [
    ['text'=>'The website he built for our startup was better than anything I could have imagined. Delivered on time, communicated clearly throughout.','name'=>'Rahul Mehta','role'=>'Startup Founder','initials'=>'RM','stars'=>5],
    ['text'=>'Our YouTube channel grew threefold after he edited our content. He has a real feel for pacing and story — not just cutting clips.','name'=>'Priya Singh','role'=>'Content Creator','initials'=>'PS','stars'=>5],
    ['text'=>'Every blog post was well-researched, readable and ranked. He gets the brief, delivers on time and needs almost no revisions.','name'=>'Amit Kumar','role'=>'Tech Blog Owner','initials'=>'AK','stars'=>5],
];

$services = [
    ['&#128187;','Web Development',  'Custom sites, web apps, dashboards','From &#8377;5,000'],
    ['&#9881;',  'Software Dev',     'Desktop tools, bots, automation',    'From &#8377;8,000'],
    ['&#9654;',  'Video Editing',    'YouTube, reels, brand promos',        'From &#8377;2,000'],
    ['&#9998;',  'Blog Writing',     'SEO articles & technical posts',      'From &#8377;500/post'],
];

$hobbies = [
    ['icon'=>'&#127918;','title'=>'Gaming','desc'=>'Strategy and open-world games when I need to decompress.'],
    ['icon'=>'&#128247;','title'=>'Photography','desc'=>'Landscapes, candid shots and experimenting with lighting.'],
    ['icon'=>'&#127925;','title'=>'Music','desc'=>'Lo-fi while I code. Occasionally learn guitar chords.'],
    ['icon'=>'&#128218;','title'=>'Reading','desc'=>'Tech books, sci-fi novels and the occasional self-help read.'],
    ['icon'=>'&#128692;','title'=>'Cycling','desc'=>'Morning rides to clear the head and stay active.'],
    ['icon'=>'&#9992;','title'=>'Travelling','desc'=>'Exploring cities, trying local food and collecting experiences.'],
    ['icon'=>'&#127859;','title'=>'Cooking','desc'=>'Weekend experiments — mostly succeeds, occasionally fails.'],
    ['icon'=>'&#129513;','title'=>'Problem Solving','desc'=>'Competitive coding and algorithm puzzles for fun.'],
];

$webProjects = [
    [
        'label'=>'&#128737;',
        'cat'=>'Security',
        'title'=>'Antivirus Dashboard',
        'desc'=>'Real-time threat monitoring with scan logs, agent management and live status reporting.',
        'tech'=>['PHP','Python','MySQL','JavaScript'],
        'bg'=>'linear-gradient(145deg,#1a2840,#243558)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>The Antivirus Dashboard is a security-focused admin panel that aggregates threat intelligence from server agents. It displays critical vulnerabilities, CPU/RAM usage of server endpoints, and live file scan logs.</p><h3>Key Features</h3><ul><li><strong>Real-time Logs:</strong> Renders active scans dynamically as they occur on the endpoint systems.</li><li><strong>Agent Status Mapping:</strong> Visual representation of all active and offline local network agents.</li><li><strong>Action Center:</strong> Quarantine files or trigger immediate scans directly from the browser.</li></ul><h3>Tech Stack</h3><p>Built with PHP for session handling and data management, Python for system-level scanner agents, MySQL for log persistence, and pure CSS for smooth transitions.</p>'
    ],
    [
        'label'=>'&#128722;',
        'cat'=>'E-Commerce',
        'title'=>'Online Store Platform',
        'desc'=>'Full-stack shop with product management, cart, checkout flow and admin control panel.',
        'tech'=>['PHP','MySQL','JavaScript','CSS'],
        'bg'=>'linear-gradient(145deg,#1e2840,#2a3555)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A full-featured e-commerce ecosystem built from scratch. It supports user profiles, responsive catalog browsing, persistent cart storage, check-out simulation, and a dedicated administrator interface.</p><h3>Key Features</h3><ul><li><strong>Inventory Control:</strong> Management panel to add, edit, and delete products, categories, and inventory.</li><li><strong>Cart System:</strong> Dynamic local storage fallback cart that syncs when the user logs in.</li><li><strong>Secure Checkout:</strong> Encrypted user authentication and simulated payment integration.</li></ul><h3>Tech Stack</h3><p>Powered by raw PHP and MySQL, styled with modern Vanilla CSS including custom flex layouts and custom variables for the shopping interface.</p>'
    ],
    [
        'label'=>'&#128202;',
        'cat'=>'Dashboard',
        'title'=>'Analytics Dashboard',
        'desc'=>'Interactive data visualisation with real-time charts, filters and CSV export.',
        'tech'=>['JavaScript','Chart.js','PHP','CSS'],
        'bg'=>'linear-gradient(145deg,#1c2a3e,#253650)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A lightweight, interactive client-side dashboard that converts CSV exports and database queries into actionable visual charts.</p><h3>Key Features</h3><ul><li><strong>Dynamic Charts:</strong> Custom bar, line, and doughnut charts showing business telemetry.</li><li><strong>Filtering Options:</strong> Segment records by custom dates, categories, and region.</li><li><strong>Data Exports:</strong> Export parsed dashboards back into clean CSV/PDF files instantly.</li></ul><h3>Tech Stack</h3><p>Developed using Chart.js, HTML5, Vanilla JavaScript, and backend API integration using PHP.</p>'
    ],
    [
        'label'=>'&#128221;',
        'cat'=>'CMS',
        'title'=>'Custom Blog CMS',
        'desc'=>'Blog management with rich-text editing, categories, tags and basic SEO tooling.',
        'tech'=>['PHP','MySQL','TinyMCE','JavaScript'],
        'bg'=>'linear-gradient(145deg,#1e2e28,#283e33)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>An intuitive content management system built to ease technical writing. It features an integrated WYSIWYG editor and instant SEO health analysis.</p><h3>Key Features</h3><ul><li><strong>Rich Text Editing:</strong> Integration with TinyMCE for editing layout blocks, images, and formatting code.</li><li><strong>Tag & Category Indexing:</strong> Dynamic organization and search indices optimized for search engines.</li><li><strong>SEO Checklist:</strong> Analyzes keyword density, descriptions, and tag structures before publishing.</li></ul><h3>Tech Stack</h3><p>Written using PHP and MySQL backend, combined with JS dynamic tags styling.</p>'
    ],
    [
        'label'=>'&#128274;',
        'cat'=>'Security',
        'title'=>'PHP Security Toolkit',
        'desc'=>'Reusable library covering SQL injection, XSS, CSRF protection and input sanitisation.',
        'tech'=>['PHP','MySQL','Composer'],
        'bg'=>'linear-gradient(145deg,#1a2535,#243048)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A reusable, plug-and-play middleware package for legacy PHP applications that mitigates the top OWASP security vulnerabilities.</p><h3>Key Features</h3><ul><li><strong>SQL Injection Shield:</strong> Automated parameter wrapping for standard queries.</li><li><strong>XSS Filter:</strong> Strict sanitization of user-submitted forms and output encoders.</li><li><strong>CSRF Token Generator:</strong> Automatic session validation tokens injected into HTML form tags.</li></ul><h3>Tech Stack</h3><p>Coded in PHP, distributed as a Composer package for simple dependency installation.</p>'
    ],
];

$softProjects = [
    [
        'label'=>'&#129302;',
        'cat'=>'Automation',
        'title'=>'Python Scraper &amp; Bot',
        'desc'=>'Automated scraper and notification bot for data collection, scheduling and reporting.',
        'tech'=>['Python','Selenium','BeautifulSoup','API'],
        'bg'=>'linear-gradient(145deg,#221830,#2e2040)',
        'live'=>'',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A headless script designed to monitor target websites for specific updates, scrape critical elements, and send instant alerts to Discord or Telegram channels.</p><h3>Key Features</h3><ul><li><strong>Dynamic Scraping:</strong> Selenium drivers handle JavaScript-heavy websites and cloudflare bypasses.</li><li><strong>Rate Limiting:</strong> Intelligent scheduling to prevent IP bans.</li><li><strong>Instant Alerts:</strong> Webhook triggers immediately upon detecting target keywords or price drops.</li></ul><h3>Tech Stack</h3><p>Coded in Python using BeautifulSoup, Selenium, and webhook APIs.</p>'
    ],
    [
        'label'=>'&#128296;',
        'cat'=>'CLI Tool',
        'title'=>'Dev Toolbox CLI',
        'desc'=>'Command-line utility for repetitive dev tasks — scaffolding, env setup and deployment helpers.',
        'tech'=>['Python','Click','Rich','Shell'],
        'bg'=>'linear-gradient(145deg,#182030,#20283e)',
        'live'=>'',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A lightweight command-line tool built to accelerate local environment bootstrap tasks, git branch cleaners, and static site compiler scripts.</p><h3>Key Features</h3><ul><li><strong>Quick Scaffolding:</strong> Create templates for HTML/CSS or PHP structures instantly.</li><li><strong>Git Helper:</strong> Cleans up merged local branches and formats standardized commits.</li><li><strong>Rich Output:</strong> Console formatting using coloring, progress bars, and custom logs.</li></ul><h3>Tech Stack</h3><p>Built with Python, Click, and Rich libraries, packaged as a globally executable terminal command.</p>'
    ],
    [
        'label'=>'&#128241;',
        'cat'=>'Mobile',
        'title'=>'Task Manager App',
        'desc'=>'Simple cross-platform task manager with offline support, categories and due-date reminders.',
        'tech'=>['Flutter','Dart','SQLite'],
        'bg'=>'linear-gradient(145deg,#181c2e,#202538)',
        'live'=>'https://github.com/Lamsterla',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A cross-platform task manager designed to prioritize focus. Offers offline sync with a robust local database and smart grouping.</p><h3>Key Features</h3><ul><li><strong>Offline Mode:</strong> Fully operational without network connection using local database caches.</li><li><strong>Reminders:</strong> Local system push alerts mapped to custom priority tags.</li><li><strong>Statistics:</strong> Weekly charts showing finished tasks and productivity peaks.</li></ul><h3>Tech Stack</h3><p>Written in Flutter using Dart, with SQLite for local relational database storing.</p>'
    ],
    [
        'label'=>'&#128196;',
        'cat'=>'API',
        'title'=>'REST API Backend',
        'desc'=>'Modular REST API with JWT auth, rate limiting, caching and full OpenAPI documentation.',
        'tech'=>['Node.js','Express','MongoDB','JWT'],
        'bg'=>'linear-gradient(145deg,#182015,#20281e)',
        'live'=>'',
        'github'=>'https://github.com/Lamsterla',
        'readme'=>'<h3>About the Project</h3><p>A production-ready REST API backend designed with enterprise patterns, supporting standard database integrations and OpenAPI descriptors.</p><h3>Key Features</h3><ul><li><strong>JWT Authentication:</strong> Secure token-based access with sliding expiration and refresh tokens.</li><li><strong>Rate Limiting:</strong> Middleware blocking spam and automated scraping bots.</li><li><strong>Self-Documenting:</strong> Swagger UI panel generated automatically from controller annotations.</li></ul><h3>Tech Stack</h3><p>Engineered using Node.js, Express, MongoDB, and JSON Web Tokens.</p>'
    ],
];

$videos = [
    [
        'title'=>'YouTube Channel Reel',
        'cat'=>'YouTube',
        'desc'=>'Long-form and short-form edits for a tech education channel — 50k+ views.',
        'tools'=>['Premiere Pro','After Effects'],
        'bg'=>'linear-gradient(160deg,#281840,#382050)',
        'label'=>'&#9654;',
        'readme'=>'<h3>YouTube Channel Reel</h3><p>Detailed editing work showing motion tracking, sound design, color correction, and pacing tailored to modern tech education.</p>'
    ],
    [
        'title'=>'Brand Promo Ad',
        'cat'=>'Commercial',
        'desc'=>'30-second product promo with motion graphics, colour grade and VO mixing.',
        'tools'=>['Premiere Pro','Audacity'],
        'bg'=>'linear-gradient(160deg,#1e2800,#2a3800)',
        'label'=>'&#9654;',
        'readme'=>'<h3>Brand Promo Ad</h3><p>Commercial marketing campaign video. Key tasks: audio mastering, dynamic range mixing, text animation overlays, and color grading.</p>'
    ],
    [
        'title'=>'Travel Highlights',
        'cat'=>'Cinematic',
        'desc'=>'Cinematic travel reel with J-cuts, LUT colour grading and ambient sound design.',
        'tools'=>['DaVinci Resolve','Audacity'],
        'bg'=>'linear-gradient(160deg,#002028,#002c38)',
        'label'=>'&#9654;',
        'readme'=>'<h3>Travel Highlights</h3><p>A highly stylized cinematic piece utilizing advanced LUTs, jump cuts, visual sound effects mapping, and slow-motion frame interpolation.</p>'
    ],
    [
        'title'=>'Social Media Reels',
        'cat'=>'Short Form',
        'desc'=>'Batch-edited vertical reels with captions, transitions and platform-native feel.',
        'tools'=>['CapCut','Premiere Pro'],
        'bg'=>'linear-gradient(160deg,#280010,#380018)',
        'label'=>'&#9654;',
        'readme'=>'<h3>Social Media Reels</h3><p>Vertical formatted content optimization, automated subtitle synchronization, high retention editing hooks, and trendy motion transitions.</p>'
    ],
    [
        'title'=>'Event Coverage',
        'cat'=>'Event',
        'desc'=>'Multi-camera corporate event highlights edited to a 3-minute deliverable.',
        'tools'=>['Premiere Pro','After Effects'],
        'bg'=>'linear-gradient(160deg,#201800,#302200)',
        'label'=>'&#9654;',
        'readme'=>'<h3>Event Coverage</h3><p>Three-camera synchronization, multicam audio nesting, sound cleaning, color matching, and client feedback integration cycles.</p>'
    ],
];

