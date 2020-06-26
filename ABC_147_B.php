<?php
//Palindrome-philia

$S = trim(fgets(STDIN));
$S_middle_index = strlen($S)/2;

$exchange_count = 0; 
//奇数時
if ( strlen($S)%2 == 1 ) {
    for ( $i=0; $i<strlen($S); $i++ ) {
        if ( $S_middle_index-1 == $i ) {
        break;
        }
        if ( $S[$i] != $S[strlen($S)-1-$i]  ) {
            $S[strlen($S)-1-$i] = $S[$i];
            $exchange_count = $exchange_count + 1;
        }
    }
}
//偶数時
else {
    for ( $j=0; $j<strlen($S); $j++ ) {
        if ( $S_middle_index == $j ) {
            break;
        }
        if ( $S[$j] != $S[strlen($S)-1-$j]  ) {
            $S[strlen($S)-1-$j] = $S[$j];
            $exchange_count = $exchange_count + 1;
        }
    }

}

echo($exchange_count)."\n";

?>