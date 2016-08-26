<?php 	
		session_start();

		$host = "localhost";
		$user = "root";
		$password = "";
		$dbName = "Leave-Application";
		
		// $appliedBy = $_SESSION["name"];
		// $appliedTo = $_POST["appliedTo"];
		// $fromDate = $_POST["fromDate"];
		// $toDate = $_POST["toDate"];
		// $type = $_POST["type"];
		// $note = $_POST["note"];

		$appliedBy = "ankit";
		$appliedTo = "tikna";
		$fromDate = "2016-02-25";
		$toDate = "2016-03-25";
		$type = "casual";
		$note = "note";
				
		$query = "INSERT INTO LeaveHistory (AppliedBy,AppliedTo,FromDate,ToDate,LeaveType,Note) VALUES (?,?,?,?,?,?)";

		$connection = new mysqli($host,$user,$password,$dbName);

		$statement = $connection->prepare($query);
		$statement->bind_param("ssssss",$appliedBy,$appliedTo,$fromDate,$toDate,$type,$note);
		$statement->execute();
		
		echo $statement->affected_rows;
		
		$statement->close();

 ?>