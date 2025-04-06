<?php 
include('../dbconn.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_venue'])){
	$name=$_POST['name'];
	$location=$_POST['location'];
	$phone=$_POST['phone'];
	$venue_type=$_POST['venue_type'];
	$capacity=$_POST['capacity'];
	$description=$_POST['description'];
	$dj_price=$_POST['dj_price'];
	$parking=$_POST['parking'];
	$decoration_price=$_POST['decoration_price'];
	$advance=$_POST['advance'];
	$alcohol=$_POST['alcohol'];
	$map = $_POST['map'];



	$image=$_FILES['image']['name'];
	$path ="uploads";
	$image_ext= pathinfo($image, PATHINFO_EXTENSION);
	$filename=time(). '.' .$image_ext;


	$venue_query= "INSERT INTO venue (name,location,phone,venue_type,capacity,image,description,dj_price,decoration_price,advance,parking,alcohol,map) VALUES('$name','$location','$phone','$venue_type','$capacity','$image','$description','$dj_price','$decoration_price','$advance','$parking','$alcohol','$map')";
	
	$venue_query_run = mysqli_query($con,$venue_query);
	if($venue_query_run){
		move_uploaded_file($_FILES['image']['tmp_name'] ,$path.'/'.$filename);
		redirect("indexforAdmin.php", "Added Succefully");
	}
	else{
		redirect("add_venue.php", "Something went wrong");
	}
}
else if(isset($_POST['update_venue_btn'])){

	$venue_id = $_POST['venue_id'];

	$name=$_POST['name'];
	$location=$_POST['location'];
	$phone=$_POST['phone'];
	$venue_type=$_POST['venue_type'];
	$capacity=$_POST['capacity'];
	$description=$_POST['description'];
	$dj_price=$_POST['dj_price'];
	$parking=$_POST['parking'];
	$decoration_price=$_POST['decoration_price'];
	$advance=$_POST['advance'];
	$alcohol=$_POST['alcohol'];
	$map = $_POST['map'];

	$new_image=$_FILES['image']['name'];
	$old_image = $_POST['old_image'];

	if($new_image !=""){
		$update_filename=$new_image;
	}else{
		$update_filename = $old_image;
	}
	$path = "uploads";
	$update_query = "UPDATE venue SET name='$name', location='$location', phone='$phone', venue_type='$venue_type', capacity='$capacity', image='$update_filename', description='$description', dj_price='$dj_price', decoration_price='$decoration_price', advance='$advance', parking='$parking', alcohol='$alcohol', map='$map' WHERE id='$venue_id' ";
	$update_query_run = mysqli_query($con,$update_query);
	if($update_query_run){
		if($_FILES['image']['name'] !="")
		{
			move_uploaded_file($_FILES['image'] ['tmp_name'] , $path. '/' .$new_image);
            if(file_exists("uploads". $old_image))
			{
				unlink("uploads" .$old_image);
            }
		}
		redirect("edit_venue.php?id=$venue_id", "updated succefully");
	}

    }
else if(isset($_POST['delete_venue_btn']))
 {
	 

	$venue_id= mysqli_real_escape_string($con, $_POST['venue_id']);

	$venue_query= "SELECT * FROM venue WHERE id='venue_id'";
	$venue_query_run = mysqli_query($con, $venue_query);
	$venue_data = mysqli_fetch_array($venue_query_run);
	$image =$venue_data['image'];

	$delete_query = "DELETE FROM venue WHERE id='$venue_id'";
	$delete_query_run = mysqli_query($con, $delete_query);
	if($delete_query_run){
		if(file_exists("uploads/". $image))
			{
				unlink("uploads/" .$image);
            }
		redirect("indexforAdmin.php", "Deleted Succefully");
	}
	else{
		redirect("indexforAdmin.php", "Something went wrong");
	}

}

