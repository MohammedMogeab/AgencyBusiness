# Agency Business Management System

<div align="center">

![Agency Business](https://img.shields.io/badge/Agency-Business-blue)
![PHP](https://img.shields.io/badge/PHP-8.0+-purple)
![XAMPP](https://img.shields.io/badge/XAMPP-8.0+-green)
![License](https://img.shields.io/badge/License-MIT-yellow)
![Branch](https://img.shields.io/badge/Branch-Main-green)

</div>

## 📋 Project Overview

Agency Business Management System is a comprehensive web application designed to streamline and manage agency operations. This system provides a robust platform for handling various aspects of agency business management, with a focus on backend development and system architecture.

## 🚀 Features

- User Authentication & Authorization
- Project Management
- Client Management
- Task Tracking
- Contact Management
- Responsive Design
- Secure Session Handling
- Modern UI/UX
- RESTful API Architecture
- Database Management
- File Upload System

## 🛠️ Technology Stack

- **Backend:** PHP 8.4.2+
- **Server:** Apache (XAMPP)
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript
- **Additional Tools:** 
  - Composer (Dependency Management)
  - Bootstrap (UI Framework)
  - Custom MVC Architecture
  - RESTful API Design

## 👥 Team Members

### Development Team

<table>
  <tr>
    <td align="center">
      <b>Mohammed Ali</b><br>
      <sub>Backend Developer</sub><br>
      <sub>Database Design</sub>
    </td>
    <td align="center">
      <b>Mohammed Mogeab Ahmed Al-hajj</b><br>
      <sub>Backend Developer</sub><br>
      <sub>System Architecture</sub>
    </td>
    <td align="center">
      <b>Mobarak Asharf</b><br>
      <sub>Backend Developer</sub><br>
      <sub>API Development</sub>
    </td>
  </tr>
</table>

## 🏗️ Project Structure

```
C:.
│   .gitignore
│   bootstrap.php
│   composer.json
│   composer.lock
│   config.php
│   Database_web.1.1.1.sql
│   README.md
│   routes.php
│   s
│
├───assets
│   ├───css
│   │       about.css
│   │       base.css
│   │       contact.css
│   │       footer.css
│   │       header.css
│   │       home.css
│   │       projects.css
│   │
│   └───images
│           blog-1.jpg
│           blog-2.jpg
│           logo-light.svg
│
├───core
│   │   App.php
│   │   Authenticator.php
│   │   Container.php
│   │   Database.php
│   │   functions.php
│   │   Response.php
│   │   Router.php
│   │   session.php
│   │   ValidationException.php
│   │   validator.php
│   │
│   └───middleware
│           Authenticated.php
│           Guest.php
│           Middleware.php
│
├───database
├───Http
│   │   new.txt
│   │
│   └───Controllers
│       │   about.php
│       │   contact.php
│       │   index.php
│       │
│       ├───blogs
│       │       show.php
│       │
│       ├───ForgetPassword
│       │       create.php
│       │       store.php
│       │
│       ├───manage
│       │       dashboard.php
│       │
│       ├───project
│       │       create.php
│       │       show.php
│       │
│       ├───projects
│       │       projects.php
│       │       store.php
│       │
│       ├───registration
│       │       create.php
│       │       store.php
│       │
│       └───sessions
│               create.php
│               destory.php
│               store.php
│
├───public
│   │   .htaccess
│   │   check.php
│   │   index.php
│   │
│   └───assets
│       ├───css
│       │       about.css
│       │       base.css
│       │       contact.css
│       │       footer.css
│       │       header.css
│       │       home.css
│       │       projects.css
│       │
│       └───images
│               blog-1.jpg
│               blog-2.jpg
│               logo-light.svg
│
├───vendor
│   │   autoload.php
│   │
│   ├───composer
│   │       autoload_classmap.php
│   │       autoload_namespaces.php
│   │       autoload_psr4.php
│   │       autoload_real.php
│   │       autoload_static.php
│   │       ClassLoader.php
│   │       installed.json
│   │       installed.php
│   │       InstalledVersions.php
│   │       LICENSE
│   │       platform_check.php
│   │
│   └───phpmailer
│       └───phpmailer
│           │   COMMITMENT
│           │   composer.json
│           │   get_oauth_token.php
│           │   LICENSE
│           │   README.md
│           │   SECURITY.md
│           │   SMTPUTF8.md
│           │   VERSION
│           │
│           ├───language
│           │       phpmailer.lang-af.php
│           │       phpmailer.lang-ar.php
│           │       phpmailer.lang-as.php
│           │       phpmailer.lang-az.php
│           │       phpmailer.lang-ba.php
│           │       phpmailer.lang-be.php
│           │       phpmailer.lang-bg.php
│           │       phpmailer.lang-bn.php
│           │       phpmailer.lang-ca.php
│           │       phpmailer.lang-cs.php
│           │       phpmailer.lang-da.php
│           │       phpmailer.lang-de.php
│           │       phpmailer.lang-el.php
│           │       phpmailer.lang-eo.php
│           │       phpmailer.lang-es.php
│           │       phpmailer.lang-et.php
│           │       phpmailer.lang-fa.php
│           │       phpmailer.lang-fi.php
│           │       phpmailer.lang-fo.php
│           │       phpmailer.lang-fr.php
│           │       phpmailer.lang-gl.php
│           │       phpmailer.lang-he.php
│           │       phpmailer.lang-hi.php
│           │       phpmailer.lang-hr.php
│           │       phpmailer.lang-hu.php
│           │       phpmailer.lang-hy.php
│           │       phpmailer.lang-id.php
│           │       phpmailer.lang-it.php
│           │       phpmailer.lang-ja.php
│           │       phpmailer.lang-ka.php
│           │       phpmailer.lang-ko.php
│           │       phpmailer.lang-ku.php
│           │       phpmailer.lang-lt.php
│           │       phpmailer.lang-lv.php
│           │       phpmailer.lang-mg.php
│           │       phpmailer.lang-mn.php
│           │       phpmailer.lang-ms.php
│           │       phpmailer.lang-nb.php
│           │       phpmailer.lang-nl.php
│           │       phpmailer.lang-pl.php
│           │       phpmailer.lang-pt.php
│           │       phpmailer.lang-pt_br.php
│           │       phpmailer.lang-ro.php
│           │       phpmailer.lang-ru.php
│           │       phpmailer.lang-si.php
│           │       phpmailer.lang-sk.php
│           │       phpmailer.lang-sl.php
│           │       phpmailer.lang-sr.php
│           │       phpmailer.lang-sr_latn.php
│           │       phpmailer.lang-sv.php
│           │       phpmailer.lang-tl.php
│           │       phpmailer.lang-tr.php
│           │       phpmailer.lang-uk.php
│           │       phpmailer.lang-ur.php
│           │       phpmailer.lang-vi.php
│           │       phpmailer.lang-zh.php
│           │       phpmailer.lang-zh_cn.php
│           │
│           └───src
│                   DSNConfigurator.php
│                   Exception.php
│                   OAuth.php
│                   OAuthTokenProvider.php
│                   PHPMailer.php
│                   POP3.php
│                   SMTP.php
│
└───views
    │   403.php
    │   404.php
    │   about.view.php
    │   contact.view.php
    │   index.view.php
    │   projects.view.php
    │
    ├───assets
    │   ├───css
    │   │       about.css
    │   │       base.css
    │   │       contact.css
    │   │       footer.css
    │   │       header.css
    │   │       home.css
    │   │       style.css
    │   └───images
    │           blog-1.jpg
    │           blog-2.jpg
    │           logo-light.svg
    │
    ├───blogs
    │       blog.php
    │
    ├───ForgetPassword
    │
    │       dashboard.view.php
    │
    ├───partials
    │       footer.php
    │       header.php
    │
    ├───project
    │       create.view.php
    │       new.txt
    │       show.view.php
    │
    ├───projects
    ├───registration
    │       create.view.php
    │
    └───session
            create.view.php
```

## 🚀 Getting Started

### Prerequisites

- XAMPP (PHP 8.4.2+)
- MySQL
- Composer (for dependency management)

### XAMPP Configuration

1. Open XAMPP Control Panel
2. Click on "Config" button next to Apache
3. Select "Apache (httpd.conf)"
4. Find and modify these lines:
   ```apache
   DocumentRoot "C:/xampp/htdocs/AgencyBusiness/public"
   <Directory "C:/xampp/htdocs/AgencyBusiness/public">
   ```
5. Save the file
6. Restart Apache in XAMPP Control Panel

### Installation

1. Clone the repository:
   ```bash
   git clone [repository-url]
   ```

2. Navigate to project directory:
   ```bash
   cd AgencyBusiness
   ```

3. Switch to main branch (if not already on it):
   ```bash
   git checkout main
   ```

4. Configure your database in `config.php`

5. Start XAMPP and ensure Apache and MySQL are running

6. Access the application:
   ```
   http://localhost/
   ```

## 🔒 Security

- All user inputs are validated and sanitized
- Password hashing implemented
- Session security measures in place
- CSRF protection enabled
- XSS prevention measures
- SQL Injection prevention
- Secure API endpoints

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Contributing

1. Always work on the main branch
2. Pull the latest changes before starting work:
   ```bash
   git pull origin main
   ```
3. Make your changes
4. Test thoroughly
5. Commit your changes:
   ```bash
   git commit -m 'Description of changes'
   ```
6. Push to main:
   ```bash
   git push origin main
   ```

## 📞 Contact

For any queries or support, please contact the development team.

---

<div align="center">
Made with ❤️ by the Agency Business Team
</div>
