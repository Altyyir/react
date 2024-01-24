<?php
	include 'dbconn.php';

	$campus = $_GET['campus'];

	$sql = "SELECT * FROM college WHERE campus_id = $campus";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
?>
	<option value="<?=$row['id']?>"><?=$row['college_name']?></option>
<?php		
	}
?>