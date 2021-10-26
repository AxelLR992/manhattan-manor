<?php
    include_once '../app_includes/check_login.php';
    include_once '../app_includes/db_connect.php';
    if ($_SESSION['usr_level'] !== "admin") {
    include_once '../app_includes/db_close.php';
    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
    }
    else {
        $stmt = $mysqli->prepare("DELETE FROM news WHERE recordid=?") or die(mysqli_error($mysqli));
    $stmt->bind_param('i', $_GET['rid']);

    /* execute prepared statement */
    $stmt->execute();

    /* close statement and connection */
    $stmt->close();
    include_once '../app_includes/db_close.php';
    header('Location: index.php');
    }
?>
