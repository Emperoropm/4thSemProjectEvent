<?php 

$host = "localhost";
$username = "root";
$password = "";
$database ="event_management";

$con = mysqli_connect($host, $username, $password, $database);

if(!$con){
	die("Connention Failed: ". mysqli_connect_error());

}

?>