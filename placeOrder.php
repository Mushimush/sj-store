<?php

require('php/connect.php');
require('auth_session.php');



$username = $_SESSION['username'];
$email = $_POST["email"];
$address = $_POST["address"];
$totalAmount = $_POST["totalAmount"];
//print_r($username);
//exit();

//insert into order table

$currentDate = date('Y-m-d');
$sql = "INSERT INTO `Order` (username, email, purchasedDate, totalAmount) VALUES ('$username', '$email', '$currentDate', '$totalAmount')";

$conn->query($sql);
if (mysqli_affected_rows($conn) > 0) {
    $success = 'true';

    //send email
    $to      = 'sjstore@localhost';
    $subject = 'Your Order is successful';
    $message = 'Your order is successfull, and your order will be shipped soon';
    // set content-type to send HTML email
    $headers = 'From: sjstore@localhost' . "\r\n" .
        'Reply-To: sjstore@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, '-sjstore@localhost');
}
$orderId = $conn->insert_id;

foreach ($_SESSION["cart_items"] as $item) {

    $productId = $item['productId'];
    $quantity = $item['qty'];
    $size = $item['size'];
    $color = $item['color'];

    $sql1 = "INSERT INTO OrderItems (orderId, productId, quantity, size, colors)
VALUES ('$orderId', '$productId' , '$quantity', '$size', '$color')";


    $conn->query($sql1);
}

header("location:order_success.php");
