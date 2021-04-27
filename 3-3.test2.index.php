
<?php 

// セッション開始
session_start();

$db['host'] = "localhost"; // DBサーバのURL
$db['user'] = "root";      // ユーザー名
$db['pass'] = "root";      // ユーザー名のパスワード 
$db['dbname'] = "YIGrorupBlog";     // データベース名

// エラーメッセージ、登録完了メッセージの初期化
$ErrorMessage = "";
$SignUpMessage = "";

// ログインボタンが押された場合
if( !empty($_POST['signUp']) ) {

    // 1.ユーザーIDの入力チェック
    // 値がからの時
    if( empty($_POST['your_name']) ) {
        $ErrorMessage = 'ユーザー名が未入力です。';
    }
    // パスワード入力チェック
    if( empty($_POST['password']) ) {
        $ErrorMessage = 'パスワードが未入力です。';

    } else if ( empty($_POST['password2']) ) {
        $ErrorMessage = 'パスワードが未入力です。';

    }

    // 入力されたユーザー名とパスワードが正しければ次へ
    if( !empty($_POST['your_name']) && !empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] === $_POST['password2']) {
        // 入力したユーザー名とパスワードを格納
        $yourname = $_POST['your_name'];
        $password = $_POST['password'];
        
        // 2.入力したユーザー名とパスワードが入力されていたら認証する
        // 「$dsn」とは、 データベースに接続するために必要な情報です． (Data Source Name)
        // 頭にデータベース名を指定して : で区切る 
        // sprintf関数「%s」は文字列「%d」は数値
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3.エラー処理
        try {

            // PDO::setAttribute — 属性を設定する。(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION))
            // PDO::ERRMODE_EXCEPTION を設定すると例外をスローしてくれる．SQL実行でエラーが起こった際にどう処理するかを指定します。これを選択しておくのが一番無難．
            // 例外スローとは、 例外が発生した時にエラーに適切に対処し、プログラムを停止させないようにすることを例外処理という。
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            // 「prepare」とは、SQL文に理解できるように文字変換にする
            $stmt = $pdo->prepare("INSERT INTO user(name, password) VALUES(? , ?)");

            // 今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない
            // 多次元配列で入力値を受け取る
            $stmt->execute(array($yourname, password_hash($password, PASSWORD_DEFAULT)));

            // 「lastinsertid関数」PDOオブジェクトに備わっている関数です。 INSERT文の後に、自動的に割り振られたIDの番号を取得できます。
            // 登録した（DB側でauto_incrementした）IDを$useridに代入する
            $userid = $pdo->lastinsertid();

            $SignUpMessage = '登録が完了しました。あなたの登録IDは'. $userid .'です。パスワードは'. $password .'です。';

        } catch (PDOException $e) {
            $ErrorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();

        }

    } else if($_POST['password'] != $_POST['password2']) {
        $ErrorMessage = 'パスワードに誤りがあります。';
    }


}
?>


<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>新規登録</title>
    </head>
    <style>
    legend {
        font-weight: bold;
    }
    
    </style>
    <body>
        <h1>新規登録画面</h1>
        <form name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($ErrorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#0000ff"><?php echo htmlspecialchars($SignUpMessage, ENT_QUOTES); ?></font></div>
                <label for="your_name">ユーザー名</label><input type="text"  name="your_name" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["yourname"])) {echo htmlspecialchars($_POST["yourname"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" name="signUp" value="新規登録">
            </fieldset>
        </form>
    </body>
</html>
