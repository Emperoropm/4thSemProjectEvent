<?php
session_start();

if(isset($_SESSION['auth'])){

 unset($_SESSION['auth']);
 unset($_SESSION['auth_user']);
 
 $_SESSION['message_for_admin']="Logged out successfully";
}
header('Location: Admin.php');

?>