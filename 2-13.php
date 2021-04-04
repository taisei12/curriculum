<?php

// ceil(切り上げ)
    $x = 20.01;
    echo ceil($x);
    echo '<br>';

// floor(切り捨て)
    $x = 99.99;
    echo floor($x);
    echo '<br>';

// round(四捨五入)
    $x = 70.49;
    echo round($x);
    echo '<br>';

// pi(円周率)
    echo pi();
    echo '<br>';
    
    function circleArea($r) {
        $circle_area = $r * $r * pi();
        echo $circle_area; 
    }
    // 半径が2の円の面積の計算
    circleArea(9);
    echo '<br>';

// mt_rand(乱数)
    echo mt_rand(2,70);
    echo '<br>';
    
// 文字列に関する関数
// strlen(文字列の長さ)
    $name = "aiharataisei";
    echo strlen($name);
    echo '<br>';

// strpos(検索)
    $name = "aiharataisei";
    echo strpos($name, "i");
    echo '<br>';
    
// substr(文字列の切り取り)
    $str = "aiharataisei";
    echo substr($str, -6, 4);
    echo '<br>';

// str_replace(置換)
    $name = "aiharataisei";
    echo str_replace("taisei", "TAISEI", $name);
    echo '<br>';

// printf(フォーマット化した文字列を出力)
    $name = "藍原さん";
    $time = 7;
    printf("%s明日朝早いですけど、永田町駅に%d時集合です。絶対遅刻しないでください！", $name, $time);

?>



<style>
    ul {
        list-style: none;
    }
</style>

<ul>
    <li><br><span style = "border-bottom: solid 3px red; font-size: 16px;">1.PostgreSQL</span><br>※リレーショナルデータベースの作成や操作、管理ができるオープンソースのデータベース管理システムの一つ。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.Oracle SQL</span><br>※関係データベース管理システムにおいて、データの定義や操作を行うための言語である。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">3.TortoiseGit</span><br>※Gitはより扱いやすくするために開発されたWindows用ソフトウェアです。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">4.TortoiseSVN</span><br>※Subversionのクライアントフロントエンド（各種入力をユーザーから受け取り、バックエンドが使える仕様に合うようにそれを加工する役目を担う）となるソフトウェアです。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">5.外部設計</span><br>※操作画面や操作方法、データ出力など、ユーザーから見えるインターフェースの部分など、基本的にユーザーに向けた部分の設計を行います。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">6.内部設計</span><br>※外部設計を基に、システム内部の動作や機能、物理データなど、ユーザーから見えにくい詳細な部分の設計を行います。<br></li>
</ul>
