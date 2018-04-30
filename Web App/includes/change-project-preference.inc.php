<?php
	session_start();
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$pref=$_POST['publicavail'];
	$sql="UPDATE projectdetails SET publicavail='$pref' where email='$email';";
	mysqli_query($conn,$sql);
?>
