<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $id = $_POST['updateid'];
  $campus_name = $_POST['updateCampus'];
  $address = $_POST['updateAddress'];

  $sql = "UPDATE `campus` SET `campus_name`= ?,`address`= ? WHERE `id` = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $campus_name, $address, $id);
    if (mysqli_stmt_execute($stmt)) {
      header("location: campus.php");
    } else {
      header("location: college.php");
    }
    mysqli_stmt_close($stmt);
  }
}
exit();
