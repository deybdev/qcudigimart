<?php
include '../config/config.php';
include '../functions/userFunction.php';

if (isset($_POST['register'])) {
    
    $first_name = mysqli_real_escape_string($conn, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $store_name = isset($_POST['store_name']) ? mysqli_real_escape_string($conn, $_POST['store_name']) : '';

    $result = registerUser($conn, $first_name, $last_name, $email, $password, $cpassword, $user_type, $store_name);

    if ($result['status']) {
        $_SESSION['message'] = $result['message'];
        header('Location: ../uploads/login.php');
        exit();
    } else {
        $_SESSION['message'] = $result['message'];
        header('Location: ../uploads/register.php');
        exit();
    }
}

?>
