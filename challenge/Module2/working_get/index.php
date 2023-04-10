<?php 

/*******w******** 
    
    Name: Eunice Perez
    Date: January 23, 2023
    Description: Practice working with GET

****************/

$animal = filter_input(INPUT_GET, 'animal', FILTER_SANITIZE_STRING);
$count = filter_input(INPUT_GET, 'count', FILTER_VALIDATE_INT);


if ($count < 1 || $count > 20){
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
    <title>Animals</title>
</head>

<body>
    <?php if($animal == null):?>
        <p>Sorry <?=$animal?> is not supported by our system.<br> Try one of these possible queries:</p>
    <?php else:?>
        <ol>
            <p><?= $count?></p>
        <?php for($i = 0; $i < $count; $i++): ?>
        <li> <img src="images/<?=$animal ?>.jpg" alt="<?= $animal?>">  </li>
        <?php endfor ?>

    </ol>

    <?php endif?> 

</body>

</html>