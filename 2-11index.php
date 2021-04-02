<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/960d122e5c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>


<style>

* {
  margin:0; padding:0;
}

.information {	
	position: relative;
	width: 27.33%;
	margin: 40px 3%;
}
.information input[type='text'] {
	font: 15px/24px sans-serif;
	box-sizing: border-box;
	margin: 0 auto;
	width: 100%;
	padding: 0.3em;
	padding-left: 40px;
	letter-spacing: 1px;
	border: 0;
}
.information input[type='text']:focus {
	outline: none;
}
.information input:focus+i {
	color: #FF4F50;
}
.information i {
	position: absolute;
	top: 0;
	left: 0;
	padding: 9px 5px;
	transition: 0.3s;
	color: #000080;
}
.information::after {
	display: block;
	width: 100%;
	height: 4px;
	margin-top: -1px;
	content: '';
	border-width: 0 1px 1px 1px;
	border-style: solid;
	border-color: #000080;
}
input[name=btn_confirm] {
	margin-top: 10px;
	margin-bottom: 30px;
    padding: 5px 20px;
    font-size: 100%;
    color: #fff;
    cursor: pointer;
    border: none;
    border-radius: 3px;
    box-shadow: 0 3px 0 #999999;
    background: #000080;
	outline: none;
}
input[name=btn_confirm]:hover {
	background-color: #008080;
}
.btn {
    padding-left: 140px; 
}


li {
    font-size: 14px;
    padding: 0 35px;
}

</style>


<body>

<form method="post" action="2-11result.php">	
	<div class="information">
	    <input type="text"  name="your_name"  placeholder="NAME">
	    <i class="fas fa-user fa-lg fa-fw" name="your_name" aria-hidden="true"></i>
	</div>
	
    <div class="information">
	    <input type="text" name="email" placeholder="E-Mail">
	    <i class="fas fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
	</div>
	
	<div class="information">
		<input type="text" name="pass" size="30" placeholder="Password 6文字以上8文字以内">
		<i class="fas fa-lock fa-lg fa-fw"> </i>
	</div>
    <div class="btn">
        <input type="submit" name="btn_confirm" value="送信">
    </div>
</form>

<ul>
    <li><br><span style = "border-bottom: solid 3px red; font-size: 16px;">1.仕様書</span><br>※主にユーザーとの仕様確認を目的に、業務の整理やデータ、画面レイアウトなどの「枠組み」を設計する作業。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">2.設計書</span><br>※詳細設計はプログラマへの説明向けにロジックなどの具体的な肉付けを行う作業。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">3.Git</span><br>※プログラムのソースコードなどの変更履歴を記録・追跡するための分散型バージョン管理システム。<br><br></li>
    <li><span style = "border-bottom: solid 3px red; font-size: 16px;">4.マージツール</span><br>※MDLファイル中のマップ式をテキスト形式で記述したファイル「マップ式ファイル」に主力する機能。<br></li>
</ul>

</body>
</html>
