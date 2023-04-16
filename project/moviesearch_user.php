<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/

require 'connect.php';

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
              <a class="nav-link" href="contact.php">Contact Us</a>
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

  
    <div><br>
    
    <form class="form-no-border" method="GET" action="moviesearch_user.php">
    <h3><p>Movie Collection</p></h3>
    <label for="category">Filter by category:</label>
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">All categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['categoryId'] ?>"<?= isset($_GET['category']) && $_GET['category'] == $category['categoryId'] ? ' selected' : '' ?>><?= $category['name'] ?></option>
        <?php endforeach ?>
    </select>
    <noscript><button class="submitselect" type="submit">Search</button></noscript>

    <?php if (isset($_GET['category'])): ?>
    <?php if (empty($movies)): ?>
      <div class="searchusr">
        <p>No results.</p>
    </div>
    <?php else: ?>
        <div class="searchusr">
          <?php
        foreach ($movies as $movie) { ?>
        
          <div class="searchusr">
          <?php
        echo "<h3><p class=title><a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . $movie['title'] . "(" . $movie['releaseYear'] . ")</a></h3>" ;
        echo "<p>{$movie['description']}</p>";
       
        if(!empty($movie['movieImage'])){ 
          echo "<img src=\"images/" . $movie['movieImage'] . "\">";
          } ?>
          </div>
          <?php          
    }?>
    <?php endif ?>
<?php endif ?>


<!-- Filter Category script -->
    <script>
      const categorySelect = document.getElementById('category');
      categorySelect.addEventListener('change', function() {
      document.getElementById('movie-search-form').submit();
      });
    </script>


    </div>
    </div>

  </form>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

  </div>
</body>

<footer class="bg-dark text-light py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>About Us</h5>
        <!-- <p>We are a movie database website that provides information on various movies and TV shows. Our goal is to help you discover new movies and TV shows to watch.</p> -->
      </div>
      <div class="col-md-4 mb-3">
        <h5>Contact Us</h5>
        <p>Email: info@entertainmentmb.ca</p>
        <p>Phone: 431-555-5555</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Follow Us</h5>
        <ul class="list-unstyled">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</html>
