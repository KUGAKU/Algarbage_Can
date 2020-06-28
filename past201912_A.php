<?php

$S = trim(fgets(STDIN));
if ( preg_match("/^[0-9]+$/", $S))  {
    echo($S*2)."\n";
    exit;
}
else {
    echo("error")."\n";
    exit;
}

?>