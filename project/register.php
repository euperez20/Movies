<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: April 20,2023
    Description: Module to register as a user

****************/
require_once ('connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];


// Validate user information 

if (empty($name) || empty($email) || empty($password1) || empty($password2)) {
$error = 'All fields are required';
} elseif (strlen($password1) < 8) {
$error = 'Password must be at least 8 characters';

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

$error = 'The email entered is not valid';


} elseif ($password1 !== $password2) {
$error = 'Passwords do not match. Please try again.';
} else {

$password = $password1;


// Insert user data into database

$stmt = $db->prepare('INSERT INTO user (fullname, email, password, role) VALUES (:name, :email, :password , "user")');
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

$stmt->execute();

// Redirect user to login page
header('Location: index.php');
exit();
}

}

?>




<!DOCTYPE html>
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

<div class="w-75_p-3-new">
    
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

    <div id="login"> 
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <div class="searchusr" >
            <h3>User Registration</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>            
                <input type="text" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input class="form-control" type="email" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password1" class="form-label">Password:</label>
                <input class="form-control" type="password" id="password1" name="password1">
            </div>

            <div class="mb-3">
            <label for="password2" class="form-label">Repeat Password:</label>
            <input class="form-control" type="password" id="password2" name="password2">
            </div>

            <button class="btn btn-primary" name="submit" type="submit" >Register</button>
        </form>
        </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>



<footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5><a href="aboutus.php"> About us</a></h5>
          <h5><a href="moviesearch_user.php"> Search</a></h5>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contact Information</h5>
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


