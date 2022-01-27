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
                    $json='{"BTC":1,"ETH":1,"BNB":1,"XRP":1,"SOL":1,"DOT":1,"ADA":1,"LUNA":1,"SHIB":1,"DOGE":1,"USDT":5000}';
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