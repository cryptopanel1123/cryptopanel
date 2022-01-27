<?php
    $email=$_POST['email'];
    $con=mysqli_connect('localhost','root','');
        if($con){
            mysqli_select_db($con,'cryptopanel');
            $result=mysqli_query($con,"select id from user where email='$email';");
            $row=mysqli_fetch_array($result);
            if($row!=null){
                $row=$row['id'];
                $timestamp=time();
                $token=md5("$row$timestamp");
                session_start();
                $_SESSION[$token]=$row;
                $_SESSION['token']=$token;
                $subject="RECOVER PASSWORD";
                $message="Click here to reset password https://localhost/cryptopanel/php/password.php?token=$token";
                $headers="From:cryptopanel1123@gmail.com";
                if(mail($email,$subject,$message,$headers)){
                    header("location:display.php?title=PASSWORD RECOVERY MAIL SENT SUCCESSFULLY!&msg=CHECK OUT YOUR INBOX!");
                }else{
                    header("location:display.php?title=MAIL SERVER ERROR!&msg=TRY AGAIN LATER.");
                }
            }else{
                header("location:display.php?title=EMAIL NOT REGISTERED!&msg=");
            }
        }
?>