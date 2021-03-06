<?php 
	
	require_once './model.php';
	
	if(isset($_POST['submit'])) {
		$task_title = $_POST['task_title'];

		// Task_title was not sent empty
		if(!empty($task_title)) {
			$add_task = addTask($task_title, 1);

			// Task was added successfully (addTask returned true)
			if($add_task) {
				echo 'Task added successfully';
			} else {
				echo 'FatalError: Task could not be added';
				// Later on you would want to store the error in session and alert it to the user as a flash message
			}

		} else {
			// Throw some error
			// Store error in session and alert to user as flash message
		}

	}

	header('location: ../');

?>