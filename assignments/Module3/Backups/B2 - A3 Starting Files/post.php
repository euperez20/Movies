<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for posting information in the blog

****************/

require('connect.php');
require('authenticate.php');

// Prepare the SQL 
$statement = $db->prepare("INSERT INTO blogapp (title, content) VALUES (:title, :content)"); 

// Validate is the post has been submitted
if (isset($_POST['submit'])) {
       
    // Get the data    
    $title = $_POST['title'];        
    $content = $_POST['content'];    
      
    // link parameters    
    $statement->bindValue(':title', $title);    
    $statement->bindValue(':content', $content);     
    
    // Execute the statement    
    $statement->execute();     
    
    // Redirect back to the home page    
    header("Location: index.php");
    exit();
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog Post!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
     <div id=container1>
     <h1>Eunice's Blog</h1>
    <h1>Create a New Blog Post</h1>
    <form id="post" action="post.php" method="post">
       
        <div>

            <p><label for="title">Title</label></p>
            <p><input type="text" id="title" name="title"><p>

        </div>

        <div>

            <p><label for="content">Content</label></p>
            <p><textarea id="content" name="content"></textarea></p>

        </div>
        <input type="submit" value="Submit Blog" name="submit">
        </div>
    </form>


    
</body>
</html>