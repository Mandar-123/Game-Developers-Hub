<?php
	include_once 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$devdet=$_POST['devdet'];
	$genre=$_POST['genre'];
	$sql="UPDATE projectdetails SET name='$name',description='$description',devdet='$devdet',genre='$genre' WHERE email='$email';";
	if(mysqli_query($conn,$sql))
		echo "Changed Succesfully";
	else echo "failed";
?>	