<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module to modify information posted in the blog

****************/

require('connect.php');
require('authenticate.php');

// $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Review if the form was submitted
if(isset($_POST['submit'])) {

    $statement = $db->prepare("UPDATE blogapp SET title = :title, content = :content WHERE id = :id");

    // Bind the values from the form to the query
    $statement->bindValue(':title', $_POST['title']);
    $statement->bindValue(':content', $_POST['content']);
    $statement->bindValue(':id', $_POST['id']);

    // Execute the query
    $statement->execute();

    // Redirect to the homepage
    header('Location: index.php');
    exit;
} 

// Delete post
if (isset($_POST['delete'])) {
    $statement = $db->prepare("DELETE FROM blogapp WHERE id = :id");

    $statement->bindValue(':id', $_POST['id']);

    $statement->execute();

    header('Location: index.php');
    exit;
}



// Check if the id of the post was passed in the URL

if (!isset($_GET['id'])) {   
    header('Location: index.php');
    exit;

} 

// Prepare the select statement
$statement = $db->prepare("SELECT * FROM blogapp WHERE id = :id");

// Bind the id to the query
$statement->bindValue(':id', $_GET['id']);

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

    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <div>
            <p><label for="title">Title</label></p>
            <p><input type="text" name="title" id="title" value="<?php echo $result['title']; ?>"></p>

        </div>

        <div>
            <p><label for="content">Content:</label></p>
            <p><textarea name="content" id="content"><?php echo $result['content']; ?></textarea></p>
        </div>
        <!-- Bottons Submit and Delete -->
        <input type="submit" name="submit" value="Update Blog">
        <input type="submit" name="delete" value="Delete">

    </form>
    </div> 
</body>
</html>