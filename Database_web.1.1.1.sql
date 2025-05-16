use web;
drop database web;

create database web;
use web;

set foreign_key_checks=1;

create table users(
user_id int primary key auto_increment,
user_name varchar(50),
password varchar(15) not null default '1234567890',
email varchar(25) not null,
photo varchar(255),
user_type varchar(25),
role varchar(255)
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
user_id int,
link_type varchar(30),
link varchar(255),
constraint dev_us_li_pk primary key(user_id,link_type),
constraint dev_us_li_fk foreign key(user_id) references users(user_id)
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
constraint foreign key (user_id) references users(user_id) on delete cascade ,
constraint foreign key (product_id) references products(product_id) on delete cascade);

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
user_id int,
product_id int,

constraint pd_fk_us foreign key(user_id) references users(user_id) on delete cascade,
constraint pd_fk_pr foreign key(product_id) references products(product_id) on delete cascade,
constraint pduspr_pk primary key(user_id,product_id) 
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

INSERT INTO users (user_name, password, email, photo, user_type) VALUES
('mohammed', 'password123', 'john@example.com', 'user/user1.jpg', 'admin'),
('ahmed anwer', 'securePass', 'jane@example.com', 'user/user2.jpg', 'user'),
('mubarak ashraf', 'mikePass456', 'mike@example.com', 'user/user3.jpg', 'user'),
('ali', 'alicePass789', 'alice@example.com', 'user/user4.jpg', 'admin'),
('osama ahmed', 'bobSecure', 'bob@example.com', 'user/user5.jpg', 'developer'),
('soltan ali', 'charlie123', 'charlie@example.com', 'user/user6.jpg', 'user'),
('mohammed soltan', 'davidPass', 'david@example.com', 'user/user7.jpg', 'user');

INSERT INTO blogs (content) VALUES
('The Future of AI'),
('Web Development Trends'),
('Cybersecurity Best Practices'),
('The Rise of Cloud Computing'),
('Why Open Source Matters'),
('Machine Learning Innovations'),
('The Role of Databases in Modern Apps');

INSERT INTO categorys (category_name) VALUES
('AI Tools'),
('Web Development'),
('Cybersecurity'),
('Cloud Services'),
('Open Source'),
('Machine Learning'),
('Database Management');

-- create table developers_accounts(
-- developer_id int ,
-- account_type varchar(20),
-- account_link varchar(255),
-- constraint foreign key(developer_id) references developers(developer_id) on delete cascade);

INSERT INTO languages (language_name) VALUES
('Python'),
('JavaScript'),
('Java'),
('C++'),
('PHP'),
('Swift'),
('GoLang');

INSERT INTO products (product_name, large_description, short_description, product_version, product_video, price, category_id) VALUES
('AI Assistant', 
 'The AI Assistant is an advanced, intelligent tool designed to help users automate tasks, answer questions, and provide recommendations. 
  Powered by cutting-edge machine learning algorithms, it continuously learns from user interactions, improving over time. 
  The AI Assistant supports voice recognition, text-based queries, and natural language processing, making it an indispensable tool for businesses and individuals alike. 
  It integrates seamlessly with third-party applications, enabling users to schedule meetings, set reminders, and even control smart home devices.', 
 'AI-based personal assistant','1.0', 'video/product1.mp4', 99.99, 1),

('Web Builder', 
 'The Web Builder is an intuitive drag-and-drop website development platform designed for both beginners and professionals. 
  With a vast library of pre-designed templates and a powerful backend, users can create stunning websites without any coding knowledge. 
  It supports custom domain integration, SEO optimization, e-commerce functionalities, and responsive design, ensuring websites look great on any device. 
  Advanced users can also leverage its built-in HTML, CSS, and JavaScript editor for further customization.', 
 'Drag & drop website builder', '2.5', 'video/product2.mp4',120.99, 2),

('CyberSec Suite', 
 'CyberSec Suite is a state-of-the-art cybersecurity software package designed to protect users from online threats. 
  It features real-time threat detection, firewall protection, anti-phishing measures, and malware scanning. 
  The suite continuously updates its database with the latest security threats, ensuring users are always protected. 
  Ideal for individuals and businesses, it provides network monitoring tools, encrypted VPN services, and secure password management.', 
 'Advanced cybersecurity protection', '3.1', 'video/product3.mp4', 89.99, 3),

('Cloud Storage', 
 'Cloud Storage is a high-speed, secure, and scalable cloud-based file storage solution. 
  Designed to meet the needs of individuals and businesses, it offers seamless file synchronization across multiple devices. 
  The platform supports automatic backups, end-to-end encryption, and file-sharing capabilities with custom access permissions. 
  Users can take advantage of collaborative tools, version history tracking, and AI-powered search features to easily retrieve their files.', 
 'Secure cloud file storage', '5.0', 'video/product4.mp4', 75.99, 4),

('Open Source Tool', 
 'The Open Source Tool is a comprehensive development environment that provides developers with robust, community-driven software solutions. 
  It includes an integrated code editor, version control system, debugging tools, and collaborative coding features. 
  The tool is fully customizable, allowing developers to extend its functionalities using plugins and API integrations. 
  It supports multiple programming languages and frameworks, making it an essential tool for software engineers.', 
 'Developer-friendly open-source tool', '1.8', 'video/product5.mp4', 49.99, 5),

