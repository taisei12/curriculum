<?php

$fruits = ["apple"=>"りんご","orange"=>"みかん","peache"=>"もも"];


foreach ($fruits as $key => $value) {

    echo $key."といったら".$value.'<br>';
    
}





echo '<br>'."1.トランザクション"."<br>";
echo "※結果の整合性が要求される、複数の処理を1つにまとめたもの"."<br>"."<br>";
echo "2.排他ロック"."<br>";
echo "※共有資源(データやファイル)を、複数人が同時に変更できないようにする仕組み。"."<br>"."<br>";
echo "3.チューニング"."<br>";
echo "※ITの分野では、情報システムやコンピュータ、ソフトウェアなどの設定や構成を調整し、目標の状態に近づけたり、性能を最大限引き出したりする作業を指す。"."<br>";




?>