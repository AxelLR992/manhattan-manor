<?php
session_start();
if ($_SESSION['loggedin'] !== "yes" or $_SESSION['sessionid_check'] !== session_id()) {
    header('Location: ../login/rejected.php?c=Debe logonearse para acceder a este contenido.');
}