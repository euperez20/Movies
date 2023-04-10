<?php

/*******w******** 
    
    Name: Socorro Eunice Perez
    Date: January 20, 2023
    Description: Program to display image gallery from a source

****************/

$config = [

    'photo_gallery' => 'Inspiration Gallery',
 
    'unsplash_categories' => ['Travel','Nature','Animals','Food-Drink'],
 
    'local_images' => ['segerfredo','ascalaphe','jfhawke','mnelen']    
];
$href = 'https://unsplash.com/@';


$photographer = [
    [
        'name' => 'Frederik Rosar',
        'image' => 'segerfredo',
        'site' => 'segerfredo'
    ],

    [
        'name' => 'Nicolas Houdayer',
        'image' => 'ascalaphe',
        'site' => 'ascalaphe'
    ],

    [
        'name' => 'Jason Hawke 🇨🇦',
        'image' => 'jfhawke',
        'site' => 'jfhawke'
    ],

    [
        'name' => 'Anastasia Nelen',
        'image' => 'mnelen',
        'site' => 'mnelen'
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
            <h1><?php echo $config['photo_gallery']; ?></h1>

    <!-- Small Images loop  -->
        <div class="tour-images"> 

            <?php foreach($config['unsplash_categories'] as $category): ?>

                <div class=small_img>

                <h2><?php echo $category; ?></h2> 

                <img src="https://source.unsplash.com/300x200/?<?php echo $category; ?>" alt="images">  
                
            </div>  

            <?php endforeach; ?>

        </div>

    <!-- Large images configuration -->
    <h1><?php echo  sizeof($config['local_images']).' Large Images'; ?></h1>  
        
        <?php foreach($photographer as $photo): ?>
            
            <img src="images/<?php echo $photo['image']; ?>.jpg" alt="<?php echo $photo['image']; ?>">

            <?php echo "<p><a href='" . $href . $photo['site'] ."'>" . $photo['name'] . "</a></p>"; ?>
            
        <?php endforeach; ?>     
    
</body>
</html>