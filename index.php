<!DOCTYPE html>
<html>
<body>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$fileData = function() {
    $file = fopen(__DIR__ . '/file.txt', 'r');

    if (!$file)
        die('file does not exist or cannot be opened');

    while (($line = fgets($file)) !== false) {
        yield $line;
    }
    fclose($file);
};

function check_prime($num)
{
   if ($num == 1)
   return false;
   for ($i = 2; $i < $num; $i++)
   {
      if ($num % $i == 0)
      return false;
   }
   return true;
}

function steps($arr,$x,$y)
{
//a=x+1,y
//b=x+1,y+1
if(check_prime($arr[$x+1][$y])==true && check_prime($arr[$x+1][$y+1])==true)
{
    return array("x"=>-1,"y"=>-1);
}
if($arr[$x+1][$y]>$arr[$x+1][$y+1] && check_prime($arr[$x+1][$y])==false)
{
    return array("x"=>$x+1,"y"=>$y);
}
if($arr[$x+1][$y]>$arr[$x+1][$y+1] && check_prime($arr[$x+1][$y])==true)
{
    if(check_prime($arr[$x+1][$y+1])==false)
    {
        return array("x"=>$x+1,"y"=>$y+1);
    }
}
if($arr[$x+1][$y+1]>$arr[$x+1][$y] && check_prime($arr[$x+1][$y+1])==false)
{
    return array("x"=>$x+1,"y"=>$y+1);
}
if($arr[$x+1][$y+1]>$arr[$x+1][$y] && check_prime($arr[$x+1][$y+1])==true)
{
    if(check_prime($arr[$x+1][$y])==false)
    {
        return array("x"=>$x+1,"y"=>$y);
    }
}
}

$sumCount=0;
$cursor=array("x"=>0,"y"=>0);
$holderCurs;
$input=array(

// array(215),
// array(193 ,124),
// array(117, 237 ,442),
// array(218 ,935, 347, 235),
// array(320 ,804, 522, 417, 345),
// array(229, 601, 723, 835, 133, 124),
// array(248, 202 ,277, 433, 207 ,263 ,257),
// array(359, 464, 504, 528 ,516 ,716, 871 ,182),
// array( 461, 441, 426 ,656, 863 ,560, 380, 171, 923),
// array(381, 348, 573, 533, 447, 632, 387 ,176, 975, 449),
// array( 223, 711, 445, 645, 245, 543 ,931 ,532, 937 ,541, 444),
// array(330 ,131, 333, 928, 377 ,733 ,17 ,778, 839, 168, 197, 197),
// array( 131, 171, 522, 137, 217, 224, 291 ,413, 528 ,520 ,227, 229, 928),
// array(223, 626, 034, 683, 839, 053, 627,310 ,713 ,999 ,629 ,817, 410, 121),
// array(924, 622, 911 ,233 ,325 ,139 ,721 ,218, 253, 223, 107, 233, 230 ,124 ,233)
);

foreach ($fileData() as $line) {
    $lineArr=explode(" ",$line);
    array_push($input,$lineArr);
}
//print_r(firstStep($input,$cursor["x"],$cursor["y"]));
// while($cursor["x"]<5 && $cursor["y"]<3)
// {
// echo $input[$cursor["x"]][$cursor["y"]];
// $holderCurs=firstSteps($input,$cursor["x"],$cursor["y"]);
// $cursor=$holderCurs;
// }
// $holderCurs=steps($input,$cursor["x"],$cursor["y"]);
// $cursor=$holderCurs;
// echo $input[$cursor["x"]][$cursor["y"]];
// $holderCurs=steps($input,$cursor["x"],$cursor["y"]);
// $cursor=$holderCurs;
// echo $input[$cursor["x"]][$cursor["y"]];
// $holderCurs=steps($input,$cursor["x"],$cursor["y"]);
// $cursor=$holderCurs;
// echo $input[$cursor["x"]][$cursor["y"]];

$i=1;
$case=1;
$sum=0;
while( $cursor["x"]!=-1 && $cursor["y"]!=-1)
{   
    $holderCurs=steps($input,$cursor["x"],$cursor["y"]);
    echo"step&nbsp;".$i.":&nbsp;". $input[$cursor["x"]][$cursor["y"]];
    echo "<br>";
    $sum+=$input[$cursor["x"]][$cursor["y"]];
    $cursor=$holderCurs;
    $i++;
}
echo "total:" .$sum;
?>

</body>
</html>
