<?php
  include 'dbconn.php';
  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $userID = $_SESSION['user_id'];
    $academicYear = $_POST['academicyear'];
    $insResFirstSem = $_POST['insresfirstsem'];
    $insResSecondSem = $_POST['insressecondsem'];
    $insResTotal = $_POST['insrestotal'];
    $resPubFirstSem = $_POST['respubfirstsem'];
    $resPubSecondSem = $_POST['respubsecondsem'];
    $resPubTotal = $_POST['respubtotal'];
    $resPreFirstSem = $_POST['resprefirstsem'];
    $resPreSecondSem = $_POST['respresecondsem'];
    $resPreTotal = $_POST['respretotal'];
    $resDevFirstSem = $_POST['resdevfirstsem'];
    $resDevSecondSem = $_POST['resdevsecondsem'];
    $resDevTotal = $_POST['resdevtotal'];

    $sql = "SELECT * FROM `target` WHERE `added_by` = ? AND `academic_year` = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ./target.php?error");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userID, $academicYear);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if($row = mysqli_fetch_assoc($result)) {
      // UPDATE
      $sql = "UPDATE `target` SET `institutional_research_first_sem`=?,`institutional_research_second_sem`=?,`institutional_research_total`=?,`research_publication_first_sem`=?,`research_publication_second_sem`=?,`research_publication_total`=?,`research_presentation_first_sem`=?,`research_presentation_second_sem`=?,`research_presentation_total`=?,`research_development_first_sem`=?,`research_development_second_sem`=?,`research_development_total`=? WHERE `added_by`=? AND `academic_year`=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./target.php?error");
        exit();
      }

      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $insResFirstSem, $insResSecondSem, $insResTotal, $resPubFirstSem, $resPubSecondSem, $resPubTotal, $resPreFirstSem, $resPreSecondSem, $resPreTotal, $resDevFirstSem, $resDevSecondSem, $resDevTotal, $userID, $academicYear);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

    } else {
      // INSERT
      $sql = "INSERT INTO `target`(`added_by`, `academic_year`, `institutional_research_first_sem`, `institutional_research_second_sem`, `institutional_research_total`, `research_publication_first_sem`, `research_publication_second_sem`, `research_publication_total`, `research_presentation_first_sem`, `research_presentation_second_sem`, `research_presentation_total`, `research_development_first_sem`, `research_development_second_sem`, `research_development_total`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./target.php?error");
        exit();
      }

      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $userID, $academicYear, $insResFirstSem, $insResSecondSem, $insResTotal, $resPubFirstSem, $resPubSecondSem, $resPubTotal, $resPreFirstSem, $resPreSecondSem, $resPreTotal, $resDevFirstSem, $resDevSecondSem, $resDevTotal);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

    }

    header("location: ./target.php?academicyear=".$academicYear);
    exit();
  }
?>