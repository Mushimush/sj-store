<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('php/connect.php');
    require('auth_session.php');
    $username = $_SESSION['username'];
    $privilege = $_SESSION['privilege'];

    ?>
    <div class="main">
        <div class="navbar">
            <a href="index.php">
                <img src="res/coollogo_com-63181092.png" alt="shiba-logo">
            </a>
            <div class="navlink">
                <div class="dropdown">
                    <a href="cataloge.php">All Products</a>
                </div>
                <div class="dropdown">
                    <a href="cataloge.php?productCategory=apparel">Apparels</a>
                    <div class="dropdown-content">
                        <a href="cataloge.php">Tees</a>
                        <a href="cataloge.php">Shorts</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="cataloge.php?productCategory=footwear" class="dropbtn">Footwear</a>
                    <div class="dropdown-content">
                        <a href="cataloge.php">2002R series</a>
                        <a href="cataloge.php">NYC Marathon series </a>
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
        <div class="cart">
            <?php
            if (!empty($_GET['action'])) {
                $code = $_GET['code'];
                unset($_SESSION["cart_items"][$code]);
                header("location:cart.php");
            }
            if (!empty($_SESSION["cart_items"])) {

                // print_r($_SESSION["cart_items"]);
                // exit;
                $total_quantity = 0;
                $total_price = 0;

                foreach ($_SESSION["cart_items"] as $key => $item) {
                    $item_price = $item["qty"] * $item["price"];
                    $total_quantity += $item["qty"];
                    $item_total = $item_price * $total_quantity;
                    $total_price += ($item["price"] * $item["qty"]);
                    $_SESSION['totalprice'] = $total_price;

                    //html code 
                    echo '
                    <div class="cartitem">
                    <div id="cartimage">
                    <img src=' . $item['image'] . '>
                    </div>
                    <div id="cartdesc">
                        <p id="cartitemname"> ' . $item["name"] . ' </p>
                        <p>Quantity: ' . $item["qty"] . ' </p>
                        <p>Size: ' . $item["size"] . ' </p>
                        <p>Price:$ ' . $item["price"] . ' </p>
                        <p>Item total price $ ' . number_format($item["qty"] * $item["price"], 2) . ' </p>
                        <a href="cart.php?action=remove&code=' . $key . '" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a>

                    </div>
                </div>
 
                    ';
                }
            } else {
            ?>
                <div id="emptycart">
                    <h1>Your cart is empty</h1>
                </div>
            <?php
            }
            ?>
            <div id="paymentbutton">
                <h3> Total price : $<?= $total_price ?></h3>

                <a href="payment.php">Checkout</a>
            </div>
        </div>

        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>

</body>

</html>