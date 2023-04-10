<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: January 23, 2023
    Description:

****************/

// Data entry
$validate_msg = "";
$regexp = '/[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d/';


// Validation Postal Code
function filterinput(){
    return filter_input(INPUT_POST, $_POST['postal'], FILTER_VALIDATE_REGEXP);
}

// Validate Add Mac
// function filterinput(){
//     return filter_input(INPUT_POST, 'qty1', FILTER_VALIDATE_INT);
//     }

//     if(filterinput()): 
//         $_POST['qty1']

// if(empty($_POST['qty1'])){
//     $validate_msg = "Please, enter a Quantity Product";
// }

if(empty($_POST['fullname'])){
    $validate_msg = "Enter your name";
}

if(empty($_POST['address'])){
    $validate_msg = "Enter your address";
}

if(empty($_POST['city'])){
    $validate_msg = "Enter your city";
}

// Validate Postal code 
if(filterinput() == false):   
    $validate_msg = "Enter a valid postal code";  
    

    
    
    // (empty($_POST['postal'])){  


endif;

if(!preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $_POST['email'])){
        $validate_msg = "Enter a valid email";
} 







// if(!filterinput()){
//     $validate_msg = "Enter a valid Postal Code";
// }

// function filterinput(){
//     return filter_input(INPUT_POST, $_POST['cardnumber'], FILTER_VALIDATE_INT);
// }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="validation.css">
    <title>Thanks for your order!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <h4><?= $validate_msg ?></h4>
    </div>
    
</body>
</html>