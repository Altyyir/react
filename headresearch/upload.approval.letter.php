<?php
	require 'dbconn.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    if (isset($_POST['addapprovalletter'])) {
	        $id = $_POST['id'];
					$startDate = $_POST['start_date'];
					$endDate = $_POST['end_date'];
	        // Include database connection code or make sure $conn is defined before this code

	        // Check if a file was uploaded
	        if (isset($_FILES['file'])) {
	            // Validate and sanitize input data (You should add this part)

	            // Handle image upload
	            $target_dir = 'approvalletter_upload/'; // Directory where you want to store uploaded images

	            // Generate a unique filename to avoid conflicts
	            $target_file = $target_dir . uniqid() . '_' . basename($_FILES['file']['name']);

	            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
	                // Image uploaded successfully, insert data into the database
	                $approval_letter = mysqli_real_escape_string($conn, $target_file); // Escape for database security
	                $sql = "UPDATE `research_topic` SET `approval_letter` = '$approval_letter', `start_date` = '$startDate', `end_date` = '$endDate' WHERE `id` = '$id'";
	                $result = $conn->query($sql);
	                header("location: ./proposal.php");
	            } else {
	                // Display SweetAlert error message using JavaScript
	                echo '<script>
	                    sweetAlert("Oops...", "Image Upload Failed !!", "error");
	                </script>';
	            }
	        } else { 
	            // Display SweetAlert error message when no file is uploaded
	            echo '<script>
	                swal("Oops...", "No image selected", "error");
	            </script>';
	        }
	    }
	}
?>