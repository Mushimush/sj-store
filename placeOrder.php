<?php
include("php/connect.php");
include("php/auth.php");

$fullName = $_POST['fullName'];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$address = $_POST["address"];
$totalAmount = $_POST["totalAmount"];
$custId = $_POST["custId"];


$sql = "update CustomerDetails set fullName='$fullName', email='$email', phoneNumber='$phoneNumber', address='$address' where custId = '$custId'";
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) <= 0) {
    $success = 'false';
}

//TEST - case if payment unsuccessful
else if ($custId == 10)
    $success = 'false';


//handle payment by third party 
//assume success
//$sql = "insert `Order` set totalAmount = $totalAmount, purchasedDate =now(), status = 1 where orderId = ".$orderId;

$sql = "INSERT INTO Order (`status`, custId, email, purchasedDate, totalAmount)
    VALUES ('1', $custId, now(), $totalAmount)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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