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
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/menu.css">
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/profile.css">
		
		<script>
		
		function validateForm(){
		var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var name=/^[a-zA-Z]*$/;
		var dobr=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
		if($("#fn").val()==""||$("#ln").val()=="" || $("#phn").val()=="" || $("#dob").val()=="" ||$("#stateList").val()==null || $("#districtList").val()==null)
		{
			$("#message").html("Please fill all the details!");
			return false;
		}
		else if(name.test($("#fn").val())==false || name.test($("#ln").val())==false)
		{
			$("#message").html("Invalid First name or Last name !");
			return false;
		}
		else if(re.test($("#email").val())==false)
		{
			$("#message").html("Invalid Email Address!");
			return false;
		}
		else if($.isNumeric($("#phn").val())==false)
		{
			$("#message").html("Invalid phone number!");
			return false;
		}
		else if(dobr.test($("#dob").val())==false)
		{
			$("#message").html("Invalid DOB!");
			return false;
		}
		else if($("#pass").val()!=$("#cpass").val())
		{
			$("#message").html("Your passwords do not match!");
			return false;
		}
		else return true;
		}
		
		
		
		$(document).ready(function(){
			$.ajaxSetup({ cache: false });
			$("#skillformdiv").load("includes/load-skills.inc.php");
			$("#allskills").load("includes/loadskillfile.inc.php");
		});
		
		function loadskillform()
		{
			$("#skillformdiv").load("includes/load-skills.inc.php");
		}
		function saveform(formname){
			$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
			$(document).ready(function(){loadskillform()});
			
			$(formname).submit(function(){
				return false;
			});
		}
		function loadskilldiv()
		{
			$("#allskills").load("includes/loadskillfile.inc.php");
		}
		function addskill(formname){
			$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
			$(document).ready(function(){loadskilldiv()});
			
			$(formname).submit(function(){
				return false;
			});
		}

		function removeskill(formname){
			$.post($(formname).attr("action"), $(formname+" :input").serializeArray());
			$(document).ready(function(){loadskilldiv()});
			
			$(formname).submit(function(){
				return false;
			});
		}
		
		</script>
		<style>
			.border{
				background-color:white;
				float:left;
				margin-top:10px;
				margin-right:20px;
				border-radius:10px;
				padding:0px;
			}
		</style>
	</head>
	
	<body background="images/back.jpg" spellcheck="false">
	<?php
		include_once 'includes/menu.inc.php';
		$id=$_SESSION['email'];
		$sql="SELECT * FROM user WHERE email='$id';";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$sql="SELECT * FROM skills WHERE email='$id';";
		$result=mysqli_query($conn,$sql);
		$skillrow = mysqli_fetch_assoc($result);
	?>
