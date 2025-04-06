<?php 
include('functions/userfunctions.php');
include('header.php');
$title = "Our Services";
$header = "Welcome";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
        <style>
            #eventS{
                height:90%;
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
            margin: 0 auto;
            
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

        
 </style>
    

</head>
<body>
<section id="events" class="events">
        <div class="container">
            <h2>Our Services</h2>

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
        </div>
        

    </section>
    
</body>
</html>

