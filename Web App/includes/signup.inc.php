<?php
	if(isset($_POST['submit']))
	{
		include_once 'dbh.inc.php';
		$fn=mysqli_real_escape_string($conn, $_POST['fn']);
		$ln=mysqli_real_escape_string($conn, $_POST['ln']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		$phn=mysqli_real_escape_string($conn, $_POST['phn']);
		$dob=mysqli_real_escape_string($conn, $_POST['dob']);
		$state=mysqli_real_escape_string($conn, $_POST['state']);
		$city=mysqli_real_escape_string($conn, $_POST['city']);
		$pass=mysqli_real_escape_string($conn, $_POST['pass']);
		$cpass=mysqli_real_escape_string($conn, $_POST['cpass']);
		
		$required = array('fn','ln','email','phn','dob','state','city','pass','cpass');
		
		foreach($required as $field) 
		{
			if (empty($_POST[$field])) 
			{
				header("Location:  ../index.php?register=Incomplete%20Input");
				exit();
			}
		}
		
		if(!preg_match("/^[a-zA-Z]*$/",$fn) || !preg_match("/^[a-zA-Z]*$/",$ln))
		{
			header("Location:  ../index.php?register=Invalid%20Name");
			exit();
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			header("Location:  ../index.php?register=Invalid%20Email");
			exit();
		}
		else if(!is_numeric($phn))
		{
			header("Location:  ../index.php?register=Invalid%20Phone%20Number");
			exit();
		}
		else
		{
				$sql="SELECT * FROM user WHERE email='$email'";
				$result=mysqli_query($conn,$sql);
				$resultcheck=mysqli_num_rows($result);
				if($resultcheck>0)
				{
					header("Location:  ../index.php?register=USER%20ALREADY%20EXISTS");
					exit();
				}
				else
				{
					$hashedPwd=password_hash($pass,PASSWORD_DEFAULT);
					$sql="INSERT INTO user (fn,ln,email,phn,dob,state,city,pass,work) VALUES ('$fn','$ln','$email','$phn','$dob','$state','$city','$hashedPwd',\"No\");";
					mysqli_query($conn,$sql);
					$sql="INSERT INTO skills (email,otherskills) VALUES ('$email','');";
					mysqli_query($conn,$sql);
					$sql="INSERT INTO projectdetails(email,publicavail) VALUES ('$email','No');";
					mysqli_query($conn,$sql);
					session_start();
					$_SESSION['email']=$email;
					$_SESSION['fn']=$fn;
					$_SESSION['ln']=$ln;
					header("Location: ../home.php?register=SUCCESSFULLY%20REGISTERED");
					exit();
				}
		}

	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
?>