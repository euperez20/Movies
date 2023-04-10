<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for reading movie review

****************/
require('connect.php');
// Query for categories

$query_categories = "SELECT * FROM movie";
$statement_categories = $db->prepare($query_categories);
$statement_categories->execute();
$categories = $statement_categories->fetchAll(PDO::FETCH_ASSOC);

$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING); 

//Query
if(!empty($category)){
    // $query = "SELECT m.*, c.* FROM movie m LEFT JOIN category c ON m.categoryId = c.categoryId WHERE m.categoryId = :categoryId ";
    $query = "SELECT  * FROM movie WHERE categoryId = :category ORDER BY name DESC LIMIT 20" ;
    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
}

// else{
//     $query = "SELECT  * FROM movie ORDER BY releaseYear DESC LIMIT 20" ;
//     $statement = $db->prepare($query);
// } 

// $statement->execute(); 

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

?>


<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="main.css"> 
            <title>Movie Search</title>      
            
        </head>

        <header>
        <!-- Navigation menu -->

        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>
        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="#">Search Movies</a></li>
                <li class="dropdown">
                <a href="#">Admin</a>
                <div class="dropdown-content">
                    <a href="moviepost.php">Create Movie</a>
                    <a href="#">Edit Movie</a>
                    <a href=categorypost.php>New Movie Category</a>
                </div>

        </nav>
    </header>

    <body>

<!-- Remember that alternative syntax is good and html inside php is bad -->

 
   <form action="moviesearch.php" method="get">
        <label for="category">Filter by Movie Category:</label>
        <select name="category" id="category">
            <option value="">All categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['categoryId'] ?>"<?= $category== $category['categoryId'] ? ' selected' : '' ?>><?= $category['categoryId'] ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit">Filter</button>
    </form>

<div id="content">
    <!-- <?php if(strlen($description) <200){     

    }?> -->

     <ul>
           <?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
              <p class="title"> <?= $row['title'] ?> </p>              
              <?php  if (!empty($row['movieImage'])) {
              echo "<img src=\"images/" . $row['movieImage'] . "\">";
               } ?>

              <!-- <?php if(strlen($row['description']) > 200): ?>
                    <p> <?= substr($row['description'],0,200) ?> <a href="select.php?id=<?= $row['movieId'] ?>">... Read More</a> </p> -->
                <!-- <?php else: ?> -->
              <p> <?= $row['description'] ?> </p>
              <?php endif?>
            </li>

           <?php endwhile ?>
     </ul>
</div>
</div>





        <!-- <h1>Search Movies</h1>
        <form method="GET" action="search_movies.php">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"><br><br>
            
            <label for="director">Director:</label>
            <input type="text" name="director" id="director"><br><br>
            
            <label for="cast">Cast:</label>
            <input type="text" name="cast" id="cast"><br><br>
            
            <label for="release_year">Release Year:</label>
            <input type="text" name="release_year" id="release_year"><br><br>
            
            <input type="submit" value="Search Movies">
        </form> -->



    </body>
    </html>

   