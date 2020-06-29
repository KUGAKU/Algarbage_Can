<?php
//３番目

$array = array_map('intval',explode(" ",trim(fgets(STDIN))));
rsort($array);
echo($array[2])."\n";

?>