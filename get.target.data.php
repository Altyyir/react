<?php
  include 'dbconn.php';
  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $academicYear = $_POST['academicyear'];
    $semester = $_POST['semester'];
    $userID = $_SESSION["user_id"];
    $data = array(array("0", "0", "0", "0"), array("0", "0", "0", "0"));
    
    $sql = "SELECT * FROM `target` WHERE `added_by` = $userID AND `academic_year` = '$academicYear'";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) {
      if($semester == "1") {
        $data[0][0] = $row['research_presentation_first_sem'];
        $data[0][1] = $row['institutional_research_first_sem'];
        $data[0][2] = $row['research_development_first_sem'];
        $data[0][3] = $row['research_publication_first_sem'];
      } else {
        $data[0][0] = $row['research_presentation_second_sem'];
        $data[0][1] = $row['institutional_research_second_sem'];
        $data[0][2] = $row['research_development_second_sem'];
        $data[0][3] = $row['research_publication_second_sem'];
      }
    }

    if($semester == "1") {
      $years = explode("-", $academicYear);
      $year = $years[0];

      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][1] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][3] = $row['total'];
      }
      
      $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][0] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `seminar_training` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][2] = $row['total'];
      }
      
    } else {
      $years = explode("-", $academicYear);
      $year = $years[1];

      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][1] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][3] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][0] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `seminar_training` WHERE `added_by` = $userID AND YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][2] = $row['total'];
      }
      
    }

    echo json_encode($data);
  }

?>