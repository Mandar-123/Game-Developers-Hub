		<nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius:0px;padding:0px;margin-bottom:0px;">
		  <div class="container-fluid"  style="margin-left:0px; padding-left:0px;">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					
					<li><a href="home.php"><strong>Home</strong></a></li>
					<li><a href="showcase.php"><strong>Showcase</strong></a></li>
					<li><a href="project.php"><strong>Game</strong></a></li>
					<li><a href="#Connections"><strong>Connections</strong></a></li>
					<li><a href="#Messages" style="padding:0px 20px;padding-top:13px"><span class="glyphicon glyphicon-envelope" style="font-size:20px;margin:0px;padding:0px"></span></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>More</strong><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#bgames"><strong>Browse Games</strong></a></li>
							<li><a href="#bpeople"><strong>Browse People</strong></a></li>
						</ul>
					</li>
					<li>
						<form class="navbar-form form-responsive" action="search.php" method="POST" id="formsearch">
							<div class="form-group col-sm-12">
							<div class="input-group">
								<input type="search" name="search" placeholder='Search by Name ,Last Name or Game' class="form-control">
								<span class="input-group-addon" onclick="document.getElementById('formsearch').submit()"><i style="font-size:12px" class="glyphicon glyphicon-search"></i></span>
							</div>
							</div>
						</form>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="margin:0px;padding:0px">
							<img src="images/profilesymbol.png" width="40" height="40" id="edit" style="margin-right:4px;margin-left:20px;margin-bottom:5px;margin-top:5px;">
						</a>
						  <ul class="dropdown-menu myul" id="m1" >
							<li><a href="profile.php"><strong>Profile</strong></a></li>
							<li><a href="#Error"><strong>Report Error</strong></a></li>
							<li><a href="includes/logout.inc.php"><strong>Logout</strong></a></li>
						  </ul>
					</li>
				</ul>
			</div>
		  </div>
		</nav>