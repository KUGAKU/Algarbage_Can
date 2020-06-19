<?php
//深さ優先探索

list($H, $W) = array_map('intval', explode(" ",trim(fgets(STDIN))));
$map_info_array = [];
$start_position_high  = 0;
$start_position_width = 0;
$goal_position_high   = 0;
$goal_position_width  = 0;
for ( $i=1; $i<=$H; $i++ ) {
    $map_info_array[$i] = str_split((trim(fgets(STDIN))));
    array_unshift($map_info_array[$i],"");
    unset($map_info_array[$i][0]);
    if ( in_array("s",$map_info_array[$i],true) ) {
        $start_position_width = array_search("s",$map_info_array[$i],);
        $start_position_high  = $i; 
    }
    if ( in_array("g",$map_info_array[$i],true) ){
        $goal_position_width = array_search("g",$map_info_array[$i],);
        $goal_position_high  = $i;
    }
}

//深さ優先探索実装
$stack = new SplStack();
$stack_element = [$start_position_high,$start_position_width];
//最初の探索候補点の追加
$stack->push($stack_element);

$flag = false;

while( !$stack->isEmpty() ) {

    //スタックに最後に追加したノードを取得
    $node = $stack->pop();
    //探索場所取得
    $current_high  = $node[0];
    $current_width = $node[1];

    //東西南北（上下左右）のマスの状態確認
    for ( $h=-1; $h<=+1; $h++ ) {
        for ( $w=-1; $w<=+1; $w++ ) {

            if ( $current_high+$h < 1 || $current_high+$h > $H ) {
                continue;
            }
            if ( $current_width+$w < 1 || $current_width+$w > $W ) {
                continue;
            }

            //現在地の上下左右（東西南北）の位置を取得
            $up_down_y    = $current_high+$h; 
            $left_right_x = $current_width+$w;

            //斜めの場合はスキップ
            if ( abs($w*$h)==1 ) {
                continue;
            }
            //対象が壁の場合はスキップ
            if ( $map_info_array[$up_down_y][$left_right_x] == "#" ) {
                continue;
            }
            //既に通っていたらスキップ
            if ( $map_info_array[$up_down_y][$left_right_x] == "~" ) {
                continue;
            }
            //通過可能マスの場合プッシュ
            if ( $map_info_array[$up_down_y][$left_right_x] == "." ) {
                //通過可能マスを塗りつぶす
                $map_info_array[$up_down_y][$left_right_x] = "~";
                $stack_element = [$up_down_y,$left_right_x];
                $stack->push($stack_element);
            }
            if ( $map_info_array[$up_down_y][$left_right_x] == "g" ) {
                $flag = true;
            }
        }
    }
}
if ( $flag ) {
    echo("Yes")."\n";
}
else {
    echo("No")."\n";
}
?>