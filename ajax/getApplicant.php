 <?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbName = "Leave-Application";
	$google_UID=$_SESSION["sub"];

	$query="SELECT l.AppliedBy,l.FromDate,l.ToDate,l.LeaveType,l.Note,s.FirstName,s.LastName FROM LeaveHistory l,StaffDetails s WHERE AppliedTo=? AND l.AppliedBy=s.Google_UID AND Status='PENDING'";
	$connection = new mysqli($host,$user,$password,$dbName);
	$statement=$connection->prepare($query);
	$statement->bind_param("s",$google_UID);	
	$statement->execute();
	$statement->bind_result($AppliedBy,$FromDate,$ToDate,$LeaveType,$Note,$FirstName,$LastName);
	$statement->fetch();
	$datediff = ((strtotime($ToDate) - strtotime($FromDate))/(86400)+1);
	$final = array(array('AppliedBy'=>$FirstName.' '.$LastName,'From'=>$FromDate,'To'=>$ToDate,'NoOfDays'=>$datediff,'Type'=>$LeaveType,'ID'=>$AppliedBy,'Note'=>$Note));
	while( $statement->fetch() ){
		$datediff = ((strtotime($ToDate) - strtotime($FromDate))/(86400)+1);
		array_push($final,array('AppliedBy'=>$FirstName.' '.$LastName,'From'=>$FromDate,'To'=>$ToDate,'NoOfDays'=>$datediff,'Type'=>$LeaveType,'ID'=>$AppliedBy,'Note'=>$Note));
	}
	echo json_encode($final);
	$statement->close();
 ?>