<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJ STORE</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php require('php/connect.php');
require('auth_session.php');

$username = $_SESSION['username'];
$privilege = $_SESSION['privilege'];

?>

<body>
    <div class="main">
        <div class="navbar">
            <a href="index.php">
                <img src="res/coollogo_com-63181092.png" alt="shiba-logo">
            </a>
            <div class="navlink">
                <div class="dropdown">
                    <a href="cataloge.php">All Products</a>
                    <div class="dropdown-content">
                        <a href="cataloge.php?productCategory=footwear">Footwear</a>
                        <a href="cataloge.php?productCategory=top">Top</a>
                        <a href="cataloge.php?productCategory=bottom">Bottom</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="cart.php">Cart</a>
                </div>
                <div class="dropdown">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo '<a href="index.php">' . $username . '</a>';
                        // $privilege = 'admin'; // take away once sql side is solved
                        if ($privilege == 'admin') {
                            echo '<a href="admin.php">Admin</a>';
                        }
                        echo '<a href="logout.php">Logout</a>
                        ';
                    } else {
                        echo '<a href="login.php">Login</a>';
                    }

                    ?>

                </div>

            </div>
        </div>
        <div id="main-body">
            <h1>Thank you for your purchased !</h1>

            <?php
            $sql = "SELECT `orderId` FROM `Order` where `username` = '$username'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <h2>Your Order ID is :  ' . $row['orderId'] . ' is on the way!</h2>
                ';
                }
            }



            ?>
            <h3>We look forward to shopping with you again!</h3>

        </div>
        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="contact.html">Contact us !</a>

        </footer>
    </div>
</body>

</html>