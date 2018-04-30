<?php
	include 'dbh.inc.php';
	session_start();
	$email=$_SESSION['email'];
	$sql="SELECT otherskills FROM skills WHERE email='$email';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherskills'];
	$skillstring="";
	$newtok = strtok($string,",");
	$num=1;
	while ($newtok !== false) {
		$skillstring = $skillstring."<div class='border'>
	<strong style='margin-left:10px;'>".$newtok."</strong>
	<form method='POST' style='display:inline' action='includes/removeskill.inc.php' id='remove".$num."'>
		<input type='hidden' name='sk' value='".$newtok."'></input>
		<button style='background-color:transparent;border:none;float:right' type='button' onclick=\"removeskill('#remove".$num."')\"><i class='glyphicon glyphicon-remove' style='font-size:10px;'></i></button>
	</form>
	</div>";
	$newtok=strtok(",");
	$num++;
	}
	echo $skillstring;
?>


