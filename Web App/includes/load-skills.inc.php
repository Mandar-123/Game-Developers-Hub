<?php
	session_start();
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$sql="SELECT * FROM skills where email='$email';";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$ms=$row['mainskill'];
	$about=$row['about'];
	$edu=$row['edu'];
	$exp=$row['exp'];
?>
<form action="includes/skills.inc.php" class="form-horizontal col-sm-offset-1 col-sm-10"  style="margin-top:20px;" id="skillform" method="POST">
<div class="form-group">
	<label for="ms" class="control-label col-sm-3" >Main Skill: </label>
	<div class="col-sm-5">
		<select name="ms" class="form-control">
			<option value="Game Programmer" <?php if($ms=='Game Programmer')echo"selected"?>>Game Programmer</option>
			<option value="Level Designer" <?php if($ms=='Level Designer')echo"selected"?>>Level Designer</option>
			<option value="Game Artist" <?php if($ms=='Game Artist')echo"selected"?>>Game Artist</option>
			<option value="Game Animator" <?php if($ms=='Game Animator')echo"selected"?>>Game Animator</option>
			<option value="Sound engineer" <?php if($ms=='Sound engineer')echo"selected"?>>Sound engineer</option>
			<option value="Game Tester" <?php if($ms=='Game Tester')echo"selected"?>>Game Tester</option>
			<option value="UI Designer" <?php if($ms=='UI Designer')echo"selected"?>>UI Designer</option>
			<option value="Character Modeler" <?php if($ms=='Character Modeler')echo"selected"?>>Character Modeler</option>
			<option value="Writer" <?php if($ms=='Writer')echo"selected"?>>Writer</option>
			<option value="Character Modeler" <?php if($ms=='Character Modeler')echo"selected"?>>Character Modeler</option>
			<option value="Game System Designer" <?php if($ms=='Game System Designer')echo"selected"?>>Game System Designer</option>
		</select>
	</div>
</div> 
<div class="form-group">
	<label for="des" class="control-label col-sm-3" >About Yourself: </label>
	<div class="col-sm-9">
		<textarea name="des" id="des" class="form-control" rows="6" placeholder="Describe Yourself"><?php echo "$about"?></textarea>
	</div>
</div>
<div class="form-group">
	<label for="edu" class="control-label col-sm-3" >Education: </label>
	<div class="col-sm-9">
		<textarea name="edu" id="edu" class="form-control" rows="4" placeholder="Write about your Education"><?php echo "$edu"?></textarea>
	</div>
</div>
<div class="form-group">
	<label for="exp" class="control-label col-sm-3" >Experience: </label>
	<div class="col-sm-9">
		<textarea name="exp" id="exp" class="form-control" rows="4" placeholder="Write about your professional experience"><?php echo "$exp"?></textarea>
	</div>
</div>
<div class="form-group">	
	<div class="col-sm-offset-3 col-sm-4">
		<button type="button" class="btn btn-success" id="sub" name="submit" onclick="saveform('#skillform')">Save Changes</button>
	</div>
</div>
</form>