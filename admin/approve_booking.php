<?php 
include('../functions/myfunctions.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
           
        }
       
        .booking-card {
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .booking-card h3 {
            margin: 0;
            color: #333;
        }
        .details {
            margin: 10px 0;
        }
        .details strong {
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            text-align: center;
        }
        .btn-approve {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align:center;">Booking Details</h2>

        <?php 

       if(isset($_GET['id'])){
         $id= $_GET['id'];
        $bookings = getBookingById($id);

        if(mysqli_num_rows($bookings) > 0){
         $item = mysqli_fetch_array($bookings);
        ?>
        <div class="booking-card">
            <h3>Booking ID: <?= $item['id']; ?></h3>
            <div class="details"><strong>Name:</strong> <?= $item['name']; ?></div>
            <div class="details"><strong>Email:</strong> <?= $item['email']; ?></div>
            <div class="details"><strong>Start Date:</strong> <?= $item['start_date']; ?></div>
            <div class="details"><strong>End Date:</strong> <?= $item['end_date']; ?></div>
            <div class="details"><strong>No. of Guests:</strong> <?= $item['guests']; ?></div>
            <div class="details"><strong>Event Type:</strong> <?= $item['event_type']; ?></div>
            <div class="details"><strong>Selected Dishes:</strong> <?= $item['selected_dishes']; ?></div>
            <div class="details"><strong>DJ:</strong> <?= ($item['include_dj'] == 1) ? 'Include' : 'Not-Include'; ?></div>
            <div class="details"><strong>Decorations:</strong> <?= ($item['include_decoration'] == 1) ? 'Include' : 'Not-Include'; ?></div>
            <div class="details"><strong>Total Cost per Plate:</strong><?= $item['total_cost']; ?></div>
            <div class="details"><strong>Additional Request:</strong> <?= $item['additional_request']; ?></div>
            <div class="details"><strong>Created At:</strong> <?= $item['created_at']; ?></div>

            <form method="POST" action="code.php">
                <input type="hidden" name="booking_id" value="<?= $item['id']; ?>">
                <input type="hidden" name="customer_id" value="<?= $item['customer_id']; ?>">
                <button type="submit" class="btn btn-approve" name="approve-btn">Approve</button>
            </form>
        </div>
        <?php
            }
        }else {
            echo "<p>No bookings available.</p>";
        }
        ?>
    </div>
</body>
</html>