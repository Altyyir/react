<?php
include 'dbconn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ./tableconferences.php?error");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssssssss", $themetitle, $conference_title, $organizer, $venue, $participation, $conference, $from_conference, $to_conference, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	// $user_id = $_SESSION['user_id'];
	// $category = "conferences";
	// $description = "has updated his/her conferences.";
	// $sql = "INSERT INTO `notification`(`user_id`, `category`, `description`) VALUES (?, ?, ?)";
	// $stmt = mysqli_stmt_init($conn);
	// if (!mysqli_stmt_prepare($stmt, $sql)) {
	// 	header("location: ./tableconferences.php?error");
	// 	exit();
	// }
	// mysqli_stmt_bind_param($stmt, "sss", $user_id, $category, $description);
	// mysqli_stmt_execute($stmt);
	// $notificationID = $conn->insert_id;
	// mysqli_stmt_close($stmt);

	// $college_id = $_SESSION['college'];
	// $sql = "SELECT * FROM `college` WHERE `id` = ?";
	// $stmt = mysqli_stmt_init($conn);
	// if (!mysqli_stmt_prepare($stmt, $sql)) {
	// 	header("location: ./tableconferences.php?error");
	// 	exit();
	// }
	// mysqli_stmt_bind_param($stmt, "s", $college_id);
	// mysqli_stmt_execute($stmt);
	// $result = mysqli_stmt_get_result($stmt);
	// $row = mysqli_fetch_assoc($result);
	// $collegeAbbrev = $row['abbreviation_college'];
	// mysqli_stmt_close($stmt);

	// $sql = "SELECT `fu`.`id` FROM `faculty_user` AS `fu` LEFT JOIN `college` AS `c` ON `fu`.`college_id` = `c`.`id` WHERE `c`.`abbreviation_college` = ? OR `fu`.`college_id` IS NULL";
	// $stmt = mysqli_stmt_init($conn);
	// if (!mysqli_stmt_prepare($stmt, $sql)) {
	// 	header("location: ./tableconferences.php?error");
	// 	exit();
	// }
	// mysqli_stmt_bind_param($stmt, "s", $collegeAbbrev);
	// mysqli_stmt_execute($stmt);
	// $result = mysqli_stmt_get_result($stmt);

	// while ($row = mysqli_fetch_assoc($result)) {
	// 	$user_id = $row['id'];
	// 	$sql = "INSERT INTO `user_notification`(`notification_id`, `user_id`) VALUES (?, ?)";
	// 	$stmt = mysqli_stmt_init($conn);
	// 	if (!mysqli_stmt_prepare($stmt, $sql)) {
	// 		header("location: ./tableconferences.php?error");
	// 		exit();
	// 	}
	// 	mysqli_stmt_bind_param($stmt, "ss", $notificationID, $user_id);
	// 	mysqli_stmt_execute($stmt);
	// 	mysqli_stmt_close($stmt);
	// }

	header("location: ./tableconferences.php");
	exit();
}
