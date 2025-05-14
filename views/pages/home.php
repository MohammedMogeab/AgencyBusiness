<?php include 'assets/php/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetrix - Home</title>
    <meta name="title" content="Zetrix">
    <meta name="description" content="This is a business agency html template">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/images/svg/favicon.svg" type="image/svg+xml">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Base CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
    
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="./assets/css/pages/home.css">
    
    <!-- Preload Images -->
    <link rel="preload" as="image" href="./assets/images/hero-bg.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-1.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-2.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-slide-3.jpg">
    <style>
        .main-hero {
            background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
            color: var(--white);
            padding: 120px 0 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .main-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
        .main-hero p {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .main-hero .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .main-hero .btn {
            font-size: 1.1rem;
            padding: 14px 36px;
            border-radius: 30px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .main-hero .hero-img {
            margin-top: 60px;
            max-width: 600px;
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            object-fit: cover;
        }
        .features-section {
            background: var(--white);
            padding: 80px 0 60px 0;
            text-align: center;
        }
        .features-section h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: var(--primary-color);
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 32px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .feature-card {
            background: var(--background-color);
            border-radius: 16px;
            padding: 36px 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: left;
            position: relative;
        }
        .feature-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
        }
        .feature-card ion-icon {
            font-size: 2.2rem;
            color: var(--accent-color);
            margin-bottom: 18px;
            display: block;
        }
        .feature-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        .feature-card p {
            color: var(--secondary-color);
            font-size: 1rem;
            line-height: 1.6;
        }
        .projects-preview-section {
            background: var(--background-color);
            padding: 80px 0 60px 0;
            text-align: center;
        }
        .projects-preview-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: var(--primary-color);
        }
        .projects-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .project-preview-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: left;
        }
        .project-preview-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        }
        .project-preview-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            background: #f3f3f3;
        }
        .project-preview-content {
            padding: 22px 18px 18px 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .project-preview-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        .project-preview-desc {
            color: var(--secondary-color);
            font-size: 0.97rem;
            margin-bottom: 14px;
            flex: 1;
        }
        .project-preview-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }
        .project-preview-price {
            font-size: 1rem;
            font-weight: 700;
            color: var(--accent-color);
        }
        .btn.btn-outline {
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
            background: transparent;
        }
        .btn.btn-outline:hover {
            background: var(--accent-color);
            color: var(--white);
        }
        @media (max-width: 900px) {
            .features-grid, .projects-preview-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (max-width: 600px) {
            .main-hero h1 {
                font-size: 2rem;
            }
            .features-grid, .projects-preview-grid {
                grid-template-columns: 1fr;
            }
            .main-hero .hero-img {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <main>
        <!-- Hero Section -->
        <section class="main-hero">
            <h1>Welcome to Zetrix</h1>
            <p>We're a creative company that focuses on establishing long-term relationships with customers and delivering innovative digital solutions.</p>
            <div class="hero-btns">
                <a href="#projects" class="btn btn-primary">Explore Projects</a>
                <a href="#contact" class="btn btn-outline">Contact Us</a>
            </div>
            <img src="./assets/images/hero-slide-1.jpg" alt="Hero" class="hero-img">
        </section>
        <!-- Features/Services Section -->
        <section class="features-section">
            <h2>What We Offer</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <ion-icon name="call-outline"></ion-icon>
                    <h3>24/7 Support</h3>
                    <p>Our dedicated support team is available round the clock to assist you with any queries or concerns you may have.</p>
                </div>
                <div class="feature-card">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <h3>Secure Payments</h3>
                    <p>We ensure all your transactions are protected with state-of-the-art security measures and encryption.</p>
                </div>
                <div class="feature-card">
                    <ion-icon name="cloud-download-outline"></ion-icon>
                    <h3>Daily Updates</h3>
                    <p>Stay current with our regular updates and improvements to ensure you're always using the latest features.</p>
                </div>
                <div class="feature-card">
                    <ion-icon name="pie-chart-outline"></ion-icon>
                    <h3>Market Research</h3>
                    <p>Get detailed insights and analytics to make informed decisions for your business growth.</p>
                </div>
            </div>
        </section>
        <!-- Projects Preview Section -->
        <section class="projects-preview-section" id="projects">
            <h2>Featured Projects</h2>
            <div class="projects-preview-grid">
                <div class="project-preview-card">
                    <img src="./assets/images/blog-1.jpg" alt="AI Chatting Desktop" class="project-preview-img">
                    <div class="project-preview-content">
                        <div class="project-preview-title">AI Chatting Desktop</div>
                        <div class="project-preview-desc">A desktop app for chatting and moving, with fancy features and AI integration.</div>
                        <div class="project-preview-footer">
                            <span class="project-preview-price">$3,750</span>
                            <a href="projects.php" class="btn btn-outline">View Project</a>
                        </div>
                    </div>
                </div>
                <div class="project-preview-card">
                    <img src="./assets/images/blog-1.jpg" alt="Portfolio Website" class="project-preview-img">
                    <div class="project-preview-content">
                        <div class="project-preview-title">Portfolio Website</div>
                        <div class="project-preview-desc">A modern, responsive portfolio website built with HTML, CSS, and JavaScript.</div>
                        <div class="project-preview-footer">
                            <span class="project-preview-price">$1,200</span>
                            <a href="projects.php" class="btn btn-outline">View Project</a>
                        </div>
                    </div>
                </div>
                <div class="project-preview-card">
                    <img src="./assets/images/blog-1.jpg" alt="Mobile App" class="project-preview-img">
                    <div class="project-preview-content">
                        <div class="project-preview-title">Mobile App</div>
                        <div class="project-preview-desc">A feature-rich Android app for productivity and communication.</div>
                        <div class="project-preview-footer">
                            <span class="project-preview-price">$2,000</span>
                            <a href="projects.php" class="btn btn-outline">View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Preview Section -->
        <section class="features-section" id="contact">
            <h2>Get in Touch</h2>
            <p style="max-width: 600px; margin: 0 auto 40px auto; color: var(--secondary-color);">Have a question, feedback, or need support? Reach out to us and our team will get back to you as soon as possible.</p>
            <a href="contact.php" class="btn btn-primary">Contact Us</a>
        </section>
    </main>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php include 'assets/php/footer.php'; ?> 