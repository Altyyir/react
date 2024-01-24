<?php
session_start();
include 'dbconn.php';
$id = $_SESSION['user_id'];

$targetDir = "../profile_upload/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    // Check if file is selected
    if (!empty($_FILES["file"]["name"])) {
        
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            
            // Insert image file path into database
            $insert = $conn->query("UPDATE faculty_user SET image_path = '$targetFilePath' WHERE id = $id");
            
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