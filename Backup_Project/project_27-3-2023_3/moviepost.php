<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: Module for posting new movies

****************/

require('connect.php');
require('authenticate.php');

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
    if ($_FILES['movieImage']['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file. Error code: " . $_FILES['movieImage']['error'];
        exit;
    }

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
        header("Location: index.php");
        exit();

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Cinemaniacs</title>
</head>
<body>
    
    <div id=container1>
        <h1>Cinemaniacs</h1>
        <h2>Movie Lovers</h2>
        <h1>Create a New Movie</h1>
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
</body>
</html>





