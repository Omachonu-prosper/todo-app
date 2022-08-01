<?php 
	
	$conn = mysqli_init();

	// Use SSL to connect to planet Scale database if in production
	if(getenv('ENVIRONMENT') == 'production') {
		mysqli_ssl_set($conn, NULL, NULL, getenv("MYSQL_ATTR_SSL_CA"), NULL, NULL);
	}

	// Create connection to database 
	mysqli_real_connect($conn, getenv("HOST"), getenv("USERNAME"), getenv("PASSWORD"), getenv("DATABASE"));

	// Catch connection errors
	if(mysqli_connect_error()) {
		echo 'Not connected to database';
		return;
	}

	// Fetch all Tasks in the database
	function fetchTasks() {
		global $conn;

		// Query database for data 
		$sql_query = "SELECT id, task_title, create_date FROM tasks ORDER BY create_date DESC;";
		$query_result = mysqli_query($conn, $sql_query);
		// Format data to php's associative array
		$result_array = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
		// Free result from memory
		mysqli_free_result($query_result);

		// Close connection to database
		mysqli_close($conn);

		return $result_array;
	}

	// Add a new task to database
	function addTask($task_title, $authors_id) {
		global $conn;
		// Escape characters to prevent sql injection 
		$task_title = mysqli_real_escape_string($conn, $task_title);
		$authors_id = mysqli_real_escape_string($conn, $authors_id);

		// Add new Task 
		$sql_query = "INSERT INTO tasks (task_title, authors_id) VALUES ('$task_title', $authors_id);";
		$query_result = mysqli_query($conn, $sql_query);
		mysqli_close($conn);

		// Test if Task was inserted Successtully
		if($query_result) {
			return true;
		} else {
			return false;
		}
		
	}

	function deleteTask($id) {
		global $conn;
		$id = mysqli_real_escape_string($conn, $id);

		$sql_query = "DELETE FROM tasks WHERE id = $id;";
		$query_result = mysqli_query($conn, $sql_query);
		mysqli_close($conn);

		// Test if Task was deleted Successtully
		if($query_result) {
			return true;
		} else {
			return false;
		}
	}

	// Add a new user to database
	function addUser($username, $password) {
		global $conn;
		// Escape characters to prevent sql injection 
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);

		// Add new User 
		$sql_query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
		$query_result = mysqli_query($conn, $sql_query);

		// Test if User was inserted Successtully
		if($query_result) {
			return checkUserLogin($username, $password);
		} else {
			mysqli_close($conn);

			return false;
		}
		
	}

	// Fetch all users
	function checkUserLogin($username, $password) {
		global $conn;

		// Escape characters to prevent sql injection 
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);

		// Query database for data 
		$sql_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
		$query_result = mysqli_query($conn, $sql_query);
		// Fetch returned row
		$result_array = mysqli_fetch_array($query_result, MYSQLI_ASSOC);
		// Free result from memory
		mysqli_free_result($query_result);

		// Close connection to database
		mysqli_close($conn);

		if($result_array) {
			// A user is found with the login details provided
			return  $result_array;
		}
		else {
			return false;
		}

	}

?>