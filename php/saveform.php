<?php
	session_start();
	if(isset($_SESSION['sub'])){
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

		$appliedBy = $_SESSION['sub'];
		$appliedTo = "abcd";
		$fromDate = "2016-02-25";
		$toDate = "2016-03-25";
		$type = "casual";
		$note = "note";
		$query = "INSERT INTO LeaveHistory (AppliedBy,AppliedTo,FromDate,ToDate,LeaveType,Note) VALUES (?,?,?,?,?,?)";
		$connection = new mysqli($host,$user,$password,$dbName);
		$statement = $connection->prepare($query);
		$statement->bind_param("ssssss",htmlspecialchars($appliedBy),htmlspecialchars($appliedTo),htmlspecialchars($fromDate),htmlspecialchars($toDate),htmlspecialchars($type),htmlspecialchars($note));
		$statement->execute();
		echo $statement->affected_rows;
		$statement->close();
	}
 ?>