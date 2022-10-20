<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csstrial/index.css" />
    <link rel="stylesheet" href="csstrial/nav.css" />
    <link rel="stylesheet" href="csstrial/footer.css" />
    <link rel="stylesheet" href="csstrial/shoppingCart.css" />
    <title>Cart</title>
</head>

<body>
    <?php
    include '../components/nav.php';
    include '../php/connect.php';
    ?>


    <div class="shopping-cart-page page">
        <div class="title-container">
            <h1>Shopping cart</h1>
        </div>
        <?php
        include 'php/connect.php';
        if (!isset($_SESSION['custId']))
            echo "Please Login to continue";
        else {
            $uid = $_SESSION['custId'];
            $query = "SELECT * FROM `Order` , `OrderItems`,`Product` WHERE `Order`.`orderId` = `OrderItems`.`orderId` and `OrderItems`.`productId` = `Product`.`productId` and custId=$uid and `status`=0";
            $result = mysqli_query($conn, $query);

        ?>
            <div class="table-container content">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Subtotal Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $order_id = "";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $total += $row['price'] * $row['quantity'];
                            $order_id = $row['orderId'];
                            echo '
                                    <tr>
                                        <td class="product-col"> 
                                            <img src="' . $row['image'] . '" alt="product"/>
                                        </td>
                                        <td>
                                            <span>
                                                <a href="pages/productPage.php?productId=' . $row['productId'] . '" class="product-link">    
                                                    ' . $row['name'] . '
                                                </a>      
                                            </span>
                                        </td>
                                        <td>' . $row['quantity'] . '</td>
                                        <td>$' . $row['price'] . '</td>
                                        <td>$' . ($row['price'] * $row['quantity']) . '</td>
                                        <td>
                                            <form action="../php/delFromCart.php"method="POST">
                                                <input type="hidden" value="' . $row['productId'] . '" name="product_id" />
                                                <input type="hidden" value="' . $row['orderId'] . '" name="order_id" />
                                                <input type="submit" class="delete-btn" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>';
                        }

                        ?>
                    </tbody>
                    <tfoot>
                        <?php
                        if ($result->num_rows > 0) {
                            echo '
                                    <tr>
                                        <td colspan="5" class="total-price">Total Price: <span> $' . $total . '</span></td>
                                        <td>
                                            <form action="pages/checkout.php" method="POST">
                                            <input type="hidden" value="<?php echo $total; ?>" name="total" />
                                            <input type="hidden" value="<?php echo $order_id; ?>" name="order_id" />
                                            <input type="submit" class="checkout-btn" value="Checkout" />
                                        </td>
                                    </tr> ';
                        } else {
                            echo '
                                    <tr>
                                        <td class="no-product" colspan="6">No Product added to cart</td>
                                    </tr>
                                    ';
                        }
                        ?>

                    </tfoot>
                </table>
            </div>
        <?php }
        $conn->close();
        ?>

    </div>


</body>

</html>