<?php 
include('functions/userfunctions.php');
include("header.php");?>
<html>
<head>
<title>
</title>
<style>
   
body{
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    height:100%;

   
}

/* Hero section */
.hero {
    position: relative;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    overflow: hidden;

}

/* Background Image */
.hero .background-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    
}

/* Hero Content */
.hero-content {
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px;
}

.hero h1 {
    font-size: 3rem;
    margin: 0;
}

.hero p {
    font-size: 1.2rem;
    margin: 10px 0 20px;
}

.hero-button {
    padding: 10px 20px;
    font-size: 1rem;
    text-decoration: none;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.hero-button:hover {
    background-color: #0056b3;
}


    /* For map*/
    .content-section {
    padding: 50px 20px;
    background-color: white;
    color: #333;
}


.content h2 {
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-size: 2rem;
    margin-bottom: 20px;
}
.map{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
}



    /* Scroll Down Indicator */
.scroll-down {
    position: absolute;
    bottom: 50px;
    width: 50px;
    height: 100px;
    border: 2px solid white;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    animation: bounce 2s infinite;
}

.scroll-down img {
    display: block;
    width: 20px;
    height: 20px;
    animation: scroll 2s infinite;
}
.scroll_text{
    position: absolute;
    bottom: 50px;
    width: 50px;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    animation: bounce 2s infinite;
    color:maroon;
    
}

/*description section*/
.description{
    
            width: 100%;
            margin: 0px;
            padding-top:20px;
            padding-bottom:20px;
            background-color:white;
           
            justify-items:center;
        }
        .describe{
            
            width:60%;
        }


        .title {
            text-align: center;
            font-size: 2.5rem;
            font-family:"Times New Roman";
            margin-bottom: 20px;
            
        }

        .content {
            font-family: "Georgia", "Times New Roman", Times, serif;
font-size: 1.2rem; /* Adjust size as needed */
line-height: 1.6;  /* Improve readability */
font-weight: normal; /* Standard weight for readability */
color: #333; /* Neutral text color */
text-align: justify; /* Align text evenly across lines */
padding:20px;
            
        }

        .gallery {
    display: flex; /* Use flexbox */
    justify-content: center; /* Center the images horizontally */
    flex-wrap: wrap; /* Allow wrapping of images to the next row */
    gap: 15px; /* Add space between images */
    max-width: 100%; /* Ensure the gallery spans the available width */
    margin: 0 auto; /* Center the gallery within its container */
}

.gallery img {
    max-width: 100%; /* Make images responsive */
    height: auto; /* Maintain aspect ratio */
    width: 300px; /* Set a consistent width for the images */
    object-fit: cover;
    margin: 10px; /* Add margin around images */
}

/* Our Services*/
#events{
    padding-top:20px;
                margin:0px;
                background-color:white;
                
            }
           
         .events .clothing {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(admin/decoration/pngtree-beautiful-woman-with-an-orange-and-gold-lehenga-sitting-on-the-image_2943035.jpg);
            background-position: center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }
        
        .venue {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(customer/386601049_226765870399970_6704946186237671791_n.jpg);
            background-position: center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }

            .venue:hover {
                border-block-style: solid;
                border-block-color: darkgray;
                border-block-width: 5px;
                box-shadow: 10px 10px 10px 10px rgb(82,11,77);
                background-image:url(customer/386601049_226765870399970_6704946186237671791_n.jpg);
            }

        .content-venue {
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .venue a {
            text-decoration: none;
        }


        .clothing:hover {
            border-block-style: solid;
            border-block-color: darkgray;
            border-block-width: 5px;
            box-shadow: 10px 10px 10px 10px rgb(82,11,77);
            background-image:url(admin/decoration/pngtree-beautiful-woman-with-an-orange-and-gold-lehenga-sitting-on-the-image_2943035.jpg);
            
        }

        .content-clothing {
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .clothing a {
            text-decoration: none;
        }
        .venue-clothing {
            display: flex;
            flex-wrap:wrap;
            
        }

        .container {
            width: 80%;
           
            
        }

             .photography {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(customer/411461646_18409380835039114_3251433309159158078_n.jpg);
            background-position: center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }

            .photography:hover {
                border-block-style: solid;
                border-block-color: darkgray;
                border-block-width: 5px;
                box-shadow: 10px 10px 10px 10px rgb(82,11,77);
                background-image: url(customer/411461646_18409380835039114_3251433309159158078_n.jpg);
            }
        .content-photography {
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .photography a {
            text-decoration: none;
        }
        .makeup {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(admin/decoration/361981440_296589659570961_3112411468804209327_n.jpg);
            background-position:center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }

            .makeup:hover {
                border-block-style: solid;
                border-block-color: darkgray;
                border-block-width: 5px;
                background-image: url(admin/decoration/361981440_296589659570961_3112411468804209327_n.jpg);
                box-shadow: 10px 10px 10px 10px rgb(82,11,77);
            }

        .content-makeup {
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .makeup a {
            text-decoration: none;
        }
        .photography-makeup {
            display: flex;
            flex-wrap: wrap;
        }
        .decoration {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(admin/decoration/pngtree-beautiful-wedding-decoration-with-flowers-image_15712165.jpg);
            background-position: center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }

            .decoration:hover {
                border-block-style: solid;
                border-block-color: darkgray;
                border-block-width: 5px;
                box-shadow: 10px 10px 10px 10px rgb(82,11,77);
                background-image:url(admin/decoration/pngtree-beautiful-wedding-decoration-with-flowers-image_15712165.jpg);
            }

        .content-decoration{
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .decoration a {
            text-decoration: none;
        }
        .baja {
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)50%),url(admin/decoration/band2.jpg);
            background-position: center;
            background-size: cover;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 40%;
            margin: 10px;
        }

            .baja:hover {
                border-block-style: solid;
                border-block-color: darkgray;
                border-block-width: 5px;
                box-shadow: 10px 10px 10px 10px rgb(82,11,77);
                background-image:url(admin/decoration/band2.jpg);
            }

        .content-baja{
            color: white;
            padding-top: 50px;
            font-size: 15px;
            font-family: Garamond, serif;
        }

        .baja a {
            text-decoration: none;
        }
        .decoration-baja{
            display:flex;
            flex-wrap:wrap;
        }



/* Keyframes for Animation */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes scroll {
    0% {
        transform: translateY(5px);
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        transform: translateY(25px);
        opacity: 0;
    }
}
/*Scroll down arrow ends here*/



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
</head>
<body>
<?php
    
	$venue_data = getFrom("venue",17);
	$venue = mysqli_fetch_array($venue_data);

	if($venue){
		?> <h1>
       <section class="hero">
       <img src="admin/uploads/<?=$venue['image']?>" alt="<?=$venue['name']?>" class="background-image">
       <div class="hero-content">
       <h1 style="color:white;font-family:Times New Roman;"><?= $venue['name']?></h1>
            <p>Enjoy Your Event With Us.</p>
            <?php
            if(isset($_SESSION['auth']))
            {?>
        <a  href="contact.php" class="hero-button" style="text-decoration:none;"> Contact Us </a>
        <?php
        }
        else{
        ?>
        <a  href="Admin.php" class="hero-button" style="text-decoration:none;"> Login or register to Contact Us </a>

        <?php
        }?>
    </div>
    <div class="scroll_text">
        <p>Scroll Down</p>
    </div>
    <div class="scroll-down">
        <img src="extra-img/arrow.svg" alt="Scroll">
        </div>
      </section>

      <section class="description">
      <div class="describe">
        <h1 class="title">About LOTUS Event & Reception  </h1>
        <p class="content">
        Lotus Banquet is a premium event venue known for its stylish and contemporary design, ideal for hosting weddings, receptions, corporate events, and other special occasions. With its spacious halls, elegant decor, and modern amenities, the banquet offers tailored services like catering, event coordination, and audiovisual setups to suit the unique needs of each event. 
        The venue is renowned for its warm hospitality, luxurious ambiance, and attention to detail, making it a preferred choice for those seeking a memorable and seamless event experience.
       
    </p>

        <div class="gallery">
            <img src="admin/venues photos/venue1.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue2.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue3.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue4.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue5.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue6.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue7.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue8.jpg" alt="German Homes - Exterior 1">
            <img src="admin/venues photos/venue9.jpg" alt="German Homes - Exterior 1">
            
        </div>

        <p class="content">
        Lotus Venue and Restaurant is a distinguished destination where elegance meets culinary excellence. Inspired by the timeless beauty and symbolism of the lotus flower, this venue offers a harmonious blend of refined spaces and exceptional dining experiences, perfect for any celebration or gathering.
        </p>

    </div>
    </section>
    <section id="events" class="events">
        <div class="container">
            <h2 style="text-align:center;font-family:Times NEw Roman;">Our Services</h2>

            <div class="photography-makeup">
                <div class="photography">
                    <a href="#">
                        <div class="content-photography">
                            <h3>Photography & Videography</h3>

                            <p>Photography and Videography </p>
                        </div>
                    </a>
                </div>
                <div class="makeup">
                    <a href="#">
                        <div class="content-makeup">
                            <h3>Makeup</h3>

                            <p>Bridal Makeup & other makeups</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="venue-clothing">
                <div class="venue">
                    <a href="venues.php">
                        <div class="content-venue">
                            <h3>Venues</h3>

                            <p>Party palace, hotel and Restuarent</p>

                        </div>
                    </a>
                </div>
                <div class="clothing">
                    <a href="#">
                        <div class="content-clothing">
                            <h3>Clothing</h3>
                            <p>Saree , lehenga, etc.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="decoration-baja">
                <div class="decoration">
                    <a href="#">
                        <div class="content-decoration">
                            <h3>Decorations</h3>
                            <p>Stage and whole venue Decorations</p>
                        </div>
                    </a>
                </div>
            
            <div class="baja">
                <a href="#">
                    <div class="content-baja">
                        <h3>Band Baja</h3>
                        <p>Music, and cultural Themes.</p>
                    </div>
                </a>
            </div>
        </div>
        
        

    </section>

    <div class="content-section">
       <div class="content">
       <h2 style="text-align:center;">Location</h2>

        <div class="map">
           
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1767.6044858774644!2d85.5280252136162!3d27.618043886263578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb09de0d2ef8c5%3A0x4c58be83fc08aee1!2sLotus%20Event%20and%20Receptions!5e0!3m2!1sen!2snp!4v1737027138077!5m2!1sen!2snp" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
   
		<?php
	}else{
		echo "Venue not found";
	}
     ?> </div>
</body>
<script>
    document.addEventListener("copy",(event)=>{
        const selectedData = window.getSelection().toString();
        event.clipboardData.setData(
            "text/plain",
            "👍"
        );
        event.preventDefault();
    });
    </script>
</html>
<?php include('admin/footer.php'); ?>