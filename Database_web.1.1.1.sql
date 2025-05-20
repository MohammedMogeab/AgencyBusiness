use web;
drop database web;

create database web;
use web;

set foreign_key_checks=1;

create table users(
user_id int primary key auto_increment,
user_name varchar(50),
password varchar(255) not null default '1234567890',
email varchar(255) not null,
photo varchar(255),
user_type varchar(25),
verfiy_token varchar(255),
role varchar(255)
);
create table developers(
	id int primary key auto_increment,
    name varchar(50),
    role varchar(50),
    avatar varchar(255)
);

create table blogs(
blog_id int primary key auto_increment,
content text);

create table blog_images(
blog_id int ,
image varchar(255) not null,
constraint bl_fk_im foreign key(blog_id) references blogs(blog_id)
);

create table developers_links(
link_id int primary key auto_increment,
developer_id int,
link_type varchar(30),
link varchar(255),
constraint dev_us_li_fk foreign key(developer_id) references developers(id)
);

create table categorys(
category_id int primary key auto_increment,
category_name varchar(50));

alter table categorys add constraint check_categorys_dublicates unique(category_name);

create table languages(
language_id int primary key auto_increment,
language_name varchar(50),
constraint check_sames_languages unique(language_name));

create table products(
product_id int primary key auto_increment,
product_name varchar(255),
large_description text,
short_description text,
product_version varchar(10),
product_video varchar(255),
price float,
discount float,
category_id int,
status varchar(255) null,
client_name varchar(255),
start_date Date,
main_image varchar(255),
progress int,
budget int,
vidio varchar(255),
overview text,
users_imapacted int,
lines_of_code long,
countries_deployed int,
duration int,
constraint pr_fk_ca foreign key(category_id) references categorys(category_id),
fulltext(product_name,short_description)
);

create table products_photoes(
id int primary key auto_increment,
product_id int ,
photo varchar(255) not null,
caption varchar(255),
constraint pr_fk_ph foreign key(product_id) references products(product_id));

create table product_languages(
product_id int,
language_id int,
constraint pl_fk_pr foreign key(product_id) references products(product_id),
constraint pl_fk_la foreign key(language_id) references languages(language_id)
);

create table product_featuers(
product_id int,
feature varchar(255),
constraint foreign key(product_id) references products(product_id) on delete cascade );

create table buys(
user_id int,
product_id int,
dates date ,
price float,
constraint foreign key (user_id) references users(user_id) on delete cascade ,
constraint foreign key (product_id) references products(product_id) on delete cascade);

create table product_likes(
	user_id int,
	product_id int,
	-- constraint primary key(developer_id,product_id),
	constraint foreign key (user_id) references users(user_id) on delete cascade ,
	constraint foreign key (product_id) references products(product_id) on delete cascade
);

create table blog_producs(
blog_id int,
product_id int,
-- constraint pk_bl_pr primary key(blog_id,product_id),
constraint blpr_fk_bl foreign key(blog_id) references blogs(blog_id) on delete cascade,
constraint blpr_fk_pr foreign key(product_id) references products(product_id) on delete cascade
);

create table rates(
user_id int,
product_id int,
rate int(1),
constraint foreign key (user_id) references users(user_id) on delete cascade ,
constraint foreign key (product_id) references products(product_id) on delete cascade,
constraint pk_us_ra_pr primary key(user_id,product_id,rate),
constraint check_rate_validate check(rate between 0 and 5)
);

create table product_developers(
developer_id int,
product_id int,
constraint pd_fk_us foreign key(developer_id) references developers(id) on delete cascade,
constraint pd_fk_pr foreign key(product_id) references products(product_id) on delete cascade
-- constraint pduspr_pk primary key(user_id,product_id) 
);

create table comments(
comment_id int primary key auto_increment,
product_id int ,
user_id int,
dates date,
content text,
constraint co_fk_pr foreign key (product_id) references products(product_id)on delete cascade,
constraint co_fk_us foreign key(user_id) references users(user_id) on delete cascade);

create table replays(
user_id int,
comment_id int,
dates date,
content text,
constraint re_fk_us foreign key(user_id) references users(user_id) on delete cascade,
constraint re_fk_co foreign key(comment_id) references comments(comment_id)
);
CREATE TABLE investments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10,2),
    transaction_id VARCHAR(255),
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    created_at DATETIME,
    updated_at DATETIME
);
create table comments_likes(
user_id int,
comment_id int,
constraint pk_li_co primary key(user_id,comment_id),
constraint coli_fk_us foreign key(user_id) references users(user_id) on delete cascade,
constraint coli_fk_co foreign key(comment_id) references comments(comment_id) on delete cascade
);

create table blog_comments(
comment_id int primary key auto_increment,
blog_id int ,
user_id int,
dates date,
content text,
constraint blco_fk_pr foreign key (blog_id) references blogs(blog_id)on delete cascade,
constraint blco_fk_us foreign key(user_id) references users(user_id) on delete cascade);

create table blog_replays(
user_id int,
comment_id int,
Dates date,
content text,
constraint blre_fk_us foreign key(user_id) references users(user_id) on delete cascade,
constraint blre_fk_co foreign key(comment_id) references blog_comments(comment_id)
);

create table blog_comments_likes(
user_id int,
comment_id int,
constraint blcoli_fk_us foreign key(user_id) references users(user_id) on delete cascade,
constraint blcoli_fk_co foreign key(comment_id) references blog_comments(comment_id) on delete cascade
);
CREATE TABLE `product_resources`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `resource_name` VARCHAR(255) NULL,
    `resource_url` VARCHAR(255) NULL,
    `type` VARCHAR(50) NULL,
    constraint product_resource_product_fk foreign key(product_id) references products(product_id)
);
create table investments(
id int auto_increment primary key,
user_id Int not null,
amount decimal(10,2),
transcation_id varchar(255),
status enum('pending','completed','cancelled') default 'pending',
created_at datetime,
updated_at datetime
);
CREATE TABLE `related_products`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `related_product_id` INT NULL,
    constraint re_pr_product_fk foreign key(product_id) references products(product_id)
);
CREATE TABLE `product_technologies`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `technology` VARCHAR(100) NULL,
    `description` VARCHAR(255) NULL,
    constraint pr_tec_product_fk foreign key(product_id) references products(product_id)
);
CREATE TABLE `product_milestones`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `milestone` VARCHAR(255) NULL,
    `badge_color` VARCHAR(50) NULL,
     constraint pr_mi_product_fk foreign key(product_id) references products(product_id)
);
CREATE TABLE `product_timeline`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `title` VARCHAR(255) NULL,
    `date` DATE NULL,
    `description` TEXT NULL,
     constraint pr_ti_product_fk foreign key(product_id) references products(product_id)
);
CREATE TABLE `product_faq`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT NULL,
    `question` VARCHAR(255) NULL,
    `answer` TEXT NULL,
	 constraint pr_fa_product_fk foreign key(product_id) references products(product_id)
);

