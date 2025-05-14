<?php include 'assets/php/header.php'; ?>

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
          <a href="blog-post.php?id=1" class="blog-card">
            <img src="./assets/images/blog-1.jpg" alt="Blog Post" class="blog-img">
            <div class="blog-card-content">
              <h2 class="blog-title">The Future of AI in Business</h2>
              <p class="blog-excerpt">Discover how artificial intelligence is transforming industries and what it means for your business in 2024 and beyond.</p>
              <div class="blog-meta">
                <span class="blog-author">By Alex Morgan</span>
                <span class="blog-date">May 1, 2024</span>
              </div>
            </div>
          </a>
          <a href="blog-post.php?id=2" class="blog-card">
            <img src="./assets/images/blog-2.jpg" alt="Blog Post" class="blog-img">
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
            <img src="./assets/images/blog-3.jpg" alt="Blog Post" class="blog-img">
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
            <img src="./assets/images/blog-4.jpg" alt="Blog Post" class="blog-img">
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
  padding: 110px 0 60px 0;
  text-align: center;
}
.blog-hero-title {
  font-size: 2.6rem;
  font-weight: 800;
  margin-bottom: 18px;
  letter-spacing: 1px;
}
.blog-hero-text {
  font-size: 1.2rem;
  opacity: 0.92;
  max-width: 600px;
  margin: 0 auto;
}
.blog-content-section {
  background: var(--background-color);
  padding: 70px 0 60px 0;
}
.blog-content-grid {
  display: flex;
  gap: 50px;
  align-items: flex-start;
  justify-content: space-between;
  flex-wrap: wrap;
}
.blog-posts {
  flex: 2 1 600px;
}
.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 32px;
}
.blog-card {
  background: var(--white);
  border-radius: 16px;
  box-shadow: 0 4px 24px rgba(43,45,66,0.10);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform 0.2s, box-shadow 0.2s;
}
.blog-card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 8px 32px rgba(43,45,66,0.13);
}
.blog-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  background: #f3f3f3;
}
.blog-card-content {
  padding: 22px 18px 18px 18px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.blog-title {
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--primary-color);
  margin-bottom: 8px;
}
.blog-excerpt {
  color: var(--secondary-color);
  font-size: 1rem;
  margin-bottom: 14px;
  flex: 1;
}
.blog-meta {
  display: flex;
  align-items: center;
  gap: 18px;
  font-size: 0.97rem;
  color: var(--secondary-color);
  margin-top: 10px;
}
.blog-sidebar {
  flex: 1 1 260px;
  background: var(--white);
  border-radius: 16px;
  box-shadow: 0 2px 12px rgba(43,45,66,0.07);
  padding: 32px 20px 24px 20px;
  min-width: 240px;
  max-width: 320px;
}
.sidebar-section {
  margin-bottom: 32px;
}
.sidebar-title {
  color: var(--primary-color);
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 16px;
  letter-spacing: 1px;
}
.sidebar-list {
  list-style: none;
  padding: 0;
}
.sidebar-link {
  color: var(--secondary-color);
  font-size: 1rem;
  display: block;
  margin-bottom: 10px;
  transition: color 0.2s, transform 0.2s;
}
.sidebar-link:hover {
  color: var(--accent-color);
  transform: translateX(5px);
}
.recent-posts .sidebar-link {
  font-size: 0.97rem;
  margin-bottom: 8px;
}
@media (max-width: 1100px) {
  .blog-content-grid {
    flex-direction: column;
    gap: 40px;
  }
  .blog-sidebar {
    max-width: 100%;
    min-width: 0;
    width: 100%;
  }
}
@media (max-width: 600px) {
  .blog-hero-title {
    font-size: 1.3rem;
  }
  .blog-content-section {
    padding: 40px 0 30px 0;
  }
}
</style>

<?php include 'assets/php/footer.php'; ?>