<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sjstore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* comment necessary code below if you have run this cript before */
$sql = "CREATE TABLE `Account` (
    accountId int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username varchar(64) NOT NULL UNIQUE,
    password varchar(64) NOT NULL
);";

$sql .= "CREATE TABLE `CustomerDetails` (
    custId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    accountId int UNSIGNED,
    fullName varchar(128),
    email varchar(128),
    phoneNumber varchar(30),
    address varchar(256),
    dateOfBirth Date,
    FOREIGN KEY (accountId)
        REFERENCES Account(accountId)
);";

$sql .= "CREATE TABLE `Product` (
    productId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(256),
    price float(16,2),
    category varchar(64),
    stock int,
    description TEXT,
    image varchar(255)
);";

$sql .= "CREATE TABLE `Colors` (
    colorId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productId int UNSIGNED,
    color_name varchar(45),
    FOREIGN KEY (productId)
        REFERENCES Product(productId)
);";

$sql .= "CREATE TABLE `Size` (
    sizeId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productId int UNSIGNED,
    size varchar(45),
    FOREIGN KEY (productId)
        REFERENCES Product(productId)
);";


/* status = 0 for in cart, 1 if paid */
$sql .= "CREATE TABLE `Order` (
    orderId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    status int, 
    custId int UNSIGNED,
    purchasedDate date,
    totalAmount float(16,2),
    FOREIGN KEY (custId)
        REFERENCES CustomerDetails(custId)
);";

$sql .= "CREATE TABLE `OrderItems` (
    orderItemsId int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    orderId int UNSIGNED,
    productId int UNSIGNED,
    quantity int,
    FOREIGN KEY (orderId)
        REFERENCES `Order`(orderId),
    FOREIGN KEY (productId)
        REFERENCES Product(productId)
);";

if (mysqli_multi_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
