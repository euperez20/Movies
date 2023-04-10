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

    <!-- Showing Content -->
    <div id=shortpost>
        
    
    <!-- Validation characters -->
    <?php if(strlen($description) < 200){ 

        // Showing movie brief information
        echo "<p><ul>";
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            echo "<li>";
            echo "<h2><p class=title>" . $row['title'] . "</h2>". " " . "<a class=edit href='" . "editmovie.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Edit" . "</a>" . "</p></li>";                    
            echo "<li><p>" . $row['releaseYear'] . "</p></li>";

            if (!empty($row['movieImage'])) { echo "<img src=\"images/" . $row['movieImage'] . "\">"; }
                echo "<li><p> Review: </p></li>";
                $contentHome = substr($row['description'], 0, 200);
                echo "<li>" . $contentHome . "</li>";             
                echo "<li><p>" . "<a class=edit href='" . "select.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Comments" . "</a>" . "</p>" . "<br></li>";   
                       
            } ?>
            
            <?php echo "</ul>"; 
            
        }?>
        <P></P>

    </div>
</body>


