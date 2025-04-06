<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: forgot_password.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        
        input{
margin:20px;
        }
        button{
            margin:20px;
        }
    </style>
    
</head>
<body>
    <h2>Reset Password</h2>
    <form action="otp.php" method="post" onsubmit ="return validate();">
    <input type="password" id="password" name="new_password" placeholder="New Password">
        <span id="passwordError" style="color:red;"></span><br>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
        <span id="confirm_passwordError" style="color:red;"></span><br>
        <button type="submit" name="reset_password">Reset Password</button>
        
    </form>
    <script>
    function validate() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;
        let valid = true;

        document.getElementById('passwordError').textContent = "";
        document.getElementById('confirm_passwordError').textContent = "";


        if (password.length < 8 || !password.includes("@")) {
            document.getElementById('passwordError').textContent = "Password must be at least 8 characters long and include '@'.";
            valid = false;
        }

        if (password !== confirmPassword) {
            document.getElementById('confirm_passwordError').textContent += "\nPasswords do not match.";
            valid = false;
        }

        return valid;
    }
</script>
</body>
</html>
