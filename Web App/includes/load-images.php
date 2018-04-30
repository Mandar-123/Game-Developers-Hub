<?php
			session_start();
			$foldername=$_SESSION['email'];
			$dirname="../userimages/$foldername/";
			$images=glob($dirname."*.*");
			$fno=1;
			foreach($images as $image)
			{
				echo "<div class='col-md-offset-1 col-md-10'>
					<div class='panel panel-default' style='margin-right:auto'>
						<div class='panel-image' >
							<img src='".substr($image,3)."' class='panel-image-preview'/>
						</div>
						<div class='panel-footer text-center'>
							<form action='includes/imagedelete.inc.php' method='POST' style='display:inline' id='Image".$fno."'>
							<input name='i_name' type='hidden' value='".substr($image,3)."'/>
							<button style='background-color:transparent;border:none' name='submit' type='button'  onclick=\"deletedata(".'\'#Image'.$fno."'".");loadimages();\"><i class='glyphicon glyphicon-remove' style='cursor:pointer;font-size:2.5vw'></i></button>
							</form>
						</div>
					</div>
				</div>";
				$fno++;
			}
?>