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



<!-- WITH totalSalaries(totalSalary , Company) AS (SELECT SUM(salary) , company FROM TestSalaries GROUP BY company), avgSalaries(avgSal) AS (SELECT AVG(salary) FROM TestSalaries) SELECT company FROM totalSalaries , avgSalaries WHERE totalSalaries.totalSalary > avgSalaries.avgSal

INSERT INTO Topics(Name , DiscID_FK) VALUES ("Searching Algorithms" , (SELECT DiscID FROM Discussions WHERE Name = "Algorithms" ))

INSERT INTO Posts (Text , TopicID_FK , UserID_FK) VALUES ("Roland merge la lucru" , (SELECT TopicID FROM Topics WHERE Name = "GraphAlgorithms") , (SELECT ID FROM Users WHERE username = "roland"))

SELECT D.Name , T.Name FROM Discussions D INNER JOIN Topics T ON D.DiscID = T.DiscID_FK

if(!$conn->query("CALL AddToDataBase(55 , 'Rolica')"))
  {
                echo "CALL failed: (" . $conn->errno . ") " . $conn->error;
   }
 -->