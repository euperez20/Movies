<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 21,2023
    Description: Module to modify movies information and delete movies.

****************/

require('connect.php');
//require('authenticate.php');  

// // Verify if the form was submitted
// if(isset($_POST['submit'])) {
//     $title = $_POST['title'];
//     $categoryId = $_POST['categoryId'];
//     $director = $_POST['director'];
//     $cast = $_POST['cast'];
//     $ranking = $_POST['ranking'];
//     $description = $_POST['description'];
//     $releaseYear = $_POST['releaseYear'];
//     $movieImage = $_POST['movieImage'];
//     $movieId = $_POST['movieId'];

// Manage image

// if (isset($_FILES['movieImage'])) {
//     $movieImage = $_FILES['movieImage']['name'];
//     $image_temp = $_FILES['movieImage']['tmp_name'];
//     move_uploaded_file($image_temp, "uploads/$movieImage");

    
// }


// if (isset($_FILES['movieImage']) && $_FILES['movieImage']['error'] !== UPLOAD_ERR_NO_FILE) {
//     // Delete the old image
//     unlink("images/$movieImage");

//     // Upload the new image
//     $movieImage = $_FILES['movieImage']['name'];
//     $image_temp = $_FILES['movieImage']['tmp_name'];
//     move_uploaded_file($image_temp, "images/$movieImage");
// }


// Validation
// $errors = [];
// if (strlen($title) < 1) {
//   $errors[] = "Title must be at least 1 character in length";
// }
// if (strlen($description) < 1) {
//   $errors[] = "Description must be at least 1 character in length";
// }
// if (strlen($movieImage) < 1) {
//   $errors[] = "Please upload an image";
// }

// if (!isset($categoryId)) {
//     $errors[] = "Please select a category";
//   }
//   if (!isset($director)) {
//     $errors[] = "Please enter a director";
//   }
//   if (!isset($cast)) {
//     $errors[] = "Please enter a cast";
//   }
//   if (!isset($releaseYear)) {
//     $errors[] = "Please enter a release year";
//   }
  // If there are no validation errors, insert the post

//   if (empty($errors)) {
//     $statement = $db->prepare("INSERT INTO movie (title, categoryId, description, director, cast,
//     ranking, releaseYear, movieImage) VALUES (:title, :categoryId, :description, :director, :cast,
//     :ranking, :releaseYear, :movieImage)");

// Verify if the form was submitted
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $categoryId = $_POST['categoryId'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $ranking = $_POST['ranking'];
    $description = $_POST['description'];
    $releaseYear = $_POST['releaseYear'];
    $movieId = $_POST['movieId'];
    
    
    // Check if a new image was uploaded
    if (!empty($_FILES['movieImage']['name'])) {
        $movieImage = $_FILES['movieImage']['name'];
        $image_temp = $_FILES['movieImage']['tmp_name'];
        move_uploaded_file($image_temp, "images/$movieImage");

        // Delete the existing image
        $statement = $db->prepare("SELECT movieImage FROM movie WHERE movieId = :movieId");
        $statement->bindValue(':movieId', $movieId);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $existingImage = $row['movieImage'];
        unlink("images/$existingImage");
    } else {
        // Use the existing image
        $statement = $db->prepare("SELECT movieImage FROM movie WHERE movieId = :movieId");
        $statement->bindValue(':movieId', $movieId);
        $statement->execute();
    }


// Errors
$errors = [];
if (strlen($title) < 1) {
    $errors[] = "Title must be at least 1 character in length";
}
if (strlen($description) < 1) {
    $errors[] = "Description must be at least 1 character in length";
}
if (empty($categoryId)) {
    $errors[] = "Please select a category";
}
if (empty($director)) {
    $errors[] = "Please enter the director name";
}
if (empty($cast)) {
    $errors[] = "Please enter the cast names";
}
if (empty($releaseYear)) {
    $errors[] = "Please enter the release year";
}

if (empty($movieImage)) {
    $errors[] = "Please enter the release year";
}



if(isset($_POST['submit'])) {
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
    $statement->bindValue(':movieImage', $_POST['movieImage']);
    $statement->bindValue(':movieId', $_POST['movieId']);

    // Execute the query
    $statement->execute();

    // Redirect to the homepage
    header('Location: index.php');
    exit;
    }
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
    header('Location: index.php');
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
    header('Location: index.php');
    exit;

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id=container1>

    <h1>Eunice's Blog</h1>
    <h2>Edit Post</h2>

    <form action="editmovie.php" method="post">
        <input type="hidden" name="movieId" value="<?php echo $result['movieId']; ?>">
        <div>
            <p><label for="title">Title</label></p>
            <p><input type="text" name="title" id="title" value="<?php echo $result['title']; ?>"></p>

        </div>

        <div>
            <p><label for="categoryId">Category:</label></p>
            <p><textarea name="categoryId" id="categoryId"><?php echo $result['categoryId']; ?></textarea></p>
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
                <p><label for="movieImage">Upload Image</label></p>
                <p><input type="file" id="movieImage" name="movieImage"><p>
               
        </div>

        
        <!-- Bottons Submit and Delete -->
        <input type="submit" name="submit" value="Update Movie">
        <input type="submit" name="delete" value="Delete">

    </form>
    </div> 
</body>
</html>