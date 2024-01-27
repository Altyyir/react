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

  if($category = "personal profiles") {
    header("location: ./tablepersonal.php");
    exit();
  }
?>