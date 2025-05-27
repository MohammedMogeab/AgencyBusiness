<?php require base_path('views/partials/header.php') ?>

<div class="profile-page">
    <div class="profile-container">
        <div class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-photo-section">
                    <div class="profile-photo-wrapper">
                        <?php if(!empty($user['photo'])): ?>
                            <img src="<?php echo htmlspecialchars(getUpload($user['photo'])); ?>" alt="Profile Photo" id="profile-image">
                        <?php else: ?>
                            <div class="profile-initials"><?php echo strtoupper(substr($user['user_name'], 0, 2)); ?></div>
                        <?php endif; ?>
                        <button type="button" class="edit-photo-btn" onclick="image_changed()">
                            <ion-icon name="camera-outline"></ion-icon>
        </button>
                    </div>
                    <h2 class="profile-name"><?php echo htmlspecialchars($user['user_name']); ?></h2>
                    <span class="profile-role"><?php echo htmlspecialchars($user['role']); ?></span>
                </div>
                <div class="profile-actions">
                    <button class="action-btn" onclick="window.location.href='/forget'">
            <ion-icon name="key-outline"></ion-icon>
                        <span>Change Password</span>
          </button>
                    <button class="action-btn" onclick="window.location.href='/logout'">
            <ion-icon name="log-out-outline"></ion-icon>
                        <span>Sign Out</span>
          </button>
        </div>
      </div>
        </div>

        <div class="profile-content">
            <div class="content-header">
                <button class="back-btn" onclick="window.history.back()">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    <span>Back</span>
                </button>
                <h1>Edit Profile</h1>
      </div>
      
            <div class="content-card">
                <form class="profile-form" autocomplete="off" method="POST" action="/profile/update" enctype="multipart/form-data">
        <input type="file" id="photo-upload" name="photo" accept="image/*" style="display: none;">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">

        <div class="form-group">
          <label for="username">Username</label>
                        <div class="input-wrapper">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['user_name']); ?>" required oninput="enableSaveButton()">
          </div>
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
                        <div class="input-wrapper">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
          </div>
        </div>
        
        <div class="form-group">
          <label for="role">Role</label>
                        <div class="input-wrapper">
            <ion-icon name="ribbon-outline"></ion-icon>
            <input   type="text" id="role" name="user_type" value="<?php echo htmlspecialchars($user['user_type']); ?>" oninput="enableSaveButton()">
          </div>
        </div>

                    <?php if(isset($error) || isset($success)): ?>
                        <div class="message <?= isset($error) ? 'error' : 'success' ?>">
            <?php 
                if(isset($error)) echo $error;
                if(isset($success)) echo $success;
            ?>
        </div>
                    <?php endif; ?>

                    <button type="submit" class="save-btn" name="update_profile" id="save-button" disabled>
                        <ion-icon name="save-outline"></ion-icon>
                        <span>Save Changes</span>
                    </button>
      </form>
            </div>
        </div>
    </div>
</div>

<style>
.profile-page {
    /* This ensures the content starts below header */
    margin-top: 60px;
    min-height: calc(100vh - 60px);
}

.profile-page .profile-container {
  display: flex;
    background-color: #f8f9fa;
    padding: 2rem;
    gap: 2rem;
}

.profile-page .profile-sidebar {
    width: 300px;
    flex-shrink: 0;
}

.profile-page .profile-card {
    background-color: white;
    border-radius: 1rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    overflow: hidden;
}

.profile-page .profile-photo-section {
    padding: 2rem;
  text-align: center;
    background: linear-gradient(135deg, #4361ee, #3f37c9);
    color: white;
}

.profile-page .profile-photo-wrapper {
  position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto 1.5rem;
}

.profile-page .profile-photo-wrapper img,
.profile-page .profile-initials {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255, 255, 255, 0.2);
}

.profile-page .profile-initials {
  display: flex;
  align-items: center;
    justify-content: center;
    background-color: rgba(255, 255, 255, 0.1);
    font-size: 3rem;
    font-weight: 600;
    color: white;
}

