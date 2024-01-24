<?php
include 'dbconn.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){  
$user_id = $_SESSION['user_id'];
$college = $_SESSION['college'];
$award = $_POST['award'];
$rank = $_POST['rank'];
$category = $_POST['category'];
$year_granted = $_POST['year_granted'];
$granting_institution = $_POST['granting_institution'];

    echo $sql = "INSERT INTO award (award, rank, category, year_granted, granting_institution, added_by) VALUES ('$award', '$rank', '$category', '$year_granted', '$granting_institution', $user_id)";
    $conn->query($sql);

    header("location: tableawards.php"); 
    exit();
            
} 