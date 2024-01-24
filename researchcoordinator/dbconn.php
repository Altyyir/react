<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

$servername = "localhost";
$username = "root";
if($url == "http://localhost") {
    $password = "";
} else {
    $password = "Capstone2023React";
}
$dbname = "react";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//  echo "Connected successfully";
?>