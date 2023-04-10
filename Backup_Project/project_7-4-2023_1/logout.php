<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for logout

****************/

session_start();

// Si el usuario no está autenticado, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Si se ha enviado el formulario de logout, destruir la sesión y redirigir a la página de inicio de sesión
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
    <p>¿Está seguro de que desea cerrar la sesión?</p>
    <form method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
