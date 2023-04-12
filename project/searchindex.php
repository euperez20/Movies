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
        <a class="nav-link" href="moviesearch.php">Movies</a>
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
        <?php if (count($movies) === 0): ?>
        <p>There are no results for this search. Try again with other keyword.</p>

    <?php else: ?>
    <br>
    <h3>Results for "<?php echo isset($q) ? $q : ''; ?>"</h3><br>
    <?php foreach($movies as $movie): ?>         

        <ul>
            <li>
                <?php echo "<p class=title><a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . $movie['title'] . " (" . $movie['releaseYear'] . ") " . $movie['director'] . "</a> </p>";
                 ?>
               
            </li>
        </ul>

        <?php endforeach ?>
        <?php endif ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>






