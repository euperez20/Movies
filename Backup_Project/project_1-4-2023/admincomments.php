<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for add comments in each movie review

****************/

require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT m.*, r.* FROM movie m JOIN review r ON m.movieId = r.movieId WHERE m.movieId = :movieId ";
$statement = $db->prepare($query);



// Sanitize $_GET['movieId'] to ensure it's a number.
$movieId = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
$reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
$statement->bindValue('movieId', $movieId, PDO::PARAM_INT);

$statement->execute();

// Fetch the rows selected by the movie ID.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if rows are found.
if (count($rows) > 0) {
    $title = $rows[0]['title']; // Get the title from the first row.
    $movieId = $rows[0]['movieId'];
    //$reviewId = $reviewId[0]['reviewId'];


// Delete comment
if (isset($_POST['delete'])) {
    $statement = $db->prepare("DELETE FROM review WHERE reviewId = :reviewId");

    $statement->bindValue(':reviewId', $_POST['reviewId']);

    $statement->execute();

    header('Location: index.php');
    exit;
}


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

        <header>
        <!-- Navigation menu -->

        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>

        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="#">Search Movies</a></li>
                <li class="dropdown">
                <a href="#">Admin</a>
                <div class="dropdown-content">
                    <a href="moviepost.php">Create Movie</a>
                    <a href="#">Edit Movie</a>
                    <a href=categorypost.php>New Movie Category</a>
                </div>

        </nav>
    </header>

    <body>
        <div id=container1>
            <h1>Cinemaniacs</h1>
                    
            <h2><?= $title ?></h2> 
            <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>                       
            <?php echo "<p>" . $rows[0]['releaseYear'] . "</p>"; ?>
            <div>
                <h2><p>Comments</p></h2>
            </div>
                <?php 
                foreach ($rows as $row) {
                    echo "<p>" . $row['userId'] . "</p>"; 
                    echo "<p>" . $row['review'] . "</p>"; ?>
                    <input type="submit" name="delete" value="Delete">
                <?php }
                ?> 
              
        </div>
    </body>
    </html>

    <?php
} 
                