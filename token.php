<?php
	session_start();
	ini_set("allow_url_fopen", 1);
	if(isset($_POST['idtoken'])){
		$json = file_get_contents('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$_POST['idtoken']);
		$obj = json_decode($json);
		if($obj->aud == '966732769863-vbk66rqc2gaekf6ad7sf0uk64cei4gee.apps.googleusercontent.com'){
			$conn = new mysqli('localhost','root','','Leave-Application');
			$stmnt = $conn->prepare('SELECT * FROM StaffDetails WHERE Email=?');
			$stmnt->bind_param('s',$obj->email);
			$stmnt->execute();
			$result = $stmnt->get_result();
			if($result->num_rows == 1){
				$row = $result->fetch_assoc();
				if($row['Google_UID'] != $obj->sub){
					$stmnt->close();
					$stmnt = $conn->prepare('UPDATE StaffDetails SET Google_UID=? WHERE Email=?');
					$stmnt->bind_param('ss', $obj->sub , $obj->email );
					$stmnt->execute();
					$stmnt->close();
				}
				$_SESSION['sub'] = $obj->sub;
				$_SESSION['email'] = $obj->email;
				$_SESSION['name'] = $obj->given_name;
				echo 'login';
			}
			else {
				echo 'Only staff of VESIT can use this application. Make sure you are using your VES account to login. If you are a staff member and still seeing this message, Please contact the admin.';
			}
		}
	}
	else {
		echo 'Something went wrong please try again.';
	}
?>