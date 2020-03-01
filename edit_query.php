<?php
	require_once 'conn.php';
 
	if(isset($_POST['task_id']) != ""){
		$task_id = $_POST['task_id'];
		$task = isset($_POST['task']);
		$conn->query("UPDATE `task` SET tasks = $task" ) or die(mysqli_errno());
		header('location: index.php');
	}
?>
