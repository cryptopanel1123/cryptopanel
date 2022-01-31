<?php
  $con=mysqli_connect("localhost","root","","cryptopanel");
  date_default_timezone_set('Asia/Kolkata');    
  $string=json_decode('{"0":"BTCUSDT","1":"ETHUSDT","2":"BNBUSDT","3":"XRPUSDT","4":"SOLUSDT","5":"DOTUSDT","6":"ADAUSDT","7":"LUNAUSDT","8":"SHIBUSDT","9":"DOGEUSDT"}');
  while(true){
    set_time_limit(0);
    foreach($string as $coin){
        $response=file_get_contents("https://api.binance.com/api/v3/ticker/price?symbol=$coin");
        echo $response."!".$cur_time=date('h:i:s').mysqli_error($con)."<br>";
        $response=json_decode($response,JSON_OBJECT_AS_ARRAY);
        $price=$response['price'];
        mysqli_query($con,"update prices set $coin = $price,last_update = '$cur_time' where id = 1;");
    }
      echo "<br>####################################<br>";
      flush();
      ob_flush();
  }
  
?>