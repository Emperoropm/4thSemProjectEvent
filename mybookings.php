
<?php 
include('functions/userfunctions.php');
include('header.php');
$id = $_GET['id'] ?? '';
$name = $_GET['name'] ?? '';?>

<html>
    <head>
        <title>
            Mybookings
</title>
<style>

   
  body{
    margin:0px;
    padding:0px;
    height:109vh;
  }
  
 
        h2 {
            margin:20px;
            text-align: center;
        }
        table {
            width:95%;
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
<h2 style="text-align:center;">My Bookings</h2>
    <section>
<div class="containerss" style="height:109vh;justify-items:center;">

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
                <th>Status</th>
            </tr>
            <?php 
    $book = getFromBookingsByID($id);
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
                <td>
                <?= $item['status'];?>
                </td>
            </tr>
            <?php
}
}
?>
<?php 
    $book = getFromApprovedById($id);
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
                <td>
                <?= $item['status'];?>
                </td>
            </tr>
            <?php
}
}
?>
    
        </table>

</div>    
   
    
</body>
</html>
<?php include('admin/footer.php') ?>