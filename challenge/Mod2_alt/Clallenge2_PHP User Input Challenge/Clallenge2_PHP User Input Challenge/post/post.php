<?php

// Get animal and count from POST parameters
$animal = filter_input(INPUT_POST, 'animal', FILTER_SANITIZE_STRING);
$count = filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT);

// Set default count if not provided or not a valid integer
if ($count < 1 || $count > 20) {
    $count = 1;
}

// Limit animal to specific options
$allowedAnimals = array('dog','fish','bird');
if (!in_array($animal, $allowedAnimals)) {
    $animal = null;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Animals</title>
</head>
<body>
<h1>Animals</h1>
<form method="post">
    <label for="count">Count:</label>
    <input type="number" id="count" name="count" min="1" max="20">
    <label for="animal">Animals:</label>
    <select id="animal" name="animal">
        <option value="dog">Dog</option>
        <option value="fish">Fish</option>
        <option value="bird">Bird</option>
    </select>
    <input type="submit" value="Submit">
</form>

<?php if($animal === null):?>
    <p>Sorry <?=$animal?> is not supported by our system.<br> Try one of these possible queries:</p>

<?php else:?>
    <ul>
        <p><?= $count?></p>
        <?php for($i = 0; $i < $count; $i++): ?>
            <li> <img src="images/<?=$animal  ?>.jpg" alt="<?= $animal?>">  </li>
        <?php endfor?>
    </ul>
<?php endif?>

</body>
</html>
