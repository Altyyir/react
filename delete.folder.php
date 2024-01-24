<?php
	include 'dbconn.php';

	$id = $_POST['id'];

	$sql = "DELETE FROM certificates WHERE create_folder_id = $id";
	$conn->query($sql);

	$sql = "DELETE FROM create_folder WHERE id = $id";
	$conn->query($sql);
?>