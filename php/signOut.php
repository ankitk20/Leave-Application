<?php
	session_start();
	if (isset($_SESSION['sub'])) {
		session_destroy();
		header('Location: /Leave-Application');
	}
?>
