<?php
    include 'dbconn.php';

    $id = $_GET['id'];


    $sql = "UPDATE `research_topic` SET `status` = 'Approved With Notice to Proceed' WHERE `id` = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./proposal.php?invalid=1"); // invalid = 1 kapag may error sa sql statement
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id); // status = 0 ibigsabihin hindi pa verified ang account
    mysqli_stmt_execute($stmt);

    header("location: ./proposal.php");
    mysqli_stmt_close($stmt);
    exit();
?>