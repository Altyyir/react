<?php
include 'dbconn.php';
session_start();

if (isset($_GET['submit'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM `faculty_user` WHERE email = ? AND status = 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./page-login.php?invalid=1"); // invalid = 1 kapag may error sa sql statement
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email); // status = 0 ibigsabihin hindi pa verified ang account
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        $sql = "SELECT * FROM `faculty_user` WHERE `email` = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ./page-login.php?invalid=1"); // invalid = 1 kapag may error sa sql statement
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email); // status = 0 ibigsabihin hindi pa verified ang account
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        $password_hashed = $row['password'];
        if (password_verify($password, $password_hashed)) {
            $_SESSION["user_id"] = $row['id'];
            $_SESSION['authority'] = $row['authority'];
            $_SESSION['college'] = $row['college_id'];
            
            if($row['authority'] == "System Admin") {
                echo 'System Admin';
                exit();
            } elseif($row['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
                echo 'Vice Chancellor for Research, Development & Extension Services';
                exit();
            } elseif($row['authority'] == "Head Research") {
                echo 'Head Research';
                exit();
            } elseif($row['authority'] == "Dean/Associate Dean") {
                echo 'Dean/Associate Dean';
                exit();
            } elseif($row['authority'] == "College Research Coordinator") {
                echo 'College Research Coordinator';
                exit();
            } else {
                echo 'Faculty Researcher';
                exit();
            }
        } else {
            echo '3'; //invalid = 3 kapag mali ang password
            exit();
        }
    } else {
        echo '2'; //invalid = 2 kapag walang existing email sa database
        exit();
    }
}
?>