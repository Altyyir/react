<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$agency = $_POST['agency'];
		$plantilla_position = $_POST['plantilla_position'];
		$status = $_POST['status'];
		$appointment_start = $_POST['appointment_start'];
		$appointment_end = $_POST['appointment_end'];
		$monthly_salary = $_POST['monthly_salary'];

		$sql = "UPDATE `employment` SET `agency`=?,`plantilla_position`=?,`status`=?,`appointment_start`=?,`appointment_end`=?,`monthly_salary`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableemployment.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sssssss", $agency, $plantilla_position, $status, $appointment_start, $appointment_end, $monthly_salary, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tableemployment.php");
		exit();
	}
?>