<?php

include 'dbconn.php';

$college = $_GET['college'];

$sql = "SELECT * FROM `program` WHERE college_id = $college";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
?>
	<option value="<?=$row['id']?>"><?=$row['program']?></option>
<?php
}
$result = $conn->query($sql);
if(!$row = $result->fetch_assoc()) {
	echo "<option>none</option>";
}
?>