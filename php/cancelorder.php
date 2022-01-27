<?php
$orderid=$_GET['orderid'];
$con=mysqli_connect('localhost','root','','cryptopanel');
if($con){
    $result=mysqli_query($con,"select * from orders where id='$orderid';");
    if($result!=null){
        $result=mysqli_fetch_array($result);
        $id=$result['uid'];
        $coin=$result['coin'];
        $amount=$result['amount'];
        $buy_sell=$result['buy_sell'];
    }
    $result1=mysqli_query($con,"select assets from portfolio where uid='$id';");
    if($result1!=null){
        $result1=mysqli_fetch_array($result1);
        $assets=$result1['assets'];
        $assets=json_decode($assets,JSON_OBJECT_AS_ARRAY);
        if($buy_sell=='1'){
            $assets[$coin]+=$amount;
        }else{
            $assets['USDT']+=$amount;
        }
        $assets=json_encode($assets);
    }
    mysqli_query($con,"UPDATE portfolio set assets='$assets' where uid='$id';");
    if(mysqli_query($con,"delete from orders where id='$orderid';")){
        header('location:../exchange.php');
    }else{
        header('location:display.php?title=ERROR CANCELING ORDER&msg=TRY LOGING IN AGAIN');
    }
}
?>