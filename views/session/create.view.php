<?php require base_path('views/partials/header.php') ?>

<main class="auth-main">
  <section class="auth-section">
    <div class="auth-card glass">
      <a href="index.php" class="auth-logo">
        <!-- <img src="./assets/images/logo-light.svg" alt="Zetrix Logo" width="80" height="30"> -->
      </a>
      <h2 class="auth-title">Welcome Back</h2>
      <form class="auth-form" autocomplete="off" method="POST" action="/login" >
        <div class="form-group">
          <label for="email">Email Address</label>
          <div class="input-icon">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
        </div>
        <div style="color:red"><?php if (isset($errors['email'])) echo $errors['email']; ?></div>
        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-icon">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
          </div>
          <div style="color:red"><?php if (isset($errors['password'])) echo $errors['password']; ?></div>
          
        </div>
        <button type="submit" class="btn btn-primary auth-btn" name="login">Logi</button>
      </form>
      <p class="auth-switch">Don't have an account? <a href="/signup">Sign Up</a></p>
      <p class="auth-switch">Forget Password <a href="/forget">Change Password</a></p>
    </div>
  </section>
</main>

<!-- نفس التنسيق الموجود في صفحة التسجيل -->
<!-- <style>
/* نفس التنسيق الذي أرسلته بالضبط */
/* يمكنك أيضًا وضع التنسيق في ملف خارجي إن أردت */
</style> -->

<style>
:root {
  --primary-color: #2B2D42;
  --secondary-color: #8D99AE;
  --accent-color: #EF233C;
  --background-color: #EDF2F4;
  --white: #fff;
}
.auth-main {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
  background-size: cover;
  padding: 120px 0 60px 0;
}
.auth-section {
  width: 100%;
  max-width: 420px;
  margin: auto;
}
.auth-card.glass {
  background: rgba(255,255,255,0.75);
  border-radius: 22px;
  box-shadow: 0 8px 32px rgba(43,45,66,0.18);
  padding: 48px 36px 36px 36px;
  text-align: center;
  position: relative;
  z-index: 2;
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1.5px solid rgba(255,255,255,0.25);
}
.auth-logo img {
  margin-bottom: 18px;
  display: inline-block;
}
.auth-title {
  font-size: 2.1rem;
  font-weight: 800;
  color: var(--primary-color);
  margin-bottom: 28px;
  font-family: 'Manrope', sans-serif;
  letter-spacing: 1px;
}
.auth-form {
  display: flex;
  flex-direction: column;
  gap: 18px;
}
.form-group {
  text-align: left;
}
.form-group label {
  font-size: 1rem;
  color: var(--primary-color);
  font-weight: 600;
  margin-bottom: 6px;
  display: block;
  font-family: 'Manrope', sans-serif;
}
.input-icon {
  display: flex;
  align-items: center;
  background: var(--white);
  border-radius: 8px;
  border: 1.5px solid var(--secondary-color);
  padding: 0 12px;
  transition: border 0.2s;
}
.input-icon ion-icon {
  font-size: 1.2rem;
  color: var(--secondary-color);
  margin-right: 8px;
}
.input-icon input {
  flex: 1;
  padding: 12px 0;
  border: none;
  outline: none;
  background: transparent;
  color: var(--primary-color);
  font-size: 1rem;
  font-family: 'Manrope', sans-serif;
}
.input-icon input:focus {
  color: var(--primary-color);
}
.input-icon:focus-within {
  border-color: var(--accent-color);
}
.auth-btn {
  width: 100%;
  padding: 13px 0;
  font-size: 1.1rem;
  border-radius: 30px;
  font-weight: 700;
  margin-top: 10px;
  background: var(--accent-color);
  color: var(--white);
  border: none;
  transition: background 0.2s, transform 0.2s;
  font-family: 'Manrope', sans-serif;
  box-shadow: 0 4px 16px rgba(239,35,60,0.10);
}
.auth-btn:hover {
  background: var(--primary-color);
  color: var(--white);
  transform: translateY(-3px);
}
.auth-switch {
  margin-top: 22px;
  color: var(--secondary-color);
  font-size: 1rem;
}
.auth-switch a {
  color: var(--primary-color);
  text-decoration: none;
  font-weight: 600;
  transition: color 0.2s;
}
.auth-switch a:hover {
  color: var(--accent-color);
}
@media (max-width: 500px) {
  .auth-card.glass {
    padding: 28px 6px 20px 6px;
  }
  .auth-title {
    font-size: 1.3rem;
  }
}
</style>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
