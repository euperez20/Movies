<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

require('connect.php');

// START EUNICE CODE - DELETE COMMENT
// Query Database
$query = "SELECT * FROM blogapp";

$statement = $db->prepare($query);

$statement->execute();

$tweetNum = $statement->rowCount();

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
    <div id="container1">

        <h1>Eunice's Blog</h1> 
        <h2><p>Recently Posted Blog Entries</p></h2>
           
    <!-- Showing Content -->
        <div id=container2>
        
    <!-- Validation characters -->
            <?php if(strlen($content) < 200){
                
                echo "<ul>";

                while($row = $statement->fetch(PDO::FETCH_ASSOC)){ 
                    echo "<p>" . $row['date'] . "</p>";
                    echo "<p>" . $row['title'] . "</p>";

                    $contentHome = substr($row['content'], 0, 200);
                    echo "<li>" . $contentHome . "</li>";

                    } ?>
                    
                    <?php echo "</ul>";  
                }?>

      
            

    
    
</body>
</html>