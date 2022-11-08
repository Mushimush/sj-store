<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>SJ STORE</title>
</head>

<body>
    <?php
    require('php/connect.php');
    require('auth_session.php');
    //$productCategory = $_GET['productCategory'];
    if (isset($_GET['productCategory'])) {
        $productCategory = $_GET['productCategory'];
    }
    $username = $_SESSION['username'];
    $privilege = $_SESSION['privilege'];

    ?>
            <div class="navbar">
                <a href="index.php">
                    <img src="res/SJLOGO.jpg" alt="SJlogo">
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
                        if ($privilege == 'admin'){
                            echo '<a href="admin.php">Admin</a>';
                        } else{
                        $username = $_SESSION['username'];
                        echo '<a href="index.php">' . $username . '</a>';
                        }
                    }
                    ?>
                </div>
                <div class="dropdown">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo '<a href="login.php">Login</a>';
                    }
                    ?>
                </div>
            </div>
            </div>
    <div class="catalogue">
        <div class="catalogue-body">
            <nav class="sidebar">
                <h4>Filter by</h4>
                <a href="catalogee.php">Price</a>
                <a href="cataloges.php">Best Selling</a>
            </nav>
            <div class="catalogue-items">
                <?php
                include 'php/connect.php';
                if (isset($productCategory)) {
                    //$sql = "SELECT * FROM Product WHERE category='$productCategory'";
                    $sql = "SELECT p.* 
                FROM Product as `p`
                inner join
                (
                   select `productId`, MIN(`productindex`) as `productindex`
                   from Product WHERE category='$productCategory'
                   group by `productId`
                   having MIN(`productindex`)
                ) as `x`
                on `x`.`productId` = `p`.`productId` and `x`.`productindex` = `p`.`productindex`";


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
                } else {
                    $sql = "SELECT p.* 
                FROM Product as `p`
                inner join
                (
                   select `productId`, MIN(`productindex`) as `productindex`
                   from Product
                   group by `productId`
                   having MIN(`productindex`)
                ) as `x`
                on `x`.`productId` = `p`.`productId` and `x`.`productindex` = `p`.`productindex`";
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
                }

                ?>


            </div>

        </div>

        <footer>
            <img src="res/SJLOGO.jpg" alt="logo">
            <a href="contact.php">Contact us !</a>

        </footer>

    </div>

</body>

</html>