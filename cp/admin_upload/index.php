<?php
include_once '../app_includes/check_login.php';
include_once '../app_includes/db_connect.php';
if ($_SESSION['usr_level'] !== "admin") {
    include_once '../app_includes/db_close.php';
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

        <!-- Morris Charts CSS -->
        <link href="../css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Data Tables -->
        <link href="../css/jquery.dataTables.css" rel="stylesheet" type="text/css">
        
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
        <!-- Data Tables -->
        <script src="../js/jquery.dataTables.js"></script>   
        <script type="text/javascript" language="javascript" class="init">

            $(document).ready(function () {
                $('#list_files').DataTable({
                    "scrollX": true,
                    "order": []
                });
            });
        </script>
        <script> /* Script written by Adam Khoury @ DevelopPHP.com */ /* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */ function _(el) {
                return document.getElementById(el);
            }
            function uploadFile() {
                var file = _("file1").files[0]; // alert(file.name+" | "+file.size+" | "+file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "proc_upload.php");
                ajax.send(formdata);
            }
            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
                var percent = (event.loaded / event.total) * 100;
                _("progressBar").value = Math.round(percent);
                _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
            }
            function completeHandler(event) {
                _("status").innerHTML = event.target.responseText;
                _("progressBar").value = 0;
                location.reload();
            }
            function errorHandler(event) {
                _("status").innerHTML = "Upload Failed";
            }
            function abortHandler(event) {
                _("status").innerHTML = "Upload Aborted";
            }</script>     
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
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div> Uploads</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Upload Files</b></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="upload_form" enctype="multipart/form-data" method="post">
                                <input type="file" name="file1" id="file1"><br> <input type="button" value="Upload File" onclick="uploadFile()"> <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> <h3 id="status"></h3> <p id="loaded_n_total"></p>
                            </form> 
                        </div>
                    </div>
                    <!-- /form --> 
                    <!-- recordset -->
                    <div class="row">
                        <div class="col-lg-12">
                            <hr/>
                            <label>List Files</label>
                            <table id="list_files" class="display" width="98%">
                                <thead>
                                    <tr>
                                        <th>Files in Upload Folder</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
// list files
                                    if ($handle = opendir('../upl_docs/')) {


                                        while (false !== ($entry = readdir($handle))) {

                                            if ($entry != "." && $entry != "..") {
                                                ?>                                
                                                <tr>
                                                    <td><?php echo "$entry\n"; ?></td>
                                                    <td>
                                <?php if (pathinfo($entry, PATHINFO_EXTENSION) == 'jpg' OR pathinfo($entry, PATHINFO_EXTENSION) == 'png' OR pathinfo($entry, PATHINFO_EXTENSION) == 'gif') {
                                        echo "<a class='image-link' href='../upl_docs/" . $entry . "'><i class='fa fa-file-image-o'></i></a>";
                                    } ?>                                
                                <?php echo $db_img_bg ?>                                                    
                                                    </td> 
                                                    <td><a href="delete.php?f=<?php echo "$entry\n"; ?>" onclick="return confirm('This file will be deleted. Proceed?')"><i class="fa fa-fw fa-close"></i></a></td>
                                                </tr>
                                                <?php
                                            }
                                        }

                                        closedir($handle);
                                    }
                                    ?>                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /recordset -->                        

                </div>
                <!-- /.container-fluid -->

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