.profile-page .edit-photo-btn {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #4361ee;
    border: none;
    color: white;
  display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.profile-page .edit-photo-btn:hover {
    background-color: #3f37c9;
    transform: scale(1.1);
}

.profile-page .profile-name {
  margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.profile-page .profile-role {
    display: inline-block;
    padding: 0.5rem 1rem;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 2rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.profile-page .profile-actions {
    padding: 1.5rem;
}

.profile-page .action-btn {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 0.75rem 1rem;
  border: none;
    background: none;
    color: #2b2d42;
    font-size: 1rem;
  cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
}

.profile-page .action-btn:last-child {
    margin-bottom: 0;
}

.profile-page .action-btn ion-icon {
    font-size: 1.25rem;
    margin-right: 0.75rem;
}

.profile-page .action-btn:hover {
    background-color: #f8f9fa;
    color: #4361ee;
}

.profile-page .profile-content {
    flex: 1;
}

.profile-page .content-header {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
}

.profile-page .back-btn {
  display: flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border: none;
    background: none;
    color: #2b2d42;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    margin-right: 1rem;
}

.profile-page .back-btn ion-icon {
    font-size: 1.25rem;
    margin-right: 0.5rem;
}

.profile-page .back-btn:hover {
    background-color: #f8f9fa;
    color: #4361ee;
}

.profile-page .content-header h1 {
    margin: 0;
    font-size: 1.75rem;
  font-weight: 600;
    color: #2b2d42;
}

.profile-page .content-card {
    background-color: white;
    border-radius: 1rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    padding: 2rem;
}

.profile-page .profile-form {
    max-width: 600px;
}

.profile-page .form-group {
    margin-bottom: 1.5rem;
}

.profile-page .form-group label {
  display: block;
    margin-bottom: 0.5rem;
    color: #2b2d42;
    font-weight: 500;
}

.profile-page .input-wrapper {
  display: flex;
  align-items: center;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.profile-page .input-wrapper:focus-within {
    border-color: #4361ee;
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
}

.profile-page .input-wrapper ion-icon {
    font-size: 1.25rem;
    color: #8d99ae;
    margin-right: 0.75rem;
}

.profile-page .input-wrapper input {
  flex: 1;
  border: none;
    background: none;
  outline: none;
  font-size: 1rem;
    color: #2b2d42;
}

.profile-page .input-wrapper input:read-only {
    color: #8d99ae;
    cursor: not-allowed;
}

.profile-page .message {
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
    font-weight: 500;
}

.profile-page .message.error {
    background-color: rgba(230, 57, 70, 0.1);
    color: #e63946;
}

.profile-page .message.success {
    background-color: rgba(76, 201, 240, 0.1);
    color: #4cc9f0;
}

.profile-page .save-btn {
    display: flex;
    align-items: center;
    justify-content: center;
  width: 100%;
    padding: 0.75rem 1.5rem;
    background-color: #4361ee;
    color: white;
  border: none;
    border-radius: 0.5rem;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.profile-page .save-btn ion-icon {
    font-size: 1.25rem;
    margin-right: 0.5rem;
}

.profile-page .save-btn:hover:not(:disabled) {
    background-color: #3f37c9;
    transform: translateY(-2px);
}

.profile-page .save-btn:disabled {
    background-color: #8d99ae;
  cursor: not-allowed;
  opacity: 0.7;
}

@media (max-width: 1024px) {
    .profile-page .profile-container {
        flex-direction: column;
    }

    .profile-page .profile-sidebar {
        width: 100%;
    }

    .profile-page .profile-card {
  display: flex;
  align-items: center;
        padding: 1rem;
    }

    .profile-page .profile-photo-section {
  display: flex;
  align-items: center;
        padding: 0;
        background: none;
        color: #2b2d42;
        text-align: left;
    }

    .profile-page .profile-photo-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 1rem 0 0;
    }

    .profile-page .profile-actions {
  display: flex;
        gap: 1rem;
        padding: 0;
        margin-left: auto;
    }

    .profile-page .action-btn {
        width: auto;
        margin-bottom: 0;
    }
}

@media (max-width: 768px) {
    .profile-page .profile-container {
        padding: 1rem;
    }

    .profile-page .profile-card {
        flex-direction: column;
        text-align: center;
    }

    .profile-page .profile-photo-section {
        flex-direction: column;
        text-align: center;
    }

    .profile-page .profile-photo-wrapper {
        margin: 0 auto 1rem;
    }

    .profile-page .profile-actions {
        flex-direction: column;
        margin: 1rem 0 0;
    }

    .profile-page .action-btn {
        width: 100%;
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

<?php require base_path('views/partials/footer.php') ?>