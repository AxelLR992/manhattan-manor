<?php
include_once '../app_includes/db_connect.php';
session_start();
// Get submitted post vars
if (isset($_POST['input_user'], $_POST['input_password'])) {
    $user = $_POST['input_user'];
    $password = $_POST['input_password']; // The password.
        // Using prepared statements means that SQL injection is not possible. 
        $stmt = $mysqli->prepare("SELECT recordid, firstname, lastname, user_name, user_password, user_level FROM users_cp WHERE status='active' AND user_name = ? LIMIT 1") or die(mysqli_error($mysqli));
        $stmt->bind_param('s', $user);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($db_recordid, $db_firstname, $db_lastname, $db_user, $db_password, $db_usr_level );
        $stmt->fetch();
        if ($stmt->num_rows == 1)
        {
            // User ok, check psw
            if ($db_password == $password AND $db_usr_level == "admin") {
                $_SESSION['user_rid'] = $db_recordid;
                $_SESSION['user_id'] = $db_user;
                $_SESSION['sessionid_check'] = session_id();
                $_SESSION['loggedin'] = "yes";
                $_SESSION['usr_level'] = $db_usr_level;
                header('Location: ../home/index.php');
            } 
            else {
                $mysqli->close();
                header('Location: ./rejected.php?c=Wrong password.');
            }
        } 
        else {
            $mysqli->close();
            header('Location: ./rejected.php?c=User not found.');
        }
} else {
    // The correct POST variables were not sent to this page.
    $mysqli->close();
    header('Location: ./rejected.php?c=invalid data');
}
?>