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
    $accountId = $_SESSION['accountId'];
    $totalprice = $_SESSION['totalprice'];
    $uid = $_SESSION['custId'];


    // print_r($_SESSION['accountId']);
    // exit;
    //print_r($totalprice)
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
        <div class="payment">


            <h2>Payment</h2>
            <form method="post" action="placeOrder.php">
                <table class="customer-details-table">
                    <?php
                    $query = "SELECT * from `CustomerDetails` where accountId= $accountId";
                    $result = mysqli_query($conn, $query);
                    $row = $result->fetch_assoc();
                    echo '          
                 <tr>
                <td class="label">Full Name</td>
                <td> <input type="text" placeholder="Your full name" value="' . $row['fullName'] . '" required/> </td>
                 </tr>
                <tr>
                <td class="label">Email</td>
                <td> <input type="email" placeholder="Your email address" name="email" value="' . $row['email'] . '" required/> </td>
                </tr>
                <tr>
                <td class="label">Phone Number</td>
                <td> <input type="text" placeholder="Your phone number" name="phoneNumber" value="' . $row['phoneNumber'] . '" required/> </td>
                </tr>
                <tr>
                <td class="label">Address</td>
                <td> <input type="text" placeholder="Your address" name="address" value="' . $row['address'] . '" required/> </td>
                </tr>';
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2">
                            <div class="total-payment">
                                <input type="hidden" name="totalAmount" value="<?php echo $totalprice; ?>" />
                                <input type="hidden" name="custId" value="<?php echo $uid; ?>" />
                                <div>
                                    <h3>Total Price: $ <?php echo $totalprice ?></h4>
                                        <h3>Total Price: $ <?php echo $uid ?></h4>


                                </div>
                                <button type="submit" name="placeorder" class="place-order-btn">Place Order</button>
                            </div>
                        </td>
                    </tr>
                </table>
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