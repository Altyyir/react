<!-- <?php include "dbconn.php"; ?>

<?php
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$agenda = $_POST['agenda'];
	$partnership = $_POST['partnership'];
	$sponsor = $_POST['sponsor'];
	$developmentGoal = $_POST['developmentgoal'];
	$goal = implode (", ",$developmentGoal);
	$agency = $_POST['agency'];
	$college = $_POST['college'];
	$department = $_POST['department'];
	$startDate = $_POST['startdate'];
	$endDate = $_POST['enddate'];
	$female = $_POST['female'];
	$male = $_POST['male'];
	// $status =$_POST['status'];


	$sql = "INSERT INTO `research_topic`(`Id`, `title`, `agenda`, `partnership`, `sponsor`, `developmentGoal`, `agency`, `college`, `department`, `startDate`, `endDate`, `female`, `male`, `statusProposal`) VALUES (NULL,'$title','$agenda','$partnership','$sponsor','$goal','$agency','$college','$department','$startDate','$endDate','$female','$male','For Evaluation')";

	$result =mysqli_query($conn, $sql);
	if($result){

		$_SESSION['alert'] = "Successfully";
		$_SESSION['alert_code'] = "success";
		header("Location: kanban.php");
	} 
	else {
		$_SESSION['alert'] = "Data Not Successful";
		$_SESSION['alert_code'] = "error";
		header("Location: reseachtopic.php")
	}
}


// if(isset($_POST['update'])){
// 	$id = $_POST['id'];
// 	$title = $_POST['title'];
// 	$authors = $_POST['authors']; 
// 	$college = $_POST['college'];
// 	$program = $_POST['program'];
// 	$budget = $_POST['budget'];
// 	$status= $_POST['status'];
// 	$date_started= $_POST['datestarted'];
// 	$end_date = $_POST['enddate'];
// 	$revision_no = $_POST['revisionno'];
// 	// $file_path = $_POST['filepath'];

// 	$sql = "UPDATE `faculty_research` SET `title`='$title',`authors`='$authors',`college`='$college',`program`='$program',`budget`='$budget',`status`='$status',`date_started`='$date_started',`end_date`='$end_date',`revision_no`='$revision_no',`file_path`='NULL' WHERE `faculty_research_id`='$id'";

// 	echo $result =mysqli_query($conn, $sql);

// 	if($result){
// 		header("Location: kanban.php");
// 	}
// 	else {
// 		header("Location: kanban.php");
// 	}
// }

if(isset($_POST['btn-danger'])){
	$Id = $_POST['Id'];

	$sql = "DELETE FROM research_topic WHERE Id ='$Id'";
	$result =mysqli_query($conn, $sql);

	if($result) {
		$_SESSION['alert'] = "Data Deleted Successfully";
		$_SESSION['alert_code'] = "success";
		header("Location: kanban.php");
	}
	else{
		$_SESSION['alert'] = "Data Not Deleted Successfully";
		$_SESSION['alert_code'] = "error";
		header("Location: kanban.php");
	}
}




 ?> -->