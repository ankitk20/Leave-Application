<?php 

	session_start();
	$connection = new mysqli("localhost","root","","Leave-Application");
	$sickquery="SELECT Google_UID,`Sick Leave` FROM PendingLeave";
	$query="UPDATE PendingLeave SET `Sick Leave`= ?, `Casual Leave`=?, `Vacation`=?, `Early Go`=?, `Earned Leave`=? WHERE Google_UID=?";

	$sickstatement=$connection->prepare($sickquery);
	$sickstatement->execute();
	$statement=$connection->prepare($query);
	//store the rows in an assoc array and then bind data in loop
	for ($i=0; $i</*sickresult.length()*/; $i++) {  
		$statement->bind_param("iiiiis",5+$result['Sick Leave'],4,0,4,);
		$statement->execute();
	}
	
	$connection->close();
 ?>