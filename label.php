<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
//imgの同じ箱の中に呼び出す必要がある PHPMailer を入れる事によって、requireに読み込まれる
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', 'root');
define( 'DB_NAME', 'TECHIS');

//ファイルのアップロード
//これは実際にサーバーに存在するディレクトリを指定する
// define( "FILE_DIR", "images/test/");

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//変数の初期化
//変数$page_flagが、入力ページや確認ページの表示をスイッチするフラグになります。
$page_flag = 0;
//サニタイズ
$clean = array();
//バリデーション
$error = array();

//サニタイズ
if( !empty($_POST) ) {
    foreach( $_POST as $key => $value ) {
        $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
    }
}


//データが含まれていたら、「入力内容を確認するボタン」が押されたことになるので、確認ページへ進めるように$page_flagへ「1」
if( !empty($clean['btn_confirm']) ) {

     // 氏名のバリデーション
     //未入力チェックではempty関数を使って確認を行います。もし入力が無い場合（空の場合)、配列$errorへエラーメッセージを追加。
     if( empty($clean['your_name']) ) {
        $error[] = "「氏名」は必ず入力してください。";

        //mb_strlen関数は、引数で渡した文字列の長さを返します。     
       } elseif( 10 < mb_strlen($clean['your_name']) ) {
          $error[] = "「氏名」は10文字以内で入力してください。";
    }
      
      // メールアドレスのバリデーション
      if( empty($clean['email']) ) {
          $error[] = "「メールアドレス」は必ず入力してください。";

        //この形式のチェックでは「正規表現」を使っているため式が複雑
      } elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $clean['email']) ) {
          $error[] = "「メールアドレス」は正しい形式で入力してください。";

      }

      // パスワードのバリデーション
      // preg_match正規表現
      if( empty($clean['pass']) ) {
          $error[] = "「パスワード」を必ず入力してください。";

      } elseif( !preg_match('/^[a-zA-Z0-9]{6,8}+$/', $clean['pass']) ) {
          $error[] = "ログインパスワードを6文字以上8文字以内で（英数文字含む）ご記入ください。";
      }


      // 電話番号のバリデーション
      if( empty($clean['tel']) ) {
          $error[] = "「電話番号」を必ず入力してください。";
      
        } elseif( !preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $clean['tel']) ) {
            $error[] = "「電話番号」は正しい形式で入力してください。";
        }


      // 生年月日のバリデーション
      if( empty($clean['birthday']) ) {
        $error[] = "「生年月日」は必ず選択してください。";
      }
      
      // 性別のバリデーション
      if( empty($clean['gender']) ) {
          $error[] = "「性別」は必ず選択してください。";
      }
      
      // 血液型のバリデーション
      if( empty($clean['blood']) ) {
          $error[] = "「血液型」は必ず選択してください。";
      }

      // 年齢のバリデーション
      if( empty($clean['age']) ) {
        $error[] = "「年齢」は必ず選択してください。";
      }
      
      // 同意のバリデーション
      if( empty($clean['agreement']) ) {
          $error[] = "プライバシーポリシーをご確認してください。";
      }
    
