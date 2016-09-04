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
	<link rel="stylesheet" href="mdl/material.min.css">
	<script src="mdl/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Google OAuth -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="966732769863-vbk66rqc2gaekf6ad7sf0uk64cei4gee.apps.googleusercontent.com">
	<script>
		function onSignIn(googleUser) {
			var xhr = new XMLHttpRequest();
			xhr.open('POST', './php/token.php');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
			  window.location='./php/form.php';
			};
			xhr.send('idtoken=' + googleUser.getAuthResponse().id_token);
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
					<!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
				</nav>
			</div>
		</header>
		<div class="mdl-layout__drawer">
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="/Leave-Application/">Home</a>
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
							<h1 class="mdl-card__title-text" id="title">VESIT leave application!</h1>
						</div>
						<div class="mdl-card__supporting-text">
							<ul class="mdl-list">
								<li class="mdl-list__item mdl-list__item--three-line">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">check_circle</i>
										<span>No sign-up required!</span>
										<span class="mdl-list__item-text-body">Login with your existing Google account! No hassle of sign-up.</span>
									</span>
								</li>
								<li class="mdl-list__item mdl-list__item--three-line">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">check_circle</i>
										<span>Easy to apply!</span>
										<span class="mdl-list__item-text-body">Just fill out a quick form and click apply! Pretty simple.</span>
									</span>
								</li>
								<li class="mdl-list__item mdl-list__item--three-line">
									<span class="mdl-list__item-primary-content">
										<i class="material-icons mdl-list__item-avatar">check_circle</i>
										<span>Get notified immediately!</span>
										<span class="mdl-list__item-text-body">Receive an email as soon as your leave is approved!</span>
									</span>
								</li>
							</ul>
						</div>
						<div class="mdl-card__actions mdl-card--border">
			               <!-- <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect">Login to get started!</a> -->
			               <div class="g-signin2" data-onsuccess="onSignIn"></div>
			            </div>
					</div>
				</div>
				<div class="mdl-layout-spacer"></div>
			</div>
		</main>
	</div>
</body>
</html>