<?php
/***************** 
 * AtCoder 「ABC007」
 * C問題「幅優先探索」
*/


/*
行数・列数
スタート地点Y座標・スタート地点X座標
ゴール地点Y座標・ゴール地点X座標
*/
list($row,$column)                   = array_map('intval',explode(" ",trim(fgets(STDIN))));
list($start_y_point, $start_x_point) = array_map('intval',explode(" ",trim(fgets(STDIN))));
list($end_y_point, $end_x_point)     = array_map('intval',explode(" ",trim(fgets(STDIN))));

//迷路情報の取得と作成
for ( $i=1; $i<=$row; $i++ ) {
    $maze_info[$i] = str_split(trim(fgets(STDIN)));
    array_unshift($maze_info[$i],"");
    unset($maze_info[$i][0]);
}

//キューを生成
$queue = new SplQueue();
//スタート地点（根ノード）の座標を格納
$queue_element = [$start_y_point,$start_x_point];
$queue->enqueue($queue_element);

$path_count;

$maze_info[$start_y_point][$start_x_point] = 0;

while( !$queue->isEmpty() ) {

    //キューの先頭から探索対象ノードを取得
    $node = $queue->dequeue();
    //当該座標取得
    $current_y = $node[0];
    $current_x = $node[1];

    $path_count = $maze_info[$current_y][$current_x];

    for ( $y=-1; $y<=+1; $y++ ) {
        for ( $x=-1; $x<=+1; $x++ ) {

            //当該座標に対する上下左右の座標を探索
            $up_down_y    = $current_y+$y; 
            $left_right_x = $current_x+$x;

            //斜めの場合はスキップ
            if ( abs($x*$y)==1 ) {
                continue;
            }
            //壁の場合はスキップ
            if ( $maze_info[$up_down_y][$left_right_x] == "#" ) {
                continue;
            }
            //深さが数値で挿入されていればスキップ
            if ( $maze_info[$up_down_y][$left_right_x] != "#" && $maze_info[$up_down_y][$left_right_x] != ".") {
                continue;
            }
            //通過可能な道の場合は深さを代入
            if ( $maze_info[$up_down_y][$left_right_x] == "." ) {
                $maze_info[$up_down_y][$left_right_x] = $path_count+1;

                $queue_element = [$up_down_y,$left_right_x];
                $queue->enqueue($queue_element);
            }

        }
    }
}

echo($maze_info[$end_y_point][$end_x_point])."\n";

?>