<?php
	include 'dbconn.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$createfolder = $_POST['createfolder'];

        $sql = "SELECT * FROM create_folder WHERE createfolder = '$createfolder'";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
          header("location: ./createfolder.php?folder_exists");
          exit();
        }

        $userID = $_SESSION['user_id'];
        $sql = "INSERT INTO create_folder (createfolder, added_by) VALUES ('$createfolder', $userID)";
        if (mysqli_query($conn, $sql)) {
            // Certificate added successfully
            header('Location: createfolder.php'); // Redirect to a success page or wherever you want
            exit();
        }
	}
?>