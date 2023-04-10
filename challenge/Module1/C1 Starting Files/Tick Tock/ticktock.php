<?php
    /*******w******** 
        
        Name: Eunice Perez
        Date: 13/01/2023
        Description: Program to print 100 Number and change Multiples of 3 and 5 for the words tick tock

    ****************/

    for($x = 1;$x <= 100;$x++){ 
      if ($x % 3 == 0 && $x % 5 == 0) {
        echo "<p>TickTock\n</p>"; } 
      elseif ($x % 3 == 0) {
        echo "<p>Tick\n</p>"; }                 
      elseif ($x % 5 == 0) { 
        echo "<p>Tock\n</p>"; } 
      else { echo "<p>$x\n</p>"; } } ?>