INSERT INTO users (user_name, password, email, photo, user_type, role) VALUES
('JohnDoe', 'secure123', 'john@example.com', 'profile1.jpg', 'developer', 'admin'),
('JaneSmith', 'jane456', 'jane@example.com', 'profile2.jpg', 'developer', 'editor'),
('MikeJohnson', 'mike789', 'mike@example.com', 'profile3.jpg', 'client', 'user'),
('SarahWilliams', 'sarah101', 'sarah@example.com', 'profile4.jpg', 'developer', 'admin'),
('DavidBrown', 'david202', 'david@example.com', 'profile5.jpg', 'client', 'user'),
('EmilyDavis', 'emily303', 'emily@example.com', 'profile6.jpg', 'developer', 'editor'),
('RobertWilson', 'robert404', 'robert@example.com', 'profile7.jpg', 'client', 'user'),
('JenniferLee', 'jenn505', 'jenn@example.com', 'profile8.jpg', 'developer', 'admin'),
('ThomasTaylor', 'thomas606', 'thomas@example.com', 'profile9.jpg', 'client', 'user'),
('LisaAnderson', 'lisa707', 'lisa@example.com', 'profile10.jpg', 'developer', 'editor'),
('JamesMartin', 'james808', 'james@example.com', 'profile11.jpg', 'client', 'user'),
('PatriciaClark', 'pat909', 'pat@example.com', 'profile12.jpg', 'developer', 'admin'),
('DanielLewis', 'dan101', 'dan@example.com', 'profile13.jpg', 'client', 'user'),
('NancyWalker', 'nancy202', 'nancy@example.com', 'profile14.jpg', 'developer', 'editor'),
('KevinHall', 'kevin303', 'kevin@example.com', 'profile15.jpg', 'client', 'user');

INSERT INTO developers (name, role, avatar) VALUES
('John Smith', 'Frontend Developer', 'https://example.com/avatars/john-smith.jpg'),
('Emily Johnson', 'Backend Developer', 'https://example.com/avatars/emily-johnson.jpg'),
('Michael Williams', 'Full Stack Developer', 'https://example.com/avatars/michael-williams.jpg'),
('Sarah Brown', 'UI/UX Designer', 'https://example.com/avatars/sarah-brown.jpg'),
('David Jones', 'DevOps Engineer', 'https://example.com/avatars/david-jones.jpg'),
('Jessica Garcia', 'Mobile Developer', 'https://example.com/avatars/jessica-garcia.jpg'),
('Robert Miller', 'Data Scientist', 'https://example.com/avatars/robert-miller.jpg'),
('Jennifer Davis', 'QA Engineer', 'https://example.com/avatars/jennifer-davis.jpg'),
('Thomas Rodriguez', 'Security Specialist', 'https://example.com/avatars/thomas-rodriguez.jpg'),
('Lisa Martinez', 'Technical Lead', 'https://example.com/avatars/lisa-martinez.jpg'),
('Daniel Wilson', 'Frontend Developer', 'https://example.com/avatars/daniel-wilson.jpg'),
('Nancy Anderson', 'Backend Developer', 'https://example.com/avatars/nancy-anderson.jpg'),
('Kevin Taylor', 'Full Stack Developer', 'https://example.com/avatars/kevin-taylor.jpg'),
('Amanda Thomas', 'UI/UX Designer', 'https://example.com/avatars/amanda-thomas.jpg'),
('Steven Hernandez', 'DevOps Engineer', 'https://example.com/avatars/steven-hernandez.jpg'),
('Ashley Moore', 'Mobile Developer', 'https://example.com/avatars/ashley-moore.jpg'),
('Brian Martin', 'Data Scientist', 'https://example.com/avatars/brian-martin.jpg'),
('Melissa Jackson', 'QA Engineer', 'https://example.com/avatars/melissa-jackson.jpg'),
('Christopher Thompson', 'Security Specialist', 'https://example.com/avatars/christopher-thompson.jpg'),
('Rebecca White', 'Technical Lead', 'https://example.com/avatars/rebecca-white.jpg'),
('Joshua Lopez', 'Frontend Developer', 'https://example.com/avatars/joshua-lopez.jpg'),
('Nicole Lee', 'Backend Developer', 'https://example.com/avatars/nicole-lee.jpg'),
('Matthew Gonzalez', 'Full Stack Developer', 'https://example.com/avatars/matthew-gonzalez.jpg'),
('Stephanie Harris', 'UI/UX Designer', 'https://example.com/avatars/stephanie-harris.jpg'),
('Andrew Clark', 'DevOps Engineer', 'https://example.com/avatars/andrew-clark.jpg'),
('Rachel Lewis', 'Mobile Developer', 'https://example.com/avatars/rachel-lewis.jpg'),
('James Robinson', 'Data Scientist', 'https://example.com/avatars/james-robinson.jpg'),
('Megan Walker', 'QA Engineer', 'https://example.com/avatars/megan-walker.jpg'),
('Ryan Hall', 'Security Specialist', 'https://example.com/avatars/ryan-hall.jpg'),
('Lauren Allen', 'Technical Lead', 'https://example.com/avatars/lauren-allen.jpg'),
('Timothy Young', 'Frontend Developer', 'https://example.com/avatars/timothy-young.jpg'),
('Heather King', 'Backend Developer', 'https://example.com/avatars/heather-king.jpg'),
('Jason Wright', 'Full Stack Developer', 'https://example.com/avatars/jason-wright.jpg'),
('Olivia Scott', 'UI/UX Designer', 'https://example.com/avatars/olivia-scott.jpg'),
('Jeffrey Green', 'DevOps Engineer', 'https://example.com/avatars/jeffrey-green.jpg'),
('Victoria Baker', 'Mobile Developer', 'https://example.com/avatars/victoria-baker.jpg'),
('Richard Adams', 'Data Scientist', 'https://example.com/avatars/richard-adams.jpg'),
('Samantha Nelson', 'QA Engineer', 'https://example.com/avatars/samantha-nelson.jpg'),
('Charles Hill', 'Security Specialist', 'https://example.com/avatars/charles-hill.jpg'),
('Christina Ramirez', 'Technical Lead', 'https://example.com/avatars/christina-ramirez.jpg'),
('Patrick Campbell', 'Frontend Developer', 'https://example.com/avatars/patrick-campbell.jpg'),
('Katherine Mitchell', 'Backend Developer', 'https://example.com/avatars/katherine-mitchell.jpg'),
('Brandon Roberts', 'Full Stack Developer', 'https://example.com/avatars/brandon-roberts.jpg'),
('Angela Carter', 'UI/UX Designer', 'https://example.com/avatars/angela-carter.jpg'),
('Justin Phillips', 'DevOps Engineer', 'https://example.com/avatars/justin-phillips.jpg'),
('Hannah Evans', 'Mobile Developer', 'https://example.com/avatars/hannah-evans.jpg'),
('Gregory Turner', 'Data Scientist', 'https://example.com/avatars/gregory-turner.jpg'),
('Danielle Torres', 'QA Engineer', 'https://example.com/avatars/danielle-torres.jpg'),
('Benjamin Parker', 'Security Specialist', 'https://example.com/avatars/benjamin-parker.jpg');


INSERT INTO blogs (content) VALUES
('The future of web development: Trends to watch in 2023'),
('How to optimize your React application for better performance'),
('Introduction to machine learning with Python'),
('Building scalable microservices with Docker and Kubernetes'),
('The complete guide to becoming a full-stack developer'),
('Cybersecurity best practices for modern web applications'),
('Comparing frontend frameworks: React vs Vue vs Angular'),
('Database design patterns for high-traffic applications'),
('Mobile app development: Native vs Hybrid approaches'),
('The rise of serverless architecture and its benefits'),
('Artificial intelligence in everyday applications'),
('Blockchain technology beyond cryptocurrencies'),
('DevOps practices that accelerate software delivery'),
('User experience design principles for developers'),
('How to build a successful tech startup in 2023');

INSERT INTO categorys (category_name) VALUES
('Web Development'),
('Mobile Applications'),
('Desktop Software'),
('Cloud Computing'),
('Artificial Intelligence'),
('Data Science'),
('Game Development'),
('Embedded Systems'),
('Cybersecurity'),
('Blockchain'),
('Internet of Things'),
('Augmented Reality'),
('Virtual Reality'),
('DevOps Tools'),
('Database Systems');

