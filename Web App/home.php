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
	</style>

	</head>
	
	<body background="images/back.jpg" spellcheck="false">
		
	<?php
	include_once 'includes/menu.inc.php';
	include 'includes/dbh.inc.php';
	$emailid=$_SESSION['email'];
	$sql="SELECT * FROM projectdetails WHERE publicavail='Yes';";
	echo "<div style='margin-top:100px;'>
			<center><h2>Trending Games</h2></center>";
	$result=mysqli_query($conn,$sql);
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
											echo "<img src='".$images[0]."' alt='' style='height:200px;width:200px;' class='img-circle img-responsive'>";
	
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
		
		?>
		</div>
	</body>
</html>
