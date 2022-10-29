
<?php
require('php/connect.php');
require('auth_session.php');
$username = $_SESSION['username'];


$productId = $_POST['productId'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productCat = $_POST['productCat'];
$productColor = $_POST['productColor'];
$productSize = $_POST['productSize'];
$productStock = $_POST['productStock'];
$productDescription = $_POST['productDescription'];
$productimage = $_POST['productimage'];
$productimage2 = $_POST['productimage2'];
$productimage3 = $_POST['productimage3'];
$productimage4 = $_POST['productimage4'];

$sql = "INSERT into `Product` (`productId`,`name`,`price`,`category`,`color`,`size`,`stock`,`description`,`image`,`image2`,`image3`,`image4` ) values ('$productId','$productName' , '$productPrice','$productCat' ,'$productColor', '$productSize','100', '$productDescription', '$productimage', '$productimage2','$productimage3','$productimage4')";
$conn->query($sql);


header("location:admin.php")
?>
