<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for authentication

****************/

session_start();

// Verify user session
if (isset($_SESSION['userId'])) {
  header("Location: moviesearch.php");
  exit();
}

// Verify form
if (isset($_POST['login'])) {
  require 'connect.php';
  $userId = $_POST['userId'];
  $password = $_POST['password'];
  

  // Verify user and password
  $query = "SELECT * FROM user WHERE userId = :userId AND password = :password";
  $statement = $db->prepare($query);
  $statement->bindValue(':userId', $userId);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $_SESSION['userId'] = $user['userId'];


    // Verify user role in DB
    if ($user['role'] == 'user') {
    header("Location: moviesearch_user.php");
    exit();
   
    
  } else {
        // Si el usuario no tiene el campo "role" igual a "user", redirigir a la página login.php
        header("Location: moviesearch.php");
        exit();}
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
        <img src="images/logo/logo3.png" alt="My Logo">
      </div>

        <!-- Navigation menu -->
        
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#000000;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="moviesearch_user.php">Movies</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Admin</a>
            </li>   
          </ul>

          <form class="form-inline my-2 my-lg-0" method="GET" action="searchindex.php">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">Search</button>
          </form>

        </div>
      </nav>
    </header>


<div class="searchusr" >
  <h3>Login</h3>
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="POST" action="">
    <label for="userId">User Id:</label>
    <input class="form-control mr-sm-2" type="text" id="userId" name="userId"><br>
    <label for="password">Password:</label>
    <input class="form-control mr-sm-2" type="password" id="password" name="password"><br>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
  </form>
  </div>
</body>

<!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5><a href="aboutus.php"> About us</a></h5>
          <h5><a href="moviesearch_user.php"> Search</a></h5>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
          <ul class="list-unstyled">
            <li>Email: info@entertainmentmb.ca</li>
            <li>Phone: 431-555-5555</li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Follow us</h5>
          <ul class="list-unstyled">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>



</html>



