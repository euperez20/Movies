

/*******w******** 
    
    Name: Eunice Perez
    Date: February 4,2023
    Description: Module for add comments in each movie review

****************/

   

<!DOCTYPE html>
<html>
<head>
	<title>Movie Reviews</title>
</head>
<body>
<div class="w-75 p-3">
	<h1>Movie Reviews</h1>

	<?php
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
	?>

	<?php
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