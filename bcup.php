<?php 
include('functions/userfunctions.php');
include("header.php");?>
<html>
<head>
<title>
</title>
<style>
body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}
.venue-container {
    width:100%;
    display:flex;
    text-align: center;
    height:auto;
}

h1 {
    font-size: 2.5em;
    color: #2c3e50;
    margin-bottom: 20px;
}

.image  {
    height: auto;
    flex:50%;
    margin-bottom: 20px;
    float:left;
    display: grid;
    place-items: center;
    background-color: #f8f8f8;
    margin:10px;
    text-align:left;

}
.image img{
    margin:20px;
    width:500px;
    border-radius:10px;
}
 
    .details {
        padding: 20px;
        flex:50%;
        margin:10px;
        background-color: #f8f8f8;
        

    }
    .details .header{
       padding-top:-20px;
        font-weight: bold;
        color: #555;
        text-align: center;
        font-size: 18px;
        border-bottom: 1px solid #ddd;
    }
    
    .row {
        margin-top:10px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #ddd;
    }
    
    .row:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .label {
        font-weight: bold;
        flex: 1;
        color: #444;
    }
    
    .value {
        flex: 2;
        color: #333;
        text-align: left;
    }
    
    .value a {
        color: #007BFF;
        text-decoration: none;
    }
    
    .value a:hover {
        text-decoration: underline;
    }

    /* For description part*/
    .content{
        width:600px;
        height:auto;
        min-height:200px;
        margin-top:50px;
        border-radius:15px;
        background-color: #f8f8f8;
        
    }
    .btn-contact{
        margin-top:30px;
        background-color:#007BFF;
        color:white;
        font-size:25px;
        border-radius:15px;
        padding:5px;
        cursor:pointer;
        transition:0.3s ease-in-out;
    }
    .btn-contact:hover{
         background-color:blue;
         box-shadow: 5px 5px 5px rgb(82, 11, 77);
    }
    
    /* Responsive Design */
    @media (max-width: 600px) {
        .row {
            flex-direction: column;
            align-items: flex-start;
        }
    
        .label, .value {
            flex: none;
            width: 100%;
        }
    
        .venue-photo img {
            border: none;
        }
    }
</style>
</head><body>

<?php
if(isset($_GET['venue'])){
    $venue_name= $_GET['venue'];
	$venue_data = getFrom("venue",$venue_name);
	$venue = mysqli_fetch_array($venue_data);

	if($venue){
		?> <h1>
            <div style="text-align:center;font-family:Times New Roman; color:black" class="venue-name"><?php echo $venue['name']; ?></h1></div> 
        <div class="venue-container">
       
       <div class="image">  <img  src="admin/uploads/<?=$venue['image']?>" width alt="<?=$venue['name']?>"/>
       <section class="venue-info">
        <h1><?=$venue['name'];?></h1>
        <p class="subheading">
          <span>Space:</span> <?=$venue['venue_type'];?>| <span>Location:</span><?=$venue['location'];?>
        </p>
      </section>
      
       <div class="content">
        <p style="font-size:22px;font-weight:bold;color:black;font-family:Times New Roman;text-align:center;">Description</p>
        <div ><?php echo $venue['description']; ?></div>
    </div>
    </div>
      

<div class="details">
<div class="header">Venue Details</div>
<div class="row">
    <div class="label">Location:</div>
    <div class="value"><?php echo $venue['location']; ?></div>
</div>
<div class="row">
    <div class="label">Phone:</div>
    <div class="value"><a href="#"><?php echo $venue['phone']; ?></a></div>
</div>
<div class="row">
    <div class="label">Advance Payment:</div>
    <div class="value"><?php echo $venue['advance']; ?> For Booking</div>
</div>
<div class="row">
    <div class="label">Capacity:</div>
    <div class="value"><?php echo $venue['capacity']; ?> people</div>
</div>
<div class="row">
    <div class="label">Venue Type:</div>
    <div class="value"><?=$venue['venue_type'];?></div>
</div>
<div class="row">
    <div class="label">Parking:</div>
    <div class="value"><?php echo $venue['parking']; ?> </div>
</div>
<div class="row">
    <div class="label">Price per plate:</div>
    <div class="value"><?php echo $venue['price_per_plate']; ?> </div>
</div>
<div class="row">
    <div class="label">Decoration:</div>
    <div class="value"><?php echo $venue['decoration_price']; ?> </div>
</div>
<div class="row">
    <div class="label">DJ:</div>
    <div class="value"><?php echo $venue['dj_price']; ?> </div>
</div>
<div class="row">
    <div class="label">Alcohol & Beverage:</div>
    <div class="value"><?php echo $venue['alcohol']; ?></div>
</div>
<?php
            if(isset($_SESSION['auth']))
            {?>
        <a  href="https://api.whatsapp.com/send?phone=977<?=$venue['phone'];?>" class="btn-contact" style="text-decoration:none;"> Contact Us </a>
        <?php
        }
        else{
        ?>
        <nav>
        <ul>
        <a  href="Admin.php" class="btn-contact" style="text-decoration:none;"> Login or register to Contact Us </a>
                </ul>
            </nav>

        <?php
        }?>
</div>


    </div>
		<?php
	}else{
		echo "Venue not found";
	}

}else{
	echo "Something went wrong";
}

?> 


</body>
</html>

