<?php
//増減管理
$N = intval(trim(fgets(STDIN)));
$A_array = array();
for ( $i=0; $i<$N; $i++ ) {
    array_push($A_array,intval(trim(fgets(STDIN))));
}
for ($i=1; $i<$N; $i++) {

    if ( $A_array[$i-1] < $A_array[$i] ) {
        echo("up");
        echo(" ");
        echo( $A_array[$i]-$A_array[$i-1])."\n";
    }
    else if ( $A_array[$i-1] > $A_array[$i] ) {
        echo("down");
        echo(" ");
        echo( abs($A_array[$i]-$A_array[$i-1]))."\n";
    }
    else if ( $A_array[$i-1] == $A_array[$i] ) {
        echo("stay")."\n";
    }
}
?>