<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		include 'dbconn.php';

		$college = $_POST['college'];
		$filterType = $_POST['filterType'];
		if(isset($_POST['year'])) {
			$year = $_POST['year'];
		} else {
			$year = "null";
		}

		header("location: ./tablereport.php?college=".$college."&filtertype=".$filterType."&year=".$year);
		exit();
	}
?>