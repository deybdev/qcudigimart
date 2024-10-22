<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Header</title>
</head>

<style>

</style>

<body>
    <div class="navbar">
        <div class="hamburger" onclick="toggleBar()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="logo-container">
            <div class="image-logo">
                <img src="../assets/qcu-logo.png" alt="Logo">
            </div>
            <div class="text-logo">
                <h1>QCU | DIGIMART</h1>
            </div>
        </div>

        <div class="nav-menu-links">
            <div class="nav-links">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Browse</a></li>
                    <li><a href="../main/about.php">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Search">
                <i class="fa-solid fa-magnifying-glass" aria-label="search-icon"></i>
            </div>

            <!-- If Seller is logged in -->
            <?php if(isset($_SESSION['seller_first_name']) && isset($_SESSION['seller_last_name'])) : ?>
            <div class="nav-icons" onclick="toggleMenu()">
                <i class="fa-regular fa-user"></i>
                <p><?php echo htmlspecialchars($_SESSION['seller_first_name']); ?><a id="arrow-icon" class="fa-solid fa-angle-down"></a></p>
            </div>
            <div class="submenu-wrap" id="sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <h2><?php echo htmlspecialchars($_SESSION['seller_first_name']) . ' ' . htmlspecialchars($_SESSION['seller_last_name']); ?></h2>
                        <p><?php echo htmlspecialchars($_SESSION['seller_email']); ?></p>
                    </div>
                    <hr>
                    <a href="../seller/profile.php" class="sub-menu-link">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <p>Edit Page</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../seller/dashboard.php" class="sub-menu-link">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <p>Manage Products</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../seller/messages.php" class="sub-menu-link">
                        <i class="fa-regular fa-message"></i>
                        <p>Messages</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../uploads/logout.php" class="sub-menu-link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Logout</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                </div>
            </div>

            <!-- If Customer is logged in -->
            <?php elseif(isset($_SESSION['customer_first_name']) && isset($_SESSION['customer_last_name'])) : ?>
            <div class="nav-icons" onclick="toggleMenu()">
                <i class="fa-regular fa-user"></i>
                <p><?php echo htmlspecialchars($_SESSION['customer_first_name']); ?><a id="arrow-icon" class="fa-solid fa-angle-down"></a></p>
            </div>
            <div class="submenu-wrap" id="sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <h2><?php echo htmlspecialchars($_SESSION['customer_first_name']) . ' ' . htmlspecialchars($_SESSION['customer_last_name']); ?></h2>
                        <p><?php echo htmlspecialchars($_SESSION['customer_email']); ?></p>
                    </div>
                    <hr>
                    <a href="../customer/update_profile.php" class="sub-menu-link">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <p>Update Profile</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../customer/saved_products.php" class="sub-menu-link">
                        <i class="fa-regular fa-heart"></i>
                        <p>Saved Products</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../customer/messages.php" class="sub-menu-link">
                        <i class="fa-regular fa-message"></i>
                        <p>Messages</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                    <a href="../uploads/logout.php" class="sub-menu-link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Logout</p>
                        <span class="fa-solid fa-chevron-right"></span>
                    </a>
                </div>
                
            </div>
            

            <!-- If no one is logged in -->
            <?php else: ?>
            <div class="nav-icons">
                <i class="fa-regular fa-user"></i>
                <p><a href="../uploads/login.php">Login</a> | <a href="../uploads/register.php">Register</a></p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../script.js">
    </script>
    <script>
    function toggleBar() {
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
    
        hamburger.classList.toggle('active'); // Toggle the active class
        navLinks.classList.toggle('active'); // Toggle the nav links visibility
    }

    </script>
</body>
</html>
