<?php
$i = 1; 

while ($i < 6) 
{
  echo $i . "\n";
  $i++;
}

do {
  echo $i;
  $i++;
} while ($i < 6);


for ($i = 0; $i < 10; $i++) {
  echo $i . "\n";
}

$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $x) {
  echo $x;
}
?>