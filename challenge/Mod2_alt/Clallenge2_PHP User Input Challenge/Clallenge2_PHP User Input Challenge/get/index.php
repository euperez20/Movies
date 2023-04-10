<?php

// Get animal and count from GET parameters
$animal = filter_input(INPUT_GET, 'animal', FILTER_SANITIZE_STRING);
$count = filter_input(INPUT_GET, 'count', FILTER_VALIDATE_INT);

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
    <title>Get Animals</title>
</head>
<body>

    <?php if($animal === null):?>
        <p>Sorry <?=$animal?> is not supported by our system.<br> Try one of these possible queries:</p>

    <?php else:?>
        <p><?= $count?></p>
        <ul>   
        <?php for($i = 0; $i < $count; $i++): ?>
        <li> <img src="images/<?=$animal  ?>.jpg" alt="<?= $animal?>">  </li>

        <?php endfor?>
    </ul>
    <?php endif?>

</body>
</html>
