<?php 
include('../functions/myfunctions.php');
include('header.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

     


.admin-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    width: 80%;
    margin-left:100px;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
}

.venue-form {
   display:flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.form-group input[type="file"] {
    padding: 5px;
}

.form-group button {
    padding: 12px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
}

.form-group button:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
         <div class="admin-container">
        <h1>Edit Venue</h1>
        
        <?php 
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $venues = getByID("venue", $id);
            if(mysqli_num_rows($venues)>0){
                $data = mysqli_fetch_array($venues);

             ?>

        <form action="code.php" method="POST" enctype="multipart/form-data" class="venue-form">
            <div class="form-group">
            <input type="hidden" name="venue_id" value="<?=$data['id']?>" >
                <label for="name">Venue Name</label>
                <input type="text" id="name" name="name"  value="<?=$data['name']?>" required>
            </div>

            <div class="form-group">
                <label for="description">Venue Description</label>
                <textarea id="description" name="description"   rows="4" required><?=$data['description']?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="<?=$data['location']?>" required>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="text" id="capacity" name="capacity" value="<?=$data['capacity']?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="<?=$data['phone']?>" required>
            </div>
            <div class="form-group">
                <label for="venue_type">Venue Type</label>
                <input type="text" id="venue_type" name="venue_type" value="<?=$data['venue_type']?>" required>
            </div>
           
            <div class="form-group">
                <label for="dj_price">DJ Price</label>
                <input type="number" id="dj_price" name="dj_price" value="<?=$data['dj_price']?>" required>
            </div>
            <div class="form-group">
                <label for="decoration_price">Decoration Price</label>
                <input type="number" id="decoration_price" name="decoration_price" value="<?=$data['decoration_price']?>" required>
            </div>
            <div class="form-group">
                <label for="advance">Advance Payment Information</label>
                <input type="text" id="advance" name="advance" value="<?=$data['advance']?>" required>
            </div>
            <div class="form-group">
                <label for="parking">Parking Details</label>
                <input type="text" id="parking" name="parking" value="<?=$data['parking']?>" required>
            </div>
            <div class="form-group">
                <label for="alcohol">Alcohol Details</label>
                <input type="text" id="alcohol" name="alcohol" value="<?=$data['alcohol']?>" required>
            </div>


            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file"  name="image" accept="image/*"  >
                <input type="hidden" name="old_image" value="<?=$data['image']?>">
                <img src="uploads/<?=$data['image']?>" alt="image"/>
            </div>
            <div class="form-group">
                <label for="map">Map:</label>
                <input type="text" id="map" name="map" value="<?=$data['map']?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit" name="update_venue_btn">Update</button>
            </div>
            </form>
            <?php }else{
                echo "venue not Found";

                }?>
        <?php } else{
            echo "Id missing";
        }
        ?>
    
    </div>
        
       
</body>
</html>
