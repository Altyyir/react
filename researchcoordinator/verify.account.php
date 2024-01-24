<?php 

	include 'dbconn.php';

	$id = $_GET['id'];

	$sql = "UPDATE faculty_user SET status = 1 WHERE id = $id";
	$conn->query($sql);

	header('location: ./accountverification.php');

?>