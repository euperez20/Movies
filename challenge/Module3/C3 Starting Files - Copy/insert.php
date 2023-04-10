<?php
/*******w******** 
    
    Name:
    Date:
    Description:

****************/

require('connect.php');

// Extract variables from Fake Tweet
// if(isset($_POST['submit'])){


if($_POST && !empty($_POST['status'])){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    // Validation characters
    if(strlen($status) > 140){
        echo "Please enter a tweet with no more than 140 charachters";
        exit;
    }

    //  Build the parameterized SQL query and bind to the above sanitized values.
    $query = "INSERT INTO tweets (id, status) VALUES (:id, :status)";
    $statement = $db->prepare($query);

    //  Bind values to the parameters
    $statement->bindValue(':id', $id);
    $statement->bindValue(':status', $status);

    //  Execute the INSERT.
    //execute() will check for possible SQL injection and remove if necessary
    if ($statement->execute()) {
         echo "Success";
    } else {
        echo "Error: " . $query . "<br>" . $db->$error;
    }
}

?>
