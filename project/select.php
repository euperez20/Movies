<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/

require('connect.php');

// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT m.*, r.* FROM movie m LEFT JOIN review r ON m.movieId = r.movieId WHERE m.movieId = :movieId ORDER BY r.dateReview DESC";
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


 <!-- bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <title>Welcome to ENTERTAINMENTMB</title>
  </head>
  
  <body>
  
  <div class="w-75_p-3">
    
  <header>
      <div id="container1">
          <!-- <h1>ENTERTAINMENTMB</h1> -->
          <img src="images/logo/logo3.png" alt="My Logo">
      </div>

        <!-- Navigation menu -->
        
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#000000;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Movies</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Admin</a>
            </li>   
          </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>
    <div class="searchusr" >
    <div id="container1">
        
        <?php if (count($rows) > 0) { ?>
            <!-- Movie details -->
            <h1><?= $title ?></h1>
            <h3><?php echo "<p>" . $rows[0]['releaseYear'] . "</p>"; ?> </h3>  
            <?php echo "<p>Directed by " . $rows[0]['director'] . "</p>"; ?>           
            <!-- movieID -->    
               
            <?php echo "<img src=\"images/" . $rows[0]['movieImage'] . "\">"; ?>

            <div>
                <h3><p>Review</p></h3>
            </div>
            <?php echo "<p>" . $rows[0]['description'] . "</p>"; ?>
            <!-- User comments -->
            
            
            <div>
                <h3><p>Comments</p></h3>
            </div>
            <?php 
            foreach ($rows as $row) {
                // echo "<p><b>" . $row['fullName'] . "</b></p>";
                echo '<p><b>' . $row['fullName'] . ' on ' . date('F j, Y', strtotime($row['dateReview'])) . '</b></p>';
                echo "<p>" . $row['review'] . "</p>";
                // echo "<p>" . "<a class=admincomments href='" . "admincomments.php?movieId" . "=" . $row['movieId'] . "'" . ">" . "Admin Comments" . "</a>" . "</p>" . "<br>"; 
                
            }
        }
            ?>

            <!-- Comment form -->
            <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
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
    </div>  
    </div>
</body>
    </html>

    

