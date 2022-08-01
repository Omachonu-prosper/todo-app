<?php 

	session_start();

	// Remove user from session
	unset($_SESSION['user']);

	// Redirect to login page
	header('location: ./login.php');

?>