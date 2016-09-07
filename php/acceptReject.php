<?php
	include_once 'loginCheck.php';
	if($_POST['action'] == 'accept'){
		$query = "UPDATE LeaveHistory SET Status='ACCEPTED' WHERE AppliedBy=? AND AppliedTo=? AND FromDate=? AND Status='PENDING'";
	}
	else{
		$query = "UPDATE LeaveHistory SET Status='REJECTED' WHERE AppliedBy=? AND AppliedTo=? AND FromDate=? AND Status='PENDING'";
	}
	$conn = new mysqli('localhost','root','','Leave-Application');
	$stmnt = $conn->prepare($query);
	$stmnt->bind_param('sss',$_POST['AppliedBy'],$_SESSION['sub'],$_POST['fromDate']);
	$stmnt->execute();
	if($stmnt->affected_rows>0){
		echo json_encode('success');
	}
	else{
		echo json_encode('failed');
	}
	$stmnt->close();
?>