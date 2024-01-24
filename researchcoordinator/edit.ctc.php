<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title_ctc = $_POST['title_ctc'];
		$venue_ctc = $_POST['venue_ctc'];
		$conference_ctc = $_POST['conference_ctc'];
		$organizer_ctc = $_POST['organizer_ctc'];
		$from_ctc = $_POST['from_ctc'];
		$to_ctc = $_POST['to_ctc'];
	
		$sql = "UPDATE `ctc` SET `title_ctc`=?,`venue_ctc`=?,`conference_ctc`=?,`organizer_ctc`=?,`from_ctc`=?,`to_ctc`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tablectc.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sssssss", $title_ctc, $venue_ctc, $conference_ctc, $organizer_ctc, $from_ctc, $to_ctc, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tablectc.php");
		exit();
	}
?>