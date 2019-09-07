<?php 
	session_start();

	$_SESSION['bacara_logined_user'] = null;
	unset($_SESSION['bacara_logined_user']);

	$_SESSION['bacara_user_dredit'] = null;
	unset($_SESSION['bacara_user_dredit']);

	header("Location: /");

	session_destroy();
?>