<?php

session_start();

include 'dbconn.php';

$id = $_GET['id'];
$comment = $_GET['comment'];
$userID = $_SESSION['user_id'];

echo $sql = "INSERT INTO `research_topic_comments`(`research_topic_id`, `sender`, `comment`) VALUES ('{$id}','{$userID}','{$comment}')";
$conn->query($sql);

?>