<?php
//Use string functions for all the examples!
//Complete the code and run it. All output should
//be  numbered with the question, and skip lines
//in the output between questions.
// Post your completed
//code to BB (attach a file), and upload your completed
//php script, putting
//the URL into the comments section on BB

$haystack = "<title> PHP Coding </title>";
$needle = "<title>";
//1. print the position of the $needle in $haystack


$newneedle = "</title>";
//2. print the position of $newneedle in $haytack



//3. How long is the title in $haystack? Print the length
//between the end of the open <title> tag and the beginning
//of the close title tag!

//let us look at a DNA example
$haystack = "ACAAGACACATGCCACATTGTCC";
$needle = "ACA";

//4. print out the number of times $needle
//occurs (nonoverlapping) in haystack
//TT occurs once in TTT!


//5. Print out the number of time $needle occurs in 
//$haystack. Count overlapping examples as well!
//so TT occurs two times in TTT, for example!

$subject = "Cloud computing works!";

//6. Print out the $subject with
//all  letter 'o' replaced with the letter 'e'

$subject = "Keep your    spacing   perfect!";
//7. print out $subject where replace any two 
//spaces in a row '  ' with a - and
// any single space ' ' with a *
//so the example above prints
//Keep*your--spacing-*perfect!";

$string = "red orange yellow green blue indigo violet";

//8. create an array that has the colors of the above string
//in reverse order (so $colors[0] is 'violet')
//You might need the array_reverse function
//look it up on php.net


//9. Print out the newly created array in the new order using
//foreach, in UPPER CASE

//Extra Credit!
$personalize = "Joe;Sally;Jim;Sue;Alex;Maria";
$name = strtok($personalize,';');

//Extra Credit 1! Use a loop and strtok
//to print out a message to each person in the 
//$personalize string above that says
//Welcome back $name! Good to see you today!

//Extra Credit 2! Do the same as above, but not using 
//strtok function

?>
