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
$sql = "INSERT INTO `Order` (username, email, address, purchasedDate, totalAmount) VALUES ('$username', '$email','$address', '$currentDate', '$totalAmount')";

$conn->query($sql);
if (mysqli_affected_rows($conn) > 0) {
    $success = 'true';

    //send email
    $to      = 'sjcustomer@localhost';          // this will be the set email address of customer
    $subject = 'Your Order is on its way!!';
    $message = 'Dear SJCustomer,

    Your order has been successfully placed, your order will be shipped soon.
    Thank you for your purchase!
                
    SJ Team';
    // set content-type to send HTML email
    $headers = 'From: sjcustomer@localhost' . "\r\n" .
        'Reply-To: sjcustomer@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, '-sjcustomer@localhost');
}
$orderId = $conn->insert_id;

foreach ($_SESSION["cart_items"] as $item) {

    $productId = $item['productId'];
    $quantity = $item['qty'];
    $name = $item['name'];
    $size = $item['size'];
    $color = $item['color'];

    $sql1 = "INSERT INTO OrderItems (orderId, productId,name, quantity, size, colors)
VALUES ('$orderId', '$productId' ,'$name', '$quantity', '$size', '$color')";
    $conn->query($sql1);

    $sql2 = "UPDATE Product SET stock= stock-'$quantity' where productId = '$productId' and size='$size' and color='$color' ";
    // print_r($sql2);
    // exit();
    $conn->query($sql2);
}


header("location:order_success.php");
