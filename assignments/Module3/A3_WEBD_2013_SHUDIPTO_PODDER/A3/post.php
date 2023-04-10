<?php

/*******w******** 
    
    Name: Shudipto Podder
    Date: February 4,2023
    Description: Blog posting

****************/

require('connect.php');
require('authenticate.php');
 
$title= filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);



// Make sure the post contains at least a letter
if (isset($_POST['submit'])) { 
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (empty(strlen($title)<1 && strlen($content)<1)) {
        $statement = $db->prepare("INSERT INTO myblogg (title, content) VALUES (:title, :content)");  
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->execute();   
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
    <title>My Blog Post!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    
        <h1>My Personal Blog</h1>
        <a href="index.php">My Personal Blog</a>
    
        <h1>Post your Blog</h1>
        <form id="post" action="post.php" method="post">
            <fieldset>
                <legend></legend>
            <ul>

                <p>
                    <label for="title">Title</label>
                </p>
                <p>
                    <input type="text" id="title" name="title" size="100">
                </p>
                

            </ul>

            <ul>

                <p>
                    <label for="content">Content</label>
                </p>
                <p>
                    <textarea name="content" id="content"></textarea>
                </p>
            </ul>
            <p>
                <input type="submit" value="Submit" name="submit">
            </p>
        
        </form>
    </fieldset>
    </div>    
</body>
</html>