<?php 
	session_start();
	$connection = new mysqli("localhost","root","","Leave-Application");
	$fromDate=$_POST["fromDate"];
	$googleUID=$_SESSION["sub"];
	$query="DELETE FROM LeaveHistory WHERE AppliedBy=? AND FromDate=? AND AppliedTo=? AND Status='PENDING'";
	$statement=$connection->prepare($query);
	$statement->bind_param("sss",$googleUID,$fromDate,$_POST['AppliedTo']);
	$statement->execute();
	if($statement->affected_rows>0){
		echo json_encode("successfully cancelled");
	}
	else{
		echo json_encode("failed to cancel");
	}
	$statement->close();
 ?>