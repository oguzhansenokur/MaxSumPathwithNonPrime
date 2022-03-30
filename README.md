# MaxSumPathwithNonPrime
This is php solution of the Dynamic Programming question which walk by cursor to the max numbers as possible as with non prime numbers 
*true case: greater number and not prime  , smaller number(not prime) if greater number is prime, both number is prime*. 

input file:file.txt
## Parameters and Functions
$fileData: it is a function which get datas from 'file.txt' line by line.
check_prime($param): it is function that returns true if $param is prime, otherwise returns false.
steps($array,$x,$y): it is function that walk downside with checking the conditions for *true case*.
$cursor: it is an array which holds current coordinatex. (indexes "x" and "y")
$holderCurs: it is an array which holds current coordinates for the changing position.
$input: takes input array.

