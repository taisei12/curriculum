<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <linkrel="stylesheet" href="">
  <style>

      body {
          background: #808080;
          text-align: center;
      }
      * {
          margin: 0;
          padding: 0;
      }
      hr{
          border-width: 2px;
          border-color: #FFFFFF;
      }
      h1{
          margin-top: 100px;
          color: #FFFFFF;
          font-size: 30px;
          font-family: serif;
      }
      input {
          margin: 40px 0;
          float: center;
      }
      input[type="text"] {
          padding: 3px 0;
      }
      input[type="submit"] {
         padding: 3px;
         font-size: 12px;
         font-family: arial unicode ms;
         border-radius: 4px;
         border: 1px solid;
         outline: none;
      }
      input[type="submit"]:hover {
            background-color: #808080;

      }

   </style>
</head>
<body>
    <h1>2章チェックテスト</h1>

    <hr>
    <!--名前を入力してquestion.phpに移動するフォームを作成-->
    <form method="POST" action="2-18question.php">
        <input type="text" name="your_name" placeholder="名前を入力してください">
        <input type="submit" name="btn_submit" value="テスト開始">
    </form>

</body>
</html>
