<?php
	session_start();
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$sql="SELECT * FROM projectdetails where email='$email';";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$pref=$row['publicavail'];
?>
<form action="includes/change-project-preference.inc.php" class="form-horizontal col-sm-offset-1 col-sm-10"  style="margin-top:20px;" id="preferenceform" method="POST">
	<div class="form-group">
		<label for="publicavail" class="col-sm-12">Do you want the project to be seen by other people: </label>
		<div class="col-sm-2">
			<select name="publicavail" class="form-control" onchange="saveprojectsettings('#preferenceform');">
				<option value="Yes" <?php if($pref=="Yes") echo "selected"?>>Yes</option>
				<option value="No" <?php if($pref=="No") echo "selected"?>>No</option>
			</select>
		</div>
	</div>	
</form>

<form action="includes/adddev.inc.php" class="form-horizontal col-sm-offset-1 col-sm-10"  style="margin-top:20px;" id="devform" method="POST">

<div class="form-group">
	<label for="dev" class="col-sm-12" >Are you looking for game developers? </label>
	<div class="col-sm-5">
		<select name="dev" class="form-control">
			<option value="Game Programmer">Game Programmer</option>
			<option value="Level Designer">Level Designer</option>
			<option value="Game Artist">Game Artist</option>
			<option value="Game Animator">Game Animator</option>
			<option value="Sound engineer">Sound engineer</option>
			<option value="Game Tester">Game Tester</option>
			<option value="UI Designer">UI Designer</option>
			<option value="Character Modeler">Character Modeler</option>
			<option value="Writer">Writer</option>
			<option value="Character Modeler">Character Modeler</option>
			<option value="Game System Designer">Game System Designer</option>
		</select>
	</div>
	<div class="col-sm-5">
		<button class="btn btn-primary" type="button" onclick="saveprojectsettings('#devform');">ADD</button>
	</div>
</div> 
</form>

<?php
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$sql="SELECT dev FROM projectdetails WHERE email='$email';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['dev'];
	$skillstring="";
	$newtok = strtok($string,",");
	$num=1;
	echo "<div class='col-sm-offset-1 col-sm-4'>";
	while ($newtok !== false) {
		$skillstring = $skillstring."<div class='dev col-sm-12'>
			<strong style='font-size:15px;'>".$newtok."</strong>
			<form method='POST' style='display:inline' action='includes/removedev.inc.php' id='remove".$num."'>
			<input type='hidden' name='sk' value='".$newtok."'></input>
			<button style='background-color:transparent;border:none;float:right' type='button' onclick=\"removedev('#remove".$num."')\">
			<i class='glyphicon glyphicon-remove' style='font-size:10px;'></i>
			</button>
			</form>
	</div>";
	$newtok=strtok(",");
	$num++;
	}
	echo $skillstring;
	echo "</div>";
?>


