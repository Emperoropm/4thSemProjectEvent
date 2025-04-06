<?php 
include('functions/userfunctions.php');
include("header.php");
?>
<html>
<head>
<title>Soup Selection</title>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;

}
body .background-image {
    position: fixed;
    filter:blur(8px);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    
}

.starter-container {
    display: flex;
    gap: 20px;
    margin:20px;
    flex-wrap:wrap;
}
.dinner-container {
    display: flex;
    gap: 20px;
    margin:20px;
    flex-wrap:wrap;
}

.box {
    background-color: #fff;
    border: 2px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    width:200px;
    height:auto;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}


.soup{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/soup.jpg');
  background-size: cover;
  color:white;
 
}
.vegsnacks{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/vegsnacks.jpg');
  background-size: cover;
  color:white;
 
}
.non-vegsnacks{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/vegsnacks.jpg');
  background-size: cover;
  color:white;
 
}
.extra-starter{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/extra-starter.jpg');
  background-size: cover;
  color:white;
 
}
.rice{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/rice.jpg');
  background-size: cover;
  color:white;
 
}
.extra{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/extra.png');
  background-size: cover;
  color:white;
 
}
.dal{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/dal.jpg');
  background-size: cover;
  color:white;
 
}
.vegitems{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/vegitems.jpg');
  background-size: cover;
  color:white;
 
}
.achar{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/achar.jpg');
  background-size: cover;
  color:white;
 
}
.salad{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/salad.jpg');
  background-size: cover;
  color:white;
 
}
.dessert{
   background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url('admin/venues photos/dessert.jpg');
  background-size: cover;
  color:white;
 
}



.dish {
    
    text-align: start;
}

.error{
    color:red;
}

/* For calculate box */

.more-info
    {
    
    width: 100%;
    margin: 0px;
    padding-top:20px;
    padding-bottom:20px;
    background-color:white;
    

   
}

.calculate{
    margin:20px;
}
.calculate-btn{
    width:150px;
    height:30px;
    background-color:darkkhaki;
    margin:20px;
    color:white;
    transition :ease-in-out 0.3s, box-shadow 0.3s;
    font-size:18px;
}
.calculate-btn:hover{
  background-color:yellow;
  color:black;
}
.total{
    margin-left:20px;
}



/* For more information and book */
.info-book{
    display:flex;
    flex-wrap:wrap;
    
}



/* For more information and pricing */
.info-box {
    flex:60%;
    max-width: 1800px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    margin: 20px ;
    align-items:start;

}

.info-box h3 {
    font-size: 20px;
    font-weight: bold;
    display: flex;
    gap: 10px;
}

.info-box hr {
    border: none;
    height: 1px;
    background: #ddd;
    margin: 10px 0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(250px, 1fr));
    gap: 15px;
}

.info-grid div {
    display: flex;
    gap: 10px;
    font-size: 16px;
}

.info-grid i {
    font-size: 20px;
    color: #666;
}

.info-grid span {
    margin-left: auto;
    font-weight: bold;
    color: #333;
}

/* For Booking */
.booking-container {
    flex:40%;
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    max-width:300px;
    margin-bottom:40px;
    max-height:800px;
}

.form-title {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}


.booking-form label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9rem;
    color: #333;
}

.booking-form label span {
    color: red;
}

.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 0.9rem;
}

.booking-form input:focus,
.booking-form select:focus,
.booking-form textarea:focus {
    outline: none;
    border-color: #ff6666;
    box-shadow: 0 0 5px rgba(255, 102, 102, 0.5);
}
.checkbox-container {
            text-align: left;

        }
        .checkbox-container label {
            display: block;
        }
        .checkbox-container input {
            margin-right: 10px;
            width:10%;
    padding: 0px;
    margin-bottom: 0px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 0rem;

        }
