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

//２進数化
$squared = pow(2,$n);
$binary_number = decbin($squared-1);
var_dump($binary_number);

for ( $i=0; $i<$squared; $i++ ) {

    
}

?>