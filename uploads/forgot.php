<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>

<?php include'../main/header.php'; ?>

<div class="form-container">
    <div class="form-wrapper">
        <div class="form-box">
            <form action="forgot.php" method="post">
                <div class="form">
                <h2>Forgot Password</h2>
                <div class="form-element full-width">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address">
                </div>
                <div class="form-element">
                    <button class="btn" name="submit">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include'../main/footer.php'; ?>
    
</body>
</html>