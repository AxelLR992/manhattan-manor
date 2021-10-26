<?php

include_once '../app_includes/db_connect.php';
session_start();

// Get submitted post vars
if (isset($_POST['input_user'], $_POST['input_password'])) {
    $user = $_POST['input_user'];
    $password = $_POST['input_password']; // The password.
        // Using prepared statements means that SQL injection is not possible. 
        $stmt = $pdo->prepare("SELECT firstname, lastname, user_username, user_password, usr_level FROM users WHERE user_username = ? LIMIT 1");
        $stmt->bind_param('s', $user);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($db_firstname, $db_lastname, $db_user, $db_password, $db_usr_level );
        $stmt->fetch();
        if ($stmt->num_rows == 1)
        {
            // User ok, check psw
            if ($db_password == $password AND user_level == "admin") {
                $_SESSION['user_id'] = $db_user;
                $_SESSION['sessionid_check'] = session_id();
                $_SESSION['loggedin'] = "yes";
                $_SESSION['usr_level'] = $db_usr_level;
                header('Location: ../home/index.html');
            } 
            else {
                $pdo->close();
                header('Location: ./rejected.php?c=Wrong password.');
            }
        } 
        else {
            $pdo->close();
            header('Location: ./rejected.php?c=User not found.');
        }
} else {
    // The correct POST variables were not sent to this page.
    $pdo->close();
    header('Location: ./rejected.php?c=invalid data');
}
?>