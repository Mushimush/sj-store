<?php
include '../php/connect.php';
include '../php/auth.php';
$conn->close();
?>

<nav>
    <div class="nav-content">
        <div class="logo">
            <a href="../pages/index.html">
                <img src="../res/coollogo_com-63181092.png" />
            </a>
        </div>
        <ul>
            <li><a href="pages/cataloge.php>All Products</a></li>
            <li><a href=" pages/cataloge.php>Apparels</a></li>
            <li><a href="pages/cataloge.php">Footwear</a></li>
            <li><a href="pages/cataloge.php">Cart</a></li>
        </ul>
        <div class="right-content">
            <div class="cart">
                <a href="cart.php">Cart</a>
            </div>
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
                                    <li style="margin-top:12px; cursor: pointer;"> <a href="../php/logout.php" style="color:black;">logout</a></li>
                                ';
                        }
                        ?>
                        <ul>
                </div>
            </div>
        </div>
    </div>

    <!-- login Modal -->
    <div id="login-modal" class="login-modal modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <h1>Login</h1>
                <form method="POST" onsubmit="return handleSubmitLogin()">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $prev_username : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $prev_password : '' ?>" />
                    </div>
                    <input type="hidden" name="type" value="login" />
                    <div class="error-message"><?php echo isset($_POST['type']) && $_POST['type'] == 'login' ? $errorMessage : '' ?></div>
                    <button>Sign In</button>
                </form>
                <small>Don't have an account? Register <span onclick="triggerModalById('signup-modal')">here</span></small>
            </div>
        </div>
    </div>


    <!-- signup Modal -->
    <div id="signup-modal" class="signup-modal modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <h1>Sign Up</h1>
                <form method="POST" onsubmit="return handleSubmitSignup()">
                    <div class="input-group">
                        <input type="text" name="fullName" placeholder="Full Name" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_fullName : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ?  $prev_email : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ?  $prev_username : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="date" name="dateOfBirth" placeholder="Date of Birth" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_dateOfBirth : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_password : '' ?>" />
                    </div>
                    <div class="input-group">
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required value="<?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $prev_confirmPassword : '' ?>" />
                    </div>
                    <input type="hidden" name="type" value="signup" />
                    <div class="error-message"><?php echo isset($_POST['type']) && $_POST['type'] == 'signup' ? $errorMessage : '' ?></div>
                    <button>Sign Up</button>
                </form>
                <small>Already have an account? <span onclick="triggerModalById('login-modal')">Sign In here</span></small>
            </div>
        </div>
    </div>

    <script src="../js/modal.js"></script>
    <script src="../js/nav.js"></script>
    <?php
    if ($showModal == 'login-modal')
        echo '<script> triggerModalById("login-modal") </script>';
    else if ($showModal == 'signup-modal')
        echo '<script> triggerModalById("signup-modal") </script>';
    ?>
    <script src="../js/validateForm.js"></script>
    <script>
        function handleSubmitLogin() {
            let form = document.querySelector('.login-modal form')
            let username = form.querySelector('input[name="username"]').value
            let password = form.querySelector('input[name="password"]').value
            let errorDom = form.querySelector('.error-message')

            let isValidated = validateLogin({
                username,
                password,
                errorDom
            })
            return isValidated
        }

        function handleSubmitSignup() {
            let form = document.querySelector('.signup-modal form')
            let fullName = form.querySelector('input[name="fullName"]').value
            let username = form.querySelector('input[name="username"]').value
            let password = form.querySelector('input[name="password"]').value
            let email = form.querySelector('input[name="email"]').value
            let dateOfBirth = form.querySelector('input[name="dateOfBirth"]').value
            let confirmPassword = form.querySelector('input[name="confirmPassword"]').value

            let errorDom = form.querySelector('.error-message')

            let isValidated = validateSignup({
                fullName,
                email,
                username,
                dateOfBirth,
                password,
                confirmPassword,
                errorDom
            })
            console.log('isValidated', isValidated)
            return isValidated
        }
    </script>
</nav>