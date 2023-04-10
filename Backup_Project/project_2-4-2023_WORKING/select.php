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
    if ($_POST && !empty($_POST['review'])) {
        // Sanitize user inputs
        $fullName = !empty($_POST['fullName']) ? filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "anonymous";
        $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $movieId = filter_input(INPUT_POST, 'movieId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $query = "INSERT INTO review (fullName, review, movieId) VALUES (:fullName, :review, :movieId)";

        // Insert comment into review table
        $statement = $db->prepare($query);
        $statement->bindValue(':fullName', $fullName);
        $statement->bindValue(':review', $review);
        $statement->bindValue(':movieId', $movieId);

    if($statement->execute()){
        header("Location: select.php?movieId=$movieId");
        exit();
        }

        $review_query = "SELECT * FROM review WHERE movieId = :movieId";
        $review_statement = $db->prepare($review_query);
        $review_statement->bindValue(':movieId', $row['movieId']);
        $review_statement->execute();

        exit;
    }
}

 // Handle form submission.

 if ($_POST && !empty($_POST['review'])) {
    // Sanitize user inputs
    $fullName = !empty($_POST['fullName']) ? filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "anonymous";
    $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $movieId = filter_input(INPUT_POST, 'movieId', FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO review (fullName, review, movieId) VALUES (:fullName, :review, :movieId)";

    // Insert comment into review table
    $statement = $db->prepare($query);
    $statement->bindValue(':fullName', $fullName);
    $statement->bindValue(':review', $review);
    $statement->bindValue(':movieId', $movieId);

    if($statement->execute()){
        header("Location: select.php?movieId=$movieId");
        exit();
    }

        // Redirect back to the home page    
        header("Location: index.php");
        exit();
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
            <?php echo "<p><a class=edit href='" . "editmovie.php?movieId" . "=" . $movieId . "'" . ">" . "Edit" . "</a>" . "</p>"; ?>   
            <!-- movieID -->
            
            <!-- <?php echo "<p>" . $movieId . "</p>"; ?>  -->
            <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>
            <?php echo "<img src=\"images/" . $rows[0]['movieImage'] . "\">"; ?>

            <!-- User comments -->
            <div>
                <h3><p>Comments:</p></h3>
            </div>
            <?php 
            foreach ($rows as $row) {
                echo "<p>" . $row['fullName'] . "</p>";
                echo "<p>" . $row['review'] . "</p>";
                echo "<p>" . "<a class=admincomments href='" . "admincomments.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Admin Comments" . "</a>" . "</p>" . "<br>"; 
                
            }
        }
            ?>

            <!-- Comment form -->
            <div>
                <h2>Add Comment</h2>
                <form action="select.php" method="POST">

                <input type="hidden" name="movieId" value="<?php echo $movieId; ?>">

                    <label for="fullName">Name:</label>
                    <input type="text" id="fullName" name="fullName" required><br>
                   
                    <input type="hidden" id="userId" name="userId" required><br>

                    <label for="review">Comment:</label>
                    <textarea id="review" name="review" required></textarea><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>


    </div>
</body>
    </html>

    

