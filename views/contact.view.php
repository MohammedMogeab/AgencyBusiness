<?php require('partials/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Zetrix</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">
    <!-- Base CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="../assets/css/pages/contact.css">
    <style>
        .custom-alert {
    padding: 15px 20px;
    margin: 15px 0;
    border-radius: 12px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 16px;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease-in-out;
}

.success-alert {
    background-color: #e6f9ec;
    color: #256029;
    border-left: 6px solid #2ecc71;
}

.success-alert strong {
    margin-right: 10px;
    color: #2ecc71;
}
        .contact-header {
            background: linear-gradient(120deg, var(--primary-color) 60%, var(--accent-color) 100%);
            color: var(--white);
            padding: 80px 0 40px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .contact-header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }
        .contact-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .contact-section {
            padding: 80px 0;
            background: var(--white);
        }
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            align-items: start;
        }
        .contact-info {
            padding-right: 40px;
        }
        .section-subtitle {
            color: var(--accent-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: block;
        }
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            line-height: 1.3;
        }
        .contact-text {
            color: var(--secondary-color);
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .contact-icon {
            width: 50px;
            height: 50px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .contact-icon ion-icon {
            font-size: 1.5rem;
            color: var(--accent-color);
        }
        .contact-item .contact-text h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 6px;
        }
        .contact-item .contact-text p {
            color: var(--secondary-color);
            font-size: 1rem;
            line-height: 1.5;
            margin: 0;
        }
        .contact-form {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e0e7ef;
            border-radius: 10px;
            font-size: 1rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
            background: var(--white);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }
        .form-control::placeholder {
            color: #94a3b8;
        }
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }
        .submit-btn {
            background: linear-gradient(90deg, #6366f1 0%, #2563eb 100%);
            color: #fff;
            font-weight: 600;
            padding: 14px 32px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }
        .submit-btn:active {
            transform: translateY(0);
        }
        .map-section {
            padding: 0 0 80px 0;
        }
        .map-container {
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .contact-info {
                padding-right: 0;
            }
        }
        @media (max-width: 768px) {
            .contact-header {
                padding: 60px 0 30px 0;
            }
            .contact-header h1 {
                font-size: 2.2rem;
            }
            .contact-section {
                padding: 60px 0;
            }
            .section-title {
                font-size: 1.8rem;
            }
            .contact-form {
                padding: 30px;
            }
        }
        @media (max-width: 480px) {
            .contact-header h1 {
                font-size: 1.8rem;
            }
            .contact-header p {
                font-size: 1rem;
            }
            .contact-form {
                padding: 20px;
            }
            .map-container {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <header class="contact-header">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Fill out the form or use the info below to get in touch.</p>
    </header>
    <main style="margin-top: 0;">
        <section class="contact-section">
            <div class="container">
                <div class="contact-container">
                    <div class="contact-info">
                        <p class="section-subtitle">Get in Touch</p>
                        <h2 class="section-title">Contact Information</h2>
                        <p class="contact-text">Have a question, feedback, or need support? Reach out to us and our team will get back to you as soon as possible.</p>
                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </div>
                                <div class="contact-text">
                                    <h3>Email</h3>
                                    <p>info@zetrix.com</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <ion-icon name="call-outline"></ion-icon>
                                </div>
                                <div class="contact-text">
                                    <h3>Phone</h3>
                                    <p>+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <ion-icon name="location-outline"></ion-icon>
                                </div>
                                <div class="contact-text">
                                    <h3>Address</h3>
                                    <p>123 Business Street, Suite 100<br>New York, NY 10001</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form id="contactForm"
                        method="POST"  action="/contact">
                        <?php if (!empty($success)) : ?>
                                <div class="custom-alert success-alert">
                                    <strong>✅ Sucssuful!</strong> <?= htmlspecialchars($success) ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="email" class="form-label">Your email</label>
                                <input type="email" id="email" name='email' class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div style="color:red;"><?php if(isset($errors['filed'])) echo $errors['filed'];?></div>
                            <div style="color:red;"><?php if(isset($errors['email not found in database plaes login'])) echo $errors['email not found in database plaes login'];?></div>
                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"  placeholder="Let us know how we can help you" required>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label">Your message</label>
                                <textarea id="message" name='message' class="form-control" rows="6" placeholder="Leave a comment..." required></textarea>
                            </div>
                            <button type="submit" class="submit-btn">Send message</button>
                            <p id="formMessage" style="margin-top:10px;color:var(--accent-color);"></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-section">
            <div class="container">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.11976397304903!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1645564750981!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <a href="#" class="logo">
                    <img src="./assets/images/logo.svg" width="119" height="37" alt="Zetrix home">
                </a>
                <p class="footer-text">
                    Follow us on social media
                </p>
                <ul class="social-list">
                    <li><a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                    <li><a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                    <li><a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
                    <li><a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; 2024 Zetrix. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        // Simple form validation and feedback
        // document.getElementById('contactForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     var email = document.getElementById('email').value.trim();
        //     var subject = document.getElementById('subject').value.trim();
        //     var message = document.getElementById('message').value.trim();
        //     var formMessage = document.getElementById('formMessage');
        //     if (!email || !subject || !message) {
        //         formMessage.textContent = 'Please fill in all fields.';
        //         return;
        //     }
        //     // formMessage.style.color = 'green';
        //     // formMessage.textContent = 'Thank you for contacting us! We will get back to you soon.';
           
        // });
    </script>
</body>
</html>
