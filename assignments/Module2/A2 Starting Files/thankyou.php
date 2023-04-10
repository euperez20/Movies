<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: January 25, 2023
    Description: Validation to Order Form

****************/

 

function validationForm(){
    $regexp = '/[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d/';    
    $regexp_email = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';    
    $regexp_card = '/^\d{10}$/';  
    
    $Validation_msg = array();
    
  

    
    // Validation Email    
    if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){    
        $Validation_msg[] = "Enter a valid email";    
    }
    
 
    // Validation Postal Code    
    if(!filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regexp)))){
        $Validation_msg [] = "Enter a valid Postal Code";
    
    }
    
      
    // Validation Full Name    
    if(empty($_POST['fullname'])){    
        $Validation_msg [] = "Enter your Full Name";
    }
        
    // Validation Address    
    if(empty($_POST['address'])){    
        $Validation_msg[]  = "Enter your Address";
    
    }
    
     
    
    // Validation City    
    if(empty($_POST['city'])){    
        $Validation_msg [] = "Enter your City";
    
    }
     
    // Validation Province    
    if(empty($_POST['province']) || !in_array($_POST['province'], array('AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'))){
        $Validation_msg [] = "Select a valid Province";
    
    }
     
    //Validation Card type       
    $card_type = array('visa', 'mastercard', 'amex');    
    if(empty($_POST['cardtype']) && !in_array($_POST['cardtype'], $card_type )){
        $Validation_msg [] = "Select a Card Type";
    }       
    
    // Validation Card Number    
    if(!preg_match($regexp_card, $_POST['cardnumber']) ){
        $Validation_msg [] = "Enter a valid Card Number";
    
    }
        
    
    // Validation Card Month
    
    $cardmonth = $_POST['month'];    
    $cardyear = $_POST['year'];
     
    if($cardmonth >= 1 && $cardmonth <= 12){
    
    }else{
        $Validation_msg[]  = "Enter a valid Card Month";
    }
    
    // // Validation Card Year
    $currentYear = date('Y');
    if($cardyear >= $currentYear && $cardyear <= ($currentYear+5)){

    }else{
        $Validation_msg [] = "Enter a valid Card Year";
    
    }
    
     if(count($Validation_msg) > 0){
    
       foreach($Validation_msg as $error){    
            echo $error . "<br>";    
        }
    
    }else{  
       
    }
    
     return $Validation_msg;
    }
    
    
    ?>
    
     
    
    <!DOCTYPE html>
    <html lang="en">    
    <head>    
        <meta charset="UTF-8">    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="Formstyle.css">    
        <title>Thanks for your order!</title>
    
    </head>
    
    <body>
    
        <!-- Remember that alternative syntax is good and html inside php is bad -->
    
        <div id="wrapper"> 
       

            <?php if(empty(validationForm())): ?>

                <p><h1>Thanks for your order <?= $_POST['fullname']  ?></h1></p>
                <p><h2>Here's a summary of your order:</h2></p>
                    
                <form id="order" action="https://www.stungeye.com/school/webdev/thankyou.php" method="post">
                <table>
                    <td><h2>Client Information</h2></td>
                
                    <tr>
                       <td>Name:</td>
                       <td><?=$_POST['fullname'] ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?=$_POST['address']?></td>  
                    </tr>
    
                    <tr>
                        <td>Province:</td>
                        <td><?=$_POST['province']?></td>
                    </tr>
    
                    <tr>
                        <td>City:</td>
                        <td><?=$_POST['city']?></td>
                    </tr> 
    
                    <tr>
                        <td>Postal Code:</td>
                        <td><?=$_POST['postal']?></td>
                    </tr>
    
                    <tr>
                        <td>Email:</td>
                        <td><?=$_POST['email']?></td>
                    </tr>
    
                    <table>
                        <tr>
                            <td><h2>Order Information</h2></td>
                            
                        </tr>
                    </table>



                    <?php endif ?>
    
                </table>
    
                </form>

        </div>     
    
    </body>
    
    </html>