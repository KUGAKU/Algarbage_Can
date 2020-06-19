<?php

/*
$m : アルゴリズムの数
$n : 参考書の数
$x : アルゴリズムの目標理解度値
*/ 

$two_dimensional_array = [];
list($n, $m, $x) = array_map('intval',explode(" ",trim(fgets(STDIN))));

for ( $i=1; $i<=$n; $i++ ) {
    $work_array = [];
    $work_array = array_map('intval',explode(" ",trim(fgets(STDIN))));
    for ( $j=0; $j<=$m; $j++ ) {
        $two_dimensional_array[$i][$j] = $work_array[$j];
    }
}

$squared = pow(2,$n);
$count = count(str_split(decbin($squared-1)));

$understanding_sum_array = [];
$book_array = [];
$min_value_array = [];

for ( $i=0; $i<$squared; $i++ ) {
    for ( $j=0; $j<$count; $j++ ) {
        //各bitとのbit演算結果の取得
        if ( $i>> $j & 1 == 1 ) {
            //購入する参考書の選択
            array_push($book_array,$two_dimensional_array[$j+1]);
        }
    }
    for ( $k=0; $k<count($book_array); $k++ ) {
        //購入した参考書で得られる理解度を確認
        for ( $l=0; $l<count($book_array[$k]); $l++ ) {
            if ( $k==0 ) {
                $understanding_sum_array[] = $book_array[$k][$l];;
            }
            else {
                $understanding_sum_array[$l] = $understanding_sum_array[$l] + $book_array[$k][$l];
            }
        }
    }
    if ( count($understanding_sum_array) != 0 ) {
        if ( min($understanding_sum_array) >= $x ) {
            array_push($min_value_array,$understanding_sum_array[0]);
        }
    }
    $understanding_sum_array = array();
    $book_array = array();
}

if ( count($min_value_array) != 0 ) {
    echo(min($min_value_array))."\n";
}
else {
    echo(-1)."\n";
}

?>