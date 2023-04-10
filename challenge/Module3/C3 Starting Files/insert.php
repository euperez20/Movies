<?php
/*******w******** 
    
    Name: Eunice Perez
    Date: 1 February, 2023
    Description: Inser for program Fake Twitter

****************/

require('connect.php');

// Extract variables from Fake Tweet
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

    $statement->bindValue(':id', $id);
    $statement->bindValue(':status', $status);

    //  Execute the INSERT    
    if ($statement->execute()) {      
        header("location: fakeTwitter.php");
        exit();

    } else {
        echo "Error: " . $query . "<br>" . $db->$error;
    }
}

?>
