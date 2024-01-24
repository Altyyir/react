<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$themetitle = $_POST['themetitle'];
		$conference_title = $_POST['conference_title'];
	    $organizer = $_POST['organizer'];
	    $venue = $_POST['venue'];
	    $participation = $_POST['participation'];
	    $conference = $_POST['conference'];
	    $from_conference = $_POST['from_conference'];
	    $to_conference = $_POST['to_conference'];
	
		$sql = "UPDATE `conferences` SET `themetitle`=?,`conference_title`=?,`organizer`=?,`venue`=?,`participation`=?,`conference`=?,`from_conference`=?,`to_conference`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableconferences.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sssssssss", $themetitle, $conference_title, $organizer, $venue, $participation, $conference, $from_conference, $to_conference, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tableconferences.php");
		exit();
	}
?>