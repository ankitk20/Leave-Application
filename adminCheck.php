<?php
	session_start();
	$query = "SELECT * FROM Admin WHERE Google_UID=?";
	$conn = new mysqli('localhost','root','','Leave-Application');
	$statement = $conn->prepare($query);
	$statement->bind_param('s',$_SESSION['sub']);
	$statement->execute();
	$res = $statement->get_result();
	$statement->close();
	if ($res->num_rows != 1) {
		header("Location: ../error/403.php");
	}
?>