INSERT INTO languages (language_name) VALUES
('JavaScript'),
('Python'),
('Java'),
('C#'),
('PHP'),
('C++'),
('Swift'),
('Kotlin'),
('Go'),
('Ruby'),
('Rust'),
('TypeScript'),
('Dart'),
('Scala'),
('R');


INSERT INTO products (product_name, large_description, short_description, product_version, product_video, price, discount, category_id, status, client_name, start_date, main_image, progress, budget, vidio, overview, users_imapacted, lines_of_code, countries_deployed, duration) VALUES
('CodeMaster IDE', 'A comprehensive integrated development environment supporting multiple languages with advanced debugging tools.', 'Powerful IDE for modern developers', '2.5', 'video1.mp4', 199.99, 10.00, 1, 'Active', 'TechSolutions Inc.', '2022-01-15', 'ide.jpg', 100, 500000, 'overview1.mp4', 'Complete development solution', 50000, 250000, 30, 12),
('DataAnalyzer Pro', 'Advanced data analysis tool with machine learning capabilities for business intelligence.', 'AI-powered data analysis platform', '1.8', 'video2.mp4', 299.99, 15.00, 6, 'Active', 'Analytics Corp', '2021-11-20', 'data.jpg', 95, 750000, 'overview2.mp4', 'Transform your data into insights', 35000, 180000, 25, 18),
('SecureVault', 'Enterprise-grade security solution with end-to-end encryption for sensitive data protection.', 'Military-grade encryption software', '3.2', 'video3.mp4', 499.99, 0.00, 9, 'Active', 'Global Bank', '2020-05-10', 'secure.jpg', 100, 1200000, 'overview3.mp4', 'Protect your digital assets', 80000, 320000, 50, 24),
('MobilePay', 'Mobile payment solution with seamless integration for e-commerce platforms.', 'Contactless payment app', '2.0', 'video4.mp4', 149.99, 20.00, 2, 'Active', 'Retail Systems', '2022-03-05', 'mobile.jpg', 90, 300000, 'overview4.mp4', 'Revolutionize mobile transactions', 200000, 150000, 40, 9),
('GameEngine 3D', 'Next-generation 3D game development engine with physics simulation and VR support.', 'Cutting-edge game development', '5.1', 'video5.mp4', 799.99, 25.00, 7, 'Active', 'Game Studios', '2019-08-12', 'game.jpg', 100, 2000000, 'overview5.mp4', 'Create immersive gaming experiences', 15000, 500000, 35, 36),
('CloudManager', 'Comprehensive cloud infrastructure management tool with multi-platform support.', 'Unified cloud management', '1.5', 'video6.mp4', 349.99, 10.00, 4, 'Beta', 'Enterprise IT', '2022-06-18', 'cloud.jpg', 80, 900000, 'overview6.mp4', 'Simplify cloud operations', 45000, 220000, 28, 15),
('SmartHome Hub', 'Centralized control system for IoT devices in modern smart homes.', 'Home automation platform', '2.3', 'video7.mp4', 249.99, 0.00, 11, 'Active', 'HomeTech', '2021-04-22', 'smart.jpg', 100, 400000, 'overview7.mp4', 'Connect and control your home', 120000, 190000, 22, 12),
('AR Designer', 'Augmented reality design tool for architects and interior designers.', 'Visualize designs in AR', '1.2', 'video8.mp4', 599.99, 15.00, 12, 'Active', 'DesignWorks', '2022-02-14', 'ar.jpg', 85, 600000, 'overview8.mp4', 'Bring designs to life', 25000, 170000, 15, 18),
('HealthTracker', 'Comprehensive health monitoring system with AI-based diagnostics.', 'Personal health assistant', '3.0', 'video9.mp4', 199.99, 10.00, 2, 'Active', 'MediCare', '2020-09-30', 'health.jpg', 100, 350000, 'overview9.mp4', 'Monitor your wellbeing', 300000, 210000, 45, 24),
('BlockChain Suite', 'Enterprise blockchain solution for secure transactions and smart contracts.', 'Business blockchain platform', '4.5', 'video10.mp4', 999.99, 0.00, 10, 'Active', 'Finance Corp', '2018-12-05', 'block.jpg', 100, 1500000, 'overview10.mp4', 'Secure decentralized solutions', 50000, 400000, 30, 48),
('VR Classroom', 'Virtual reality education platform for immersive learning experiences.', 'Educational VR system', '1.0', 'video11.mp4', 449.99, 20.00, 13, 'Active', 'EduTech', '2022-05-20', 'vr.jpg', 75, 550000, 'overview11.mp4', 'Revolutionize education', 10000, 160000, 18, 12),
('DevOps Pipeline', 'Automated CI/CD pipeline solution for agile software development teams.', 'Streamline your DevOps', '2.8', 'video12.mp4', 399.99, 10.00, 14, 'Active', 'Software Co', '2021-07-15', 'devops.jpg', 100, 800000, 'overview12.mp4', 'Accelerate software delivery', 30000, 230000, 25, 18),
('Database Optimizer', 'Performance tuning tool for relational and NoSQL database systems.', 'Database performance booster', '3.1', 'video13.mp4', 299.99, 0.00, 15, 'Active', 'DataSystems', '2020-03-10', 'db.jpg', 100, 450000, 'overview13.mp4', 'Maximize database efficiency', 40000, 195000, 30, 24),
('AI Chatbot', 'Enterprise-grade conversational AI platform for customer service automation.', 'Smart chatbot solution', '2.2', 'video14.mp4', 499.99, 15.00, 5, 'Active', 'Service Corp', '2021-10-12', 'ai.jpg', 95, 700000, 'overview14.mp4', 'Enhance customer interactions', 60000, 270000, 35, 18),
('IoT Monitor', 'Comprehensive monitoring solution for industrial IoT devices and sensors.', 'Industrial IoT platform', '1.7', 'video15.mp4', 599.99, 10.00, 11, 'Beta', 'Industrial Tech', '2022-04-05', 'iot.jpg', 70, 950000, 'overview15.mp4', 'Monitor and analyze IoT data', 25000, 210000, 20, 15);

-- Blog Images
INSERT INTO blog_images (blog_id, image) VALUES
(1, 'blog1_img1.jpg'), (1, 'blog1_img2.jpg'),
(2, 'blog2_img1.jpg'), (3, 'blog3_img1.jpg'),
(4, 'blog4_img1.jpg'), (4, 'blog4_img2.jpg'),
(5, 'blog5_img1.jpg'), (6, 'blog6_img1.jpg'),
(7, 'blog7_img1.jpg'), (8, 'blog8_img1.jpg'),
(9, 'blog9_img1.jpg'), (10, 'blog10_img1.jpg'),
(11, 'blog11_img1.jpg'), (12, 'blog12_img1.jpg'),
(13, 'blog13_img1.jpg'), (14, 'blog14_img1.jpg'),
(15, 'blog15_img1.jpg');

-- Developer Links
INSERT INTO developers_links (developer_id, link_type, link) VALUES
(1, 'GitHub', 'https://github.com/johndoe'),
(1, 'LinkedIn', 'https://linkedin.com/in/johndoe'),
(2, 'GitHub', 'https://github.com/janesmith'),
(2, 'Portfolio', 'https://janesmith.dev'),
(3, 'Twitter', 'https://twitter.com/mikejohnson'),
(4, 'GitHub', 'https://github.com/sarahwilliams'),
(4, 'LinkedIn', 'https://linkedin.com/in/sarahwilliams'),
(5, 'Facebook', 'https://facebook.com/davidbrown'),
(6, 'GitHub', 'https://github.com/emilydavis'),
(7, 'Website', 'https://robertwilson.com'),
(8, 'GitHub', 'https://github.com/jenniferlee'),
(9, 'Twitter', 'https://twitter.com/thomastaylor'),
(10, 'GitHub', 'https://github.com/lisaanderson'),
(11, 'LinkedIn', 'https://linkedin.com/in/jamesmartin'),
(12, 'GitHub', 'https://github.com/patriciaclark');

