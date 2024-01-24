<?php
	include 'dbconn.php';
	session_start();

	$email = $_SESSION['emailRecovery'];
	$password = $_POST['newPass'];
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "UPDATE faculty_user SET password = '$password' WHERE email = '$email'";
	if($conn->query($sql)) {
		header('location: ./page-login.php');
		exit();
	}
?>