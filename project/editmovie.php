<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 21,2023
    Description: Module to modify movies information and delete movies.

****************/

require('connect.php');
//require('authenticate.php');

// Query for Categories
$query_categories = "SELECT * FROM category";
$statement_categories = $db->prepare($query_categories);
$statement_categories->execute();
$categories = $statement_categories->fetchAll(PDO::FETCH_ASSOC);

// Verify if the form was submitted
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $ranking = $_POST['ranking'];
    $description = $_POST['description'];
    $releaseYear = $_POST['releaseYear'];
    $movieId = $_POST['movieId'];

    //$categoryId = $_POST['categoryId'];
    if (!empty($_POST['categoryId'])) {
        $categoryId = $_POST['categoryId'];
    } else {
        // Use the existing category
        $statement = $db->prepare("SELECT categoryId FROM movie WHERE movieId = :movieId");
        $statement->bindValue(':movieId', $movieId);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $categoryId = $row['categoryId'];
    }
    
    
    // Check if a new image was uploaded
    if (!empty($_FILES['movieImage']['name'])) {
        $movieImage = $_FILES['movieImage']['name'];
        $image_temp = $_FILES['movieImage']['tmp_name'];
        move_uploaded_file($image_temp, "images/$movieImage");
        $movieId = $_POST['movieImage'];
    } 
    else {
        // Use the existing image
        $statement = $db->prepare("SELECT movieImage FROM movie WHERE movieId = :movieId");
        $statement->bindValue(':movieId', $movieId);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $movieImage = $row['movieImage'];
    }

    // Update the database with the new data
    $statement = $db->prepare("UPDATE movie SET title = :title, categoryId = :categoryId, description = :description,
    director = :director, cast = :cast, ranking = :ranking, releaseYear = :releaseYear, movieImage = :movieImage 
    WHERE movieId = :movieId");

    // Bind the values from the form to the query
    $statement->bindValue(':title', $_POST['title']);
    $statement->bindValue(':categoryId', $_POST['categoryId']);
    $statement->bindValue(':director', $_POST['director']);
    $statement->bindValue(':cast', $_POST['cast']);
    $statement->bindValue(':ranking', $_POST['ranking']);
    $statement->bindValue(':description', $_POST['description']);
    $statement->bindValue(':releaseYear', $_POST['releaseYear']);
    $statement->bindValue(':movieImage', $movieImage);
    $statement->bindValue(':movieId', $_POST['movieId']);

    // Execute the query
    $statement->execute();

    // Redirect to the homepage
    header('Location: moviesearch.php');
    exit;
}



// Delete post
if (isset($_POST['delete'])) {


    $statement = $db->prepare("DELETE FROM movie WHERE movieId = :movieId");

    $statement->bindValue(':movieId', $_POST['movieId']);

    $statement->execute();

    header('Location: index.php');
    exit;
}



// Check if the id of the post was passed in the URL

if (!isset($_GET['movieId'])) {   
    header('Location: moviesearch.php');
    exit;

} 

// Prepare the select statement
$statement = $db->prepare("SELECT * FROM movie WHERE movieId = :movieId");

// Bind the id to the query
$statement->bindValue(':movieId', $_GET['movieId']);

// Execute the query
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC); 

// Check if there was no result to redirect home page
if (!$result){    
    header('Location: moviesearch.php');
    exit;

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
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <header>
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>


        <!-- Navigation menu -->
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <a class="nav-link" href="moviesearch_user.php">Movies</a>
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
          <a class="dropdown-item" href="moviesearch.php">Search</a>
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


        </nav>
    </header>

    <form method='post' enctype='multipart/form-data'>
    <form action="editmovie.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieId" value="<?php echo $result['movieId']; ?>">
        <div>
            <p><label for="title">Title</label></p>
            <p><input type="text" name="title" id="title" value="<?php echo $result['title']; ?>"></p>

        </div>

        <div>
        
            <label for="category">Category:</label>
    <select name="categoryId">
        <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category['categoryId']; ?>" <?php if ($category['categoryId'] == $result['categoryId']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
        <?php } ?>
    </select><br>
        
        </div>
        <div>
            <p><label for="description">Review:</label></p>
            <p><textarea name="description" id="description"><?php echo $result['description']; ?></textarea></p>



        </div>

        <div>
            <p><label for="director">Director:</label></p>
            <p><textarea name="director" id="director"><?php echo $result['director']; ?></textarea></p>
        </div>

        <div>
            <p><label for="cast">Cast:</label></p>
            <p><textarea name="cast" id="cast"><?php echo $result['cast']; ?></textarea></p>
        </div>

        <div>
            <p><label for="ranking">Ranking:</label></p>
            <p><textarea name="ranking" id="ranking"><?php echo $result['ranking']; ?></textarea></p>
        </div>

        <div>
            <p><label for="releaseYear">Release year:</label></p>
            <p><textarea name="releaseYear" id="releaseYear"><?php echo $result['releaseYear']; ?></textarea></p>
        </div>

        
        <!-- image modification area -->
        <div>
                <p><label for="movieImageold"><?php echo $result['movieImage'] ; ?></label></p>
                <p><label for="movieImage">Upload Image</label></p>
                <p><input type="file" id="movieImage" name="movieImage"><p>
               
        </div>

 
        <!-- Buttons Submit and Delete -->
        <input type="submit" name="submit" value="Update Movie">
        <!-- <input type="submit" name="delete" value="Delete"> -->
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this movie?');">

    </form>





    
    </div> 
</body>
</html>