<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for add comments in each movie review

****************/
	
		require('connect.php');
		

		// If a user submitted a comment, insert it into the database
		if (isset($_POST['submit_comment'])) {
			$movieId = $_POST['movie_id'];
			$userId = $_POST['user_id'];
			$fullName = $_POST['full_name'];
			$reviewDate = date('Y-m-d');
			$review = $_POST['review'];

			$stmt = $conn->prepare("INSERT INTO Review (movieId, userId, fullName, reviewDate, review) VALUES (:movieId, :userId, :fullName, :reviewDate, :review)");
			$stmt->bindParam(':movieId', $movieId);
			$stmt->bindParam(':userId', $userId);
			$stmt->bindParam(':fullName', $fullName);
			$stmt->bindParam(':reviewDate', $reviewDate);
			$stmt->bindParam(':review', $review);
			$stmt->execute();

			echo '<p>Thank you for your comment!</p>';
		}


	
		// Fetch movie details
		$stmt = $db->prepare("SELECT * FROM Movie WHERE movieId = :movieId");
		$stmt->bindParam(':movieId', $_GET['movieId']);
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach ($result as $row) {
			echo '<div>';
			echo '<img src="' . $row['movieImage'] . '" alt="' . $row['description'] . '">';
			echo '<h2>' . $row['description'] . ' (' . $row['releaseYear'] . ')</h2>';
			echo '<p>Director: ' . $row['director'] . '</p>';
			echo '<p>Cast: ' . $row['cast'] . '</p>';
			echo '<p>Ranking: ' . $row['ranking'] . '</p>';
			echo '<p>' . $row['description'] . '</p>';
			echo '</div>';
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

	  <h2>Comments</h2>
    <div>
      <h2>Add Comment</h2>
      <form action="select.php" method="POST">
        <input type="hidden" name="movieId" value="1">                    
        <label for="fullName">Name:</label>
        <input type="text" id="fullName" name="fullName" required><br>
        <label for="review">Comment:</label>
        <textarea id="review" name="review" required></textarea><br>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>

<?php
		// Fetch comments for this movie
		$stmt = $db->prepare("SELECT * FROM Review WHERE movieId = :movieId");
		$stmt->bindParam(':movieId', $_GET['movieId']);
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach ($result as $row) {
			echo '<div>';
			echo '<p>' . $row['fullName'] . ' on ' . date('F j, Y', strtotime($row['reviewDate'])) . '</p>';
			echo '<p>' . $row['review'] . '</p>';
			echo '</div>';
		}
	?>

	<h3>Leave a Comment
	</div>
	</body>