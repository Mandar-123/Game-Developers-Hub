<?php
	if(isset($_POST['submit']))
	{
		include 'dbh.inc.php';
		$loginid=mysqli_real_escape_string($conn,$_POST['loginid']);
		$pass=mysqli_real_escape_string($conn,$_POST['pass']);
		if(empty($loginid) || empty($pass))
		{
			header("Location: ../index.php?login=Incomplte%20Input");
			exit();
		}
		else
		{
			$sql="SELECT * FROM user WHERE email='$loginid';";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck<1)
			{
				header("Location: ../index.php?login=User%20Does%20NOT%20Exist");
				exit();
			}
			else
			{
					$row=mysqli_fetch_assoc($result);
					$hashedPwdCheck=password_verify($pass,$row['pass']);
					if($hashedPwdCheck==false)
					{
						header("Location: ../index.php?login=Invalid%20Password");
						exit();
					}
					else if($hashedPwdCheck==true)
					{
						//To login the user using session
						session_start();
						$_SESSION['email']=$row['email'];
						$_SESSION['fn']=$row['fn'];
						$_SESSION['ln']=$row['ln'];
						header("Location: ../home.php?login=success");
						exit();
					}
				
			}
		}
	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
?>