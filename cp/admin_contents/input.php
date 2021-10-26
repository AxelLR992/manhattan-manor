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
                    <?php
// Count table records

                    $sql = "SELECT count(*) as rec_count FROM contents";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_assoc();
                    $rc = $row['rec_count'];
                    $result->close;
                    $row->close;
                    ?>  
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-building fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div><b><?php echo $rc ?></b> Contents</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Add Record</b></span>
                                    <span class="pull-right">Cancel&nbsp;&nbsp;<a href="index.php"><i class="fa fa-arrow-circle-left"></i></a></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <form action="process_input.php" method="post" data-toggle="validator" role="form">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle" class="control-label">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle">
                                </div>                                
                                <div class="form-group">
                                    <label for="cat_id" class="control-label">Category</label>
                                    <select name="cat_id" class="input-text">
                                                <option value="0" selected>N/A</option>                                        
                                        <?php
// Query list records
                                        $mysqli->query("SET NAMES 'utf8'");
                                        $sql = "SELECT recordid, category FROM categories order by category";
                                        $result = $mysqli->query($sql);
                                        $i = 0;
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                ?>                                        
                                                <option value="<?php echo $row["recordid"]; ?>"><?php echo $row["category"]; ?></option>
                                                <?php
                                            }
                                        }
                                        $result->close;
                                        $row->close;
                                        include_once '../app_includes/db_close.php';
                                        ?>                                         
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="img_sm" class="control-label">Image small</label>
                                    <select name="img_sm" class="input-text">
                                        <option value="N/A" selected>N/A</option>
                                        <?php
                                        // list files
                                        if ($handle = opendir('../upl_docs/')) {
                                            while (false !== ($entry = readdir($handle))) {
                                                if ($entry != "." && $entry != "..") {
                                                    ?>
                                                    <option value="<?php echo "$entry"; ?>"><?php echo "$entry"; ?></option>
                                                    <?php
                                                }
                                            }
                                            closedir($handle);
                                        }
                                        ?>                                                                                  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="img_bg" class="control-label">Image big</label>
                                    <select name="img_bg" class="input-text">
                                        <option value="N/A" selected>N/A</option>
                                        <?php
                                        // list files
                                        if ($handle = opendir('../upl_docs/')) {
                                            while (false !== ($entry = readdir($handle))) {
                                                if ($entry != "." && $entry != "..") {
                                                    ?>
                                                    <option value="<?php echo "$entry"; ?>"><?php echo "$entry"; ?></option>
                                                    <?php
                                                }
                                            }
                                            closedir($handle);
                                        }
                                        ?>                                                                                  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea name="description" class="input-text" rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">Status</label>
                                    <select name="status" class="input-text">
                                        <option value="active">active</option>
                                        <option value="standby">standby</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="display_priority" class="control-label">Display Pty</label>
                                    <input type="text" class="form-control" id="display_priority" name="display_priority" value="00100">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>                                
                            </div>
                        </form>             

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->



    </body>

</html>
