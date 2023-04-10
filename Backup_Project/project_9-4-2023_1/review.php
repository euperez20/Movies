<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/
require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT * FROM movie WHERE movieId = :movieId LIMIT 1";
$statement = $db->prepare($query);

// Sanitize $_GET['movieId'] to ensure it's a number.
$movieId = filter_input(INPUT_GET, 'movieId', FILTER_SANITIZE_NUMBER_INT);

$statement->bindValue('movieId', $movieId, PDO::PARAM_INT);
$statement->execute();

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

    <header>
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>

        <!-- Navigation menu -->
        
        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="moviesearch.php">Movies</a></li>
                <li class="dropdown">
                <a href="login.php">Admin</a>

             </ul>
        </nav>
        

    </header>

    <div id=container1>
           

        <h2><?= $row['title'] ?></h2>

        <?php echo "<p>" . "<a class=edit href='" . "edit.php?id" . "=" . $row['movieId'] . "'" . ">" . "Edit" . "</a>" . "</p>";                    
        echo "<li><p>" . $row['releaseYear'] . "</p></li>"; ?>
        <?php echo "<p>" . $row['description'] . "</p>"; 

        ?>
                            
    </div>

    </body>
</html> 