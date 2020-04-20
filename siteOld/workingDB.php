<?php
   ini_set("display_errors",1);
   error_reporting(E_ALL);
   mysqli_debug("d:t:o,/temp/client.trace");
   echo "Hello world";
   $dbhost = 'mysqlhost:3306';
   $dbuser = 'root';
   $dbpass = 'root';

   $conn = new mysqli($dbhost, $dbuser, $dbpass, "testapp");

   if($conn -> connect_errno ) {
	  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  		exit();      
   }
   echo 'Connected successfully';

   #$sql = "CREATE Database test_db";
   #$retval = $conn->query($sql);

   // if(! $retval )
   // {
   // 	die("Could not create database ! ".mysqli_error());
   // }


   $ret = $conn->query("INSERT INTO Customers (NAME, AGE) VALUES ('Sireanu',21)");

   if(!$ret)
   {
   		echo("Errorcode: " . $conn -> errno);
   		die("insertion failed !");
   }

   if(!$conn->commit())
   {
   		echo "Commit failed !";
   		exit();
   }

   if(!$conn->query("CALL AddToDataBase(55 , 'Rolica')"))
   {
   		echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
   }

   $conn -> close();
  # mysql_close($conn);
?>