<?php 

	$host = "localhost";
	$user = "root";
	$password = "";
	$dbName = "Leave-Application";
	$connection = new mysqli($host,$user,$password,$dbName);
	$query = "SELECT LeaveType,FromDate,ToDate,Status FROM LeaveHistory WHERE AppliedBy='abc' ORDER BY AppliedBy DESC LIMIT 1";
	$statement = $connection->prepare($query);
	$statement->execute();
	
	$statement->bind_result($LeaveType,$FromDate,$ToDate,$Status);

	while( $statement->fetch() ){

		$datediff=date_diff( date_create($FromDate),date_create($ToDate))->invert+2;
		$rowdata = array($LeaveType,$FromDate,$ToDate,$datediff,$Status);
		echo json_encode($rowdata);

	}
	
	$statement->close();

 ?>