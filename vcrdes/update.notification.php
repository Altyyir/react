<?php
  include 'dbconn.php';

  $userNotifID = $_GET['id'];

  $sql = "UPDATE `user_notification` SET `state`=1 WHERE `id`=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./index.php");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $userNotifID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $sql = "SELECT `n`.`category` FROM `user_notification` AS `un` INNER JOIN `notification` AS `n` ON `un`.`notification_id` = `n`.`id` WHERE `un`.`id` = ?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./index.php");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $userNotifID);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  if($row['category'] == "personal profiles") {
    header("location: ./tablepersonal.php");
    exit();
  } elseif($row['category'] == "academic background") {
    header("location: ./tableacademic.php");
    exit();
  } elseif($row['category'] == "employment") {
    header("location: ./tableemployment.php");
    exit();
  } elseif($row['category'] == "specialization") {
    header("location: ./tablespecialization.php");
    exit();
  } elseif($row['category'] == "awards") {
    header("location: ./tableawards.php");
    exit();
  } elseif($row['category'] == "conferences") {
    header("location: ./tableconferences.php");
    exit();
  } elseif($row['category'] == "project profiles") {
    header("location: ./tableprojectprofiles.php");
    exit();
  } elseif($row['category'] == "scw") {
    header("location: ./tablescw.php");
    exit();
  } elseif($row['category'] == "inventions") {
    header("location: ./tableinventions.php");
    exit();
  } elseif($row['category'] == "research topic") {
    header("location: ./proposal.php");
    exit();
  } elseif($row['category'] == "certificates") {
    header("location: ./collegesfolder.php");
    exit();
  }
?>