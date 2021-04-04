
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォームの作成</title>
    <style>
    
    body {
        padding: 20px;
        text-align: center;
        background-color: #336699; 
        color: #ddf0ff;
    }
    h1{
        font-size: 25px;
        font-weight: bold;
        margin: 0;
        text-align: center;
    }
    header{
       margin-top: 30px;
       color: white;
    }
    hr{
       border-width: 3px;
       border-color: white;
    }
    .element_wrap {
       margin-bottom: 10px;
       padding: 10px 0 10px 5px;
       text-align: left;
    }
    label {
       display: inline-block;
       margin-bottom: 10px;
       font-weight: bold;
       width: 150px;
       vertical-align: top;
    }
    input[type=text] {
        padding: 5px 10px;
        font-size: 100%;
        border: none;
        border-radius: 3px;
        background: #ddf0ff;
    }
    input[name=btn_confirm] {
        margin-top: 10px;
        padding: 5px 20px;
        font-size: 100%;
        color: #fff;
        cursor: pointer;
        border: none;
        border-radius: 3px;
        box-shadow: 0 3px 0 #2887d1;
        background: #4eaaf1;
        outline: none;   
    }
    input[type=text]:focus {
        outline: none;
        color: #003a6c;
        background-color: #FFBEDA;
    }
    input[name=btn_confirm]:hover {
        background-color: #2ecc71;
    }
    ul {
        text-align: left;
        list-style: none;
    }

    </style>
</head>

<body>
<header>
    <div>
        <h1>大会景品情報</h1>
    </div>
</header> 

<hr>

<form method="post" action="2-12result.php" enctype="multipart/form-data">
	<div class="element_wrap">
        <label>氏名:</label>
        <input type="text"  name="your_name" placeholder="山田 太郎" required autofocus >
    </div>
    
	<div class="element_wrap">
        <label>ご希望商品:</label>
        <input type="radio" name="gift" value="A賞">A賞
        <input type="radio" name="gift" value="B賞">B賞
        <input type="radio" name="gift" value="C賞">C賞
    </div>

    <div class="element_wrap">
        <label>個数:</label>
        <select name="count">
            <option value="">選択してください</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>

    <hr>

    <input type="submit" name="btn_confirm" value="申込">
</form>

<ul>
    <li><br><span style = "border-bottom: solid 3px red; font-size: 16px;">1.モジュール</span><br>※主にユーザーとの仕様確認を目的に、業務の整理やデータ、画面レイアウトなどの「枠組み」を設計する作業。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.バージョン管理システム</span><br>※詳細設計はプログラマへの説明向けにロジックなどの具体的な肉付けを行う作業。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">3.サブクエリ</span><br>※プログラムのソースコードなどの変更履歴を記録・追跡するための分散型バージョン管理システム。<br><br></li>
</ul>
</body>

</html>
