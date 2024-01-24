<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo $id = $_POST['id'];
		echo "<br/>";
		echo $type = $_POST['type'];
		echo "<br/>";
		echo $title = $_POST['title'];
		echo "<br/>";
		echo $principal_author = $_POST['principal_author'];
		echo "<br/>";
		echo $main_author = $_POST['main_author'];
		echo "<br/>";
		echo $volume = $_POST['volume'];
		echo "<br/>";
		echo $no = $_POST['no'];
		echo "<br/>";
		echo $year_published = $_POST['year_published'];
		echo "<br/>";
		echo $edition = $_POST['edition'];
		echo "<br/>";
		echo $issn_isbn = $_POST['issn_isbn'];
		echo "<br/>";
		echo $class = $_POST['class'];
		echo "<br/>";
		echo $level = $_POST['level'];
		echo "<br/>";
		echo $publication_group = $_POST['publication_group'];
		echo "<br/>";
		echo $authoring_type = $_POST['authoring_type'];
		echo "<br/>";
		echo $publisher = $_POST['publisher'];
		echo "<br/>";
		echo $place_publication = $_POST['place_publication'];
		echo "<br/>";
		echo $url = $_POST['url'];
		echo "<br/>";
		echo $digital_identifier = $_POST['digital_identifier'];	
		echo "<br/>";

		$sql = "UPDATE `scw_` SET `type`=?,`title`=?,`principal_author`=?,`main_author`=?,`volume`=?,`no`=?,`year_published`=?,`edition`=?,`issn_isbn`=?,`class`=?,`level`=?,`publication_group`=?,`authoring_type`=?,`publisher`=?,`place_publication`=?,`url`=?,`digital_identifier`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tablescw.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $type, $title, $principal_author, $main_author, $volume, $no, $year_published, $edition, $issn_isbn, $class, $level, $publication_group, $authoring_type, $publisher, $place_publication, $url, $digital_identifier, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tablescw.php");
		exit();
	}
?>