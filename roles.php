<?php
	require 'dbconn.php';

	$role = $_GET['q'];
	$sql = "SELECT * FROM `representative_roles`";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){

?>
<tr id="row-<?=$row['id']?>">
    <td class="col-md-4" id="name-<?=$row['id']?>" style="text-align: left;"><?=$row['name']?></td>
    <td class="col-md-7" id="designation-<?=$row['id']?>" style="text-align: left;"><?=$row['designation']?></td>
    <td class="col-md-1"><button style="margin-left:5px" type="button" name="addRole" id="roleMem<?=$role?>" onclick="addMember('<?=$row['id']?>')" class="btn btn-primary shadow btn-xs sharp"><i class="fas fa-plus"></i></button></td>
</tr>
<?php
	}
?>