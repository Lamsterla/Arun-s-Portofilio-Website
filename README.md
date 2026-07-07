<<<<<<< HEAD
# Arun's Portfolio Website
=======
# 🌐 Arun Sah's Portfolio
>>>>>>> 9b89f33 (updated file)

A premium, responsive portfolio website built to showcase my freelance work and establish a professional social presence as a **Web Developer**, **Software Developer**, **Video Editor**, and **Technical Writer** based in India.

Built using native technologies: plain PHP 8+, Vanilla CSS, and Vanilla JavaScript. It is designed to run directly on Apache (via XAMPP) without requiring heavy dependencies, build processes, or frameworks.

---

## 🚀 Key Features

- 🌓 **Dynamic Theme Toggle** — Seamless Dark/Light mode switcher with persistence via `localStorage`.
- 🖱️ **Interactive Custom Cursor** — Smooth fluid cursor follower dot and ring.
- Carousel component for project layouts with dots & arrow pagination.
- 🌀 **Scroll-Reveal Animations** — Fluid fade-in and slide-in transition effects on scroll.
- 🔁 **Marquee Strip** — Infinite looping marquee highlighting technical capabilities.
- ⌨️ **Dynamic Typing Hero** — Micro-animated typing effect cycling through professional roles.
- 📊 **Animated Skill Proficiency Bars** — Dynamic visual bars representing skill levels.
- 📬 **PHP Contact Forms** — A general contact form and "Hire Me" brief form with server-side validation.
- 🤖 **Interactive AI Twin** — A client-side simulated AI twin that chats with visitors, answering questions about my experience, tech stack, and freelance services.
- 🔍 **SEO & Accessibility Optimised** — Semantic tags, distinct pages titles, meta-descriptions, and structured head elements.

---

## 📁 Project Structure

```
portfolio/
├── index.php         # Home / Hero page & dynamic summaries
├── about.php         # Bio, experience info grid, and hobby cards
├── work.php          # Interactive, tabbed project showcase (Web, Software, Video Editing)
├── blogs.php         # Articles grid with categorization and search keywords
├── contact.php       # Hire Me & standard contact form submissions
├── layout.php        # Core header/footer shell, navigation, and .env parser
├── data.php          # Centralized data model arrays (skills, hobbies, reviews)
├── style.css         # Styling system (css variables, design tokens, and components)
├── script.js         # Interactive triggers (carousel, cursor, animations)
├── ai.php            # AI Twin chatbot interface
├── ai-style.css      # Chat interface styling
├── ai-script.js      # Chat logic & automated keyword responder
└── README.md         # This readme file
```

---

## 🛠️ Technology Stack

| Layer | Technical Details |
|---|---|
| **Backend** | PHP 8.0+ (No framework dependencies; modular components via `require`) |
| **Frontend** | Vanilla JavaScript (ES6+), Vanilla CSS (Flexbox, Grid, Custom Properties) |
| **Local Environment** | Apache / MySQL via XAMPP |
| **API / Services** | Localized `.env` configuration, client-side data binding |

---

## ⚙️ Configuration & Environment Settings

All personal info and links are dynamically configured via a `.env` file at the project root:

### 1. Set Up Environment Variables
Create a file named `.env` in the root folder (using `.env.example` as a starting point) and add your details:

```env
PORTFOLIO_NAME="Arun Sah"
PORTFOLIO_CITY="India"
PORTFOLIO_EMAIL="arunkumar90853@gmail.com"
PORTFOLIO_WHATSAPP="+91 XXXXX XXXXX"
PORTFOLIO_WHATSAPP_URL="https://wa.me/91XXXXXXXXXX"
PORTFOLIO_GITHUB_URL="https://github.com/Lamsterla"
PORTFOLIO_LINKEDIN_URL="https://www.linkedin.com/in/arun-sah-7b7246313"
PORTFOLIO_INSTAGRAM_URL="https://www.instagram.com/sah_arun_kumar"
```

### 2. Add Personal Assets
- **Resume**: Save your PDF file as `assets/resume.pdf` to make the **Download Resume** button functional.
- **Hero Image**: Replace the placeholder `<div class="photo-placeholder">` in `index.php` with:
  ```html
  <img src="assets/photo.jpg" alt="Arun Sah">
  ```
- **About Page Image**: Uncomment the image tag in `about.php`:
  ```html
  <img src="assets/about.jpg" alt="Arun Sah">
  ```

---

## 💻 Running the Site Locally

1. Install and start [XAMPP](https://www.apachefriends.org/).
2. Clone or copy this repository into your XAMPP's `htdocs` folder:
   ```bash
   C:\xampp\htdocs\portfolio\
   ```
3. Open your browser and navigate to:
   ```
   http://localhost/portfolio/
   ```
4. Verify that the server resolves the local path and imports configurations correctly.

---

## 👤 Author & Social Presence

If you'd like to get in touch or check out my work across platforms, connect with me here:

- 📧 **Email**: [arunkumar90853@gmail.com](mailto:arunkumar90853@gmail.com)
- 💼 **LinkedIn**: [Arun Sah on LinkedIn](https://www.linkedin.com/in/arun-sah-7b7246313)
- 🐙 **GitHub**: [@Lamsterla on GitHub](https://github.com/Lamsterla)
- 📸 **Instagram**: [@sah_arun_kumar](https://www.instagram.com/sah_arun_kumar)
- 📍 **Location**: India
