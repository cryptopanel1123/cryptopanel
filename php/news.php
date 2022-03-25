<?php
	session_start();
	$aid=$_SESSION['aid'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$con=mysqli_connect('localhost','root','','cryptopanel');
	if($con)
    {
		$title=mysqli_real_escape_string($con,$title);
		$content=mysqli_real_escape_string($con,$content);
    	$sql = "INSERT INTO news (aid,title,content) values($aid,'$title','$content')";
			if (mysqli_query($con, $sql))
    	    {
			 header("location:../admin.php");
     		}else{
				 echo mysqli_error($con);
			 }
    }
?>