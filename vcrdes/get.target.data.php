<?php
  include 'dbconn.php';
  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $academicYear = $_POST['academicyear'];
    $semester = $_POST['semester'];
    $college = $_POST["college"];
    $data = array(array("0", "0", "0", "0"), array("0", "0", "0", "0"));
    
    $sql = "SELECT SUM(`research_presentation_first_sem`) AS `research_presentation_first_sem`, SUM(`institutional_research_first_sem`) AS `institutional_research_first_sem`, SUM(`research_development_first_sem`) AS `research_development_first_sem`, SUM(`research_publication_first_sem`) AS `research_publication_first_sem`, SUM(`research_presentation_second_sem`) AS `research_presentation_second_sem`, SUM(`institutional_research_second_sem`) AS `institutional_research_second_sem`, SUM(`research_development_second_sem`) AS `research_development_second_sem`, SUM(`research_publication_second_sem`) AS `research_publication_second_sem` FROM `target` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND `academic_year` = '$academicYear'";
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

      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][1] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `scw_` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][3] = $row['total'];
      }
      
      $sql = "SELECT COUNT(*) AS `total` FROM `conferences` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][0] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `seminar_training` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 8 AND 12";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][2] = $row['total'];
      }
      
    } else {
      $years = explode("-", $academicYear);
      $year = $years[1];

      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][1] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `scw_` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][3] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `conferences` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][0] = $row['total'];
      }

      $sql = "SELECT COUNT(*) AS `total` FROM `seminar_training` AS `t` INNER JOIN `faculty_user` AS `fu` ON t.`added_by` = fu.`id` INNER JOIN `college` AS `c` ON fu.`college_id` = c.`id` WHERE c.`abbreviation_college` = '$college' AND YEAR(t.dateAdded) = '$year' AND MONTH(t.dateAdded) BETWEEN 1 AND 5";
      $result = $conn->query($sql);
      if($row = $result->fetch_assoc()) {
        $data[1][2] = $row['total'];
      }
      
    }

    echo json_encode($data);
  }

?>