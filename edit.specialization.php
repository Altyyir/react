<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$specialization = $_POST['specialization'];
		$primary_field = $_POST['primary_field'];
	
		$sql = "UPDATE `specialization` SET `specialization`=?,`primary_field`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tablespecialization.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sss", $specialization, $primary_field, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tablespecialization.php");
		exit();
	}
?>