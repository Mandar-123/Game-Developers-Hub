<?php
	session_start();
	$id=$_SESSION['email'];
	if(isset($_POST['submit']))
	{
		include_once 'dbh.inc.php'; 
		$fn=mysqli_real_escape_string($conn, $_POST['fn']);
		$ln=mysqli_real_escape_string($conn, $_POST['ln']);
		$phn=mysqli_real_escape_string($conn, $_POST['phn']);
		$dob=mysqli_real_escape_string($conn, $_POST['dob']);
		$state=mysqli_real_escape_string($conn, $_POST['state']);
		$city=mysqli_real_escape_string($conn, $_POST['city']);
		$gender=mysqli_real_escape_string($conn, $_POST['gender']);

		$required = array('fn','ln','phn','dob','state','city','gender');

		foreach($required as $field)
		{
			if (empty($_POST[$field]))
			{
				header("Location:  ../profile.php?changed=Incomplete%20Input");
				exit();
			}
		}

		if(!preg_match("/^[a-zA-Z]*$/",$fn) || !preg_match("/^[a-zA-Z]*$/",$ln))
		{
			header("Location:  ../profile.php?register=Invalid%20Name");
			exit();
		}
		else if(!is_numeric($phn))
		{
			header("Location:  ../profile.php?register=Invalid%20Phone%20Number");
			exit();
		}
		else
		{
					$sql="UPDATE user SET fn = '$fn', ln= '$ln', phn='$phn', dob='$dob', state='$state', city='$city', gender='$gender' WHERE email = '$id' ;";
					mysqli_query($conn,$sql);
					$_SESSION['fn']=$fn;
					$_SESSION['ln']=$ln;
					header("Location: ../profile.php?changed=yes");
					exit();
		}
	}
	else
	{
		header("Location: ../profile.php?changed=no");
		exit();
	}
?>
