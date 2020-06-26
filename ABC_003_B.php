<?php
//AtCoderトランプ

$S = trim(fgets(STDIN));
$T = trim(fgets(STDIN));
$string_count = strlen($S);

$alternative_string_array = array("a","t","c","o","d","e","r");

for ( $i=0; $i<$string_count; $i++ ) {

    if ( $S[$i] == "@" && in_array($T[$i],$alternative_string_array)) {
        $S[$i] = $T[$i];
    }
    else if ( $T[$i] == "@" && in_array($S[$i],$alternative_string_array)) {
        $T[$i] = $S[$i];
    }
    else if ( $S[$i] == "@" && $T[$i] == "@" ) {
        $S[$i] = "d";
        $T[$i] = "d";
    }

}

if ( $S == $T ) {
    echo("You can win")."\n";
}
else {
    echo("You will lose")."\n";
}

?>