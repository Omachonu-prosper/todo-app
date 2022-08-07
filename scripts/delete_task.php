<?php 
	session_start();
	require_once './model.php';

	$json = file_get_contents("php://input");
	$data = json_decode($json);

	// Incoming fetch request to delete task 
	if(isset($data->deleteTask)) {
		$user_id = $_SESSION['user']['id'];
		$id = $data->id;

		// $delete_task = deleteTask($id);
		$delete_task = deleteTask($id, $user_id);
		
		echo(json_encode('200'));

		// Task was added successfully (addTask returned true)
		if(!$delete_task) {
			echo 'FatalError: Task could not be deleted';
		}
	}
	else {
		header('location: ../');
	}

?>