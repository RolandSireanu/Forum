<?php
	session_start();
	echo session_id();
	ini_set("session.save_path" , "/sessions");
		

	if(isset( $_SESSION["counter"]))
	{
		$_SESSION["counter"] += 1;
	}
	else
	{
		$_SESSION["counter"] = 1;
	}

	$msg = "You have visited this page". $_SESSION["counter"];

	setcookie("name" , "Roland" , time()+3600 , "/" , "" , 0);
	setcookie("age" , "27" , time()+3600 , "/" , "" , 0);
?>


<html>
<body>



<?php
	echo $msg;
	$salary = $_POST["salary"];
	$jobTitle = $_POST["jobTitle"];

	$salaryWithReq = $_REQUEST["salary"];

	if($salary == $salaryWithReq)
	{
		echo "The salary is the same !";
	}

	if($salary > 1000)
	{
		echo "When I will grow older I want to be ".$jobTitle;
	}


	$name = "Roland";
	define("ONE" , 1);
	
	$salaries = array("mohammad" => 2000, "qadir" => 1000, "zara" => 500);	


	function writeSms()
	{
		GLOBAL $name;
		STATIC $counter = 0;
		$counter=$counter+ONE;
		$cars = array("Dacia", "Renault", "Audi");
		print("<h1>My name is $name , access number $counter </h1>");
		$nrOfCars = count($cars);		
		print("Number of cars : $nrOfCars");
		echo $cars[0];

		foreach( $cars as $car ) 
		{
			echo "Car : $car<br>";
		}

		$nr1 = 1.25;
		$nr2 = 3;
		$result = $nr1 + $nr2;
		print("$nr1 + $nr2 = $result");

		if(TRUE)
		{
			print("<h3>It is true </h3>");
		}

	}

	function loops()
	{
		for($i=0; $i<10; $i++)
		{
			print("i=$i");
		}
	}

	function printMap()
	{
		GLOBAL $salaries;
		

		echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
	}	


	function stringConcat()
	{
		$firstName = "Sireanu";
		$lastName = "Roland";

		echo $firstName." - ".$lastName;
	}


	function getBrowser()
	{
		$agent = $_SERVER["HTTP_USER_AGENT"];
		$platform = Null;	
		$browser = Null;

		if(preg_match('/linux/i' , $agent))
		{
			$platform = "Linux";
		}
		else
		{
			$platform = "Unknown";			
		}

		if(preg_match('/Chrome/' , $agent))
		{
			$browser = "Google Chrome";
		}
		elseif(preg_match('/Firefox/' , $agent))
		{
			$browser = "Mozila Firefox";
		}


		echo $agent;
		echo $platform;
		echo $browser;

	}

	function writeInFile()
	{
		$file = fopen("temp.txt" , "w");

		if($file == false)
		{
			echo ("File error !");
			exit();
		}
		
		fwrite($file , "Hello World !");
		

		fclose($file);

	}

	function readFromFile()
	{
		$filen = "temp.txt";

		$file = fopen( $filen , "r" );

		if($file == false)
		{
			echo ("File access error ! ");
			exit();
		}

		$fsize = filesize($filen);
		$ftext = fread( $file , $fsize);
		fclose($filen);
		echo( "File size is = $fsize" );
		echo( "Text : $ftext " );

		
	}

	#Pass by ref
	function changeArg(&$arg1 = 10)
	{
		echo "changeArg receive as arg : $arg1";

		if($arg1 % 2 == 1)
		{
			$arg1 = 0;
		}
		else
		{
			$arg1 = 1;
		}
	}


?>

<form action="welcome.php?<?php echo htmlspecialchars(SID); ?>" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<br><br>

<form action = "<?php $_PHP_SELF ?>" method = "POST">
	Job Title : <input type="text" name="jobTitle">
	Salary : <input type="text" name="salary">
	<input type="submit">
</form>

<br>
<br>

<form action="redirect.php" method="POST">
	<select name="location">

		<option value="https://www.google.ro">
			Google.ro
		</option>

		<option value="https://www.yahoo.com">
			Yahoo.com
		</option>

	</select>
	<input type="submit">
</form>

<?php
	writeSms();
	writeSms();
	loops();	
	printMap();
	stringConcat();
	getBrowser();
	writeInFile();
	echo "<br>Read from file ...";
	readFromFile();
	$nr1 = 26;
	changeArg($nr1);
	echo $nr1;
	$pFunction = "changeArg";
	$pFunction();
	#include("info.php");
	#$ret = mail("sireanu.roland@gmail.com" , "Me , from the future" , "Hello");
	// if($ret == true)
	// {
	// 	echo "<br>Email sent successfully !";
	// }
	// echo "<br> REt value = $ret";

?> 


</body>
</html>
