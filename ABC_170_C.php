<?php

list($x, $n) = array_map('intval',explode(" ",trim(fgets(STDIN))));
$p_array     = array_map('intval',explode(" ",trim(fgets(STDIN))));

if ( $n == 0 ) {
    echo($x)."\n";
    exit;
}

//初期化
$abs_array     = [];

//絶対値配列の作成
for ( $i=0; $i<$n; $i++ ) {
    array_push($abs_array,abs($x-$p_array[$i]));
}


//最小の絶対値の探索と当該値の取得
$min_value = (min($abs_array));
$min_index = array_search($min_value,$abs_array);

$answer;
//当該値に最も近い値の取得

$i=$p_array[$min_index];
$d=$p_array[$min_index];

while( true ) {

    if ( !in_array($d,$p_array) ) {
        $answer = $d;
        echo($answer)."\n";
        break;
    }
    if ( !in_array($i,$p_array) ) {
        $answer = $i;
        echo($answer)."\n";
        break;
    }
    if ( in_array($d,$p_array) && in_array($i,$p_array) ) {
        $d--;
        $i++;
        continue;
    }

}

?>