.submit-btn {
    width: 100%;
    background: linear-gradient(90deg, #ff6666, #ff9966);
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 12px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}


.submit-btn:hover {
    background: linear-gradient(90deg, #ff9966, #ff6666);
}

</style>
</head>
<body>


<img src="admin/venues photos/catering.jpeg" alt="photo" class="background-image"/>
<h1 style="text-align:center; margin-top:20px;text-shadow: 0 0 10px white, 0 0 20px white, 0 0 30px white, 0 0 40px white;">Select Dishes For Price Calculation:</h1>

<h2 style="margin:20px;color:black;font-family:Times New Roman;:10px;text-shadow: 0 0 10px #0ff, 0 0 20px #0ff, 0 0 30px #0ff, 0 0 40px #0ff;">STARTER</h2>
<div class="starter-container" style="font-size:20px;">

 <!-- Soup -->
 <div class="box soup">
        <h2>Soup</h2>
        <p>Choose any one:</p>
        <?php
        $soups = mysqli_query($con, "SELECT * FROM dishes WHERE category_id = '34'");
        while ($dish = mysqli_fetch_array($soups)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="soup" data-type="soup" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>
            </label>
        </div>
        <?php endwhile; ?>
    </div> 
<!-- Soup ends here -->


<!-- Veg Snacks -->
 <div class="box vegsnacks"  style="max-width:400px;overflow-y:auto;">
        <h2>Veg Snacks</h2>
        <p>Choose any three or more:</p>
        <?php
        $vegSnacks = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '35'");
        while ($dish = mysqli_fetch_array($vegSnacks)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="veg-snacks" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>
            
            </label>
        </div>
        <?php endwhile; ?>
    </div>
<!-- Veg Snacks ends here -->

<!-- For Non Veg Items -->
    <div class="box non-vegsnacks" style="width:400px;height:400px;display:grid;grid-templates-columns:repeat(2,1fr);gap:10px;overflow-y:auto;">
        <h2>Non Veg Snacks</h2>
        <p>Choose any three or more:</p>
        <?php
        $nonVegSnacks = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '36'");
        while ($dish = mysqli_fetch_array($nonVegSnacks)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="non-veg-snacks" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
        </div>
<!-- Non Veg Ends here -->

<!-- For Extra Starter -->
<div class="box extra-starter" style="max-width:400px;overflow-y:auto;">
        <h2>Extra</h2>
        <p>Choose any one:</p>
        <?php
        $extraSnacks = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '37'");
        while ($dish = mysqli_fetch_array($extraSnacks)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="extra-starter" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
<!-- Extra Starter container ends here -->
        </div>
<!-- Starter Container ends here -->


<!-- For Dinner --><h2 style="margin:20px;color:black;font-family:Times New Roman;:10px;text-shadow: 0 0 10px #0ff, 0 0 20px #0ff, 0 0 30px #0ff, 0 0 40px #0ff;">MAIN COURSE</h2>
<div class="dinner-container" style="font-size:20px;">

<!-- For Rice -->
<div class="box rice" style="max-width:400px;overflow-y:auto;">
        <h2>Rice</h2>
        <p>Choose any one</p>
        <?php
        $rice = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '38'");
        while ($dish = mysqli_fetch_array($rice)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="rice" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
        

</div>
<!-- Rice ends here -->

<!-- For Extra -->
<div class="box extra" style="max-width:400px;overflow-y:auto;">
        <h2>Extra</h2>
        <p>Choose one or two</p>
        <?php
        $extradinner = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '39'");
        while ($dish = mysqli_fetch_array($extradinner)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="extra" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
        
</div>
<!-- Extra ends here -->

<!-- For Dal -->
<div class="box dal" style="max-width:400px;overflow-y:auto;">
        <h2>Dal</h2>
        <p>Choose one or two</p>
        <?php
        $dal = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '40'");
        while ($dish = mysqli_fetch_array($dal)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="dal" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
<!-- Dal ends Here -->

<!-- For Veg dinner -->
<div class="box vegitems" style="max-width:400px;overflow-y:auto;">
        <h2>Veg Items</h2>
        <p>Choose any one or two:</p>
        <?php
        $vegdinner = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '41'");
        while ($dish = mysqli_fetch_array($vegdinner)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="veg-dinner" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
 <!-- Veg dinner ends here -->


<!-- For Achar -->
<div class="box achar" style="max-width:400px;overflow-y:auto;">
        <h2>Achar</h2>
        <p>Choose one or more</p>
        <?php
        $achar = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '42'");
        while ($dish = mysqli_fetch_array($achar)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="achar" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
<!-- Achar ends Here -->

<!-- For Salad -->
<div class="box salad" style="max-width:400px;overflow-y:auto;">
        <h2>Salad</h2>
        <p>Choose one or two</p>
        <?php
        $salad = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '43'");
        while ($dish = mysqli_fetch_array($salad)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="salad" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
<!-- Salad ends here -->


<!-- For Dessert -->
<div class="box dessert" style="max-width:400px;overflow-y:auto;">
        <h2>Dessert</h2>
        <p>Choose two or more</p>
        <?php
        $dessert = mysqli_query($con, "SELECT * FROM dishes WHERE category_id= '44'");
        while ($dish = mysqli_fetch_array($dessert)): 
        ?>
        <div class="dish">
            <label>
                <input type="checkbox" name="dessert" class="dish-checkbox" data-price="<?= $dish['price'] ?>">
                <?= $dish['name'] ?><strong style="color:lightgreen;margin:0px;font-size:18px;"> रु<?=$dish['price']?></strong>

            </label>
        </div>
        <?php endwhile; ?>
</div>
<!-- dessert ends here -->

</div>
<!-- dinner-container ends here -->

<?php
$venue_data = getFrom("venue", 17);
$venue = mysqli_fetch_array($venue_data);
?>

<div class="more-info">
<div class="calculate">    
<div class="error"></div>
<button class="calculate-btn">Calculate Total</button>
<div class="total" style="color:black;">Your total cost per plate: 0</div>
</div>

<!-- For more information about price -->
 <div class="info-book">
    
<div class="info-box">
<div class="selectedDishes" style="color:black;"></div>
    <h3><i class="fas fa-table"></i> More Information & Pricing</h3>
    <hr>
    <div class="info-grid">
        <div>
            <i class="fas fa-file-alt"></i> Half Day Rental
            <span>Rs. 20,000</span>
        </div>
        <div>
            <i class="fas fa-file-alt"></i> Full Day Rental Price
            <span>Rs. 30,000</span>
        </div>
        <div>
            <i class="fas fa-file-alt"></i> DJ 
            <span><?=isset($venue['dj_price']) ? $venue['dj_price'] : 'N/A'?></span>

        </div>
        <div>
            <i class="fas fa-wine-bottle"></i> Alcohol 
            <span><?=isset($venue['alcohol']) ? $venue['alcohol'] : 'Not specified'?></span>
        </div>
        <div>
            <i class="fas fa-wine-bottle"></i> Decoration
            <span><?=isset($venue['decoration_price']) ? $venue['decoration_price'] : 'Not specified'?></span>
        </div>
        <div>
            <strong>Note:</strong>If you have any enquires which is not available here then <a href="tel:+9779847779690">Call Us: +977 9847779690</a>

        </div>
    </div>
</div>


<!-- For Booking  -->
<div class="booking-container">
        <h2 class="form-title">Book Now</h2>
        <form class="booking-form" method="POST" action="process.php">

            <label for="start_date">Start Date <span>*</span></label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date <span>*</span></label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="guests">Number Of Guests <span>*</span> (Capacity: 1200)</label>
            <input type="number" id="guests" name="guests" placeholder="Enter number of guests" max="1200" >

            
            <label for="event_type">Event Type <span>*</span></label>
            <select id="event_type" name="event_type" >
                <option value="" disabled selected>Select event type</option>
                <option value="Wedding">Wedding</option>
                <option value="Birthday">Birthday</option>
                <option value="Bartabanda">Bartabanda</option>
                <option value="Corporate">Corporate Event</option>
            </select>

            <div class="checkbox-container">
                <label>Additional:</label>
                <label><input type="checkbox"  name="include_dj" value="1" > Include DJ</label>
                <label><input type="checkbox"  name="include_decoration" value="1" > Include Decoration</label>
            </div>
            
            <label for="additional_request" style="margin-top:10px;">Your Message</label>
            <textarea id="additional_request" name="additional_request" rows="3" placeholder="Enter any additional request"></textarea>

            <label for="email">Email <span>*</span></label>
            <input type="text" id="email" name="email" placeholder="abc@gmail.com">

             <!-- Hidden fields to store selected dishes and total price -->
             
             <input type="hidden" id="selected-dishes" name="selected_dishes">
               <input type="hidden" id="total-cost" name="total_cost">

            <?php if(isset($_SESSION['auth'])){ ?>
                <input type="hidden" id="name" name="name" value="<?=$_SESSION['auth_user']['name'];?>">
                <input type="hidden" id="id" name="id" value="<?=$_SESSION['auth_user']['id'];?>">
            <button type="submit" class="submit-btn" name="book_submit_btn" >Send Inquiry</button>
   <?php } else{ ?>
    <button type="button" class="submit-btn" onclick="window.location.href='Admin.php';">Login / register</button>
   <?php } ?>
        </form>
    </div>


</div> 



<script>
    //For cookies to save the selected dishes after a user goes anywhere
    document.addEventListener("DOMContentLoaded", function () {
    let cookies = document.cookie.split("; ");
    let selectedDishesCookie = cookies.find(row => row.startsWith("selectedDishes="));

    if (selectedDishesCookie) {
        let selectedDishes = JSON.parse(decodeURIComponent(selectedDishesCookie.split("=")[1]));

        document.querySelectorAll('.dish-checkbox').forEach(checkbox => {
            let dishName = checkbox.parentNode.textContent.trim();
            let dishPrice = checkbox.dataset.price;

            selectedDishes.forEach(savedDish => {
                let [savedPrice, savedName] = savedDish.split("|");

                if (dishName === savedName && dishPrice === savedPrice) {
                    checkbox.checked = true; // Re-check the previously selected dishes
                }
            });
        });
    }
});

function saveSelectedDishesToCookies() {
    let selectedDishes = [];
    document.querySelectorAll('.dish-checkbox:checked').forEach(checkbox => {
        selectedDishes.push(checkbox.dataset.price + '|' + checkbox.parentNode.textContent.trim());
    });

    let expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() + (30 * 60 * 1000)); // Set expiration for 30 minutes

    document.cookie = "selectedDishes=" + encodeURIComponent(JSON.stringify(selectedDishes)) + 
                      "; expires=" + expirationDate.toUTCString() + "; path=/";
}



// Save cookies immediately when a dish is selected/deselected
document.querySelectorAll('.dish-checkbox').forEach(checkbox => {
    checkbox.addEventListener("change", saveSelectedDishesToCookies);
});

// Save cookies before leaving the page (ensures data is saved even if no button is clicked)
window.addEventListener("beforeunload", saveSelectedDishesToCookies);

//Cookies for Booking form
document.addEventListener("DOMContentLoaded", function () {
        let cookies = document.cookie.split("; ");

        function getCookieValue(name) {
            let cookie = cookies.find(row => row.startsWith(name + "="));
            return cookie ? decodeURIComponent(cookie.split("=")[1]) : null;
        }

        // Restore form values from cookies
        document.getElementById("start_date").value = getCookieValue("start_date") || "";
        document.getElementById("end_date").value = getCookieValue("end_date") || "";
        document.getElementById("guests").value = getCookieValue("guests") || "";
        document.getElementById("event_type").value = getCookieValue("event_type") || "";
        document.getElementById("additional_request").value = getCookieValue("additional_request") || "";
        document.getElementById("email").value = getCookieValue("email") || "";

        // Restore checkbox states
        document.getElementById("include_dj").checked = getCookieValue("include_dj") === "true";
        document.getElementById("include_decoration").checked = getCookieValue("include_decoration") === "true";
    });

    function saveBookingFormToCookies() {
        let expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + (30 * 60 * 1000)); // 30 minutes

        document.cookie = "start_date=" + encodeURIComponent(document.getElementById("start_date").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "end_date=" + encodeURIComponent(document.getElementById("end_date").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "guests=" + encodeURIComponent(document.getElementById("guests").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "event_type=" + encodeURIComponent(document.getElementById("event_type").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "additional_request=" + encodeURIComponent(document.getElementById("additional_request").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "email=" + encodeURIComponent(document.getElementById("email").value) + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "include_dj=" + document.getElementById("include_dj").checked + "; expires=" + expirationDate.toUTCString() + "; path=/";
        document.cookie = "include_decoration=" + document.getElementById("include_decoration").checked + "; expires=" + expirationDate.toUTCString() + "; path=/";
    }

    // Save data when any form field changes
    document.querySelectorAll("input, select, textarea").forEach(input => {
        input.addEventListener("change", saveBookingFormToCookies);
    });

    // Save data before leaving the page
    window.addEventListener("beforeunload", saveBookingFormToCookies);

//Cookies end here


 
//For calculating total price of dishes
   document.addEventListener('DOMContentLoaded', function () {
    const totalDisplay = document.querySelector('.total');
    const errorDisplay = document.querySelector('.error');
    const calculateButton = document.querySelector('.calculate-btn');
    const selectedDishesDisplay = document.querySelector('.selectedDishes');

    // Function to handle selection limits
    function limitCheckboxSelection(boxName, min, max) {
        const checkboxes = document.querySelectorAll(`input[name="${boxName}"]`);
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                const selectedCount = Array.from(checkboxes).filter(cb => cb.checked).length;

                // Disable unchecked checkboxes if maximum is reached
                checkboxes.forEach(cb => {
                    if (selectedCount >= max) {
                        cb.disabled = !cb.checked;
                    } else {
                        cb.disabled = false;
                    }
                });
            });
        });
    }

    
    limitCheckboxSelection("soup", 0, 1);
    limitCheckboxSelection("veg-snacks", 3, 4);
    limitCheckboxSelection("non-veg-snacks", 4, 5);
    limitCheckboxSelection("extra-starter", 0, 1);
    limitCheckboxSelection("rice", 1, 1);
    limitCheckboxSelection("extra", 1, 2);
    limitCheckboxSelection("dal", 1, 2);
    limitCheckboxSelection("veg-dinner", 1, 2);
    limitCheckboxSelection("achar", 2, 3);
    limitCheckboxSelection("salad", 1, 2);
    limitCheckboxSelection("dessert", 2, 3);

    // Calculate total
    calculateButton.addEventListener('click', function () {
        const allCheckboxes = document.querySelectorAll('.dish-checkbox');
        const soup = Array.from(document.querySelectorAll('input[name="soup"]')).filter(cb => cb.checked).length;
        const vegSnacks = Array.from(document.querySelectorAll('input[name="veg-snacks"]')).filter(cb => cb.checked).length;
        const nonVegSnacks = Array.from(document.querySelectorAll('input[name="non-veg-snacks"]')).filter(cb => cb.checked).length;
        const rice = Array.from(document.querySelectorAll('input[name="rice"]')).filter(cb => cb.checked).length;
        const extra = Array.from(document.querySelectorAll('input[name="extra"]')).filter(cb => cb.checked).length;
        const dal = Array.from(document.querySelectorAll('input[name="dal"]')).filter(cb => cb.checked).length;
        const vegDinner = Array.from(document.querySelectorAll('input[name="veg-dinner"]')).filter(cb => cb.checked).length;
        const achar = Array.from(document.querySelectorAll('input[name="achar"]')).filter(cb => cb.checked).length;
        const salad = Array.from(document.querySelectorAll('input[name="salad"]')).filter(cb => cb.checked).length;
        const dessert = Array.from(document.querySelectorAll('input[name="dessert"]')).filter(cb => cb.checked).length;

        let total = 0;
        let selectedDishes = [];

        // Validate selection limits
        if(soup < 1){
            errorDisplay.textContent = "You must select one soup";
            return;

        }
        if (vegSnacks < 3) {
            errorDisplay.textContent = "You must select at least 3 Veg Snacks.";
            return;
        }
        if (nonVegSnacks < 3) {
            errorDisplay.textContent = "You must select at least 4 Non-Veg Snacks.";
            return;
        }
        if (rice !== 1) {
            errorDisplay.textContent = "You must select 1 rice option.";
            return;
        }
        if (extra < 1 || extra > 2) {
            errorDisplay.textContent = "You must select 1 or 2 Extra options.";
            return;
        }
        if (dal < 1) {
            errorDisplay.textContent = "You must select at least 1 Dal option.";
            return;
        }
        if (vegDinner < 1) {
            errorDisplay.textContent = "You must select at least 1 Veg Dinner option.";
            return;
        }
        if (achar < 2) {
            errorDisplay.textContent = "You must select at least 2 Achar option.";
            return;
        }
        if (salad < 1) {
            errorDisplay.textContent = "You must select at least 1 Salad option.";
            return;
        }
        if (dessert < 2) {
            errorDisplay.textContent = "You must select at least 2 Dessert options.";
            return;
        }

        // Calculate total price and gather selected dishes
        allCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                total += parseFloat(checkbox.dataset.price);
                selectedDishes.push(checkbox.parentNode.textContent.trim());
            }
        });

        errorDisplay.textContent = ""; // Clear errors

        // Display the total cost
        totalDisplay.textContent = `Your total cost per plate: ${total.toFixed(2)}`;

        // Display the selected dishes
        selectedDishesDisplay.innerHTML = `<h3>Selected Dishes:</h3><ul>${selectedDishes.map(dish => `<li>${dish}</li>`).join('')}</ul>`;
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.booking-form');
    const totalDisplay = document.querySelector('.total');
    const selectedDishesDisplay = document.querySelector('.selectedDishes');
    const totalCostInput = document.getElementById('total-cost');
    const selectedDishesInput = document.getElementById('selected-dishes');

    let today = new Date().toISOString().split('T')[0];

document.getElementById("start_date").setAttribute("min", today);
document.getElementById("end_date").setAttribute("min", today);

    form.addEventListener('submit', function (event) {
        const startDate = document.getElementById("start_date").value;
        const endDate = document.getElementById("end_date").value;
        const email = document.getElementById("email").value;
        const guests = document.getElementById("guests").value;
        const event_type = document.getElementById("event_type").value;


        
        if (new Date(startDate) > new Date(endDate)) {
            alert("Start date must be earlier than the end date.");
            event.preventDefault();
            return;
        }

        
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            event.preventDefault();
            return;
        }

        
        if (guests > 1200 || guests < 100) {
            alert("The number of guests cannot should be more than 100 and less than 1200");
            event.preventDefault();
            return;
        }

        if(event_type ===""){
            alert("Please Select Event type.");
            event.preventDefault();
            return
        }

        let selectedDishes = [];
        let total = 0;

        document.querySelectorAll('.dish-checkbox:checked').forEach(checkbox => {
            selectedDishes.push(checkbox.parentNode.textContent.trim());
            total += parseFloat(checkbox.dataset.price);
        });

        
        selectedDishesInput.value = selectedDishes.join(', ');
        totalCostInput.value = total.toFixed(2);
    });
});

// Fetch only approved bookings for date validation
document.addEventListener("DOMContentLoaded", function () {
    let bookedDates = <?php echo json_encode(getApprovedBookings()); ?>;
    
    function isDateBooked(dateString) {
        return bookedDates.some(booked => dateString >= booked.start_date && dateString <= booked.end_date);
    }

    let dateInputs = document.querySelectorAll("input[type='date']");

    dateInputs.forEach(input => {
        input.addEventListener("input", function () {
            let selectedDate = this.value;

            if (isDateBooked(selectedDate)) {
                alert("This date is already booked!");
                this.value = "";
            }
        });

        // Prevent users from selecting booked dates
        let today = new Date().toISOString().split('T')[0];
        input.setAttribute("min", today);
    });
});

</script>
</html>
<?php include('admin/footer.php'); ?>