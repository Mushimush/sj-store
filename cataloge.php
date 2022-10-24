<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <?php
    include 'php/connect.php';
    include 'php/auth.php';
    $res = "";
    if (!isset($_SESSION['custId']) && isset($_POST['id']))
        $res = "NOT_LOGGED_IN";
    else if (isset($_SESSION['custId']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $uid = $_SESSION['custId'];
        if ($_POST['type'] == "cart") {
            include "php/cart.php";
        }
    }
    unset($_POST['id']); //as we don't want the product id to be the same if we reload the page
    ?>



    <div class="catalogue">
        <div class="main">
            <div class="navbar">
                <a href="index.php">
                    <img src="res/coollogo_com-63181092.png" alt="shiba-logo">
                </a>
                <div class="navlink">
                    <a href="cataloge.html">All Products</a>
                    <a href="cataloge.php">Apparels</a>
                    <a href="cataloge.php">Footwear</a>
                    <a href="cart.php">Cart</a>
                    <div class="account">
                        <a href="#" class="account-btn">
                            <div>
                                <?php
                                if (isset($_SESSION['username']))
                                    echo $_SESSION['username'];
                                else
                                    echo 'Account'
                                ?>
                            </div>
                        </a>
                        <div class="account-dropdown" style="height: 0; padding: 0;">
                            <ul>
                                <?php
                                if (!isset($_SESSION['username'])) {
                                    echo '
                                <li class="modal-open-btn" data-target="login-modal">Login <hr/></li>
                                <li class="modal-open-btn" data-target="signup-modal">Signup</li>
                                ';
                                } else {
                                    echo '
                                    <li style="margin-top:12px; cursor: pointer;"> <a href="php/logout.php" style="color:black;">logout</a></li>
                                ';
                                }
                                ?>
                                <ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalogue-body">
            <nav class="sidebar">
                <a href="">All Products</a>
                <a href="">Apparel</a>
                <a href="">Footwear</a>
            </nav>
            <?php
            include 'php/connect.php';
            include "php/cartlogin.php";
            $sql = "SELECT * FROM `Product` ;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    echo '
                    <div class="catalogue-content">
                        <div class="content">
                        <a href="product.php?productId=' . $row['productId'] . '">
                            <img src=' . $row['image'] . '>
                            <div class="product-name">' . $row['name'] . '</div>
                           <div class="product-price">$' . $row['price'] . '</div>
                        </a>


                        </div>
                    </div>
                    ';
                }
            }

            $conn->close();
            ?>
        </div>

        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>

    </div>

</body>

</html>