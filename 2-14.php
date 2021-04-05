<?php

// count(要素の数を数える)
   $string = ["matuoka", "moriya", "aihara", 3, 8,1];
   echo count($string);
   echo '<br>';

// sort(要素の並べ替え)
   $members = ["matuoka", "moriya", "aihara", 3, 8,1];
   sort($members);
   var_dump($members);
   echo '<br>';

// in_array(配列に中にある要素が存在しているか)
// in_array(調べたい文字もしくは数値, 対象の配列)
   $members = ["matuoka", "moriya", "aihara", 3, 8,1];
   var_dump(in_array("tanaka", $members));
   echo '<br>';
   var_dump(in_array("aihara",$members));
   echo '<br>';

// このin_arrayはif文の条件でよく使用します。 
   $name = ["ino", "sakurai", "matumoto", "aihara", "gakiya"];
   if (in_array("aihara", $name)) {
       echo "昨晩家出したよ！";
   } else {
       echo "昨日は家にいたよ！";
       
   }
   echo '<br>';

// implode(配列を結合して文字列に変換)
   $members = ["Aihara", "Taisei", 1998,"/", 11,"/", 9];
   $taisei = implode($members);
   var_dump($taisei);
   echo '<br>';
   echo '<br>';


// explode(文字列を指定の区切りで配列にする)
   $members = ["Aihara", "Taisei", 1998,"/", 11,"/", 9];
   $atstr = implode("@", $members);
   var_dump($atstr);
   echo '<br>';

   $re_members = explode("@", $atstr);
   var_dump($re_members);
?>


<style>
    ul {
        list-style: none;
    }
</style>

<ul>
    <li><br><span style = "border-bottom: solid 3px red; font-size: 16px;">1.要件定義</span><br>※システム開発などのプロジェクトを始める前の段階で、必要な機能や要求をわかりやすくまとめていく作業。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.単体テスト</span><br>※プログラムを構成する比較的小さな単位、関数やメソッドが個々の機能を正しく果たしているかどうかを検証するテスト。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.結合テスト</span><br>※単体で動作するようになったコンポーネント（単体の部品など）を組み合わせることで、実際に動作する状態に近いソフトウェアの挙動を確認します。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">3.テスト仕様書</span><br>※システムやソフトウェアが、クライアントのヒアリングを基に作り上げた要件定義書の通りに機能するかどうか、テストするポイントをまとめたドキュメント。<br><br></li>
</ul>
