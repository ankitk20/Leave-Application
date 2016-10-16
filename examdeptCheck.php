<?php
	session_start();
	if ($_SESSION['email'] != 'exam.dept@ves.ac.in') { // not sure this is the correct email
		header("Location: ../error/403.php");
	}
?>