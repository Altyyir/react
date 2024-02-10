<?php

include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$campus_name = $_POST['campus_name'];
	$address = $_POST['address'];

	$sql = "INSERT INTO campus (campus_name, address) VALUES (?, ?)";
	$stmt = mysqli_prepare($conn, $sql);

	if ($stmt) {
		mysqli_stmt_bind_param($stmt, "ss", $campus_name, $address);
		if (mysqli_stmt_execute($stmt)) {
			header("location: campus.php");
		} else {
			// Insert failed
		}
		mysqli_stmt_close($stmt);
	}

	header("location: ./campus.php");
	exit();
}
