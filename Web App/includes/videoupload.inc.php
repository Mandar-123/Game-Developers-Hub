<?php include 'dbh.inc.php';?>
<?php
	session_start();
	$id=$_SESSION['email'];
	$src=$_POST['link'];
	$pos=strpos($src,"src=");
	$pos=$pos+5;
	$lpos=-1;
	for($i=$pos;$i<strlen($src);$i++)
	{
		if($src[$i]=='"')
		{
			$lpos=$i;
			break;
		}
	}
	if($lpos==-1)
		echo "Invalid embed code";
	else
	{
		$src=substr($src,$pos,$lpos-$pos);
		$sql="INSERT INTO video(email,src) VALUES('$id','$src');";
		if(mysqli_query($conn,$sql))
			echo "Video Embeded";
		else echo "Failed";
	}
?>