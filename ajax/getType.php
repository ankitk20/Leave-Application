<?php
	$conn = new mysqli('localhost','root','','Leave-Application');
	$statement = $conn->prepare('SELECT * FROM LeavesAllotted WHERE Designation_ID = (SELECT Designation_ID FROM StaffDetails WHERE Google_UID = ?)');
	$statement->bind_param('s',$_SESSION['sub']);
	$statement->execute();
	$result = $statement->get_result();
	$statement->close();
	$row = $result->fetch_assoc();
	unset($row['Designation_ID']);
	foreach ($row as $key => $value) {
		if ($value == 0) {
			unset($row[$key]);
		}
	}
	$statement = $conn->prepare('SELECT * FROM LeavesLeft WHERE Google_UID=?');
	$statement->bind_param('s',$_SESSION['sub']);
	$statement->execute();
	$result = $statement->get_result();
	$r = $result->fetch_assoc();
	foreach ($row as $key => $value) {
		$row[$key] = $r[$key];
	}
	echo json_encode($row);
?>