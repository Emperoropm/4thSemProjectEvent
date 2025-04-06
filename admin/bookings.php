<?php 
include('../functions/myfunctions.php');
include('header.php');
?>

<html>
    <head>
        <title>
            Mybookings
</title>
<style>

   .container{
    justify-items:center;
   }
  
        h2 {
            margin:20px;
            text-align: center;
        }
        table {
           
            width: 95%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;

        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 8px 12px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin:2px;
        }
        .btn-danger {
            background-color: #dc3545;
        }

    </style>
</head>
<body>
    <!-- For Pending bookings Table -->
<h2 style="text-align:center;">Pending Bookings</h2>
    <section>
<div class="container">
        
        <table>
            <tr>
                <th>Name</th>
                <th>Customer Email</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>No. of guests</th>
                <th>Event Type</th>
                <th>Dishes</th>
                <th>Dj</th>
                <th>Decorations</th>
                <th>Total Cost per plate</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            <?php 
    $book = getAll("bookings");
    if(mysqli_num_rows($book)>0){
        foreach($book as $item){  
    ?>
            <tr>
                <td><?=$item['name'];?></td>
                <td><?=$item['email'];?></td>
                <td><?=$item['start_date'];?></td>
                <td><?=$item['end_date'];?></td>
                <td><?=$item['guests'];?></td>
                <td><?=$item['event_type'];?></td>
                <td><?=$item['selected_dishes'];?></td>
                <td><?=($item['include_dj'] == 1) ? 'Include' : 'Not-Include'; ?></td>
                <td><?=($item['include_decoration'] == 1) ? 'Include' : 'Not-Include';?></td>
                <td><?=$item['total_cost'];?></td>
                <td><?=$item['additional_request'];?></td>        
                <input type="hidden" name="bookings_id" value="<?= $item['id']; ?>">
                <input type="hidden" name="customer_id" value="<?= $item['customer_id']; ?>">

                <td>
                
                <button type="submit" class="btn" name="approve-btn" onclick="location.href='approve_booking.php?id=<?= $item['id'] ?>'">Approve</button>
                <form method="POST" action="code.php" onsubmit="return confirmDelete();">
                        <input type="hidden" name="booking_id" value="<?=$item['id']; ?>">
                        <button type="submit" class="btn btn-danger" name="cancel-btn">Cancel</button>
                    </form>
                </td>
            </tr>
            <?php
}
}
?>
    
        </table>
    </div>
    </section>


<!-- For Approved bookings table -->
    <h2 style="text-align:center;">Approved Bookings</h2>
    <section>
<div class="container">
        

       
        <table>
            <tr>
                <th>Name</th>
                <th>Customer Email</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>No. of guests</th>
                <th>Event Type</th>
                <th>Dishes</th>
                <th>Dj</th>
                <th>Decorations</th>
                <th>Total Cost per plate</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            <?php 
    $book = getAll("approved");
    if(mysqli_num_rows($book)>0){
        foreach($book as $item){  
    ?>
            <tr>
                <td><?=$item['name'];?></td>
                <td><?=$item['email'];?></td>
                <td><?=$item['start_date'];?></td>
                <td><?=$item['end_date'];?></td>
                <td><?=$item['guests'];?></td>
                <td><?=$item['event_type'];?></td>
                <td><?=$item['selected_dishes'];?></td>
                <td><?=($item['include_dj'] == 1) ? 'Include' : 'Not-Include'; ?></td>
                <td><?=($item['include_decoration'] == 1) ? 'Include' : 'Not-Include';?></td>
                <td><?=$item['total_cost'];?></td>
                <td><?=$item['additional_request'];?></td>        
                <input type="hidden" name="bookings_id" value="<?= $item['id']; ?>">

                <td>
                
              
                <form method="POST" action="code.php" onsubmit="return confirmDelete();">
                        <input type="hidden" name="delete_id" value="<?=$item['id']; ?>">
                        <button type="submit" class="btn btn-danger" name="approved-delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
}
}
?>
    
        </table>
    </div>
    </section>

    <script>
     function confirmDelete() {
    if(confirm('Are you sure you want to delete this item?')) {
        return true; // Continue the form submission
    } else {
        return false; // Stop the form submission
    }
}
        </script>

</body>
</html>