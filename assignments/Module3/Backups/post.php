<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

require('connect.php');

// Extract variables from form
if ($_POST && !empty($_POST['content'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);


    //  Build the parameterized SQL query and bind to the above sanitized values.
    $query = "INSERT INTO blogapp (id, content) VALUES (:id, :content)";
    $statement = $db->prepare($query);

    $statement->bindValue(':id', $id);
    $statement->bindValue(':content', $content);

    //  Execute the INSERT    
    if ($statement->execute()) {      
        header("location: fakeTwitter.php");
    exit();
    
    } else {
        echo "Error: " . $query . "<br>" . $db->$error;
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
    <div id="postform">
        <form action="post">
            <input type="text" name="status" placeholder="What's going on?" >
                    
                    <input type="submit" value="tweet!">
        </form>

    </div>

    
</body>
</html>