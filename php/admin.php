<?php 

	session_start();
	$connection = new mysqli("localhost","root","","Leave-Application");

	$allotted = "SELECT * FROM LeavesAllotted";
	$statement = $connection->prepare($allotted);
	$statement->execute();
	$result = $statement->get_result();
	$statement->close();
	$allotted = array();
	while ($row = $result->fetch_assoc()) {
		$allotted[$row['Designation_ID']] = $row;
	}

	$sickquery="SELECT Google_UID,`Sick Leave` FROM LeavesLeft";
	$sickstatement=$connection->prepare($sickquery);
	$sickstatement->execute();
	$result = $sickstatement->get_result();
	$sickstatement->close();

	$query="UPDATE LeavesLeft SET `Sick Leave`= ?, `Casual Leave`=?, `Vacation`=?, `Early Go`=?, `Earned Leave`=? WHERE `Google_UID`=?";
	$statement=$connection->prepare($query);
	$conn = new mysqli("localhost","root","","Leave-Application");
	$desgn = "SELECT Designation_ID FROM StaffDetails WHERE Google_UID=?";
	$designation = $conn->prepare($desgn);

	while ($row = $result->fetch_assoc()) {
		$designation->bind_param("s",$row['Google_UID']);
		$designation->execute();
		$designation->bind_result($des);
		$designation->fetch();
		if($des!=101)
			$SL = $allotted[$des]['Sick Leave'] + $row['Sick Leave'];
		else	
			$SL = $allotted[$des]['Sick Leave'];
		$statement->bind_param("iiiiis",$SL,$allotted[$des]['Casual Leave'],$allotted[$des]['Vacation'],$allotted[$des]['Early Go'],$allotted[$des]['Earned Leave'],$row['Google_UID']);
		$statement->execute();
	}
	$designation->close();
	$conn->close();
	$statement->close();
	$connection->close();
 ?>