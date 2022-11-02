<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="styless.css" />
</head>

<body>
    <?php
    require('php/connect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $privilege = $_REQUEST['privilege'];
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, privilege, password, email, create_datetime)
                     VALUES ('$username','$privilege', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <img src="res/coollogo_com-63181092.png" alt="">
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <div class="inputmax">
                <div class="input">
                    <label class="inputlabel" for="user">User</label>
                    <input type="radio" id="user" class="login-input" name="privilege" value="user" required>
                </div>
                <div class="input">
                    <label class="inputlabel" for="user">Admin</label>
                    <input type="radio" id="admin" class="login-input" name="privilege" value="admin" required>
                </div>

            </div>

            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>