<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Module for posting new categories

****************/

require('connect.php');
// require('authenticate.php');

// Prepare the SQL 
$statement = $db->prepare("INSERT INTO category (name) VALUES (:name )"); 

// Prepare la consulta SQL para obtener todas las categorías
$categories_query = $db->prepare("SELECT * FROM category");

// Validate is the review has been submitted
if (isset($_POST['submit'])) {

    // Get the data    
    $name = $_POST['name'];
    
    // Validate title and description

    $errors = [];
    if (strlen($name) < 1) {
        $errors[] = "Category must be at least 1 character in length";
    }
    
    if (empty($errors)) {

        // Prepare the SQL statement
        $stmt = $db->prepare("INSERT INTO category ( name ) VALUES ( :name )");

        // link parameters    
        $statement->bindValue(':name', $name);
        
        // Execute the statement    
        $statement->execute();
      
        // Redirect back to the home page    
        header("Location: index.php");
        exit();

    }
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
            <h1>ENTERTAINMENTMB</h1>
        </div>


        <!-- Navigation menu -->
        
        <nav class="navbar navbar-expand-lg navbar-dark">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="login.php">Admin</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="moviesearch.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Admin
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="moviepost.php">Movies</a>


          

          <a class="dropdown-item" href="categorypost.php">Categories</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="True">Disabled</a>
      </li>  -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



    </header>

    
        <h2>Create a New Movie Category</h2>
        <form id="post" action="categorypost.php" method="post">
       
            <div>
                <p><label for="name">Category Name</label></p>
                <p><textarea id="name" name="name"></textarea></p>
            </div>

            <input type="submit" value="Submit" name="submit">
        
        </form>
    </div>
</div>    
</body>
</html>