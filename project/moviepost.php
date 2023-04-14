<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Module for posting new movies

****************/

require('connect.php');
// require('authenticate.php');

// Prepare the SQL 
$statement = $db->prepare("INSERT INTO movie (title, categoryId, description, director, cast, releaseYear, movieImage) VALUES (:title, :categoryId, :description, :director, :cast, :releaseYear, :movieImage )"); 

// Prepare la consulta SQL para obtener todas las categorías
$categories_query = $db->prepare("SELECT * FROM category");

// Validate is the review has been submitted
if (isset($_POST['submit'])) {

    // Get the data    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $cast = $_POST['cast'];
    $director = $_POST['director'];
    $releaseYear = $_POST['releaseYear'];
   
// Image upload section
if (isset($_FILES['movieImage'])) {
    $movieImage = $_FILES['movieImage']['name'];
    $image_temp = $_FILES['movieImage']['tmp_name'];
    $upload_dir = "images/";
    
    // Check for errors
    // if ($_FILES['movieImage']['error'] !== UPLOAD_ERR_OK) {
    //     echo "Error uploading file. Error code:PRUEBA " . $_FILES['movieImage']['error'];
    //     exit;
    // }

    // Move the file to the images directory
    if (move_uploaded_file($image_temp, $upload_dir . $movieImage)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}

    // Validate title and description
    $errors = [];
    if (strlen($title) < 1) {
        $errors[] = "Review must be at least 1 character in length";
    }

    if (strlen($description) < 1) {
        $errors[] = "Review must be at least 1 character in description field";
    }

   
    if (empty($errors)) {

        // Prepare the SQL statement
        $stmt = $db->prepare("INSERT INTO movie (title_movie, categoryId, description, director, cast, releaseYear, movieImage) VALUES (:title, :categoryId, :description, :director, :cast, :releaseYear, :movieImage)");

        // link parameters    
        $statement->bindValue(':title', $title);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':director', $director);
        $statement->bindValue(':cast', $cast);
        $statement->bindValue(':releaseYear', $releaseYear);
        $statement->bindValue(':movieImage', $movieImage);

        // Execute the statement    
        $statement->execute();

        
        // Ejecutar la consulta
        $categories_query->execute();

        
        // Obtener los resultados
        $categories = $categories_query->fetchAll();


        // Redirect back to the home page    
        header("Location: moviesearch.php");
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




    <div id=container1>

        <h2>Create New Movie</h2>
        <form id="post" action="moviepost.php" method="post" enctype="multipart/form-data">
       
            <div>

                <p><label for="title">Title</label></p>
                <p><input type="text" id="title" name="title"><p>

            </div>

            <div>

                <p><label for="description">Review of the movie</label></p>
                <p><textarea id="description" name="description"></textarea></p>

            </div>

          
            <div>
                <label for="categoryId">Category:</label>
                <select name="categoryId" id="categoryId">
                    <?php
                    // Prepare the SQL query
                    $query = $db->query("SELECT categoryId, name FROM category");

                    // Loop through the results and create an option for each category
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['categoryId']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <p><label for="director">Director</label></p>
                <p><input type="text" id="director" name="director"><p>
            </div>


            <div>
                <p><label for="cast">Cast</label></p>
                <p><input type="text" id="cast" name="cast"><p>
            </div>

            <div>
                <p><label for="releaseYear">Release Year</label></p>
                <p><input type="text" id="releaseYear" name="releaseYear"><p>
            </div>

            
            <div>
                <p><label for="movieImage">Upload Movie Image</label></p>
                <p><input type="file" id="movieImage" name="movieImage"><p>
            </div>


            <input type="submit" value="Submit" name="submit">
        
        </form>
    </div> 
                </div>   
</body>
</html>





