<?php 
    include '../config/config.php';

    if(isset($_POST['register'])){
        $first_name = mysqli_real_escape_string($conn, $_POST['first-name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last-name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
        $store_name = mysqli_real_escape_string($conn, $_POST['store_name']);
    
        // Check for empty fields
        if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword) || empty($user_type)){
            $message = 'All fields are required. Please fill in all the fields.';
        } else if ($password !== $cpassword) {
            $message = 'Confirm password does not match';
        } else if (strlen($_POST['password']) < 8) {
            $message = 'Password must be at least 8 characters long';
        } else if ($user_type === 'seller' && empty($store_name)) {
            $message = 'Store name is required for sellers';
        } else {
            // Check if the email already exists
            $check_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die ('Query failed');
            if (mysqli_num_rows($check_users) > 0) {
                $message = 'User with this email already exists';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                if ($user_type === 'customer') {
                    $store_name = '-'; // Assign default value for customer
                }
    
                mysqli_query($conn, "INSERT INTO `users` (first_name, last_name, email, password, user_type, store_name) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$user_type', '$store_name')") or die('Query failed');
    
                header('Location: login.php');
                exit();
            }
        }
    }
    

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php include'../main/header.php' ?>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-box">
                <form action="register.php" method="post">
                    <div class="form">
                        <h2>REGISTER</h2>
                        <div class="form-element half-width">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" value="<?php echo isset($_POST['first-name']) ? htmlspecialchars($_POST['first-name']) : ''; ?>">
                        </div>
                        <div class="form-element half-width">
                            <label for="first-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" value="<?php echo isset($_POST['last-name']) ? htmlspecialchars($_POST['last-name']) : ''; ?>">
                        </div>
                        <div class="form-element full-width">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                        <div class="form-element full-width">
                            <label for="password">Create Password</label>
                            <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                        </div>
                        <div class="form-element full-width">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" id="cpassword" name="cpassword" value="<?php echo isset($_POST['cpassword']) ? htmlspecialchars($_POST['cpassword']) : ''; ?>">
                        </div>
                        <div class="form-element half-width">
                            <label for="user-type">User Type</label>
                            <select name="user_type" id="user_type">
                                <option value="customer" selected>Customer</option>
                                <option value="seller" >Seller</option>
                            </select>
                        </div>
                        <div class="form-element half-width">
                            <label for="store_name">Store Name</label>
                            <input type="text" id="store_name" name="store_name" placeholder="Only for sellers" readonly>
                        </div>
                        <div class="form-element">
                            <input type="checkbox" id="terms">
                            <label for="terms">I have agreed to the <a href="#">Terms</a> and <a href="#">Conditions</a></label>
                        </div>

                        <?php 
                        if(isset($message)){
                            echo'<div class="alert-message">
                                    <p><i class="fa-solid fa-circle-exclamation"></i>'.$message.'</p>
                                </div>';
                          }
                        ?>

                        <div class="form-element">
                            <button class="btn" name="register">Register</button>
                        </div>
                        <div class="form-element">
                            <hr>
                            <p>Have an account? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <?php include'../main/footer.php' ?>
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