<?php
if (isset($_POST['addToCart'])) {
    $name =  $_POST['name'];
    $size =  $_POST['size'];
    $color =  $_POST['color'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $productId = $_POST['productId'];
    $image = $_POST['image'];

    //start session and save in session cart array

    session_start();
    //session_destroy();


    $_SESSION['cart_items'][] = [
        'size' => $size,
        'color' => $color,
        'qty' => $quantity,
        'price' => $price,
        'productId' => $productId,
        'image' => $image,
        'name' => $name,

    ];
    header("location:cart.php");
}
