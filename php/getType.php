<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$conn = new mysqli('localhost','root','','Leave-Application');
		$statement = $conn->prepare('SELECT * FROM LeavesAllotted WHERE Designation_ID = (SELECT Designation_ID FROM StaffDetails WHERE Google_UID = ?)');
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		$row = $result->fetch_assoc();
		unset($row['Designation_ID']);
		foreach ($row as $key => $value) {
			if ($value == 0) {
				unset($row[$key]);
			}
		}
		echo json_encode($row);
	}
?>