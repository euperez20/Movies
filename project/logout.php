<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for logout

****************/
SESSION_START();
// Remove all session variables

$_SESSION = array();
// Destroy the session
session_destroy();
// Redirect user to login page
header('location: login.php');
exit;


// session_start();

// // Si el usuario no está autenticado, redirigirlo a la página de inicio de sesión
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// // Si se ha enviado el formulario de logout, destruir la sesión y redirigir a la página de inicio de sesión
// if (isset($_POST['logout'])) {
//     session_destroy();
//     header("Location: login.php");
//     exit();
// }
?>
