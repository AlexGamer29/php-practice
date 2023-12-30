<?php
$fruits = array("Apple", "Banana", "Orange");
echo count($fruits) . "\n";


$fruits = array("Apple", "Banana", "Orange");
echo $fruits[1] . "\n";

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Ben is " . $age["Ben"] . " years old.";


foreach($age as $x => $y) {
    echo "Key=" . $x . ", Value=" . $y;
}

$colors = array("red", "green", "blue", "yellow"); 
sort($colors);
rsort($colors);
asort($age);
?>