<?php
    $email=$_POST['email'];
    $pass1=$_POST['pass1'];
    $con=mysqli_connect('localhost','root','');
    if($con){
        mysqli_select_db($con,'cryptopanel');
        $result=mysqli_query($con,"select id,pass from user where email = '$email';");
        $row=mysqli_fetch_array($result);
        if($row!=null){
            if(hash('sha256',$pass1)==$row['pass']){
                session_start();
                $_SESSION['id']=$row['id'];
                header("location:../exchange.php");
            }else{
                header("location:display.php?title=INCORRECT PASSWORD!&msg=");
            }
        }else{
            header("location:display.php?title=INCORRECT EMAIL!&msg=");
        }
    }
?>