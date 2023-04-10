<?php

/*******w******** 
    
    Name: Eunice Perez
    Date: January 25, 2023
    Description: Validation to Order Form

****************/

// Data entry

    $validate_msg = "";
    $regexp = '/[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d/';
    $regexp_card = '/^\d{10}$/';
    $cardType = "";


    if (empty($_POST['fullname'])) {
        $validate_msg = "Enter your name";
    }

    if (empty($_POST['address'])) {
        $validate_msg = "Enter your address";
    }

    if (empty($_POST['city'])) {
        $validate_msg = "Enter your city";
    }

    // Validate email address
    if (!preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $_POST['email'])) {
        $validate_msg = "Enter a valid email";
    }

    // Validate Canadian postal code
    if (!filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regexp)))) {
        $validate_msg = "Enter a valid Postal Code";
    }

    // Validate Province

    if (empty($_POST['province']) || !in_array($_POST['province'], array('AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'))) {
        $validate_msg = "Select a valid Province";
    }

    // Validate Card Type 
    $cardType = $_POST['cardtype'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($cardType)) {
            $validate_msg = "Select a Valid Card Type";
        } else {
            $cardType = $_POST['cardtype'];
        }
    }


    // Validate Card Number
    $cardNumber = $_POST['cardnumber'] ?? '';
    if (!preg_match($regexp_card, $cardNumber)) {
        $validate_msg = "Enter a valid Card Number 2";
    }

    // Validate Card Month
    if (filter_input(INPUT_POST, 'cardmonth', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 12)))) {
        $validate_msg = "Enter a valid Card Month";
    }

    // Validate Card Year
    $actualYear = date('Y');
    if (filter_input(INPUT_POST, 'cardyear', FILTER_VALIDATE_INT, array("options" => array("min_range" => $actualYear, "max_range" => $actualYear + 5)))) {
        $validate_msg = "Enter a valid Card Year";
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="validate.css">
        
        <title>Thanks for your order!</title>
    </head>
    <body>
        <!-- Remember that alternative syntax is good and html inside php is bad -->
           
        <div id="wrapper">
        <h4><?= $validate_msg ?></h4>
        </div>
       

    </body>
</html>



        