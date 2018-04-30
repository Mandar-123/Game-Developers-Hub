<?php
session_start();
$foldername=$_SESSION['email'];
$target_dir = "../userimages/$foldername/";
if(!file_exists ($target_dir))
	mkdir("$target_dir", 0700);

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$exten = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($exten);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
			header("Location: ../showcase.php?upload=Please select an image");
			exit();
	} 
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename))
		{
			header("Location: ../showcase.php?upload=Upload Successfull");
			exit();
		} 
		else 
		{
			header("Location: ../showcase.php?upload=Upload Failed");
			exit();
		}
	}
}
header("Location: ../showcase.php");
exit();
?>