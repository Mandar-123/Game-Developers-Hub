<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		header("Location: home.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>StartUp Hub</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="External/jquery-3.2.1.min.js"></script>
		<script src="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src='scripts/india.js'></script>
		<style>
		body{
			background-size:cover;
			background-attachment:fixed;
		}
		#f1 select{
			border:1px solid gray;
		}
		#f1 input{
			border:1px solid gray;
		}
		</style>
		<script>
		function validatelogin()
		{
			var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if($("#loginid").val()=="" || $("#logpass").val()=="" )
			{
				alert('Please fill all the details !');
				return false;
			}	
			else if(re.test($("#loginid").val())==false)
			{
				alert("Invalid Email Address!");
				return false;
			}
			else return true;
		}
		function validateForm()
		{
			var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var name=/^[a-zA-Z]*$/;
			var dobr=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
			if($("#email").val()=="" || $("#pass").val()=="" || $("#cpass").val()=="" ||$("#fn").val()==""||$("#ln").val()=="" || $("#dob").val()=="" ||$("#stateList").val()==null || $("#districtList").val()==null)
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
		</script>
	</head>
<body background="images/back.jpg" spellcheck="false">
<nav class="navbar navbar-inverse" style="border-radius:0px;padding:0px;">
  <div class="container-fluid" style="margin-left:0px; padding-left:0px;">
    <div class="navbar-header"  style="margin-left:5px">
      <a class="navbar-brand" href="#"><strong>IGDH</strong></a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="#register"><strong>Register</strong></a></li>
		<li><a href="#events"><strong>Upcoming Events</strong></a></li>
		<li><a href="#Blog"><strong>Blog</strong></a></li>
		<li><a href="#about"><strong>About</strong></a></li>
	</ul>
	<form action="includes/login.inc.php" class="navbar-form navbar-right" method="POST" onsubmit="return validatelogin();">
		<input type="email" name="loginid" id="loginid" class="form-control" style="width:250px" placeholder='Enter E-mail'>
		<div class="input-group">
			<input type="password" name="pass" id="logpass" placeholder='Enter Password' class="form-control">
			<span class="input-group-addon " onclick="if(logpass.type=='text') logpass.type='password'; else logpass.type='text';"><i class="glyphicon glyphicon-eye-open"></i></span>
		</div>
		<button type="submit" name="submit" id="s1"  class="btn btn-primary">Login</button>
	</form>
  </div>
</nav>

<form action="includes/signup.inc.php" class="form-horizontal col-sm-offset-1 col-sm-4"  style="margin-top:100px;" id="f1" onsubmit="return validateForm();" method="POST">
  <div class="form-group">
    <div class="col-sm-6">
      <input type="text" class="form-control" name="fn" id="fn" placeholder="First Name">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="ln" id="ln" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6">
      <input type="tel" class="form-control" name="phn" id="phn" placeholder="Phone Number">
    </div>
	<div class="col-sm-6">
      <input type="text" class="form-control" name="dob" id="dob" placeholder="DOB(YYYY-MM-DD)">
    </div>
  </div>
	<div class="form-group">
		<div class="col-sm-6">
		  <select id="stateList" name="state" onchange="selectDist(this.value)" class="form-control">
		  </select>
		</div>
		<div class="col-sm-6">
		  <select id="districtList" name="city" class="form-control"></select>
		</div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-6">
      <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
    </div>
	<div class="col-sm-6">
      <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Re-enter Password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" class="btn btn-success" id="sub" style="width:100%;" name="submit">Register</button>
    </div>
  </div>
  <span id="message" style="font-size:16px;color:red;float:left;text-align:center" class="col-sm-12"></span>
</form>

<img src="images/image1.png" class="img-responsive" width="500" height="500" style="margin-top:50px;margin-right:100px;float:right">
<script>
<?php
	if(isset($_GET['login']))
	{
		echo "alert('".$_GET['login']."');";
	}
	else if(isset($_GET['register']))
	{
		echo "alert('".$_GET['register']."');";
	}
	else if(isset($_GET['logout']))
	{
		echo "alert('Sucessfully logged out');";
	}
?>
</script>

</body>
</html>
