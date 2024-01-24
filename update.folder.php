<!-- <?php
// Assuming you have a database connection established
include 'dbconn.php';

// Check if the request has the necessary data
if(isset($_POST['renameFolder'])) {
    echo $id = $_POST['updateid'];
    echo $createfolder = $_POST['newFolderName'];

    $sql = "UPDATE `create_folder` SET `createfolder`= ? WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $createfolder, $id);
        if (mysqli_stmt_execute($stmt)){
            header("location: createfolder.php");    
        } else {
           header("location: createfolder.php"); 
        }
        mysqli_stmt_close($stmt);
    }
  }
?>
 -->