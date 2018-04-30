<?php
session_start();
$foldername=$_SESSION['email'];

$target_dir = "../userimages/$foldername/";
if(!file_exists ($target_dir))
	mkdir("$target_dir", 0700);

$target_dir = "../userimages/$foldername/profile/";
if(!file_exists ($target_dir))
	mkdir("$target_dir", 0700);
else{
	unlink($target_dir."profile.jpg");
	unlink($target_dir."profile.png");
	unlink($target_dir."profile.jpeg");
	unlink($target_dir."profile.gif");
}

$target_file = $target_dir . basename($_FILES["image"]["name"]);

$exten = explode(".", $_FILES["image"]["name"]);
$newfilename = "profile." . end($exten);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check == false) 
	{    
		$uploadOk = 0;
    }
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		$uploadOk = 0;
	}
	if ($uploadOk == 0) 
	{
			header("Location: ../profile.php?changeprofilepic=failed");
			exit();
	} 
	else 
	{
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$newfilename))
		{
			header("Location: ../profile.php?changeprofilepic=successfull");
			exit();
		} 
		else 
		{
			header("Location: ../profile.php?changeprofilepic=failed");
			exit();
		}
	}
}
header("Location: ../profile.php?changeprofilepic=failed");
exit();
?>