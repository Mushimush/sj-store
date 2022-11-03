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
    require('php/connect.php');
    require('auth_session.php');
    $privilege = $_SESSION['privilege'];

    ?>

    <div class="catalogue">
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
                        $query = "SELECT * from Product where productId='" . $_GET['productId'] . "'";
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