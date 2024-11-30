<?php
include '../config/config.php';
session_start(); // Start the session to access session variables

// Check if the form is submitted
if (isset($_POST['submit'])) {
    if ($_FILES['image']['error'] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate image format and size
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Invalid image format');</script>";
        } elseif ($fileSize > 1000000) {
            echo "<script>alert('Image size is too large');</script>";
        } else {
            // Create a unique name for the new image
            $newImageName = '../assets/user/' . uniqid() . '.' . $imageExtension;

            // Move the uploaded file to the assets directory
            if (move_uploaded_file($tmpName, '../assets/' . $newImageName)) {
                // Update the database with the new image name
                $query = "UPDATE customer SET profile_image = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('si', $newImageName, $_SESSION['customer_id']);
                
                if ($stmt->execute()) {
                    // Update the session variable for the new profile image
                    $_SESSION['profile_image'] = $newImageName;
                    echo "<script>alert('Profile updated successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to update profile image in the database.');</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Failed to move uploaded file.');</script>";
            }
        }
    }
}
?>

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

    <div class="update-profile-container">
        <!-- Left Section: Profile Section -->
        <form action="update_profile.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="profile-section">
                <div class="profile-pic">
                    <img src="../assets/<?php echo htmlspecialchars($_SESSION['profile_image'] ?? 'profile-placeholder.png'); ?>" alt="Profile Picture">
                    <div class="edit-pic" onclick="document.getElementById('fileInput').click();">&#9998;</div>
                    <input type="file" id="fileInput" name="image" style="display: none;" accept="image/*">
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
                <button class="btn" name="submit">Update Profile</button>
            </div>
        </form>

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
                <button class="btn">See All</button>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include '../main/footer.php'; ?>

    <script>
        document.getElementById('fileInput').onchange = function (event) {
            const [file] = event.target.files;
            if (file) {
                document.querySelector('.profile-pic img').src = URL.createObjectURL(file);
            }
        };
    </script>
</body>
</html>
