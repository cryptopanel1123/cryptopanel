<?php
    $email=$_POST['email'];
    $pass1=hash('sha256',$_POST['pass1']);
    $pass2=hash('sha256',$_POST['pass2']);
    if($pass1==$pass2){
        $con=mysqli_connect('localhost','root','');
        if($con){
            mysqli_select_db($con,'cryptopanel');
            if(mysqli_query($con,"insert into user(email,pass) values('$email','$pass1');")){
                $result=mysqli_query($con,"select id from user where email = '$email';");
                $row=mysqli_fetch_array($result);
                if($row!=null){
                    $id=$row['id'];
                    $json='{"BTC":0,"ETH":0,"BNB":0,"XRP":0,"SOL":0,"DOT":0,"ADA":0,"LUNA":0,"SHIB":0,"DOGE":0,"USDT":0}';
                    if(mysqli_query($con,"insert into portfolio(uid,assets) values('$id','$json');")){
                        // $subject="CONGRATS!";
                        // $message="YOU REGISTERED SUCCESSFULLY!";
                        // $headers="From:cryptopanel1123@gmail.com";
                        // mail($email,$subject,$message,$headers);
                        header("location:display.php?title=REGISTERED SUCCESSFULLY!&msg=");
                    }else{
                        echo mysqli_error($con);
                    }
                }
            }else{
                header("location:display.php?title=REGISTRATION FAILED!&msg=ALREADY REGISTERED WITH THIS EMAIL!");
            }
        }
    }
?>