<?php
//ABC_C問題
//Otoshidama

list($N,$Y) = array_map('intval',explode(" ",trim(fgets(STDIN))));

for ( $i=0; $i<=$N; $i++ ) {
    for ( $j=0; $j<=$N; $j++ ) {
        $k = $N - ($i+$j);
        $value = $i*10000+$j*5000+$k*1000;
        if ( $k < 0 ) {
            continue;
        }
        //var_dump($value);
        if ( $value == $Y ) {
            echo ($i);
            echo (' ');
            echo ($j);
            echo (' ');
            echo ($k)."\n";
            exit;
        }
    }
}
echo (-1);
echo (' ');
echo (-1);
echo (' ');
echo (-1)."\n";
?>