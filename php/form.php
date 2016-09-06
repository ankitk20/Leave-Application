<?php
    include_once 'loginCheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VESIT Leave Application!</title>

	<!-- Google MDL -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

    <!-- getmdl-select (used for select input in MDL) -->
	<link rel="stylesheet" href="../getmdl-select/getmdl-select.min.css">
    <script src="../getmdl-select/getmdl-select.min.js"></script>

    <!-- Date Picker -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="../css/mdDateTimePicker.min.css">
    <script src="../js/moment.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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

    <!-- Date Picker -->
    <script src="../js/mdDateTimePicker.min.js"></script>

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
		<!--<div class="mdl-layout__drawer">
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link">Home</a>
				<a class="mdl-navigation__link">About Us</a>
				<a class="mdl-navigation__link">Contact</a>
			</nav>
		</div>-->
        <?php include_once './drawer.php'; ?>
		<main class="mdl-layout__content">
			<div class="mdl-grid">
				<div class="mdl-layout-spacer"></div>
				<div class="mdl-cell--4-col-phone mdl-cell--6-col-tablet mdl-cell--10-col-desktop">
					<div class="mdl-card mdl-shadow--8dp" style="width: 100%;">
						<div class="mdl-card__title">
							<h1 class="mdl-card__title-text">Apply for leave <?php echo $_SESSION['name'];?>!</h1>
						</div>
						<div class="mdl-card__supporting-text">
                            <div class="mdl-spinner mdl-js-spinner is-active" style="margin-left: 49%;"></div>
							<form id="application" class="hidden">
                                <div class="mdl-grid">

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">

        								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth getmdl-select__fix-height">
        									<input class="mdl-textfield__input" type="text" id="typeOfLeave" value="Select one" readonly tabIndex="-1" required>
        									<label for="typeOfLeave">
        										<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        									</label>
        									<label for="typeOfLeave" class="mdl-textfield__label">Type of leave:</label>
        									<!--<ul for="typeOfLeave" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
        										<li class="mdl-menu__item">Casual</li>
        										<li class="mdl-menu__item">Sick</li>
        										<li class="mdl-menu__item">Maternity</li>
        										<li class="mdl-menu__item">Hospital</li>
        									</ul>-->
        								</div>

    								</div>

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">

        								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth getmdl-select__fix-height">
        									<input class="mdl-textfield__input" type="text" id="applyTo" value="Select one" readonly tabIndex="-1" required>
        									<label for="applyTo">
        										<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        									</label>
        									<label for="applyTo" class="mdl-textfield__label">Apply to:</label>
        									<!--<ul for="applyTo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
        										<li class="mdl-menu__item">HOD</li>
        										<li class="mdl-menu__item">Deputy HOD</li>
        									</ul>-->
        								</div>

                                    </div>

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="fromDiv">
                                            <input type="text" class="mdl-textfield__input" id="fromDate" readonly required>
                                            <label class="mdl-textfield__label" for="fromDate" id="fromLabel">From Date:</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="toDiv">
                                            <input type="text" class="mdl-textfield__input" id="toDate" readonly required>
                                            <label class="mdl-textfield__label" for="fromDate" id="toLabel">To Date:</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty" id="numberDiv">
                                            <input class="mdl-textfield__input" type="number" rows="3" id="noOfDays" readonly></input>
                                            <label class="mdl-textfield__label" for="noOfDays">Number of Days:</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <textarea class="mdl-textfield__input" type="text" rows="3" id="note"></textarea>
                                            <label class="mdl-textfield__label" for="note">Note (Optional)..</label>
                                        </div>
                                    </div>

                                </div>
						
				            </form>

						</div>
						<div id="apply" class="mdl-card__actions mdl-card--border">
			               <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect">Apply!</a>
			            </div>
					</div>
				</div>
				<div class="mdl-layout-spacer"></div>
			</div>
		</main>
	</div>
    <script src="../js/date.js"></script>
    <script src="../js/getForm.js"></script>
    <script src="../js/saveform.js"></script>
</body>
</html>