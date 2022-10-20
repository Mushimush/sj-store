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
    <div class="catalogue">
        <div class="navbar">
            <img src="res/coollogo_com-63181092.png" alt="shiba-logo">
            <div class="navlink">
                <a href="">All Products</a>
                <a href="">Apparels</a>
                <a href="">Footwear</a>
                <a href="">Cart</a>
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
                            <img src=' . $row['image'] . '>
                            <div class="product-name">' . $row['name'] . '</div>
                            <div class="product-price">$' . $row['price'] . '</div>
                            <form method="post">
                                    <input type="hidden" value="' . $row['productId'] . '" name="id" />
                                    <input type="hidden" value="cart" name="type" />
                                    <input type="submit" class="btn btn-success btn-block" value="Add to cart"/>
                            </form>
                        </div>
                    </div>
                    ';



                // echo '
                // <div class="product-card">
                //     <a href="../pages/productPage.php?productId=' . $row['productId'] . '" class="product-link">
                //         <img src=' . $row['image'] . '/>
                //     </a>
                //     <div class="product-details">
                //         <a href="../pages/productPage.php?productId=' . $row['productId'] . '" class="product-link">
                //             <div class="product-name">' . $row['name'] . '</div>
                //         </a>
                //         <div class="product-rating">
                // ';
                // include '../components/rating.php';
                // echo '
                // </div>
                //         <div class="product-desc">
                //         ' . substr($row['description'], 0, 150) . '...
                //         </div>
                //     </div>

                //     <div class="product-action">
                //         <div class="product-price">$' . $row['price'] . '</div>
                //         <form method="post">
                //             <input type="hidden" value="' . $row['productId'] . '" name="id" />
                //             <input type="hidden" value="cart" name="type" />
                //             <input type="submit" class="btn btn-success btn-block" value="Add to cart"/>
                //         </form>
                //         <form method="post">
                //             <input type="hidden" value="' . $row['productId'] . '" name="id" />
                //             <input type="hidden" value="list" name="type" />
                //             <input type="submit" class="btn btn-block btn-outline-warning wishlist-button" value="Add to wishlist"/>
                //         </form>

                //     </div>
                // </div>
                // <hr/>';
            }
        }

        $conn->close();
        ?>
    </div>

    </div>

</body>

</html>