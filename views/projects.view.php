<?php require('partials/header.php') ?>

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
  <link rel="stylesheet" href="../assets/css/base.css">
  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="../assets/css/pages/projects.css">
  <style>
    .projects-header {
      background: var(--primary-color);
      color: var(--white);
      padding: 60px 0 30px;
      text-align: center;
      margin-bottom: 40px;
    }
    
    .projects-header h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }
    
    .projects-header p {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
    }

    .container-filter {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 30px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .filter-search {
      position: relative;
      margin-bottom: 15px;
    }

    .input-search {
      width: 100%;
      padding: 12px 20px 12px 45px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .input-search:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      outline: none;
    }

    .icon-search {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #64748b;
    }

    .filter-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .filtes-categrio {
      display: flex;
      gap: 15px;
    }

    .options-filter-language select,
    .options-filter-type select,
    .options-filter-status select {
      padding: 10px 15px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-size: 0.95rem;
      min-width: 150px;
      background-color: white;
      cursor: pointer;
    }

    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      padding: 20px 0;
      max-width: 1200px;
      margin: 0 auto;
    }

    .project-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      min-height: 420px;
      display: flex;
      flex-direction: column;
      border: 1px solid #e2e8f0;
      padding-bottom: 10px;
    }

    .project-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .project-image {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-bottom: 1px solid #e2e8f0;
    }

    .project-content {
      padding: 15px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .tags {
      display: flex;
      gap: 6px;
      flex-wrap: wrap;
    }

    .tag {
      padding: 4px 10px;
      border-radius: 15px;
      font-size: 0.75rem;
      font-weight: 500;
      white-space: nowrap;
    }

    .tag.blue { background: #e0f2fe; color: #0369a1; }
    .tag.red { background: #fee2e2; color: #b91c1c; }
    .tag.green { background: #dcfce7; color: #15803d; }

    .project-title {
      font-size: 1.1rem;
      margin: 0;
      color: #1e293b;
      line-height: 1.3;
      font-weight: 600;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .project-desc {
      color: #64748b;
      margin: 0;
      line-height: 1.4;
      font-size: 0.85rem;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .project-stats {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 8px;
      margin: 8px 0;
      padding: 12px 0;
      border-top: 1px solid #e2e8f0;
      border-bottom: 1px solid #e2e8f0;
    }

    .project-stats span {
      display: flex;
      align-items: center;
      gap: 4px;
      color: #64748b;
      font-size: 0.8rem;
      white-space: nowrap;
    }

    .project-stats span span {
      color: #94a3b8;
      font-size: 0.75rem;
    }

    .project-stats ion-icon {
      font-size: 1rem;
      min-width: 16px;
    }

    .project-footer {
      display: flex;
      flex-direction: column;
      align-items: stretch;
      margin-top: auto;
      padding-top: 12px;
      gap: 8px;
    }

    .investment-info {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 2px;
      min-width: 0;
      margin-bottom: 4px;
    }

    .investment-amount {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 2px;
    }

    .investment-label {
      font-size: 0.7rem;
      color: #94a3b8;
    }

    .footer-divider {
      width: 100%;
      height: 1px;
      background: #e2e8f0;
      margin: 10px 0 8px 0;
    }

    .button-group {
      display: flex;
      gap: 8px;
      width: 100%;
    }

    .button-group button {
      flex: 1 1 0;
      padding: 8px 0;
      font-size: 0.9rem;
      background: #2563eb; /* Brand blue */
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s;
      min-width: 0;
      white-space: normal;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .button-group button:hover {
      background: #1d4ed8;
    }

    .sort-options select {
      padding: 10px 15px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-size: 0.95rem;
      min-width: 180px;
      background-color: white;
      cursor: pointer;
    }

    .price-range {
      background: white;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #e2e8f0;
    }

    .price-range label {
      display: block;
      margin-bottom: 8px;
      color: #64748b;
      font-weight: 500;
    }

    .range-inputs {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .range-inputs input {
      width: 100px;
      padding: 8px;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
    }

    .btn-apply {
      padding: 8px 15px;
      background: var(--primary-color);
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-apply:hover {
      background: var(--primary-color-dark);
    }

    .quick-view-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      background: white;
      border-radius: 12px;
      width: 90%;
      max-width: 900px;
      max-height: 90vh;
      overflow-y: auto;
      position: relative;
    }

    .close-modal {
      position: absolute;
      right: 20px;
      top: 20px;
      font-size: 24px;
      cursor: pointer;
      color: #64748b;
    }

    .modal-body {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
      padding: 30px;
    }

    .modal-body img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 8px;
    }

    .modal-details h2 {
      font-size: 1.8rem;
      margin-bottom: 15px;
      color: #1e293b;
    }

    .modal-actions {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .btn-quick-view {
      padding: 8px 15px;
      background: #f1f5f9;
      border: none;
      border-radius: 6px;
      color: #64748b;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      transition: all 0.3s ease;
    }

    .btn-quick-view:hover {
      background: #e2e8f0;
      color: #1e293b;
    }

    .btn-contact, .btn-wishlist {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-contact {
      background: var(--primary-color);
      color: white;
    }

    .btn-wishlist {
      background: #f1f5f9;
      color: #64748b;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .btn-contact:hover {
      background: var(--primary-color-dark);
    }

    .btn-wishlist:hover {
      background: #e2e8f0;
      color: #1e293b;
    }

    @media (max-width: 1200px) {
      .projects-grid {
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        padding: 20px;
      }
    }

    @media (max-width: 768px) {
      .projects-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 15px;
        padding: 15px;
      }

      .project-card {
        min-height: 380px;
      }

      .project-image {
        height: 150px;
      }

      .project-content {
        padding: 12px;
        gap: 8px;
      }

      .project-title {
        font-size: 1rem;
      }

      .project-desc {
        font-size: 0.8rem;
        -webkit-line-clamp: 2;
      }

      .project-stats {
        gap: 6px;
        padding: 8px 0;
      }

      .project-stats span {
        font-size: 0.75rem;
      }

      .project-stats ion-icon {
        font-size: 0.9rem;
      }

      .project-footer {
        gap: 6px;
        padding-top: 8px;
      }

      .button-group {
        flex-direction: column;
        gap: 6px;
      }

      .button-group button {
        font-size: 0.85rem;
        padding: 7px 0;
      }
    }

    .project-stats span ion-icon[name="trending-up-outline"] {
      color: #10b981;
    }

    .project-stats span ion-icon[name="time-outline"] {
      color: #6366f1;
    }

    .modal-actions {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .btn-invest {
      padding: 10px 20px;
      background: var(--primary-color);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-invest:hover {
      background: blue;
      transform: translateY(-2px);
      color: black;
    }

    .btn-details {
      padding: 10px 20px;
      background: #f1f5f9;
      color: #64748b;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-details:hover {
      background: #e2e8f0;
      color: #1e293b;
    }
  </style>
</head>
<body>
  <header class="projects-header">
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
        <div class="filter-controls">
          <div class="filtes-categrio">
            <div class="options-filter-language">
              <select name="language" id="filter-language">
                <option value="">Language</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Python">Python</option>
                <option value="React">React</option>
                <option value="Node.js">Node.js</option>
              </select>
            </div>
            <div class="options-filter-type">
              <select name="type" id="filter-type">
                <option value="">Type</option>
                <option value="Website">Website</option>
                <option value="Desktop">Desktop</option>
                <option value="Android">Android</option>
                <option value="iOS">iOS</option>
                <option value="Web App">Web App</option>
              </select>
            </div>
            <div class="options-filter-status">
              <select name="status" id="filter-status">
                <option value="">Status</option>
                <option value="Completed">Completed</option>
                <option value="In Progress">In Progress</option>
                <option value="Upcoming">Upcoming</option>
              </select>
            </div>
          </div>
          <div class="sort-options">
            <select name="sort" id="sort-projects">
              <option value="">Sort By</option>
              <option value="price-asc">Price: Low to High</option>
              <option value="price-desc">Price: High to Low</option>
              <option value="popularity">Most Popular</option>
              <option value="newest">Newest First</option>
              <option value="rating">Highest Rated</option>
            </select>
          </div>
        </div>
        <div class="price-range">
          <label for="price-min">Price Range:</label>
          <div class="range-inputs">
            <input type="number" id="price-min" placeholder="Min" min="0">
            <span>to</span>
            <input type="number" id="price-max" placeholder="Max" min="0">
            <button id="apply-price" class="btn-apply">Apply</button>
          </div>
        </div>
      </div>
      <div class="projects-grid" id="projectsGrid">
        <div class="project-card" data-language="JavaScript" data-type="Desktop">
          <img src="../assets/images/blog-1.jpg" alt="AI Chatting Desktop" class="project-image">
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
              <span><ion-icon name="trending-up-outline"></ion-icon> 345 <span>ROI</span></span>
              <span><ion-icon name="time-outline"></ion-icon> 12 <span>Months</span></span>
            </div>
            <div class="project-footer">
              <div class="investment-info">
                <span class="investment-amount">$3,750</span>
                <span class="investment-label">Minimum Investment</span>
              </div>
              <div class="footer-divider"></div>
              <div class="button-group">
                <button class="btn-quick-view"><ion-icon name="eye-outline"></ion-icon> Quick View</button>
                <button onclick="window.location.href='/project'">View Investment</button>
              </div>
            </div>
          </div>
        </div>
        <div class="project-card" data-language="HTML" data-type="Website">
          <img src="../assets/images/blog-1.jpg" alt="Portfolio Website" class="project-image">
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
              <span><ion-icon name="trending-up-outline"></ion-icon> 280 <span>ROI</span></span>
              <span><ion-icon name="time-outline"></ion-icon> 8 <span>Months</span></span>
            </div>
            <div class="project-footer">
              <div class="investment-info">
                <span class="investment-amount">$1,200</span>
                <span class="investment-label">Minimum Investment</span>
              </div>
              <div class="footer-divider"></div>
              <div class="button-group">
                <button class="btn-quick-view"><ion-icon name="eye-outline"></ion-icon> Quick View</button>
                <button onclick="window.location.href='/project'">View Investment</button>
              </div>
            </div>
          </div>
        </div>
        <div class="project-card" data-language="Android" data-type="Android">
          <img src="../assets/images/blog-1.jpg" alt="Mobile App" class="project-image">
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
              <span><ion-icon name="trending-up-outline"></ion-icon> 420 <span>ROI</span></span>
              <span><ion-icon name="time-outline"></ion-icon> 18 <span>Months</span></span>
            </div>
            <div class="project-footer">
              <div class="investment-info">
                <span class="investment-amount">$2,000</span>
                <span class="investment-label">Minimum Investment</span>
              </div>
              <div class="footer-divider"></div>
              <div class="button-group">
                <button class="btn-quick-view"><ion-icon name="eye-outline"></ion-icon> Quick View</button>
                <button onclick="window.location.href='/project'">View Investment</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require('partials/footer.php') ?>
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
      const status = document.getElementById('filter-status').value;
      const minPrice = parseFloat(document.getElementById('price-min').value) || 0;
      const maxPrice = parseFloat(document.getElementById('price-max').value) || Infinity;

      cards.forEach(card => {
        const title = card.querySelector('.project-title').textContent.toLowerCase();
        const desc = card.querySelector('.project-desc').textContent.toLowerCase();
        const cardLang = card.getAttribute('data-language');
        const cardType = card.getAttribute('data-type');
        const cardStatus = card.getAttribute('data-status') || 'Completed';
        const price = parseFloat(card.querySelector('.project-price').textContent.replace('$', '').replace(',', ''));

        const matchesSearch = title.includes(search) || desc.includes(search);
        const matchesLang = !lang || cardLang === lang;
        const matchesType = !type || cardType === type;
        const matchesStatus = !status || cardStatus === status;
        const matchesPrice = price >= minPrice && price <= maxPrice;

        card.style.display = (matchesSearch && matchesLang && matchesType && matchesStatus && matchesPrice) ? '' : 'none';
      });
    }
    searchInput.addEventListener('input', filterProjects);
    languageFilter.addEventListener('change', filterProjects);
    typeFilter.addEventListener('change', filterProjects);

    // Enhanced filtering and sorting functionality
    const sortSelect = document.getElementById('sort-projects');
    const statusFilter = document.getElementById('filter-status');
    const priceMin = document.getElementById('price-min');
    const priceMax = document.getElementById('price-max');
    const applyPriceBtn = document.getElementById('apply-price');

    function getProjectPrice(priceElement) {
      return parseFloat(priceElement.textContent.replace('$', '').replace(',', ''));
    }

    function getProjectStats(card) {
      const likes = parseInt(card.querySelector('.project-stats span:nth-child(3)').textContent);
      const comments = parseInt(card.querySelector('.project-stats span:nth-child(1)').textContent);
      const rating = parseInt(card.querySelector('.project-stats span:nth-child(2)').textContent);
      return { likes, comments, rating };
    }

    function sortProjects() {
      const sortValue = sortSelect.value;
      const sortedCards = [...cards].sort((a, b) => {
        const priceA = getProjectPrice(a.querySelector('.project-price'));
        const priceB = getProjectPrice(b.querySelector('.project-price'));
        const statsA = getProjectStats(a);
        const statsB = getProjectStats(b);

        switch(sortValue) {
          case 'price-asc':
            return priceA - priceB;
          case 'price-desc':
            return priceB - priceA;
          case 'popularity':
            return (statsB.likes + statsB.comments) - (statsA.likes + statsA.comments);
          case 'rating':
            return statsB.rating - statsA.rating;
          default:
            return 0;
        }
      });

      projectsGrid.innerHTML = '';
      sortedCards.forEach(card => projectsGrid.appendChild(card));
    }

    // Add event listeners
    sortSelect.addEventListener('change', sortProjects);
    statusFilter.addEventListener('change', filterProjects);
    applyPriceBtn.addEventListener('click', filterProjects);

    // Add quick view functionality
    function createQuickViewModal(card) {
      const modal = document.createElement('div');
      modal.className = 'quick-view-modal';
      modal.innerHTML = `
        <div class="modal-content">
          <span class="close-modal">&times;</span>
          <div class="modal-body">
            <img src="${card.querySelector('.project-image').src}" alt="${card.querySelector('.project-title').textContent}">
            <div class="modal-details">
              <h2>${card.querySelector('.project-title').textContent}</h2>
              <p>${card.querySelector('.project-desc').textContent}</p>
              <div class="modal-stats">
                ${card.querySelector('.project-stats').innerHTML}
              </div>
              <div class="investment-details">
                <h3>Investment Details</h3>
                <ul>
                  <li><strong>Minimum Investment:</strong> ${card.querySelector('.investment-amount').textContent}</li>
                  <li><strong>Expected ROI:</strong> ${card.querySelector('.project-stats span:nth-child(3)').textContent}</li>
                  <li><strong>Investment Period:</strong> ${card.querySelector('.project-stats span:nth-child(4)').textContent}</li>
                  <li><strong>Risk Level:</strong> Moderate</li>
                  <li><strong>Market Potential:</strong> High</li>
                </ul>
              </div>
              <div class="modal-actions">
                <button class="btn-invest">Invest Now</button>
                <button class="btn-details">View Full Details</button>
              </div>
            </div>
          </div>
        </div>
      `;

      document.body.appendChild(modal);
      modal.querySelector('.close-modal').onclick = () => modal.remove();
      modal.onclick = (e) => {
        if (e.target === modal) modal.remove();
      };
    }

    // Attach event listeners to all .btn-quick-view buttons in the HTML
    document.querySelectorAll('.btn-quick-view').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        // Find the closest project card
        const card = btn.closest('.project-card');
        if (card) createQuickViewModal(card);
      });
    });
  </script>
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html> 