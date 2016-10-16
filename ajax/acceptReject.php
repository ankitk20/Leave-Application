<?php
	if($_POST['action'] == 'accept'){
		$query = "UPDATE LeaveHistory SET Status='ACCEPTED' WHERE AppliedBy=? AND AppliedTo=? AND FromDate=? AND ToDate=? AND LeaveType=? AND Status='PENDING'";
	}
	else{
		$query = "UPDATE LeaveHistory SET Status='REJECTED' WHERE AppliedBy=? AND AppliedTo=? AND FromDate=? AND ToDate=? AND LeaveType=? AND Status='PENDING'";
	}
	$conn = new mysqli('localhost','root','','Leave-Application');
	$stmnt = $conn->prepare($query);
	$stmnt->bind_param('sssss',$_POST['AppliedBy'],$_SESSION['sub'],$_POST['fromDate'],$_POST['toDate'],$_POST['type']);
	$stmnt->execute();
	$stmnt->close();
	if($_POST['action'] == 'reject'){
		$noOfDays = ((strtotime($_POST['toDate']) - strtotime($_POST['fromDate']))/86400)+1;
		$stmnt = $conn->prepare('UPDATE LeavesLeft SET `'.$_POST['type'].'`=(`'.$_POST['type'].'` + ?) WHERE Google_UID=?');
		$stmnt->bind_param('is',$noOfDays,$_POST['AppliedBy']);
		$stmnt->execute();
		$stmnt->close();
	}
	echo json_encode('success');
	$conn->close();
?>