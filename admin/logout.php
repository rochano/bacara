<?php 
	session_start();

	$_SESSION['bacara_logined_admin'] = null;
	unset($_SESSION['bacara_logined_admin']);

	header("Location: /admin");

	session_destroy();
?>