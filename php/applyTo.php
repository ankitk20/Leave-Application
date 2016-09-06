<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$conn = new mysqli('localhost','root','','Leave-Application');
		$statement = $conn->prepare("SELECT Title FROM Authority WHERE Google_UID = ?");
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		if($result->num_rows == 0){
			$statement->close();
			$statement = $conn->prepare("SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID");
			$statement->bind_param('s',$_SESSION['sub']);
			$statement->execute();
			$result = $statement->get_result();
			$row = $result->fetch_assoc();
			$array = array($row);
			while($row = $result->fetch_assoc())
				array_push($array,$row);
			echo json_encode($array);
		}
		else{
			$title = $result->fetch_assoc()['Title'];
			switch ($title) {
				case 'DHOD':
					$statement->close();
					$statement = $conn->prepare("SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID AND Title NOT LIKE 'DHOD'");
					$statement->bind_param('s',$_SESSION['sub']);
					$statement->execute();
					$result = $statement->get_result();
					$row = $result->fetch_assoc();
					$array = array($row);
					while($row = $result->fetch_assoc())
						array_push($array,$row);
					echo json_encode($array);
					break;
				
				case 'HOD':
					$statement->close();
					$statement = $conn->prepare("SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID AND Title NOT LIKE 'HOD'");
					$statement->bind_param('s',$_SESSION['sub']);
					$statement->execute();
					$result = $statement->get_result();
					$row = $result->fetch_assoc();
					$array = array($row);
					while($row = $result->fetch_assoc())
						array_push($array,$row);
					echo json_encode($array);
					break;

				case 'Principal':
					$statement->close();
					$statement = $conn->prepare("SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID AND Title NOT LIKE 'Principal'");
					$statement->bind_param('s',$_SESSION['sub']);
					$statement->execute();
					$result = $statement->get_result();
					$row = $result->fetch_assoc();
					$array = array($row);
					while($row = $result->fetch_assoc())
						array_push($array,$row);
					echo json_encode($array);
					break;

				case 'Vice Principal':
					$statement->close();
					$statement = $conn->prepare("SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID AND Title NOT LIKE 'Vice Principal'");
					$statement->bind_param('s',$_SESSION['sub']);
					$statement->execute();
					$result = $statement->get_result();
					$row = $result->fetch_assoc();
					$array = array($row);
					while($row = $result->fetch_assoc())
						array_push($array,$row);
					echo json_encode($array);
					break;
			}
		}
	}
?>