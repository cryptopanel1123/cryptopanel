<?php
    $email=$_POST['email'];
    $pass1=$_POST['pass1'];
    $con=mysqli_connect('localhost','root','');
    if($con){
        mysqli_select_db($con,'cryptopanel');
        $result=mysqli_query($con,"select id,pass from admin where email = '$email';");
        $row=mysqli_fetch_array($result);
        if($row!=null){
            if($pass1==$row['pass']){
                session_start();
                $_SESSION['aid']=$row['id'];
                header("location:../admin.php");
            }else{
                header("location:display.php?title=INCORRECT PASSWORD!&msg=");
            }
        }else{
            header("location:display.php?title=INCORRECT EMAIL!&msg=");
        }
    }
?>