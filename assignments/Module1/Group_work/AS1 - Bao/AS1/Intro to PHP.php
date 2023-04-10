<?php

/*******w******** 
    
    Name: Bao Hoang Nguyen
    Date: Jan 20 2023
    Description: Create gallery

****************/

$config = [

    'gallery_name' => 'AS1 Gallery',
 
    'unsplash_categories' => ['Lion','Nature','Street','Winter'],
 
    'local_images' => ['image1'=>["Lowes Takes Photos","lowestakesphotos"],'image2'=>["Radu Lin","rrradu"],'image3'=>["Richard Stachmann","stachmann"],'image4'=> ["Abdul Haseeb
","haseeb4543"]]
 
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Assignment 1</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
<div id="gallery">
    <h1><?= $config['gallery_name'] ?></h1>
<?php foreach ($config['unsplash_categories'] as $value): ?>
<h2> <?= $value  ?></h2>
<img src="https://source.unsplash.com/300x200/?<?= $value?>" alt="<?= $value ?> image">
<?php endforeach ?>
</div>

<div id="large-images">
    <h1><?= count($config['local_images']) . " Large Images" ?></h1>
<?php foreach($config['local_images'] as $value => $name): ?>
    <img src="images/<?= "{$value}.jpg" ?>" alt="<?= $name[0] ?>">
    <h3 class="photographer"><a href = "https://unsplash.com/<?= "@{$name[1]}" ?>"><?= $name[0] ?></a></h3>


    <?php endforeach?>

</div>




</body>
</html>