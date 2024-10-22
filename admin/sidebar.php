<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
</head>
<body>
    <nav class="navbar">
    </nav>
    <div class="sidebar">
        <header> <img src="../assets/qcu-logo.png" alt="qcu-logo">QCU | DIGIMART</header>
        <ul>
            <li id="dashboard"><a href="dashboard.php"><i class="fa-solid fa-chart-simple"></i>Dashboard</a></li>
            <li id="listings"><a href="listings.php"><i class="fa-solid fa-rectangle-list"></i>Listings</a></li>
            <li id="accounts"><a href="accounts.php"><i class="fa-solid fa-users"></i>Accounts</a></li>
            <li id="reports"><a href="reports.php"><i class="fa-solid fa-flag"></i>Reports</a></li>
            <li><a href="../uploads/logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    
        
    </div>

    <div class="hamburger" onclick="toggleBar()">
            <div></div>
            <div></div>
            <div></div>
        </div>

    <script>
    function toggleBar() {
        const hamburger = document.querySelector('.hamburger');
        const sidebar = document.querySelector('.sidebar');
    
        hamburger.classList.toggle('active'); // Toggle the active class
        sidebar.classList.toggle('active'); // Toggle the nav links visibility
    }

    document.addEventListener("DOMContentLoaded", function() {
        const currentLocation = window.location.href; // Get the current URL

        // Check which tab corresponds to the current page
        if (currentLocation.includes("dashboard.php")) {
            document.getElementById("dashboard").classList.add("active");
        } else if (currentLocation.includes("listings.php")) {
            document.getElementById("listings").classList.add("active");
        } else if (currentLocation.includes("accounts.php")) {
            document.getElementById("accounts").classList.add("active");
        } else if (currentLocation.includes("reports.php")) {
            document.getElementById("reports").classList.add("active");
        }
    });


    </script>

</body>
</html>