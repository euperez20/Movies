<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for movies administration

****************/

require('connect.php');

// Delete comments
if (isset($_GET['delete_comment_id'])) {
    $delete_comment_id = $_GET['delete_comment_id'];
    $query = "DELETE FROM review WHERE reviewId = :reviewId";
    $statement = $db->prepare($query);
    $statement->bindValue(':reviewId', $delete_comment_id, PDO::PARAM_INT);
    $statement->execute();

   echo "Comment has been Removed Successfully.";
}

 // Query for getting reviews
 $query = "SELECT * FROM review";
 $statement = $db->prepare($query);
 $statement->execute();
 $comments = $statement->fetchAll();

  // Obtiene los comentarios y la información de la categoría de la publicación correspondiente
$query = "SELECT review.*, category.name FROM review INNER JOIN movie ON review.movieId = movie.movieId INNER JOIN category ON movie.categoryId = category.categoryId";

// $query = "SELECT m.*, r.* FROM movie m LEFT JOIN review r ON m.movieId = r.movieId ORDER BY m.movieId ASC";
  if (isset($_GET['categoryId'])) {
      $query .= " WHERE review.categoryId = :categoryId";
 }
 $statement = $db->prepare($query);
 if (isset($_GET['category'])) {
     $statement->bindValue(':category', $_GET['category'], PDO::PARAM_INT);
 }
 $statement->execute();
 $comments = $statement->fetchAll();


 // Query category
$query = "SELECT * FROM category";
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();  

if(isset($_POST['category'])) {
$selected_category_id = $_GET['category']?? null;

if(isset($movieId)) {
if ($selected_category_id) {
    $query = "SELECT * FROM review WHERE movieId = $movieId AND category_id = $selected_category_id";
} else {
    $query = "SELECT * FROM review WHERE movieId = $movieId";
}
}
}

$selected_category_id = 0;

// Verificar si se ha enviado un formulario y actualizar $selected_category_id
if (isset($_POST['categoryId'])) {
  $selected_category_id = $_POST['categoryId'];
  $statement->execute();
}


// // Build and prepare SQL String.
// $query = "SELECT m.*, r.* FROM movie m LEFT JOIN review r ON m.movieId = r.movieId ORDER BY m.movieId ASC";
// $statement = $db->prepare($query);

// $statement->execute();

// // Fetch the rows selected by the movie ID.
// $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// // Check if rows are found.
// if (is_array($rows) && count($rows) > 0) {
//     // Initialize variables for tracking current movie
//     $currentMovieId = null;
//     $currentMovieTitle = null;
//     $reviews = array();

//     // Loop through all rows
//     foreach($rows as $row) {
//         // Check if the current row is for a different movie
//         if($row['movieId'] != $currentMovieId) {
//             // If so, display all the reviews for the previous movie
//             if(!empty($currentMovieId)) {
//                 echo "<h3>$currentMovieTitle Reviews</h3>";
//                 if(count($reviews) > 0) {
//                     echo "<ul>";
//                     foreach($reviews as $review) {
//                         echo "<li>$review</li>";
//                     }
//                     echo "</ul>";
//                 }
//                 $reviews = array();
//             }

//             // Set the current movie to the new movie
//             $currentMovieId = $row['movieId'];
//             $currentMovieTitle = $row['title'];
//         }

//         // Add the current review to the reviews array
//         $review = $row['fullName'] . ": " . $row['review'];
//         array_push($reviews, $review);
//     }

//     // Display the last movie's reviews
//     echo "<h3>$currentMovieTitle Reviews</h3>";
//     if(count($reviews) > 0) {
//         echo "<ul>";
//         foreach($reviews as $review) {
//             echo "<li>$review</li>";
//         }
//         echo "</ul>";
//     }
// }

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

            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="moviesearch.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Admin
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="moviepost.php">Movies</a>


          

          <a class="dropdown-item" href="categorypost.php">Categories</a>
          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item" href="moviesearch.php">Search</a>
        </div>
        </div>

        
      </li>
     </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>


    <body>
    <div class="searchusr">
    <div class="w-75 p-3">

        <div id="container1">

        <!-- Result reviews -->
        
        <div>
     <form action="comments.php" method="get">
                <label for="category">Filter by Brand:</label>
                <select name="category" id="category">
                    <option value="">All categories</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['categoryId'] ?>"<?= $category['categoryId'] == $selected_category_id ? ' selected' : '' ?>><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
                <button type="submit">Filter</button>
            </form>
     </div>

<div class="container">

    <h1>Moderate Comments</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>review</th>
                <th>Movie Id</th>
                <th>Category</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment['fullName'] ?></td>
                    <td><?= $comment['review'] ?></td>
                    <td><?= $comment['movieId'] ?></td>
                    <td><?= $comment['name'] ?></td>
                    <td>
                        <a href="comments.php?delete_comment_id=<?= $comment['reviewId'] ?>"onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a> /
                        <a href=".php?delete_comment_id=<?= $comment['review'] ?>"onclick="return confirm('Are you sure you want to hidden this comment?')">Hidden</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <p><a href="admin.php">Back to Admin Panel</a></p>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</div>

    </div>
    </div>
</body>
    </html>

    

