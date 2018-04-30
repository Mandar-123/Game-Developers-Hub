<?php
	session_start();
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$work=$_POST['work'];
	$sql="UPDATE user SET work='$work' WHERE email='$email';";
	mysqli_query($conn,$sql);
	if($work=="Yes")
		echo "You will get invites from other users !";
	else echo "You won't get invites from other users !"; 
?>