INSERT INTO products_photoes (product_id, photo, caption) VALUES
(1, 'codemaster1.jpg', 'CodeMaster IDE main interface'),
(1, 'codemaster2.jpg', 'Debugging tools in CodeMaster'),
(2, 'dataanalyzer1.jpg', 'DataAnalyzer dashboard'),
(2, 'dataanalyzer2.jpg', 'Machine learning module'),
(3, 'securevault1.jpg', 'SecureVault encryption settings'),
(3, 'securevault2.jpg', 'User access control'),
(4, 'mobilepay1.jpg', 'MobilePay transaction screen'),
(4, 'mobilepay2.jpg', 'Payment history view'),
(5, 'gameengine1.jpg', '3D scene editor'),
(5, 'gameengine2.jpg', 'Physics simulation tools'),
(6, 'cloudmanager1.jpg', 'Cloud infrastructure view'),
(6, 'cloudmanager2.jpg', 'Resource allocation panel'),
(7, 'smarthome1.jpg', 'SmartHome device controls'),
(7, 'smarthome2.jpg', 'Automation rules setup'),
(8, 'ardesigner1.jpg', 'AR Designer workspace');

INSERT INTO product_languages (product_id, language_id) VALUES
(1, 1),   -- CodeMaster IDE supports JavaScript
(1, 2),   -- CodeMaster IDE supports Python
(1, 3),   -- CodeMaster IDE supports Java
(2, 2),   -- DataAnalyzer Pro supports Python
(2, 14),  -- DataAnalyzer Pro supports R
(3, 4),   -- SecureVault supports C#
(3, 6),   -- SecureVault supports C++
(4, 7),   -- MobilePay supports Swift
(4, 8),   -- MobilePay supports Kotlin
(5, 6),   -- GameEngine 3D supports C++
(6, 1),   -- CloudManager supports JavaScript
(6, 9),   -- CloudManager supports Go
(7, 5),   -- SmartHome Hub supports PHP
(8, 1),   -- AR Designer supports JavaScript
(8, 12);  -- AR Designer supports TypeScript

INSERT INTO product_featuers (product_id, feature) VALUES
(1, 'Multi-language support'),
(1, 'Advanced debugging tools'),
(1, 'Code completion'),
(2, 'AI-powered analytics'),
(2, 'Real-time data processing'),
(3, 'Military-grade encryption'),
(3, 'Two-factor authentication'),
(4, 'Contactless payments'),
(4, 'Fraud detection'),
(5, 'Physics engine'),
(5, 'VR support'),
(6, 'Multi-cloud management'),
(7, 'Device automation'),
(8, '3D object recognition'),
(9, 'Health trend analysis');

INSERT INTO buys (user_id, product_id, dates, price) VALUES
(3, 1, '2022-02-10', 179.99),   -- Mike bought CodeMaster with discount
(5, 2, '2022-01-25', 254.99),   -- David bought DataAnalyzer with discount
(7, 3, '2021-06-15', 499.99),   -- Robert bought SecureVault
(9, 4, '2022-04-01', 119.99),   -- Thomas bought MobilePay with discount
(3, 5, '2022-05-20', 599.99),   -- Mike bought GameEngine with discount
(5, 6, '2022-07-12', 314.99),   -- David bought CloudManager with discount
(7, 7, '2021-12-10', 249.99),   -- Robert bought SmartHome Hub
(9, 8, '2022-03-15', 509.99),   -- Thomas bought AR Designer with discount
(11, 9, '2021-01-05', 179.99),  -- James bought HealthTracker with discount
(13, 10, '2020-05-22', 999.99), -- Daniel bought BlockChain Suite
(15, 11, '2022-06-10', 359.99), -- Kevin bought VR Classroom with discount
(2, 12, '2021-09-18', 359.99),  -- Jane bought DevOps Pipeline with discount
(4, 13, '2020-08-30', 299.99),  -- Sarah bought Database Optimizer
(6, 14, '2022-02-28', 424.99),  -- Emily bought AI Chatbot with discount
(8, 15, '2022-05-15', 539.99);  -- Jennifer bought IoT Monitor with discount

INSERT INTO product_likes (user_id, product_id) VALUES
(1, 1),   -- John likes CodeMaster
(2, 1),   -- Jane likes CodeMaster
(3, 2),   -- Mike likes DataAnalyzer
(4, 3),   -- Sarah likes SecureVault
(5, 4),   -- David likes MobilePay
(6, 5),   -- Emily likes GameEngine
(7, 6),   -- Robert likes CloudManager
(8, 7),   -- Jennifer likes SmartHome
(9, 8),   -- Thomas likes AR Designer
(10, 9),  -- Lisa likes HealthTracker
(11, 10), -- James likes BlockChain
(12, 11), -- Patricia likes VR Classroom
(13, 12), -- Daniel likes DevOps Pipeline
(14, 13), -- Nancy likes Database Optimizer
(15, 14); -- Kevin likes AI Chatbot

INSERT INTO product_developers (developer_id, product_id) VALUES
(1, 1),   -- John Doe worked on CodeMaster IDE
(2, 1),   -- Jane Smith worked on CodeMaster IDE
(4, 2),   -- Sarah Williams worked on DataAnalyzer Pro
(6, 3),   -- Emily Davis worked on SecureVault
(8, 4),   -- Jennifer Lee worked on MobilePay
(10, 5),  -- Lisa Anderson worked on GameEngine 3D
(12, 6),  -- Patricia Clark worked on CloudManager
(1, 7),   -- John Doe worked on SmartHome Hub
(4, 8),   -- Sarah Williams worked on AR Designer
(6, 9),   -- Emily Davis worked on HealthTracker
(8, 10),  -- Jennifer Lee worked on BlockChain Suite
(10, 11), -- Lisa Anderson worked on VR Classroom
(12, 12), -- Patricia Clark worked on DevOps Pipeline
(2, 13),  -- Jane Smith worked on Database Optimizer
(4, 14);  -- Sarah Williams worked on AI Chatbot

INSERT INTO rates (user_id, product_id, rate) VALUES
(3, 1, 5),   -- Mike rated CodeMaster 5 stars
(5, 2, 4),   -- David rated DataAnalyzer 4 stars
(7, 3, 5),   -- Robert rated SecureVault 5 stars
(9, 4, 3),   -- Thomas rated MobilePay 3 stars
(11, 5, 4),  -- James rated GameEngine 4 stars
(13, 6, 5),  -- Daniel rated CloudManager 5 stars
(15, 7, 4),  -- Kevin rated SmartHome 4 stars
(2, 8, 5),   -- Jane rated AR Designer 5 stars
(4, 9, 4),   -- Sarah rated HealthTracker 4 stars
(6, 10, 5),  -- Emily rated BlockChain 5 stars
(8, 11, 3),  -- Jennifer rated VR Classroom 3 stars
(10, 12, 4), -- Lisa rated DevOps Pipeline 4 stars
(12, 13, 5), -- Patricia rated Database Optimizer 5 stars
(14, 14, 4), -- Nancy rated AI Chatbot 4 stars
(1, 15, 3);  -- John rated IoT Monitor 3 stars

