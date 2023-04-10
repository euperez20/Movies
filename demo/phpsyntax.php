<?php
    /* PHP Intro Demo
        Showing the basics of php syntax
        January 6th 2023
    */

        //Good ol' Hello World
        echo "<p>Hello World</p>";

        // Variables
        $cats = 13;
        $cat_feet = $cats * 4;
        $feet_story = "Once there were " . $cat_feet . " cat feet in our kitchen.";

        echo $feet_story;
        $my_int = 12;
        $my_float = (float) $my_int; //Casting to a float
        unset($my_int);  // Equivalent to setting to NULL
        if(!isset($my_int) && is_float($my_float)){
            echo "<p>All is well</p>";
        }

        // Constants
        define("THE_ANSWER", 42);
        define("FULL_NAME", "Eunice Perez");
        echo "<p>" . FULL_NAME . " knows the answer: " . THE_ANSWER . "</p>";

        // Strings
$name = "Bobby McGee";
$fancy_string = "My name is {$name}.<br />";
$plain_string = 'My name is {$name}.<br />';

echo $fancy_string;
echo $plain_string;

$fancy_string .= "<p>Our name is " . strlen($name) . "characters long.</p>";

echo $fancy_string;

// Arrays
$numbers = [1, 2, 3];
$to_do_list = ["finish marking", "play video game", "cook supper"];

$to_do_list[] = "practice taxidermy"; // add one item to the array
echo "<p>Eunice, {$to_do_list[3]} now!</p>";
echo "<p>There are " . count($to_do_list) . " items in our array.</p>";

// Print_r
$numbers = "4,8,15,16,23,42,50,66,78,99";
$dharma_hatch = explode(",", $numbers);
print_r($dharma_hatch);
foreach($dharma_hatch as $hatch){
    echo "<p>Now press {$hatch}</p>";
}

// Functions
function say_good_day($name){
    echo "<p>A find day indeed, {$name}!</p>";
}
say_good_day(10);
say_good_day("Bobby McGee");

?>