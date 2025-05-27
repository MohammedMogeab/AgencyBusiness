<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetrix - Digital Agency</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Base CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
</head>
<body>
    <header class="main-header">
        <div class="header-container">
            <!-- Logo -->
            <a href="/" class="header-logo">
                <!-- <img src="./assets/images/logo.png" alt="Zetrix Logo" class="logo-img"> -->
                <span class="logo-text">Zetrix</span>
            </a>

            <!-- Navigation -->
            <nav class="header-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="/services" class="nav-link">Services</a>
                    </li> -->
                    <li class="nav-item">
                        <a href="/projects" class="nav-link">projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="/blog" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </nav>
            <?php if($_SESSION['user']?? false) :?>

                <div class="profile-dropdown">
                    <button class="profile-button">
                        <div class="profile-avatar">
                            <?php 
                            $avatarPath = $_SESSION['user']['photo'] ?? 'blog-1.jpg';
                          
                            echo "<!-- Debug: Avatar path is: " . $avatarPath . " -->";
                            ?>
                            <img src="<?php echo getUpload($avatarPath); ?>" alt="Profile" >
                        </div>
                        <span class="profile-name"><?php echo $_SESSION['user']['user_name'] ?? 'User'; ?></span>
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </button>

                    <div class="dropdown-menu">
                       <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                       <a href="/manage" class="dropdown-item">
                            <ion-icon name="grid-outline"></ion-icon>
                            <span>Dashboard</span>
                        </a>

                    <?php endif; ?>

                        <a href="/profile" class="dropdown-item">
                            <ion-icon name="person-outline"></ion-icon>
                            <span>Profile</span>
                        </a>
                        <a href="/usermanage" class="dropdown-item">
                            <ion-icon name="settings-outline"></ion-icon>
                            <span>
                                Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/logout" class="dropdown-item text-danger">
                            <ion-icon name="log-out-outline"></ion-icon>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
      
             <?php else:?>
                <div class="header-cta">
                <a href="/login" class="cta-button">
                    <span>Get Started</span>
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>
            </div>

     
            <?php endif ?>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" aria-label="Toggle Menu">
                <span class="menu-icon"></span>
            </button>
        </div>
    </header>
    <?php echo "<br><br><br>";?>
    <style>
    .main-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(43, 45, 66, 0.08);
        transition: all 0.3s ease;
    }

    .main-header.scrolled {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 4px 20px rgba(43, 45, 66, 0.08);
    }

    .header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .header-logo:hover {
        transform: translateY(-2px);
    }

    .logo-img {
        height: 40px;
        width: auto;
    }

    .logo-text {
        font-size: 1.5rem;
        font-weight: 800;
          color: #f50303;;  
        letter-spacing: -0.5px;
    }

    .header-nav {
        margin-left: auto;
        margin-right: 40px;
    }

    .nav-list {
        display: flex;
        gap: 40px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 1.05rem;
        font-weight: 500;
        padding: 8px 0;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        transition: width 0.3s ease;
        border-radius: 2px;
    }

    .nav-link:hover {
        color: var(--accent-color);
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .header-cta {
        display: flex;
        align-items: center;
    }

    .cta-button {
        display: flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(120deg, var(--primary-color), var(--accent-color));
        color: white;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.3);
    }

    .cta-button ion-icon {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .cta-button:hover ion-icon {
        transform: translateX(4px);
    }

    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
    }

    .menu-icon {
        display: block;
        width: 24px;
        height: 2px;
        background: var(--primary-color);
        position: relative;
        transition: all 0.3s ease;
    }

    .menu-icon::before,
    .menu-icon::after {
        content: '';
        position: absolute;
        width: 24px;
        height: 2px;
        background: var(--primary-color);
        transition: all 0.3s ease;
    }

    .menu-icon::before {
        top: -8px;
    }

    .menu-icon::after {
        bottom: -8px;
    }

    @media (max-width: 1024px) {
        .header-container {
            height: 70px;
        }

        .nav-list {
            gap: 30px;
        }

        .nav-link {
            font-size: 1rem;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .header-nav {
            display: none;
        }

        .header-cta {
            display: none;
        }

        .mobile-menu-btn {
            display: block;
        }

        .mobile-menu-btn.active .menu-icon {
            background: transparent;
        }

        .mobile-menu-btn.active .menu-icon::before {
            transform: rotate(45deg);
            top: 0;
        }

        .mobile-menu-btn.active .menu-icon::after {
            transform: rotate(-45deg);
            bottom: 0;
        }
    }

    @media (max-width: 480px) {
        .header-container {
            padding: 0 16px;
        }

        .logo-text {
            font-size: 1.3rem;
            color: blue;    
        }

        .logo-img {
            height: 32px;
        }
    }

    .profile-dropdown {
        position: relative;
        margin-left: 20px;
    }

    .profile-button {
        display: flex;
        align-items: center;
        gap: 8px;
        background: none;
        border: none;
        padding: 8px 12px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .profile-button:hover {
        background: rgba(43, 45, 66, 0.05);
    }

    .profile-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid var(--primary-color);
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-name {
        font-weight: 500;
        color: var(--primary-color);
    }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(43, 45, 66, 0.1);
        padding: 8px;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1001;
    }

    .profile-dropdown.active .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        color: var(--primary-color);
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background: rgba(43, 45, 66, 0.05);
    }
    </style>

    <script>
    // Add scroll effect to header
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.main-header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile menu functionality
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const headerNav = document.querySelector('.header-nav');
    
    mobileMenuBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        headerNav.classList.toggle('active');
    });

    // Profile Dropdown Functionality
    const profileDropdown = document.querySelector('.profile-dropdown');
    const profileButton = document.querySelector('.profile-button');

    profileButton.addEventListener('click', function(e) {
        e.stopPropagation();
        profileDropdown.classList.toggle('active');
    });

    document.addEventListener('click', function(e) {
        if (!profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove('active');
        }
    });
    </script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>