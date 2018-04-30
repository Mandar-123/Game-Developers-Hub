<?php include 'dbh.inc.php';?>
<?php
	session_start();
	$id=$_SESSION['email'];
	
		$link=$_POST['link'];
		
		$sql="DELETE FROM link where link='$link' AND email='$id';";
		if(mysqli_query($conn,$sql))
		{
			echo "Link Deleted";
		}
		else echo "Deletion Failed";
?>