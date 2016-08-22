<?php
	include_once 'loginCheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VESIT Leave Application!</title>
	<!-- CDN based MDL (will be used when deployed)
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>-->

	<!-- Local MDL (ONLY FOR TESTING PURPOSES) -->
	<link rel="stylesheet" href="./mdl/material.min.css">
	<script src="./mdl/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- getmdl-select (used for select input in MDL) -->
	<script src="./getmdl-select/getmdl-select.min.js"></script>
	<link rel="stylesheet" href="./getmdl-select/getmdl-select.min.css">

	<!-- Google OAuth -->
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <meta name="google-signin-client_id" content="966732769863-vbk66rqc2gaekf6ad7sf0uk64cei4gee.apps.googleusercontent.com">
    <script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              window.location='signOut.php';
            });
        }

        function onLoad() {
            gapi.load('auth2', function() {
            gapi.auth2.init();
            });
        }
    </script>
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="mdl-layout__header mdl-layout__header--scroll">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Welcome!</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a class="mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect" onclick="signOut();">Sign out</a>
				</nav>
			</div>
		</header>
		<div class="mdl-layout__drawer">
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link">Home</a>
				<a class="mdl-navigation__link">About Us</a>
				<a class="mdl-navigation__link">Contact</a>
			</nav>
		</div>
		<main class="mdl-layout__content">
			<div class="mdl-grid">
			<div class="mdl-layout-spacer"></div>
				<div class="mdl-cell--4-col-phone mdl-cell--6-col-tablet mdl-cell--10-col-desktop">
					<div class="mdl-card mdl-shadow--8dp" style="width: 100%;">
						<div class="mdl-card__title">
							<H1 class="mdl-card__title-text"><?php echo $_SESSION['name']."'s "; ?>Leave history!</H1>
						</div>
						<div class="mdl-card__supporting-text">
							<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin: auto;">
							   <thead>
								  <tr><th class="mdl-data-table__cell--non-numeric">Type</th><th>From</th><th>To</th><th>Days</th><th>Status</th></tr>
							   </thead>
							   <tbody>
								  <tr><td class="mdl-data-table__cell--non-numeric">Casual</td><td>10/10/16</td><td>11/10/16</td><td>1</td><td>Approved</td></tr>
								  <tr><td class="mdl-data-table__cell--non-numeric">Sick</td><td>10/10/16</td><td>11/10/16</td><td>1</td><td>Approved</td></tr>
								  <tr><td class="mdl-data-table__cell--non-numeric">Vacation</td><td>10/10/16</td><td>11/10/16</td><td>1</td><td>Approved</td></tr>
							   </tbody>
							   </table>
						</div>
					</div>
				</div>
				<div class="mdl-layout-spacer"></div>
			</div>
			
		</main>
	</div>
</body>
</html>