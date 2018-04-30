<?php include 'dbh.inc.php';?>
<?php
	session_start();
	$id=$_SESSION['email'];
	
	$lin=$_POST['lin'];
	$des=$_POST['des'];
	if($des=='')
	{
		$des="---No Description---";
	}
	if($lin=='')
	{
		echo "Failed to Add Link";
		exit();
	}
	$des = str_replace("\\", "\\\\", $des);
	$des = str_replace("'", "\'", $des);
	$sql="INSERT INTO link(email,link,des) VALUES('$id','$lin','$des');";
	if(mysqli_query($conn,$sql))
			echo "Link Added";
	else echo "Failed to Add Link";
?>