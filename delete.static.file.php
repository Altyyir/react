<?php
	$fileName = $_GET['filename'];
	$folderName = $_GET['foldername'];

	unlink("./certificate_upload/".$folderName."/".$fileName);
	header("location: ./certificates.php?id=null&folder=".$folderName);
	exit();
?>