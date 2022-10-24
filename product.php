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

        <div class="productbody">
            <?php
            include 'php/connect.php';
            $query = "SELECT * FROM `Product` where productId='" . $_GET['productId'] . "' ";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div id="rightproduct">
                                <img src=' . $row['image'] . '>
                                <img src=' . $row['image2'] . '>
                                <img src=' . $row['image3'] . '>
                                <img src=' . $row['image4'] . '>
                                
                        </div>
                        ';
                }
            }
            ?>
            <div id="leftproduct">
                <form action="#">
                    <div class="selection">
                        <p>Please select color:</p>
                        <input name="color" type="radio" id="black" value="black">
                        <label name="color" for="black">Black</label>
                        <input name="color" type="radio" id="blue" value="blue">
                        <label name="color" for="blue">Blue</label>
                        <input name="color" type="radio" id="green" value="green">
                        <label name="color" for="green">Green</label>
                        <input name="color" type="radio" id="red" value="red">
                        <label name="color" for="black">Red</label>
                    </div>
                    <div class="selection">
                        <p>Please select size:</p>
                        <input name="size" type="radio" id="large" value="large">
                        <label name="size" for="large">Large</label>
                        <input name="size" type="radio" id="medium" value="medium">
                        <label name="size" for="medium">Medium</label>
                        <input name="size" type="radio" id="small" value="small">
                        <label name="size" for="small">Small</label>

                    </div>
                    <div class="selection">
                        <label for="quantity">Quantity:</label>

                        <input type="number" id="points" min="0" name="quantity" step="3">

                    </div>
                    <div class="selection">
                        <input type="submit">
                    </div>




                </form>


            </div>
        </div>

        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>
</body>

</html>