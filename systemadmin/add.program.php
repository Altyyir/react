<?php

include 'dbconn.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$collegeID = $_POST['college_name'];
	$abbrProgram = $_POST['abbreviation_program'];
	$nameProgram = $_POST['program_name'];
    
    $sql = "INSERT INTO `program`(`college_id`, `abbreviation`, `program`) VALUES ($collegeID, '$abbrProgram', '$nameProgram'	)";
    $conn->query($sql);

    header('location: ./program.php');
    exit();

}