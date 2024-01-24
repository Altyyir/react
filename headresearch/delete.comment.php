<?php

include 'dbconn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM research_topic_comments WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);  // 'i' represents integer type

        if (mysqli_stmt_execute($stmt)) {
            header('location: ./proposal.php');
        } else {
            header('location: ./proposal.php');
        }

        mysqli_stmt_close($stmt);
    } else {
        header('location: ./proposal.php');
    }
}

mysqli_close($conn);

?>
