<?php include 'assets/php/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects - Zetrix</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">
  <!-- Base CSS -->
  <link rel="stylesheet" href="./assets/css/base.css">
  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="./assets/css/pages/projects.css">
</head>
<body>
  <header class="contact-header" style="background: var(--primary-color); color: var(--white); padding: 40px 0 20px 0; text-align: center;">
    <h1>Our Projects</h1>
    <p>Browse our latest and greatest work. Use the filters to find what interests you!</p>
  </header>
  <main style="margin-top: 0;">
    <section class="section project">
      <div class="container-filter">
        <div class="filter-search">
          <input type="text" class="input-search" id="search" placeholder="Search in Projects">
          <span class="icon-search"><ion-icon name="search-outline"></ion-icon></span>
        </div>
        <div class="filtes-categrio">
          <div class="options-filter-language">
            <select name="language" id="filter-language">
              <option value="">Language</option>
              <option value="HTML">HTML</option>
              <option value="CSS">CSS</option>
              <option value="JavaScript">JavaScript</option>
              <option value="PHP">PHP</option>
            </select>
          </div>
          <div class="options-filter-type">
            <select name="type" id="filter-type">
              <option value="">Type</option>
              <option value="Website">Website</option>
              <option value="Desktop">Desktop</option>
              <option value="Android">Android</option>
            </select>
          </div>
        </div>
      </div>
      <div class="projects-grid" id="projectsGrid">
        <div class="project-card" data-language="JavaScript" data-type="Desktop">
          <img src="./assets/images/blog-1.jpg" alt="AI Chatting Desktop" class="project-image">
          <div class="project-content">
            <div class="tags">
              <span class="tag blue">Development</span>
              <span class="tag red">Desktop</span>
              <span class="tag green">Project</span>
            </div>
            <h2 class="project-title">AI Chatting Desktop</h2>
            <p class="project-desc">A desktop app for chatting and moving, with fancy features and AI integration.</p>
            <div class="project-stats">
              <span><ion-icon name="chatbubble-ellipses-outline"></ion-icon> 8762 <span>Comments</span></span>
              <span><ion-icon name="star-outline"></ion-icon> 3236 <span>Rate</span></span>
              <span><ion-icon name="heart-outline"></ion-icon> 345 <span>Likes</span></span>
              <span><ion-icon name="cart-outline"></ion-icon> 567 <span>Buys</span></span>
            </div>
            <div class="project-footer">
              <span class="project-price">$3,750</span>
              <button class="btn btn-primary">View Project</button>
            </div>
          </div>
        </div>
        <div class="project-card" data-language="HTML" data-type="Website">
          <img src="./assets/images/blog-1.jpg" alt="Portfolio Website" class="project-image">
          <div class="project-content">
            <div class="tags">
              <span class="tag blue">Development</span>
              <span class="tag red">Website</span>
              <span class="tag green">Project</span>
            </div>
            <h2 class="project-title">Portfolio Website</h2>
            <p class="project-desc">A modern, responsive portfolio website built with HTML, CSS, and JavaScript.</p>
            <div class="project-stats">
              <span><ion-icon name="chatbubble-ellipses-outline"></ion-icon> 1200 <span>Comments</span></span>
              <span><ion-icon name="star-outline"></ion-icon> 950 <span>Rate</span></span>
              <span><ion-icon name="heart-outline"></ion-icon> 800 <span>Likes</span></span>
              <span><ion-icon name="cart-outline"></ion-icon> 150 <span>Buys</span></span>
            </div>
            <div class="project-footer">
              <span class="project-price">$1,200</span>
              <button class="btn btn-primary">View Project</button>
            </div>
          </div>
        </div>
        <div class="project-card" data-language="Android" data-type="Android">
          <img src="./assets/images/blog-1.jpg" alt="Mobile App" class="project-image">
          <div class="project-content">
            <div class="tags">
              <span class="tag blue">Development</span>
              <span class="tag red">Android</span>
              <span class="tag green">Project</span>
            </div>
            <h2 class="project-title">Mobile App</h2>
            <p class="project-desc">A feature-rich Android app for productivity and communication.</p>
            <div class="project-stats">
              <span><ion-icon name="chatbubble-ellipses-outline"></ion-icon> 500 <span>Comments</span></span>
              <span><ion-icon name="star-outline"></ion-icon> 300 <span>Rate</span></span>
              <span><ion-icon name="heart-outline"></ion-icon> 200 <span>Likes</span></span>
              <span><ion-icon name="cart-outline"></ion-icon> 75 <span>Buys</span></span>
            </div>
            <div class="project-footer">
              <span class="project-price">$2,000</span>
              <button class="btn btn-primary">View Project</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'assets/php/footer.php'; ?>
  <script>
    // Simple search and filter functionality
    const searchInput = document.getElementById('search');
    const languageFilter = document.getElementById('filter-language');
    const typeFilter = document.getElementById('filter-type');
    const projectsGrid = document.getElementById('projectsGrid');
    const cards = Array.from(projectsGrid.getElementsByClassName('project-card'));
    function filterProjects() {
      const search = searchInput.value.toLowerCase();
      const lang = languageFilter.value;
      const type = typeFilter.value;
      cards.forEach(card => {
        const title = card.querySelector('.project-title').textContent.toLowerCase();
        const desc = card.querySelector('.project-desc').textContent.toLowerCase();
        const cardLang = card.getAttribute('data-language');
        const cardType = card.getAttribute('data-type');
        const matchesSearch = title.includes(search) || desc.includes(search);
        const matchesLang = !lang || cardLang === lang;
        const matchesType = !type || cardType === type;
        card.style.display = (matchesSearch && matchesLang && matchesType) ? '' : 'none';
      });
    }
    searchInput.addEventListener('input', filterProjects);
    languageFilter.addEventListener('change', filterProjects);
    typeFilter.addEventListener('change', filterProjects);
  </script>
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html> 