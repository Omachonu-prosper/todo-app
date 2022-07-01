<?php 
	session_start();
	require_once './model.php';

	// Page was accessed through delete button 
	if(isset($_POST['delete_task'])) {
		$id = $_POST['delete_task'];
		$delete_task = deleteTask($id);

		// Task was added successfully (addTask returned true)
		if(!$delete_task) {
			echo 'FatalError: Task could not be added';
		}
	}

	header('location: ../');

?>