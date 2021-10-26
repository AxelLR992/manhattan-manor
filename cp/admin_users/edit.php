<?php
    include_once '../app_includes/check_login.php';
    include_once '../app_includes/db_connect.php';
    if ($_SESSION['usr_level'] !== "admin") {
    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Netvision Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    <script src="../js/validator.js"></script>

</head>

<body>

    <div id="wrapper">
<?php
    include_once '../layout_inc/navigation.php';
?>
        <div id="page-wrapper">

            <div class="container-fluid">
 
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Edit Record</b></span>
                                    <span class="pull-right">Cancel&nbsp;&nbsp;<a href="Javascript: history.back();"><i class="fa fa-arrow-circle-left"></i></a></span>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
<?php
        $mysqli->query("SET NAMES 'utf8'");
        $stmt = $mysqli->prepare("SELECT recordid, firstname, lastname, user_name, user_password, user_level, email, status FROM users_cp WHERE recordid=?") or die(mysqli_error($mysqli));
        $stmt->bind_param('i', $_GET['rid']);
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($db_recordid, $db_firstname, $db_lastname, $db_user, $db_password, $db_usr_level, $db_email, $db_status );
        $stmt->fetch();
        
?>               
                <div class="row">
                            <form action="process_edit.php" method="post" data-toggle="validator" role="form">
                                <input type="hidden" name="recordid" value="<?php echo $db_recordid ?>">
                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                                 <div class="form-group">
                                     <label for="user_name" class="control-label">User</label>
                                     <input type="text" data-minlength="6" class="form-control" id="user_name" name="user_name" value="<?php echo $db_user ?>" required>
                                     <span class="help-block">Minimum of 6 characters</span>
                                 </div>
                                 <div class="form-group">
                                     <label for="user_password" class="control-label">Password</label>
                                     <input type="text" data-minlength="6" class="form-control" id="user_password" name="user_password" value="<?php echo $db_password ?>" required>
                                     <span class="help-block">Minimum of 6 characters</span>
                                 </div>
                                 <div class="form-group">
                                     <label for="firstname" class="control-label">Firstname</label>
                                     <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $db_firstname ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="lastname" class="control-label">Lastname</label>
                                     <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $db_lastname ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="email" class="control-label">Email</label>
                                     <input type="email" class="form-control" id="email" name="email" value="<?php echo $db_email ?>" data-error="Invalid email address" required>
                                     <div class="help-block with-errors"></div>
                                 </div>                                 
                                 <div class="form-group">
                                     <label for="user_level" class="control-label">User level</label>
                                     <select name="user_level" class="input-text">
                                         <option value="admin" <?php if ($db_usr_level=='admin') {echo 'selected'; } ?>>admin</option>
                                         <option value="subscriber" <?php if ($db_usr_level=='subscriber') {echo 'selected'; } ?>>subscriber</option>
                                     </select>   
                                 </div>
                                 <div class="form-group">
                                     <label for="status" class="control-label">Status</label>
                                    <select name="status" class="input-text">
                                        <option value="active" <?php if ($db_status=='active') {echo 'selected'; } ?>>active</option>
                                        <option value="standby" <?php if ($db_status=='standby') {echo 'selected'; } ?>>standby</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-primary">Modify record</button>   <a class="btn btn-info" href="index.php">Return without changes</a>
                                 </div>
                                </div>
                            </form>             

            </div>
            <!-- /.container-fluid -->
            
<?php
$result->close;
$row->close;
include_once '../app_includes/db_close.php';
?>             

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
