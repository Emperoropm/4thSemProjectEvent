<?php 

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

        header {
            background-color: maroon;
            color: #fff;
            padding: 1rem 0;
        }

            header .container {
                width: 90%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            header h1 {
                margin: 0;
            }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

            nav ul li {
                margin-left: 1rem;
                margin-top: 10px;
            }

                nav ul li a {
                    color: #fff;
                    text-decoration: none;
                }
                 .dropdown{
        position: relative;
       display: inline-block;
       padding-top:10px;
       padding-left:10px;
        }


      .dropdown-btn {
       background-color: #444;
       color: black;
       padding: 10px 10px;
        font-size: 16px;
       border: none;
       cursor: pointer;
           }

           .dropdown-btn a{
               text-decoration:none;
               color:white;
               
           }
           .dropdown-btn i{
               padding-left:10px;
           }

    .dropdown-content { 
    display: none;
    position: absolute;
    background-color: #444;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    padding: 10px;
    border-radius: 4px;
    z-index: 1;
    width: 160px;
   }
   .dropdown-content a{
       color:white;
       text-decoration:none;
   }

    .dropdown:hover .dropdown-content {
    display: block;
    background-color:cyan;
    }
     .container img{
        width:50px;
        height:50px;
    }

    </style>
</head>
<body><header>
      <div class="container">
            <a href="indexforAdmin.php"><img src="venues photos/logo-no-background.png"/></a>
            <nav>
                <ul>
                    <li><a href="indexforAdmin.php">Dashboard</a></li>
                    <li><a href="add_dish.php">Add Dishes</a></li>
                    <li><a href="bookings.php">Bookings</a></li>


                    <div class="dropdown"
                        <?php
            if(isset($_SESSION['auth']))
            {?>
            <button class="dropdown-btn"><?=$_SESSION['auth_user']['name'];?><i class="fa-solid fa-user"></i></button>
             <ul class="dropdown-content">
                 <ul>
             <li><a href="../logout.php">Logout</a></li>
              </ul>
             </div>
        </div>
        <?php
        }
        ?>
        </header>
        </body>
        </html>