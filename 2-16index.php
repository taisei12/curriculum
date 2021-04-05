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
    
if (is_readable($test_txt)) {
    // 読み込み可能なときの処理
    // 対象のファイルを開く
    $fp = fopen($test_txt, "r");
    // 開いたファイルから1行ずつ読み込む
    while ($line = fgets($fp)) {
        // 改行コード込みで1行ずつ出力
        echo $line.'<br>';
    }
    // ファイルを閉じる
    fclose($fp);
} else {
    // 読み込み不可のときの処理
    echo "not readable!";
    exit;
} 
?>