<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $id = $_POST['updateid'];
  $campus_name = $_POST['updateCampus'];
  $college_name = $_POST['updateCollege'];
  $abbreviation_college = $_POST['updateAbbreviation'];

  $sql = "UPDATE `college` SET `campus_id`= ?,`college_name`= ?,`abbreviation_college`= ? WHERE `id` = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssss", $campus_name, $college_name, $abbreviation_college, $id);
    if (mysqli_stmt_execute($stmt)) {
      header("location: college.php");
    } else {
      header("location: program.php");
    }
    mysqli_stmt_close($stmt);
  }
}
exit();
