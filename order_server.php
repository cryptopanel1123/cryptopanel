<?php
    date_default_timezone_set("Asia/Kolkata");
    $con=mysqli_connect("localhost","root","","cryptopanel");
    while(true){
        set_time_limit(0);
        $prices=mysqli_query($con,"select * from prices where id = 1");
        $prices=mysqli_fetch_array($prices,MYSQLI_ASSOC);
        $result=mysqli_query($con,"select * from orders");
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            if((strtotime(date("Y-m-d H:i:s"))-strtotime($row['placed_at']))>=86400){
                mysqli_query($con,"delete from orders where id = $id");
            }else{
                if($row['incline']==1){
                    if($row['price']>=$prices[$row['coin']."USDT"]){
                        resolve_order($row['buy_sell'],$row['total'],$row['coin'],$row['uid'],$row['id']);
                    }
                }else if($row['incline']==0){
                    if($row['price']<=$prices[$row['coin']."USDT"]){
                        resolve_order($row['buy_sell'],$row['total'],$row['coin'],$row['uid'],$row['id']);
                    }
                }else{
                    if($row['price']<$prices[$row['coin']."USDT"]){
                        mysqli_query($con,"update orders set incline=1 where id=".$row['id']);
                    }else if($row['price']>$prices[$row['coin']."USDT"]){
                        mysqli_query($con,"update orders set incline=0 where id=".$row['id']);
                    }
                }
            }
        }
    }
function resolve_order($buy_sell,$total,$coin,$uid,$id){
    GLOBAL $con;
    $result=mysqli_query($con,"select assets from portfolio where uid=$uid");
    $result=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $assets=json_decode($result['assets'],JSON_OBJECT_AS_ARRAY);
    if($buy_sell){
        $assets['USDT']+=$total;
    }else{
        $assets[$coin]+=$total;
    }
    $assets=json_encode($assets);
    mysqli_query($con,"update portfolio set assets='$assets' where uid = $uid");
    mysqli_query($con,"delete from orders where id = $id");
}    

?>