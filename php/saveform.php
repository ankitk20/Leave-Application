<?php
	session_start();
	if(isset($_SESSION['sub'])){
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbName = "Leave-Application";
		$appliedBy = htmlspecialchars($_SESSION['sub']);
		$appliedTo = htmlspecialchars($_POST['appliedTo']);
		$fromDate = htmlspecialchars($_POST['fromDate']);
		$toDate = htmlspecialchars($_POST['toDate']);
		$type = htmlspecialchars($_POST['type']);
		$note = htmlspecialchars($_POST['note']);
		$noOfDays = ((strtotime($toDate) - strtotime($fromDate))/86400)+1;
		$connection = new mysqli($host,$user,$password,$dbName);
		$query = "SELECT * FROM LeavesLeft WHERE Google_UID = ?";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		$statement->close();
		$statement = $connection->prepare('SELECT Val FROM Variable WHERE Name="TermStart"');
		$statement->execute();
		$statement->bind_result($termStart);
		$statement->fetch();
		$statement->close();
		$statement = $connection->prepare('SELECT Val FROM Variable WHERE Name="TermEnd"');
		$statement->execute();
		$statement->bind_result($termEnd);
		$statement->fetch();
		$statement->close();
		$termStart = DateTime::createFromFormat('Y/m/d', $termStart)->format('Y/m/d');
		$termEnd = DateTime::createFromFormat('Y/m/d', $termEnd)->format('Y/m/d');
		$from = DateTime::createFromFormat('Y/m/d', $fromDate)->format('Y/m/d');
		$to = DateTime::createFromFormat('Y/m/d', $toDate)->format('Y/m/d');
		$row = $result->fetch_assoc();
		$LeavesLeft = $row[$type];
		if($from < $termStart || $to > $termEnd){
			echo json_encode('out of term');
		}
		else if($row[$type] >= $noOfDays){
			$query = "SELECT * FROM LeaveHistory WHERE AppliedBy=? AND ((FromDate<=? AND ToDate>=?) OR (FromDate<=? AND ToDate>=?) OR (FromDate<=? AND ToDate>=?) OR (FromDate>=? AND ToDate<=?)) AND Status!='REJECTED'";
			$statement = $connection->prepare($query);
			$statement->bind_param('sssssssss',$appliedBy,$fromDate,$toDate,$fromDate,$fromDate,$toDate,$toDate,$fromDate,$toDate);
			$statement->execute();
			$dateCheck = $statement->get_result();
			$statement->close();
			if($dateCheck->num_rows == 0){
				$query = "SELECT * FROM StaffDetails WHERE Google_UID=? AND Department_ID=(SELECT Department_ID FROM StaffDetails WHERE Google_UID=?) AND Google_UID IN (SELECT Google_UID FROM Authority)";
				$statement = $connection->prepare($query);
				$statement->bind_param('ss',$appliedTo,$appliedBy);
				$statement->execute();
				if(($statement->get_result())->num_rows == 1){
					$statement->close();
					$query = "INSERT INTO LeaveHistory (AppliedBy,AppliedTo,FromDate,ToDate,LeaveType,Note) VALUES (?,?,?,?,?,?)";
					$statement = $connection->prepare($query);
					$statement->bind_param("ssssss",$appliedBy,$appliedTo,$fromDate,$toDate,$type,$note);
					$statement->execute();
					echo $statement->affected_rows;
					$statement->close();
					$statement = $connection->prepare('UPDATE LeavesLeft SET `'.$type.'`=? WHERE Google_UID=?');
					$deduct = $LeavesLeft-$noOfDays;
					$statement->bind_param('is',$deduct,$_SESSION['sub']);
					$statement->execute();
					$statement->close();
					$connection->close();
				}
			}
			else{
				echo 'already taken leave on these dates';
			}
			}
			else{
				echo 'out of limit';
			}
		}
		else{
			echo 'else';
		}
 ?>