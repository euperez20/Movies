<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 21,2023
    Description: Module to delete comments in each movie.

****************/
require('connect.php');

// Elimina un comentario de la base de datos


if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $query = "DELETE FROM review WHERE reviewId = :reviewId";
    $statement = $db->prepare($query);
    $statement->bindValue(':reviewId', $delete, PDO::PARAM_INT);
    $statement->execute();
  
    // Imprimir mensaje de confirmación
    echo "The review has been Removed.";
  }
  
?>