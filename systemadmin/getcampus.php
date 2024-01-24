<?php
	include '../dbconn.php';

	$college = $_GET['college'];
	$college_array = array();

	$sql = "SELECT * FROM `college` WHERE campus_id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $college);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while($row = mysqli_fetch_assoc($result)) {
		$tmp['name'] = $row['college_name'];
		$tmp['id'] = $row['id'];
		array_push($college_array, $tmp);
	}

	echo json_encode($college_array);

	mysqli_stmt_close($stmt);
?>