<?php
    include'../config/config.php';
    session_start();

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
    
        $check_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email ='$email'") or die('query failed');
        if(mysqli_num_rows($check_users) > 0){
            $row = mysqli_fetch_assoc($check_users);

            if(password_verify($password, $row['password'])) {
                if($row['user_type'] == 'customer') { 
                    $_SESSION['customer_first_name'] = $row['first_name'];
                    $_SESSION['customer_last_name'] = $row['last_name'];
                    $_SESSION['customer_email'] = $row['email'];
                    $_SESSION['customer_id'] = $row['id'];
                    header("location: ../customer/home.php");
                } elseif ($row['user_type'] == 'seller') {
                    $_SESSION['seller_first_name'] = $row['first_name'];
                    $_SESSION['seller_last_name'] = $row['last_name'];
                    $_SESSION['seller_email'] = $row['email'];
                    $_SESSION['seller_id'] = $row['id'];
                    header("location: ../seller/dashboard.php");
                }
            }else{
                $message = 'Incorrect password';
            }
        } else {
            $message = 'Email not found!';
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include'../main/header.php' ?>

    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-box">
                <form action="login.php" method="post">
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
                            if(isset($message)){
                              echo'<div class="alert-message">
                              <p><i class="fa-solid fa-circle-exclamation"></i>'.$message.'</p>
                              </div>';
                              }
                            ?>
                        <div class="form-element">
                            <button class="btn" name="login">Login</button>
                        </div>
                        <div class="form-element">
                            <hr>
                            <p>Don't have an account? <a href="register.php">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include'../main/footer.php' ?>
</body>
</html>