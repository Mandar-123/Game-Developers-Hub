<?php
				include 'dbh.inc.php';
				session_start();
				$id=$_SESSION['email'];
				$sql="SELECT * FROM link WHERE email='$id';";
				$result=mysqli_query($conn,$sql);
				$fno=1;
				if (mysqli_num_rows($result) > 0) 
				{
				while($row = mysqli_fetch_assoc($result)) 
				{
				
				echo"<div class='col-md-offset-1 col-md-10 border' style='padding-bottom:10px;'>
					<div>
						<div class='col-md-12 gly'>
						<form action='includes/deletelink.inc.php' style='display:inline;float:right;' method='POST' id='"."Link".$fno."'>
							<input type='hidden' name='link' value='".$row['link']."' />
							<button style='background-color:transparent;border:none' name='submit' type='button' onclick=\"deletedata(".'\'#Link'.$fno."'".");loadlinks()\"><i class='glyphicon glyphicon-remove' style='font-size:10px;'></i></button>
						</form>
						</div>
					</div>
					<div>
						<div class='col-md-2'>
							<strong>Description:</strong>
						</div>
						<div class='col-md-10'>
							<p>".$row['des']."</p>
						</div>
					</div>
					<div>
						<div class='col-md-2'>
							<strong>Link:</strong>
						</div>
						<div class='col-md-10'>
							<a class='link' target='_blank' href='".$row['link']."'>".$row['link']."</a>
						</div>
					</div>
				</div>";
				$fno++;
				}
				}
?>