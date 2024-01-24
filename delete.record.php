<?php
	include 'dbconn.php';

	$table = $_GET['table'];
	$id = $_GET['id'];

	if($table == "research_topic") {
		if(isset($_GET['id'])) {
		    // Sanitize and get the 'id' value from the GET request
		    $id = mysqli_real_escape_string($conn, $_GET['id']);
		    $research_representative_ids = array();

		    echo $sql = "SELECT * FROM research_representatives WHERE `research_topic_id` LIKE '$id'";
		    $result = $conn->query($sql);
		    while($row = $result->fetch_assoc()) {
		    	array_push($research_representative_ids, $row['id']);
		    }

		    foreach($research_representative_ids as $value) {
		    	$sql = "DELETE FROM `representative` WHERE `research_representatives_id` LIKE '$value'";
		    	$conn->query($sql);
		    	$sql = "DELETE FROM `research_representatives_responsibilities` WHERE `research_representatives_id` LIKE '$value'";
		    	$conn->query($sql);
		    }
		    
		    $sql = "DELETE FROM `research_representatives` WHERE `research_topic_id` LIKE '$id'";
		    $conn->query($sql);

		    $sql = "DELETE FROM `expenses` WHERE `research_topic_id` LIKE '$id'";
		    $conn->query($sql);

		    $sql = "DELETE FROM `research_topic` WHERE `id` LIKE '$id'";
		    $conn->query($sql);

		    header("Location: proposal.php?sm=1");
		    exit();
		} else {
		    // 'id' parameter is not set
		    echo "ID parameter is missing.";
		}

		// Close the database connection
		mysqli_close($conn);
	} else {
		$sql = "DELETE FROM $table WHERE id = $id";
		$conn->query($sql);

	}
?>