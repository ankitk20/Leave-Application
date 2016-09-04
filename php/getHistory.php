<?php 

	$host = "localhost";
	$user = "root";
	$password = "";
	$dbName = "Leave-Application";
	$connection = new mysqli($host,$user,$password,$dbName);
	$query = "SELECT LeaveType,FromDate,ToDate,Status FROM LeaveHistory WHERE AppliedBy='abcd'";
	$statement = $connection->prepare($query);
	$statement->execute();
	
	echo json_encode($statement->affected_rows);
	
	$statement->close();

 ?>