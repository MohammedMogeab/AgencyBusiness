use web;
set foreign_key_checks=1;
create table users(user_id int primary key,user_name varchar(50),user_password varchar(15) not null,email varchar(25) not null,photo varchar(255),user_type varchar(25) );
create table blogs(blog_id int primary key,description_blog text,photo varchar(255));

create table products(product_id int primary key,product_name varchar(255),large_description text
,short_description text,photo varchar(255),product_version varchar(10),product_video varchar(255),pric varchar(10) );

create table product_featuer(product_id int,features varchar(500),constraint foreign key(product_id) references products(product_id) on delete cascade );

alter table products add column blog_id int;
alter table products add constraint fk_blogid_blogs foreign key(blog_id) references blogs(blog_id);

create table developers(developer_id int primary key,developer_name varchar(40));

create table developers_accounts(developer_id int ,account_type varchar(20),account_link varchar(255),constraint foreign key(developer_id) references developers(developer_id) on delete cascade);

create table categorys(category_id int primary key,product_id int ,category_name varchar(50),constraint foreign key (product_id) references products(product_id)on delete set null);

create table laguage(laguage_id int primary key,product_id int ,laguage_name varchar(50),constraint foreign key (product_id) references products(product_id)on delete set null);

create table main_comment(main_comment_id int primary key,product_id int ,dates date,constraint foreign key (product_id) references products(product_id)on delete cascade);

drop table categorys;

create table categorys(category_id int primary key ,category_name varchar(50));


alter table products add category_id int;



create table user_buy_product(user_id int,product_id int,dates date ,price varchar (10),constraint foreign key (user_id) references users(user_id) on delete cascade ,constraint foreign key (product_id) references products(product_id) on delete cascade);

create table user_likes_product(user_id int,product_id int,constraint foreign key (user_id) references users(user_id) on delete cascade ,constraint foreign key (product_id) references products(product_id) on delete cascade);

create table user_review_product(user_id int,product_id int,rate int,constraint foreign key (user_id) references users(user_id) on delete cascade ,constraint foreign key (product_id) references products(product_id) on delete cascade);


create table product_developer(developer_id int,product_id int 
,constraint foreign key (developer_id) references developers(developer_id) on delete set null 
,constraint foreign key (product_id) references products(product_id) on delete set null);

create table user_comment_main_comment(user_id int,main_comment_id int ,dates date,content varchar(255)
,constraint foreign key (user_id) references users(user_id) on delete set null 
,constraint foreign key (main_comment_id ) references main_comment(main_comment_id ) on delete set null);


create table user_like_main_comment(user_id int,main_comment_id int 
,constraint foreign key (user_id) references users(user_id) on delete set null 
,constraint foreign key (main_comment_id ) references main_comment(main_comment_id ) on delete set null);

alter table users modify user_id int auto_increment;

alter table products modify product_id int auto_increment;

alter table laguage modify laguage_id int auto_increment;

alter table categorys modify category_id int auto_increment;

alter table blogs modify blog_id int auto_increment;
alter table developers modify developer_id int auto_increment;
alter table main_comment modify main_comment_id int auto_increment;



