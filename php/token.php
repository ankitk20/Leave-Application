<?php
	session_start();
	ini_set("allow_url_fopen", 1);
	if(isset($_POST['idtoken'])){
		$json = file_get_contents('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$_POST['idtoken']);
		$obj = json_decode($json);
		$_SESSION['sub'] = $obj->sub;
		$_SESSION['email'] = $obj->email;
		$_SESSION['name'] = $obj->given_name;
	}
?>