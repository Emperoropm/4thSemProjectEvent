<?php 
session_start();
$title ="Register";
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

        .options a {
            color: #fff;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .alert {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Register</h1>
            <form id="registerForm" method="post" action="process.php" onsubmit="return validate();">
                <a class="content" href="Admin.php" style="font-size: 1rem;text-decoration:none; margin:20px; color:white;">Have an account?</a>

                <input type="text" id="name" name="name" placeholder="Name" class="input-field">
                <span name="nameError" id="nameError" style="color:red;"></span>
                <input type="text" id="email" name="email" placeholder="Email" class="input-field">
                <span name="emailError" id="emailError" style="color:red;"></span>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <span name="passwordError" id="passwordError" style="color:red;"></span>

                <button type="submit" id="register" name="register" class="btn">Register</button>

                <?php if(isset($_SESSION['messages'])){
        ?>
        <div class="alert">
            <?=$_SESSION['messages'];?>
        </div><?php
        unset($_SESSION['messages']);
        }?>
            </form>
        </div>
    </div>

    <script>
        function validate() {

            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            let valid = true;
            document.getElementById('nameError').textContent = "";
            document.getElementById('emailError').textContent = "";
            document.getElementById('passwordError').textContent = "";


            const nameRegex = /^[A-Za-z]{2,}(?: [A-Za-z]{2,})+$/;
            if (!nameRegex.test(name)) {
                document.getElementById('nameError').textContent ="Please enter a valid name (at least 2 characters).";
                return valid = false;
            }

            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent ="Please enter a valid email.";
                return valid= false;
            }

            if (password.length < 8 || !password.includes("@")) {
                document.getElementById('passwordError').textContent ="Password must include 8 characters and 1 special character";
                return valid=false;
            }
            return valid;
            
        }
    </script>
</body>
</html>
