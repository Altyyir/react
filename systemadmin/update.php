<?php 
include "dbconn.php";
session_start();

if(isset($_POST['update'])){
	$Id = $_GET['Id'];
	$fullname = $_POST['fullname'];
	$user_email = $_POST['useremail'];
	$user_pass = $_POST['userpass'];
	$college = $_POST['college'];
	$confirm_pass = $_POST['confirmpass'];

	$sql = "UPDATE `adduser` SET `fullname`='$fullname',`user_email`='$user_email',`user_pass`='$user_pass',`college`='$college',`confirm_pass`='$confirm_pass' WHERE `Id`='$Id'";

	echo $result =mysqli_query($conn, $sql);

	if($result){
		header("Location: ./index.php?success");
	}
	else {
		echo "Failed: " . mysqli_error($conn);
	}
}

 ?>