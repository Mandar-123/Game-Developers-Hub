<?php
include_once 'includes/checksession.inc.php';
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
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/menu.css">
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/showcase.css">
		<style>
		</style>
		<script type="text/javascript">
		
		$(document).ready(function(){
			$.ajaxSetup({ cache: false });
			$("#linkdiv").load("includes/load-links.php");
			$("#vids").load("includes/load-vids.php");
			$("#imagediv").load("includes/load-images.php");
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
			$("#imagediv").load("includes/load-images.php");
		}

		function loadvids()
		{
			$("#vids").load("includes/load-vids.php");
		}

		function loadlinks()
		{
			$("#linkdiv").load("includes/load-links.php");
		}
		
		</script>
	</head>
	<body background="images/back.jpg" spellcheck="false">
	<?php
		include_once 'includes/menu.inc.php'
	?>
	
	<div class="container col-md-offset-2 col-md-8" style="margin-top:100px">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#images">Images</a></li>
			<li><a data-toggle="tab" href="#videos">Videos</a></li>
			<li><a data-toggle="tab" href="#links">Links</a></li>
		</ul>

		<div class="tab-content">
			
			<div id="images" class="tab-pane fade in active" style="padding:20px;">
			<form class="col-sm-offset-3 col-sm-6 form-horizontal" action="includes/imageupload.inc.php" method="post" enctype="multipart/form-data" style="margin-top:20px;">
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
			<form class="col-sm-offset-2 col-sm-8 form-horizontal" id="videoform" action="includes/videoupload.inc.php" method="POST" style="margin-top:20px;">
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
				<form id="linkform" class="form-horizontal col-md-offset-2 col-md-8" action="includes/addlink.inc.php" method="POST" style="margin-top:20px;">
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
	<script>
		<?php if(isset($_GET['upload'])){echo "alert('".$_GET['upload']."');";}?>
	</script>
	</body>
</html>