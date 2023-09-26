<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unilink";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form ID to delete from the query parameter
    $i = $_GET[delete];
    $activity_representatives_id = array();

    $sql = "SELECT * FROM activity_representatives WHERE activityform_id LIKE '$i'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        array_push($activity_representatives_id, $row['id']);
    }

    foreach ($activity_representatives_id as $value) {
        $sql = "DELETE FROM representatives WHERE activity_representatives_id LIKE '$value'";
        $conn->query($sql);
        $sql = "DELETE FROM activity_representatives_responsibilities WHERE activity_representatives_id LIKE '$value'";
        $conn->query($sql); 
    }
    $sql = "DELETE FROM representatives WHERE id LIKE '$id'";
    $conn->query($sql);

    $sql = "DELETE FROM budget WHERE id LIKE '$id'";
    $conn->query($sql);

    $sql = "DELETE FROM activityform WHERE id LIKE '$id'";
    $conn->query($sql);

    header("Location: ui-formsPreview.php?sm=1");
    exit();

mysqli_close($conn);

?>