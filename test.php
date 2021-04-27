<?php

// 外部ファイルを読み込む
// 作成したdb_connect.phpを読み込む
require_once('3-2db_connect.php');

// この変数の値を変えれば、インサートされるデータが変わるようにしたいと思います。
$view_name = 'Shou Sakurai';
$message = 'sakurai';
$DATE = '2021-04-24';

// 実行したいSQL文を準備
// VALUES (:name, :message, :DATE) まだ何の値がはいるか分からないけど、とりあえず場所だけ確保しておく
$sql = "INSERT INTO message (view_name, message, post_date) VALUES (:name, :message, :DATE)";
// 関数db_connect()からPDOを取得する
$pdo = db_connect();
try {

    // prepareというPDOのメソッドを呼ぶ。引数で渡された指示（SQL文）をMySQLに分かる形に変換します。
    // 「プリペアドステートメント」 と呼ぶ。変換した文を一旦変数に格納します。
    $stmt = $pdo->prepare($sql);

    // このプリペアドステートメントを作成したタイミングで値をバインド(固定)する
    $stmt->bindParam(':name', $view_name);
    $stmt->bindParam(':message', $message);
    $stmt->bindparam(':DATE', $DATE);

    // 命令を実行するためにはexecuteを使用します。
    $stmt->execute();
    echo 'インサートしました。';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}

?>
