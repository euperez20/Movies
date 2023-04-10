<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/

require 'connect.php';
// require('authenticate.php');


$query_categories = "SELECT * FROM category";
$statement_categories = $db->prepare($query_categories);
$statement_categories->execute();
$categories = $statement_categories->fetchAll(PDO::FETCH_ASSOC);
// Get selected category
$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

// Get radio button value
$sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);

// Query
if (!empty($category)) {
    $query = "SELECT m.movieId, m.title, m.releaseYear, m.description, m.movieImage, c.categoryId, c.name 
              FROM movie m LEFT JOIN category c ON m.categoryId = c.categoryId 
              WHERE c.categoryId = :category";

    // OrderBy
    switch ($sort) {
        case 'title':
            $query .= " ORDER BY m.title";
            break;
        case 'director':
            $query .= " ORDER BY m.director";
            break;
        case 'releaseYear':
            $query .= " ORDER BY m.releaseYear";
            break;
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
} else {
    $query = "SELECT * FROM movie";
    $statement = $db->prepare($query);
}

$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

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

    <title>Welcome to ENTERTAINMENTMB</title>
  </head>
  <body>


  <div class="w-75 p-3">
    
    <header>
      <div id="container1">
          <h1>ENTERTAINMENTMB</h1>
      </div>

        <!-- Navigation menu -->
        
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Admin</a>
            </li>   
          </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>

    
    <div><br>
    <form class="searchform" method="GET" action="moviesearch_user.php" >
        <label for="category">Select a category:</label>
        <select name="category" id="category">
            <option value="">All categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['categoryId'] ?>"<?= $category == $category['categoryId'] ? ' selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach ?>
        </select>
        <button class="submitselect" type="submit">Search</button>


    </form>






    
    </div>
    <?php

    // Display the movie results
    foreach ($movies as $movie) {        
        echo "<h3><p class=title><a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . $movie['title'] . "(" . $movie['releaseYear'] . ")</a></h3>" ;
        // echo "<p>" . "<a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . "View Details" . "</a>" . "</p>" . "<br>";
        echo "<p>{$movie['description']}</p>";
        echo "<img src=\"images/" . $movie['movieImage'] . "\">"; 
        
    }
    ?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

  </div>
</body>
</html>
