 <?php
	include_once 'loginCheck.php';
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbName = "Leave-Application";
	$google_UID=$_SESSION["sub"];

	$query="SELECT AppliedBy,FromDate,ToDate,LeaveType,Note FROM LeaveHistory WHERE AppliedTo=?";
	$connection = new mysqli($host,$user,$password,$dbName);
	$statement=$connection->prepare($query);
	$statement->bind_param("s",$google_UID);
	$statement->execute();
	$statement->bind_result($AppliedBy,$FromDate,$ToDate,$LeaveType,$Note);
	$statement->fetch();
	$datediff=date_diff( date_create($FromDate),date_create($ToDate));
	$datediff=$datediff->format("%R%a days");
	$final = array(array($AppliedBy,$FromDate,$ToDate,$datediff+1,$LeaveType,$Note));
	while( $statement->fetch() ){
		$datediff=date_diff( date_create($FromDate),date_create($ToDate));
		$datediff=$datediff->format("%R%a days");
		array_push($final,array($AppliedBy,$FromDate,$ToDate,$datediff+1,$LeaveType,$Note));
	}
	echo json_encode($final);

	$statement->close();

 ?>