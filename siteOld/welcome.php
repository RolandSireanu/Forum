<?php
	session_start();
	echo session_id();
?>

<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

<?php
	if(isset($_COOKIE["name"]) && isset($_COOKIE["age"]))
	{			
		echo "<br> Cookies set ! <br>";
		echo $_COOKIE["name"];
	}

	echo "<br>";
	echo $_SESSION["counter"];
	
?>
</body>
</html>
