<?php  

	include 'dbconn.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM faculty_user WHERE id = $id";
	$conn->query($sql);

	header('location: ./accountverification.php');

?>