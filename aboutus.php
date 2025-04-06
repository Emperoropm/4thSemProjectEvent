<?php 
session_start();
include('header.php');
$title = "Our Services";
$header = "Welcome";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - German Homes Hospitality</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            
        }

        .container {
            width: 90%;
            
            margin: 0 auto;
            
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .image-section {
            text-align: center;
        }

        .image-section img {
            width:700px;
            height: auto;

        }

        .content-section {
            margin-top: 20px;
            text-align: justify;
        }

        .content-section h2 {
            text-align: center;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .content-section p {
            margin-bottom: 15px;
        }

        .highlight {
            color: #d32f2f;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-family:Times New Roman;">About Us</h1>

        <div class="image-section">
            <img src="admin/venues photos/venue1.jpg" alt="Lotus Event & Reception">
        </div>

        <div class="content-section">
            <h2>LOTUS Event & Reception </h2>

            <p><span class="highlight">LOTUS Event & Reception </span> has been established on 24th of November 2021, from the vision of pioneer visionary business stakeholders who have been successful in many business stakes within Nepal. The establishment of <span class="highlight">Lotus Venue & Resturant</span> is to contribute to the massive hospitality sector for the Nepalese industry and generate revenue contribution to the economy of Nepal and generate employment for Nepalese youth citizens for a more professional, better, and bright future in the hospitality industry.</p>

          
        </div>
    </div>
</body>
</html>
