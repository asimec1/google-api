<?php

	//uključuje se config.php datoteku
	include_once("config.php");
	//provjera se postoji li u url-u ključ "logout"
	if(array_key_exists('logout',$_GET))
	{
    //prekida se sesija, povlači se token i radi se preusmjeravanje na početnu index.php web stranicu
    unset($_SESSION['token']);
    unset($_SESSION['google_data']);
    $gClient->revokeToken();
    session_destroy();
    header("Location:index.php");
}
?>
