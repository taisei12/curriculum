<?php


function getVolumearea($length,$width,$height) {
    $area = $length * $width * $height;
    echo "直方体の体積は".$area."です。".'<br>';
}

getVolumearea(5,10,8);


for($i = 0; $i <= 50; $i++) {

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

    
?>
