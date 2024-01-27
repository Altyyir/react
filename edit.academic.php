<?php
	include 'dbconn.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo $id = $_POST['id'];
		echo $degree = $_POST['degree'];
		echo $major_field = $_POST['major_field'];
		echo $sector = $_POST['sector'];
		echo $institution = $_POST['institution'];
		echo $status = $_POST['status'];
		echo $year_start = $_POST['year_start'];
		echo $year_end = $_POST['year_end'];
		echo $thesis = $_POST['thesis'];
		echo $sponsor_academic = $_POST['sponsor_academic'] ? $_POST['sponsor_academic'] : null;
		echo $primary_sponsor = $_POST['primary_sponsor'] ? $_POST['primary_sponsor'] : null;
		echo $scholarship_start = $_POST['scholarship_start'] ? $_POST['scholarship_start'] : null;
		echo $scholarship_end = $_POST['scholarship_end'] ? $_POST['scholarship_end'] : null;
		echo $extension_start = $_POST['extension_start'] ? $_POST['extension_start'] : null;
		echo $extension_end = $_POST['extension_end'] ? $_POST['extension_end'] : null;
		echo $item_expenses = $_POST['item_expenses'] ? $_POST['item_expenses'] : null;
		echo $amount_approved = $_POST['amount_approved'] ? $_POST['amount_approved'] : null;
		echo $amount_released = $_POST['amount_released'] ? $_POST['amount_released'] : null;
		echo $date_released = $_POST['date_released'] ? $_POST['date_released'] : null;	

		$sql = "UPDATE `academic_background` SET `degree`=?,`major_field`=?,`sector`=?,`institution`=?,`status`=?,`year_start`=?,`year_end`=?,`thesis`=?,`sponsor_academic`=?,`primary_sponsor`=?,`scholarship_start`=?,`scholarship_end`=?,`extension_start`=?,`extension_end`=?,`item_expenses`=?,`amount_approved`=?,`amount_released`=?,`date_released`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableacademic.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $degree, $major_field, $sector, $institution, $status, $year_start, $year_end, $thesis, $sponsor_academic, $primary_sponsor, $scholarship_start, $scholarship_end, $extension_start, $extension_end, $item_expenses, $amount_approved, $amount_released, $date_released, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		$user_id = $_SESSION['user_id'];
  $category = "academic background";
  $description = "has updated his/her academic background.";
  $sql = "INSERT INTO `notification`(`user_id`, `category`, `description`) VALUES (?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./tableacademic.php?error");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "sss", $user_id, $category, $description);
  mysqli_stmt_execute($stmt);
  $notificationID = $conn->insert_id;
  mysqli_stmt_close($stmt);

  $college_id = $_SESSION['college'];
  $sql = "SELECT * FROM `college` WHERE `id` = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./tableacademic.php?error");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $college_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  $collegeAbbrev = $row['abbreviation_college'];
  mysqli_stmt_close($stmt);

  $sql = "SELECT `fu`.`id` FROM `faculty_user` AS `fu` LEFT JOIN `college` AS `c` ON `fu`.`college_id` = `c`.`id` WHERE `c`.`abbreviation_college` = ? OR `fu`.`college_id` IS NULL";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./tableacademic.php?error");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $collegeAbbrev);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
    $sql = "INSERT INTO `user_notification`(`notification_id`, `user_id`) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ./tableacademic.php?error");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $notificationID, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

		header("location: ./tableacademic.php");
		exit();
	}
?>