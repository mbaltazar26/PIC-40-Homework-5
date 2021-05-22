#!/usr/local/bin/php
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> HW 5 </title>
        <meta charset="UTF-8">
    </head>
    
    <style>
        table {border-collapse:collapse;}
    </style>

    <body> 
        <?php
            // ngl this is kind of a mess but ummm I tried 
            // brain go brrrrr
            // antidepressants go brrrrr

            //getting the value of x from the query string 
   			$x = $_GET['x'];

            // keeps adding to and returning an array of integers until $x=1
            function actualMathPart($x, $xrows=array())
            {
            	$arrayPass = $xrows;	// in this house, we do not directly use parameters
            	if ($x == 1) 
                {
                	$arrayPass[]=$x;    // add x to the array
                	return $arrayPass;  // return the whole array because $x=1
                }
                else if ($x%2 == 0)        //$x is even and does not equal 1
                {
                    $arrayPass[]=$x;        // add x to the array
                    $x = $x/2;              // set the next x to x/2
                    actualMathPart($x, $arrayPass);     // one more time, passing the array and the new x
                }
                else                       // $x is odd and does not equal 1
                {
                    $arrayPass[] = $x;      // add x to array
                    $x = (3*$x)+1;          // set x equal to 3x+1
                    actualMathPart($x, $arrayPass);     // one more time, passing the array and new x
                }
            }

            function printyprint($xrows)        //recieves an array
            {
            	$passedArray = $xrows;          // in this house, we do not directly use parameters
                $num = count($passedArray);     // how many things are in count?
            	echo "<table>";                 // set the table, kids 
            	echo "<tr>";                    // new row
                echo "<th>Iteration</th>";      // bold 
                echo "<th>x</th>";              // bold
            	echo "</tr>";                   // end row
                for($i = 0; $i < $num; $i++)    // should run as many times as the number of elements $xrows has
                {
                	echo "<tr>";                                   // new row
                    $place = $i+1;                               // instead of printing 0th place, should be 1st place
                    echo "<td>", $place, "</td>";               // prints i+1
                    echo "<td>", $passedArray[$i]; "</td>";     // prints element at i
                    echo "</tr";                                // end row
                }
                echo "</table>";                 // clear the table, kids
            }

            $xrows = actualMathPart($x);        // the whole array created by actualMathPart() is stored in $xrows, starting with x from sq
            printyprint($xrows);                // prints all of xrows... or at least it should >:(

        ?>
    </body>

</html>