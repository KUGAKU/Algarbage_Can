<?php
//Minor Change

$S = trim(fgets(STDIN));
$T = trim(fgets(STDIN));

$t_str_count = strlen($T);
$exchange_count = 0;
for ( $i=0; $i<$t_str_count; $i++ ) {
    if ( $S[$i] != $T[$i] ) {
        //$S[$i] = $T[$i];
        $exchange_count++;
    }   
}

echo($exchange_count)."\n";

?>