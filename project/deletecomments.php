<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 21,2023
    Description: Module to delete comments in each movie.

****************/

require('connect.php');



// Obtener el ID del comentario a eliminar

$reviewId = $_GET['reviewId'];




// Eliminar el comentario de la base de datos

$query = "DELETE FROM review WHERE reviewId='$reviewId'";

$statement = $db->prepare($query);




// Redirigir de vuelta a la página de moderación de comentarios

header('Location: comments.php');





  
?>