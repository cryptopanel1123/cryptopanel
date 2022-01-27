<?php
    session_start();
    $id=$_SESSION['id'];
    $coin=$_POST['coin'];
    $price=$_POST['buyPrice'];
    $amount=$_POST['buyAmount'];
    $total=$_POST['buyTotal'];
    $assets=$_POST['assets'];
    $con=mysqli_connect('localhost','root','','cryptopanel');
    if($con){
        if(mysqli_query($con,"insert into orders(uid,coin,price,amount,total,buy_sell) values($id,'$coin',$price,$amount,$total,0);")){
            mysqli_query($con,"UPDATE portfolio set assets='$assets';");
            header("location:../exchange.php");
        }else{
            mysqli_error($con);
        }
    }
?>