<?php
include "dbconn.php";

if (!$conn) {
	die('error in conn' . mysqli_error($conn));
}

$Id = $_GET['Id'];

$sql = "DELETE FROM `adduser` WHERE Id=$Id";
if(mysqli_query($conn, $sql)){
	header('location: ./index.php');
}else{
	echo mysqli_error($conn);
}

 ?>