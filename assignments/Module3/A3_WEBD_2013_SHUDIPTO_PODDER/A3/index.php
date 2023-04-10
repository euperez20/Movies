<?php

/*******w******** 
    
    Name: Shudipto Podder
    Date: February 4,2023
    Description: Home page of Blog

****************/

require('connect.php');

$content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

// myblogg database
$query = "SELECT * FROM myblogg ORDER BY id
DESC LIMIT 5";
$statement = $db->prepare($query);
$statement->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Welcome to my Blog!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="header">
    <h1>
        <a>My Personal Blog</a>
    </h1>
            <a href="index.php">Home||</a>
            <a href="post.php">New Post</a> 

        <h2>Previous Blogs</h2>    
        
            <?php if(strlen($content) > 200){ 
                 $posts = substr($row['content'], 0, 200) .'.....';
                     echo " $posts";
                     
                     }?>
            <div id="design">
            <?php if(strlen($content) < 200){ 
                echo "<ul>";
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                //displaying title
                    echo "<p class=title>" . $row['title'] .  "</p>";
                //displaying time with an edit option beside
                    $time=strtotime($row['date']);
                    echo "<p>" . date("F d, Y, h:i a", $time) ." " ."<a class=edit href='" ."edit.php?id" . "=" . $row['id'] . "'" . ">" . "Edit" . "</a>" . "</p>";
                    //displaying blog posts with 200 word limit
                     $posts = substr($row['content'], 0, 200);
                     echo "<li>" . $posts . "</li>"; 
                 } 


            }?>

                

        </div>

    </div>   
            
</body>
</html>