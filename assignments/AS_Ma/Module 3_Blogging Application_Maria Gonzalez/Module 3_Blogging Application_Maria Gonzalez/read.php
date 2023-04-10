<?php

/*******w******** 
    
    Name: Maria Gonzalez 
    Date: Feb 2, 2023
    Description:Blogging Application

****************/
require('connect.php');



if($_GET){
    
    //Query
    $query = "SELECT * FROM blog WHERE id = :id LIMIT 1";

    // Sanitize $_GET['id'] to ensure it's a number.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id, PDO::PARAM_INT);

    // Execute the query
    $statement->execute();

     // Fetch the row selected by primary key id.
    $post = $statement->fetch();
}
else{
    header("Location: index.php");
    exit;
}

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
    <div id=title>
        <h1>The Best Blog!</h1>
        <h2>Recently Posted Blog Entries</h2>
    </div>   
    <div id=main>
        <div id=content>
            <p><?= $post['title_blog'] ?></p>
            <p><?= $post['date']?></p>
            <p><?= $post['content'] ?></p>
        </div>
    </div>
    
</body>
</html>