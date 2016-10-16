<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VESIT Leave Application!</title>

	<!-- Google MDL -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

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

    <!-- Date Picker -->
    <script src="../js/mdDateTimePicker.min.js"></script>

	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="mdl-layout__header mdl-layout__header--scroll">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Reset Term</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a class="mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect" onclick="signOut();">Sign out</a>
				</nav>
			</div>
		</header>

		<?php include_once '../drawer.php'; ?>
		<main class="mdl-layout__content">
						<!-- <div class="mdl-card__supporting-text"> -->
							<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp hidden" style="margin-left: auto; margin-right: auto; margin-top: 2%;">
							   <thead>
								  <tr>
								  	<th class="mdl-data-table__cell--non-numeric">Term Start</th>
								  	<th class="mdl-data-table__cell--non-numeric">Term End</th>
								  </tr>
							   </thead>
							   <tbody>	
							   		<td>
	                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
	                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="fromDiv">
	                                            <input type="text" class="mdl-textfield__input" id="startDate" readonly required>
	                                            <label class="mdl-textfield__label" for="startDate" id="fromLabel">From Date:</label>
	                                        </div>
	                                    </div>
                                    </td>

                                    <td>
	                                    <div class="mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-typography--text-center">
	                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="toDiv">
	                                            <input type="text" class="mdl-textfield__input" id="endDate" readonly required>
	                                            <label class="mdl-textfield__label" for="endDate" id="toLabel">To Date:</label>
	                                        </div>
	                                    </div>
	                                </td>

	                                <td rowspan="2">
	                                	<button id="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" disabled>
										  Reset
										</button>
	                                </td>
							   
							   </tbody>
							   </table>
							   <div class="mdl-spinner mdl-js-spinner is-active" style="margin-left: 49%; margin-top: 2%;">
							   </div>			
		</main>
	</div>
</body>
<script src="../js/adminDate.js"></script>
<script src="../js/resetTerm.js"></script>
</html>