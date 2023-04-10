<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Blog to post, edit and read information

****************/

require('connect.php');

// Query Database
$query = "SELECT * FROM blogapp ORDER BY blogapp.id DESC LIMIT 5";

$statement = $db->prepare($query);

$statement->execute();

// Asigning variables
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

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
    <div id="container1">
    <h1>Eunice's Blog</h1>

    <header>
        <nav id="homemenu">
            <ul>
                <li><a href="post.php">New Post</a></li>                
            </ul>      
        </nav>
        <h2>Recently Posted Blog Entries</h2>     
    </header>

    <!-- Showing Content -->
        <div id=shortpost>
        
    <!-- Validation characters -->
        <?php if(strlen($content) < 200){ 

                // Showing short post
                echo "<p><ul>";
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    echo "<li>";
                    echo "<p class=title>" . $row['title'] . " " . "<a class=edit href='" . "edit.php?id" . "=" . $row['id'] . "'" . ">" . "Edit" . "</a>" . "</p></li>";                    
                    echo "<li><p>" . date("F d, Y, h:i a", strtotime($row['date'])) . "</p></li>";

                    $contentHome = substr($row['content'], 0, 200);
                    echo "<li>" . $contentHome . "</li>"; 
                    
                    echo "<li><p>" . "<a class=edit href='" . "select.php?id" . "=" . $row['id'] . "'" . ">" . "Read Full Post" . "</a>" . "</p>" . "<br></li>";   
                    

                    } ?>
                    
                    <?php echo "</ul>"; 
                     
                }?>
                <P></P>

        </div>

    </div>   
            
</body>
</html>