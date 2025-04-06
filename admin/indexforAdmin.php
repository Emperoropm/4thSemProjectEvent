<?php 
include('../functions/myfunctions.php');
include('header.php');

$title="Admin page";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body{
            margin-bottom:20px;
        }
    table {
    width: 90%;
    border-collapse: collapse;
    margin-left:5%;


}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

img {
    width: 50px; 
    height: auto;
}

button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.edit-btn{
    color:white;
    background-color:green;
    text-decoration:none;
    padding-top:5px;
    padding-bottom:5px;
    padding-right:10px;
    padding-left:10px; 
    border-radius:5px;
    
}
.btn-delete{
    background-color:red;
}
img{
    width:200px;
    height:100px;
}

/* for dish info */
.dish-info{
    margin-top:20px;
}


@media (max-width: 600px) {
    table{
        max-width:600px;
        margin:0px;
    }
}
    </style>
</head>
<body>
    <h1 style="text-align:center;">Venue Info</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $venues =getAll("venue");
    if(mysqli_num_rows($venues)>0){
        foreach($venues as $item){
            ?> 
            <tr>
            <td><?=$item['name'];?></td>
            <td>
            <img src="uploads/<?= $item['image'];?>" alt="<?=$item['name'];?>" />
            </td>
            <td><?=$item['location'];?></td>    
            <td>
            <form action="code.php" method="POST" onsubmit="return confirmDelete();">
            <a  class="edit-btn" href="edit_venue.php?id=<?=$item['id'];?>" class="button">Edit</a>
            <input type="hidden" name="venue_id" value="<?=$item['id'];?>" >
            <!-- <button type="submit" name="delete_venue_btn" class="btn-delete">Delete</button> -->
            </form>
            </td>
             </tr>

            <?php
        }
    }
    else{
        echo "No records found";
    }
    ?>
       
        
    </tbody>
</table>

<!--  For Dish info -->
<h1 style="text-align:center;">Dishes Lists:</h1>
<!-- for Soup -->
<h2 style="text-align:center;">Soup</h2>
    <table class="dish-info">
    <thead>
        <tr>

            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '34'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>

            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<!-- for Veg Snacks-->
<h2 style="text-align:center;">Veg Snacks</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '35'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
           
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<!-- for Non- Veg Snacks-->
<h2 style="text-align:center;">Non-Veg Snacks</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '36'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<!-- for Extra Snacks-->
<h2 style="text-align:center;">Extra Snacks</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '37'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
        
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<!-- for Rice-->
<h2 style="text-align:center;">Rice</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '38'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick=" return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>



<!-- for Extra Dinner-->
<h2 style="text-align:center;">Extra Dinner</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '39'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>



<!-- for DAl-->
<h2 style="text-align:center;">Dal</h2>
    <table class="dish-info">
    <thead>
        <tr>
           
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '40'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>



<!-- for VEg items dinner-->
<h2 style="text-align:center;">Veg Items Dinner</h2>
    <table class="dish-info">
    <thead>
        <tr>
           
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '41'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<!-- for AChar-->
<h2 style="text-align:center;">Achar</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '42'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
           
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- for Salad-->
<h2 style="text-align:center;">Salad</h2>
    <table class="dish-info">
    <thead>
        <tr>
           
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '43'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- for Desserrt-->
<h2 style="text-align:center;">Dessert</h2>
    <table class="dish-info">
    <thead>
        <tr>
            
            <th>Dish Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php  $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '44'");
    while ($dish = mysqli_fetch_array($soups)): ?>
        <tr>
            
            <td><?= $dish['name'] ?></td>
            
            <td><?= $dish['price'] ?></td>
            
            <td>
                <a href="edit_dish.php?id=<?= $dish['id'] ?>" class="edit-btn">Edit</a>
                <form action="code.php" method="POST" style="display: inline;">
                    <input type="hidden" name="dish_id" value="<?= $dish['id'] ?>">
                    <button type="submit" name="delete_dish_btn" class="btn btn-delete" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>



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

