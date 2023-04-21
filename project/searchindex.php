<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Search by keyworkd in the page


****************/
require('connect.php'); 

$q = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING); 

$query = "SELECT * FROM movie WHERE title LIKE :q OR director LIKE :q ORDER BY title DESC";

$statement = $db->prepare($query);

$statement->bindValue(':q', "%$q%", PDO::PARAM_STR);

$statement->execute();

$movies = $statement->fetchAll();

 

function highlight_words($text, $words) {
    preg_match_all('~\w+~', $words, $m);
    if(!$m)
      return $text;
    $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
    return preg_replace($re, '<mark>$0</mark>', $text);

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
    
  <header>
        <div class="container1">
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
                <a class="nav-link" href="register.php">Register</a>
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
                  <a class="dropdown-item" href="logout.php">Logout</a>
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

      <?php if (count($movies) === 0): ?>

      <div class="searchusr">  

        <form class="form-no-border" method="GET" action="searchindex.php">
          <h3>Search Results</h3>
          <div class="input-group mb-3">
            <input type="search" class="form-control" aria-describedby="button-addon2" name="q">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
          </div>

          <h5>No Results </h5>

        </form>
        </div>

    <?php else: ?>
    <br>
    <h3>Search results "<?php echo isset($q) ? $q : ''; ?>"</h3><br>
    
    <form class="form-no-border" method="GET" action="searchindex.php">

      <div class="input-group mb-3">
        <input type="search" class="form-control" aria-describedby="button-addon2" name="q">
        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
      </div>

      <?php foreach($movies as $movie): ?>       
      <div class="searchusr">
        <?php
        echo "<h4 class=title>" . $movie['title'] . "</h4>" ;      
        echo "<p>Director: " . $movie['director'] . "</p>";
        echo "<p>{$movie['description']}</p>";
        ?>
      </div>
        <?php echo "<p class=title><a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . $movie['title'] . " (" . $movie['releaseYear'] . ") " . $movie['director'] . "</a> </p>";
        ?>             

        <?php endforeach ?>
        <?php endif ?>

    </form>

  <footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5><a href="aboutus.php"> About us</a></h5>
          <h5><a href="moviesearch_user.php"> Search</a></h5>

        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
          <ul class="list-unstyled">
            <li>Email: info@entertainmentmb.ca</li>
            <li>Phone: 431-555-5555</li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Follow us</h5>
          <ul class="list-unstyled">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>