// After update
if (isset($_POST['add_dish_btn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $query = "INSERT INTO dishes (name, price, category_id) 
              VALUES ('$name', '$price', '$category_id')";
    mysqli_query($con, $query);
    header("Location: indexforAdmin.php");
}

if (isset($_POST['update_dish_btn'])) {
    $dish_id = $_POST['dish_id']; // Get the dish ID
    $name = mysqli_real_escape_string($con, $_POST['name']); // Sanitize input
    $price = mysqli_real_escape_string($con, $_POST['price']); // Sanitize input

    // SQL query to update dish
    $query = "UPDATE dishes SET name = '$name', price = '$price' WHERE id = '$dish_id'";

    // Execute query
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Dish updated successfully!";
        header("Location: indexforAdmin.php");
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong!";
        header("Location: edit_dish.php?id=$dish_id");
        exit();
    }
}

if (isset($_POST['delete_dish_btn'])) {
    $dish_id = $_POST['dish_id'];

    // Delete the dish from the database
    $query = "DELETE FROM dishes WHERE id='$dish_id'";
    if (mysqli_query($con, $query)) {
        header("Location: indexforadmin.php?msg=Dish deleted successfully");
    } else {
        header("Location: indexforadmin.php?msg=Failed to delete dish");
    }
}


// For cancel booking
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/SMTP.php'; 

if(isset($_POST['cancel-btn'])) {
    $booking_id = $_POST['bookings_id'];
    
    // Fetch booking details
    $query = "SELECT * FROM bookings WHERE id='$booking_id'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
        $booking = mysqli_fetch_assoc($result);
        $customer_email = $booking['email'];
        $customer_name = $booking['name'];

        // Send cancellation email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'emperoropm@gmail.com'; // Replace with your email
            $mail->Password = 'thibhedwszqpvddj'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('emperoropm@gmail.com', 'Admin'); // Replace with your admin email
            $mail->addAddress($customer_email, $customer_name);
            
            $mail->Subject = "Booking Cancellation Notice";
            $mail->Body = "Dear $customer_name,\n\nWe regret to inform you that your booking has been canceled.It may be due to unavailability of date you choosed or due to some problems . If you have any questions, please contact +977 9847779690.\n\nThank you.";
            
            $mail->send();

            // Delete booking from database
            $delete_query = "DELETE FROM bookings WHERE id='$booking_id'";
            if(mysqli_query($con, $delete_query)) {
                echo "<script>alert('Booking canceled and email sent successfully.'); window.location.href='bookings.php';</script>";
            } else {
                echo "<script>alert('Error deleting booking.'); window.location.href='bookings.php';</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Email sending failed: {$mail->ErrorInfo}'); window.location.href='bookings.php';</script>";
        }
    }
}

// For approve the booking

if (isset($_POST['approve-btn'])) {
    $booking_id = $_POST['booking_id'];

    // Fetch booking details
    $query = "SELECT * FROM bookings WHERE id='$booking_id'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $booking = mysqli_fetch_assoc($result);
        $customer_id = $_POST['customer_id'];
        $customer_email = $booking['email'];
        $customer_name = $booking['name'];
        $start_date = $booking['start_date'];
        $end_date = $booking['end_date'];
        $guests = (int)$booking['guests'];
        $event_type = $booking['event_type'];
        $include_dj = $booking['include_dj'];
        $include_decoration = $booking['include_decoration'];
        $additional_request = $booking['additional_request'];
        $selected_dishes = $booking['selected_dishes'];
        $total_cost = (float)$booking['total_cost'];

        
        $checkQuery = "SELECT * FROM approved WHERE (start_date <= '$end_date' AND end_date >= '$start_date')";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Selected dates are already booked by other customers.'); window.location.href='bookings.php';</script>";
            exit();
        }

        // Insert the booking into approved table
        $insertQuery = "INSERT INTO approved (name, email, start_date, end_date, guests, event_type, include_dj, include_decoration, additional_request, selected_dishes, total_cost, status, customer_id) 
                        VALUES ('$customer_name', '$customer_email', '$start_date', '$end_date', '$guests', '$event_type', '$include_dj', '$include_decoration', '$additional_request', '$selected_dishes', '$total_cost', 'approved', $customer_id)";

        if (mysqli_query($con, $insertQuery)) {
            // Delete from the bookings table
            $deleteQuery = "DELETE FROM bookings WHERE id='$booking_id'";
            mysqli_query($con, $deleteQuery);

            // Send confirmation email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'emperoropm@gmail.com'; // Your email
                $mail->Password = 'thibhedwszqpvddj'; // Your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('emperoropm@gmail.com', 'Admin');
                $mail->addAddress($customer_email, $customer_name);

                $mail->Subject = "Booking Confirmation Notice";
                $mail->Body = "Dear $customer_name,\n\nYour Booking has been confirmed. Please visit our venue before the event for more information. Or contact: +977 9847779690.\n\nThank you.";

                $mail->send();

                echo "<script>alert('Booking confirmed and email sent successfully.'); window.location.href='bookings.php';</script>";
            } catch (Exception $e) {
                echo "<script>alert('Email sending failed: {$mail->ErrorInfo}'); window.location.href='bookings.php';</script>";
            }
        }
    }
}




// For deleting from the approved table
if(isset($_POST['approved-delete-btn'])){
    $delete_id = $_POST['delete_id'];

    $delete_query = "DELETE FROM approved Where id='$delete_id'";
    if(mysqli_query($con, $delete_query)){
        header("Location: bookings.php?msg=Dish deleted successfully");
    } else {
        header("Location: bookings.php?msg=Failed to delete dish");
    }

}

?>