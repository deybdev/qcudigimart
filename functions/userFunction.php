<?php

// Ensure session is started
session_start();

// LOGIN USER FUNCTION
function loginUser($email, $password, $conn) {
    // Sanitize inputs
    $email = mysqli_real_escape_string($conn, $email);
    
    // Check customers table
    $check_customers = mysqli_query($conn, "SELECT * FROM `customer` WHERE c_email ='$email'") or die('Query failed');
    
    // Check sellers table if customer not found
    $check_sellers = mysqli_query($conn, "SELECT * FROM `seller` WHERE s_email ='$email'") or die('Query failed');

    if (mysqli_num_rows($check_customers) > 0) {
        // Customer found
        $row = mysqli_fetch_assoc($check_customers);
        if (password_verify($password, $row['c_password'])) {
            // Start session for customer
            $_SESSION['customer_first_name'] = $row['c_first_name'];
            $_SESSION['customer_last_name'] = $row['c_last_name'];
            $_SESSION['customer_email'] = $row['c_email'];
            $_SESSION['customer_id'] = $row['c_id'];
            return ['status' => true, 'user_type' => 'customer'];
        } else {
            return ['status' => false, 'message' => 'Incorrect password for customer!'];
        }
    } elseif (mysqli_num_rows($check_sellers) > 0) {
        // Seller found
        $row = mysqli_fetch_assoc($check_sellers);
        if (password_verify($password, $row['s_password'])) {
            // Start session for seller
            $_SESSION['seller_first_name'] = $row['s_first_name'];
            $_SESSION['seller_last_name'] = $row['s_last_name'];
            $_SESSION['seller_email'] = $row['s_email'];
            $_SESSION['seller_id'] = $row['s_id'];
            $_SESSION['store_name'] = $row['store_name'];
            return ['status' => true, 'user_type' => 'seller'];
        } else {
            return ['status' => false, 'message' => 'Incorrect password for seller!'];
        }
    } else {
        return ['status' => false, 'message' => 'Email not found'];
    }
}


// REGISTER FUNCTION
function registerUser($conn, $first_name, $last_name, $email, $password, $cpassword, $user_type, $store_name = null) {
    // Check for empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword) || empty($user_type)) {
        return ['status' => false, 'message' => 'All fields are required. Please fill in all the fields.'];
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        return ['status' => false, 'message' => 'Confirm password does not match.'];
    }

    // Ensure password is at least 8 characters long
    if (strlen($password) < 8) {
        return ['status' => false, 'message' => 'Password must be at least 8 characters long.'];
    }

    // Check for seller-specific fields
    if ($user_type === 'seller' && empty($store_name)) {
        return ['status' => false, 'message' => 'Store name is required for sellers.'];
    }

    // Check if the email already exists in the customer or seller table
    $check_customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE c_email = '$email'");
    $check_seller = mysqli_query($conn, "SELECT * FROM `seller` WHERE s_email = '$email'");

    if (mysqli_num_rows($check_customer) > 0 || mysqli_num_rows($check_seller) > 0) {
        return ['status' => false, 'message' => 'User with this email already exists.'];
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the appropriate table based on user type
    if ($user_type === 'customer') {
        $insert = mysqli_query($conn, "INSERT INTO `customer` (c_first_name, c_last_name, c_email, c_password) 
                                       VALUES ('$first_name', '$last_name', '$email', '$hashed_password')");
        if (!$insert) {
            return ['status' => false, 'message' => 'Failed to register customer.'];
        }
    } elseif ($user_type === 'seller') {
        $insert = mysqli_query($conn, "INSERT INTO `seller` (s_first_name, s_last_name, s_email, s_password, store_name) 
                                       VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$store_name')");
        if (!$insert) {
            return ['status' => false, 'message' => 'Failed to register seller.'];
        }
    }

    // Return success if registration is successful
    return ['status' => true, 'message' => 'Registration successful!'];
}

?>
