<?php require base_path('views/partials/header.php'); ?>

<main class="blog-main">
  <!-- Hero Section -->
  <section class="blog-hero">
    <div class="container">
      <h1 class="blog-hero-title">Zetrix Blog</h1>
      <p class="blog-hero-text">Insights, stories, and resources from the Zetrix team. Stay updated with the latest in tech, design, and digital innovation.</p>
    </div>
  </section>

  <!-- Blog Content Section -->
  <section class="blog-content-section">
    <div class="container blog-content-grid">
      <!-- Blog Posts Grid -->
      <div class="blog-posts">
        <div class="blog-grid">
          <?php foreach($blogs as $blog): ?>

            <a href="blog-post.php?id=1" class="blog-card">
              <div class="blog-img-wrapper">
                <img src="./assets/images/blog-1.jpg" alt="Blog Post" class="blog-img">
              </div>
              <div class="blog-card-content">
                <h2 class="blog-title"><?= $blog['blog_title']?></h2>
                <p class="blog-excerpt"><?= $blog['content']?></p>
                <div class="blog-meta">
                  <span class="blog-author"><?= $blog['author']?></span>
                  <span class="blog-date"><?php  echo (new DateTime($blog['date'])->format('F j, Y')); ?></span>
                </div>
              </div>
            </a>

          <?php endforeach; ?>
          <a href="blog-post.php?id=2" class="blog-card">
            <div class="blog-img-wrapper">
              <img src="./assets/images/blog-2.jpg" alt="Blog Post" class="blog-img">
            </div>
            <div class="blog-card-content">
              <h2 class="blog-title">Design Trends to Watch</h2>
              <p class="blog-excerpt">Explore the top UI/UX design trends that are shaping the digital world and how to implement them in your projects.</p>
              <div class="blog-meta">
                <span class="blog-author">By Sara Lee</span>
                <span class="blog-date">April 18, 2024</span>
              </div>
            </div>
          </a>
          <a href="blog-post.php?id=3" class="blog-card">
            <div class="blog-img-wrapper">
              <img src="./assets/images/blog-3.jpg" alt="Blog Post" class="blog-img">
            </div>
            <div class="blog-card-content">
              <h2 class="blog-title">Building Scalable Web Apps</h2>
              <p class="blog-excerpt">A practical guide to architecting web applications that grow with your business and user base.</p>
              <div class="blog-meta">
                <span class="blog-author">By Michael Chen</span>
                <span class="blog-date">April 5, 2024</span>
              </div>
            </div>
          </a>
          <a href="blog-post.php?id=4" class="blog-card">
            <div class="blog-img-wrapper">
              <img src="./assets/images/blog-4.jpg" alt="Blog Post" class="blog-img">
            </div>
            <div class="blog-card-content">
              <h2 class="blog-title">Digital Marketing in 2024</h2>
              <p class="blog-excerpt">Learn the latest strategies and tools for effective digital marketing in a rapidly changing landscape.</p>
              <div class="blog-meta">
                <span class="blog-author">By Priya Patel</span>
                <span class="blog-date">March 22, 2024</span>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- Sidebar -->
      <aside class="blog-sidebar">
        <div class="sidebar-section">
          <h3 class="sidebar-title">Categories</h3>
          <ul class="sidebar-list">
            <li><a href="#" class="sidebar-link">All</a></li>
            <li><a href="#" class="sidebar-link">AI & Tech</a></li>
            <li><a href="#" class="sidebar-link">Design</a></li>
            <li><a href="#" class="sidebar-link">Development</a></li>
            <li><a href="#" class="sidebar-link">Marketing</a></li>
            <li><a href="#" class="sidebar-link">Company News</a></li>
          </ul>
        </div>
        <div class="sidebar-section">
          <h3 class="sidebar-title">Recent Posts</h3>
          <ul class="sidebar-list recent-posts">
            <li><a href="#" class="sidebar-link">The Future of AI in Business</a></li>
            <li><a href="#" class="sidebar-link">Design Trends to Watch</a></li>
            <li><a href="#" class="sidebar-link">Building Scalable Web Apps</a></li>
            <li><a href="#" class="sidebar-link">Digital Marketing in 2024</a></li>
          </ul>
        </div>
      </aside>
    </div>
  </section>
</main>

