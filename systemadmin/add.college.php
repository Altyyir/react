<?php

include 'dbconn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$campus_name = $_POST['campus_name'];
    $college_name = $_POST['college_name'];
    $abbreviation_college = $_POST['abbreviation_college'];

    $sql = "INSERT INTO college (campus_id, college_name, abbreviation_college) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $campus_name, $college_name, $abbreviation_college);
        if (mysqli_stmt_execute($stmt)) {
            header("location: college.php");	
        } else {
            // Insert failed
        }
        mysqli_stmt_close($stmt);
    }

	header("location: ./college.php");
	exit();
}