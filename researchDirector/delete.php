<?php
include "dbconn.php";

if (!$conn) {
	die('error in conn' . mysqli_error($conn));
}

$faculty_research_id = $_GET['faculty_research_id'];

$sql = "DELETE FROM `faculty_research` WHERE faculty_research_id=$faculty_research_id";
if(mysqli_query($conn, $sql)){
	header('location: ./kanban.php');
}else{
	echo mysqli_error($conn);
}

 ?>