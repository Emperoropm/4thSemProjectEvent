<?php
session_start();
include 'dbconn.php';

if(isset($_POST['reset_password'])){
    $email = $_SESSION['email'];
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if($new_password === $confirm_password){

        // Update password in database
        mysqli_query($con, "UPDATE admins SET password='$new_password' WHERE email='$email'");

        // Delete OTP entry
        mysqli_query($con, "DELETE FROM password_resets WHERE email='$email'");

        // Unset session
        unset($_SESSION['email']);

        $_SESSION['message'] = "Password reset successful! Please login.";
        header("Location: Admin.php");
    } else {
        $_SESSION['message'] = "Passwords do not match!";
        header("Location: reset_password.php");
    }
}



// For booking form submission
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/SMTP.php'; 

if (isset($_POST['send_otp'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Check if email exists in the "admins" table
    $check_email = mysqli_query($con, "SELECT * FROM admins WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);
        $expires_at = date("Y-m-d H:i:s", strtotime("+10 minutes"));

        // Store OTP in database
        $insert_otp = mysqli_query($con, "INSERT INTO password_resets (email, token, expires_at) 
                                          VALUES ('$email', '$otp', '$expires_at') 
                                          ON DUPLICATE KEY UPDATE token='$otp', expires_at='$expires_at'");

        if ($insert_otp) {
            // Send OTP via email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'emperoropm@gmail.com'; // Your email
                $mail->Password = 'thibhedwszqpvddj'; // Your email password (Use App Password if using Gmail)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Email details
                $mail->setFrom('emperoropm@gmail.com', 'Lotus Venue');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body = "<h3>Your OTP for password reset is: <b>$otp</b></h3><p>This OTP will expire in 10 minutes.</p>";

                // Send the email
                if ($mail->send()) {
                    $_SESSION['message'] = "OTP sent to your email.";
                    header("Location: verify_otp.php?email=$email");
                    exit();
                } else {
                    $_SESSION['message'] = "Failed to send OTP.";
                    header("Location: forget_password.php");
                    exit();
                }
            } catch (Exception $e) {
                $_SESSION['message'] = "Mailer Error: " . $mail->ErrorInfo;
                header("Location: forget_password.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Error storing OTP.";
            header("Location: forget_password.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Email not registered!";
        header("Location: forget_password.php");
        exit();
    }
}

if(isset($_POST['verify_otp'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $otp = mysqli_real_escape_string($con, $_POST['otp']);

    // Check OTP in the database
    $query = mysqli_query($con, "SELECT * FROM password_resets WHERE email='$email' AND token='$otp' ");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['email'] = $email;
        header("Location: reset_password.php");
    } else {
        $_SESSION['message'] = "Invalid or expired OTP!";
        header("Location: verify_otp.php?email=$email");
    }
}
?>
