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
        <!-- Mag Popup -->
        <link href="../css/magnific-popup.css" rel="stylesheet">          

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
        <!-- Mag Popup -->
        <script src="../js/mag_popup.js"></script>        


    </head>

    <body>

        <div id="wrapper">
            <?php
            include_once '../layout_inc/navigation.php';
            ?>
            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-building fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-left"><strong> Record Details</strong> </span>
                                    <span class="pull-right"><a href="Javascript: history.back();"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.php?rid=<?php echo $_GET['rid']; ?>"><i class="fa fa-fw fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete.php?rid=<?php echo $_GET['rid']; ?>" onclick="return confirm('This record will be deleted. Proceed?')"><i class="fa fa-fw fa-close"></i></a></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php
                    $mysqli->query("SET NAMES 'utf8'");
                    $stmt = $mysqli->prepare("SELECT recordid,name,title,subtitle,cat_id,img_sm,img_bg,description,status,display_priority,last_modified FROM contents WHERE recordid=?") or die(mysqli_error($mysqli));
                    $stmt->bind_param('i', $_GET['rid']);
                    $stmt->execute();    // Execute the prepared query.
                    $stmt->store_result();
                    // get variables from result.
                    $stmt->bind_result($db_recordid, $db_name, $db_title, $db_subtitle, $db_cat_id, $db_img_sm, $db_img_bg, $db_description, $db_status, $db_display_priority, $db_last_modified);
                    $stmt->fetch();
                    $cat_name="N/A";
                    if ($db_cat_id <> 0) {
                        $sql = "SELECT category FROM categories where recordid=$db_cat_id";
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        $cat_name = $row['category'];
                        $result->close;
                        $row->close;
                    }
                    ?>               
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                ID
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_recordid ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Name
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_name ?>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Title
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_title ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Subtitle
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_subtitle ?>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Category
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $cat_name ?>
                            </div>
                        </div>
                    </div>                     
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Image small
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php if ($row["img_sm"] <> 'N/A') {
                                        echo "<a class='image-link' href='../upl_docs/" . $db_img_sm . "'><img src='../upl_docs/" . $db_img_sm . "' alt='Prod Img' style='border: 0px;  height: 27px; width: 27px; margin-right: 10px; margin-bottom: 10px; float: left;'/></a>";
                                    } ?>                                
                                <?php echo $db_img_sm ?>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Image Big
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php if ($db_img_bg <> 'N/A') {
                                        echo "<a class='image-link' href='../upl_docs/" . $db_img_bg . "'><img src='../upl_docs/" . $db_img_bg . "' alt='Prod Img' style='border: 0px; height: 40px; width: 40px; margin-right: 10px; margin-bottom: 10px; float: left;'/></a>";
                                    } ?>                                 
                                <?php echo $db_img_bg ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Description
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_description ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Status
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_status ?>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-lg-12" style="padding-left: 10px">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_title">
                                Display Pty
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px">                        
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 details_content">
                                <?php echo $db_display_priority ?>
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

            </div>
            <!-- /#wrapper -->
        <script>
            $(document).ready(function () {
                $('.image-link').magnificPopup({type: 'image'});
            });
        </script>
    </body>

</html>
