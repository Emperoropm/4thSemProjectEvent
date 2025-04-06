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
.category_select{
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

    </style>
</head>
<body>

<div class="admin-container">
    <h1>Add Dishes</h1>
    <form action="code.php" method="POST" enctype="multipart/form-data" class="venue-form">
        <input type="hidden" name="dish_id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">

        <div class="form-group">
            <label for="name">Dish Name</label>
            <input type="text" id="name" name="name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="<?= isset($data['price']) ? $data['price'] : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="category_select" required>
                <?php
                $categories = getAllCategories();
                while ($category = mysqli_fetch_array($categories)) {
                    $selected = isset($data['category_id']) && $data['category_id'] == $category['id'] ? 'selected' : '';
                    echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" name="<?= isset($data['id']) ? 'update_dish_btn' : 'add_dish_btn' ?>">
                <?= isset($data['id']) ? 'Update Dish' : 'Add Dish' ?>
            </button>
        </div>
    </form>
</div>
        
    
</body>
</html>