<div class="container" style="margin-top:60px;">
    <div class="row profile ">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div id="profile-userpic">
					<img id="imga" src="<?php 
					$foldername=$_SESSION['email'];
					$dirname="userimages/$foldername/profile";
					$images=glob($dirname."/*.*");
					if(is_dir($dirname) && count($images)>0)
					{
							$dir = $images[0];
							echo $dir;
					}
					else{
					if($row["gender"]=='m') echo "images/samplemale.jpg";if($row["gender"]=='f') echo "images/samplefemale.jpg";if($row["gender"]=='o') echo "images/samplegeneric.jpg";}?>" class="img-responsive" alt="">
				</div>
				
				
				<div style="margin-bottom:10px">
					<center><button type="button" name="change" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#ProfileModal">Change Profile Pic</button></center>
				</div>
					<div id="ProfileModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body" style="height:200px;">
								<form method="POST" action="includes/deleteprofilepic.inc.php">
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-6">
											<input type="submit" class="btn btn-danger" value="Delete Profile Picture" name="submit">
										</div>
									</div>
								</form>
								<br><br><br><center><p>OR</p></center>
								<form method="POST" action="includes/uploadprofilepic.inc.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-6">
											<label for="image" class="custom-file-upload">Choose Image</label>
											<input type="file" name="image" id="image"/>
										</div>	
										<div class="col-sm-6">
											<input type="submit" class="btn btn-primary" value="Upload Profile Picture" name="submit">
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
						<?php echo $row["fn"]." ".$row["ln"];?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $skillrow['mainskill'];?>
					</div>
				</div>
				
				
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a data-toggle="tab" href="#personalinfo">
							<i class="glyphicon glyphicon-user"></i>
							Personal Information </a>
						</li>
						<li>
							<a data-toggle="tab" href="#skills">
							<i class="glyphicon glyphicon-briefcase"></i>
							Skills </a>
						</li>
						<li>
							<a data-toggle="tab" href="#accountsettings">
							<i class="glyphicon glyphicon-cog"></i>
							Settings </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="tab-content">
		<div class="col-md-9 tab-pane fade in active" id="personalinfo">
            <div class="profile-content">
			 
			 <form action="includes/changedetails.inc.php" class="form-horizontal col-sm-offset-2 col-sm-6"  style="margin-top:20px;" id="f1" onsubmit="return validateForm();" method="POST">
				
				<div class="form-group">
					<label for="fn" class="control-label col-sm-4" >First Name: </label>
					<div class="col-sm-8">
						<input type="text" value="<?php echo $row["fn"]; ?>" class="form-control" name="fn" id="fn" placeholder="First Name">
					</div>
				</div>
				
				<div class="form-group">
					<label for="ln" class="control-label col-sm-4" >Last Name: </label>
					<div class="col-sm-8">
						<input type="text" value="<?php echo $row["ln"]; ?>" class="form-control" name="ln" id="ln" placeholder="Last Name">
					</div>
				</div>
				<div  class="form-group">
					<label class="control-label col-sm-4">Gender</label>
					<div class="col-sm-8">
					<input type="radio" name="gender" value="m" <?php if($row["gender"]=='m') echo "checked";?>> Male
					<input type="radio" name="gender" value="f" <?php if($row["gender"]=='f') echo "checked";?>> Female
					<input type="radio" name="gender" value="o" <?php if($row["gender"]=='o') echo "checked";?>> Other  
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-sm-4" >Email ID: </label>
					<div class="col-sm-8">
					  <input disabled type="email" value="<?php echo $row["email"]; ?>" class="form-control" name="email" id="email" placeholder="Email Address">
					</div>
				</div>	
				<div class="form-group">
					<label for="phn" class="control-label col-sm-4" >Mobile: </label>
					<div class="col-sm-8">
					  <input type="tel" value="<?php echo $row["phn"]; ?>" class="form-control" name="phn" id="phn" placeholder="Mobile Number">
					</div>
				</div>	
				
				<div class="form-group">
					<label for="dob" class="control-label col-sm-4" >DOB: </label>
					<div class="col-sm-8">
					  <input type="text" value="<?php echo $row["dob"]; ?>" class="form-control" name="dob" id="dob" placeholder="DOB(YYYY-MM-DD)">
					</div>
				</div>	
				<div class="form-group">	
					<label for="stateList" class="control-label col-sm-4" >State: </label>
					<div class="col-sm-8">
					  <select id="stateList" name="state" onchange="selectDist(this.value)" class="form-control" onclick="javascript: $.getScript('scripts/india.js');this.onclick=null;" />> 
						<option value="<?php echo $row["state"]; ?>" selected><?php echo $row["state"]; ?></option>
					  </select>
					</div>
				</div>
				<div class="form-group">	
					<label for="districtList" class="control-label col-sm-4" >District: </label>
					<div class="col-sm-8">
					  <select id="districtList" name="city" class="form-control">
						<option value="<?php echo $row["city"]; ?>" selected><?php echo $row["city"]; ?></option>
					</select>
					</div>
				</div>	
				<br>
				<div class="form-group">	
					<div class="col-sm-offset-4 col-sm-6">
						<button type="submit" class="btn btn-success" id="sub" style="width:100%;" name="submit">Save Changes</button>
					</div>
				</div>
				<center><span id="message" style="font-size:16px;color:red;text-align:center" class="col-sm-offset-2 col-sm-16"></span></center>
			 </form>

			</div>
		</div>
		
		
		<div class="col-md-9 tab-pane fade" id="skills">
            <div class="profile-content">
				<div id="skillformdiv">
				   
				</div>
			</div>
			<br>
				<div class="profile-content">
					<form class="form-horizontal col-sm-offset-1 col-sm-10" id="allskillsform" action="includes/addskill.inc.php" method="POST">
						<div class="form-group">
						<label for="os" class="control-label col-sm-3" >Skills: </label>
						<div class="col-sm-5">
							<select class="form-control" name="os">
								<option disabled selected>SELECT SKILL</option>
								<option value="Adobe FUSE">Adobe FUSE</option>
								<option value="Autodesk 3ds Max">Autodesk 3ds Max</option>
								<option value="Autodesk Maya">Autodesk Maya</option>
								<option value="Blender">Blender</option>
								<option value="C#">C#</option>
								<option value="C++">C++</option>
								<option value="Cinema 4D">Cinema 4D</option>
								<option value="Corona">Corona</option>
								<option value="CryEngine">CryEngine</option>
								<option value="CSS">CSS</option>
								<option value="DAZ 3D">DAZ 3D</option>
								<option value="DirectX">DirectX</option>
								<option value="Flash">Flash</option>
								<option value="FMod">FMod</option>
								<option value="Game Maker">Game Maker</option>
								<option value="Game Studio">Game Studio</option>
								<option value="HTML">HTML</option>
								<option value="iClone">iClone</option>
								<option value="Java">Java</option>
								<option value="JavaScript">JavaScript</option>
								<option value="jMonkey Game Engine">jMonkey Game Engine</option>
								<option value="Leadwerks">Leadwerks</option>
								<option value="Lua">Lua</option>
								<option value="MakeHuman">MakeHuman</option>
								<option value="Maximo">Maximo</option>
								<option value="Ogre">Ogre</option>
								<option value="OpenGL">OpenGL</option>
								<option value="PHP">PHP</option>
								<option value="Python">Python</option>
								<option value="Ruby">Ruby</option>
								<option value="Serious Engine">Serious Engine</option>
								<option value="Source 2">Source 2</option>
								<option value="Source Engine">Source Engine</option>
								<option value="Torque3D">Torque3D</option>
								<option value="Unity 3D">Unity 3D</option>
								<option value="Unreal Engine">Unreal Engine</option>
								<option value="Visual Basic">Visual Basic</option>
								<option value="Vue">Vue</option>
								<option value="XML">XML</option>
								<option value="ZBrush">ZBrush</option>
							</select>
						</div>
						<div class="col-sm-3">
							<button type="button" class="btn btn-primary" onclick="addskill('#allskillsform')">Add Skill</button>
						</div>
						</div>
					</form>	
					<div class="col-sm-offset-1 col-sm-10">
					<div class="col-sm-offset-3" id="allskills">
						
					</div>
					</div>
			   </div>
        </div>
		<div class="col-md-9 tab-pane fade" id="accountsettings">
            <div class="profile-content">
				<form class="form-horizontal" action="includes/changepassword.inc.php" method="POST" id="passform">
					<div class="form-group">
						<label for="currpass" class="control-label col-sm-4" >Current Password: </label>
						<div class="col-sm-6">
						  <input type="password" class="form-control" name="currpass" id="currpass" placeholder="Enter Current password">
						</div>
					</div>
					<div class="form-group">
						<label for="newpass" class="control-label col-sm-4" >New Password: </label>
						<div class="col-sm-6">
						 <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter New password">
						</div>
					</div>
					<div class="form-group">
						<label for="renewpass" class="control-label col-sm-4" >Confirm New Password: </label>
						<div class="col-sm-6">
						 <input type="password" class="form-control" name="renewpass" id="renewpass" placeholder="Re-enter New password">
						</div>
					</div>
					<div class="form-group">	
					<div class="col-sm-offset-4 col-sm-4">
						<button type="button" class="btn btn-danger" id="sub"  onclick="savedata('#passform');">Change Password</button>
					</div>
					</div>
				</form>
			</div>
			<br>
			<div class="profile-content">
				<form id="workform" class="form-horizontal col-sm-offest-1 col-sm-10" method="POST" action="includes/work.inc.php">
				<div class="form-group"> 
					<label class="control-label col-sm-4">Are you willing to work ?</label>
					<div class="col-sm-2">
						<select name="work" class="form-control" onchange="deletedata('#workform')">
							<option value="Yes" <?php if($row['work']=="Yes") echo "selected"?>>Yes</option>
							<option value="No" <?php if($row['work']=="No") echo "selected"?>>No</option>
						</select>
					</div>
				</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>