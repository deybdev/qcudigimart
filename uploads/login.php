<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include '../main/header.php'; ?>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-box">
                <form action="../controllers/loginController.php" method="post">
                    <div class="form">
                        <h2>LOGIN</h2>
                        <div class="form-element full-width">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-element full-width">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-element">
                            <input type="checkbox" id="terms">
                            <label for="remember">Remember Password</label>
                            <a href="forgot.php" class="forgot">Forgot Password</a>
                        </div>
                        <?php
                        // Display the message if it exists
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert-message"><p><i class="fa-solid fa-circle-exclamation"></i>' . $_SESSION['message'] . '</p></div>';
                            unset($_SESSION['message']); // Clear the message after displaying it
                        }
                        ?>
                        <div class="form-element">
                            <button class="btn" name="login">Login</button>
                        </div>
                        <div class="form-element">
                            <hr>
                            <p>Don't have an account? <a href="../uploads/login.php">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '../main/footer.php'; ?>
</body>
</html>
