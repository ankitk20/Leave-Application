<?php 

	session_start();
	$connection = new mysqli("localhost","root","","Leave-Application");
	$sickquery="SELECT Google_UID,`Sick Leave`,`Earned Leave` FROM PendingLeave";

	$query="UPDATE PendingLeave SET `Sick Leave`= ?, `Casual Leave`=?, `Vacation`=?, `Early Go`=?, `Earned Leave`=? WHERE `Google_UID`=?";


	$sickstatement=$connection->prepare($sickquery);
	$sickstatement->execute();
	$sickstatement->bind_result($Google_UID,$SickLeave,$EarnedLeave);
	

	if($statement=$connection->prepare($query)){
		
	}else{
		print_r("failed to prepare");
		$connection->errno;
	}
	while ($sickstatement->fetch()) {  

		$statement->bind_param("iiiiis",5+$SickLeave,4,0,4,$EarnedLeave,$Google_UID);
		$statement->execute();
	}
	
	$connection->close();
 ?>