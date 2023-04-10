<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for read full blog posted

****************/
require('connect.php');
    
// Build and prepare SQL String with :id placeholder parameter.
$query = "SELECT * FROM blogapp WHERE id = :id LIMIT 1";
$statement = $db->prepare($query);

// Sanitize $_GET['id'] to ensure it's a number.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Bind the :id parameter in the query to the sanitized
// $id specifying a binding-type of Integer.
$statement->bindValue('id', $id, PDO::PARAM_INT);
$statement->execute();

// Fetch the row selected by primary key id.
$row = $statement->fetch();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css"> 
        <title>Read Post</title>      
        
    </head>
    <body>

    <div id=container1>
        <h1>Eunice's Blog</h1>
        <h2><?= $row['title'] ?></h2>

        <?php echo "<p>" . "<a class=edit href='" . "edit.php?id" . "=" . $row['id'] . "'" . ">" . "Edit" . "</a>" . "</p>";                    
        echo "<p>" . date("F d, Y, h:i a", strtotime($row['date'])) . "</p>" ?>
        <?php echo "<p>" . $row['content'] . "</p>"; 

        ?>
                            
    </div>

    </body>
</html> 