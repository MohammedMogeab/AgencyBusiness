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
                    <img src="./assets/images/about-hero.jpg" alt="Our Story" />
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="about-team-section">
            <div class="container">
                <h2 class="section-title">Meet Our Team</h2>
                <div class="team-grid">
                    <div class="team-card">
                        <img src="./assets/images/mohammedmogeabprofile.png" alt="Team Member" class="team-img">
                        <h3 class="team-name">Alex Morgan</h3>
                        <p class="team-role">CEO & Founder</p>
                    </div>
                    <div class="team-card">
                        <img src="./assets/images/profile.jpeg" alt="Team Member" class="team-img">
                        <h3 class="team-name">Sara Lee</h3>
                        <p class="team-role">Lead Designer</p>
                    </div>
                    <div class="team-card">
                        <img src="./assets/images/download.jpeg" alt="Team Member" class="team-img">
                        <h3 class="team-name">Michael Chen</h3>
                        <p class="team-role">Head of Development</p>
                    </div>
                    <div class="team-card">
                        <img src="./assets/images/team-4.jpg" alt="Team Member" class="team-img">
                        <h3 class="team-name">Priya Patel</h3>
                        <p class="team-role">Marketing Director</p>
                    </div>
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
        padding: 110px 0 60px 0;
        text-align: center;
    }
    .about-hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 18px;
        letter-spacing: 1px;
    }
    .about-hero-text {
        font-size: 1.3rem;
        opacity: 0.92;
        max-width: 600px;
        margin: 0 auto;
    }
    .about-story-section {
        background: var(--white);
        padding: 70px 0 60px 0;
    }
    .about-story-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        align-items: center;
        justify-content: space-between;
    }
    .about-story-text {
        flex: 1 1 340px;
        min-width: 280px;
    }
    .about-story-text h2 {
        color: var(--primary-color);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 18px;
    }
    .about-story-text p {
        color: var(--secondary-color);
        font-size: 1.08rem;
        margin-bottom: 16px;
        line-height: 1.7;
    }
    .about-story-img {
        flex: 1 1 320px;
        min-width: 240px;
        text-align: center;
    }
    .about-story-img img {
        max-width: 350px;
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(43,45,66,0.10);
    }
    .about-team-section {
        background: var(--background-color);
        padding: 70px 0 60px 0;
        text-align: center;
    }
    .section-title {
        color: var(--primary-color);
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 40px;
        letter-spacing: 1px;
    }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 32px;
        max-width: 1000px;
        margin: 0 auto;
    }
    .team-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(43,45,66,0.10);
        padding: 32px 18px 24px 18px;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .team-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(43,45,66,0.13);
    }
    .team-img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 18px;
        border: 3px solid var(--accent-color);
    }
    .team-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 6px;
    }
    .team-role {
        color: var(--secondary-color);
        font-size: 1rem;
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
    @media (max-width: 900px) {
        .about-story-grid {
            flex-direction: column;
            gap: 32px;
            text-align: center;
        }
        .about-story-img img {
            max-width: 100%;
        }
    }
    @media (max-width: 600px) {
        .about-hero-title {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 1.2rem;
        }
        .about-story-section, .about-team-section, .about-values-section {
            padding: 40px 0 30px 0;
        }
    }
    </style>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php require('partials/footer.php') ?>
</body>

</html>