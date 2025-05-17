<?php require('partials/header.php') ?>

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
    <link rel="stylesheet" href="/assets/css/base.css">
    
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="/assets/css/pages/home.css">
    
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
            box-shadow: 0 4px 20px rgba(30, 64, 175, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            text-align: left;
            border: 1px solid #e0e7ef;
            position: relative;
            height: 100%;
        }
        .project-preview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(30, 64, 175, 0.12);
            border-color: #6366f1;
        }
        .project-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(90deg, #6366f1 60%, #f472b6 100%);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 12px;
            box-shadow: 0 2px 6px #6366f122;
            letter-spacing: 0.5px;
            z-index: 2;
            backdrop-filter: blur(4px);
        }
        .project-preview-img-wrapper {
            position: relative;
            width: 100%;
            height: 180px;
            overflow: hidden;
        }
        .project-preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background: #f3f3f3;
            display: block;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            transition: transform 0.3s ease;
        }
        .project-preview-card:hover .project-preview-img {
            transform: scale(1.05);
        }
        .project-img-gradient {
            position: absolute;
            left: 0; right: 0; bottom: 0; top: 0;
            background: linear-gradient(180deg, rgba(30,41,59,0.0) 60%, rgba(30,41,59,0.15) 100%);
            z-index: 1;
        }
        .project-preview-content {
            padding: 24px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
            background: var(--white);
        }
        .project-preview-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #1d4ed8;
            margin-bottom: 8px;
            letter-spacing: 0.2px;
            line-height: 1.4;
        }
        .project-preview-desc {
            color: var(--secondary-color);
            font-size: 0.95rem;
            margin-bottom: 20px;
            flex: 1;
            line-height: 1.6;
            opacity: 0.9;
        }
        .project-preview-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid rgba(224, 231, 239, 0.8);
        }
        .btn.btn-outline {
            border: 2px solid #6366f1;
            color: #6366f1;
            background: transparent;
            font-weight: 800;
            border-radius: 30px;
            padding: 12px 32px;
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            box-shadow: 0 1px 4px #6366f111;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn.btn-outline:hover {
            background: #6366f1;
            color: #fff;
            box-shadow: 0 4px 16px #6366f122;
        }
        .btn.btn-gradient {
            background: #6366f1;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px #6366f122;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            outline: none;
            width: 100%;
            justify-content: center;
            letter-spacing: 0.3px;
        }
        .btn.btn-gradient:hover, .btn.btn-gradient:focus {
            background: #4f46e5;
            box-shadow: 0 4px 12px #6366f144;
            transform: translateY(-1px);
        }
        .btn.btn-gradient:active {
            background: #4338ca;
            box-shadow: 0 2px 6px #6366f122;
            transform: translateY(0);
        }
        .btn.btn-gradient svg {
            margin-right: 6px;
        }
        @media (max-width: 900px) {
            .features-grid, .projects-preview-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
            }
        }
        @media (max-width: 600px) {
            .main-hero h1 {
                font-size: 2rem;
            }
            .features-grid, .projects-preview-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .main-hero .hero-img {
                max-width: 100%;
            }
            .project-preview-img-wrapper {
                height: 160px;
            }
            .project-preview-content {
                padding: 20px 16px;
            }
        }
        .contact-section {
            background: var(--white);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.2), transparent);
        }
        .contact-section h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }
        .contact-section h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #f472b6);
            border-radius: 3px;
        }
        .contact-section p {
            max-width: 600px;
            margin: 0 auto 40px auto;
            color: var(--secondary-color);
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }
        .contact-cta {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(90deg, #6366f1 0%, #2563eb 100%);
            color: #fff;
            font-weight: 600;
            padding: 16px 36px;
            border-radius: 12px;
            font-size: 1.1rem;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.2);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .contact-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(99, 102, 241, 0.3);
        }
        .contact-cta:active {
            transform: translateY(0);
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.2);
        }
        .contact-cta ion-icon {
            font-size: 1.4rem;
        }
        @media (max-width: 600px) {
            .contact-section {
                padding: 60px 0;
            }
            .contact-section h2 {
                font-size: 1.8rem;
            }
            .contact-section p {
                font-size: 1rem;
                padding: 0 20px;
            }
            .contact-cta {
                padding: 14px 28px;
                font-size: 1rem;
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
                <?php foreach($resualt as $row): ?>
                <div class="project-preview-card">
                    <span class="project-badge"><?= isset($row['status'])?$row['status']:'Not status' ?></span>
                    <div class="project-preview-img-wrapper">
                        <img src='<?= isset($row['main_image'])?$row['main_image']:'' ?>' alt="AI Chatting Desktop" class="project-preview-img">
                        <div class="project-img-gradient"></div>
                    </div>
                    <div class="project-preview-content">
                        <div class="project-preview-title"><?= isset($row['product_name'])?$row['product_name']:'Not name' ?></div>
                        <div class="project-preview-desc"><?= isset($row['short_description'])?$row['short_description']:'Not descrition' ?></div>
                        <div class="project-preview-footer">
                            <button  onclick="window.location.href='/project?project_id=<?=$row['product_id']?>'" 
                              class="btn btn-gradient">
                              View Project
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- <div class="project-preview-card">
                    <span class="project-badge">New</span>
                    <div class="project-preview-img-wrapper">
                        <img src="./assets/images/blog-1.jpg" alt="Portfolio Website" class="project-preview-img">
                        <div class="project-img-gradient"></div>
                    </div>
                    <div class="project-preview-content">
                        <div class="project-preview-title">Portfolio Website</div>
                        <div class="project-preview-desc">A modern, responsive portfolio website built with HTML, CSS, and JavaScript.</div>
                        <div class="project-preview-footer">
                            <button onclick="window.location.href='/project'" 
                              class="btn btn-gradient">
                              View Project
                            </button>
                        </div>
                    </div>
                </div>
                <div class="project-preview-card">
                    <span class="project-badge">Popular</span>
                    <div class="project-preview-img-wrapper">
                        <img src="./assets/images/blog-1.jpg" alt="Mobile App" class="project-preview-img">
                        <div class="project-img-gradient"></div>
                    </div>
                    <div class="project-preview-content">
                        <div class="project-preview-title">Mobile App</div>
                        <div class="project-preview-desc">A feature-rich Android app for productivity and communication.</div>
                        <div class="project-preview-footer">
                            <button onclick="window.location.href='/project'" 
                              class="btn btn-gradient">
                              View Project
                            </button>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- Contact Preview Section -->
        <section class="contact-section" id="contact">
            <h2>Get in Touch</h2>
            <p>Have a question, feedback, or need support? Reach out to us and our team will get back to you as soon as possible.</p>
            <a href="contact.php" class="contact-cta">
                <ion-icon name="mail-outline"></ion-icon>
                Contact Us
            </a>
        </section>
    </main>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php require('partials/footer.php') ?>