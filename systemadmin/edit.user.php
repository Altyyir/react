<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$privelege = $_POST['privelege'];
		$college = $_POST['college'];

		$sql = "UPDATE `faculty_user` SET `title`=?,`first_name`=?,`middle_name`=?,`last_name`=?,`gender`=?,`email`=?,`password`=?,`college_id`=?,`authority`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./user.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $first_name, $middle_name, $last_name, $gender, $email, $password, $college, $privelege, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./user.php");
		exit();
	}
?>