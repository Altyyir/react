<?php
session_start();
include 'dbconn.php';
$id = $_SESSION['user_id'];

$targetDir = "profile_upload/";
$currentMicroTime = microtime(true); 
$currentMillis = round($currentMicroTime * 1000);
$targetFilePath =  $targetDir . $currentMillis . "." . basename($_FILES['file']['type']);
$tmpFile =  $currentMillis . "." . basename($_FILES['file']['type']);

// Check if file is selected
if (!empty($_FILES["file"]["name"])) {
    
    // Upload file to server
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        $sql = "SELECT * FROM `faculty_user` WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        unlink("profile_upload/".$row['image_path']);
        
        // Insert image file path into database
        $insert = $conn->query("UPDATE faculty_user SET image_path = '$tmpFile' WHERE id = $id");
        
        if ($insert) {
            header('location: ./profile.php');
        } else {
            echo "File upload failed, please try again.";
        }
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Please select a file to upload.";
}

// Close connection
$conn->close();