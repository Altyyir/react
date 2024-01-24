<?php
  include 'dbconn.php';
  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $folderID = $_SESSION['folderID'];

    $sql = "SELECT * FROM certificates WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    unlink("./certificate_upload/".$row['path']);

    $sql = "DELETE FROM certificates WHERE id = $id";
    $conn->query($sql);

    header("location: ./certificates.phpid=".$folderID);
  }

?>