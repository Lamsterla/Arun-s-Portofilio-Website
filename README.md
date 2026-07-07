# Arun's Portfolio Website

A personal portfolio website for a freelance **web developer**, **video editor**, and **blog writer** based in India. Built with plain PHP, Vanilla CSS, and Vanilla JavaScript — no frameworks, no build tools. Runs directly on XAMPP / Apache.

---

## 🚀 Features

- ⚡ **Dark / Light theme** — toggle persisted via `localStorage`
- 🖱️ **Custom animated cursor** — dot + ring follower
- 🎠 **Horizontal slideshow carousels** with prev/next arrows and dot pagination
- 🌀 **Scroll-reveal animations** — elements fade and slide in on scroll
- 🔁 **Infinite marquee strip** — seamless looping skill tags
- ⌨️ **Typing animation** in hero section cycling through roles
- 📊 **Animated proficiency bars** for skills (About page)
- 📬 **PHP contact forms** — "Hire Me" brief form and general message form with server-side validation
- 📱 **Fully responsive** — hamburger menu for mobile, fluid grids
- 🔝 **Scroll-to-top** button
- 🔍 **SEO-ready** — unique `<title>`, `<meta description>`, semantic HTML on every page

---

## 📁 File Structure

```
portfolio/
├── index.php       # Home / Hero page
├── about.php       # About, skills proficiency, hobbies
├── work.php        # Projects & video work (tabbed carousel)
├── blogs.php       # Blog posts grid
├── contact.php     # Hire Me form + Contact form
├── layout.php      # Shared header (render_head, render_nav) and footer
├── data.php        # Shared PHP data arrays ($skills, $testimonials, $services, $hobbies)
├── style.css       # All styles — design tokens, components, responsive
├── script.js       # All JS — cursor, theme toggle, carousels, scroll-reveal, etc.
└── README.md       # This file
```

---

## 📄 Pages

| Page | File | Description |
|------|------|-------------|
| **Home** | `index.php` | Hero, marquee strip, skills teaser, testimonials, CTA |
| **About** | `about.php` | Bio, info grid, proficiency bars, hobbies |
| **Work** | `work.php` | Tabbed carousel: Web Projects / Software / Video Work |
| **Blog** | `blogs.php` | Blog posts grid with category, date, excerpt |
| **Contact** | `contact.php` | Hire Me brief form + general contact form, contact links |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8+ (no framework, plain `require` includes) |
| Styling | Vanilla CSS with CSS custom properties (design tokens) |
| Scripting | Vanilla JavaScript (no jQuery or libraries) |
| Database | None (static data in `data.php`) |
| Server | Apache via XAMPP |

---

## 🎨 Design System

### Color Palette

| Token | Color | Usage |
|-------|-------|-------|
| `--sky` | `#4B9FD6` | Web Dev, UI/UX cards, primary accents |
| `--amber` | `#F4A935` | Software Dev, Blog Writing cards |
| `--coral` | `#E8573B` | Video Editing cards, danger states |
| `--sage` | `#5A8A6F` | Database & Backend cards |

### Theme
- **Dark mode first** with a light mode toggle
- Glassmorphism cards with subtle border highlights
- Smooth gradient backgrounds on project thumbnails
- Micro-animations: hover lifts, card glows, pulsing availability badge

---

## ⚙️ Skills & Services (from `data.php`)

### Skills
- Web Development — HTML, CSS, JavaScript, PHP, MySQL, React
- Software Development — Python, C++, Node.js, APIs, Git, Linux
- Video Editing — Premiere Pro, After Effects, DaVinci, CapCut
- Blog Writing — Technical Writing, SEO, Tutorials, Dev Guides
- UI / UX Design — Figma, Wireframes, Prototypes
- Database & Backend — MySQL, MongoDB, REST APIs, Laravel basics

### Services & Starting Prices
| Service | Starting Price |
|---------|---------------|
| Web Development | ₹5,000 |
| Software Development | ₹8,000 |
| Video Editing | ₹2,000 |
| Blog Writing | ₹500/post |

---

## 📦 How to Run Locally

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (or any PHP-enabled local server)
- PHP 8.0 or higher

### Steps

1. **Clone or download** this project into your XAMPP `htdocs` folder:
   ```
   C:\xampp\htdocs\portfolio\
   ```

2. **Start Apache** from the XAMPP Control Panel.

3. **Open in browser:**
   ```
   http://localhost/portfolio/
   ```

That's it — no database setup, no `npm install`, no build step required.

---

## 🔧 Customisation Guide

All personal data is centralised for easy editing:

### 1. Update your info
Edit the placeholder values across the files:

| What to change | Where |
|---------------|-------|
| Your name | `index.php` line 31, `about.php` line 48 |
| Your city | `index.php` line 40, `about.php` line 49, `layout.php` line 105 |
| Your email | `about.php` line 50, `layout.php` line 102, `contact.php` line 41 |
| Your WhatsApp | `layout.php` line 103, `contact.php` line 42 |
| Social links | `layout.php` lines 70–74 |

### 2. Add your photo
Replace the placeholder `<div class="photo-placeholder">` in `index.php` with:
```html
<img src="assets/photo.jpg" alt="Your Name">
```
And in `about.php`, uncomment:
```html
<!-- <img src="assets/about.jpg" alt="About me"> -->
```

### 3. Add your resume
Place your resume PDF at `assets/resume.pdf`. The download link in `about.php` is already wired up.

### 4. Update projects and blog posts
Edit the `$webProjects`, `$softProjects`, `$videos` arrays in `work.php` and the `$blogs` array in `blogs.php`.

### 5. Update skills and testimonials
Edit `data.php` — all `$skills`, `$testimonials`, `$services`, and `$hobbies` are defined there.

---

## 📬 Contact Form

The contact forms in `contact.php` use PHP `$_POST` handling with `htmlspecialchars` input sanitisation. Currently they display a success message on submission.

To send actual emails, replace the success block in `contact.php` with PHP `mail()` or a service like [PHPMailer](https://github.com/PHPMailer/PHPMailer):

```php
mail($to, $subject, $message, "From: $email");
```

---

## 📸 Screenshots

> Add screenshots of your live site here once deployed.

---

## 📜 License

This project is for personal portfolio use. Feel free to use it as a template — credit appreciated but not required.

---

## 👤 Author

**Your Name**
- 📧 your@email.com
- 💼 [LinkedIn](https://linkedin.com)
- 🐙 [GitHub](https://github.com)
- 📍 Your City, India
