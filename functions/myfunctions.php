<?php
session_start();
include('../dbconn.php');

function getAll($table){
	global $con;
	$query ="SELECT * FROM $table";
	 return $query_run =mysqli_query($con, $query);
}

function getByID($table, $id){
	global $con;
	$query ="SELECT * FROM $table WHERE id='$id' ";
	 return $query_run =mysqli_query($con, $query);

}

function redirect($url ,$message){
	$_SESSION['message']= $message;
	header('Location: '.$url);
	exit();
}

// After update
function getAllDishes() {
    global $con; // Assume `$con` is the database connection
    $query = "SELECT dishes.*, categories.name AS category_name FROM dishes 
              LEFT JOIN categories ON dishes.category_id = categories.id";
    return mysqli_query($con, $query);
}

function getDishByID($id) {
    global $con;
    $query = "SELECT * FROM dishes WHERE id='$id'";
    return mysqli_query($con, $query);
}

function getAllCategories() {
    global $con;
    $query = "SELECT * FROM categories";
    return mysqli_query($con, $query);
}

// Function to fetch all categories
function getCategories($con) {
    $query = "SELECT * FROM categories";
    return mysqli_query($con, $query);
}

// Function to fetch dishes by category
function getDishesByCategory($con, $category_id) {
    $query = "SELECT * FROM dishes WHERE category_id = $category_id";
    return mysqli_query($con, $query);
}

function getBookingById($id){
    global $con;
    $query = "SELECT * FROM bookings WHERE id='$id'";
    return mysqli_query($con , $query);
}
?> 