INSERT INTO comments (product_id, user_id, dates, content) VALUES
(1, 3, '2022-02-15', 'Excellent IDE with all the features I need for full-stack development!'),
(2, 5, '2022-02-01', 'Powerful analytics tool, though the learning curve is a bit steep.'),
(3, 7, '2021-07-01', 'The gold standard for data security. Worth every penny.'),
(4, 9, '2022-04-05', 'Works well most of the time, but occasionally has connectivity issues.'),
(5, 11, '2022-06-01', 'Game changing engine for indie developers. Love the VR support!'),
(6, 13, '2022-08-01', 'Simplified our multi-cloud management significantly.'),
(7, 15, '2022-01-15', 'Transformed my home automation setup. Highly recommended.'),
(8, 2, '2022-04-01', 'Revolutionary tool for architectural visualization.'),
(9, 4, '2021-11-01', 'Accurate health tracking with insightful analytics.'),
(10, 6, '2020-06-15', 'Enterprise-grade blockchain solution with excellent support.'),
(11, 8, '2022-07-01', 'Students love the immersive learning experience it provides.'),
(12, 10, '2021-10-15', 'Cut our deployment times in half. Essential for DevOps teams.'),
(13, 12, '2020-09-15', 'Fixed all our database performance issues within weeks.'),
(14, 14, '2022-03-15', 'Our customer service bots are now handling 60% of inquiries.'),
(15, 1, '2022-06-01', 'Promising tool for industrial monitoring, needs more integrations.');

INSERT INTO replays (user_id, comment_id, dates, content) VALUES
(1, 1, '2022-02-16', 'Thanks Mike! We worked hard to make CodeMaster comprehensive.'),
(4, 2, '2022-02-03', 'Thanks for the feedback David! We have tutorials to help with onboarding.'),
(6, 3, '2021-07-03', 'Appreciate the endorsement Robert! Security is our top priority.'),
(8, 4, '2022-04-07', 'Sorry to hear about the connectivity issues Thomas. Our 2.1 update should fix this.'),
(10, 5, '2022-06-03', 'So glad you like it James! VR was a passion project for our team.'),
(12, 6, '2022-08-03', 'Great to hear Daniel! We designed it specifically for complex cloud environments.'),
(1, 7, '2022-01-17', 'Thanks Kevin! Home automation should be simple and reliable.'),
(4, 8, '2022-04-03', 'Thanks Jane! We\'re working on even more visualization tools.'),
(6, 9, '2021-11-03', 'Appreciate it Sarah! Our next update will add sleep pattern analysis.'),
(8, 10, '2020-06-17', 'Thanks Emily! We\'re committed to enterprise-grade blockchain solutions.'),
(10, 11, '2022-07-03', 'That\'s wonderful to hear Jennifer! Education is so important.'),
(12, 12, '2021-10-17', 'Exactly our goal Lisa! Faster deployments mean happier teams.'),
(2, 13, '2020-09-17', 'Thanks Patricia! Database performance is often overlooked.'),
(4, 14, '2022-03-17', 'That\'s impressive Nancy! AI can really transform customer service.'),
(6, 15, '2022-06-03', 'Thanks John! More integrations are coming in our Q3 update.');


INSERT INTO comments_likes (user_id, comment_id) VALUES
(2, 1),   -- Jane liked Mike's comment about CodeMaster
(4, 1),   -- Sarah liked Mike's comment about CodeMaster
(6, 2),   -- Emily liked David's comment about DataAnalyzer
(8, 3),   -- Jennifer liked Robert's comment about SecureVault
(10, 4),  -- Lisa liked Thomas's comment about MobilePay
(12, 5),  -- Patricia liked James's comment about GameEngine
(14, 6),  -- Nancy liked Daniel's comment about CloudManager
(1, 7),   -- John liked Kevin's comment about SmartHome
(3, 8),   -- Mike liked Jane's comment about AR Designer
(5, 9),   -- David liked Sarah's comment about HealthTracker
(7, 10),  -- Robert liked Emily's comment about BlockChain
(9, 11),  -- Thomas liked Jennifer's comment about VR Classroom
(11, 12), -- James liked Lisa's comment about DevOps Pipeline
(13, 13), -- Daniel liked Patricia's comment about Database Optimizer
(15, 14); -- Kevin liked Nancy's comment about AI Chatbot

INSERT INTO product_resources (product_id, resource_name, resource_url, type) VALUES
(1, 'CodeMaster Documentation', 'https://docs.codemaster.com', 'Documentation'),
(1, 'CodeMaster GitHub Repo', 'https://github.com/codemaster', 'Code Repository'),
(2, 'DataAnalyzer API Guide', 'https://dataanalyzer.com/api-docs', 'API Documentation'),
(3, 'SecureVault Whitepaper', 'https://securevault.com/whitepaper.pdf', 'Whitepaper'),
(4, 'MobilePay SDK', 'https://mobilepay.com/downloads/sdk', 'Development Kit'),
(5, 'GameEngine Samples', 'https://gameengine.com/samples', 'Code Samples'),
(6, 'CloudManager CLI Tool', 'https://cloudmanager.com/cli', 'Tool'),
(7, 'SmartHome Integration Guide', 'https://smarthome.com/integrations', 'Guide'),
(8, 'AR Designer Templates', 'https://ardesigner.com/templates', 'Templates'),
(9, 'HealthTracker API', 'https://healthtracker.com/developer', 'API'),
(10, 'BlockChain Dev Portal', 'https://blockchainsuite.com/dev', 'Portal'),
(11, 'VR Classroom Lesson Plans', 'https://vrclassroom.com/lessons', 'Educational'),
(12, 'DevOps Pipeline Plugins', 'https://devopspipeline.com/plugins', 'Extensions'),
(13, 'Database Optimizer Benchmark', 'https://dboptimizer.com/benchmarks', 'Report'),
(14, 'AI Chatbot Training Data', 'https://aichatbot.com/training-data', 'Dataset'),
(15, 'IoT Monitor Protocol Specs', 'https://iotmonitor.com/protocols', 'Specification');

INSERT INTO product_technologies (product_id, technology, description) VALUES
(1, 'Electron', 'Desktop application framework used for cross-platform compatibility'),
(1, 'TypeScript', 'Primary language for the IDE core functionality'),
(2, 'TensorFlow', 'Machine learning library for advanced analytics'),
(3, 'AES-256', 'Military-grade encryption standard'),
(4, 'NFC', 'Near-field communication for contactless payments'),
(5, 'Vulkan', 'Low-overhead graphics API for high performance'),
(6, 'Kubernetes', 'Container orchestration for cloud management'),
(7, 'MQTT', 'Lightweight IoT communication protocol'),
(8, 'ARKit', 'Apple\'s augmented reality framework'),
(9, 'HealthKit', 'Integration with Apple\'s health ecosystem'),
(10, 'Hyperledger', 'Enterprise blockchain framework'),
(11, 'WebXR', 'Web-based virtual reality standard'),
(12, 'Docker', 'Containerization technology for deployments'),
(13, 'Query Optimizer', 'Proprietary database optimization algorithms'),
(14, 'BERT', 'Natural language processing model'),
(15, 'LoRaWAN', 'Long-range wireless protocol for IoT');

