<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VESIT Leave Application!</title>

	<!-- Google MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Google OAuth -->
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <meta name="google-signin-client_id" content="966732769863-vbk66rqc2gaekf6ad7sf0uk64cei4gee.apps.googleusercontent.com">
    <script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              window.location='../php/signOut.php';
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
				<span class="mdl-layout-title">Access forbidden!</span>
				<?php
				if (isset($_SESSION['sub'])) {
					echo '<div class="mdl-layout-spacer"></div>';
					echo '<nav class="mdl-navigation">';
					echo '	<a class="mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect" onclick="signOut();">Sign out</a>';
					echo '</nav>';
				}
				?>
			</div>
		</header>
        <?php include_once '../drawer.php'; ?>
		<main class="mdl-layout__content">
			<div class="mdl-grid">
				<div class="mdl-layout-spacer"></div>
				<div class="mdl-cell--4-col-phone mdl-cell--6-col-tablet mdl-cell--11-col-desktop">
					<div class="mdl-card mdl-shadow--8dp" style="width: 100%;">
						<div class="mdl-card__title">
							<h1 class="mdl-card__title-text">Error 403</h1>
						</div>
						<div class="mdl-card__supporting-text">
							<i class="material-icons" style="font-size: 1000%; text-align: center; display: block;">&#xE814;</i>
							<p style="text-align: center; font-size: 150%;">You don't have permission to access the requested URL.</p>
						</div>
					</div>
				</div>
				<div class="mdl-layout-spacer"></div>
			</div>
		</main>
	</div>
</body>
</html>