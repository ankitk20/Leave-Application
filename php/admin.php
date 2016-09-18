<?php 

	session_start();
	$connection = new mysqli("localhost","root","","Leave-Application");
	$sickquery="SELECT Google_UID,`Sick Leave`,`Earned Leave` FROM PendingLeave";

	$query="UPDATE PendingLeave SET `Sick Leave`= ?, `Casual Leave`=?, `Vacation`=?, `Early Go`=?, `Earned Leave`=? WHERE `Google_UID`=?";


	$sickstatement=$connection->prepare($sickquery);
	$sickstatement->execute();
	$result = $sickstatement->get_result();
	$sickstatement->close();
	

	if($statement=$connection->prepare($query)){
		
	}else{
		print_r("failed to prepare");
		$connection->errno;
	}
	while ($row = $result->fetch_assoc()) {  

		$statement->bind_param("iiiiis",$k = 5+$row['Sick Leave'],$a=4,$b=0,$c=4,$row['Earned Leave'],$row['Google_UID']);
		$statement->execute();
	}
	$statement->close();
	$connection->close();
 ?>