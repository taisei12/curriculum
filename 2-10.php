<?php


function getVolumearea($length,$width,$height) {
    $area = $length * $width * $height;
    echo "直方体の体積は".$area."です。".'<br>';
}

getVolumearea(5,10,8);



echo '<br>'."1.ハッシュ化"."<br>";
echo "※値をハッシュ関数に入れてハッシュ値に変換すること"."<br>"."<br>";
echo "2.総合テスト"."<br>";
echo "※システム開発におけるプログラムの検証作業の中でも、
       構築したシステムが全体として予定通りの機能を満たしているかどうかを確認するテスト。
       開発者側の最終テスト。"."<br>"."<br>";
echo "3.デバッグ"."<br>";
echo "※プログラム内のバグを見つけて改修する作業です。
       バグを見つけ期待値が返ってくるように改善すること。"."<br>";


?>