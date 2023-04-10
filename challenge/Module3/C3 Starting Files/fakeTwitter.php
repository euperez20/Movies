<?php
/*******w******** 
    
    Name: Eunice Perez
    Date: 1 February, 2023
    Description: Program Fake Twitter

****************/

require('connect.php');

// Query Database
$query = "SELECT * FROM tweets";

$statement = $db->prepare($query);

$statement->execute();

$tweetNum = $statement->rowCount();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <title>My Fake Twitter</title>
    </head>
    <body>
        <!-- Remember that alternative syntax is good and html inside php is bad -->
        <div id="container1">

            <div id="wrapper">
                <form method="post" action="insert.php">                   
                    <input type="text" name="status" placeholder="What's going on?" >
                    
                    <input type="submit" value="tweet!">

                </form>
            </div>

            <div id=container2>

                <!-- Database Information --> 
                <?php if($tweetNum > 0){
                    echo "<ul>";

                    while($row = $statement->fetch(PDO::FETCH_ASSOC)){         
                        echo "<li>" . $row['status'] . "</li>";
                    } ?>
                    
                    <?php echo "</ul>";            
                } 
                else {
                    echo "No tweets found";
                } ?>    
            
            </div>
        </div>
    </body>
</html>