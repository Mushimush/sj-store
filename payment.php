<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Payment</title>
</head>

<body>
    <?php
    require('php/connect.php');
    require('auth_session.php');
    $username = $_SESSION['username'];
    $totalprice = $_SESSION['totalprice'];
    $privilege = $_SESSION['privilege'];


    // print_r($_SESSION['username']);
    //exit;
    //print_r($totalprice)
    // $sql = "SELECT * from users";
    // $results = $conn->query($sql);
    // foreach ($result as $row) {
    //    echo $row;
    // }
    ?>

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
        <div class="payment">
            <h1 id="paymenttext">Hello, <?php echo $username ?> ,where do we ship these to?</h1>
            <form method="post" action="placeOrder.php">
                <table class="customer-details-table">
                    <?php
                    echo '          
                <tr>
                <td class="label">Email</td>
                <td> <input id="placeorderinput" type="email" placeholder="Your email address" name="email" value="" required/> </td>
                </tr>
                <tr>
                <td class="label">Address</td>
                <td> <input id="placeorderinput" type="text" placeholder="Your address" name="address" value="" required/> </td>
                </tr>';
                    ?>

                </table>
                <div>
                    <input type="hidden" name="totalAmount" value="<?php echo $totalprice; ?>" />
                    <input type="hidden" name="" value="<?php echo $totalprice; ?>" />


                    <div class="total-payment">
                        <h3>Total Price: $ <?php echo $totalprice ?></h4>
                    </div>
                    <button id="placeorderinput" type="submit" name="placeorder" class="place-order-btn">Place Order</button>
                </div>
            </form>
        </div>
        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>


</body>

</body>

</html>