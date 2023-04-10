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

$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

//Query
if (!empty($category)) {  
    $query = "SELECT m.movieId, m.title, m.releaseYear, m.description, m.movieImage, c.categoryId, c.name 
              FROM movie m LEFT JOIN category c ON m.categoryId = c.categoryId 
              WHERE c.categoryId = :category";
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
        <!-- Navigation menu -->
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>
        <nav>
        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="moviesearch.php">Search Movies</a></li>
                <li class="dropdown">
                <a href="#">Admin</a>
                <div class="dropdown-content">
                    <a href="moviepost.php">Create Movies</a>
                    <a href="#">Edit Movie</a>
                    <a href=categorypost.php>Create Categories</a>
                    <a href=admincomments.php>Moderate Comments</a>
                </div>

             </ul>
        </nav>
    </header>

    <form method="GET" action="moviesearch.php">
        <label for="category">Select a category:</label>
        <select name="category" id="category">
            <option value="">All categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['categoryId'] ?>"<?= $category == $category['categoryId'] ? ' selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit">Search</button>
    </form>

    <?php
    // Display the movie results
    foreach ($movies as $movie) {
        echo "<h2>{$movie['title']} ({$movie['releaseYear']})</h2>";
        echo "<p>{$movie['description']}</p>";
        echo "<img src=\"images/" . $movie['movieImage'] . "\">"; 

    }
    ?>
</body>
</html>
