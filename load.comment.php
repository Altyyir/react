<?php 

include 'dbconn.php';
session_start();

$comments = array();

$sql = "SELECT rtc.id, rtc.research_topic_id, rtc.category, rtc.comment, rtc.date_sent, fu.title, fu.first_name, fu.last_name, fu.image_path, rtc.sender FROM `research_topic_comments` AS `rtc` INNER JOIN `faculty_user` AS `fu` ON `rtc`.`sender` = `fu`.`id` ORDER BY date_sent";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$commentRow['id'] = $row['id'];
	$commentRow['research_topic_id'] = $row['research_topic_id'];
	$commentRow['category'] = $row['category'];
	$commentRow['comment'] = $row['comment'];
	$commentRow['date_sent'] = $row['date_sent'];
	$commentRow['user'] = $row['title'] . " " . $row['first_name'] . " " . $row['last_name'];
	$commentRow['userID'] = $row['sender'];
	$commentRow['image_path'] = $row['image_path'];

	array_push($comments, $commentRow);
}

echo json_encode($comments);

?>