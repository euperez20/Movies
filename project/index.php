<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Main page for CMS movies

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
<!-- 
<div class="col">
  <h1>test</h1>
</div> -->
  <div class="w-75_p-3">
    
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

    

    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="images/carousel/1.jpg" class="d-block w-100" alt="1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/2.jpg" class="d-block w-100" alt="2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/3.jpg" class="d-block w-100" alt="3.jpg">
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


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

    <table class="table">
      <thead>
        <tr>
          <!-- <th scope="row">Name</th> -->
          <!-- <th scope="row">Release Year</th>
          <th scope="row">Director</th> -->
        </tr>
      </thead>
      <tbody>    
        <!-- Validation characters -->
        <?php if(strlen($description) < 200){ 
        // Showing movie brief information
        // echo "<th scope='"."row>1</th>'";
        $count = 0;
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            if($count == 4) break; 
            $count++;?>   
            
            <th scope="row"><?php echo "<p class=title><a class=edit href='" . "select.php?movieId" . "=" . $row['movieId'] . "'" . ">" . $row['title'] . " (" . $row['releaseYear'] . ")</a>" ;  ?> </th> 

            
            <?php
            echo "</div>";
        }
        echo "</div>";
        }
            ?>       
          
    </table>
  </div>

    
  
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

<footer>

</footer>




</html>






