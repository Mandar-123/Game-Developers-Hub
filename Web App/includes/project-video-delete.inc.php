<?php include 'dbh.inc.php';?>
<?php
	session_start();
	$id=$_SESSION['email'];
	
	
		$src=$_POST['src'];
		
		$sql="DELETE FROM projectvideo where src='$src' AND email='$id';";
		if(mysqli_query($conn,$sql))
		{
			echo "Delete successful";
		}
		else "Delete Failed";
?>