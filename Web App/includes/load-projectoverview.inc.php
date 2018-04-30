<?php
	session_start();
	include 'dbh.inc.php';
	$email=$_SESSION['email'];
	$sql="SELECT * FROM projectdetails where email='$email';";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$genre=$row['genre'];
	$name=$row['name'];
	$description=$row['description'];
	$devdet=$row['devdet'];
?>
<form action="includes/overview.inc.php" class="form-horizontal col-sm-offset-1 col-sm-10"  style="margin-top:20px;" id="overviewform" method="POST">

<div class="form-group">
	<label for="name" class="control-label col-sm-3">Game Title: </label>
	<div class="col-sm-7">
		<input type="text" name="name" class="form-control" placeholder="Game Title" value="<?php echo "$name"?>"></input>
	</div>
</div>	
<div class="form-group">
	<label for="genre" class="control-label col-sm-3" >Genre: </label>
	<div class="col-sm-5">
		<select name="genre" class="form-control">
			<option value="Shooter" <?php if($genre=='Shooter')echo"selected"?>>Shooter</option>
			<option value="First Person Shooter" <?php if($genre=='First Person Shooter')echo"selected"?>>First Person Shooter</option>
			<option value="Adventure" <?php if($genre=='Adventure')echo"selected"?>>Adventure</option>
			<option value="Platrorm" <?php if($genre=='Platform')echo"selected"?>>Platform</option>
			<option value="Role-Playing Game" <?php if($genre=='Role-Playing Game')echo"selected"?>>Role-Playing Game</option>
			<option value="Puzzle" <?php if($genre=='Puzzle')echo"selected"?>>Puzzle</option>
			<option value="Strategy" <?php if($genre=='Strategy')echo"selected"?>>Strategy</option>
			<option value="Sports" <?php if($genre=='Sports')echo"selected"?>>Sports</option>
			<option value="Fighting" <?php if($genre=='Fighting')echo"selected"?>>Fighting</option>
			<option value="Survival" <?php if($genre=='Survival')echo"selected"?>>Survival</option>
			<option value="Hybrid" <?php if($genre=='Hybrid')echo"selected"?>>Hybrid</option>
			<option value="Third-Person Shooter" <?php if($genre=='Third-Person Shooter')echo"selected"?>>Third-Person Shooter</option>
			<option value="Logic" <?php if($genre=='Logic')echo"selected"?>>Logic</option>
			<option value="Racing" <?php if($genre=='Racing')echo"selected"?>>Racing</option>
			<option value="Simulation" <?php if($genre=='Simulation')echo"selected"?>>Simulation</option>
			<option value="Horror" <?php if($genre=='Horror')echo"selected"?>>Horror</option>
		</select>
	</div>
</div> 
<div class="form-group">
	<label for="des" class="control-label col-sm-3" >Game Description: </label>
	<div class="col-sm-9">
		<textarea name="description" id="description" class="form-control" rows="6" placeholder="Describe Your Game"><?php echo "$description"?></textarea>
	</div>
</div>
<div class="form-group">
	<label for="edu" class="control-label col-sm-3" >Development Status: </label>
	<div class="col-sm-9">
		<textarea name="devdet" id="devdet" class="form-control" rows="4" placeholder="Status of Game"><?php echo "$devdet"?></textarea>
	</div>
</div>
<div class="form-group">	
	<div class="col-sm-offset-3 col-sm-4">
		<button type="button" class="btn btn-success" id="sub" name="submit" onclick="saveform('#overviewform')">Save Changes</button>
	</div>
</div>
</form>