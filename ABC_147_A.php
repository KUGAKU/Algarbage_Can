<?php

//Blackjack
list($A1,$A2,$A3) = array_map('intval',explode(" ",trim(fgets(STDIN))));

if ($A1+$A2+$A3 >= 22 ) {
    echo("bust")."\n";
}
else {
    echo("win")."\n";
}
?>