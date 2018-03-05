<?php

	session_start();
	//provjerava se postoje li podaci u sesiji, ako ne postoje radi se preusmjeravanje na index.php web stranicu
	if (!isset($_SESSION['google_data'])) {
		header("Location:index.php");
	}

	//ispisuju se podaci iz sesije

	echo '<p class="image"><img src="' . $_SESSION['google_data']['picture'] . '" alt="" width="300" height="220"/></p>';
	echo '<p><b>Ime: </b>' . $_SESSION['google_data']['given_name'] . '</p>';
	echo '<p><b>Prezime: </b>' . $_SESSION['google_data']['family_name'] . '</p>';
	echo '<p><b>Google ID: </b>' . $_SESSION['google_data']['id'] . '</p>';
	echo '<p><b>Ime i prezime: </b>' . $_SESSION['google_data']['name'] . '</p>';
	echo '<p><b>Email: </b>' . $_SESSION['google_data']['email'] . '</p>';
	echo '<p><b>Google+: </b>' . $_SESSION['google_data']['link'] . '</p>';
	echo '<p><b><a href="logout.php?logout">Odjava</a></b></p>';
?>
