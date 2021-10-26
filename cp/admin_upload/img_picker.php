<?php
//include_once '../app_includes/check_login.php';
//include_once '../app_includes/db_connect.php';
//if ($_SESSION['usr_level'] !== "admin") {
//    include_once '../app_includes/db_close.php';
//    header('Location: ../login/rejected.php?c=Permission denied to access this content.');
//}
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

        <link href="../css/jquery.imagepicker.css" rel="stylesheet" type="text/css">
        <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">        




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
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.imagepicker.js"></script>


    </head>
    <body>

        <div id="wrapper">
            <div id="page-wrapper">

                <div class="container-fluid">
                    <!-- recordset -->
                    <form method="post" action="proc_img_picker.php">
                        <div class="row">
                            <div class="col-lg-12">SELECCIONE PARTE 1<br />
                                <form method="post" action="proc_img_picker.php">
                                    <select id="icon" name="icon">
                                        <?php
// list files
                                        if ($handle = opendir('../upl_docs/img_picker/')) {
                                            while (false !== ($entry = readdir($handle))) {

                                                if ($entry != "." && $entry != "..") {
                                                    ?>
                                                    <option value="../upl_docs/img_picker/<?php echo "$entry\n"; ?>"><?php echo "$entry\n"; ?></option>
                                                    <?php
                                                }
                                            }

                                            closedir($handle);
                                        }
                                        ?>
                                    </select>    
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-12">SELECCIONE PARTE 2<br />
                                <select id="icon_2" name="icon_2">
                                    <?php
// list files
                                    if ($handle = opendir('../upl_docs/img_picker_2/')) {
                                        while (false !== ($entry = readdir($handle))) {

                                            if ($entry != "." && $entry != "..") {
                                                ?>
                                                <option value="../upl_docs/img_picker_2/<?php echo "$entry\n"; ?>"><?php echo "$entry\n"; ?></option>
                                                <?php
                                            }
                                        }

                                        closedir($handle);
                                    }
                                    ?>
                                </select>    
                            </div>
                        </div>                    
                        <!-- /recordset -->      
                        <br /><br /><button type="submit" class="btn btn-primary">Ver selección</button>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <script>
            $(document).ready(function () {

                $("#icon").imagePicker();
                $("#icon_2").imagePicker();

            });
        </script>  


    </body>

</html>
