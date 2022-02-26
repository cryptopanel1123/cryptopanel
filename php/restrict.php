<?php
$uid=$_GET['userid'];
$restricted=$_GET['restricted'];
$con=mysqli_connect('localhost','root','','cryptopanel');
if($con)
{	
	$result=mysqli_query($con,"update user set isRestricted = $restricted where id=$uid");
	header("location:../admin.php");
}
?>