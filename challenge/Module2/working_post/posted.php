<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: January 23, 2023
    Description: Practice working with POST

****************/


$animal = filter_input(INPUT_POST, 'animal', FILTER_SANITIZE_STRING);
$count = filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT);

if ($count < 1 || $count > 20) {
    $count = 1;
}

// Limit animal to specific options
$allowedAnimals = array('emu','giraffe','turkey');
if (!in_array($animal, $allowedAnimals)) {
    $animal = null;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Animals Images Selection</title>
</head>
<body>
    <h1>Animals Images Selection</h1>
    <form method="post">
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" min="1" max="20">
        <p>
            <label for="animal">Animal:</label>    
            <select id="animal" name="animal">
                <option value="emu">Emu</option>
                <option value="giraffe">Giraffe</option>
                <option value="turkey">Turkey</option>
            </select>
            <input type="submit" value="Submit">
        </p>
    </form>
    
        <ol>
            <p><?= $count?></p>
            <?php for($i = 0; $i < $count; $i++): ?>
                <li><img src="images/<?=$animal ?>.jpg" alt="<?= $animal?>"></li>
            <?php endfor?>
        </ol>    

</body>
</html>
