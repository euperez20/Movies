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
<!-- bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <title>Welcome to ENTERTAINMENTMB</title>
  </head>
  <body>
<!-- 
<div class="col">
  <h1>test</h1>
</div> -->
  <div class="w-75_p-3">
    
    <header>
      <div id="container1">
          <h1>ENTERTAINMENTMB</h1>
      </div>

        <!-- Navigation menu -->
        
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Admin</a>
            </li>   
          </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

        </div>
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



