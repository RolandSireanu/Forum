<?php
    
    include "config.php";

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$errMsg = null;
	 
	function GetAllDiscussions()
	{	 	
		global $db;		
		
		$resultSet = $db->query("CALL GetDiscussions()");
		if($resultSet != null)
		{			
			while($row = $resultSet->fetch_assoc())
			{
				yield $row;
			}
		}
		else
		{
			echo "ResultSet is null ";
			return null;
		}
	}

	function GetTopicsFromDiscId($arg_discID)
	{
		global $db;

		$resultSet = $db->query("CALL GetTopicsFromDiscID($arg_discID)");
		if($resultSet != null)
		{
			while($row = $resultSet->fetch_assoc())
			{
				yield $row;
			}
		}
		else
		{
			echo "Result set is null ";
			return null;
		}
	}

	function GetPostsTopicID($arg_topicID)
	{

		global $db;		

		$resultSet = $db->query("CALL GetPostFromTopic($arg_topicID)");

		if($resultSet != null)
		{
			while($row = $resultSet->fetch_assoc())
			{
				yield $row;
			}
		}
		else
		{	
			echo "Topics dataset invalid ! ";
			return null;
		}
	}
	
	/*
	try
	{
		echo "Calling GetAllDiscussions\n";
		foreach(GetAllDiscussions() as $d)
		{
			echo $d;
		}
		echo "Return from call\n";
	} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	*/

?>