CREATE TABLE `projects`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NULL,
    `description` TEXT NULL,
    `status` VARCHAR(50) NULL,
    `client_name` VARCHAR(255) NULL,
    `start_date` DATE NULL,
    `main_image` VARCHAR(255) NULL,
    `progress` INT NULL,
    `budget` INT NULL,
    `duration` INT NULL
);
create table `project_overviews` (
	`id` int primary key auto_increment,
    `project_id` int not null,
    `overview` varchar(255) not null
);
CREATE TABLE `project_gallery`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `image_url` VARCHAR(255) NULL,
    `caption` VARCHAR(255) NULL
);
CREATE TABLE `project_timeline`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `title` VARCHAR(255) NULL,
    `date` DATE NULL,
    `description` TEXT NULL
);
CREATE TABLE `project_team`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `name` VARCHAR(255) NULL,
    `role` VARCHAR(255) NULL,
    `avatar` VARCHAR(255) NULL,
    `linkedin` VARCHAR(255) NULL,
    `github` VARCHAR(255) NULL,
    `twitter` VARCHAR(255) NULL
);
CREATE TABLE `project_technologies`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `technology` VARCHAR(100) NULL,
    `description` VARCHAR(255) NULL
);
CREATE TABLE `project_reviews`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `reviewer_name` VARCHAR(255) NULL,
    `reviewer_role` VARCHAR(255) NULL,
    `rating` FLOAT(53) NULL,
    `review` TEXT NULL,
    `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP());
CREATE TABLE `project_resources`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `resource_name` VARCHAR(255) NULL,
    `resource_url` VARCHAR(255) NULL,
    `type` VARCHAR(50) NULL
);
CREATE TABLE `project_faq`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `question` VARCHAR(255) NULL,
    `answer` TEXT NULL
);
CREATE TABLE `project_milestones`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `milestone` VARCHAR(255) NULL,
    `badge_color` VARCHAR(50) NULL
);
CREATE TABLE `related_projects`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `project_id` INT NULL,
    `related_project_id` INT NULL
);
ALTER TABLE
    `project_faq` ADD CONSTRAINT `project_faq_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_milestones` ADD CONSTRAINT `project_milestones_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_resources` ADD CONSTRAINT `project_resources_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_team` ADD CONSTRAINT `project_team_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_reviews` ADD CONSTRAINT `project_reviews_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `related_projects` ADD CONSTRAINT `related_projects_related_project_id_foreign` FOREIGN KEY(`related_project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_gallery` ADD CONSTRAINT `project_gallery_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_technologies` ADD CONSTRAINT `project_technologies_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `project_timeline` ADD CONSTRAINT `project_timeline_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);
