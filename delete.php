<?php 
include "dbconn.php";

	$Id = $_GET['Id'];

	$sql = mysqli_query($conn, "DELETE FROM research_topic WHERE Id = '$Id'");

	header("Location: kanban.php?sm=1");

 ?> -->