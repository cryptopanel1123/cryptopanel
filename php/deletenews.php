<?php
	$id=$_GET['id'];
	$con=mysqli_connect('localhost','root','','cryptopanel');
	if($con)
    {	
    	$sql = "DELETE FROM news WHERE id='$id';";
			if (mysqli_query($con, $sql))
    	    {
			header("location:../admin.php");
     		} 
    }
?>