<?php require base_path('views/partials/header.php') ?>

<main class="auth-main">
  <section class="auth-section">
    <div class="auth-card glass">
      <h2 class="auth-title">User Profile</h2>
      <!-- Profile Photo Section -->
      <div class="profile-photo-container">
        <div class="profile-photo">
          <?php if(!empty($user['photo'])): ?>
            <img src="/uploads/<?php echo htmlspecialchars($user['photo']); ?>" alt="Profile Photo" id="profile-image">
          <?php else: ?>
            <div class="profile-initials"><?php echo strtoupper(substr($user['user_name'], 0, 2)); ?></div>
          <?php endif; ?>
          <input type="file" id="photo-upload" accept="image/*" style="display: none;">
          <button class="edit-photo-btn" onclick="document.getElementById('photo-upload').click()">
            <ion-icon name="camera-outline"></ion-icon>
          </button>
        </div>
      </div>
      
      <!-- Profile Form -->
      <form class="auth-form" autocomplete="off" method="POST" action="/update-profile">
        <div class="form-group">
          <label for="username">Username</label>
          <div class="input-icon">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['user_name']); ?>" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <div class="input-icon">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
          </div>
        </div>
        
        <div class="form-group">
          <label for="user_type">User Type</label>
          <div class="input-icon">
            <ion-icon name="person-circle-outline"></ion-icon>
            <select id="user_type" name="user_type" class="form-control">
              <option value="regular" <?php echo ($user['user_type'] == 'regular') ? 'selected' : ''; ?>>Regular User</option>
              <option value="premium" <?php echo ($user['user_type'] == 'premium') ? 'selected' : ''; ?>>Premium User</option>
              <option value="admin" <?php echo ($user['user_type'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="role">Role</label>
          <div class="input-icon">
            <ion-icon name="ribbon-outline"></ion-icon>
            <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($user['role']); ?>">
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary auth-btn" name="update_profile">Update Profile</button>
      </form>
      
      <div class="profile-actions">
        <button class="btn btn-secondary" onclick="window.location.href='/forget'">
          <ion-icon name="key-outline"></ion-icon> Change Password
        </button>
      </div>
    </div>
  </section>
</main>

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
  width: 80%;
  max-width: 800px;
  min-width: 400px;
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
  margin-bottom: 188px;
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

.input-icon input, 
.input-icon select {
  flex: 1;
  padding: 12px 0;
  border: none;
  outline: none;
  background: transparent;
  color: var(--primary-color);
  font-size: 1rem;
  font-family: 'Manrope', sans-serif;
}

.input-icon input:focus,
.input-icon select:focus {
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

.profile-photo-container {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.profile-photo {
  position: relative;
  width: 120px;
  height: 120px;
  border-radius: 50%;
  background-color: var(--secondary-color);
  overflow: hidden;
}

.profile-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.profile-initials {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  font-weight: bold;
  color: var(--white);
  background-color: var(--primary-color);
}

.edit-photo-btn {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: var(--accent-color);
  color: white;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.profile-actions {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.btn-secondary {
  width: 100%;
  padding: 13px 0;
  font-size: 1rem;
  border-radius: 30px;
  font-weight: 600;
  background: var(--primary-color);
  color: var(--white);
  border: none;
  transition: background 0.2s, transform 0.2s;
  font-family: 'Manrope', sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.btn-secondary:hover {
  background: var(--secondary-color);
  transform: translateY(-3px);
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

<script>
// Handle photo upload preview
document.getElementById('photo-upload').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(event) {
      const img = document.getElementById('profile-image');
      if (img) {
        img.src = event.target.result;
      } else {
        const initialsDiv = document.querySelector('.profile-initials');
        initialsDiv.style.display = 'none';
        const profilePhoto = document.querySelector('.profile-photo');
        profilePhoto.innerHTML = `<img src="${event.target.result}" alt="Profile Photo" id="profile-image">`;
        profilePhoto.innerHTML += `<button class="edit-photo-btn" onclick="document.getElementById('photo-upload').click()">
          <ion-icon name="camera-outline"></ion-icon>
        </button>`;
      }
    };
    reader.readAsDataURL(file);
  }
});
</script>