//確認ページの次の箇所で、次に表示するページを判断しています。  
if( empty($error)){
    //入力エラーが見つからなければ$page_flagに「1」を設定し、エラーがあった場合は「0」のまま
    $page_flag = 1;
 
}

} elseif ( !empty($clean['btn_submit']) ){
    
    //$clean[‘btn_submit’]の値が渡されているか,確認を行います
    //もし受け取っていた場合は、完了ページを表示するために$page_flagへ「2」をセット
    $page_flag = 2;

    $mail = new PHPMailer(true);

    try {
    //Gmail 認証情報
    $host = 'smtp.gmail.com';
    $username = 'aiharataisei8@gmail.com'; // example@gmail.com
    $password = 'taisei-12';

    //差出人
    $from = 'aiharataisei8@gmail.com';
    $fromname = '株式会社TAISEI';

    //宛先
    $to = $_POST['email'];
    $toname = $_POST['your_name'];

    //件名・本文
    $subject = "ご登録ありがとうございます";
    $body = $_POST['your_name']."様" . "\n\n" ."この度は、". "\n" ."お問い合わせ頂き誠にありがとうございます。" . "\n" ."下記の内容でお問い合わせ受付けました。" . "\n" .
            "---------------------------------------" . "\n\n" .  
            "名前：" . $_POST['your_name'] . "\n" . "メールアドレス：" . $_POST['email'] . "\n" . "電話番号：" . $_POST['tel'] ."\n". "生年月日：" . $_POST['birthday'] ."\n\n\n" . 
            "【株式会社TAISEI】 事務局";

    //メール設定
    $mail->SMTPDebug = 0; //デバッグ用
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->setFrom($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->addBCC('aiharataisei8@gmail.com');
    $mail->Subject = $subject;
    $mail->Body    = $body;

    //メール送信
    $mail->send();

    // $eに失敗した理由が入ってくる
    } catch (Exception $e) {

        // エラーメッセージを出力する $e->getMessage()
    
    }
    // [] は配列の意味を表してる
    // $error[] = ""

    // データベースに接続
    // データベースへの接続情報として「ホスト名」「ユーザ名」「パスワード」「データベース名」
    // DB側の型の設定
    $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);


    // 文字コード設定
    // データベースのアクセスに使用する文字コード
    $mysqli->set_charset('utf8');

    // パスワード暗号化   
    // 変数の初期化
    $res = null;

    // デフォルトで最新のPHPのハッシュ化で暗号化してくれる
    $password = password_hash($clean['pass'], PASSWORD_DEFAULT);


    // VALUES 配列内だと文字列のキーが上手く読み取れない、なので、外で宣言した
    $your_name = $clean['your_name'];
    $email = $clean['email'];
    $tel = $clean['tel'];
    $password = $clean['pass'];
    $birthday = $clean['birthday'];
    $gender = $clean['gender'];
    $blood = $clean['blood'];
    $age = $clean['age'];


    // データを登録するSQL作成
    //「INSERT INTO」の後ろにはデータの登録先となるテーブル名「techis」を指定
    // SQL の値は数値以外のデータは「'(シングルクォーテーション)」で囲む必要がある点に注意
    $sql = "INSERT INTO techis (NAME,MAIL,PASSWORD,TEL,BIRTHDAY,GENDER,BLOOD,AGE) 
            VALUES ('$your_name', '$email', '$password','$tel','$birthday','$gender','$blood','$age')";
    $res = $mysqli->query($sql);
   

    $mysqli->close();

    header("Location: ./Login.php");
    
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォームの作成</title>
    <style rel="stylesheet" type="text/css">
    
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
      

    input[type=text] {
        padding: 5px 10px;
        font-size: 100%;
        border: none;
        border-radius: 3px;
        background: #ddf0ff;
    }

    input[name=btn_confirm],
    input[name=btn_back],
    input[name=btn_submit] {
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


    input[type=text]:focus,
    input[type=password]:focus,
    input[type=tel]:focus,
    textarea:focus {
        outline: none;
        color: #003a6c;
        background-color: #FFBEDA;
    }

    input[name=btn_confirm]:hover,
    input[name=btn_submit]:hover {
        background-color: #2ecc71;
    }


    input[name=btn_back] {
	   margin-right: 20px;
	   box-shadow: 0 3px 0 #777;
	   background: #999;
    }

   .element_wrap {
       margin-bottom: 10px;
       padding: 10px 0;
    
       text-align: left;
   }

   label {
       display: inline-block;
       margin-bottom: 10px;
       font-weight: bold;
       width: 150px;
       vertical-align: top;
   }

    label[for=gender_male],
    label[for=gender_female],
    label[for=agreement] {
        margin-right: 10px;
        width: auto;
        font-weight: normal;
    }

    .element_wrap p {
	   display: inline-block;
	   margin:  0;
	   text-align: left;
   }



    textarea[name=content] {
        padding: 5px 10px;
        width: 60%;
        height: 100px;
        font-size: 86%;
        border: none;
        border-radius: 3px;
        background: #ddf0ff;
    }


   .error_message {
	   padding: 10px 30px;
	   color: #ff2e5a;
	   font-size: 86%;
	   text-align: left;
	   border: 1px solid #ff2e5a;
	   border-radius: 5px;
    }

    </style>
</head>
<body>
<header>
    <div>
        <h1>入力画面制作</h1>
    </div>
</header> 

<hr>

<?php if( $page_flag === 1 ): ?>

    <!-- ここに確認ページが入る -->
<form method="post" action="">
    <div class="element_wrap">
        <label>氏名</label>
        <p><?php echo $clean['your_name']; ?></p>
    </div>
    <div class="element_wrap">
        <label>メールアドレス</label>
        <p><?php echo $clean['email']; ?></p>
    </div>
    <div class="element_wrap">
        <label>パスワード</label>
        <p><?php echo $clean['pass']; ?></p>
    </div>
    <div class="element_wrap">
        <label>電話番号</label>
        <p><?php echo $clean['tel']; ?></p>
    </div>
    <div class="element_wrap">
        <label for="age">生年月日</label>
        <p><?php echo $clean['birthday']; ?></p>
    </div>
   
    <div class="element_wrap">
        <label>性別</label>
        <p><?php if( $clean['gender'] === "male"){ echo '男性'; } else { echo '女性'; }?></p>
    </div>
    <div class="element_wrap">
        <label >血液型</label>
        <p><?php if( $clean['blood'] === "1" ){ echo 'A型'; }
        elseif( $clean['blood'] === "2"){ echo 'B型'; }
        elseif( $clean['blood'] === "3"){ echo 'O型'; }
        elseif( $clean['blood'] === "4"){ echo 'AB型'; }?>
    </p>
    </div>
    <div class="element_wrap">
        <label>年齢</label>
        <p><?php if( $clean['age'] === "1" ){ echo '10代'; }
        elseif( $clean['age'] === "2" ){ echo '20代'; }
        elseif( $clean['age'] === "3" ){ echo '30代'; }
        elseif( $clean['age'] === "4" ){ echo '40代'; }
        elseif( $clean['age'] === "5" ){ echo '50代'; }
        elseif( $clean['age'] === "6" ){ echo '60代'; }?></p>
    </div>
    <div class="element_wrap">
        <label>お問い合わせ内容</label>
        <p><?php echo nl2br( $clean['content'] ); ?></p>
    </div>
    <div class="element_wrap">
        <label>プライバシーポリシーに同意する</label>
        <p><?php if( $clean['agreement'] === "1"){ echo '同意する'; }
        else { echo '同意しない'; }?></p>
    </div>

    <!-- 確認ページでは「氏名」「メールアドレス」をそれぞれ「表示用」と「受け渡し用」に分けて出力 -->
    <input type="submit" name="btn_back" value="戻る">
    <input type="submit" name="btn_submit" value="送信">

    <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
    <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
    <input type="hidden" name="pass" value="<?php echo $clean['pass']; ?>">
    <input type="hidden" name="tel" value="<?php echo $clean['tel']; ?>">
    <input type="hidden" name="birthday" value="<?php echo $clean['birthday']; ?>">
    <input type="hidden" name="gender" value="<?php echo $clean['gender']; ?>">
    <input type="hidden" name="blood" value="<?php echo $clean['blood']; ?>">
    <input type="hidden" name="age" value="<?php echo $clean['age']; ?>">
    <input type="hidden" name="content" value="<?php echo $clean['content']; ?>">
    <input type="hidden" name="agreement" value="<?php echo $clean['agreement']; ?>">
</form>

<?php elseif( $page_flag === 2 ): ?>

    <p>送信が完了しました</p>

<?php else: ?>

<?php if( !empty($error) ): ?>
    <ul class="error_message">
    <?php foreach( $error as $value ): ?>
        <li><?php echo $value; ?></li> 
    <?php endforeach; ?>      
    </ul>
<?php endif; ?>  

<form method="post" action="" enctype="multipart/form-data">
	<div class="element_wrap">
        <label>氏名</label>
        <!-- 値の引き継ぎを設定 -->
        <input type="text"  name="your_name" value="<?php if( !empty($clean['your_name'] ) ){ echo $clean['your_name']; } ?>"
         placeholder="山田 太郎" required autofocus >
    </div>
    
	<div class="element_wrap">
        <label>メールアドレス</label>
        <!-- 値の引き継ぎを設定 -->
        <input type="text" name="email" value="<?php if( !empty($clean['email']) ){ echo $clean['email']; } ?>" 
        placeholder="sample@sample.jp" required >
    </div>

    <div class="element_wrap">
        <label>パスワード</label>
        <input type="password" name="pass" inputmode="latin" value="<?php if( !empty($clean['pass']) ){ echo $clean['pass']; }?>" required >
    </div>

    <div class="element_wrap">
        <label>電話番号</label>
        <input type="tel" name="tel" inputmode="tel" placeholder="080-1234-5678" value="<?php if(!empty($clean['tel']) ){ echo $clean['tel']; }?>" required>
    </div>

    <div class="element_wrap">
        <label for="birthday"> 生年月日</label>
        <input type="date" name="birthday" id="birthday" max="9999-12-31" value="<?php if( !empty($clean['birthday']) ){ echo $clean['birthday']; } ?>" required >
    </div>

	<div class="element_wrap">
        <label>性別</label>
        <!-- 値の引き継ぎを設定 -->
        <!-- 「性別」のラジオボタン、チェックボックスに関しては、選択された値である場合はchecked属性を付与して選択状態を引き継ぐ-->
        <!-- データに管理するとき、完璧に型まで一致してないと保存できないから-->
        <label for="gender_male"><input id="gender_male" type="radio" name="gender" value="male" 
           <?php if( !empty($clean['gender'] && $clean['gender'] === "male") ){ echo 'checked'; }?>>男性</label>
        <!-- 値の引き継ぎを設定 -->
        <!-- データに管理するとき、完璧に型まで一致してないと保存できないから-->
        <label for="gender_female"><input id="gender_female" type="radio" name="gender" value="female"
           <?php if( !empty($clean['gender'] && $clean['gender'] === "female") ){ echo 'checked'; }?>>女性</label>
    </div>

    <div class="element_wrap">
        <label for="blood">血液型</label>
        <select name="blood" id="blood">
            <option value="">選択してください</option>
             <!-- 値の引き継ぎを設定 -->
             <!-- 「年齢」のセレクトは選択された値を持つ選択肢にのみselected属性を付与し、選択状態を引き継ぐ-->
             <!-- &&データに管理するとき、完璧に型まで一致してないと保存できないから-->
            <option value="1" <?php if( !empty($clean['blood'] && $clean['blood'] === "1") ){ echo 'selected'; }?>>A型</option>
            <option value="2" <?php if( !empty($clean['blood'] && $clean['blood'] === "2") ){ echo 'selected'; }?>>B型</option>
            <option value="3" <?php if( !empty($clean['blood'] && $clean['blood'] === "3") ){ echo 'selected'; }?>>O型</option>
            <option value="4" <?php if( !empty($clean['blood'] && $clean['blood'] === "4") ){ echo 'selected'; }?>>AB型</option>
        </select>
    </div>
    
	<div class="element_wrap">
		<label for="age">年齢</label>
		<select name="age">
            <option value="">選択してください</option>
            <!-- 値の引き継ぎを設定 -->
            <!-- データに管理するとき、完璧に型まで一致してないと保存できないから-->
			<option value="1" <?php if( !empty($clean['age'] && $clean['age'] === "1") ){ echo 'selected'; }?>>10代</option>
			<option value="2" <?php if( !empty($clean['age'] && $clean['age'] === "2") ){ echo 'selected'; }?>>20代</option>
			<option value="3" <?php if( !empty($clean['age'] && $clean['age'] === "3") ){ echo 'selected'; }?>>30代</option>
			<option value="4" <?php if( !empty($clean['age'] && $clean['age'] === "4") ){ echo 'selected'; }?>>40代</option>
			<option value="5" <?php if( !empty($clean['age'] && $clean['age'] === "5") ){ echo 'selected'; }?>>50代</option>
			<option value="6" <?php if( !empty($clean['age'] && $clean['age'] === "6") ){ echo 'selected'; }?>>60代〜</option>
		</select>
    </div>
    
	<div class="element_wrap">
        <label>お問い合わせ内容</label>
        <!-- 値の引き継ぎを設定 -->
		<textarea name="content"><?php if( !empty($clean['content']) ){ echo $clean['content']; }?></textarea>
    </div>
    
	<div class="element_wrap">
        <!-- 値の引き継ぎを設定 -->
        <!-- データに管理するとき、完璧に型まで一致してないと保存できないから-->
        <label for="agreement"><input id="agreement" type="checkbox" name="agreement" value="1"
        <?php if( !empty($clean['agreement'] && $clean['agreement'] === "1" ) ){ echo 'checked'; }?> required >プライバシーポリシーに同意する</label>
    </div>
    
    <hr>

    <input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>

<?php endif; ?>
</body>
</html>
