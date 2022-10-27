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
            $query = "SELECT * FROM `Product` where productId='" . $_GET['productId'] . "' ";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $price = $row['price'];
                    $desc = $row['description'];
                    $color = $row['color'];
                    $productId = $row['productId'];
                    $name = $row['name'];
                    $image = $row['image'];
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
            $conn->close();
            ?>
            <div id="leftproduct">
                <form method="post" action="add_to_cart.php">
                    <div class="selection">
                        <p>Please select size:</p>

                        <?php
                        include 'php/connect.php';
                        $query = "SELECT * from Size where productId='" . $_GET['productId'] . "'";
                        $result = mysqli_query($conn, $query);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <input name="size" type="radio" id="color" value="' . $row['size'] . '">
                                <label name="size" for="black">' . $row['size'] . '</label>
                            ';
                            }
                        }
                        $result->free_result();
                        ?>
                    </div>
                    <div class="selection">
                        <h4 id="colortext">Color:
                            <?= $color; ?>
                        </h4>

                    </div>

                    <div class="selection">
                        <label id="quantity" for="quantity">Quantity:</label>

                        <input type="number" id="points" min="0" name="quantity" step="1">

                    </div>
                    <div class="selection">
                        <h4>Unit Price : $<?= $price; ?></h4>
                        <input type="hidden" name="price" value="<?= $price; ?>">
                        <input type="hidden" name="color" value="<?= $color; ?>">
                        <input type="hidden" name="productId" value="<?= $productId; ?>">
                        <input type="hidden" name="image" value="<?= $image; ?>">
                        <input type="hidden" name="name" value="<?= $name; ?>">

                    </div>

                    <div class="selection">
                        <div align="center"><button id="addtocartbtn" type="submit" name="addToCart" class="add_to_cart">Add to cart</button></div>
                    </div>
                </form>
                <div>
                    <h4 id="desctext">
                        <?= $desc; ?>
                    </h4>
                </div>
            </div>
        </div>
        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>
</body>

</html>