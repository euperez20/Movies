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
if (is_array($rows) && count($rows) > 0) {
    // Get the title from the first row.
    $title = $rows[0]['title'];

    // Handle form submission.
    if (isset($_POST['submit'])) {
        // Sanitize user inputs
        $movieId = filter_input(INPUT_POST, 'movieId', FILTER_SANITIZE_NUMBER_INT);
        $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
        $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING);

        // Insert comment into review table
        $query = "INSERT INTO review (movieId, fullName, review) VALUES (:movieId, :fullName, :review)";
        $statement = $db->prepare($query);
        $statement->bindParam(':movieId', $movieId, PDO::PARAM_INT);
        $statement->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $statement->bindParam(':review', $review, PDO::PARAM_STR);
        $statement->execute();

        // Redirect back to the movie details page
        header("Location: select.php?movieId=$movieId");
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
    <div id="container1">
        
        <?php if (count($rows) > 0) { ?>
            <!-- Movie details -->
            <h1><?= $title ?></h1>
            <h2><?php echo "<p>" . $rows[0]['releaseYear'] . "</p>"; ?> </h2>
            <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>

            <!-- User comments -->
            <div>
                <h3><p>Comments:</p></h3>
            </div>
            <?php 
            foreach ($rows as $row) {
                echo "<p>" . $row['userId'] . "</p>"; 
                echo "<p>" . $row['review'] . "</p>";
            }
            ?>

            <!-- Comment form -->
            <div>
                <h2>Add Comment</h2>
                <form action="select.php" method="POST">
                    <input type="hidden" name="movieId" value="<?= $movieId ?>">
                    <label for="fullName">Name:</label>
                    <input type="text" id="fullName" name="fullName" required><br>
                    <label for="review">Comment:</label>
                    <textarea id="review" name="review" required></textarea><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>

        <?php } else { ?>
            <p>No movie review found with ID <?= $movieId ?></p>
        <?php } ?>
    </div>
</body>
    </html>

    <?php
} else {
    echo "No movie review found with ID " . $movieId;
}
