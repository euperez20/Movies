<?php

/*******w******** 
    
    Name: Bao Hoang Nguyen 
    Date: January 25, 2023 
    Description: Server-Side User Input Validation

****************/
//function take each input and check for input and validate

function filterInput(){
    $inputs = ['fullname', 'cardname', 'address', 'city', 'email', 'province', 'postal', 'cardnumber', 'cardtype', 'month', 'year'];
    //create variable for each input to check if it is true and set the error to return
    $fullname = false;
    $cardname = false;
    $address = false;
    $city = false;
    $email = false;
    $province = false;
    $postal = false;
    $cardnumber = false;
    $cardtype = false;
    $month = false;
    $year = false;
    $error=true;

    //check each input to see if it is empty or null
    foreach($inputs as $value)
    {
        if(!(isset($_POST[$value]))|| empty($_POST[$value]))
        {
             echo "<h3>Please enter a " . $value . " field!<br></h3>";
        }
        //if there is no empty or null inputs, check the validate and sanitize for each input
        else if(isset($_POST[$value]) && !(empty($_POST[$value])))
        {
            if($value=='fullname')
            {
                $fullname = filter_input(INPUT_POST,'fullname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
            if($value == 'address'){
                $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
   
            if($value == 'city'){
                $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
            if($value == 'email'){
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            }

            if($value == 'province'){
                $province = filter_input(INPUT_POST, 'province', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?:AB|BC|MB|N[BLTSU]|ON|PE|QC|SK|YT)*$/")));

            }
            if($value == 'cardname'){
                $cardname = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
            if($value == 'postal'){
                $$postal = filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9])*$/")));
            }
            if($value == 'cardnumber'){
                if(strlen($_POST['cardnumber']) == 10){
                    $cardnumber = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_NUMBER_INT);
                }
                else{
                    echo "<h3>The Card number is invalid, please enter a 10 digit Card Number!</h3>";
                }        
            }
            if($value == 'cardtype'){
               if(isset($_POST['cardtype']))
               {
                    $cardtype = $_POST['cardtype'];
               }
               else{
                    echo "<h3>Please select a Card type.</h3>";
               }        
            }

            if($value == 'month'){
                if($_POST['month'] <= 12 && $_POST['month'] >= 1){
                    $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_NUMBER_INT);
                }
                else{
                    echo "<h3>The Card is invalid, or expired!</h3>";
                }
            }
            if($value == 'year'){
                if($_POST['year'] >= date('Y') && $_POST['year'] <= (date('Y') + 5))
                {
                    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
                }
                else{
                    echo "<h3>The Card is invalid, or expired!</h3>";
                }
            }

        }
    }
    //if all input are good, set error = false;
    if($fullname == true
    && $cardname == true
    && $address == true
    && $city == true
    && $email == true
    && $province == true
    && $postal == true
    && $cardnumber == true
    && $cardtype == true
    && $month == true
    && $year == true)
    {
        $error = false;
    }

    //return error check
    return $error;
}
// Declared $items hash outside of function block to be referenced throughout the html.
$items = [
    ['Description' => 'iMac', 'Cost' => 1899.99, 'Quantity' => $_POST['qty1']],
    ['Description' => 'Razer Mouse', 'Cost' => 79.99, 'Quantity' => $_POST['qty2']],
    ['Description' => 'WD HDD', 'Cost' => 179.99, 'Quantity' => $_POST['qty3']],
    ['Description' => 'Nexus', 'Cost' => 249.99, 'Quantity' => $_POST['qty4']],
    ['Description' => 'Drums', 'Cost' => 119.99, 'Quantity' => $_POST['qty5']]
    ];

function cartChecker()
{
    $items = [
        ['Description' => 'iMac', 'Cost' => 1899.99, 'Quantity' => $_POST['qty1']],
        ['Description' => 'Razer Mouse', 'Cost' => 79.99, 'Quantity' => $_POST['qty2']],
        ['Description' => 'WD HDD', 'Cost' => 179.99, 'Quantity' => $_POST['qty3']],
        ['Description' => 'Nexus', 'Cost' => 249.99, 'Quantity' => $_POST['qty4']],
        ['Description' => 'Drums', 'Cost' => 119.99, 'Quantity' => $_POST['qty5']]
        ];
    
        // By default, the cost of each item is zero.
        $imacCost = 0;
        $razerCost= 0;
        $WDCost = 0;
        $nexusCost= 0;
        $drumsCost= 0;
        // Checks each item in the hash and determine whether if a quantity is set.
        foreach ($items as $item)
    {
        if($item['Description'] == 'iMac' && isset($item['Quantity']) && $item['Quantity'] > 0)
        {          
            $imac = filter_input(INPUT_POST, 'qty1', FILTER_VALIDATE_INT);
            $imacCost = $item['Cost'] * (int)$_POST['qty1'];          
        }

        if($item['Description'] == 'Razer Mouse' && isset($item['Quantity']) && $item['Quantity'] > 0)
        {          
            $razer = filter_input(INPUT_POST, 'qty2', FILTER_VALIDATE_INT);
            $razerCost = $item['Cost'] * (int)$_POST['qty2'];         
        }

        if($item['Description'] == 'WD HDD' && isset($item['Quantity']) && $item['Quantity'] > 0)
        {          
            $WD = filter_input(INPUT_POST, 'qty3', FILTER_VALIDATE_INT);
            $WDCost = $item['Cost'] * (int)$_POST['qty3'];       
        }

        if($item['Description'] == 'Nexus' && isset($item['Quantity']) && $item['Quantity'] > 0)
        {          
            $nexus= filter_input(INPUT_POST, 'qty4', FILTER_VALIDATE_INT);
            $nexusCost = $item['Cost'] * (int)$_POST['qty4'];            
        }

        if($item['Description'] == 'Drums' && isset($item['Quantity']) && $item['Quantity'] > 0)
        {          
            $drums = filter_input(INPUT_POST, 'qty5', FILTER_VALIDATE_INT);
            $drumsCost = $item['Cost'] * (int)$_POST['qty5'];
        }                   
    }

    // Using global variable so the total cost can be referenced in the html block.
    global $totalCost;

    // $totalCost is then calculated with each item's total cost (Quantity * Cost).
    $totalCost = $imacCost + $razerCost + $WDCost + $nexusCost + $drumsCost;

    // If the total cost is 0, this indicates that no items have been selected and the cart is empty.
    if($totalCost == 0)
    {
        echo "<h3>The Cart is empty!</h3>";
        $totalCost = false;
    }

    return $totalCost;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Thanks for your order!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <?php if(!(filterInput()) && cartChecker()):?>
    <h2>Thanks for your order <?=$_POST['fullname']?>.</h2>
   <h3>Here's a summary of your order:</h3>
   <table>
       <tr>
           <td><h3>Address Information</h3></td>
       </tr>
       <tr>
           <td>Address:</td>
           <td><?= $_POST['address']?></td>
           <td>City:</td>
           <td><?= $_POST['city']?></td>
       </tr>
       <tr>
           <td>Province:</td>
           <td><?= $_POST['province']?></td>
           <td>Postal Code:</td>
           <td><?= $_POST['postal']?></td>
       </tr>
       <tr>
           <td>Email:</td>
           <td><?= $_POST['email']?></td>

       </tr>
   </table>
   <table>
       <tr>
           <td><h3>Order Information</h3></td>
       </tr>
       <tr>
           <td>Quantity</td>
           <td>Cost</td>
           <td>Description</td>
       </tr>
       <?php for($i = 0; $i < count($items); $i++): ?>
                <?php if(isset($items[$i]['Quantity'])&& $items[$i]['Quantity'] > 0): ?>
                    <tr>
                        <td><?= $items[$i]['Quantity']?></td>
                        <td><?=$items[$i]['Cost'] * $items[$i]['Quantity']?></td>
                        <td><?= $items[$i]['Description']?></td>
                        
                    </tr>
                <?php endif ?>
            <?php endfor ?>
            <?php if($totalCost != 0): ?>
                <tr class="alignright">
                    <td colspan="2" class="bold">Totals</td>
                    <td colspan="1">$ <?=$totalCost?></td>
                </tr>
            <?php endif ?>
        </table>
        <?php else: ?>
        <h3> Please return to the form on the previous page! </h3>
    <?php endif ?>
    
</body>
</html>