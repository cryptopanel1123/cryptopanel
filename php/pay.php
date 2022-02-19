<?php
    session_start();
    // echo $_POST['payamounthid'];
    // echo $_POST['payfeehid'];
    $uid=$_SESSION['id'];
    $con=mysqli_connect("localhost","root","","cryptopanel");
    $result=mysqli_query($con,"select assets from portfolio where uid=$uid");
    $result=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $assets=json_decode($result['assets'],JSON_OBJECT_AS_ARRAY);
    $assets['USDT']+=$_POST['payamounthid'];
    $assets=json_encode($assets);
    mysqli_query($con,"update portfolio set assets='$assets' where uid = $uid");
?>
<script>
    alert("Payment success!")
    window.location.replace("http://localhost/cryptopanel/withdrawl.php");
</script>