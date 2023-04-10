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
    
        <h1>Create a New Movie Category</h1>
        <form id="post" action="categorypost.php" method="post">
       
            <div>
                <p><label for="name">Category Name</label></p>
                <p><textarea id="name" name="name"></textarea></p>
            </div>

            <input type="submit" value="Submit" name="submit">
        
        </form>
    </div>    
</body>
</html>