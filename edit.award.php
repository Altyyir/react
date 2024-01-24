<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$award = $_POST['award'];
		$rank = $_POST['rank'];
		$category =$_POST['category'];
		$year_granted = $_POST['year_granted'];
    	$granting_institution = $_POST['granting_institution'];
	
		$sql = "UPDATE `award` SET `award`=?,`rank`=?,`category`=?,`year_granted`=?,`granting_institution`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableawards.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "ssssss", $award, $rank, $category, $year_granted, $granting_institution, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tableawards.php");
		exit();
	}
?>