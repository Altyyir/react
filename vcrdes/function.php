<?php 
include "dbconn.php";

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$authors = $_POST['authors']; 
	$college = $_POST['college'];
	$program = $_POST['program'];
	$budget = $_POST['budget'];
	$status= $_POST['status'];
	$date_started= $_POST['datestarted'];
	$end_date = $_POST['enddate'];
	$revision_no = $_POST['revisionno'];
	// $file_path = $_POST['filepath'];

	$sql = "UPDATE `faculty_research` SET `title`='$title',`authors`='$authors',`college`='$college',`program`='$program',`budget`='$budget',`status`='$status',`date_started`='$date_started',`end_date`='$end_date',`revision_no`='$revision_no',`file_path`='NULL' WHERE `faculty_research_id`='$id'";

	echo $result =mysqli_query($conn, $sql);

	if($result){
		header("Location: ./kanban.php?success");
	}
	else {
		echo "Failed: " . mysqli_error($conn);
	}
}

 ?>