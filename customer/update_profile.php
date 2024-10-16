<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Update Profile</title>
</head>

<body>
    <!-- Include Header -->
    <?php include '../main/header.php'; ?>

    <div class="update-profile-container ">
        <!-- Left Section: Profile Section -->
        <div class="profile-section">
            <div class="profile-pic">
                <img src="profile-placeholder.png" alt="Profile Image">
                <div class="edit-pic">&#9998;</div>
            </div>
            <h2><?php echo htmlspecialchars($_SESSION['customer_first_name']) . ' ' . htmlspecialchars($_SESSION['customer_last_name']); ?></h2>
            <div class="profile-info">
                <label>Email</label>
                <input type="text" value="<?php echo htmlspecialchars($_SESSION['customer_email']); ?>" disabled>
                <label>User Type</label>
                <input type="text" value="Customer" disabled>
                <label>Contact No.</label>
                <input type="text" value="09123456789" disabled>
            </div>
            <button class="btn">Update Profile</button>
        </div>

        <!-- Right Section: Saved Products and Recently Viewed -->
        <div class="right-section">
            <!-- Saved Products Section -->
            <div class="saved-products">
                <i class="fa-solid fa-heart"></i>
                <div class="saved-products-info">    
                    <h1>17</h1>
                    <p>All Saved Products</p>
                    <a href="#">View all</a>
                </div>
            </div>

            <!-- Recently Viewed Section -->
            <div class="recently-viewed">
                <h3>Recently Viewed</h3>
                <ul>
                    <li>
                        <p class="item-title">The Chicken Coop | Entrepreneurs Team</p>
                        <p class="item-date">Sept. 27, 2024</p>
                    </li>
                    <li>
                        <p class="item-title">The Chicken Coop | Entrepreneurs Team</p>
                        <p class="item-date">Sept. 27, 2024</p>
                    </li>
                    <li>
                        <p class="item-title">The Chicken Coop | Entrepreneurs Team</p>
                        <p class="item-date">Sept. 27, 2024</p>
                    </li>
                </ul>
                <button class="">See All</button>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include '../main/footer.php'; ?>
</body>
</html>
