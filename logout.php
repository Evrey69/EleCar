<?php
	session_start();
	$_SESSION['auth'] = null;
	header('Location: user.php');
?>