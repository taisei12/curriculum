<?php

$name = $_POST['your_name'];

// この変数は配列ですよという宣言
$question = array(); 

$question = array(80,22,20,21);
$question2 = array("HTML","Python","JAVA","PHP");
$question3 = array("select","join","insert","update");

// 正解の問題を設定
// $question変数の一番最初の配列を予め正解というルールにしておくと後々管理しやすい
$answer = $question[0];
$answer2 = $question2[0];
$answer3 = $question3[0];

// 配列の中身をシャッフル
shuffle($question);
shuffle($question2);
shuffle($question3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body {
            background: #808080;
            text-align: center;
            color: #FFFFFF;
            font-family: serif;
        }
        * {
            margin: 0;
            padding: 0;
        }
        h2 {
            font-size: 22px;
            margin: 15px 0;
        }
        p {
            padding: 40px 0 0 0;
        }
        input[type="submit"] {
            padding: 3px;
            border-radius: 4px;
            border: 1px solid;
            font-size: 5px;
            cursor: pointer;
            outline: none;
        }
        input[type="submit"]:hover {
            background-color: #808080;
        }

    </style>
</head>
<body>
    <p>お疲れ様です<?php echo $name; ?>さん</p>

    <form method="POST" action="2-18answer.php">
        
      <h2>①ネットワークのポート番号は何番？</h2>
          <?php foreach($question as $value): ?>
              <label><input type="radio" name="question" value="<?php echo $value; ?>"><?php echo $value;?></label>
          <?php endforeach; ?>
          <input type="hidden" name="answer" value="<?php echo $answer;?>">

      <h2>②Webページを作成するための言語は？</h2>
          <?php foreach($question2 as $value): ?>
              <label><input type="radio" name="question2" value="<?php echo $value; ?>"><?php echo $value;?></label>
          <?php endforeach; ?>
          <input type="hidden" name="answer2" value="<?php echo $answer2;?>">

      <h2>③MySQLで情報を取得するためのコマンドは？</h2>
          <?php foreach($question3 as $value): ?>
              <label><input type="radio" name="question3" value="<?php echo $value; ?>"><?php echo $value;?></label>
          <?php endforeach; ?>
          <input type="hidden" name="answer3" value="<?php echo $answer3;?>">

          <br>

          <input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
          <input type="submit" value="回答する">
      
    </form>

</body>
</html>
