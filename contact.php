<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJ STORE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('php/connect.php');
    require('auth_session.php');

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
    <div class="main">
        <div id="aboutus">
            <div id="aboutusleft">
                <h2>About us</h2>
                <img src="res/SJ.jpg" alt="">
                <p>Hi and welcome to SJ store!! We thank you for browsing around and purchasing our products. <br>We are a 2 young and wild kids who have a PASSION FOR FASHION which lead us to creating this online store . <br>Feel free to contact us if neccesary!</p>
            </div>
            <div id="aboutusright">
                <h2>Contact us!</h2>
                <p>Hotline: <br>1800-5522-2525</p>
                <p>Email: <br><a href="SJstore@sj.com">SJstore@sj.com</a></p>
                <h2>Other useful Links</h2>
                <a href="https://www.ntu.edu.sg/">NTU</a>
                <a href="404.html">:)</a>
            </div>
        </div>
        <footer>
            <img src="res/SJLOGO.jpg" alt="SJlogo">
            <a href="">Contact us !</a>

        </footer>
    </div>
</body>

</html>