<?php
	
	include "config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
	{
		$username = $_POST["username"];
		$password_1 = $_POST["password"];
		$password_2 = $_POST["password_double"];

		$q_user = "SELECT * FROM Users WHERE username='$username'";
		$user_check = True;

		if ($result = $db->query($q_user))
		{	
			if($result->num_rows > 0)
			{
				echo $result->num_rows; 
				$row = $result->fetch_assoc();
				echo $row["username"]."  ".$row["password"];		
				$user_check = False;
			}

		}
		else
		{
			echo "Failed to retrive data from db!";
		}

		$pass_check = $password_1 == $password_2 ? True : False;

		if ($user_check && $pass_check)
		{
			$hashed_pass = password_hash($password_1 , PASSWORD_BCRYPT);
			$q_insert = "INSERT INTO Users (username, password) VALUES ('$username', '$hashed_pass')";
			if($db->query($q_insert) == False)
			{
				echo "Failed to insert data into db ";
			}
			else
			{
				header("Location: index.php");
			}

		}

		if($user_check == False)
		{			
			$errMsg = "User already taken !";
		}

		if($pass_check == False)
		{
			$errMsg = "Not the same password ! ";			
		}		
	}


?>

<!DOCTYPE html>
<html>    
    <head>        
        <meta charset = "utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel = "stylesheet" type = "text/css" href = "style.css" />
        <title></title>
    </head>
    <body>
    	<div class="register">
    		<h3> Register form </h3>
    		<form action="" method="post">
    			
	    		<input type="text" name="username" placeholder="username">
	    		<input type="password" name="password" placeholder="password">
	    		<input type="password" name="password_double" placeholder="password again">
	    		<button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Register</button>
	    	</form>
	    	<b><font style="font-size: 12; font-family:verdana">
	    		<?php
	    			echo $errMsg;
	    		?>
	    	</font></b>
    	</div>

    </body>
</html>