<?php

$S = trim(fgets(STDIN));
$day_of_the_week_array = array("SUN"=>7,"MON"=>6,"TUE"=>5,"WED"=>4,"THU"=>3,"FRI"=>2,"SAT"=>1);

echo($day_of_the_week_array[$S])."\n";

?>