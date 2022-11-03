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
        <div id="aboutus">
            <div id="aboutusleft">
                <h2>About us</h2>
                <img src="res/coollogo_com-63181092.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est suscipit at, consectetur vero nam temporibus deleniti. Odio, pariatur delectus voluptates adipisci provident deserunt non doloribus accusamus necessitatibus incidunt nesciunt, optio nobis iusto eum beatae quam voluptas fugiat repellendus sit. Excepturi aliquam neque ullam explicabo dignissimos, illum eaque blanditiis a consequatur.</p>
            </div>
            <div id="aboutusright">
                <h2>Contact us!</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, blanditiis.</p>
                <h5>Other useful Links</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, mollitia consequatur! Dicta accusamus illum aut, cupiditate id odit officia illo!</p>
            </div>
        </div>
        <footer>
            <img src="res/coollogo_com-63181092.png" alt="logo">
            <a href="">Contact us !</a>

        </footer>
    </div>
</body>

</html>