ALTER TABLE
    `related_projects` ADD CONSTRAINT `related_projects_project_id_foreign` FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`);

alter table projects add vidio varchar(255) null;
alter table projects add overview varchar(255) null;
alter table projects add users_impacted varchar(255) null;
alter table projects add lines_of_code varchar(255) null;
alter table projects add countries_deployed varchar(255) null;
alter table projects add project_overview varchar(255) null;
Alter table project_overviews add constraint `project_overviews_project_id_foreign` foreign key(project_id) references projects(id);


INSERT INTO users (user_name, user_password, email, photo, user_type) VALUES
('mohammed', 'password123', 'john@example.com', 'user/user1.jpg', 'admin'),
('ahmed anwer', 'securePass', 'jane@example.com', 'user/user2.jpg', 'user'),
('mubarak ashraf', 'mikePass456', 'mike@example.com', 'user/user3.jpg', 'user'),
('ali', 'alicePass789', 'alice@example.com', 'user/user4.jpg', 'admin'),
('osama ahmed', 'bobSecure', 'bob@example.com', 'user/user5.jpg', 'developer'),
('soltan ali', 'charlie123', 'charlie@example.com', 'user/user6.jpg', 'user'),
('mohammed soltan', 'davidPass', 'david@example.com', 'user/user7.jpg', 'user');

INSERT INTO blogs (description_blog, photo) VALUES
('The Future of AI', 'blog/blog1.jpg'),
('Web Development Trends', 'blog/blog2.jpg'),
('Cybersecurity Best Practices', 'blog/blog3.jpg'),
('The Rise of Cloud Computing', 'blog/blog4.jpg'),
('Why Open Source Matters', 'blog/blog5.jpg'),
('Machine Learning Innovations', 'blog/blog6.jpg'),
('The Role of Databases in Modern Apps', 'blog/blog7.jpg');



INSERT INTO products (product_name, large_description, short_description, photo, product_version, product_video, pric, blog_id, category_id) VALUES
('AI Assistant', 
 'The AI Assistant is an advanced, intelligent tool designed to help users automate tasks, answer questions, and provide recommendations. 
  Powered by cutting-edge machine learning algorithms, it continuously learns from user interactions, improving over time. 
  The AI Assistant supports voice recognition, text-based queries, and natural language processing, making it an indispensable tool for businesses and individuals alike. 
  It integrates seamlessly with third-party applications, enabling users to schedule meetings, set reminders, and even control smart home devices.', 
 'AI-based personal assistant', 
 'product/product1.jpg', '1.0', 'video/product1.mp4', '99', 1, 1),

('Web Builder', 
 'The Web Builder is an intuitive drag-and-drop website development platform designed for both beginners and professionals. 
  With a vast library of pre-designed templates and a powerful backend, users can create stunning websites without any coding knowledge. 
  It supports custom domain integration, SEO optimization, e-commerce functionalities, and responsive design, ensuring websites look great on any device. 
  Advanced users can also leverage its built-in HTML, CSS, and JavaScript editor for further customization.', 
 'Drag & drop website builder', 
 'product/product2.jpg', '2.5', 'video/product2.mp4', '120', 2, 2),

('CyberSec Suite', 
 'CyberSec Suite is a state-of-the-art cybersecurity software package designed to protect users from online threats. 
  It features real-time threat detection, firewall protection, anti-phishing measures, and malware scanning. 
  The suite continuously updates its database with the latest security threats, ensuring users are always protected. 
  Ideal for individuals and businesses, it provides network monitoring tools, encrypted VPN services, and secure password management.', 
 'Advanced cybersecurity protection', 
 'product/product3.jpg', '3.1', 'video/product3.mp4', '89', 3, 3),

('Cloud Storage', 
 'Cloud Storage is a high-speed, secure, and scalable cloud-based file storage solution. 
  Designed to meet the needs of individuals and businesses, it offers seamless file synchronization across multiple devices. 
  The platform supports automatic backups, end-to-end encryption, and file-sharing capabilities with custom access permissions. 
  Users can take advantage of collaborative tools, version history tracking, and AI-powered search features to easily retrieve their files.', 
 'Secure cloud file storage', 
 'product/product4.jpg', '5.0', 'video/product4.mp4', '75', 4, 4),

('Open Source Tool', 
 'The Open Source Tool is a comprehensive development environment that provides developers with robust, community-driven software solutions. 
  It includes an integrated code editor, version control system, debugging tools, and collaborative coding features. 
  The tool is fully customizable, allowing developers to extend its functionalities using plugins and API integrations. 
  It supports multiple programming languages and frameworks, making it an essential tool for software engineers.', 
 'Developer-friendly open-source tool', 
 'product/product5.jpg', '1.8', 'video/product5.mp4', '49', 5, 5),

('ML API', 
 'The Machine Learning API is a powerful, cloud-based API service designed to provide developers with pre-trained machine learning models. 
  It supports various AI functionalities, including image recognition, natural language processing, speech-to-text, and recommendation systems. 
  The API is easy to integrate with existing applications and can be used for building intelligent automation workflows. 
  Developers can also train custom models using the platform’s user-friendly interface and extensive dataset library.', 
 'AI-powered API for developers', 
 'product/product6.jpg', '2.3', 'video/product6.mp4', '150', 6, 6),

('Database Manager', 
 'Database Manager is a comprehensive software tool designed to help database administrators and developers manage and optimize relational databases. 
  It provides a visual interface for database creation, query execution, performance analysis, and backup management. 
  The tool supports multiple database engines, including MySQL, PostgreSQL, and SQL Server. 
  Advanced features include automated indexing, query optimization, and data migration capabilities, making it an indispensable tool for database professionals.', 
 'All-in-one database management tool', 
 'product/product7.jpg', '4.0', 'video/product7.mp4', '110', 7, 7);

INSERT INTO categorys (category_name) VALUES
('AI Tools'),
('Web Development'),
('Cybersecurity'),
('Cloud Services'),
('Open Source'),
('Machine Learning'),
('Database Management');



INSERT INTO laguage (laguage_name, product_id) VALUES
('Python', 8),
('JavaScript', 9),
('Java', 10),
('C++', 11),
('PHP', 12),
('Swift', 13),
('GoLang', 14);

INSERT INTO user_buy_product (user_id, product_id, dates, price) VALUES
(4, 8, '2024-02-01', '99'),
(5, 9, '2024-02-02', '120'),
(6, 10, '2024-02-03', '89'),
(7, 11, '2024-02-04', '75'),
(8, 12, '2024-02-05', '49'),
(9, 13, '2024-02-06', '150'),
(10, 14, '2024-02-07', '110');

INSERT INTO developers (developer_name) VALUES
('Alice Dev'),
('Bob Dev'),
('Charlie Dev'),
('David Dev'),
('Eve Dev'),
('Frank Dev'),
('Grace Dev');


INSERT INTO main_comment (product_id, dates) VALUES
(8, '2025-02-01'),
(9, '2025-02-02'),
(10, '2025-02-03'),
(11, '2025-02-04'),
(12, '2025-02-05');

INSERT INTO user_comment_main_comment (user_id, main_comment_id, dates, content) VALUES
(4, 1, '2025-02-01', 'I really love this product!'),
(5, 2, '2025-02-01', 'Same here! The quality is amazing.'),
(6, 3, '2025-02-02', 'Could be better, but not bad.'),
(7, 4, '2025-02-03', 'Does it support multiple languages?'),
(8, 5, '2025-02-04', 'Where can I buy this?');

INSERT INTO user_like_main_comment (user_id, main_comment_id) VALUES
(4, 1), -- User 4 likes comment 11
(5, 1), -- User 5 likes comment 11
(6, 2), -- User 6 likes comment 12
(7, 3), -- User 7 likes comment 13
(8, 3), -- User 8 likes comment 13
(9, 4), -- User 9 likes comment 14
(5, 4), -- User 5 also likes comment 12
(6, 5), -- User 6 also likes comment 13
(7, 5), -- User 7 also likes comment 14
(8, 5); -- User 8 also likes comment 11


INSERT INTO user_likes_product (user_id, product_id) VALUES
(4, 8), -- User 4 likes Product 8
(5, 9), -- User 5 likes Product 9
(6, 10), -- User 6 likes Product 10
(7, 11), -- User 7 likes Product 11
(8, 12), -- User 8 likes Product 12
(9, 13), -- User 9 likes Product 13
(10, 14); -- User 10 likes Product 14


INSERT INTO user_review_product (user_id, product_id, rate) VALUES
(4, 8, 5), -- User 4 rates Product 8 with 5 stars
(5, 9, 4), -- User 5 rates Product 9 with 4 stars
(6, 10, 3), -- User 6 rates Product 10 with 3 stars
(7, 11, 5), -- User 7 rates Product 11 with 5 stars
(8, 12, 2), -- User 8 rates Product 12 with 2 stars
(9, 13, 4), -- User 9 rates Product 13 with 4 stars
(10, 14, 5); -- User 10 rates Product 14 with 5 stars

INSERT INTO product_developer (developer_id, product_id) VALUES
(1, 8), -- Developer 1 worked on Product 8
(2, 9), -- Developer 2 worked on Product 9
(3, 10), -- Developer 3 worked on Product 10
(4, 11), -- Developer 4 worked on Product 11
(5, 12), -- Developer 5 worked on Product 12
(6, 13), -- Developer 6 worked on Product 13
(7, 14); -- Developer 7 worked on Product 14


INSERT INTO product_featuer (product_id, features) VALUES
(8, 'Feature A, Feature B, Feature C'), -- Product 8 features
(9, 'Feature D, Feature E, Feature F'), -- Product 9 features
(10, 'Feature G, Feature H, Feature I'), -- Product 10 features
(11, 'Feature J, Feature K, Feature L'), -- Product 11 features
(12, 'Feature M, Feature N, Feature O'), -- Product 12 features
(13, 'Feature P, Feature Q, Feature R'), -- Product 13 features
(14, 'Feature S, Feature T, Feature U'); -- Product 14 features



INSERT INTO developers_accounts (developer_id, account_type, account_link) VALUES
(1, 'GitHub', 'https://github.com/developer1'), -- Developer 1 GitHub account
(2, 'LinkedIn', 'https://linkedin.com/in/developer2'), -- Developer 2 LinkedIn account
(3, 'Twitter', 'https://twitter.com/developer3'), -- Developer 3 Twitter account
(4, 'GitHub', 'https://github.com/developer4'), -- Developer 4 GitHub account
(5, 'LinkedIn', 'https://linkedin.com/in/developer5'), -- Developer 5 LinkedIn account
(6, 'Twitter', 'https://twitter.com/developer6'), -- Developer 6 Twitter account
(7, 'GitHub', 'https://github.com/developer7'); -- Developer 7 GitHub account


-- Insert 15 projects
INSERT INTO projects (title, description, status, client_name, start_date, main_image, progress, budget, duration, vidio) VALUES
('E-Commerce Platform', 'A full-featured online shopping platform with payment integration', 'Completed', 'ShopMaster Inc.', '2022-01-15', 'ecommerce.jpg', 100, 50000, 180, 'ecommerce-demo.mp4'),
('Healthcare Portal', 'Patient management system for clinics', 'In Progress', 'MediCare Group', '2022-03-10', 'healthcare.jpg', 75, 35000, 120, 'healthcare-walkthrough.mp4'),
('School Management System', 'Digital platform for school administration', 'Completed', 'EduFuture Schools', '2021-11-05', 'school.jpg', 100, 28000, 90, 'school-system.mp4'),
('Travel Booking App', 'Mobile app for flight and hotel bookings', 'In Progress', 'Wanderlust Travel', '2022-05-20', 'travel.jpg', 60, 42000, 150, 'travel-app-preview.mp4'),
('Fitness Tracker', 'Wearable integration and analytics dashboard', 'Planning', 'FitLife Tech', '2022-07-01', 'fitness.jpg', 10, 25000, 200, NULL),
('Real Estate Portal', 'Property listing and virtual tours platform', 'Completed', 'UrbanHomes', '2021-09-12', 'realestate.jpg', 100, 38000, 160, 'property-tour.mp4'),
('Food Delivery Service', 'Restaurant aggregation and delivery app', 'In Progress', 'QuickBites', '2022-04-05', 'food.jpg', 85, 45000, 140, 'delivery-app.mp4'),
('Banking Application', 'Mobile banking with biometric authentication', 'Completed', 'First National Bank', '2021-12-15', 'banking.jpg', 100, 60000, 210, 'banking-security.mp4'),
('Event Management System', 'Platform for organizing and selling event tickets', 'Planning', 'EventPro', '2022-08-10', 'events.jpg', 15, 30000, 180, NULL),
('Social Media Dashboard', 'Analytics tool for social media managers', 'In Progress', 'SocialMetrics', '2022-02-28', 'social.jpg', 50, 32000, 120, 'dashboard-features.mp4'),
('Car Rental System', 'Online platform for vehicle rentals', 'Completed', 'AutoFlex', '2021-10-22', 'carrental.jpg', 100, 40000, 150, 'rental-process.mp4'),
('Job Portal', 'Recruitment platform for employers and candidates', 'In Progress', 'CareerConnect', '2022-06-15', 'jobs.jpg', 70, 36000, 130, 'job-portal.mp4'),
('Gaming Platform', 'Cloud-based gaming service', 'Planning', 'NextGen Games', '2022-09-01', 'gaming.jpg', 5, 55000, 240, NULL),
('Inventory Management', 'Warehouse and stock control system', 'Completed', 'LogiSolutions', '2021-08-18', 'inventory.jpg', 100, 28000, 90, 'inventory-demo.mp4'),
('Weather Forecasting App', 'Real-time weather data visualization', 'In Progress', 'ClimateTech', '2022-03-25', 'weather.jpg', 40, 22000, 100, 'weather-app.mp4');

-- Insert project gallery images (15 per project - showing first 3 projects for brevity)
INSERT INTO project_gallery (project_id, image_url, caption) VALUES
-- Project 1
(1, 'ecom-product.jpg', 'Product listing page'),
(1, 'ecom-cart.jpg', 'Shopping cart interface'),
(1, 'ecom-checkout.jpg', 'Secure checkout process'),
(1, 'ecom-admin.jpg', 'Admin dashboard'),
(1, 'ecom-mobile.jpg', 'Mobile responsive design'),
(1, 'ecom-search.jpg', 'Advanced search functionality'),
(1, 'ecom-categories.jpg', 'Product categories'),
(1, 'ecom-reviews.jpg', 'Customer reviews section'),
(1, 'ecom-wishlist.jpg', 'Wishlist feature'),
(1, 'ecom-analytics.jpg', 'Sales analytics'),
(1, 'ecom-payment.jpg', 'Payment gateway integration'),
(1, 'ecom-shipping.jpg', 'Shipping options'),
(1, 'ecom-discounts.jpg', 'Discount management'),
(1, 'ecom-notifications.jpg', 'Notification system'),
(1, 'ecom-security.jpg', 'Security features'),

-- Project 2
(2, 'health-dashboard.jpg', 'Doctor dashboard'),
(2, 'health-patient.jpg', 'Patient profile'),
(2, 'health-appointment.jpg', 'Appointment scheduling'),
(2, 'health-records.jpg', 'Medical records'),
(2, 'health-prescription.jpg', 'E-prescriptions'),
(2, 'health-lab.jpg', 'Lab results integration'),
(2, 'health-billing.jpg', 'Billing system'),
(2, 'health-mobile.jpg', 'Mobile app version'),
(2, 'health-notifications.jpg', 'Appointment reminders'),
(2, 'health-analytics.jpg', 'Clinic analytics'),
(2, 'health-security.jpg', 'HIPAA compliance'),
(2, 'health-messaging.jpg', 'Secure messaging'),
(2, 'health-portal.jpg', 'Patient portal'),
(2, 'health-calendar.jpg', 'Scheduling calendar'),
(2, 'health-reports.jpg', 'Medical reports'),

-- Project 3
(3, 'school-dashboard.jpg', 'Admin dashboard'),
(3, 'school-student.jpg', 'Student management'),
(3, 'school-teacher.jpg', 'Teacher portal'),
(3, 'school-attendance.jpg', 'Attendance tracking'),
(3, 'school-grades.jpg', 'Gradebook system'),
(3, 'school-timetable.jpg', 'Class scheduling'),
(3, 'school-library.jpg', 'Library management'),
(3, 'school-fees.jpg', 'Fee payment system'),
(3, 'school-parent.jpg', 'Parent portal'),
(3, 'school-reports.jpg', 'Report generation'),
(3, 'school-messaging.jpg', 'Communication system'),
(3, 'school-elearning.jpg', 'E-learning integration'),
(3, 'school-transport.jpg', 'Transport management'),
(3, 'school-inventory.jpg', 'School inventory'),
(3, 'school-security.jpg', 'Access control system');

-- Continuing with other tables (showing sample inserts for each)

-- Project timeline (15 entries for first project)
INSERT INTO project_timeline (project_id, title, date, description) VALUES
(1, 'Requirement Gathering', '2022-01-20', 'Initial meetings with client to gather requirements'),
(1, 'UI/UX Design', '2022-02-05', 'Created wireframes and design mockups'),
(1, 'Database Design', '2022-02-15', 'Completed database schema and relationships'),
(1, 'Backend Setup', '2022-02-20', 'Established API endpoints and core functionality'),
(1, 'Frontend Development', '2022-03-10', 'Started building user interfaces'),
(1, 'Payment Integration', '2022-03-25', 'Integrated Stripe payment gateway'),
(1, 'Admin Panel', '2022-04-05', 'Developed admin dashboard and tools'),
(1, 'Testing Phase', '2022-04-20', 'Comprehensive testing and bug fixing'),
(1, 'User Feedback', '2022-05-05', 'Collected feedback from beta testers'),
(1, 'Performance Optimization', '2022-05-15', 'Improved loading speeds and efficiency'),
(1, 'Security Audit', '2022-05-25', 'Conducted security review and enhancements'),
(1, 'Content Population', '2022-06-05', 'Added initial products and categories'),
(1, 'Training', '2022-06-15', 'Trained client staff on system usage'),
(1, 'Soft Launch', '2022-06-25', 'Limited release to select users'),
(1, 'Full Launch', '2022-07-05', 'Public release and marketing campaign');

-- Project team (15 members across projects)
INSERT INTO project_team (project_id, name, role, avatar, linkedin, github, twitter) VALUES
(1, 'John Smith', 'Project Manager', 'john.jpg', 'linkedin.com/john', 'github.com/john', 'twitter.com/john'),
(1, 'Sarah Johnson', 'Lead Developer', 'sarah.jpg', 'linkedin.com/sarah', 'github.com/sarah', 'twitter.com/sarah'),
(1, 'Mike Chen', 'UI/UX Designer', 'mike.jpg', 'linkedin.com/mike', 'github.com/mike', 'twitter.com/mike'),
(2, 'Emily Wilson', 'Backend Developer', 'emily.jpg', 'linkedin.com/emily', 'github.com/emily', 'twitter.com/emily'),
(2, 'David Brown', 'Frontend Developer', 'david.jpg', 'linkedin.com/david', 'github.com/david', 'twitter.com/david'),
(3, 'Lisa Zhang', 'Full Stack Developer', 'lisa.jpg', 'linkedin.com/lisa', 'github.com/lisa', 'twitter.com/lisa'),
(3, 'Robert Taylor', 'QA Engineer', 'robert.jpg', 'linkedin.com/robert', 'github.com/robert', 'twitter.com/robert'),
(4, 'Jennifer Lee', 'DevOps Engineer', 'jennifer.jpg', 'linkedin.com/jennifer', 'github.com/jennifer', 'twitter.com/jennifer'),
(4, 'Thomas Wilson', 'Database Admin', 'thomas.jpg', 'linkedin.com/thomas', 'github.com/thomas', 'twitter.com/thomas'),
(5, 'Amanda Clark', 'Product Owner', 'amanda.jpg', 'linkedin.com/amanda', 'github.com/amanda', 'twitter.com/amanda'),
(6, 'James Rodriguez', 'Scrum Master', 'james.jpg', 'linkedin.com/james', 'github.com/james', 'twitter.com/james'),
(7, 'Patricia Kim', 'UX Researcher', 'patricia.jpg', 'linkedin.com/patricia', 'github.com/patricia', 'twitter.com/patricia'),
(8, 'Daniel Park', 'Security Specialist', 'daniel.jpg', 'linkedin.com/daniel', 'github.com/daniel', 'twitter.com/daniel'),
(9, 'Michelle Garcia', 'Content Strategist', 'michelle.jpg', 'linkedin.com/michelle', 'github.com/michelle', 'twitter.com/michelle'),
(10, 'Christopher Martinez', 'Mobile Developer', 'chris.jpg', 'linkedin.com/chris', 'github.com/chris', 'twitter.com/chris');

-- Project technologies (15 entries across projects)
INSERT INTO project_technologies (project_id, technology, description) VALUES
(1, 'React', 'Frontend framework'),
(1, 'Node.js', 'Backend runtime'),
(1, 'MongoDB', 'NoSQL database'),
(1, 'Stripe', 'Payment processing'),
(2, 'Angular', 'Frontend framework'),
(2, 'Java Spring', 'Backend framework'),
(2, 'PostgreSQL', 'Relational database'),
(3, 'Vue.js', 'Frontend framework'),
(3, 'Laravel', 'PHP framework'),
(4, 'Flutter', 'Cross-platform mobile'),
(5, 'React Native', 'Mobile framework'),
(6, 'Django', 'Python framework'),
(7, 'Kotlin', 'Android development'),
(8, 'Swift', 'iOS development'),
(9, '.NET Core', 'Microsoft framework');

-- Project reviews (15 entries across projects)
INSERT INTO project_reviews (project_id, reviewer_name, reviewer_role, rating, review) VALUES
(1, 'Alex Turner', 'CEO at ShopMaster', 5.0, 'Excellent work! The platform exceeded our expectations.'),
(1, 'Jamie Wilson', 'Marketing Director', 4.5, 'Great user experience and smooth checkout process.'),
(2, 'Dr. Sarah Miller', 'Clinic Director', 4.8, 'Has significantly improved our patient management.'),
(3, 'Michael Brown', 'School Principal', 5.0, 'Transformed our administrative processes completely.'),
(4, 'Emma Davis', 'Travel Manager', 4.2, 'Users love the intuitive booking interface.'),
(5, 'Ryan Johnson', 'Fitness Director', 4.0, 'Early results look promising for our members.'),
(6, 'Sophia Martinez', 'Real Estate Broker', 4.7, 'Virtual tours feature is a game changer.'),
(7, 'David Wilson', 'Restaurant Owner', 4.3, 'Delivery tracking works flawlessly.'),
(8, 'Olivia Thompson', 'Bank Manager', 4.9, 'Secure and user-friendly banking solution.'),
(9, 'Ethan Anderson', 'Event Planner', 4.1, 'Ticket management is so much easier now.'),
(10, 'Ava Thomas', 'Social Media Manager', 4.6, 'Dashboard provides valuable insights.'),
(11, 'Noah White', 'Rental Manager', 4.4, 'Online bookings have increased by 40%.'),
(12, 'Isabella Lee', 'HR Director', 4.0, 'Effective platform for recruitment.'),
(13, 'Liam Harris', 'Gaming Director', 3.8, 'Still in early stages but shows potential.'),
(14, 'Mia Clark', 'Warehouse Manager', 4.5, 'Inventory tracking is now accurate and efficient.');

-- Project resources (15 entries across projects)
INSERT INTO project_resources (project_id, resource_name, resource_url, type) VALUES
(1, 'Design Mockups', 'shopmaster-mockups.fig', 'Design'),
(1, 'API Documentation', 'api-docs.shopmaster.com', 'Documentation'),
(1, 'Style Guide', 'styleguide.shopmaster.com', 'Design'),
(2, 'HIPAA Compliance', 'hipaa-requirements.pdf', 'Documentation'),
(3, 'School Database Schema', 'school-schema.sql', 'Database'),
(4, 'Flight API Keys', 'flight-api-config.json', 'Configuration'),
(5, 'Fitness Data Models', 'fitness-models.pdf', 'Documentation'),
(6, 'Property Image Gallery', 'property-images.zip', 'Assets'),
(7, 'Menu JSON Structure', 'menu-structure.json', 'Data'),
(8, 'Banking Security Specs', 'security-specs.pdf', 'Documentation'),
(9, 'Ticket Scanning App', 'ticket-scanner.apk', 'Application'),
(10, 'Social API Credentials', 'api-credentials.env', 'Configuration'),
(11, 'Vehicle Database', 'vehicles.csv', 'Data'),
(12, 'Resume Parser', 'resume-parser.py', 'Script'),
(13, 'Game Assets', 'game-assets.zip', 'Assets'),
(14, 'Inventory CSV Template', 'inventory-template.csv', 'Template');

-- Project FAQ (15 entries across projects)
INSERT INTO project_faq (project_id, question, answer) VALUES
(1, 'How do I add new products?', 'Use the admin dashboard to add products with images, descriptions, and pricing.'),
(1, 'Can I offer discount codes?', 'Yes, the system supports creating and managing discount codes.'),
(2, 'Is patient data encrypted?', 'All PHI is encrypted at rest and in transit for HIPAA compliance.'),
(3, 'How do parents access the portal?', 'Parents receive unique login credentials from the school admin.'),
(4, 'Can users book multi-city trips?', 'Yes, the itinerary builder supports complex travel plans.'),
(5, 'Does it sync with Apple Health?', 'Integration with Apple Health and Google Fit is coming in v2.'),
(6, 'How are virtual tours created?', 'We provide tools to upload 360° photos or schedule professional shoots.'),
(7, 'How are delivery zones configured?', 'Restaurants can define their delivery radius in the admin panel.'),
(8, 'What authentication methods are supported?', 'PIN, fingerprint, and facial recognition are all supported.'),
(9, 'Can we sell different ticket types?', 'Yes, you can create VIP, early bird, and group ticket options.'),
(10, 'How often is social data refreshed?', 'Data is updated in real-time for paid plans, hourly for free tier.'),
(11, 'What insurance options are available?', 'Customers can choose from several insurance packages at checkout.'),
(12, 'How does candidate matching work?', 'Our algorithm analyzes skills, experience, and job requirements.'),
(13, 'What devices support cloud gaming?', 'Currently supports Windows, Mac, Android, and iOS devices.'),
(14, 'Can we generate barcodes for items?', 'Yes, the system can generate and print barcode labels.');

-- Project milestones (15 entries across projects)
INSERT INTO project_milestones (project_id, milestone, badge_color) VALUES
(1, 'Initial Release', 'success'),
(1, 'Mobile App Launch', 'primary'),
(1, '10,000 Users', 'warning'),
(2, 'Beta Testing', 'info'),
(2, 'First Clinic Live', 'success'),
(3, 'District-Wide Rollout', 'success'),
(4, 'App Store Approval', 'primary'),
(5, 'Prototype Completed', 'info'),
(6, '1,000 Properties', 'warning'),
(7, '50 Restaurant Partners', 'success'),
(8, 'Security Certified', 'danger'),
(9, 'First Major Event', 'success'),
(10, '10,000 Metrics Processed', 'warning'),
(11, 'National Expansion', 'primary'),
(12, '10,000 Job Listings', 'success'),
(13, 'Alpha Testing', 'info');

-- Related projects (15 entries)
INSERT INTO related_projects (project_id, related_project_id) VALUES
(1, 6), (1, 7), (2, 14), (3, 12), (4, 5),
(5, 10), (6, 1), (7, 1), (8, 14), (9, 4),
(10, 5), (11, 4), (12, 3), (13, 10), (14, 2);
