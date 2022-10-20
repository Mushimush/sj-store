<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("php/connect.php");
    $query = "SELECT * FROM Product where productId='" . $_GET['productId'] . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="product__image">
        <img src="<?php echo $row['image']; ?>" alt="..." />
    </div>

</body>

</html>