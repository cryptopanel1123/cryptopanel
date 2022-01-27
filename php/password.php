<?php
    session_start();
    if(isset($_GET['token'])){
        if($_SESSION['token']==$_GET['token']){
            $_SESSION['uid']=$_SESSION[$_GET['token']];
            unset($_SESSION['token']);
            header("location:../password.html");
        }else{
            header("location:display.php?title=INVALID TOKEN ERROR!&msg=RECOVERY EMAIL EXPIRED TRY AGAIN");
        }
        unset($_GET['token']);
        unset($_SESSION[$_GET['token']]);
    }
    else{
        $pass1=hash('sha256',$_POST['pass1']);
        $pass2=hash('sha256',$_POST['pass2']);
        // $id=$_POST['id'];
        if($pass1==$pass2){
            $con=mysqli_connect('localhost','root','');
            if($con){
                mysqli_select_db($con,'cryptopanel');
                $id=$_SESSION['uid'];
                if(mysqli_query($con,"UPDATE user SET pass = '$pass1' where id = $id;")){
                    header("location:display.php?title=NEW PASSWORD UPDATED!&msg=");
                }else{
                    header("location:display.php?title=ERROR WHILE UPDATING PASSWORD!&msg=TRY AGAIN LATER!");
                }
                session_destroy();
            }
        }
    }
?>