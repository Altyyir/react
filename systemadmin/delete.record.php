<?php
	include 'dbconn.php';

	$table = $_GET['table'];
	$id = $_GET['id'];

	if($table == "campus") {
		$sql = "SELECT * FROM college WHERE campus_id = $id";
		$result = $conn->query($sql);
		if($row = $result->fetch_assoc()) {
			$collegeID = $row['id'];
			$sql = "DELETE FROM program WHERE college_id = $collegeID";
			$conn->query($sql);

			$sql = "DELETE FROM college WHERE campus_id = $id";
			$conn->query($sql);
		}
		$sql = "DELETE FROM campus WHERE id = $id";
		$conn->query($sql);
	} elseif($table == "college") {
		$sql = "SELECT * FROM college WHERE id = $id";
		$result = $conn->query($sql);

		if($row = $result->fetch_assoc()) {
			$college = $row['id'];

			$sql = "DELETE FROM program WHERE college_id = $college";
			$conn->query($sql);

			$sql = "DELETE FROM college WHERE id = $id";
			$conn->query($sql);
		}
	} else {
		$sql = "DELETE FROM $table WHERE id = $id";
		$conn->query($sql);
	}
?>