<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: March 18,2023
    Description: File to handle movie delete comments

****************/

require('connect.php');

$reviewId = $_GET['reviewId'];
$query = "DELETE FROM review WHERE reviewId='$reviewId'";

$statement = $db->prepare($query);

header("comments.php?movieId=" . $movieId);
 
?>