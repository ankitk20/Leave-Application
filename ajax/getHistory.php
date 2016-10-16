<?php
	$connection = new mysqli("localhost","root","","Leave-Application");
	$query = "SELECT l.LeaveType,l.FromDate,l.ToDate,l.AppliedTo,l.Status,s.FirstName,s.LastName FROM LeaveHistory l,StaffDetails s WHERE AppliedBy=? AND l.AppliedTo=s.Google_UID ORDER BY FromDate DESC";
	$statement = $connection->prepare($query);
	$statement->bind_param('s',$_SESSION['sub']);
	$statement->execute();
	$statement->bind_result($LeaveType,$FromDate,$ToDate,$AppliedTo,$Status,$FirstName,$LastName);
	$statement->fetch();
	$datediff = ((strtotime($ToDate) - strtotime($FromDate))/(86400)+1);
	$final = array(array('Type'=>$LeaveType,'From'=>$FromDate,'To'=>$ToDate,'NoOfDays'=>$datediff,'AppliedTo'=>$FirstName.' '.$LastName,'Status'=>$Status,'ID'=>$AppliedTo));
	while( $statement->fetch() ){
		$datediff = ((strtotime($ToDate) - strtotime($FromDate))/(86400)+1);
		array_push($final,array('Type'=>$LeaveType,'From'=>$FromDate,'To'=>$ToDate,'NoOfDays'=>$datediff,'AppliedTo'=>$FirstName.' '.$LastName,'Status'=>$Status,'ID'=>$AppliedTo));
	}
	echo json_encode($final);
	$statement->close();
 ?>