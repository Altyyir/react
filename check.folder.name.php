<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$folderName = $_POST['folder'];

		$sql = "SELECT * FROM create_folder WHERE createfolder = '$folderName'";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
			echo "true";
			exit();
        } else {
    		echo "false";
    		exit();
        }
	}
?>