<?php

/*******w******** 
    
    Name: Maria Gonzalez 
    Date: Feb 1, 2023
    Description: Blogging Application

****************/

require('connect.php');

//Query

$query = "SELECT  * FROM blog ORDER BY blog.id DESC LIMIT 5"  ;
$statement = $db->prepare($query);
$statement->execute();

// $blog = $statement->rowCount();

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);


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
    <div id=title>
        <h1>The Best Blog!</h1>
        <h2>Recently Posted Blog Entries</h2>
    </div>   
    <div id=main>
    <header>
          <nav id="menu">
              <ul>
                  <li><a href="post.php">New Post</a></li> 
              </ul>
          </nav>
    </header> 
       
        <div id=content>
            <?php if(strlen($content) <200){
                
            }?>
      
             <ul>
                   <?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                    <li>
                      <p class=title> <?= $row['title_blog'] ?> <a href="edit.php?id=<?= $row['id'] ?> "> Edit </a></p>
                      <p> <?= $row['date'] ?></p>
                      <?php if(strlen($row['content']) > 200): ?>
                            <p> <?= substr($row['content'],0,200) ?> <a href="read.php?id=<?= $row['id'] ?>">... Read More</a> </p>
                        <?php else: ?>
                      <p> <?= $row['content'] ?> </p>
                      <?php endif?>
                    </li>
                   <?php endwhile ?>
             </ul>

        </div>
    </div>
    
</body>
</html>