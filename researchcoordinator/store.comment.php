<?php

session_start();

include 'dbconn.php';

$id = $_GET['id'];
$comment = $_GET['comment'];
$category = $_GET['category'];
$userID = $_SESSION['user_id'];

echo $sql = "INSERT INTO `research_topic_comments`(`research_topic_id`, `sender`, `category`, `comment`) VALUES ('{$id}','{$userID}', '{$category}', '{$comment}')";
$conn->query($sql);

?>