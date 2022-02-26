<?php
$orderid=$_GET['orderid'];
$con=mysqli_connect('localhost','root','','cryptopanel');
if($con)
{
		$result=mysqli_query($con,"select * from withdraw where id=$orderid");
		$result=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$userid=$result['uid'];
		echo $userid;
		$assets =  mysqli_query($con,"select assets from portfolio where uid = $userid;");
		$assets=mysqli_fetch_array($assets,MYSQLI_ASSOC);
		$assets=json_decode($assets['assets'],JSON_OBJECT_AS_ARRAY);
		$assets['USDT']+=$result['amt'];
		$assets=json_encode($assets);
		mysqli_query($con,"update portfolio set assets = '$assets' where uid=$userid");
	   mysqli_query($con,"UPDATE withdraw set status='CANCELED' where id=$orderid;");
	   header("location:../admin.php");
}
?>