
<?php



for($i = 0; $i <= 100; $i++) {

   if($i % 5 === 0 && $i % 3 === 0){
       echo "FizzBuzz!".'<br>';
   } elseif ($i % 5 === 0){
       echo "Buzz!".'<br>';
   } elseif ($i % 3 === 0){
       echo "Fizz!".'<br>';
   } else {
       echo $i.'<br>';
   }

} 


echo '<br>'."1.パフォーマンス"."<br>";
echo "※ITでは、コンピュータの処理性能や実行速度、通信回線の速度・容量のことを指す。"."<br>"."<br>";
echo "2.スロークエリ"."<br>";
echo "※データベースにおいて、時間のかかっているSQL(遅いSQL)のことをスロークエリと呼ぶ。"."<br>"."<br>";
echo "3.クエリログ"."<br>";
echo "※クエリログは、クライアントからの MySQL Server への接続・接続解除の情報、
       およびクライアントから実行された全ての SQL クエリを出力してくれるログです。
       SQL 実行エラーが発生した際に、
       どのような SQL が実行されたのかを正確に把握するのに役に立ちます。"."<br>";



?>
