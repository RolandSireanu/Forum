<?php

	$topicID = null;

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$topicID = $_GET["show"];
	}
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


	<div class="container">
		<div class="posts">	

			<?php 
				include "ApiDB.php";
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);

				foreach(GetPostsTopicID($topicID) as $p)
				{
			?>

			<div class="post">
				<span class="postNr"> #1 </span>
				<img class = "imgUser" src="images/right-arrow.png" width="20px" height="20px">
				<div class="postUser"> <?php echo $p["username"]; ?>
					<span style="float:right; margin-right: 200px;">Wed 12.05.1992</span>
				</div>
			</div>			
			<div style="background-color:#fffffa;">
				<div class="userInfo"><img src="images/unknown.png" width="75px" height="75px" style="margin-top:10px;"> 
				</div>
				<div class="userComment"> 
					<?php echo $p["Text"]; ?>
				</div>
			</div>		
			
			<br>
			<?php } ?>
			<!-- <div class="post">
				<span class="postNr"> #1 </span>
				<img class = "imgUser" src="images/right-arrow.png" width="20px" height="20px">
				<div class="postUser"> Roland 
					<span style="float:right; margin-right: 200px;">Wed 12.05.1992</span>
				</div>
			</div>						
			<div style="background-color:#fffffa;">
				<div class="userInfo"><img src="images/unknown.png" width="75px" height="75px" style="margin-top:10px;"> 
				</div>
				<div class="userComment"> Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie ! 
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
					Roland mergea la lucru in fiecare 		zi dar acum sta acasa si sforaie !
				</div>
			</div>		-->
		</div>				
	</div>

</body>
</html>