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
    
    
</body>
</html>