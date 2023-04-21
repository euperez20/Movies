<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: April 16,2023
    Description: Module for logout

****************/
SESSION_START();
// Remove all session variables

$_SESSION = array();
// Destroy the session
session_destroy();
header('location: login.php');
exit;


?>
