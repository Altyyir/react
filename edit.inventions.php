<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo $id = $_POST['id'];
		echo "<br>";
		echo $title = $_POST['title'];
		echo "<br>";
		echo $right_type = $_POST['right_type'];
		echo "<br>";
		echo $patent_no = $_POST['patent_no'];
		echo "<br>";
		echo $principal_author = $_POST['principal_author'];
		echo "<br>";
		echo $date_inventions = $_POST['date_inventions'];
		echo "<br>";
		echo $country = $_POST['country'];
		echo "<br>";

		$sql = "UPDATE `inventions` SET `title`=?,`right_type`=?,`patent_no`=?,`principal_author`=?,`date_inventions`=?,`country`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableinventions.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sssssss", $title, $right_type, $patent_no, $principal_author, $date_inventions, $country, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tableinventions.php");
		exit();
	}
?>