<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="otp.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="send_otp">Send OTP</button>
    </form>
    <?php
    if(isset($_SESSION['message'])){
        echo "<p style='color:red;'>".$_SESSION['message']."</p>";
        unset($_SESSION['message']);
    }
    ?>
</body>
</html>
