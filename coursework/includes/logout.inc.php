<?php

if (isset($_POST['submit'])) {
	session_start();
	$expire = time() - 86400;//24h cookie is on
	setcookie("memberCookie", $_SESSION['username'], $expire,"/", "stuweb.cms.gre.ac.uk", 0);
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}