<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php include '../main/header.php'; ?>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-box">
                <form action="../controllers/registerController.php" method="post">
                    <div class="form">
                        <h2>REGISTER</h2>
                        <div class="form-element half-width">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" value="<?php echo isset($_POST['first-name']) ? htmlspecialchars($_POST['first-name']) : ''; ?>">
                        </div>
                        <div class="form-element half-width">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" value="<?php echo isset($_POST['last-name']) ? htmlspecialchars($_POST['last-name']) : ''; ?>">
                        </div>
                        <div class="form-element full-width">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                        <div class="form-element full-width">
                            <label for="password">Create Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-element full-width">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" id="cpassword" name="cpassword">
                        </div>
                        <div class="form-element half-width">
                            <label for="user_type">User Type</label>
                            <select name="user_type" id="user_type">
                                <option value="customer" selected>Customer</option>
                                <option value="seller">Seller</option>
                            </select>
                        </div>
                        <div class="form-element half-width">
                            <label for="store_name">Store Name</label>
                            <input type="text" id="store_name" name="store_name" placeholder="Only for sellers" readonly>
                        </div>
                        <div class="form-element">
                            <input type="checkbox" id="terms">
                            <label for="terms">I agree to the <a href="#">Terms</a> and <a href="#">Conditions</a></label>
                        </div>

                        <?php
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert-message"><p><i class="fa-solid fa-circle-exclamation"></i>'  . htmlspecialchars($_SESSION['message']) . '</p></div>';
                            unset($_SESSION['message']); // Clear the message after displaying
                        }
                        ?>

                        <div class="form-element">
                            <button class="btn" name="register">Register</button>
                        </div>
                        <div class="form-element">
                            <hr>
                            <p>Already have an account? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <?php include '../main/footer.php'; ?>
    <script>
        document.getElementById("user_type").addEventListener("change", function() {
            var userType = this.value;
            var storeInput = document.getElementById("store_name");

            if (userType === "customer") {
                storeInput.readOnly = true; 
                storeInput.value = '';
            } else if (userType === "seller") {
                storeInput.readOnly = false;
            }
        });
    </script>
</body>
</html>
