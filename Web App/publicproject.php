<?php
include_once 'includes/checksession.inc.php'
?>
<?php include 'includes/dbh.inc.php';?>
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
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/profile.css">
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/showcase.css">
		<style>
			.dev{
				background-color:white;
				float:left;
				margin-bottom:5px;
				margin-top:5px;
				padding:5px;
				border-radius:5px;
				display:block;
			}
		</style>
	</head>
	<body>
	<?php
		include_once 'includes/menu.inc.php';
		$id=$_SESSION['email'];
		$email=$_POST['uemail'];
		$sql="SELECT * FROM projectdetails WHERE email='$email';";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
	?>
	
	
	
	
	
<div class="container" style="margin-top:60px;">
    <div class="row profile ">
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div id="profile-userpic">
							<img id="imga" src="<?php 
							$foldername=$email;
							$dirname="userimages/$foldername/projectprofile";
							$images=glob($dirname."/*.*");
							if(is_dir($dirname) && count($images)>0)
							{
									$dir = $images[0];
									echo $dir;
							}
							else{
							echo "images/sampleproject.png";}?>" class="img-responsive" alt="">
						</div>
					
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php echo $row['name'];?>
							</div>
							<div class="profile-usertitle-job">
								<?php echo $row['genre'];?>
							</div>
						</div>
				
				
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a data-toggle="tab" href="#skills">
									<i class="glyphicon glyphicon-briefcase"></i>
									Overview </a>
								</li>
								<li>
									<a data-toggle="tab" href="#showcase">
									<i class="glyphicon glyphicon-cog"></i>
									Showcase </a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
				
				<div class="col-md-9 tab-pane fade in active" id="skills">
					<div class="profile-content">
						<div id="projectdiv">
						   
						   <div>
								<div class="col-sm-3">
								<strong><p style="float:right">Description:</p></strong></div>
								<div class="col-sm-9">
									<div name="des" id="des" class="well well-sm"><?php echo $row['description']?></div>
								</div>
							</div>
						  
							<div>
								<div class="col-sm-3">
								<strong><p style="float:right">Development Details:</p></strong></div>
								<div class="col-sm-9">
									<div class="well well-sm"><?php echo $row['devdet']?></div>
								</div>
							</div>
							
							<div>
								<div class="col-sm-3">
								<strong><p style="float:right">Developers needed:</p></strong></div>
									<?php
										$string=$row['dev'];
										$skillstring="";
										$newtok = strtok($string,",");
										echo "<div class='col-sm-4'>";
										while ($newtok !== false) {
											$skillstring = $skillstring."<div class='dev col-sm-8'>
												<strong style='font-size:15px;'>".$newtok."</strong>
										</div> <div class='col-sm-4'><button type='button' class='btn btn-primary'>Apply</button></div>";
										$newtok=strtok(",");
										}
										echo $skillstring;
										echo "</div>";
									?>

							</div>
							
						</div>
					</div>
				</div>	
				<div class="col-md-9 tab-pane fade" id="showcase">
					<div class="profile-content">
						
						<div class="container col-md-12" style="margin-top:20px">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#images">Images</a></li>
								<li><a data-toggle="tab" href="#videos">Videos</a></li>
								<li><a data-toggle="tab" href="#links">Links</a></li>
							</ul>

							<div class="tab-content">
								
								<div id="images" class="tab-pane fade in active" style="padding:20px;">
									<div id="imagediv">
										
										
										<?php
											$foldername=$email;
											$dirname="userimages/$foldername/project/";
											$images=glob($dirname."*.*");
											foreach($images as $image)
											{
												echo "<div class='col-md-offset-1 col-md-10'>
													<div class='panel panel-default' style='margin-right:auto'>
														<div class='panel-image' >
															<img src='".$image."' class='panel-image-preview'/>
														</div>
													</div>
												</div>";
											}
										?>


									</div>
								</div>
								
								<div id="videos" class="tab-pane fade" style="padding:20px">
									
									<div id="vids">
										<?php
											$sql="SELECT src FROM projectvideo WHERE email='$email';";
											$result=mysqli_query($conn,$sql);
											if (mysqli_num_rows($result) > 0) 
											{
											while($rowvid = mysqli_fetch_assoc($result)) 
											{
											echo"<div class='col-md-offset-1 col-md-10'>
													<div class='panel panel-default' style='margin-right:auto'>
														<div class='panel-image'>
															<div class='embed-responsive embed-responsive-16by9'>
																<iframe class='embed-responsive-item' src='".$rowvid['src']."' frameborder='0' allowfullscreen></iframe>
															</div>
														</div>
													</div>
												</div>";
											}
											}
									?>
									</div>
								</div>
								<div id="links" class="tab-pane fade" style="padding:20px">
									
									<div id="linkdiv">
									
									
									<?php
										$sql="SELECT * FROM projectlink WHERE email='$email';";
										$result=mysqli_query($conn,$sql);
										if (mysqli_num_rows($result) > 0) 
										{
										while($rowlink = mysqli_fetch_assoc($result)) 
										{
										
										echo"<div class='col-md-offset-1 col-md-10 border' style='padding-bottom:10px;'>
											<div>
												<div class='col-md-2'>
													<strong>Description:</strong>
												</div>
												<div class='col-md-10'>
													<p>".$rowlink['des']."</p>
												</div>
											</div>
											<div>
												<div class='col-md-2'>
													<strong>Link:</strong>
												</div>
												<div class='col-md-10'>
													<a class='link' target='_blank' href='".$rowlink['link']."'>".$rowlink['link']."</a>
												</div>
											</div>
										</div>";
										}
										}
									?>
									</div>
									
								</div>
						  </div>
						</div>
						
						
						
					</div>
				</div>
				</div>
	</div>
</div>
</body>
</html>