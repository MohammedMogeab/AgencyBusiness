<footer class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="./assets/images/logo-light.svg" width="90" height="30" alt="Zetrix home">
        </a>
        <p class="footer-text">
          Zetrix is a creative company focused on building long-term relationships and delivering innovative digital solutions.
        </p>
        <ul class="social-list">
          <li><a href="#" class="social-link" aria-label="Facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
          <li><a href="#" class="social-link" aria-label="Twitter"><ion-icon name="logo-twitter"></ion-icon></a></li>
          <li><a href="#" class="social-link" aria-label="Instagram"><ion-icon name="logo-instagram"></ion-icon></a></li>
          <li><a href="#" class="social-link" aria-label="LinkedIn"><ion-icon name="logo-linkedin"></ion-icon></a></li>
        </ul>
      </div>
      <div class="footer-links">
        <div class="footer-links-group">
          <h3 class="footer-title">Quick Links</h3>
          <ul class="footer-list">
            <li><a href="index.php" class="footer-link">Home</a></li>
            <li><a href="aboutus.php" class="footer-link">About Us</a></li>
            <li><a href="projects.php" class="footer-link">Projects</a></li>
            <li><a href="blog.php" class="footer-link">Blog</a></li>
            <li><a href="contact.php" class="footer-link">Contact</a></li>
          </ul>
        </div>
        <div class="footer-links-group">
          <h3 class="footer-title">Services</h3>
          <ul class="footer-list">
            <li><a href="#" class="footer-link">Web Development</a></li>
            <li><a href="#" class="footer-link">Mobile Apps</a></li>
            <li><a href="#" class="footer-link">UI/UX Design</a></li>
            <li><a href="#" class="footer-link">Digital Marketing</a></li>
            <li><a href="#" class="footer-link">Cloud Solutions</a></li>
          </ul>
        </div>
        <div class="footer-links-group">
          <h3 class="footer-title">Contact Info</h3>
          <ul class="footer-list">
            <li><ion-icon name="location-outline"></ion-icon><span>123 Business Street, Suite 100<br>New York, NY 10001</span></li>
            <li><ion-icon name="mail-outline"></ion-icon><a href="mailto:info@zetrix.com">info@zetrix.com</a></li>
            <li><ion-icon name="call-outline"></ion-icon><a href="tel:+1234567890">+1 (234) 567-890</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="copyright">&copy; 2024 Zetrix. All rights reserved.</p>
      <ul class="footer-bottom-links">
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Cookie Policy</a></li>
      </ul>
    </div>
  </div>
</footer>

<style>
.footer {
  background: var(--primary-color);
  color: var(--white);
  padding: 70px 0 30px;
  position: relative;
  font-family: 'Manrope', sans-serif;
}
.footer-top {
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
  justify-content: space-between;
  margin-bottom: 50px;
}
.footer-brand {
  max-width: 340px;
}
.footer-brand .logo {
  margin-bottom: 18px;
  display: inline-block;
}
.footer-text {
  color: rgba(255,255,255,0.85);
  line-height: 1.6;
  margin-bottom: 22px;
  font-size: 1rem;
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
  font-size: 1.3rem;
  transition: 0.3s;
}
.social-link:hover {
  background: var(--accent-color);
  color: var(--white);
  transform: translateY(-3px);
}
.footer-links {
  display: flex;
  gap: 50px;
  flex: 1;
  flex-wrap: wrap;
  justify-content: space-between;
}
.footer-links-group {
  min-width: 180px;
}
.footer-title {
  color: var(--white);
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 18px;
  letter-spacing: 1px;
}
.footer-list {
  list-style: none;
  padding: 0;
}
.footer-list li {
  margin-bottom: 12px;
  display: flex;
  align-items: flex-start;
  gap: 10px;
  color: rgba(255,255,255,0.85);
  font-size: 0.98rem;
}
.footer-link {
  color: rgba(255,255,255,0.85);
  transition: 0.3s;
  display: inline-block;
}
.footer-link:hover {
  color: var(--accent-color);
  transform: translateX(5px);
}
.footer-list li ion-icon {
  font-size: 1.2rem;
  color: var(--accent-color);
  margin-top: 3px;
}
.footer-bottom {
  padding-top: 30px;
  border-top: 1px solid rgba(255,255,255,0.1);
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}
.copyright {
  color: rgba(255,255,255,0.8);
  font-size: 0.98rem;
}
.footer-bottom-links {
  display: flex;
  gap: 20px;
  list-style: none;
  padding: 0;
}
.footer-bottom-links a {
  color: rgba(255,255,255,0.8);
  transition: 0.3s;
  font-size: 0.98rem;
}
.footer-bottom-links a:hover {
  color: var(--accent-color);
}
@media (max-width: 991px) {
  .footer-top {
    flex-direction: column;
    gap: 40px;
    align-items: flex-start;
  }
  .footer-links {
    flex-direction: column;
    gap: 30px;
    width: 100%;
  }
}
@media (max-width: 767px) {
  .footer {
    padding: 50px 0 20px;
  }
  .footer-top {
    gap: 30px;
  }
  .footer-links {
    gap: 20px;
  }
  .footer-bottom {
    flex-direction: column;
    gap: 12px;
    text-align: center;
  }
}
</style>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>