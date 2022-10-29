CREATE TABLE `Account` 
(
    accountId int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username varchar(64) NOT NULL UNIQUE,
    password varchar(64) NOT NULL
);

CREATE TABLE `CustomerDetails` 
(
    custId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accountId int UNSIGNED,
    fullName varchar(128),
    email varchar(128),
    phoneNumber varchar(30),
    address varchar(256),
    dateOfBirth Date,
    FOREIGN KEY (accountId)
        REFERENCES Account(accountId)
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
    image1 varchar(255),
    image2 varchar(255),
    image3 varchar(255),
    image4 varchar(255)
);

CREATE TABLE `Colors` 
(
    colorId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productId int UNSIGNED,
    color_name varchar(45),
    FOREIGN KEY (productId)
        REFERENCES Product(productindex)
);

CREATE TABLE `Size` 
(
    sizeId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productId int UNSIGNED,
    size varchar(45),
    FOREIGN KEY (productId)
        REFERENCES Product(productindex)
);


/* status = 0 for in cart, 1 if paid */
CREATE TABLE `Order` 
(
    orderId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    status int, 
    custId int UNSIGNED,
    purchasedDate date,
    totalAmount float(16,2),
    FOREIGN KEY (custId)
        REFERENCES CustomerDetails(custId)
);

CREATE TABLE `OrderItems` 
(
    orderItemsId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    orderId int UNSIGNED,
    productId int UNSIGNED,
    quantity int,
    FOREIGN KEY (orderId)
        REFERENCES `Order`(orderId),
    FOREIGN KEY (productId)
        REFERENCES Product(productindex)
);



