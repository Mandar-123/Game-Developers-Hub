<?php
	include 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$skill=$_POST['os'];
	$sql="SELECT otherskills FROM skills WHERE email='$email';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$skillstring=$row['otherskills'];
	echo $skillstring; 
	if(strpos($skillstring,$skill)===false && $skill!="")
	{
		$skillstring=$skillstring.$skill.",";
		$sql="UPDATE skills SET otherskills='$skillstring' WHERE email='$email';";
		mysqli_query($conn,$sql);
	}
	exit();
?>


							