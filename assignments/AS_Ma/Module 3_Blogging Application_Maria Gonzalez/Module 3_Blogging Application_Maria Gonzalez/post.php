<?php

/*******w******** 
    
    Name: Maria Gonzalez 
    Date: Feb 1, 2023
    Description:Blogging Application

****************/

require('connect.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {


 // Get the data from the form
 $title = $_POST['title_blog'];
 $content = $_POST['content'];

 // Prepare the SQL statement
 $stmt = $db->prepare("INSERT INTO blog (title_blog, content) VALUES (:title, :content)");

 // Bind the parameters to the SQL statement
 $stmt->bindParam(':title', $title);
 $stmt->bindParam(':content', $content);

 // Execute the SQL statement
 $stmt->execute();

 // Redirect the user back to the main page
 header("Location: index.php");
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
    <h1 class="post">Create a New Blog Post</h1>
    <form id= "post" action="post.php" method="post">
      <div id=post1>
        <label for="title_blog">Title:</label><br>
        <input type="text" id="title_blog" name="title_blog">
      </div>
      <div id=post2>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5"></textarea>
      </div>
      <input type="submit" value="Submit Blog" name="submit">
    </form>
    
</body>
</html>