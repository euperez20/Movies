<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: April 18,2023
    Description: file to handle movies delete.

****************/

require('connect.php');
$movieId = $_GET['movieId'];

$statement = $db->prepare("DELETE * FROM movie WHERE movieId = :movieId");
$statement->bindValue(':movieId', $movieId);
$statement->execute();

header('Location: moviesearch.php');
exit;
?>
