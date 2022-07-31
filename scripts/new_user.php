<?php 

	require_once 'model.php';

	function newUser($username, $password) {
		$add_user = addUser($username, $password);

		// A new user could not be created
		if(!$add_user) {
			echo 'FatalError: Task could not be added';
		}
	}

?>