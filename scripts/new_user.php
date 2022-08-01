<?php 

	require_once 'model.php';

	function newUser($username, $password) {
		$newuser = addUser($username, $password);

		// A new user could not be created
		if(!$newuser) {
			echo 'FatalError: User could not be added';
			return;
		}

		return $newuser;
	}

?>