<style>
.blog-main {
  background: var(--background-color);
  font-family: 'Manrope', sans-serif;
}
.blog-hero {
  background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
  color: var(--white);
  padding: 120px 0 80px 0;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.blog-hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('./assets/images/pattern.svg') center/cover;
  opacity: 0.1;
}
.blog-hero-title {
  font-size: 3.2rem;
  font-weight: 800;
  margin-bottom: 20px;
  letter-spacing: 1px;
  position: relative;
}
.blog-hero-text {
  font-size: 1.3rem;
  opacity: 0.92;
  max-width: 700px;
  margin: 0 auto;
  line-height: 1.6;
}
.blog-content-section {
  background: var(--background-color);
  padding: 80px 0 70px 0;
  position: relative;
}
.blog-content-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.2), transparent);
}
.blog-content-grid {
  display: flex;
  gap: 60px;
  align-items: flex-start;
  justify-content: space-between;
  flex-wrap: wrap;
}
.blog-posts {
  flex: 2 1 600px;
}
.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 40px;
}
.blog-card {
  background: var(--white);
  border-radius: 24px;
  box-shadow: 0 4px 24px rgba(43,45,66,0.08);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: all 0.3s ease;
  position: relative;
}
.blog-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #6366f1, #f472b6);
  opacity: 0;
  transition: opacity 0.3s ease;
}
.blog-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 40px rgba(43,45,66,0.12);
}
.blog-card:hover::before {
  opacity: 1;
}
.blog-img-wrapper {
  position: relative;
  width: 100%;
  height: 220px;
  overflow: hidden;
}
.blog-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}
.blog-card:hover .blog-img {
  transform: scale(1.05);
}
.blog-card-content {
  padding: 28px 24px 24px 24px;
  flex: 1;
  display: flex;
  flex-direction: column;
  background: var(--white);
}
.blog-title {
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--primary-color);
  margin-bottom: 12px;
  line-height: 1.4;
  transition: color 0.3s ease;
}
.blog-card:hover .blog-title {
  color: var(--accent-color);
}
.blog-excerpt {
  color: var(--secondary-color);
  font-size: 1.05rem;
  line-height: 1.6;
  margin-bottom: 20px;
  flex: 1;
  opacity: 0.9;
}
.blog-meta {
  display: flex;
  align-items: center;
  gap: 20px;
  font-size: 0.95rem;
  color: var(--secondary-color);
  padding-top: 16px;
  border-top: 1px solid rgba(43,45,66,0.08);
}
.blog-author {
  display: flex;
  align-items: center;
  gap: 8px;
}
.blog-author::before {
  content: '';
  width: 6px;
  height: 6px;
  background: var(--accent-color);
  border-radius: 50%;
}
.blog-date {
  opacity: 0.8;
}
.blog-sidebar {
  flex: 1 1 280px;
  background: var(--white);
  border-radius: 24px;
  box-shadow: 0 4px 24px rgba(43,45,66,0.08);
  padding: 36px 24px 28px 24px;
  min-width: 260px;
  max-width: 340px;
  position: sticky;
  top: 100px;
}
.sidebar-section {
  margin-bottom: 36px;
}
.sidebar-section:last-child {
  margin-bottom: 0;
}
.sidebar-title {
  color: var(--primary-color);
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 20px;
  letter-spacing: 0.5px;
  position: relative;
  padding-bottom: 12px;
}
.sidebar-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 40px;
  height: 3px;
  background: linear-gradient(90deg, #6366f1, #f472b6);
  border-radius: 3px;
}
.sidebar-list {
  list-style: none;
  padding: 0;
}
.sidebar-link {
  color: var(--secondary-color);
  font-size: 1.05rem;
  display: block;
  padding: 10px 0;
  transition: all 0.3s ease;
  border-bottom: 1px solid rgba(43,45,66,0.06);
}
.sidebar-link:hover {
  color: var(--accent-color);
  transform: translateX(8px);
  border-bottom-color: var(--accent-color);
}
.recent-posts .sidebar-link {
  font-size: 1rem;
  padding: 12px 0;
}
@media (max-width: 1200px) {
  .blog-content-grid {
    gap: 40px;
  }
  .blog-sidebar {
    position: static;
    max-width: 100%;
  }
}
@media (max-width: 768px) {
  .blog-hero {
    padding: 100px 0 60px 0;
  }
  .blog-hero-title {
    font-size: 2.4rem;
  }
  .blog-hero-text {
    font-size: 1.1rem;
  }
  .blog-content-section {
    padding: 60px 0 50px 0;
  }
  .blog-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .blog-title {
    font-size: 1.3rem;
  }
}
@media (max-width: 480px) {
  .blog-hero-title {
    font-size: 2rem;
  }
  .blog-img-wrapper {
    height: 200px;
  }
  .blog-card-content {
    padding: 24px 20px 20px 20px;
  }
  .blog-meta {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }
}
</style>


<?php require base_path('views/partials/footer.php'); ?>