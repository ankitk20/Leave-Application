<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$conn = new mysqli('localhost','root','','Leave-Application');
		$statement = $conn->prepare("SELECT Title FROM Authority WHERE Google_UID = ?");
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		$statement->close();
		$query = "SELECT s.Google_UID,s.FirstName,s.LastName,a.Title FROM StaffDetails s,Authority a WHERE s.Department_ID = (SELECT Department_ID FROM StaffDetails WHERE Google_UID = ?) AND s.Google_UID = a.Google_UID";
		if($result->num_rows != 0){
			$title = $result->fetch_assoc()['Title'];
			switch ($title) {
				case 'DHOD':
					$query = $query." AND Title LIKE 'HOD'";
					break;

				case 'HOD':
					$query = $query." AND Title IN('Principal','Vice Principal')";
					break;

				case 'Principal':
					$query = $query." AND Title LIKE 'Principal'";
					break;

				case 'Vice Principal':
					$query = $query." AND Title LIKE 'Principal'";
					break;
			}
		}
		$statement = $conn->prepare($query);
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		$row = $result->fetch_assoc();
		$array = array($row);
		while($row = $result->fetch_assoc())
			array_push($array,$row);
		echo json_encode($array);
	}
?>