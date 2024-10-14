<?php
include '../config/config.php';
include '../functions/userFunction.php';

if (isset($_POST['register'])) {
    // Sanitize form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $store_name = isset($_POST['store_name']) ? mysqli_real_escape_string($conn, $_POST['store_name']) : '';

    // Call the registration function
    $result = registerUser($conn, $first_name, $last_name, $email, $password, $cpassword, $user_type, $store_name);

    // Handle the result
    if ($result['status']) {
        $_SESSION['message'] = $result['message']; // Set success message in session
        header('Location: ../uploads/login.php'); // Redirect to login page on success
        exit();
    } else {
        $_SESSION['message'] = $result['message']; // Set error message in session
        header('Location: ../uploads/register.php'); // Redirect back to registration page on failure
        exit();
    }
}

?>
