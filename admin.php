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


// if ($_SESSION['privilege'] != 'admin') {
//     echo "You have no rights to access this page";
//     exit;
// }

//for udpate
if (isset($_GET['update'])) {
    $qty = $_GET['qty'];
    $price = $_GET['price'];
    $productID = $_GET['productID'];
    $sql = "UPDATE Product SET price='$price', stock='$qty' where productindex = '$productID'";
    $conn->query($sql);
    header('location:admin.php');
}
//for delete
if (isset($_GET['action'])) {
    $productID = $_GET['id'];
    $sql = "DELETE FROM Product where productindex = '$productID'";
    $conn->query($sql);
    header('location:admin.php');
}
$username = $_SESSION['username'];
// $sql = "SELECT * from users where username = '$username' and privilege='admin'";
// $result = mysqli_query($conn, $sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "" . $row["privilege"] . "";
//     }
//     $_SESSION['privilege'] = $row['privilege'];
// }
?>

<body>
    <div class="main">
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
        <div class="admin">
            <table style="width:80%">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Stock</th>
                </tr>
                <?php
                $sql = "SELECT * from Product";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['productindex'];
                        echo '
<form method="get" action="admin.php">
                        <tr>
                            <th><img id="adminimage" src="' . $row['image'] . '" alt=""></th>
                            <th>' . $row['name'] . '</th>
                            <th><input type="number" name="price" value="' . $row['price'] . '" step="1" min="1"></th>
                            <th>' . $row['category'] . '</th>
                            <th>' . $row['color'] . '</th>
                            <th>' . $row['size'] . '</th>
                            <th><input type="number" name="qty" value="' . $row['stock'] . '" step="1" min="1"></th>
                            <th>
                            <a href="admin.php?action=delete&id=' . $id . '"><img id="deletebtn"  src="res/istockphoto-928418914-170667a.jpg" alt="Remove Item" /></a>
                            <input type="hidden" name="productID" value="' . $row['productindex'] . '" required/>
                            </th>
                        </tr>
                        </form>


                ';
                    }
                }
                ?>
            </table>

        </div>
        <div class="adminbtncontainer ">
            <a href="cart.php">
                Update!
            </a>

        </div>
        <div class="adminbtncontainer ">
            <a href="admininsert.php">
                Insert Item!
            </a>

        </div>

        <footer>
            <img src="res/SJLOGO.jpg" alt="logo">
            <a href="contact.html">Contact us !</a>

        </footer>
    </div>
</body>

</html>