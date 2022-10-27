<?php
include("php/connect.php");
include("php/auth.php");

$res = "";
if (!isset($_SESSION['custId']) && isset($_POST['id']))
    $res = "NOT_LOGGED_IN";
else if (isset($_SESSION['custId']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $uid = $_SESSION['custId'];
}
unset($_POST['id']); //as we don't want the product id to be the same if we reload the page

$fullName = $_POST['fullName'];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$address = $_POST["address"];
$totalAmount = $_POST["totalAmount"];
$custId = $_POST["custId"];

$sql = "INSERT INTO Order (`status`, custId, purchasedDate, totalAmount) VALUES (1, $custId, now(), $totalAmount)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error ";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>