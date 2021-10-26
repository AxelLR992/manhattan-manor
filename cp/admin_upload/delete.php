<?php

include_once '../app_includes/check_login.php';
include_once '../app_includes/db_connect.php';
if ($_SESSION['usr_level'] !== "admin") {
    include_once '../app_includes/db_close.php';
    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
} else {
    $filename = $_GET['f']; //get the filename
    unlink('../upl_docs' . DIRECTORY_SEPARATOR . $filename); //delete it
    header('location: index.php'); //redirect back to the other page
}
?>
