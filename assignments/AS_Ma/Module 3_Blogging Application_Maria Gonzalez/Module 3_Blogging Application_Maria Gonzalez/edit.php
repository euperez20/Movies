<?php

/*******w******** 
    
    Name: Maria Gonzalez Diaz
    Date: Feb 1, 2023
    Description: Blogging Application

****************/

require('connect.php');
require('authenticate.php');

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Prepare the update statement
    $stmt = $db->prepare("UPDATE blog SET title_blog = :title, content = :content WHERE id = :id");
    // Bind the values from the form to the query
    $stmt->bindValue(':title', $_POST['title']);
    $stmt->bindValue(':content', $_POST['content']);
    $stmt->bindValue(':id', $_POST['id']);
    // Execute the query
    $stmt->execute();
    // Redirect to the homepage
    header('Location: index.php');
    exit;
}

// Check if the id of the post was passed in the URL
if (!isset($_GET['id'])) {
    // If no id was passed, redirect to the homepage
    header('Location: index.php');
    exit;
}

// Prepare the select statement
$stmt = $db->prepare("SELECT * FROM blog WHERE id = :id");
// Bind the id to the query
$stmt->bindValue(':id', $_GET['id']);
// Execute the query
$stmt->execute();
// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if there was no result
if (!$result) {
    // If there was no result, redirect to the homepage
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
    <h1 class="edit">Edit Post:</h1>
    <form id="edit" action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <div id="edit1">
            <label id="title_blog">Title:</label><br>
            <input type="text" name="title" id="title_edit" value="<?php echo $result['title_blog']; ?>">
        </div>
        <div id="edit2">
            <label for="content">Content:</label><br>
            <textarea name="content" id="content" rows="5"><?php echo $result['content']; ?></textarea>
        </div>
        <input type="submit" name="submit" value="Update Blog">
        <input type="submit" name="delete" value="Delete">
    </form>
    
</body>
</html>