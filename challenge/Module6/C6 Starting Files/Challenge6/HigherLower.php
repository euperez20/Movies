<?php

    /*******w******** 
        
        Name: Eunice Perez
        Date:March 23, 2023
        Description: Program to guess a number

    ****************/
    
    session_start();
   
    define("RANDOM_NUMBER_MAXIMUM", 100);
    define("RANDOM_NUMBER_MINIMUM", 1);

    $user_submitted_a_guess = isset($_POST['guess']);
    $user_requested_a_reset = isset($_POST['reset']);
   
    // Implement the guessing game logic here.

    if (!isset($_SESSION['random_number'])) {
        $_SESSION['random_number'] = rand(RANDOM_NUMBER_MINIMUM, RANDOM_NUMBER_MAXIMUM);
    }

    if ($user_submitted_a_guess) {
        $user_guess = $_POST['user_guess'];
        $random_number = $_SESSION['random_number'];
   
        if ($user_guess > $random_number) {
            echo "Your guess is too high, guess a lower number.";
        } else if ($user_guess < $random_number) {
            echo "Your guess is too low, guess a higher number.";
        } else {
            echo "You guessed the number!!! you are the best!! ";
            echo "Would you like to play again? If yes, click reset botton";            
        }
    }
   
    if ($user_requested_a_reset) {
        unset($_SESSION['random_number']);
        session_regenerate_id(true);
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Number Guessing Game</title>
</head>
<body>
    <h1>Guessing Game</h1>

    <p>You can play with me guessing a number:</p>
   
    <form method="post">
        <label for="user_guess">Your Guess</label>
        <input id="user_guess" name="user_guess" autofocus>
        <input type="submit" name="guess" value="Guess">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>

