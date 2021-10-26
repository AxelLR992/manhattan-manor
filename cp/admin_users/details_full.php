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


</head>

<body style="margin-top: 0px;">

        <div id="page-wrapper" >

            <div class="container-fluid">
 
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">Record Details</span>
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
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding-left: 10px; padding-right: 10px ; padding-bottom: 5px ; padding-left: 10px; font-size: 11px; line-height: 14px; border-bottom-style: solid;  border-bottom-width: 1px;  border-bottom-color:  #dcdcdc; font-weight: bold ">
                            User
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-left: 10px">                        
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding: 10px; font-size: 14px; line-height: 18px;  border-bottom-style: solid;  border-bottom-width: 0px;   border-bottom-color:  #dcdcdc; ">
                            <?php echo $db_user ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding-left: 10px; padding-right: 10px ; padding-bottom: 5px ; padding-left: 10px; font-size: 11px; line-height: 14px; border-bottom-style: solid;  border-bottom-width: 1px;  border-bottom-color:  #dcdcdc; font-weight: bold ">
                            Password
                        </div>
                    </div>
                    <div class="col-lg-12" style="padding-left: 10px">                        
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding: 10px; font-size: 14px; line-height: 18px;  border-bottom-style: solid;  border-bottom-width: 1px;   border-bottom-color:  #dcdcdc; ">
                            <?php echo $db_password ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            <?php echo $db_password ?>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fdfdfd">
                            <?php echo $db_password ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            Firstname
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fdfdfd">
                            <?php echo $db_firstname ?>
                        </div>
                    </div>
                </div>                 
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            Lastname
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fdfdfd">
                            <?php echo $db_lastname ?>
                        </div>
                    </div>
                </div>                  
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            Email
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fdfdfd">
                            <?php echo $db_email ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            User level
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:  #fdfdfd">
                            <?php echo $db_usr_level ?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12" style="padding-left: 10px">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fafafa">
                            Status
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8" style="padding: 10px; font-size: 14px; line-height: 18px; border-style: solid; border-width: 1px;  border-color:  #dcdcdc; background-color:   #fdfdfd">
                            <?php echo $db_status ?>
                        </div>
                    </div>
                </div>                   
            <!-- /.container-fluid -->
            
<?php
$result->close;
$row->close;
include_once '../app_includes/db_close.php';
?>             

        </div>
        <!-- /#page-wrapper -->




</body>

</html>
