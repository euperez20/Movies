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
<html>
    <head>
        <title>Eunice's Blog</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
    <div id=container1>
        <h1>Eunice's Blog</h1>
        <p><h2><?= $row['title'] ?></h2></p>

        <?php echo "<p>" . "<a href='" . "edit.php?id" . "=" . $row['id'] . "'" . ">" . "Edit" . "</a>" . "</p>";                    
        echo "<p>" . date("F d, Y, h:i a", strtotime($row['date'])) . "</p>" ?>
        <?php echo "<p>" . $row['content'] . "</p>"; 

        ?>
                            
    </div>

    </body>
</html> 