INSERT INTO product_milestones (product_id, milestone, badge_color) VALUES
(1, 'Initial Release', 'blue'),
(1, '10,000 Downloads', 'green'),
(2, 'AI Module Added', 'purple'),
(3, 'FIPS 140-2 Certified', 'gold'),
(4, '1 Million Transactions', 'green'),
(5, 'VR Support Launched', 'orange'),
(6, 'Multi-Cloud Support', 'blue'),
(7, 'HomeKit Integration', 'red'),
(8, 'Architecture Award', 'gold'),
(9, 'FDA Cleared', 'green'),
(10, 'Enterprise Adoption', 'purple'),
(11, 'Education Partner Program', 'blue'),
(12, 'CI/CD Automation', 'orange'),
(13, 'Performance Breakthrough', 'gold'),
(14, 'NLP Accuracy Leader', 'green'),
(15, 'Industrial Certification', 'blue');

INSERT INTO product_timeline (product_id, title, date, description) VALUES
(1, 'Project Kickoff', '2021-06-01', 'Initial planning and architecture design'),
(1, 'Beta Release', '2021-11-15', 'First public beta version released'),
(2, 'ML Module Added', '2022-01-10', 'Integrated machine learning capabilities'),
(3, 'Security Audit', '2020-08-20', 'Completed third-party security review'),
(4, 'Launch in US', '2022-03-05', 'Initial release in United States'),
(5, 'Physics Engine', '2022-04-01', 'Added advanced physics simulation'),
(6, 'AWS Integration', '2022-06-18', 'Added support for Amazon Web Services'),
(7, 'Version 2.0', '2021-10-01', 'Major update with new UI'),
(8, 'ARCore Support', '2022-02-14', 'Added Android AR compatibility'),
(9, 'Wearables Integration', '2021-05-01', 'Added support for smart watches'),
(10, 'Mainnet Launch', '2020-01-15', 'Blockchain network went live'),
(11, 'School Pilot', '2022-05-20', 'First classroom implementation'),
(12, 'Plugin System', '2021-09-01', 'Added extensible plugin architecture'),
(13, 'Query Optimizer', '2020-06-01', 'Released performance enhancement'),
(14, 'Multi-language', '2022-01-15', 'Added Spanish and French support'),
(15, 'Factory Testing', '2022-04-05', 'Completed industrial environment tests');

INSERT INTO product_faq (product_id, question, answer) VALUES
(1, 'What platforms does CodeMaster support?', 'CodeMaster runs on Windows, Mac, and Linux systems.'),
(2, 'How often is data analyzed?', 'DataAnalyzer processes information in real-time with optional batch modes.'),
(3, 'What encryption standards are used?', 'SecureVault uses AES-256 encryption with RSA-4096 for key exchange.'),
(4, 'Is MobilePay secure?', 'Yes, we use tokenization and biometric authentication for all transactions.'),
(5, 'What game platforms can I target?', 'GameEngine supports Windows, PlayStation, Xbox, and VR platforms.'),
(6, 'Which clouds are supported?', 'CloudManager works with AWS, Azure, GCP, and private cloud setups.'),
(7, 'What devices can SmartHome control?', 'Over 2000 compatible devices including lights, thermostats, and security systems.'),
(8, 'Do I need special hardware for AR Designer?', 'It works with iPhones (ARKit) and Android (ARCore) devices.'),
(9, 'How does HealthTracker get its data?', 'It syncs with Apple Health, Google Fit, and most wearable devices.'),
(10, 'What consensus algorithm is used?', 'Our blockchain uses a modified PBFT (Practical Byzantine Fault Tolerance) algorithm.'),
(11, 'What subjects can VR Classroom teach?', 'Currently STEM subjects with history and art coming soon.'),
(12, 'Can I use my existing CI/CD tools?', 'Yes, DevOps Pipeline integrates with Jenkins, GitHub Actions, and others.'),
(13, 'Which databases are optimized?', 'MySQL, PostgreSQL, MongoDB, and SQL Server currently supported.'),
(14, 'How do I train the AI Chatbot?', 'We provide tools to upload your knowledge base and conversation flows.'),
(15, 'What wireless protocols are supported?', 'LoRaWAN, Zigbee, Z-Wave, and Wi-Fi with more coming soon.');

INSERT INTO blog_producs (blog_id, product_id) VALUES
(1, 1),   -- Future of web development blog related to CodeMaster IDE
(2, 1),   -- React optimization blog related to CodeMaster IDE
(3, 2),   -- Machine learning blog related to DataAnalyzer Pro
(4, 6),   -- Microservices blog related to CloudManager
(5, 1),   -- Full-stack developer blog related to CodeMaster IDE
(6, 3),   -- Cybersecurity blog related to SecureVault
(7, 1),   -- Frontend frameworks blog related to CodeMaster IDE
(8, 5),   -- Database design blog related to GameEngine (for leaderboards)
(9, 4),   -- Mobile app development blog related to MobilePay
(10, 6),  -- Serverless architecture blog related to CloudManager
(11, 14), -- AI applications blog related to AI Chatbot
(12, 10), -- Blockchain blog related to BlockChain Suite
(13, 12), -- DevOps blog related to DevOps Pipeline
(14, 1),  -- UX design blog related to CodeMaster IDE
(15, 15); -- Tech startup blog related to IoT Monitor

INSERT INTO blog_comments (blog_id, user_id, dates, content) VALUES
(1, 3, '2022-03-01', 'Great overview of upcoming trends! Especially interested in WASM integration.'),
(2, 5, '2022-02-15', 'Your performance tips cut our bundle size by 40%. Amazing!'),
(3, 7, '2022-01-20', 'Clear explanation of ML concepts. More examples would be helpful.'),
(4, 9, '2022-04-10', 'We implemented this architecture and saw 3x throughput improvement.'),
(5, 2, '2022-03-15', 'As a hiring manager, this is exactly the skill set we look for.'),
(6, 4, '2022-02-28', 'Important reminders about security that many teams overlook.'),
(7, 6, '2022-01-25', 'Would love to see a deeper comparison of state management solutions.'),
(8, 8, '2022-03-05', 'These patterns saved us during Black Friday traffic spikes.'),
(9, 10, '2022-04-01', 'The hybrid approach worked perfectly for our cross-platform app.'),
(10, 12, '2022-03-20', 'Serverless reduced our infra costs by 60% as you predicted.'),
(11, 14, '2022-02-10', 'AI is transforming our customer service - great case studies!'),
(12, 1, '2022-01-15', 'Blockchain has so many uses beyond crypto - thanks for highlighting.'),
(13, 11, '2022-03-25', 'Our deployment frequency increased 5x after these changes.'),
(14, 13, '2022-02-20', 'UX is so critical yet often neglected in developer tools.'),
(15, 15, '2022-04-05', 'Spot-on advice about finding product-market fit first.');

INSERT INTO blog_replays (user_id, comment_id, Dates, content) VALUES
(1, 1, '2022-03-02', 'Thanks Mike! WASM is definitely a game-changer we''re excited about.'),
(2, 2, '2022-02-16', 'That''s fantastic to hear David! Optimization can have huge impacts.'),
(4, 3, '2022-01-21', 'Appreciate the feedback Robert! We''ll add more examples in part 2.'),
(6, 4, '2022-04-11', 'Those are impressive results Thomas! Microservices scale beautifully.'),
(1, 5, '2022-03-16', 'Thanks Jane! We surveyed 50 companies to build this profile.'),
(3, 6, '2022-03-01', 'Absolutely Sarah! Security should never be an afterthought.'),
(5, 7, '2022-01-26', 'Great suggestion Emily! We''ll do a follow-up on state management.'),
(7, 8, '2022-03-06', 'That''s wonderful Jennifer! Proper database design pays off.'),
(9, 9, '2022-04-02', 'Glad it helped Lisa! Hybrid gives the best of both worlds.'),
(11, 10, '2022-03-21', 'Those savings are impressive Patricia! Serverless is transformative.'),
(13, 11, '2022-02-11', 'Thanks Nancy! AI applications keep expanding daily.'),
(2, 12, '2022-01-16', 'Exactly John! The underlying tech has so much potential.'),
(4, 13, '2022-03-26', 'That''s amazing velocity James! DevOps practices really deliver.'),
(6, 14, '2022-02-21', 'Well said Daniel! Developer experience matters tremendously.'),
(8, 15, '2022-04-06', 'Thanks Kevin! Too many startups build before validating.');

