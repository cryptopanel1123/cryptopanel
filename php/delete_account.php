<?php
    session_start();
    $id=$_SESSION['id'];
    $con = mysqli_connect("localhost","root","","cryptopanel");
    if($con){
        if(mysqli_query($con,"delete from user where id =$id")){
            session_destroy();
            header("location:display.php?title=ACCOUNT DELETED SUCCESSFULLY!&msg=");
        }
    }
?>