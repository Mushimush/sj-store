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
        <div class="admin">
            <form action="insert_product.php" method="post">
                <div class="insertcontainer">
                    <label for="productId">Product Id</label>
                    <input style="width: 400px;" type="number" name="productId" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productName">Product Name</label>
                    <input style="width: 400px;" type="text" name="productName" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productPrice">Product Price</label>
                    <input style="width: 400px;" type="number" name="productPrice" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productCat">Product Category</label>
                    <input style="width: 400px;" type="text" name="productCat" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productColor">Product Color</label>
                    <input style="width: 400px;" type="text" name="productColor" maxlength="30" size="10000" required>
                </div>
                <div class="insertcontainer">
                    <label for="productSize">Product Size</label>
                    <input style="width: 400px;" type="text" name="productSize" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productStock">Product Stock</label>
                    <input style="width: 400px;" type="number" name="productStock" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productStock">Product Description</label>
                    <input style="width: 400px;" type="text" name="productDescription" maxlength="30" size="100" required>
                </div>
                <div class="insertcontainer">
                    <label for="productimage">1st Product Image</label>
                    <input style="width: 400px;" type="file" id="productimage" name="productimage" accept="image/png, image/jpeg" required>
                </div>
                <div class="insertcontainer">
                    <label for="productimage2">2nd Product Image</label>
                    <input style="width: 400px;" type="file" id="productimage2" name="productimage2" accept="image/png, image/jpeg" required>
                </div>
                <div class="insertcontainer">
                    <label for="productimage3">2nd Product Image</label>
                    <input style="width: 400px;" type="file" id="productimage3" name="productimage3" accept="image/png, image/jpeg" required>
                </div>
                <div class="insertcontainer">
                    <label for="productimage4">2nd Product Image</label>
                    <input style="width: 400px;" type="file" id="productimage4" name="productimage4" accept="image/png, image/jpeg" required>

                </div>
                <button class="insertbtn" type="submit">
                    Insert
                </button>


            </form>


        </div>


        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="contact.html">Contact us !</a>
        </footer>
    </div>
</body>

</html>