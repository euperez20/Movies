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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css"> 
    <title>Movie Search</title>      
</head>

<body>  
    <header>
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>

        <!-- Navigation menu -->
        
        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="moviesearch.php">Movies</a></li>
                <li class="dropdown">
                <a href="login.php">Admin</a>

             </ul>
        </nav>
        

    </header>

    <div>
        <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
        </form>
    </div>

    <form class="searchform" method="GET" action="moviesearch.php" >
        <label for="category">Select a category:</label>
        <select name="category" id="category">
            <option value="">All categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['categoryId'] ?>"<?= $category == $category['categoryId'] ? ' selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach ?>
        </select>
        <div class="searchsort">       
            <label for="category">Sort by:</label>
            <input type="radio" id="sort-title" name="sort" value="title">
            <label for="sort-title">Title</label>
            <input type="radio" id="sort-director" name="sort" value="director">
            <label for="sort-director">Director</label>
            <input type="radio" id="sort-releaseYear" name="sort" value="releaseYear">
            <label for="sort-releaseYear">Release year</label>
            <button type="submit">Search</button>
        </div>

    </form>
    <?php

    // Display the movie results
    foreach ($movies as $movie) {        
        echo "<h3><p class=title><a class=edit href='" . "admincomments.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . $movie['title'] . "(" . $movie['releaseYear'] . ")</a></h3>" ;
        echo "<p>" . "<a class=edit href='" . "select.php?movieId" . "=" . $movie['movieId'] . "'" . ">" . "View Details" . "</a>" . "</p>" . "<br>";
        echo "<p>{$movie['description']}</p>";
        echo "<img src=\"images/" . $movie['movieImage'] . "\">"; 
        
    }
    ?>
</body>
</html>
