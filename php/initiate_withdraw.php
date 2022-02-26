<?php
	session_start();
	$uid=$_SESSION['id'];
	$amt=$_POST['amount'];
	$bnk_num=$_POST['bank-account'];
	$name=$_POST['name'];
	$scode=$_POST['swift'];
	$country=$_POST['country'];
	$assets=$_POST['userassets'];
	$con=mysqli_connect('localhost','root','','cryptopanel');
    if($con)
    {
    	$sql = "INSERT INTO withdraw (uid,amt,bnk_num,name,scode,country) values('$uid','$amt','$bnk_num','$name','$scode','$country')";
    	 if (mysqli_query($con, $sql))
    	    {
				mysqli_query($con,"UPDATE portfolio set assets='$assets' where uid=$uid;");
				echo mysqli_error($con);
     		} 
     	header("location:../withdrawl.php");
    }
?>	