<?php
	include_once 'loginCheck.php';
	$connection = new mysqli("localhost","root","","Leave-Application");
	$fromDate=$_POST["fromDate"];
	$googleUID=$_SESSION["sub"];
	$query="DELETE FROM LeaveHistory WHERE AppliedBy=? AND FromDate=? AND ToDate=? AND LeaveType=? AND AppliedTo=? AND Status='PENDING'";
	$statement=$connection->prepare($query);
	$statement->bind_param("sssss",$googleUID,$fromDate,$_POST['toDate'],$_POST['type'],$_POST['AppliedTo']);
	$statement->execute();
	if($statement->affected_rows>0){
		echo json_encode("successfully cancelled");
	}
	else{
		echo json_encode("failed to cancel");
	}
	$statement->close();
	$noOfDays = ((strtotime($_POST['toDate']) - strtotime($_POST['fromDate']))/86400)+1;
	$statement = $connection->prepare("UPDATE LeavesLeft SET `".$_POST['type']."`=(`".$_POST['type']."` + ?) WHERE Google_UID=?");
	$statement->bind_param('is',$noOfDays,$_SESSION['sub']);
	$statement->execute();
	$statement->close();
 ?>