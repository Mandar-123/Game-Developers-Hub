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
		<script src="scripts/ajaxfile.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/showcase.css">
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/menu.css">
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/profile.css">
		
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
		<script src="scripts/ajaxfile.js"></script>
		
		<script>
		
		
		function saveform(formname){
			$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
			$(document).ready(function(){loadoverviewform()});
			
			$(formname).submit(function(){
				return false;
			});
		}
		
		function loadoverviewform()
		{
			$("#over").load("includes/load-projectoverview.inc.php");
		}
		
		function saveprojectsettings(formname){
			$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
			$(document).ready(function(){loadprojectsettinsform()});
			
			$(formname).submit(function(){
				return false;
			});
		}
		
	
		function loadprojectsettinsform()
		{
			$("#proset").load("includes/load-projectsettings.inc.php");
		}
		



		function removedev(formname){
		$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
		$(document).ready(function(){loadprojectsettinsform()});
		
		$(formname).submit(function(){
			return false;
		});
		}
		
		
		$(document).ready(function(){
			$.ajaxSetup({ cache: false });
			$("#linkdiv").load("includes/load-project-links.inc.php");
			$("#vids").load("includes/load-project-vids.inc.php");
			$("#imagediv").load("includes/load-project-images.php");
			$("#over").load("includes/load-projectoverview.inc.php");
			$("#proset").load("includes/load-projectsettings.inc.php");
			$("#submitlink").click(function(){
				savedata("#linkform");
				loadlinks();
			});
			$("#submitvid").click(function(){
				savedata('#videoform');
				loadvids();
			});
		});
		
		function loadimages()
		{
			$("#imagediv").load("includes/load-project-images.php");
		}

		function loadvids()
		{
			$("#vids").load("includes/load-project-vids.inc.php");
		}

		function loadlinks()
		{
			$("#linkdiv").load("includes/load-project-links.inc.php");
		}
		
		
		</script>

	</head>
	
	<body background="images/back.jpg" spellcheck="false">
	<?php
		include_once 'includes/menu.inc.php';
	

		$id=$_SESSION['email'];
		$sql="SELECT * FROM projectdetails WHERE email='$id';";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
	?>
<div class="container" style="margin-top:60px;">
    <div class="row profile ">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div id="profile-userpic">
					<img style="border-radius:0px;" id="imga" src="<?php 
					$foldername=$_SESSION['email'];
					$dirname="userimages/$foldername/projectprofile/";
					$images=glob($dirname."/*.*");
					if(is_dir($dirname) && count($images)>0)
					{
							$dir = $images[0];
							echo $dir;
					}
					else{
					echo "images/sampleproject.png";}?>" class="img-responsive" alt="">
				</div>
				
				
				<div style="margin-bottom:10px">
					<center><button type="button" name="change" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#ProfileModal">Change Display Pic</button></center>
				</div>
					<div id="ProfileModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body" style="height:200px;">
								<form method="POST" action="includes/deleteprojectpic.inc.php">
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-6">
											<input type="submit" class="btn btn-danger" value="Delete Display Picture" name="submit">
										</div>
									</div>
								</form>
								<br><br><br><center><p>OR</p></center>
								<form method="POST" action="includes/uploadprojectpic.inc.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-6">
											<label for="image" class="custom-file-upload">Choose Image</label>
											<input type="file" name="image" id="image"/>
										</div>	
										<div class="col-sm-6">
											<input type="submit" class="btn btn-primary" value="Upload Display Pic" name="submit"/>
										</div>
									</div>
								</form>
							</div>
						</div>

					  </div>
					</div>
					
					
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $row["name"];?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $row['genre'];?>
					</div>
				</div>
				
				
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a data-toggle="tab" href="#projectoverview">
							<i class="glyphicon glyphicon-user"></i>
							Overview </a>
						</li>
						<li class="active">
							<a data-toggle="tab" href="#projectshowcase">
							<i class="glyphicon glyphicon-briefcase"></i>
							Project Showcase </a>
						</li>
						<li>
							<a data-toggle="tab" href="#projectsettings">
							<i class="glyphicon glyphicon-cog"></i>
							Project Settings </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="tab-content">
		<div class="col-md-9 tab-pane fade in active" id="projectshowcase">
         <div class="profile-content">
		<div class="container col-md-12" style="margin-top:10px">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#images">Images</a></li>
			<li><a data-toggle="tab" href="#videos">Videos</a></li>
			<li><a data-toggle="tab" href="#links">Links</a></li>
		</ul>

		<div class="tab-content">
			
			<div id="images" class="tab-pane fade in active" style="padding:20px;">
			<form class="col-sm-offset-3 col-sm-6 form-horizontal" action="includes/projectimageupload.inc.php" method="post" enctype="multipart/form-data" style="margin-top:20px;">
			 <div class="form-group">
				<div class="col-sm-6">
					<label for="fileToUpload" class="custom-file-upload">Choose Image</label>
					<input type="file" name="fileToUpload" id="fileToUpload"/>
				</div>	
				
				<div class="col-sm-6">
					<input type="submit"  class="btn btn-primary" value="Upload Image" name="submit">
				</div>
			</div>
			</form>
			<div id="imagediv">
			
			</div>
			</div>
			
			<div id="videos" class="tab-pane fade" style="padding:20px">
			<form class="col-sm-offset-2 col-sm-8 form-horizontal" id="videoform" action="includes/project-video-upload.inc.php" method="POST" style="margin-top:20px;">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" placeholder="Enter the embed code for the youtube video" class="form-control" name="link" id="link"/>
					</div>	
					
					<div class="col-sm-2">
						<button type="button" class="btn btn-primary"  name="submit" id="submitvid">Embed</button>
					</div>
				</div>
			</form>
			<div id="vids">
			
			</div>
			</div>
			<div id="links" class="tab-pane fade" style="padding:20px">
				<form id="linkform" class="form-horizontal col-md-offset-2 col-md-8" action="includes/addprojectlink.inc.php" method="POST" style="margin-top:20px;">
					<div class="form-group"> 
							<div class="col-md-12">
								<input type="text" name="des" id="des" class="form-control" placeholder="Enter Description of the contents here..."/>
							</div>	
					</div>
					<div class="form-group"> 
						<div class="col-md-9">
							<input type="text" name="lin" id="lin"class="form-control" placeholder="Enter the link here..."/>
						</div>	
						<div class="col-md-3">	
							<button type="button" name="submit" id="submitlink" class="btn btn-primary" >Add Link</button>
						</div>
					</div>
				</form>
				<div id="linkdiv">
				
				</div>
			</div>
	  </div>
	</div>
	</div>
        </div>
		
		
		<div class="col-md-9 tab-pane fade" id="projectoverview">
            <div class="profile-content">
				<div id="over">
					
				</div>
			</div>
		</div>
		
		<div class="col-md-9 tab-pane fade" id="projectsettings">
            <div class="profile-content">
				<div id="proset"> 
					
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>