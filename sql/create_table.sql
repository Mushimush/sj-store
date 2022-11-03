CREATE TABLE `users` 
(   id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    privilege varchar(50) NOT NULL,
    email int varchar(50), 
    username varchar(50) NOT NULL UNIQUE,
    password varchar(50) NOT NULL,
    create_datetime DATETIME
);

CREATE TABLE `Product` 
(
    productindex int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productId int,
    name varchar(256),
    price float(16,2),
    category varchar(64),
    color varchar(45),
    size varchar(45),
    stock int,
    description TEXT,
    image varchar(255),
    image2 varchar(255),
    image3 varchar(255),
    image4 varchar(255)
);

CREATE TABLE `Order` 
(
    orderId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username varchar(50),
    email varchar(100), 
    purchasedDate date,
    totalAmount float(16,2),
);

CREATE TABLE `OrderItems` 
(
    orderItemsId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    orderId int UNSIGNED,
    productId int UNSIGNED,
    quantity int,
    size varchar(50)
    colors varchar(50)
    FOREIGN KEY (orderId)
        REFERENCES `Order`(orderId),
);



