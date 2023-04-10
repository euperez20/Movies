<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/
require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT review FROM review WHERE movieId = :movieId LIMIT 1";
$statement = $db->prepare($query);


// Sanitize $_GET['movieId'] to ensure it's a number.
$movieId = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);
// $review = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);

$statement->bindValue('movieId', $movieId, PDO::PARAM_INT);
$statement->execute();

// $statement->bindValue('movieId', $review, PDO::PARAM_INT);
// $statement->execute();

// Fetch the row selected by primary key movieid.
$row = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css"> 
        <title>Read Review</title>      
        
    </head>
    <body>

    <div id=container1>
        <h1>Cinemaniacs</h1>
        <h2>Movie Lovers</h2>

       


        <?php echo "<p>" . $row['review'] . "</p>"; ?>
                                    
   
    

    </div>

    </body>
</html> 