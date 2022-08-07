<?php 
	session_start();
	require_once './model.php';

	if(isset($_POST['edit_task_submit'])) {
		$task_title = $_POST['task_title'];
		$task_id = $_POST['id'];
		$user = $_SESSION['user'];
		
		// Task_title and id were not sent empty
		if(!empty($task_title) && !empty($task_id)) {
			$edit_task = editTask($task_title, $task_id, $user['id']);
			
			// Task was not added successfully (editTask returned false)
			if(!$edit_task) {
				echo 'FatalError: Task could not be added';
			}

		}

	}

	header('location: ../');

?>