<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 21,2023
    Description: Module to modify movies information and delete movies.

****************/

require('connect.php');
//require('authenticate.php');

// Conexión a la base de datos


// Eliminar la película de la base de datos
$movieId = $_GET['movieId'];

$statement = $db->prepare("DELETE * FROM movie WHERE movieId = :movieId");
$statement->bindValue(':movieId', $movieId);
$statement->execute();

header('Location: moviesearch.php');
exit;
?>
