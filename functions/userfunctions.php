<?php 
session_start();
include('dbconn.php');

function getAll($table){
	global $con;
	$query ="SELECT * FROM $table";
	 return $query_run =mysqli_query($con, $query);
}
function getFrom($table, $id){
	global $con;
	$query ="SELECT * FROM $table Where id='17' ";
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
    global $con; // Ensure database connection is accessible
    $query = "SELECT * FROM categories ORDER BY name ASC";
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

function getFromBookingsById($id){
	global $con;
	$query ="SELECT * FROM bookings Where customer_id = $id";
	 return $query_run =mysqli_query($con, $query);
}
function getFromApprovedById($customer_id){
	global $con;
	$query ="SELECT * FROM approved Where customer_id = '$customer_id'";
	 return $query_run =mysqli_query($con, $query);
}


//For getting booked dates
function getApprovedBookings() {
    global $con;
    $query = "SELECT start_date, end_date FROM approved WHERE status='approved'";
    $result = mysqli_query($con, $query);

    $bookings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
    return $bookings;
}


?>