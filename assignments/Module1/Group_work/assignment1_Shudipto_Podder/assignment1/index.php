<?php

/*******w******** 
    
    Name:Shudipto Podder
    Date:20/1/2023
    Description: Creating a gallery with different types with the pictures and the name of the photographers and their links are given below the designated picture.

****************/

$config = [

    'gallery_name' => 'Adventure Gallery',
 
    'unsplash_categories' => ['travel','journey','hiking','top','skating'],

    'local_images' => [
    'Travel.jpg' =>['name'=>'Goran Backman', 'url'=>'https://unsplash.com/@backmango'],
    'journey.jpg' =>['name'=>'Matt Howard', 'url'=>'https://unsplash.com/@thematthoward'], 
    'hiking.jpg' =>['name'=>'Toomas Tartes', 'url'=>'https://unsplash.com/@toomastartes'], 
    'top.jpg' =>['name'=>'Oziel Gomez', 'url'=>'https://unsplash.com/@ozgomz'],
    'skating.jpg' =>['name'=>'Niket Nigde', 'url'=>'https://unsplash.com/@nikofwest'],

]
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
    <h1><?= $config['gallery_name'] ?></h1>
    <div id="gallery">
        <?php
        foreach ($config['unsplash_categories'] as $adventure): ?>
            <div>
                <h2><?= $adventure ?></h2>
              
               <img src="https://source.unsplash.com/300x200/?<?= $adventure ?>" alt="<?= $adventure ?> image">
            </div>
        <?php endforeach ?>
    </div>

    <h1><?= count($config['local_images']) ?> LARGE IMAGES </h1>
    <div id="large-images">
        <?php 
        foreach ($config['local_images'] as $image => $Photographer){
        echo '<img src="images/'.($image).'" alt="image">';
        echo '<p> <a href="'.($Photographer['url']).'">'.($Photographer['name']).'</a></p>';
    }
     ?>
        
    </div>
    
</body>
</html>