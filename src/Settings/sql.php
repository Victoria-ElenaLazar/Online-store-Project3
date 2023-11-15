<?php

"CREATE TABLE products(
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR (225),
    image_url VARCHAR (500),
    product_description TEXT,
    product_price DECIMAL (10,2),
    product_availability TINYINT (1) DEFAULT 1  
);

CREATE TABLE users(
    
user_id INT PRIMARY KEY AUTO_INCREMENT,
user_first_name VARCHAR (225),
user_last_name VARCHAR (225),
user_email VARCHAR (225),
user_password VARCHAR (225)
);

CREATE TABLE orders(
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    image_url VARCHAR(500),
    created_on TIMESTAMP,
    payment_status TINYINT (1) DEFAULT 1
);
";