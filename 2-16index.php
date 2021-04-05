<?php

$testFile = "test.txt";
$contents = "あいはらたいせいです！";

if (is_writable($testFile) ) {

    // 書き込み可能なときの処理
    // 対象のファイルを開く
    $fp = fopen($testFile, "a");

    // 対象のファイルに書き込む
    fwrite($fp,$contents);

    // ファイルを閉じる
    fclose($fp);

    // 書き込みした旨の表示
    echo "finish writable!";
    
}


$test_txt = "test2.txt";

if(is_readable($test_txt) ) {

    // 読み込み可能な時の処理
    // 対象のファイルを開く
    $fp = fopen($test_txt, "r");
    
    // 開いたファイルから1行ずつ読み込む
    while($line = fgets($fp) ) {

        // 改行コード込みで1行ずつ出力
        echo $line.'<br>';
    }

    // ファイルを閉じる
    fclose($fp);
} else {

    // 読み込み不可のときの処理
    echo "not readable";
    exit;
}
?>



<style>
    ul {
        list-style: none;
    }
</style>

<ul>
    <li><br><span style = "border-bottom: solid 3px red; font-size: 16px;">1.CakePHPの2系・3系の違い</span><br>※PHP等のバージョン変更、コンポーザ経由でインストールが楽、デザインがおしゃれ、モデル周りが大幅リニューアル、ModelクラスがTableとEntityの2つに分離された。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.LAMP</span><br>※Linux,Apache,MySQL,PHPで構成された環境。普通にPHPが使える環境。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.AWS</span><br>※Amazon Web Servicesの略。Amazonが提供している100以上のクラウドコンピューティングサービスの総称です。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.クラウドコンピューティング</span><br>※インターネットを介してサーバー・ストレージ・データベース・ソフトウェアといったコンピュータを使った様々なサービスを利用することを指します。<br><br></li>
</ul>
