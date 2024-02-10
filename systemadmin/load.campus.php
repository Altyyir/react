<?php
include 'dbconn.php';

$sql = "SELECT * FROM `campus`";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
?>
  <option value="<?= $row['id'] ?>"><?= $row['campus_name'] ?></option>
<?php
}
?>