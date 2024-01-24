<?php
  include 'dbconn.php';

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title_seminar = $_POST['title_seminar'];
    $venue_seminar = $_POST['venue_seminar'];
    $organizer_seminar = $_POST['organizer_seminar'];
    $conference_seminar = $_POST['conference_seminar'];
    $from_seminar = $_POST['from_seminar'];
    $to_seminar = $_POST['to_seminar'];

    $sql = "UPDATE `seminar_training` SET `title_seminar`=?,`organizer_seminar`=?,`venue_seminar`=?,`conference_seminar`=?,`to_seminar`=?,`from_seminar`=?  WHERE `id`=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tabletraining.seminar.php?error");
			exit();
		}

    mysqli_stmt_bind_param($stmt, "sssssss", $title_seminar, $organizer_seminar, $venue_seminar, $conference_seminar, $to_seminar, $from_seminar, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

    header("location: ./tabletraining.seminar.php");
    exit();
  }
?>