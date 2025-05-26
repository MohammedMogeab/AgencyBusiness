<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Zetrix</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Base CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
    
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="./assets/css/pages/about.css">
</head>
<body>
   
<?php require('partials/header.php') ?>

    <main class="about-main">
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="container">
                <h1 class="about-hero-title">About Zetrix</h1>
                <p class="about-hero-text">Empowering innovation, building trust, and delivering digital excellence for a brighter tomorrow.</p>
            </div>
        </section>

        <!-- Company Story / Mission -->
        <section class="about-story-section">
            <div class="container about-story-grid">
                <div class="about-story-text">
                    <h2>Our Story</h2>
                    <p>Zetrix was founded with a vision to revolutionize the digital landscape. Our mission is to empower businesses and individuals with innovative technology solutions that drive growth, efficiency, and creativity. We believe in building long-term relationships based on trust, transparency, and a shared passion for excellence.</p>
                    <p>From web development to digital marketing, our multidisciplinary team brings together expertise, creativity, and a relentless drive to deliver results that matter. We are committed to making a positive impact for our clients and the communities we serve.</p>
                </div>
                <div class="about-story-img">
                    <img src="./assets/images/blog-1.jpg" alt="Our Story" />
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="about-team-section">
            <div class="container">
                <h2 class="section-title">Meet Our Team</h2>
                <div class="team-grid">
                    <?php foreach($developers as $developer):?>
                    <div class="team-card">
                        <div class="team-img-wrapper">
                            <img src="./assets/images/blog-2.jpg" alt="Team Member" class="team-img">
                        </div>
                        <h3 class="team-name"><?= $developer['name']?></h3>
                        <p class="team-role"><?= $developer['role']?></p>
                        <div class="team-social">
                            <a href="<?= $developer['linkedin']?>"><ion-icon name="logo-linkedin"></ion-icon></a>
                            <a href="<?= $developer['twitter']?>"><ion-icon name="logo-twitter"></ion-icon></a>
                            <a href="mailto:<?= $developer['email']?>"><ion-icon name="mail-outline"></ion-icon></a>
                            <a href="<?= $developer['github']?>"><ion-icon name="logo-github"></ion-icon></a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>

        <!-- Values / Features Section -->
        <section class="about-values-section">
            <div class="container">
                <h2 class="section-title">Our Values</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <ion-icon name="bulb-outline"></ion-icon>
                        <h3>Innovation</h3>
                        <p>We embrace creativity and forward-thinking to deliver cutting-edge solutions.</p>
                    </div>
                    <div class="value-card">
                        <ion-icon name="people-outline"></ion-icon>
                        <h3>Collaboration</h3>
                        <p>We believe in the power of teamwork and open communication to achieve great results.</p>
                    </div>
                    <div class="value-card">
                        <ion-icon name="shield-checkmark-outline"></ion-icon>
                        <h3>Integrity</h3>
                        <p>We act with honesty, transparency, and a commitment to doing what's right.</p>
                    </div>
                    <div class="value-card">
                        <ion-icon name="star-outline"></ion-icon>
                        <h3>Excellence</h3>
                        <p>We strive for the highest standards in everything we do, from strategy to execution.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
    .about-main {
        background: var(--background-color);
        font-family: 'Manrope', sans-serif;
    }
    .about-hero {
        background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
        color: var(--white);
        padding: 120px 0 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('./assets/images/pattern.svg') center/cover;
        opacity: 0.1;
    }
    .about-hero-title {
        font-size: 3.2rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: 1px;
        position: relative;
    }
    .about-hero-text {
        font-size: 1.3rem;
        opacity: 0.92;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }
    .about-story-section {
        background: var(--white);
        padding: 100px 0;
        position: relative;
    }
    .about-story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .about-story-text {
        padding-right: 40px;
    }
    .about-story-text h2 {
        color: var(--primary-color);
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 24px;
        line-height: 1.3;
    }
    .about-story-text p {
        color: var(--secondary-color);
        font-size: 1.1rem;
        margin-bottom: 20px;
        line-height: 1.7;
        opacity: 0.9;
    }
    .about-story-img {
        position: relative;
    }
    .about-story-img::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -20px;
        width: 100%;
        height: 100%;
        border: 2px solid var(--accent-color);
        border-radius: 24px;
        z-index: 0;
    }
    .about-story-img img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(43,45,66,0.10);
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
    }
    .about-story-img:hover img {
        transform: translate(-10px, -10px);
    }
    .about-team-section {
        background: var(--background-color);
        padding: 100px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .about-team-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.2), transparent);
    }
    .section-title {
        color: var(--primary-color);
        font-size: 2.4rem;
        font-weight: 800;
        margin-bottom: 50px;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #6366f1, #f472b6);
        border-radius: 3px;
    }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .team-card {
        background: var(--white);
        border-radius: 24px;
        box-shadow: 0 4px 24px rgba(43,45,66,0.08);
        padding: 40px 24px 30px 24px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .team-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #6366f1, #f472b6);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 40px rgba(43,45,66,0.12);
    }
    .team-card:hover::before {
        opacity: 1;
    }
    .team-img-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
        margin-bottom: 24px;
    }
    .team-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid var(--accent-color);
        box-shadow: 0 4px 16px rgba(99, 102, 241, 0.2);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    .team-img-wrapper::before {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        background: linear-gradient(45deg, #6366f1, #f472b6);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .team-card:hover .team-img-wrapper::before {
        opacity: 0.3;
    }
    .team-card:hover .team-img {
        transform: scale(1.05);
    }
    .team-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 8px;
        transition: color 0.3s ease;
    }
    .team-role {
        color: var(--secondary-color);
        font-size: 1.05rem;
        margin-bottom: 20px;
        opacity: 0.9;
    }
    .team-social {
        display: flex;
        gap: 12px;
        margin-top: auto;
    }
    .team-social a {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--background-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        transition: all 0.3s ease;
    }
    .team-social a:hover {
        background: var(--accent-color);
        color: white;
        transform: translateY(-3px);
    }
    .team-social ion-icon {
        font-size: 1.2rem;
    }
    .about-values-section {
        background: var(--white);
        padding: 70px 0 60px 0;
        text-align: center;
    }
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 32px;
        max-width: 1000px;
        margin: 0 auto;
    }
    .value-card {
        background: var(--background-color);
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(43,45,66,0.07);
        padding: 36px 18px 28px 18px;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .value-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(43,45,66,0.10);
    }
    .value-card ion-icon {
        font-size: 2.2rem;
        color: var(--accent-color);
        margin-bottom: 16px;
        display: block;
    }
    .value-card h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 8px;
    }
    .value-card p {
        color: var(--secondary-color);
        font-size: 1rem;
        line-height: 1.6;
    }
    @media (max-width: 992px) {
        .team-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
    }
    @media (max-width: 768px) {
        .about-team-section {
            padding: 60px 0;
        }
        .section-title {
            font-size: 2rem;
        }
        .team-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
        }
    }
    </style>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php require('partials/footer.php') ?>
</body>

</html>