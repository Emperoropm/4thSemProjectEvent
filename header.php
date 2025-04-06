<html>
<head>
<style>
  body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color:maroon;
            color: #fff;
            padding: 1rem 0;
        }

            header .container {
                width: 90%;
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
                margin: 0 1rem;
                margin-top: 10px;
            }

                nav ul li a {
                    color: #fff;
                    text-decoration: none;
                    
                }

                .dropdown {
    position: relative;
    display: inline-block;
   
   
}
      .dropdown-btn {
        width:100px;
    border: none;
    font-size: 16px;
    color: white;
    cursor: pointer;
    background-color:transparent;
           }

           .dropdown-btn a{
               text-decoration:none;
               color:white;
               
           }
           .dropdown-btn i{
               padding-left:10px;
           }
           .dropdown-btn:hover{
            background-color:transparent
           }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color:transparent;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    padding: 10px;
    border-radius: 4px;
    z-index: 2;
    width: 100px;
  
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
        width:60px;
        height:60px;
       
    }

 
  
</style>
<script src="https://kit.fontawesome.com/d4bd359809.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="container">
           <a href="Customer.php"> <img src="admin/venues photos/logo-no-background.png"/></a>
            <nav>
                <ul>
                    <li><a href="Customer.php">Home</a></li>
                    <li><a href="ourservices.php">Our Services</a></li>
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="contact.php">Book / Price</a></li>
                    <?php if(isset($_SESSION['auth'])) { 
                      $id = $_SESSION['auth_user']['id']; 
                      $name= $_SESSION['auth_user']['name'];// Store user ID in a variable
                      ?>
                    <li><a href="<?php echo 'mybookings.php?id=' . $id .'&name=' . urlencode($name); ?>">My Bookings</a></li>
                      <?php } ?>

                    <li class="dropdown">
                        <?php
            if(isset($_SESSION['auth']))
            {?>
            <button class="dropdown-btn"><?=$_SESSION['auth_user']['name'];?><i class="fa-solid fa-user"></i></button>
             <ul class="dropdown-content">
                 
             <li><a href="logout.php">Logout</a></li>
              
            </li>
        <?php
        }
        else{
        ?>
                 <li><a href="Admin.php">Login</a></li>
                    

                </ul>
            </nav>

        <?php
        }
        
        ?>
        </ul>
        </nav>

        </div>
    </header>
    </body>
    </html>