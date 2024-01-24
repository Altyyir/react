<?php
	include 'dbconn.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$titleprogram = $_POST['titleprogram'];
	    $titleproject = $_POST['titleproject'];
	    $typeproject = $_POST['typeproject'];
	    $fundinginstitution = $_POST['fundinginstitution'] ? $_POST['fundinginstitution'] : null;
	    $typefundinginstitution = $_POST['typefundinginstitution'];
	    $implementingagency = $_POST['implementingagency'];
	    $coimplementingagency = $_POST['coimplementingagency'] ? $_POST['coimplementingagency'] : null;
	    $positionproject = $_POST['positionproject'];
	    $status = $_POST['status'];
	    $sector = $_POST['sector'];
	    $from_project = $_POST['from_project'];
	    $to_project = $_POST['to_project'];
	    $projectsite = $_POST['projectsite'] ? $_POST['projectsite'] : null;
	
		$sql = "UPDATE `project_profile` SET `titleprogram`=?,`titleproject`=?,`typeproject`=?,`fundinginstitution`=?,`typefundinginstitution`=?,`implementingagency`=?,`coimplementingagency`=?,`positionproject`=?,`status`=?,`sector`=?,`from_project`=?,`to_project`=?,`projectsite`=? WHERE `id`=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ./tableprojectprofiles.php?error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "ssssssssssssss", $titleprogram, $titleproject, $typeproject, $fundinginstitution, $typefundinginstitution, $implementingagency, $coimplementingagency, $positionproject, $status, $sector, $from_project, $to_project, $projectsite, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ./tableprojectprofiles.php");
		exit();
	}
?>