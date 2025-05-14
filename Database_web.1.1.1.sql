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


select * from users;

use web;


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


