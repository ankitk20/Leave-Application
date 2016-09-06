<?php 
	session_start();

	$connection = new mysqli("localhost","root","","Leave-Application");
	$fromDate=$_POST["fromDate"];
	// $fromDate="2016-09-23";
	$googleUID=$_SESSION["sub"];
	$query="DELETE FROM LeaveHistory WHERE AppliedBy=? AND FromDate=? AND AppliedTo=?";
	$statement=$connection->prepare($query);
	$statement->bind_param("sss",$googleUID,$fromDate,$_POST['AppliedTo']);
	$statement->execute();
	if($statement->affected_rows>0){
		echo json_encode("successfully cancelled");
	}
	else{
		echo json_encode("failed to cancel");
	}
 ?>