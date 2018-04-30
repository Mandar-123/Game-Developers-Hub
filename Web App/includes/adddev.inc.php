<?php
	include 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$skill=$_POST['dev'];
	$sql="SELECT dev FROM projectdetails WHERE email='$email';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$skillstring=$row['dev'];
	echo $skillstring; 
	if(strpos($skillstring,$skill)===false && $skill!="")
	{
		$skillstring=$skillstring.$skill.",";
		$sql="UPDATE projectdetails SET dev='$skillstring' WHERE email='$email';";
		mysqli_query($conn,$sql);
	}
	exit();
?>
