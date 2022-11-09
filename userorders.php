<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>SJ STORE</title>
</head>

<body>
    <?php
    require('php/connect.php');
    require('auth_session.php');
    //$productCategory = $_GET['productCategory'];
    if (isset($_GET['productCategory'])) {
        $productCategory = $_GET['productCategory'];
    }
    $username = $_SESSION['username'];
    $privilege = $_SESSION['privilege'];

    ?>
    <div class="navbar">
        <a href="index.php">
            <img src="res/SJLOGO.JPG" alt="SJlogo">
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
                <a href="cataloges.php">Best Selling</a>
            </div>
            <div class="dropdown">
                <a href="cart.php">Cart</a>
            </div>
            <div class="dropdown">
                <?php
                if (isset($_SESSION['username'])) {
                    if ($privilege == 'admin') {
                        echo '<a href="admin.php">Admin</a>';
                    } else {
                        $username = $_SESSION['username'];
                        echo '
                        <a href="userorders.php">' . $username . '</a>

                        ';
                    }
                }
                ?>
            </div>
            <div class="dropdown">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="logout.php">Logout</a>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="order">
        <h1>Hello, <?php echo ' ' . $username . ' ' ?>, here is your order history!</h1>
        <?php

        include 'php/connect.php';

        $sql = "SELECT * FROM `Order` where username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {


                echo '
                        <div class="userorder">
                             <div class="order-content">
                                 <h1> Order Number : ' . $row['orderId'] . ' </h1>
                                 <div class="address"> Shipping Address : ' . $row['address'] . '</div>
                                 <div class="purchasedDate"> Order Date : ' . $row['purchasedDate'] . '</div>
                                  <div class="totalamount"> Total Amount : ' . $row['totalAmount'] . '</div>
                              </div>
                        </div>
         

                        ';
            }
        }


        ?>


    </div>
    <footer>
        <img src="res/SJLOGO.JPG" alt="logo">
        <a href="contact.php">Contact us !</a>
    </footer>

</body>

</html>