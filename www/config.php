<?php
	#define("DBHOST", "mysqlhost:3306");
	define("DBHOST" , "mysql_server:3306");
	define("DBUSER" , "root");
	define("DBPASS" , "root");

	$db = new mysqli(DBHOST, DBUSER, DBPASS, "Forum");
	if($db->connect_errno)
	{
		echo "Failed to connect to db ".$db->connect_error;
		exit();
	}
?>