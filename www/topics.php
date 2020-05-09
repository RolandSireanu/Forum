<?php
	
	include "ApiDB.php";	

	ini_set("display_errors" , 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


	$discID = null;

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$discID = $_GET["show"];
	}
	else if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["subject"]) && isset($_POST["message"]))
	{
		echo "I will add this message into the db ! ";
		$discID = $_POST["show"];
	}
	else if(($_SERVER["REQUEST_METHOD"] == "POST") && !

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
  	<span>user:Rld </span>
  </div>
</div>


<table class="tableclass">
	<tr style="height: 50px ;">
		<td width="8%" class="topicImg" align="center" style="border-bottom: 1px solid black;">
			<svg class="bi bi-book" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z" clip-rule="evenodd"/>
			  <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0115 2.82z" clip-rule="evenodd"/>
			</svg>

		</td>
		<td colspan="1" style="padding-left: 10px;  background-color: #cdcddd; font-weight: 600; border-bottom: 1px solid black;" 
		    width="70%"> Topics </td>
		<td style="background-color: #cdcddd; border-bottom: 1px solid black;" align="center"> 
			Last modified 
		 </td>
	</tr>

	<?php			

		try
		{
			foreach(GetTopicsFromDiscId($discID) as $topicsRow)
			{				
	?>

	<tr>
		<td width="8%" align="center" class="topicImg">
			<svg class="bi bi-pencil-square topicImg" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
			  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
			</svg>
		</td>
		<td id="<?php echo $topicsRow['TopicID'] ?>" class="directoryClass topics" colspan="2"> 
			<?php echo $topicsRow["Name"] ?>
		 </td>
	</tr>
	<?php }
		}
		catch(Exception $e)
		{
			echo "Caught exception : ", $e->getMessage(), "\n";
		}
	?>
</table>



<div class="newTopic">
	<form action="<?php echo 'topics.php?show='. $discID; ?>" method="POST">		
		<div style="margin-left: 138px; font-size:20px; margin-top:20px;">Subject : </div>		
		<div style="justify-self: stretch; text-align:center;">
			<input type="text" name="subject" value="" style="margin-left:50px; width:75%;">
		</div>
		<div style="margin-left: 138px; font-size:20px;">Comment : </div>
		<div style="text-align:center; justify-self: stretch;">
			<textarea name="message" rows="10" style="margin-left:50px; width:75%;">Comment here ... </textarea>
		</div>
		<div style="text-align:right; justify-self: stretch;">
			<button type="submit" class="newTopicButton">New topic</button>

			
		</div>
	</form>
</div>

</body>
<script src="animations.js"></script>
</html>