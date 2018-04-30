<?php
session_start();
$foldername=$_SESSION['email'];
if(isset($_POST["submit"])){
	$target_dir = "../userimages/$foldername/profile/";
	if(file_exists($target_dir."profile.jpg"))
		unlink($target_dir."profile.jpg");
	if(file_exists($target_dir."profile.png"))
		unlink($target_dir."profile.png");
	if(file_exists($target_dir."profile.jpeg"))
		unlink($target_dir."profile.jpeg");
	if(file_exists($target_dir."profile.gif"))
		unlink($target_dir."profile.gif");
	header("Location: ../profile.php?deteled=1");
}
else
	header("Location: ../profile.php?deteled=0");
	exit();
?>