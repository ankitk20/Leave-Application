<?php
	session_start();
	if (!isset($_SESSION['sub'])) {
		header('Location: /Leave-Application');
	}
?>
