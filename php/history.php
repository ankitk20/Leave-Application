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
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <!-- Moment JS -->
    <script src="../js/moment.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Google OAuth -->
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <meta name="google-signin-client_id" content="966732769863-vbk66rqc2gaekf6ad7sf0uk64cei4gee.apps.googleusercontent.com">
    <script>
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function() {
            window.location = 'signOut.php';
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
                <span class="mdl-layout-title">Leave History</span>
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
            <!-- <div class="mdl-grid"> -->
            <!-- <div class="mdl-layout-spacer"></div> -->
            <!-- <div class="mdl-cell--4-col-phone mdl-cell--6-col-tablet mdl-cell--11-col-desktop"> -->
            <!-- <div class="mdl-card mdl-shadow--8dp" style="width: 100%;"> -->
            <!-- <div class="mdl-card__title"> -->
            <!-- <H1 class="mdl-card__title-text"><?php echo $_SESSION['name']."'s "; ?>Leave history!</H1> -->
            <!-- </div> -->
            <!-- <div class="mdl-card__supporting-text"> -->
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp hidden" style="margin-left: auto; margin-right: auto; margin-top: 2%;">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Type</th>
                        <th class="mdl-data-table__cell--non-numeric">From</th>
                        <th class="mdl-data-table__cell--non-numeric">To</th>
                        <th class="mdl-data-table__cell--non-numeric">Days</th>
                        <th class="mdl-data-table__cell--non-numeric">Applied to</th>
                        <th class="mdl-data-table__cell--non-numeric">Status</th>
                        <th class="mdl-data-table__cell--non-numeric">Cancel</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="mdl-spinner mdl-js-spinner is-active" style="margin-left: 49%; margin-top: 2%;"></div>
            <!-- </div> -->
            <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="mdl-layout-spacer"></div> -->
            <!-- </div> -->
        </main>
    </div>
    <script src="../js/getHistory.js"></script>
    <script src="../js/cancelLeave.js"></script>
</body>

</html>
