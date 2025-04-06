<?php 
session_start();
$email = $_GET['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify OTP</h2>
    <form action="otp.php" method="post">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email); ?>">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit" name="verify_otp">Verify</button>
    </form>
    <?php
    if(isset($_SESSION['message'])){
        echo "<p style='color:red;'>".$_SESSION['message']."</p>";
        unset($_SESSION['message']);
    }
    ?>
</body>
</html>
