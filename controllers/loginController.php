<?php
include '../config/config.php';
include '../functions/userFunction.php';

session_start(); // Ensure the session is started

if (isset($_POST['login'])) {
    // Get form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for empty fields
    if (empty($email) || empty($password)) {
        $_SESSION['message'] = 'Both fields are required.';
        header("location: ../uploads/login.php");
        exit();
    }

    // Call login function
    $result = loginUser($email, $password, $conn);

    if ($result['status']) {
        if ($result['user_type'] == 'customer') {
            header("location: ../customer/home.php");
            exit();
        } elseif ($result['user_type'] == 'seller') {
            header("location: ../seller/dashboard.php");
            exit();
        }
    } else {
        // Store the error message in the session
        $_SESSION['message'] = $result['message'];
        // Redirect to the login page
        header("location: ../uploads/login.php");
        exit();
    }
}
?>
