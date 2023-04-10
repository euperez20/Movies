<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Main page to CMS movies

****************/
require('connect.php');

// Query Database
$query = "SELECT * FROM movie ORDER BY movie.releaseYear DESC LIMIT 20";

$statement = $db->prepare($query);

$statement->execute();

// Asigning variables
$movieid = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING);
$image = filter_input(INPUT_GET, 'movieImage', FILTER_SANITIZE_STRING);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Welcome to ENTERTAINMENTMB</title>
</head>

<body>

    <header>
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>


        <!-- Navigation menu -->
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


<div id="container2">
<p>Welcome to our movie rating website! Discover the latest and greatest movies of all genres, rate and review your favorites, 
    and find recommendations based on your personal taste. Join our community of film lovers and share your opinions with others. Whether you're looking for the next blockbuster hit or an movie gem, 
    we've got you covered. Start exploring now and let the movie magic begin!</p>
</div>

<div id="lastmovies">
    <h2><p>Last Movies</p></h2>
</div>



    <!-- Showing Content -->
    <div id=shortpost>
        
    <table>
    <!-- Validation characters -->
    <?php if(strlen($description) < 200){ 
        
        // Showing movie brief information
        // echo "<p><ul>";
        echo "<tr>";
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            // echo "<tr>";
            echo "<td><div class = item>";
            echo "<h2><p class=title>" . $row['title'] . "</h2><br></p>". " " . "<p><a class=edit href='" . "editmovie.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Edit" . "</a>" . "</p></div>";                    
            echo "<div class = item><p>" . $row['releaseYear'] . "</p></div><br>";
            // echo "</td<td>";
            if (!empty($row['movieImage'])) {
                 echo "<div class = item><img src=\"images/" . $row['movieImage'] . "\"></div><td>"; }
                //  echo "<li class = inline><p> Review: </p></li>";
                // $contentHome = substr($row['description'], 0, 200);
                // echo "<li class = inline>" . $contentHome . "</li>";             
                // echo "<li class = inline><p>" . "<a class=edit href='" . "select.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Comments" . "</a>" . "</p>" . "<br></li>";   
             
                echo "</td></tr>";
            } ?>
            
            <?php 
            
            // echo "</ul>"; 
            
        }?>
        
        <!-- <P></P> -->
    </table>
    </div>
</body>


