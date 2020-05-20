<?php
include "startCheckSession.php";
var_dump($_SESSION);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="pageStyle.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
</head>
<body>

<div class="center">
  <div class="userdata">
  	<img src="images/unknown.png" width="25%" class="imgclass">
  	<span>user:Rld <span>
  </div>
</div>


<table class="tableclass">
	<tr style="height: 50px">
		<td colspan="2" style="padding-left: 10px; border-width: 1px; border-color:#cdcddd ; background-color: #cdcddd; font-weight: 600;"> General Discussions </td>
	</tr>
	<?php 
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include "ApiDB.php";	
		
		try
		{			
			foreach(GetAllDiscussions() as $discRow)
			{
	?>
			<tr>
				<td width="8%" align="center" class="discussionImg">
					<svg class="bi bi-file-post" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M4 1h8a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V3a1 1 0 00-1-1H4z" clip-rule="evenodd"/>
					  <path d="M4 5.5a.5.5 0 01.5-.5h7a.5.5 0 01.5.5v7a.5.5 0 01-.5.5h-7a.5.5 0 01-.5-.5v-7z"/>
					  <path fill-rule="evenodd" d="M4 3.5a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
					</svg>
				</td>
				<td id="<?php echo $discRow['DiscID'] ?>" class="directoryClass disccussions">
					<?php echo $discRow['Name']; ?>		
				</td>
			</tr>		
		<?php
			}  
		}
		catch(Exception $e)	
		{
			echo "Caught exception: ", $e->getMessage(), "\n";
		}
		?>
</table>
</body>
<script src="animations.js"></script>
</html>