INSERT INTO blog_comments_likes (user_id, comment_id) VALUES
(2, 1),   -- Jane liked Mike's comment on web development trends
(4, 2),   -- Sarah liked David's comment on performance tips
(6, 3),   -- Emily liked Robert's comment on ML examples
(8, 4),   -- Jennifer liked Thomas' comment on microservices
(10, 5),  -- Lisa liked Jane's comment on hiring skills
(12, 6),  -- Patricia liked Sarah's comment on security
(14, 7),  -- Nancy liked Emily's comment on state management
(1, 8),   -- John liked Jennifer's comment on database patterns
(3, 9),   -- Mike liked Lisa's comment on hybrid apps
(5, 10),  -- David liked Patricia's comment on serverless
(7, 11),  -- Robert liked Nancy's comment on AI
(9, 12),  -- Thomas liked John's comment on blockchain
(11, 13), -- James liked James' comment on DevOps
(13, 14), -- Daniel liked Daniel's comment on UX
(15, 15); -- Kevin liked Kevin's comment on startups

INSERT INTO related_products (product_id, related_product_id) VALUES
(1, 12),   -- CodeMaster IDE related to DevOps Pipeline
(1, 13),   -- CodeMaster IDE related to Database Optimizer
(2, 14),   -- DataAnalyzer related to AI Chatbot
(3, 9),    -- SecureVault related to HealthTracker (both handle sensitive data)
(4, 7),    -- MobilePay related to SmartHome (both mobile-focused)
(5, 11),   -- GameEngine related to VR Classroom (both use 3D/VR)
(6, 1),    -- CloudManager related to CodeMaster (cloud development)
(7, 15),   -- SmartHome related to IoT Monitor (both IoT)
(8, 5),    -- AR Designer related to GameEngine (both 3D)
(9, 3),    -- HealthTracker related to SecureVault (data security)
(10, 2),   -- BlockChain related to DataAnalyzer (data applications)
(11, 8),   -- VR Classroom related to AR Designer (immersive tech)
(12, 6),   -- DevOps Pipeline related to CloudManager
(13, 1),   -- Database Optimizer related to CodeMaster
(14, 10),  -- AI Chatbot related to BlockChain (emerging tech)
(15, 4);   -- IoT Monitor related to MobilePay (mobile connectivity)


INSERT INTO blog_comments (blog_id, user_id, dates, content) VALUES
(1, 3, '2023-01-15', 'Great insights on upcoming web technologies!'),
(1, 5, '2023-01-16', 'Would love more details about WASM integration.'),
(2, 7, '2023-02-01', 'These React optimizations saved us 30% load time!'),
(3, 9, '2023-02-15', 'Clear explanation of ML concepts for beginners.'),
(4, 2, '2023-03-01', 'Microservices architecture transformed our cloud deployment.'),
(5, 4, '2023-03-15', 'This is exactly the skill set we look for in hires.'),
(6, 6, '2023-04-01', 'Security should never be an afterthought - great reminders.'),
(7, 8, '2023-04-15', 'Comprehensive framework comparison, very helpful!'),
(8, 10, '2023-05-01', 'Database patterns saved us during peak traffic.'),
(9, 12, '2023-05-15', 'Hybrid approach worked perfectly for our use case.'),
(10, 1, '2023-06-01', 'Serverless reduced our costs by 40%.'),
(11, 11, '2023-06-15', 'AI is transforming our customer interactions.'),
(12, 13, '2023-07-01', 'Blockchain applications go far beyond crypto.'),
(13, 15, '2023-07-15', 'DevOps practices doubled our deployment frequency.'),
(14, 3, '2023-08-01', 'UX is critical yet often overlooked in dev tools.');

INSERT INTO blog_replays (user_id, comment_id, Dates, content) VALUES
(1, 1, '2023-01-16', 'Thanks Mike! We\'re excited about these emerging technologies.'),
(2, 2, '2023-01-17', 'We\'ll cover WASM in-depth in next month\'s post David.'),
(4, 3, '2023-02-02', 'Those are impressive results Robert!'),
(6, 4, '2023-02-16', 'Glad you found it helpful Thomas!'),
(1, 5, '2023-03-02', 'Microservices can be transformative when implemented well Jane.'),
(3, 6, '2023-03-16', 'Thanks Sarah! We surveyed dozens of companies.'),
(5, 7, '2023-04-02', 'Absolutely Emily! Security first.'),
(7, 8, '2023-04-16', 'Thanks Jennifer! We aim to be comprehensive.'),
(9, 9, '2023-05-02', 'That\'s great to hear Lisa!'),
(11, 10, '2023-05-16', 'Hybrid gives the best of both worlds Patricia.'),
(2, 11, '2023-06-02', 'Those savings are impressive John!'),
(4, 12, '2023-06-16', 'AI applications keep expanding James.'),
(6, 13, '2023-07-02', 'Exactly Daniel! The tech has so much potential.'),
(8, 14, '2023-07-16', 'That\'s fantastic velocity Kevin!'),
(10, 15, '2023-08-02', 'Well said Mike! Developer experience matters.');


INSERT INTO blog_images (blog_id, image) VALUES
(1, 'web-dev-trends-2023.jpg'),
(1, 'wasm-integration.png'),
(2, 'react-optimization-chart.jpg'),
(3, 'ml-algorithms-diagram.png'),
(4, 'microservices-architecture.jpg'),
(5, 'fullstack-skills.png'),
(6, 'cybersecurity-shield.jpg'),
(7, 'framework-comparison.jpg'),
(8, 'database-design-patterns.png'),
(9, 'mobile-app-types.jpg'),
(10, 'serverless-architecture.png'),
(11, 'ai-applications.jpg'),
(12, 'blockchain-uses.jpg'),
(13, 'devops-pipeline.png'),
(14, 'ux-design-principles.jpg'),
(15, 'startup-growth.jpg');

-- INSERT INTO developers_links (user_id, link_type, link) VALUES
-- (1, 'GitHub', 'https://github.com/johndoe-dev'),
-- (1, 'Portfolio', 'https://johndoe.dev'),
-- (2, 'GitHub', 'https://github.com/janesmith-code'),
-- (2, 'LinkedIn', 'https://linkedin.com/in/janesmith'),
-- (4, 'GitHub', 'https://github.com/sarahwilliams'),
-- (4, 'Twitter', 'https://twitter.com/sarah_dev'),
-- (6, 'GitHub', 'https://github.com/emilydavis'),
-- (6, 'Blog', 'https://emilydavis.tech'),
-- (8, 'GitHub', 'https://github.com/jenniferlee'),
-- (8, 'Dribbble', 'https://dribbble.com/jenniferlee'),
-- (10, 'GitHub', 'https://github.com/lisaanderson'),
-- (10, 'Medium', 'https://medium.com/@lisaanderson'),
-- (12, 'GitHub', 'https://github.com/patriciaclark'),
-- (12, 'Website', 'https://patriciaclark.dev'),
-- (14, 'GitHub', 'https://github.com/nancywalker');

