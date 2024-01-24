<?php

include 'dbconn.php';
session_start();
	

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_SESSION['user_id'];
	$title = $_POST['title'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];

	$sql = "UPDATE faculty_user SET title = '$title', first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name' WHERE id = $id";
	$conn->query($sql);

	header('location: ./profile.php');
	exit();
}