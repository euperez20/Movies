<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/
require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT m.*, r.* FROM movie m LEFT JOIN review r ON m.movieId = r.movieId WHERE m.movieId = :movieId ";
$statement = $db->prepare($query);

// Sanitize $_GET['movieId'] to ensure it's a number.
$movieId = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
$statement->bindValue('movieId', $movieId, PDO::PARAM_INT);

$statement->execute();

// Fetch the rows selected by the movie ID.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if rows are found.
if (count($rows) > 0) {
    $title = $rows[0]['title']; // Get the title from the first row.

    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="main.css"> 
            <title>Movie Details</title>      
            
        </head>
        <body>

        <div id=container1>
            <h1>Cinemaniacs</h1>
            <h2>Movie Lovers</h2>
            

            <h2><?= $title ?></h2> 
            <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>
                             
            <?php echo "<p>" . $rows[0]['releaseYear'] . "</p>"; ?>

            <?php 
            foreach ($rows as $row) {
                echo "<p>" . $row['userId'] . "</p>"; 
                echo "<p>" . $row['review'] . "</p>";
            }
            ?>
            
        </div>

        </body>
    </html>

    <?php
} else {
    echo "No movie review found with ID " . $movieId;
}