INSERT INTO product_languages (product_id, language_id) VALUES
(6, 3),   -- CloudManager supports Java
(7, 5),   -- SmartHome Hub supports PHP
(8, 7),   -- AR Designer supports Swift
(9, 9),   -- HealthTracker supports Go
(10, 10), -- BlockChain Suite supports Ruby
(11, 11), -- VR Classroom supports Rust
(12, 12), -- DevOps Pipeline supports TypeScript
(13, 13), -- Database Optimizer supports Dart
(14, 14), -- AI Chatbot supports Scala
(15, 15), -- IoT Monitor supports R
(3, 5),   -- SecureVault supports PHP
(4, 6),   -- MobilePay supports C++
(5, 8),   -- GameEngine supports Kotlin
(6, 10),  -- CloudManager supports Ruby
(7, 12);  -- SmartHome Hub supports TypeScript

INSERT INTO product_featuers (product_id, feature) VALUES
(6, 'Multi-cloud dashboard'),
(6, 'Cost optimization tools'),
(7, 'Voice control integration'),
(7, 'Energy usage monitoring'),
(8, 'Real-time 3D rendering'),
(8, 'Collaboration tools'),
(9, 'Wearable device sync'),
(9, 'Health risk alerts'),
(10, 'Smart contract templates'),
(10, 'Permission management'),
(11, 'Classroom management'),
(11, 'Interactive whiteboard'),
(12, 'Automated testing'),
(12, 'Deployment rollback'),
(13, 'Query optimization'),
(13, 'Index suggestions');

INSERT INTO product_likes (user_id, product_id) VALUES
(1, 6),   -- John likes CloudManager
(2, 7),   -- Jane likes SmartHome Hub
(3, 8),   -- Mike likes AR Designer
(4, 9),   -- Sarah likes HealthTracker
(5, 10),  -- David likes BlockChain Suite
(6, 11),  -- Emily likes VR Classroom
(7, 12),  -- Robert likes DevOps Pipeline
(8, 13),  -- Jennifer likes Database Optimizer
(9, 14),  -- Thomas likes AI Chatbot
(10, 15), -- Lisa likes IoT Monitor
(11, 1),  -- James likes CodeMaster IDE
(12, 2),  -- Patricia likes DataAnalyzer Pro
(13, 3),  -- Daniel likes SecureVault
(14, 4),  -- Nancy likes MobilePay
(15, 5);  -- Kevin likes GameEngine 3D

INSERT INTO blog_producs (blog_id, product_id) VALUES
(1, 12),  -- Web dev trends related to DevOps Pipeline
(2, 13),  -- React optimization related to Database Optimizer
(3, 14),  -- Machine learning related to AI Chatbot
(4, 15),  -- Microservices related to IoT Monitor
(5, 2),   -- Full-stack developer related to DataAnalyzer
(6, 4),   -- Cybersecurity related to MobilePay
(7, 5),   -- Frontend frameworks related to GameEngine
(8, 7),   -- Database design related to SmartHome Hub
(9, 8),   -- Mobile app development related to AR Designer
(10, 9),  -- Serverless architecture related to HealthTracker
(11, 10), -- AI applications related to BlockChain Suite
(12, 11), -- Blockchain related to VR Classroom
(13, 3),  -- DevOps related to SecureVault
(14, 6),  -- UX design related to CloudManager
(15, 1);  -- Tech startup related to CodeMaster IDE


INSERT INTO blog_comments (blog_id, user_id, dates, content) VALUES
(1, 5, '2023-01-20', 'How does this compare to last year\'s trends?'),
(2, 7, '2023-02-05', 'Would love to see Vue.js included in the comparison.'),
(3, 9, '2023-02-20', 'What about ethical considerations in ML?'),
(4, 11, '2023-03-05', 'How do you handle service discovery?'),
(5, 13, '2023-03-20', 'What about DevOps skills for full-stack?'),
(6, 15, '2023-04-05', 'Any thoughts on quantum encryption?'),
(7, 2, '2023-04-20', 'Svelte should be in this conversation too.'),
(8, 4, '2023-05-05', 'How do these patterns apply to NoSQL?'),
(9, 6, '2023-05-20', 'What about Flutter for cross-platform?'),
(10, 8, '2023-06-05', 'Cold start problem solutions?'),
(11, 10, '2023-06-20', 'How to prevent AI bias?'),
(12, 12, '2023-07-05', 'Energy consumption of blockchain?'),
(13, 14, '2023-07-20', 'Security implications of CI/CD?'),
(14, 1, '2023-08-05', 'Dark mode considerations?'),
(15, 3, '2023-08-20', 'Bootstrapping vs funding?');

INSERT INTO blog_replays (user_id, comment_id, Dates, content) VALUES
(1, 16, '2023-01-21', 'Great question David! We\'ll publish a comparison next week.'),
(2, 17, '2023-02-06', 'We\'ll include Vue in our next framework deep dive Robert.'),
(4, 18, '2023-02-21', 'Ethics is crucial Thomas - planning a dedicated post.'),
(6, 19, '2023-03-06', 'We use HashiCorp Consul James - good topic for a tutorial.'),
(1, 20, '2023-03-21', 'Excellent point Daniel! DevOps is becoming essential.'),
(3, 21, '2023-04-06', 'Quantum is fascinating Kevin! Still early days though.'),
(5, 22, '2023-04-21', 'Svelte is great Jane! We\'ll cover it soon.'),
(7, 23, '2023-05-06', 'NoSQL patterns coming next month Sarah!'),
(9, 24, '2023-05-21', 'Flutter is awesome Emily! Planning a comparison.'),
(11, 25, '2023-06-06', 'We use pre-warming techniques Jennifer.'),
(13, 26, '2023-06-21', 'Bias mitigation is key Patricia - needs careful training.'),
(15, 27, '2023-07-06', 'New consensus algorithms help John.'),
(2, 28, '2023-07-21', 'Security is critical Nancy - we use thorough scanning.'),
(4, 29, '2023-08-06', 'Dark mode is essential Mike! Planning a UX post.'),
(6, 30, '2023-08-21', 'Both approaches have merits David - case by case.');

INSERT INTO blog_comments_likes (user_id, comment_id) VALUES
(2, 16), (3, 16),
(4, 17), (5, 17),
(6, 18), (7, 18),
(8, 19), (9, 19),
(10, 20), (11, 20),
(12, 21), (13, 21),
(14, 22), (15, 22),
(1, 23), (2, 23),
(3, 24), (4, 24),
(5, 25), (6, 25),
(7, 26), (8, 26),
(9, 27), (10, 27),
(11, 28), (12, 28),
(13, 29), (14, 29),
(15, 30), (1, 30);

INSERT INTO related_products (product_id, related_product_id) VALUES
(2, 1),   -- DataAnalyzer related to CodeMaster IDE
(3, 4),   -- SecureVault related to MobilePay
(4, 3),   -- MobilePay related to SecureVault
(5, 8),   -- GameEngine related to AR Designer
(6, 12),  -- CloudManager related to DevOps Pipeline
(7, 9),   -- SmartHome Hub related to HealthTracker
(8, 11),  -- AR Designer related to VR Classroom
(9, 7),   -- HealthTracker related to SmartHome Hub
(10, 14), -- BlockChain Suite related to AI Chatbot
(11, 5),  -- VR Classroom related to GameEngine
(12, 1),  -- DevOps Pipeline related to CodeMaster IDE
(13, 6),  -- Database Optimizer related to CloudManager
(14, 2),  -- AI Chatbot related to DataAnalyzer
(15, 7),  -- IoT Monitor related to SmartHome Hub
(1, 13);  -- CodeMaster IDE related to Database Optimizer


