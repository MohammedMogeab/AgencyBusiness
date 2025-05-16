<footer class="footer">
  <div class="footer-container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="/" class="footer-logo">
          <!-- <img src="./assets/images/logo.png" alt="Zetrix Logo" class="logo-img"> -->
          <span class="logo-text">Zetrix</span>
        </a>
        <p class="footer-text">
          Zetrix is a creative company focused on building long-term relationships and delivering innovative digital solutions.
        </p>
        <div class="social-links">
          <a href="#" class="social-link" aria-label="Facebook">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
          <a href="#" class="social-link" aria-label="Twitter">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
          <a href="#" class="social-link" aria-label="Instagram">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
          <a href="#" class="social-link" aria-label="LinkedIn">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </div>
      </div>

      <div class="footer-links">
        <div class="footer-links-group">
          <h3 class="footer-title">Quick Links</h3>
          <ul class="footer-list">
            <li><a href="/" class="footer-link">Home</a></li>
            <li><a href="/about" class="footer-link">About Us</a></li>
            <li><a href="/portfolio" class="footer-link">Portfolio</a></li>
            <li><a href="/blog" class="footer-link">Blog</a></li>
            <li><a href="/contact" class="footer-link">Contact</a></li>
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
          <ul class="footer-list contact-list">
            <li>
              <ion-icon name="location-outline"></ion-icon>
              <span>123 Business Street, Suite 100<br>New York, NY 10001</span>
            </li>
            <li>
              <ion-icon name="mail-outline"></ion-icon>
              <a href="mailto:info@zetrix.com">info@zetrix.com</a>
            </li>
            <li>
              <ion-icon name="call-outline"></ion-icon>
              <a href="tel:+1234567890">+1 (234) 567-890</a>
            </li>
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
  background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
  color: var(--white);
  padding: 80px 0 30px;
  position: relative;
  font-family: 'Manrope', sans-serif;
}

.footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
}

.footer-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 24px;
}

.footer-top {
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
  justify-content: space-between;
  margin-bottom: 60px;
}

.footer-brand {
  max-width: 380px;
}

.footer-logo {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  margin-bottom: 24px;
}

.logo-img {
  height: 40px;
  width: auto;
}

.logo-text {
  font-size: 1.5rem;
  font-weight: 800;
  color: #f50303;
  letter-spacing: -0.5px;
}

.footer-text {
  color: rgba(255, 255, 255, 0.9);
  line-height: 1.7;
  margin-bottom: 28px;
  font-size: 1.05rem;
}

.social-links {
  display: flex;
  gap: 16px;
}

.social-link {
  width: 42px;
  height: 42px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--white);
  font-size: 1.3rem;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.social-link::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  opacity: 0;
  transition: opacity 0.3s ease;
}

.social-link:hover {
  transform: translateY(-4px);
}

.social-link:hover::before {
  opacity: 1;
}

.social-link ion-icon {
  position: relative;
  z-index: 1;
}

.footer-links {
  display: flex;
  gap: 60px;
  flex: 1;
  flex-wrap: wrap;
  justify-content: space-between;
}

.footer-links-group {
  min-width: 200px;
}

.footer-title {
  color: var(--white);
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 24px;
  letter-spacing: 0.5px;
  position: relative;
  padding-bottom: 12px;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 40px;
  height: 3px;
  background: rgba(255, 255, 255, 0.3);
  border-radius: 3px;
}

.footer-list {
  list-style: none;
  padding: 0;
}

.footer-list li {
  margin-bottom: 14px;
  display: flex;
  align-items: flex-start;
  gap: 12px;
  color: rgba(255, 255, 255, 0.9);
  font-size: 1.05rem;
}

.footer-link {
  color: rgba(255, 255, 255, 0.9);
  text-decoration: none;
  transition: all 0.3s ease;
  position: relative;
  padding-left: 0;
}

.footer-link::before {
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 0;
  height: 1px;
  background: var(--white);
  transition: width 0.3s ease;
}

.footer-link:hover {
  color: var(--white);
  padding-left: 8px;
}

.footer-link:hover::before {
  width: 100%;
}

.contact-list li {
  display: flex;
  align-items: flex-start;
  gap: 12px;
}

.contact-list ion-icon {
  font-size: 1.3rem;
  color: var(--white);
  margin-top: 2px;
}

.contact-list a {
  color: rgba(255, 255, 255, 0.9);
  text-decoration: none;
  transition: color 0.3s ease;
}

.contact-list a:hover {
  color: var(--white);
}

.footer-bottom {
  padding-top: 30px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}

.copyright {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1rem;
}

.footer-bottom-links {
  display: flex;
  gap: 24px;
  list-style: none;
  padding: 0;
}

.footer-bottom-links a {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  transition: all 0.3s ease;
  font-size: 1rem;
  position: relative;
}

.footer-bottom-links a::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 1px;
  background: var(--white);
  transition: width 0.3s ease;
}

.footer-bottom-links a:hover {
  color: var(--white);
}

.footer-bottom-links a:hover::after {
  width: 100%;
}

@media (max-width: 1200px) {
  .footer-top {
    gap: 40px;
  }
  .footer-links {
    gap: 40px;
  }
}

@media (max-width: 991px) {
  .footer {
    padding: 60px 0 24px;
  }
  .footer-top {
    flex-direction: column;
    gap: 40px;
  }
  .footer-brand {
    max-width: 100%;
  }
  .footer-links {
    width: 100%;
    justify-content: flex-start;
  }
}

@media (max-width: 768px) {
  .footer-container {
    padding: 0 20px;
  }
  .footer-links {
    flex-direction: column;
    gap: 30px;
  }
  .footer-links-group {
    min-width: 100%;
  }
  .footer-bottom {
    flex-direction: column;
    text-align: center;
    gap: 16px;
  }
  .footer-bottom-links {
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .footer {
    padding: 50px 0 20px;
  }
  .footer-container {
    padding: 0 16px;
  }
  .logo-text {
    font-size: 1.3rem;
  }
  .logo-img {
    height: 32px;
  }
  .footer-text {
    font-size: 1rem;
  }
  .social-link {
    width: 38px;
    height: 38px;
    font-size: 1.2rem;
  }
}
</style>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>