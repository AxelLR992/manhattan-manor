<?php
    include_once '../app_includes/check_login.php';
    include_once '../app_includes/db_connect.php';
    if ($_SESSION['usr_level'] !== "admin") {
    include_once '../app_includes/db_close.php';
    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
    }
    else {
        $mysqli->query("SET NAMES 'utf8'");
        $stmt = $mysqli->prepare("INSERT into users_cp (firstname, lastname, user_name, user_password, user_level, email, status, last_modified) values (?,?,?,?,?,?,?, NOW())");
    $stmt->bind_param('sssssss', $_POST['firstname'], $_POST['lastname'], $_POST['user_name'], $_POST['user_password'],$_POST['user_level'],$_POST['email'],$_POST['status']);

    /* execute prepared statement */
    $stmt->execute();

    /* close statement and connection */
    $stmt->close();
    include_once '../app_includes/db_close.php';
    header('Location: index.php');
    }
?>
