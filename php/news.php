<?php
	$title=$_POST['title'];
	$content=$_POST['content'];
	$con=mysqli_connect('localhost','root','','cryptopanel');
	if($con)
    {
    	$sql = "INSERT INTO news (title,content) values('$title','$content')";
			if (mysqli_query($con, $sql))
    	    {
			 header("location:../admin.php");
     		} 
    }
?>