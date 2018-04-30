<?php
include_once 'includes/checksession.inc.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>StartUp HUB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="External/jquery-3.2.1.min.js"></script>
		<script src="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/menu.css">
		<style>
		.profile 
		{
			display: inline-block;
		}
		div.tags 
		{
			background: #1abc9c;
			border-radius: 2px;
			color: #f5f5f5;
			font-weight: bold;
			padding: 2px 4px;
			margin:5px;
			display:inline-block;
		}
	</style>

	</head>
	
	<body background="images/back.jpg" spellcheck="false">
		
<?php
	include_once 'includes/menu.inc.php';
	include 'includes/dbh.inc.php';
	$emailid=$_SESSION['email'];
	$term=$_POST['search'];
	$sql = "SELECT * FROM projectdetails WHERE name LIKE '%".$term."%' AND publicavail='Yes' AND email!='$emailid'";
	$result=mysqli_query($conn,$sql);
	
	
	echo "<div style='margin-top:100px;'>
			<div class='col-sm-offset-2' style='padding-left:40px;'><h3>Games</h2></div>";
	if (mysqli_num_rows($result) > 0) 
			{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo"
					<div class='container'>
						<div class='row'>
							<div class='col-sm-offset-2 col-sm-8'>
							 <div class='well profile' style='padding:10px;width:100%'>
								<div class='col-sm-12'>
									<div class='col-sm-8'>
										<h3>".$row['name']."</h3>
										<p><strong>Genre: </strong> ".$row['genre']." </p>
										<p><strong>Description: </strong>".$row['description']."</p>
										<p><strong>Development Status: </strong>".$row['devdet']."
									</div>             
									<div class='col-sm-4 text-center'>";
									$foldername=$row['email'];
									$dirname="userimages/$foldername/projectprofile/";
									$images=glob($dirname."*.*");
									if(count($images)>0)
										echo "<img src='".	$images[0]."' alt='' style='height:200px;width:200px;' class='img-circle img-responsive'>";
									echo "</div>
								</div>            
								<div class='col-sm-offset-4 col-sm-4'>
									<div class='col-sm-12 emphasis'>
									<form action='publicproject.php' method='POST'>
										<input type='hidden' value='".$row['email']."'/ name='uemail'>
										<button class='btn btn-info btn-block' type='submit'> View Game </button>
									</form>
									</div>
								</div>
							</div>                
							</div>
						</div>
						</div>";
			}
			}
			else echo"<center><p>No results</p></center>";
			
	$sql = "SELECT * FROM user WHERE fn LIKE '%".$term."%' OR ln LIKE '%".$term."%' AND email!='".$emailid."';";
	$result=mysqli_query($conn,$sql);
	
	
	echo "<div class='col-sm-offset-2' style='padding-left:40px;'><h3>People</h2></div>";
	if (mysqli_num_rows($result) > 0) 
			{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$sql = "SELECT * FROM skills WHERE email='".$row['email']."';";
				$result1=mysqli_query($conn,$sql);
				$row1 = mysqli_fetch_assoc($result1);
				$string=$row1['otherskills'];
				echo"
					<div class='container'>
						<div class='row'>
							<div class='col-sm-offset-2 col-sm-8 '>
								<div class='well profile' style='padding:10px;width:100%'>
									<div class='col-sm-12'>
										<div class='col-sm-8'>
											<h3>".$row['fn']." " .$row['ln']."</h3>
											<p><strong>Main Skill: </strong>".$row1['mainskill']."</p>
											<p><strong>About Me: </strong>".$row1['about']."</p>
											<div><strong>Skills: </strong>";
											$skillstring="";
											$newtok = strtok($string,",");
											while ($newtok !== false) {
												$skillstring = $skillstring."<div class='tags'>".$newtok."</div>";
											$newtok=strtok(",");
											}
											echo $skillstring;
											
											echo "</div>
										</div>             
										<div class='col-sm-4 text-center'>";
										$foldername=$row['email'];
										$dirname="userimages/$foldername/profile/";
										$images=glob($dirname."*.*");
										if(count($images)>0)
											echo "<img src='".$images[0]."' alt='' style='height:200px;width:200px;' class='img-circle img-responsive'>";
										echo "</div>
									</div>            
									<div class='col-sm-offset-4 col-sm-4'>
										<div class='col-sm-12 emphasis'>
											<form action='publicprofile.php' method='POST'>
												<input type='hidden' value='".$row['email']."'/ name='uemail'>
												<button class='btn btn-info btn-block' type='submit'> View Profile </button>
											</form>
										</div>
									</div>
								</div>                
							</div>
						</div>
					</div>";
			}
			}
			else echo"<center><p>No results</p></center>";
		
		?>
		</div>
	</body>
</html>