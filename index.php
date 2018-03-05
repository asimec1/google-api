<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	//uključuje se config.php datoteku koja sadrži ključ za spajanje na Google API
	include_once("config.php");

	//unos podataka u sesiju i preusmjeravanje na web stranicu aplikacije
	if(isset($_REQUEST['code'])){
		$gClient->authenticate();
		$_SESSION['token'] = $gClient->getAccessToken();
		header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
	}

	//dodaje se vrijednost token u sesiju
	if (isset($_SESSION['token'])) {
		$gClient->setAccessToken($_SESSION['token']);
	}

	//dohvaćaju se korisnički podaci, ubacuju se u sesiju i radi se preusmjeravanje na home.php web stranicu
	if ($gClient->getAccessToken()) {
		$userProfile = $google_oauthV2->userinfo->get();
		$_SESSION['google_data'] = $userProfile;
		header("location: home.php");
		$_SESSION['token'] = $gClient->getAccessToken();
	} else {
		$authUrl = $gClient->createAuthUrl();
	}

	//ukoliko korisnik nije prijavljen, prikazuje se login stranica
	if(isset($authUrl)) {
		echo '<a href="'.$authUrl.'"><img src="images/glogin.png" alt=""/></a>';
	} else {
		echo '<a href="logout.php?logout">Logout</a>';
	}

?>
