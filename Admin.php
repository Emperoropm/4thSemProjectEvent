
<?php 
session_start();
$title ="Login";
$header ="Welcome"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background: url('customer/forlogin.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
}

.login-container {
    background: rgba(0, 0, 0, 0.5);
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

.login-box {
    text-align: center;
    max-width: 350px;
    width: 100%;
}

h1 {
    margin: 0;
    font-size: 2rem;
}

p {
    font-size: 1rem;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.input-field {
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    margin-bottom: 10px;
}

.btn {
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.9;
}

.btn.facebook {
    background: #4267B2;
    color: #fff;
}

.btn.twitter {
    background: #1DA1F2;
    color: #fff;
}

.options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9rem;
}

.options a {
    color: #fff;
    text-decoration: none;
}

.options a:hover {
    text-decoration: underline;
}

.divider {
    margin: 20px 0;
    font-size: 0.9rem;
    color: #aaa;
}

.social-login {
    display: flex;
    justify-content: space-between;
}

    </style>
</head>
<body>
  
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form id="loginForm" method="post" action="process.php">
                <a class="content" href="Server.php" style="font-size: 1rem;text-decoration:none; margin:20px; color:white; ">Do not have an account?</a>
                <input type="text" for="loginEmail" placeholder="Email" class="input-field" id="email" name="email" required>
                <input type="password" for="loginPassword" placeholder="Password" class="input-field" id="password" name="password" required>
                <button type="submit" name="login" class="btn">Sign In</button>
                <a class="content" href="forget_password.php" style="color:white;text-decoration:none;">Forget Password?</a>
                <a class="content" href="Customer.php" style="color:white;">Continue without login</a>
                <?php
                if(isset($_SESSION['message_for_admin'])){
                ?>
                <div class="alert">
                    <?=$_SESSION['message_for_admin'];?>
                </div><?php
                
                unset($_SESSION['message_for_admin']);
                }
                ?> 
            </form>
        </div>
    </div>
</body>

</html>

