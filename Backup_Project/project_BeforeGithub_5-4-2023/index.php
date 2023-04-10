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
                <li><a href="moviesearch.php">Movies</a></li>
                <li class="dropdown">
                <a href="login.php">Admin</a>

             </ul>
        </nav>


    </header>


    <div id="container2">
        <b><p>Welcome to Entertainment MB!</p></b>

        <p>We are dedicated to providing you with the latest news and information about all things entertainment in Manitoba. Our focus is on movies and movie fans that movies are more than just entertainment, they are a reflection of our society and culture.</p>

        <p>Our site is designed to be a one-stop-shop for all your movie needs. Whether you’re looking for reviews of the latest blockbusters or want to learn more about classic films, we’ve got you covered. We also provide information about upcoming movie events in Manitoba, so you’ll never miss out on the latest releases.</p>

        <p>At Entertainment MB, we’re passionate about movies and we want to share that passion with you. So sit back, relax, and let us guide you through the wonderful world of cinema!</p>

        <p>I hope this helps! Let me know if you have any other questions.</p>

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
    echo "<div class = container_m1>";
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        if($count == 4) break; 
        $count++;
        echo "<div class = box>";
        echo "<h3><p class=title><a class=edit href='" . "select.php?movieId" . "=" . $row['movieId'] . "'" . ">" . $row['title'] . " (" . $row['releaseYear'] . ")</a></h3>" ;                  
        if (!empty($row['movieImage'])) {
            echo "<p><img class=indeximg src=\"images/" . $row['movieImage'] . "\"></p>"; 
        }
        echo "</div>";
    }
    echo "</div>";
}
        ?>       
       
    </table>
    </div>
</body>


