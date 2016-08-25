<?php 	

		include("DBConnect.php");

		$appliedBy = $_POST["appliedBy"];
		$appliedTo = $_POST["appliedTo"];
		$fromDate = $_POST["fromDate"];
		$toDate = $_POST["toDate"];
		$type = $_POST["type"];
		$type = $_POST["type"];
		$note = $_POST["note"];

		DBConnect db = new DBConnect();
		
		$db->prepare("INSERT INTO History (AppliedBy,AppliedTo,FromDate,ToDate,LeaveType,Note) VALUES (?,?,?,?,?,?)");
		$db->$bind_param("ssssss",$appliedBy,$appliedTo,$fromDate,$toDate,$type,$note);
		$db->execute();

		$db->close();

 ?>