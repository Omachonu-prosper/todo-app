<?php 
	
	require_once './model.php';

	// Page was accessed through delete button 
	if(isset($_POST['delete_task'])) {
		$id = $_POST['delete_task'];
		$delete_task = deleteTask($id);

		// Task was added successfully (addTask returned true)
		if($delete_task) {
			echo 'Task added successfully';
		} else {
			echo 'FatalError: Task could not be added';
			// Later on you would want to store the error in session and alert it to the user as a flash message
		}
	}

	header('location: ../');

?>