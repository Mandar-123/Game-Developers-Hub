<?php
	include 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$skill=$_POST['sk'];
	$skill=$skill.",";
	
	$sql="SELECT otherskills FROM skills WHERE email='$email';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherskills'];
	
	$string=str_replace($skill,"",$string);
	$sql="UPDATE skills SET otherskills='$string' WHERE email='$email';";
	mysqli_query($conn,$sql);
	exit();
?>


