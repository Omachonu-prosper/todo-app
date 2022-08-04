<?php 
	session_start();
	require_once './model.php';

	$json = file_get_contents("php://input");
	$data = json_decode($json);

	// Incoming fetch request to delete task 
	if(isset($data->deleteTask)) {
		$id = $data->id;
		$delete_task = deleteTask($id);
		echo(json_decode('200'));

		// Task was added successfully (addTask returned true)
		if(!$delete_task) {
			echo 'FatalError: Task could not be deleted';
		}
	}
	else {
		header('location: ../');
	}

?>