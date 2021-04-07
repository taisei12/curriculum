<?php 

//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['your_name'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
$question = $_POST['question'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];

$answer = $_POST['answer'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];

// 結果の判定
if($question === $answer) {
    $result = "正解！";

} else {
    $result = "残念・・・";
}

// 結果の判定
if($question2 === $answer2) {
    $result2 = "正解！";

} else {
    $result2 = "残念・・・";
}

// 結果の判定
if($question3 === $answer3) {
    $result3 = "正解！";

} else {
    $result3 = "残念・・・";
}

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

    </style>
</head>
<body>
    <p><?php echo $name;?>さんの結果は・・・？</p>

    <p>①の答え</p>
       <?php echo $result; ?>

    <p>②の答え</p>
       <?php echo $result2; ?>

    <p>③の答え</p>
       <?php echo $result3; ?>
    
</body>
</html>
