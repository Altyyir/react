<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		echo $id = $_POST['folderId'];
	    echo $createfolder = $_POST['newFolderName'];

	    $sql = "SELECT * FROM create_folder WHERE createfolder = '$createfolder'";
	    $result = $conn->query($sql);
	    if($row = $result->fetch_assoc()) {
	      header("location: ./createfolder.php?folder_exists");
	      exit();
	    }

	    $sql = "UPDATE `create_folder` SET `createfolder`= ? WHERE `id` = ?";
	    $stmt = mysqli_prepare($conn, $sql);

	    if ($stmt) {
	        mysqli_stmt_bind_param($stmt, "ss", $createfolder, $id);
	        if (mysqli_stmt_execute($stmt)){
	            header("location: createfolder.php");    
	        } else {
	           header("location: createfolder.php"); 
	        }
	        mysqli_stmt_close($stmt);
	    }
	}
?>