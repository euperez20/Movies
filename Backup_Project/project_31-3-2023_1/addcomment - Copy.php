<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for add comments in each movie review

****************/
require('connect.php');


?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="main.css"> 
            <title>Movie Comments</title>      
            
        </head>

        <header>
        <!-- Navigation menu -->

        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>

        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="moviesearch.php">Search Movies</a></li>
                <li class="dropdown">
                <a href="#">Admin</a>
                <div class="dropdown-content">
                    <a href="moviepost.php">Create Movies</a>
                    <a href="#">Edit Movie</a>
                    <a href=categorypost.php>Create Categories</a>
                    <a href=admincomments.php>Moderate Comments</a>
                </div>

             </ul>
        </nav>
    </header>

    <body>
        
<!-- USER COMMENTS FORM -->

<div>
            <h2>Add Comment</h2>
            <form action="addcomment.php" method="POST">
                <input type="hidden" name="movieId" value="<?= $movieId ?>">
                <label for="userId">Name:</label>
                <input type="text" id="userId" name="userId" required><br>
                <label for="review">Comment:</label>
                <textarea id="review" name="review" required></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </div>







    </body>
    </html>

   

