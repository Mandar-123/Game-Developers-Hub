<?php
			include 'dbh.inc.php';
			session_start();
			$id=$_SESSION['email'];
			$sql="SELECT src FROM projectvideo WHERE email='$id';";
			$result=mysqli_query($conn,$sql);
			$fno=1;
			if (mysqli_num_rows($result) > 0) 
			{
			while($row = mysqli_fetch_assoc($result)) 
			{
			echo"<div class='col-md-offset-1 col-md-10'>
					<div class='panel panel-default' style='margin-right:auto'>
						<div class='panel-image'>
							<div class='embed-responsive embed-responsive-16by9'>
								<iframe class='embed-responsive-item' src='".$row['src']."' frameborder='0' allowfullscreen></iframe>
							</div>
						</div>
						<div class='panel-footer text-center'>
							<form action='includes/project-video-delete.inc.php' method='POST' style='display:inline' id='"."Video".$fno."'>
							<input name='src' type='hidden' value='".$row['src']."'/>";
							echo "<button style='background-color:transparent;border:none' name='submit' type='button' onclick=\"deletedata(".'\'#Video'.$fno."'".");loadvids();\"><i class='glyphicon glyphicon-remove' style='cursor:pointer;font-size:2.5vw'></i></button>
							</form>
						</div>
					</div>
				</div>";
				$fno++;
			}
			}
?>