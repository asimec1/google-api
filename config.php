<?php

	//početak sesije
	session_start();
	//uključuju se konfiguracijske datoteke
	include_once("src/Google_Client.php");
	include_once("src/contrib/Google_Oauth2Service.php");

	//dodaje se ID, ključ i URL od aplikacije 
	$clientId = 'key.apps.googleusercontent.com'; //Google CLIENT ID
	$clientSecret = 'client-secret'; //Google CLIENT SECRET
	$redirectUrl = 'http://www.domena.hr/api';  //return url (url to script)
	$homeUrl = 'http://www.domena.hr';  //return to home


	//Pozivanje funkcije
	$gClient = new Google_Client();
	//Dodaje se naziv aplikacije
	$gClient->setApplicationName('NAZIV');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectUrl);

	$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
