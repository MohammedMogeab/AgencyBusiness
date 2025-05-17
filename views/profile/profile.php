<?php require base_path('views/partials/header.php') ?>

<main class="auth-main">
  <section class="auth-section">
    <div class="auth-card glass">
      <div class="profile-header">
        <button class="btn-back" onclick="window.history.back()">
          <ion-icon name="arrow-back-outline"></ion-icon>
        </button>
        <h2 class="auth-title">User Profile</h2>
        <div class="header-actions">
          <button class="btn-change-password" onclick="window.location.href='/forget'">
            <ion-icon name="key-outline"></ion-icon>
          </button>
          <button class="btn-signout" onclick="window.location.href='/logout'">
            <ion-icon name="log-out-outline"></ion-icon>
          </button>
        </div>
      </div>
      
      <!-- Profile Photo Section -->
      <div class="profile-photo-container">
        <div class="profile-photo-wrapper">
          <div class="profile-photo">
            <?php if(!empty($user['photo'])): ?>
              <img src="/uploads/<?php echo htmlspecialchars($user['photo']); ?>" alt="Profile Photo" id="profile-image">
            <?php else: ?>
              <div class="profile-initials" style="color: blue; text-align: center; text-overflow: hidden; text-shadow: yellow;"><?php echo strtoupper(substr($user['user_name'], 0, 2)); ?></div>
            <?php endif; ?>
          </div>
          <button type="button" class="edit-photo-btn" onclick="image_changed()" style="position: absolute; bottom: 10px; right: 10px;">
              <ion-icon name="camera-outline"></ion-icon>
          </button>
        </div>
      </div>
      
      <!-- Profile Form -->
      <form class="auth-form" autocomplete="off" method="POST" action="/profile/update" enctype="multipart/form-data">
        <input type="file" id="photo-upload" name="photo" accept="image/*" style="display: none;">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
        <!-- <input type="file" accept="image/*" name="photo" id="photo" style="display: none;"> -->
        <div class="form-group">
          <label for="username">Username</label>
          <div class="input-icon">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['user_name']); ?>" required oninput="enableSaveButton()">
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
          <label for="role">Role</label>
          <div class="input-icon">
            <ion-icon name="ribbon-outline"></ion-icon>
            <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($user['role']); ?>" oninput="enableSaveButton()">
          </div>
        </div>
        <?php if(isset($error)|| isset($success)):?>
        <div class="message" style="color: <?= isset($error) ? 'red' : 'yellow';?>;">
            <?php 
                if(isset($error)) echo $error;
                if(isset($success)) echo $success;
            ?>
        </div>
        <?php endif;?>
        <input type="submit" class="btn btn-primary auth-btn" name="update_profile" id="save-button" disabled placeholder="Save Changs">
      </form>
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

.profile-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 28px;
}

.header-actions {
  display: flex;
  gap: 10px;
}

.auth-title {
  font-size: 2.1rem;
  font-weight: 800;
  color: var(--primary-color);
  font-family: 'Manrope', sans-serif;
  letter-spacing: 1px;
  margin: 0;
}

.btn-back, .btn-change-password, .btn-signout {
  background: transparent;
  border: none;
  color: var(--primary-color);
  font-size: 1.5rem;
  cursor: pointer;
  padding: 8px;
  border-radius: 50%;
  transition: background-color 0.2s;
}

.btn-back:hover, .btn-change-password:hover, .btn-signout:hover {
  background-color: rgba(43,45,66,0.1);
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

.auth-btn:hover:not(:disabled) {
  background: var(--primary-color);
  color: var(--white);
  transform: translateY(-3px);
}

.auth-btn:disabled {
  background: var(--secondary-color);
  cursor: not-allowed;
  opacity: 0.7;
}

.profile-photo-container {
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
}

.profile-photo-wrapper {
  position: relative;
  width: 180px;
  height: 180px;
}

.profile-photo {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: var(--secondary-color);
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
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
  font-size: 3.5rem;
  font-weight: bold;
  color: var(--white);
  background-color: var(--primary-color);
}

.edit-photo-btn {
  position: absolute;
  bottom: 10px;
  right: 10px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: var(--accent-color);
  color: white;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 2;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

@media (max-width: 500px) {
  .auth-section {
    width: 95%;
    min-width: unset;
  }
  
  .auth-card.glass {
    padding: 28px 20px 20px 20px;
  }
  
  .auth-title {
    font-size: 1.8rem;
  }
  
  .profile-photo-wrapper {
    width: 150px;
    height: 150px;
  }
}
</style>

<script>
// Track original values
const originalValues = {
  username: "<?php echo htmlspecialchars($user['user_name']); ?>",
  role: "<?php echo htmlspecialchars($user['role']); ?>"
};

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
            }
            enableSaveButton();
        };
        reader.readAsDataURL(file);
    }
});
function image_changed(){
    document.getElementById('photo-upload').click();
}
// Enable save button when changes are detected
function enableSaveButton() {
  const saveButton = document.getElementById('save-button');
  const currentUsername = document.getElementById('username').value;
  const currentRole = document.getElementById('role').value;
  const photoChanged = document.getElementById('photo-upload').files.length > 0;
  
  const usernameChanged = currentUsername !== originalValues.username;
  const roleChanged = currentRole !== originalValues.role;
  
  saveButton.disabled = !(usernameChanged || roleChanged || photoChanged);
}
</script>