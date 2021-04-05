<?php


define("GOAL",40);
$total = 0;

for($i = 1; $i <= GOAL; $i++) {
    $n = rand(1,6);
    $total += $n;
    echo "{$i}回目 = {$n}";
    echo '<br>';

    if($total >= GOAL) {
        echo "合計{$i}回でゴールしました。";
        echo '<br>';
        echo '<br>';
        echo '<br>';
        break;
    }
}


?>


<?php

date_default_timezone_set('Asia/Tokyo');

$time = intval(date('H'));


if(4 <= $time && $time <= 12) {
    echo "おはようございます！";

} elseif (12 <= $time && $time <= 20) {
    echo "こんにちは！";

} else {
    echo "こんばんは！";
    

}

?>

