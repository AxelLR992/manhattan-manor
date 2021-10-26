<?php
    include_once '../app_includes/check_login.php';
    include_once '../app_includes/db_connect.php';
    if ($_SESSION['usr_level'] !== "admin") {
    include_once '../app_includes/db_close.php';
    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
    }
    else {
        $stmt = $mysqli->prepare("INSERT into categories (category, parent_cat_id, cat_level, img_sm, img_bg, description, status, display_priority) values (?,?,?,?,?,?,?,?)") or die(mysqli_error($mysqli));
    $stmt->bind_param('siisssss', $_POST['category'], $_POST['parent_cat_id'],$_POST['cat_level'], $_POST['img_sm'], $_POST['img_bg'],$_POST['description'],$_POST['status'],$_POST['display_priority']);

    /* execute prepared statement */
    $stmt->execute();

    /* close statement and connection */
    $stmt->close();
    include_once '../app_includes/db_close.php';
    header('Location: index.php');
    }
?>
