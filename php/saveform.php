<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbName = "Leave-Application";
		$appliedBy = htmlspecialchars($_SESSION['sub']);
		$appliedTo = htmlspecialchars($_POST['appliedTo']);
		$fromDate = htmlspecialchars($_POST['fromDate']);
		$toDate = htmlspecialchars($_POST['toDate']);
		$type = htmlspecialchars($_POST['type']);
		$note = htmlspecialchars($_POST['note']);
		$connection = new mysqli($host,$user,$password,$dbName);
		$query = "SELECT * FROM LeavesAllotted WHERE Designation_ID = (SELECT Designation_ID FROM StaffDetails WHERE Google_UID = ?)";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		$statement->close();
		$row = $result->fetch_assoc();
		if(isset($row[$type])){
			if((((strtotime($toDate) - strtotime($fromDate))/86400)+1) < $row[$type]){
				$query = "INSERT INTO LeaveHistory (AppliedBy,AppliedTo,FromDate,ToDate,LeaveType,Note) VALUES (?,?,?,?,?,?)";
				$statement = $connection->prepare($query);
				$statement->bind_param("ssssss",$appliedBy,$appliedTo,$fromDate,$toDate,$type,$note);
				$statement->execute();
				echo $statement->affected_rows;
				$statement->close();
			}
			else{
				echo 'out of limit';
			}
		}
		else{
			echo 'else';
		}
	}
 ?>