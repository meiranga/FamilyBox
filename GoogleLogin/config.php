<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("452411256259-f22844e3q1tar1c7l754osk82qk2td35.apps.googleusercontent.com");
	$gClient->setClientSecret("c9nnZosGlWpWJCdL2AhsejsQ");
	$gClient->setApplicationName("family-box login");
	$gClient->setRedirectUri("http://localhost/GoogleLogin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");
?>
