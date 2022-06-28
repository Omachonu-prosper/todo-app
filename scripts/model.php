<?php 

	$credentials = [
		'host' => 'localhost',
		'username' => 'omapros',
		'password' => 'password',
		'database' => 'todoapp'
	];

	function fetchTasks() {
		global $credentials;

		// Create connection to database 
		$conn = mysqli_connect($credentials['host'],$credentials['username'], $credentials['password'], $credentials['database']);

		// Catch connection errors
		if(!$conn) {
			echo mysqli_connect_error();
			return;
		}

		// Query database for data 
		$sql_query = 'SELECT id, task_title, create_date FROM tasks;';
		$query_result = mysqli_query($conn, $sql_query);
		// Format data to php's associative array
		$result_array = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
		// Free result from memory
		mysqli_free_result($query_result);

		// Close connection to database
		mysqli_close($conn);

		return $result_array;
	}
?>