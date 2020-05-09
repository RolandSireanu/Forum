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
			
			echo "Result set is null ".$arg_discID;
			return null;
		}

		$resultSet->close();
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

		$resultSet->close();
	}
	
	function AddPost($arg_discID , $arg_userID , $arg_subject , $arg_message)
	{
		global $db;

		// if(!$db->query("CALL InsertTopic($arg_discID , @msg)"))
		if($db->query("CALL InsertTopic($arg_discID , '$arg_subject' , '$arg_message' , $arg_userID)") == FALSE)
		{
			echo "CALL failed: (" . $db->errno . ") " . $db->error;
		}

		// $resultSet = $db->query("CALL GetTopicBySubject('$arg_subject')");

		// echo "result set has number of rows = ".$resultSet->num_rows;

		// if($resultSet == False)
		// {
		// 	echo "ERRRRRRRRRRRRRRRRRROR ! ";
		// }
		// else
		// {
		// 	echo "Toate bune ! ";
		// }

		// if($resultSet != null)
		// {
		// 	$row = $resultSet->fetch_assoc();
		// 	$newAddedTopicID = $row["TopicID"];

		// 	echo "newAddedTopicID = ".$newAddedTopicID;

		// }
		// else
		// {
		// 	echo "Error , dataset is null 878643 ! ";
		// }

		// $resultSet->close();
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