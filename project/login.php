<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for authentication

****************/



session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['userId'])) {
  // Si el usuario ya ha iniciado sesión, redirigir a la página de inicio
  header("Location: moviesearch.php");
  exit();
}

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['login'])) {
  // Conectar a la base de datos
  require 'connect.php';

  // Obtener los datos del formulario de inicio de sesión
  $userId = $_POST['userId'];
  $password = $_POST['password'];

  // Verificar si el nombre de usuario y la contraseña son válidos
  $query = "SELECT * FROM user WHERE userId = :userId AND password = :password";
  $statement = $db->prepare($query);
  $statement->bindValue(':userId', $userId);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Si el nombre de usuario y la contraseña son válidos, iniciar sesión para el usuario
    $_SESSION['userId'] = $user['userId'];
   
    // Redirigir a la página de inicio
    header("Location: moviesearch.php");
    exit();
  } else {
    // Si el nombre de usuario y la contraseña no son válidos, mostrar un mensaje de error
    $error = "Wrong User ID or Password";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Administration</title>
</head>

<body>

        <!-- Navigation menu -->
        <header>
        <div id="container1">
            <h1>ENTERTAINMENTMB</h1>
        </div>


        <!-- Navigation menu -->
        <nav >
            <ul class="menubase">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="moviesearch.php">Movies</a></li>
                <li class="dropdown">
                <a href="login.php">Admin</a>

             </ul>
        </nav>

    </header>



  <h1>Login</h1>
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="POST" action="">
    <label for="userId">User Id:</label>
    <input type="text" id="userId" name="userId"><br>
    <label for="password">Password:</label>
    <input type="text" id="password" name="password"><br>
    <button type="submit" name="login">Login</button>
  </form>
</body>
</html>



