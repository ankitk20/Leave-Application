<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$connection = new mysqli("localhost","root","","Leave-Application");
		$query = "SELECT LeaveType,FromDate,ToDate,AppliedTo,Status FROM LeaveHistory WHERE AppliedBy=? ORDER BY AppliedBy DESC";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$statement->bind_result($LeaveType,$FromDate,$ToDate,$AppliedTo,$Status);
		$statement->fetch();
		$datediff=date_diff( date_create($FromDate),date_create($ToDate))->invert+2;
		$final = array(array($LeaveType,$FromDate,$ToDate,$datediff,$AppliedTo,$Status));
		while( $statement->fetch() ){
			$datediff=date_diff( date_create($FromDate),date_create($ToDate))->invert+2;
			array_push($final,array($LeaveType,$FromDate,$ToDate,$datediff,$AppliedTo,$Status));
		}
		echo json_encode($final);
		$statement->close();
	}
 ?>