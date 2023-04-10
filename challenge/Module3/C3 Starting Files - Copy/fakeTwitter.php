<?php
/*******w******** 
    
    Name:
    Date:
    Description:

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
    <title>My Fake Twitter</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <h1>Fake Twitter </h1>
    <h2>Tweets:</h2>


    <div>
        <form method="post" action="insert.php">
            <label for="status">Status:</label>
            <input type="status" name="status">

            <input type="submit">

    </form>
    </div>

    <div id=container1>

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
</body>
</html>