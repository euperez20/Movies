<?php

/*******w******** 
    
    Name: Socorro Eunice Perez
    Date: January 20, 2023
    Description: Program to display image gallery from a source with Javascript Responsive Lightbox 

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
    <title>Assignment 1 - Lightbox</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.0.1/luminous-basic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.0.1/Luminous.min.js"></script>

</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->   

    <!-- Large images configuration -->
    <h1><?php echo  sizeof($config['local_images']).' Large Images'; ?></h1>  
        
        <?php foreach($photographer as $photo): ?>
            
            <a href="images/<?php echo $photo['image']; ?>.jpg">
            <img src="images/<?php echo $photo['image']; ?>_thumbnail.jpg" alt="<?php echo $photo['image']; ?>">
            </a>            
            
        <?php endforeach; ?>     
 
    <script>
        new LuminousGallery(document.querySelectorAll("a"));
    </script>

</body>
</html>