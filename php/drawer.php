<?php
	echo '<div class="mdl-layout__drawer">
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="/Leave-Application">Home</a>';
	if(isset($_SESSION['sub'])){
		echo '<a class="mdl-navigation__link" href="./history.php">History</a>';
		$conn = new mysqli("localhost","root","","Leave-Application");
		$statement = $conn->prepare("SELECT Title FROM Authority WHERE Google_UID=?");
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		if($result->num_rows == 1){
			echo '<a class="mdl-navigation__link" href="./application.php">Staff leaves</a>';
		}
		$statement->close();
		$statement = $conn->prepare("SELECT * FROM Admin WHERE Google_UID=?");
		$statement->bind_param('s',$_SESSION['sub']);
		$statement->execute();
		$result = $statement->get_result();
		if($result->num_rows == 1){
			echo '<a id="admin" class="mdl-navigation__link" href="./adminPage.php">Admin</a>';
		}
	}
	echo '<a class="mdl-navigation__link">About Us</a>
				<a class="mdl-navigation__link">Contact</a>
			</nav>
		</div>';
?>