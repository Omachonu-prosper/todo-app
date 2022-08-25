<?php 
	session_start();
	require_once './model.php';

	// Incoming fetch request to delete task 
	if(isset($_POST['delete_task_submit'])) {
		$user_id = $_SESSION['user']['id'];
		$id = $_POST['id'];

		$delete_task = deleteTask($id, $user_id);
		
		// Task was added successfully (addTask returned true)
		if(!$delete_task) {
			echo 'FatalError: Task could not be deleted';
		}
	}
	
	header('location: ../');
?>