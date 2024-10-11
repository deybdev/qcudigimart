<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
<?php include'../main/header.php'; ?>

<div class="form-container">
    <div class="form-wrapper">
        <div class="form-box">
            <form action="forgot.php" method="post">
                <div class="form">
                <h2>OTP Verification</h2>
                <div class="note-container">
                    <p>We've sent a verification code to your <br> Email - example@gmail.com</p>
                </div>
                <div class="form-element full-width">
                    <label for="email">Verification Code: </label>
                    <input type="email" id="email" name="vemail" placeholder="Enter your email address">
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