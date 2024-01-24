<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>



<script type="text/javascript">
	swal({
	  title: "Success!",
	  text: "Successfully email sent through your inbox.!",
	  icon: "success",
	  button: "Okay",
	}).then((e)=>{
		location.href = "./page-login.php";
	});
</script>



</body>

