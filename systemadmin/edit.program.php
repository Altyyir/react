<?php
  include 'dbconn.php';

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['updateid'];
    $college_id = $_POST['college_name'];
    $abbreviation = $_POST['updateAbbreviation'];
    $program = $_POST['updateProgram'];
    
    $sql = "UPDATE `program` SET `college_id`= ?, `abbreviation`= ?,`program`= ? WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $college_id, $abbreviation, $program, $id);
        if (mysqli_stmt_execute($stmt)){
        	header("location: program.php");
        	exit();	
        } else {
           header("location: campus.php");	
           exit();
        }
        mysqli_stmt_close($stmt);
    }
  }
?>