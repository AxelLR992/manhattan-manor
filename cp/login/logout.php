<?php
session_start();
    $_SESSION['loggedin'] = "no";
    $_SESSION['sessionid_check'] = "0";
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log Out</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container" style="text-align: center;">
        <form class="form-signin" >
            <img src="../img/logo_admin.png" class="form-signin"/><br /><br />
            <h4>Session ended successfully.</h4><br /><br /><br />Click <a href="index.php" class="btn btn-danger btn-xs" role="button">Log In</a> to return back to Login.
        </form>
    </div> <!-- /container -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
