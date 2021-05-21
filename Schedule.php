
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<p>結果:
<?php

if( isset($_POST['year']) ){

  //$day = $_POST['year'] * 10000 + $_POST['month'] * 100 + $_POST['day'];
  $week = array("日曜日", "月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日");
  
  // mktime関数で引数を月、日、年、指定する
  $timestamp = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
  $weekday = date("w", $timestamp);
  echo $week[$weekday];
}


?>
</p>

<form action="mail.php" method="post">
   <input type="text" name="year">年
   <input type="text" name="month">月
   <input type="text" name="day">日
   <input type="submit" value="送信">
</form>

<p>結果：
  <?php print $res; ?>
</p>
  
</body>
</html>







<?php

//年
$year = 2038;
  
//名前, 月, 週, 曜日（0～6）の順
$holiday = array(
    array("成人の日", 1, 2, 1),
    array("海の日", 7, 3, 1),
    array("敬老の日", 9, 3, 1),
    array("体育の日", 10, 2, 1)
);
 
$datetime = new DateTime();
$datetime->setTimezone( new DateTimeZone('Asia/Tokyo') );
  
foreach($holiday as $value){
    list($name, $month, $week, $wday) = $value;
  
    //その月の始まりは何曜日か
    $datetime->setDate($year, $month, 1);
    $w = (int)$datetime->format('w');
  
    //指定された曜日の最初の日
    $first = ($wday - $w >= 0) ? 1 + $wday - $w : 1 + $wday - $w + 7;
  
    //日にちを算出
    $day  = $first + ( 7 * ($week - 1) );
    $datetime->setDate($year, $month, $day);
  
    echo $name . ': ' . $datetime->format('Y-m-d') . "\n";
}

?>



----------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------

<?php
// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (!empty($_GET['ym'])) { 

     // 押されて中身があれば次月に進む
    $ym = $_GET['ym'];
} else {

    // 今月の年月を表示
    // $_GETで値を持ってない状態の時
    $ym = date('Y-m');
}


//現在日時と2018年7月1日を基準日にしているので問題ありませんが、31日を基準日にした場合にズレが出ます。
//例）７月の前月を取得したい場合
//echo date('Y-m-d', strtotime('2018-07-01 -1 month'));
// 2018-06-01
//echo date('Y-m-d', strtotime('2018-07-31 -1 month'));
// 2018-07-01（6月にならない！） 

//このようなズレが生じないように、このカレンダーでは 1日（その月の最初の日）のタイムスタンプをもとに1ヶ月前の年月を取得しています。
$timestamp = strtotime($ym . '-01');

// タイムスタンプを作成し、フォーマットをチェックする
// GET パラメータが存在しない月だったり（index.php?ym=2019-1111）文字列が入っていたり（index.php?ym=2019-aaa）
// した場合に、エラーが起きないよう形式チェックを追加します。
if ($timestamp === false) {

     // false が返ってきた場合は、現在の年月・タイムスタンプを取得します
    $ym = date('Y-m');
    
}



// 今日の日付 フォーマット 例）2018-07-3
// j : 日付（ゼロなし）
$today = date('Y-m-j');

// カレンダーのタイトルを作成 例）2017年7月
$html_title = date('Y年n月', $timestamp);

// 前月・次月の年月を取得
// 方法１：mktimeを使う mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// 該当月の日数を取得
// t 指定した月の日数
$day_count = date('t', $timestamp);

// １日が何曜日か 0:日 1:月 2:火 ... 6:土
// date関数の第一引数に「曜日」を取得する’w’を指定
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// カレンダー作成の準備
$weeks = [];
$week = '';

// 第１週目：空のセルを追加
// 例）１日が水曜日だった場合、日曜日から火曜日の３つ分の空セルを追加する
// str_repeat関数第一引数の文字列を反復する
// .=（演算子） 上書き保存
$week .= str_repeat('<td></td>', $youbi);

for ( $day = 1; $day <= $day_count; $day++, $youbi++) {

    // 2017-07-3
    $date = $ym . '-' . $day;

    if ($today == $date) {

        // .=（演算子） 上書き保存
        // 今日の日付の場合は、class="today"をつける
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
        $week .= '</td>';

    // 週終わり、または、月終わりの場合
    // 土曜日の場合 $youbi は必ず 6, 13, 20, 27, 34 となるので、7で割った時の余りが 6 になります。
    if ($youbi % 7 == 6 || $day == $day_count) {
      
            // 月の最終日の場合、空セルを追加
            // 例）最終日が木曜日の場合、金・土曜日の空セルを追加
            // 6 - (0.1.2.3... % 7) 7で割った値を6で引き算してセルの穴を埋める
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
            

        // weeks配列にtrと$weekを追加する
        $weeks[] = '<tr>' . $week . '</tr>';

        // weekをリセット
        $week = '';
	}

}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHPカレンダー</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <style>
        .container {
            font-family: 'Noto Sans JP', sans-serif;
            margin-top: 80px;
        }
        h3 {
            margin-bottom: 30px;
        }
        th {
            height: 30px;
            text-align: center;
            background-color: #FFFF44;
            font-weight: 900; 
        }
        td {
            height: 100px;
        }
        .today {
            background-color: #B384FF;
            font-weight: bold;
            font-weight: 1500px;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
            font-weight: 800px; 
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
            font-weight: 800; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <table class="table table-bordered" >
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
    </div>
</body>
</html>

