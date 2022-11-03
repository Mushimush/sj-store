<?php

require('php/connect.php');
require('auth_session.php');

if (isset($_POST['addToCart'])) {
    $name =  $_POST['name'];
    $size =  $_POST['size'];
    $color =  $_POST['color'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $productId = $_POST['productId'];
    $image = $_POST['image'];
    $uniquekey = $_POST['uniquekey'];

    //start session and save in session cart array

    session_start();
    //session_destroy();


    $_SESSION['cart_items'][$uniquekey] = [
        'uniquekey' => $uniquekey,
        'size' => $size,
        'color' => $color,
        'qty' => $quantity,
        'price' => $price,
        'productId' => $productId,
        'image' => $image,
        'name' => $name,

    ];
    //print_r($_SESSION['cart_items']);
   // exit();
    header("location:cart.php");
}
