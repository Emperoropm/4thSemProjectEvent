<?php
session_start();

include('dbconn.php');
if(isset($_POST['register']))
{
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

$check_email_query= "SELECT email FROM admins WHERE email='$email' ";
$check_email_query_run= mysqli_query($con ,$check_email_query);

   if(mysqli_num_rows($check_email_query_run)>0){
	$_SESSION['messages']="Email already Registered. Please use another one";
	header('Location:Server.php');

   }else{
	$insert_query ="INSERT INTO admins(name, email, password)VALUES ('$name','$email','$password')";
   $insert_query_run =mysqli_query($con, $insert_query);
   

    if($insert_query_run){
	$_SESSION['messages']="Registation successfull";
	header('Location: Server.php');
	}
    }
}
  else if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$login_query ="SELECT * FROM admins WHERE email='$email' AND password='$password' ";
	$login_query_run = mysqli_query($con , $login_query);

	if(mysqli_num_rows($login_query_run)>0){
		$_SESSION['auth']=true;

		$userdata=mysqli_fetch_array($login_query_run);
        $id = $userdata['id'];
		$username=$userdata['name'];
		$useremail=$userdata['email'];
		$role_as=$userdata['role_as'];

		$_SESSION['auth_user']=[
            'id'=> $id,
			'name'=> $username,
			'email'=>$useremail
		];

		$_SESSION['role_as']=$role_as;
		if($role_as==1){
			$_SESSION['message']="Welcome to DashBoard";
			header('Location:admin/indexforAdmin.php');
		}
		else{
			$_SESSION['message']="Logged in Successfully";
			header('Location:Customer.php');
		}

		

	}else{
		$_SESSION['message_for_admin'] ="Incorrect Credentials";
		header('Location:Admin.php');
	}
}

// For booking form submission
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/SMTP.php'; 

    if (isset($_POST['book_submit_btn'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $guests = (int)$_POST['guests'];
    $event_type = $_POST['event_type'];
    $include_dj = isset($_POST['include_dj']) ? "Yes" : "No";
    $include_decoration = isset($_POST['include_decoration']) ? "Yes" : "No";
    $additional_request = $_POST['additional_request'];
    $email = $_POST['email'];
    $selected_dishes = $_POST['selected_dishes'];
    $total_cost = (float)$_POST['total_cost'];
    $name = $_POST['name'];
    $customer_id = $_POST['id'];


    $checkQuery = "SELECT * FROM approved WHERE status='approved' 
    AND ((start_date <= ? AND end_date >= ?) 
    OR (start_date <= ? AND end_date >= ?) 
    OR (start_date >= ? AND end_date <= ?))";
    
$stmtCheck = $con->prepare($checkQuery);
$stmtCheck->bind_param("ssssss", $start_date, $start_date, $end_date, $end_date, $start_date, $end_date);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
echo "<script>alert('Sorry, the selected date range is already booked. Please choose different dates.'); window.location.href='contact.php';</script>";
exit();
}

	

    $admin_email = "emperoropm@gmail.com"; 
    $subject = "New Booking Inquiry";

	$stmt = $con->prepare("INSERT INTO bookings (start_date, end_date, guests, event_type, include_dj, include_decoration, additional_request, email, selected_dishes, total_cost, name,customer_id ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssissssssdsi", $start_date, $end_date, $guests, $event_type, $include_dj, $include_decoration, $additional_request, $email, $selected_dishes, $total_cost, $name,$customer_id);

	if($stmt->execute()){
    $email_content = "
    <html>
    <head><title>New Booking Inquiry</title></head>
    <body>
        <h2>New Booking Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Start Date:</strong> $start_date</p>
        <p><strong>End Date:</strong> $end_date</p>
        <p><strong>Number of Guests:</strong> $guests</p>
        <p><strong>Event Type:</strong> $event_type</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Additional Request:</strong> $additional_request</p>
        <p><strong>Selected Dishes:</strong> $selected_dishes</p>
        <p><strong>Total Price per Plate:</strong> Rs. $total_cost</p>
        <p><strong>Include DJ:</strong> $include_dj</p>
        <p><strong>Include Decoration:</strong> $include_decoration</p>
    </body>
    </html>";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'emperoropm@gmail.com'; // Your email
        $mail->Password = 'thibhedwszqpvddj'; // Use App Password if using Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom($email, "Booking Form");
        $mail->addAddress($admin_email);
        $mail->addReplyTo($email);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $email_content;

        $mail->send();
        echo "<script>alert('Booking successful! Email sent to Lotus Venue.'); window.location.href='contact.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Booking saved, but email sending failed: {$mail->ErrorInfo}'); window.location.href='contact.php';</script>";
    }
}

$stmt->close();
$con->close();
}
?> 

