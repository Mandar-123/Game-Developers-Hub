<?php
	include_once 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$mainskill=$_POST['ms'];
	$about=$_POST['des'];
	$edu=$_POST['edu'];
	$exp=$_POST['exp'];
	$sql="UPDATE skills SET mainskill='$mainskill',about='$about',edu='$edu',exp='$exp' WHERE email='$email';";
	if(mysqli_query($conn,$sql))
		echo "Changed Succesfully";
	else echo "failed";
?>	