<?php 

	function fetchTasks() {
		$conn = mysqli_init();
		mysqli_ssl_set($conn, NULL, NULL, getenv("MYSQL_ATTR_SSL_CA"), NULL, NULL);
		// Create connection to database 
		mysqli_real_connect($conn, getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DATABASE"));

		// Catch connection errors
		if(mysqli_connect_error()) {
			echo 'Not connected to database';
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