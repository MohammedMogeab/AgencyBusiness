<!-- header.php -->
<link rel="stylesheet" href="./assets/css/base.css">
<!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
<header class="header" data-header>
  <div class="container">
    <a href="index.php" class="logo">
      <img src="./assets/images/logo-light.svg" width="90" height="30" alt="Zetrix home" class="logo-light">
      <img src="./assets/images/logo-dark.svg" width="90" height="30" alt="Zetrix home" class="logo-dark">
    </a>

    <nav class="navbar" data-navbar>
      <div class="navbar-top">
        <a href="index.php" class="logo">
          <img src="./assets/images/logo-light.svg" width="90" height="30" alt="Zetrix home">
        </a>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>

      <ul class="navbar-list">
        <li>
          <a href="index.php" class="navbar-link">Home</a>
        </li>

        <li>
          <a href="aboutus.php" class="navbar-link">About</a>
        </li>

        <li>
          <a href="projects.php" class="navbar-link">Projects</a>
        </li>

        <li>
          <a href="blog.php" class="navbar-link">Blog</a>
        </li>

        <li>
          <a href="contact.php" class="navbar-link">Contact</a>
        </li>
      </ul>

      <div class="navbar-contact">
        <a href="mailto:info@zetrix.com" class="contact-link">
          <ion-icon name="mail-outline"></ion-icon>
          <span>info@zetrix.com</span>
        </a>

        <a href="tel:+1234567890" class="contact-link">
          <ion-icon name="call-outline"></ion-icon>
          <span>+1 (234) 567-890</span>
        </a>
      </div>

      <ul class="social-list">
        <li>
          <a href="#" class="social-link" aria-label="Facebook">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link" aria-label="Twitter">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link" aria-label="Instagram">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link" aria-label="LinkedIn">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>
      </ul>
    </nav>

    <div class="header-actions">
      <a href="/login" class="btn btn-outline">Login</a>
      <a href="signup" class="btn btn-primary">Sign Up</a>
    </div>

    <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
      <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
    </button>

    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>
</header>

<style>
.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background: var(--white);
  padding: 20px 0;
  z-index: 1000;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  transition: 0.3s ease;
}

.header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  display: block;
  transition: 0.3s ease;
}

.logo:hover {
  transform: scale(1.05);
}

.navbar {
  position: fixed;
  top: 0;
  right: -350px;
  width: 350px;
  height: 100vh;
  background: var(--primary-color);
  padding: 30px;
  transition: 0.3s ease;
  z-index: 1001;
  box-shadow: 0 2px 10px rgba(0,0,0,0.12);
}

.navbar.active {
  right: 0;
}

.navbar-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}

.nav-close-btn {
  background: transparent;
  border: none;
  color: var(--white);
  font-size: 24px;
  cursor: pointer;
}

.navbar-list {
  margin-bottom: 30px;
}

.navbar-link {
  display: block;
  color: var(--white);
  font-size: 1.1rem;
  padding: 10px 0;
  transition: 0.3s ease;
  font-weight: 600;
}

.navbar-link:hover {
  color: var(--accent-color);
  transform: translateX(5px);
}

.navbar-contact {
  margin-bottom: 30px;
}

.contact-link {
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--white);
  margin-bottom: 10px;
  transition: 0.3s ease;
}

.contact-link:hover {
  color: var(--accent-color);
}

.social-list {
  display: flex;
  gap: 15px;
}

.social-link {
  width: 40px;
  height: 40px;
  background: rgba(255,255,255,0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--white);
  transition: 0.3s ease;
  font-size: 1.2rem;
}

.social-link:hover {
  background: var(--accent-color);
  color: var(--white);
  transform: translateY(-3px);
}

.header-actions {
  display: flex;
  gap: 15px;
}

.btn {
  padding: 10px 24px;
  border-radius: 30px;
  font-weight: 700;
  font-size: 1rem;
  transition: 0.3s ease;
}

.btn-outline {
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  background: transparent;
}

.btn-outline:hover {
  background: var(--primary-color);
  color: var(--white);
}

.btn-primary {
  background: var(--accent-color);
  color: var(--white);
  border: none;
}

.btn-primary:hover {
  background: var(--primary-color);
  color: var(--white);
  transform: translateY(-2px);
}

.nav-open-btn {
  display: none;
  background: transparent;
  border: none;
  color: var(--primary-color);
  font-size: 24px;
  cursor: pointer;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  opacity: 0;
  visibility: hidden;
  transition: 0.3s ease;
  z-index: 1000;
}

.overlay.active {
  opacity: 1;
  visibility: visible;
}

@media (max-width: 991px) {
  .nav-open-btn {
    display: block;
  }
  
  .navbar {
    right: -100%;
    width: 100%;
    max-width: 400px;
  }
  
  .navbar.active {
    right: 0;
  }
}

@media (max-width: 575px) {
  .header-actions {
    display: none;
  }
  
  .navbar {
    width: 100%;
    max-width: 100vw;
  }
  
  .logo img {
    width: 70px;
    height: auto;
  }
}
</style>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<div style="height: 50px;"></div>