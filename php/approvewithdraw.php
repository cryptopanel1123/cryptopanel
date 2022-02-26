<?php
$orderid=$_GET['orderid'];
$con=mysqli_connect('localhost','root','','cryptopanel');
if($con)
{
	   mysqli_query($con,"UPDATE withdraw set status='APPROVED' where id=$orderid;");
	   header("location:../admin.php");
}
?>