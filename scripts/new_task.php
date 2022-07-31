<?php 
	session_start();
	require_once './model.php';
	
	if(isset($_POST['submit'])) {
		$task_title = $_POST['task_title'];

		// Task_title was not sent empty
		if(!empty($task_title)) {
			$add_task = addTask($task_title, 1);

			// Task was not added successfully (addTask returned false)
			if(!$add_task) {
				echo 'FatalError: Task could not be added';
			}

		}

	}

	header('location: ../');

?>