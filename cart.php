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
    include 'php/connect.php';
    include 'php/auth.php';
    $res = "";
    if (!isset($_SESSION['custId']) && isset($_POST['id']))
        $res = "NOT_LOGGED_IN";
    else if (isset($_SESSION['custId']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $uid = $_SESSION['custId'];
    }
    unset($_POST['id']); //as we don't want the product id to be the same if we reload the page
    ?>
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
        <div class="cart">
            <?php
            session_start();
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
            ?>
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Image</th>
                            <th style="text-align:left;">Name</th>
                            <th style="text-align:right;" width="5%">Quantity</th>
                            <th style="text-align:right;" width="5%">Size</th>
                            <th style="text-align:right;" width="5%">Color</th>
                            <th style="text-align:right;" width="10%">Unit Price</th>
                            <th style="text-align:right;" width="10%">Total</th>
                            <th style="text-align:center;" width="5%">Remove</th>
                        </tr>
                        <?php
                        foreach ($_SESSION["cart_items"] as $key => $item) {
                            $item_price = $item["quantity"] * $item["price"];
                        ?>
                            <tr>
                                <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /></td>
                                <td><?php echo $item["name"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["qty"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["size"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["color"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ " . number_format($item["qty"] * $item["price"], 2); ?></td>
                                <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $key; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                            </tr>
                        <?php
                            $total_quantity += $item["qty"];
                            $total_price += ($item["price"] * $item["qty"]);
                            $_SESSION['totalprice'] = $total_price;
                        }
                        ?>

                        <tr>
                            <td colspan="2" align="right">Total:</td>
                            <td align="right"><?php echo $total_quantity; ?></td>
                            <td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                            <td> <a href="payment.php">Payment</a>
                            </td>


                            <td></td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <div class="no-records">Your Cart is Empty</div>
            <?php
            }
            ?>

        </div>

        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>

</body>

</html>