('ML API', 
 'The Machine Learning API is a powerful, cloud-based API service designed to provide developers with pre-trained machine learning models. 
  It supports various AI functionalities, including image recognition, natural language processing, speech-to-text, and recommendation systems. 
  The API is easy to integrate with existing applications and can be used for building intelligent automation workflows. 
  Developers can also train custom models using the platform’s user-friendly interface and extensive dataset library.', 
 'AI-powered API for developers', '2.3', 'video/product6.mp4', 150.99, 6),

('Database Manager', 
 'Database Manager is a comprehensive software tool designed to help database administrators and developers manage and optimize relational databases. 
  It provides a visual interface for database creation, query execution, performance analysis, and backup management. 
  The tool supports multiple database engines, including MySQL, PostgreSQL, and SQL Server. 
  Advanced features include automated indexing, query optimization, and data migration capabilities, making it an indispensable tool for database professionals.', 
 'All-in-one database management tool', '4.0', 'video/product7.mp4', 110.99, 7);

update products set discount = 0.30 where product_id >= 0;

INSERT INTO product_featuers (product_id, feature) VALUES
(7, 'Feature A, Feature B, Feature C'), -- Product 8 features
(1, 'Feature D, Feature E, Feature F'), -- Product 9 features
(2, 'Feature G, Feature H, Feature I'), -- Product 10 features
(3, 'Feature J, Feature K, Feature L'), -- Product 11 features
(4, 'Feature M, Feature N, Feature O'), -- Product 12 features
(5, 'Feature P, Feature Q, Feature R'), -- Product 13 features
(6, 'Feature S, Feature T, Feature U'); -- Product 14 features

INSERT INTO buys (user_id, product_id, dates, price) VALUES
(1, 1, '2024-02-01', 99.99),
(2, 2, '2024-02-02', 120),
(3, 3, '2024-02-03', 89),
(4, 4, '2024-02-04', 75),
(5, 5, '2024-02-05', 49),
(6, 6, '2024-02-06', 150),
(7, 7, '2024-02-07', 110);

INSERT INTO product_likes(user_id, product_id) VALUES
(1, 1), -- User 4 likes Product 8
(2, 2), -- User 5 likes Product 9
(3, 3), -- User 6 likes Product 10
(4, 4), -- User 7 likes Product 11
(5, 5), -- User 8 likes Product 12
(6, 6), -- User 9 likes Product 13
(7, 7); -- User 10 likes Product 14

INSERT INTO rates (user_id, product_id, rate) VALUES
(1, 7, 5), -- User 4 rates Product 8 with 5 stars
(2, 6, 4), -- User 5 rates Product 9 with 4 stars
(3, 5, 3), -- User 6 rates Product 10 with 3 stars
(4, 4, 5), -- User 7 rates Product 11 with 5 stars
(7, 2, 2), -- User 8 rates Product 12 with 2 stars
(5, 3, 4), -- User 9 rates Product 13 with 4 stars
(6, 1, 5); -- User 10 rates Product 14 with 5 stars

INSERT INTO product_developers (user_id, product_id) VALUES
(1, 1), -- Developer 1 worked on Product 8
(2, 2), -- Developer 2 worked on Product 9
(3, 3), -- Developer 3 worked on Product 10
(4, 7), -- Developer 4 worked on Product 11
(5, 6), -- Developer 5 worked on Product 12
(6, 5), -- Developer 6 worked on Product 13
(7, 4); -- Developer 7 worked on Product 14

INSERT INTO comments (product_id, dates ,user_id,content,comment_id) VALUES
(1, '2025-02-01',4,'I like this application',1),
(2, '2025-02-02',5,'Buy this to have more exprience',2),
(3, '2025-02-03',5,'wooo this project is the best',3),
(4, '2025-02-04',6,'I like it',4),
(5, '2025-02-05',7,'wonderfull interfaces , I am sure It will have more than 1 handred buys a yrear',5);

INSERT INTO replays (user_id,comment_id, dates, content) VALUES
(4, 1, '2025-02-01', 'I really love this product!'),
(5, 1, '2025-02-01', 'Same here! The quality is amazing.'),
(6, 2, '2025-02-02', 'Could be better, but not bad.'),
(7, 3, '2025-02-03', 'Does it support multiple languages?'),
(1, 3, '2025-02-04', 'Where can I buy this?'),
(2, 4, '2025-02-05', 'Awesome product, highly recommend!');

INSERT INTO comments_likes (user_id,comment_id) VALUES
(4, 5), -- User 4 likes comment 11
(5, 1), -- User 5 likes comment 11
(6, 2), -- User 6 likes comment 12
(7, 3), -- User 7 likes comment 13
(3, 4); -- User 5 also likes comment 12

-- create table product_developers(
-- user_id int,
-- product_id int ,
-- constraint foreign key (user_id) references  users(user_id) on delete set null ,
-- constraint foreign key (product_id) references products(product_id) on delete set null);


-- create table user_comment_main_comment(
-- user_id int,
-- main_comment_id int ,
-- dates date,content varchar(255),
-- constraint foreign key (user_id) references users(user_id) on delete set null ,
-- constraint foreign key (main_comment_id ) references main_comment(main_comment_id ) on delete set null);

-- INSERT INTO developers (developer_name) VALUES
-- ('Alice Dev'),
-- ('Bob Dev'),
-- ('Charlie Dev'),
-- ('David Dev'),
-- ('Eve Dev'),
-- ('Frank Dev'),
-- ('Grace Dev');